<?php
/**
 * CLI for the recording share index. Run inside the site container as www-data
 * (scripts/publish-recording.sh does this). Refuses to run over the web.
 *
 *   add --file rec_x.mp4 --client "Name" --title "T" --expires 60d [--no-password] [--password X]
 *   list | info <slug> | revoke <slug> | purge
 */
declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}
require __DIR__ . '/recordings.php';

function out(string $s): void { fwrite(STDOUT, $s . "\n"); }
function fail(string $s, int $code = 1): never { fwrite(STDERR, "ERROR: $s\n"); exit($code); }

function opts(array $argv): array
{
    $o = [];
    for ($i = 0; $i < count($argv); $i++) {
        if (strpos($argv[$i], '--') === 0) {
            $k = substr($argv[$i], 2);
            if (in_array($k, ['no-password'], true)) {
                $o[$k] = true;
            } else {
                $o[$k] = $argv[++$i] ?? fail("--$k needs a value");
            }
        } else {
            $o['_'][] = $argv[$i];
        }
    }
    return $o;
}

function fmt(?int $t): string { return $t ? gmdate('Y-m-d H:i', $t) . ' UTC' : '-'; }

$cmd = $argv[1] ?? '';
$o = opts(array_slice($argv, 2));

switch ($cmd) {
    case 'init':
        rec_db();
        rec_secret();
        out('ok');
        break;

    case 'add':
        $file = $o['file'] ?? fail('--file required');
        if (!preg_match(REC_FILE_RE, $file)) fail('bad file name');
        $path = rec_dir() . '/' . $file;
        if (!is_file($path)) fail('file not in storage');
        $client = trim($o['client'] ?? '') ?: fail('--client required');
        $title = trim($o['title'] ?? '') ?: 'Meeting recording';
        if (mb_strlen($client) > 120 || mb_strlen($title) > 160) fail('client/title too long');
        $exp = rec_parse_expiry($o['expires'] ?? '60d');
        if ($exp === false) fail('bad --expires (use e.g. 60d, 2w, 12h, never)');
        $pw = isset($o['no-password']) ? null : rec_norm_pw($o['password'] ?? $client);
        $size = (int)filesize($path);
        $db = rec_db();
        for ($try = 0; $try < 5; $try++) {
            $slug = rec_new_slug();
            try {
                $db->prepare('INSERT INTO recordings (slug,file,client,title,password,size_bytes,created_at,expires_at)
                              VALUES (:s,:f,:c,:t,:p,:z,:n,:e)')
                   ->execute([':s' => $slug, ':f' => $file, ':c' => $client, ':t' => $title, ':p' => $pw,
                              ':z' => $size, ':n' => time(), ':e' => $exp]);
                out($slug);
                out('expires=' . ($exp ? gmdate('Y-m-d', $exp) : 'never'));
                out('password=' . ($pw === null ? 'none' : 'client name'));
                exit(0);
            } catch (PDOException $e) {
                if ($try === 4) fail('could not allocate slug');
            }
        }
        break;

    case 'list':
        $rows = rec_db()->query('SELECT * FROM recordings ORDER BY created_at DESC')->fetchAll();
        if (!$rows) { out('(no recordings)'); break; }
        foreach ($rows as $r) {
            $state = $r['revoked_at'] ? 'REVOKED' : ($r['file_deleted_at'] ? 'file-removed' : (rec_is_expired($r) ? 'EXPIRED' : 'live'));
            out(sprintf('%s  %-12s  %-24s  %s  views=%d plays=%d dl=%d first=%s exp=%s  "%s"',
                $r['slug'], $state, mb_substr($r['client'], 0, 24), rec_human_bytes((int)$r['size_bytes']),
                $r['views'], $r['plays'], $r['downloads'], fmt($r['first_viewed_at'] ? (int)$r['first_viewed_at'] : null),
                $r['expires_at'] ? gmdate('Y-m-d', (int)$r['expires_at']) : 'never', $r['title']));
        }
        break;

    case 'info':
        $slug = $o['_'][0] ?? fail('slug required');
        $st = rec_db()->prepare('SELECT * FROM recordings WHERE slug = :s');
        $st->execute([':s' => $slug]);
        $r = $st->fetch() ?: fail('not found');
        unset($r['password']);
        foreach ($r as $k => $v) out("$k: $v");
        break;

    case 'revoke':
        $slug = $o['_'][0] ?? fail('slug required');
        $r = rec_find($slug) ?? fail('not found (or already revoked)');
        rec_db()->prepare('UPDATE recordings SET revoked_at = :t WHERE slug = :s')->execute([':t' => time(), ':s' => $slug]);
        rec_delete_file($r);
        out("revoked $slug and removed file");
        break;

    case 'purge':
        $n = 0; $bytes = 0;
        $rows = rec_db()->query('SELECT * FROM recordings WHERE file_deleted_at IS NULL')->fetchAll();
        foreach ($rows as $r) {
            if (rec_is_expired($r) || $r['revoked_at']) {
                if (rec_delete_file($r)) { $n++; $bytes += (int)$r['size_bytes']; }
            }
        }
        // Orphans: files in storage with no live row (failed publish, manual copies).
        foreach (glob(rec_dir() . '/rec_*.mp4*') ?: [] as $f) {
            $base = basename($f);
            $st = rec_db()->prepare('SELECT 1 FROM recordings WHERE file = :f AND file_deleted_at IS NULL');
            $st->execute([':f' => $base]);
            if (!$st->fetchColumn() && filemtime($f) < time() - 86400) {
                $bytes += (int)filesize($f);
                @unlink($f);
                $n++;
            }
        }
        out("purged $n file(s), freed " . rec_human_bytes($bytes));
        break;

    default:
        fail("unknown command '$cmd' (init|add|list|info|revoke|purge)", 2);
}
