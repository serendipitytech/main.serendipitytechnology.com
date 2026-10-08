<?php
/**
 * Recording share: storage, index (SQLite) and access helpers.
 * Used by watch.php (web) and recordings-cli.php (CLI). Not web-accessible (lib/.htaccess).
 *
 * Security model: the unguessable slug is the real secret. The password (client
 * name) is a soft first-level gate only. Files live in data/recordings/, which is
 * denied by Apache and only ever streamed through watch.php.
 */
declare(strict_types=1);

const REC_SLUG_LEN = 12;
const REC_SLUG_RE = '/^[A-Za-z0-9]{10,16}$/';
const REC_FILE_RE = '/^rec_[0-9a-f]{16,32}\.mp4$/';
const REC_AUTH_TTL = 43200;      // 12h password cookie
const REC_MAX_FAILS = 10;        // failed password tries ...
const REC_FAIL_WINDOW = 900;     // ... per slug per 15 min

function rec_dir(): string
{
    return getenv('REC_DIR') ?: (dirname(__DIR__) . '/data/recordings');
}

function rec_db(): PDO
{
    static $pdo = null;
    if ($pdo) {
        return $pdo;
    }
    $dir = rec_dir();
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
    // Defense in depth: the parent data/.htaccess already denies everything.
    if (!is_file($dir . '/.htaccess')) {
        @file_put_contents($dir . '/.htaccess', "Require all denied\nOptions -Indexes\n");
    }
    $pdo = new PDO('sqlite:' . $dir . '/recordings.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->exec('PRAGMA busy_timeout = 5000');
    $pdo->exec('CREATE TABLE IF NOT EXISTS recordings (
        slug TEXT PRIMARY KEY,
        file TEXT NOT NULL,
        client TEXT NOT NULL,
        title TEXT NOT NULL,
        password TEXT,                 -- normalized; NULL = no password gate
        size_bytes INTEGER NOT NULL DEFAULT 0,
        created_at INTEGER NOT NULL,
        expires_at INTEGER,            -- NULL = never
        first_viewed_at INTEGER,
        last_viewed_at INTEGER,
        views INTEGER NOT NULL DEFAULT 0,
        plays INTEGER NOT NULL DEFAULT 0,
        downloads INTEGER NOT NULL DEFAULT 0,
        file_deleted_at INTEGER,
        revoked_at INTEGER
    )');
    $pdo->exec('CREATE TABLE IF NOT EXISTS pw_fails (slug TEXT NOT NULL, ts INTEGER NOT NULL)');
    $pdo->exec('CREATE INDEX IF NOT EXISTS pw_fails_slug ON pw_fails (slug, ts)');
    return $pdo;
}

function rec_new_slug(): string
{
    $alphabet = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $slug = '';
    for ($i = 0; $i < REC_SLUG_LEN; $i++) {
        $slug .= $alphabet[random_int(0, 61)];
    }
    return $slug;
}

/** Case-insensitive, trimmed, whitespace-collapsed comparison form. */
function rec_norm_pw(string $s): string
{
    $s = preg_replace('/\s+/u', ' ', trim($s)) ?? '';
    return mb_strtolower($s, 'UTF-8');
}

function rec_find(string $slug): ?array
{
    if (!preg_match(REC_SLUG_RE, $slug)) {
        return null;
    }
    $st = rec_db()->prepare('SELECT * FROM recordings WHERE slug = :s AND revoked_at IS NULL');
    $st->execute([':s' => $slug]);
    $row = $st->fetch();
    return $row ?: null;
}

function rec_is_expired(array $r, ?int $now = null): bool
{
    $now = $now ?? time();
    return $r['expires_at'] !== null && (int)$r['expires_at'] <= $now;
}

/** Absolute path of the stored file, or null if missing/invalid. Never trusts input. */
function rec_file_path(array $r): ?string
{
    if (!preg_match(REC_FILE_RE, (string)$r['file']) || $r['file_deleted_at'] !== null) {
        return null;
    }
    $base = realpath(rec_dir());
    $path = $base ? realpath($base . '/' . $r['file']) : false;
    if ($path === false || strpos($path, $base . DIRECTORY_SEPARATOR) !== 0 || !is_file($path)) {
        return null;
    }
    return $path;
}

/** Delete the file for an expired/revoked record (keeps the row for stats). */
function rec_delete_file(array $r): bool
{
    $path = rec_file_path($r);
    $ok = true;
    if ($path !== null) {
        $ok = @unlink($path);
    }
    if ($ok) {
        $st = rec_db()->prepare('UPDATE recordings SET file_deleted_at = :t WHERE slug = :s AND file_deleted_at IS NULL');
        $st->execute([':t' => time(), ':s' => $r['slug']]);
    }
    return $ok;
}

// ---- password cookie (stateless HMAC, no PHP session so range requests never block) ----

function rec_secret(): string
{
    $f = rec_dir() . '/.hmac_key';
    if (!is_file($f)) {
        if (!is_dir(rec_dir())) {
            mkdir(rec_dir(), 0775, true);
        }
        file_put_contents($f, bin2hex(random_bytes(32)), LOCK_EX);
        chmod($f, 0640);
    }
    return trim((string)file_get_contents($f));
}

function rec_cookie_name(string $slug): string
{
    return 'rw_' . substr(hash('sha256', $slug), 0, 12);
}

function rec_auth_token(string $slug, int $exp): string
{
    return $exp . '.' . hash_hmac('sha256', $slug . '|' . $exp, rec_secret());
}

function rec_auth_valid(string $slug, ?string $token): bool
{
    if (!$token || !preg_match('/^(\d{9,11})\.([0-9a-f]{64})$/', $token, $m)) {
        return false;
    }
    if ((int)$m[1] < time()) {
        return false;
    }
    return hash_equals(hash_hmac('sha256', $slug . '|' . $m[1], rec_secret()), $m[2]);
}

function rec_is_authed(array $r): bool
{
    if ($r['password'] === null || $r['password'] === '') {
        return true;
    }
    $name = rec_cookie_name($r['slug']);
    return rec_auth_valid($r['slug'], $_COOKIE[$name] ?? null);
}

function rec_grant(string $slug): void
{
    $exp = time() + REC_AUTH_TTL;
    setcookie(rec_cookie_name($slug), rec_auth_token($slug, $exp), [
        'expires'  => $exp,
        'path'     => '/watch/' . $slug,
        'secure'   => true,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
}

function rec_throttled(string $slug): bool
{
    $db = rec_db();
    $db->prepare('DELETE FROM pw_fails WHERE ts < :t')->execute([':t' => time() - REC_FAIL_WINDOW]);
    $st = $db->prepare('SELECT COUNT(*) FROM pw_fails WHERE slug = :s AND ts >= :t');
    $st->execute([':s' => $slug, ':t' => time() - REC_FAIL_WINDOW]);
    return (int)$st->fetchColumn() >= REC_MAX_FAILS;
}

function rec_note_fail(string $slug): void
{
    rec_db()->prepare('INSERT INTO pw_fails (slug, ts) VALUES (:s, :t)')->execute([':s' => $slug, ':t' => time()]);
}

function rec_check_password(array $r, string $given): bool
{
    return hash_equals((string)$r['password'], rec_norm_pw($given));
}

// ---- stats ----

function rec_is_bot(): bool
{
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
    return $ua === '' || (bool)preg_match(
        '/bot|crawl|spider|preview|slurp|facebookexternalhit|whatsapp|slack|discord|telegram|skype|linkedin|twitter|curl|wget|python|headless/i',
        $ua
    );
}

/** $col is one of a fixed whitelist (never user input). */
function rec_bump(string $slug, string $col): void
{
    if (!in_array($col, ['views', 'plays', 'downloads'], true)) {
        return;
    }
    $now = time();
    $sql = "UPDATE recordings SET $col = $col + 1, last_viewed_at = :n,
            first_viewed_at = COALESCE(first_viewed_at, :n) WHERE slug = :s";
    rec_db()->prepare($sql)->execute([':n' => $now, ':s' => $slug]);
}

// ---- helpers ----

/** "60d", "2w", "12h", "never" -> epoch or null. Returns false if unparseable. */
function rec_parse_expiry(string $s, ?int $now = null)
{
    $now = $now ?? time();
    $s = strtolower(trim($s));
    if ($s === 'never' || $s === 'none') {
        return null;
    }
    if (!preg_match('/^(\d{1,4})([hdw])$/', $s, $m) || (int)$m[1] < 1) {
        return false;
    }
    $mult = ['h' => 3600, 'd' => 86400, 'w' => 604800][$m[2]];
    return $now + (int)$m[1] * $mult;
}

/** Safe ASCII download name derived from client + title. */
function rec_download_name(array $r): string
{
    $base = trim(preg_replace('/[^A-Za-z0-9]+/', '-', $r['client'] . ' ' . $r['title']) ?? '', '-');
    $base = $base === '' ? 'recording' : substr($base, 0, 80);
    return $base . '.mp4';
}

function rec_human_bytes(int $b): string
{
    foreach (['B', 'KB', 'MB', 'GB'] as $i => $u) {
        if ($b < 1024 || $u === 'GB') {
            return ($i === 0 ? (string)$b : number_format($b, 1)) . ' ' . $u;
        }
        $b /= 1024;
    }
    return '';
}

/**
 * Serve a file with HTTP Range support (single range). X-Sendfile is used when
 * mod_xsendfile is loaded; otherwise a chunked PHP fallback.
 */
function rec_serve_file(string $path, string $mime, bool $download, string $dlName): void
{
    $size = filesize($path);
    $mtime = filemtime($path);
    $etag = '"' . dechex($mtime) . '-' . dechex($size) . '"';

    while (ob_get_level() > 0) {
        ob_end_clean();
    }
    @ini_set('zlib.output_compression', '0');
    @set_time_limit(0);
    // Release anything holding a lock; we never use PHP sessions here.

    $start = 0;
    $end = $size - 1;
    $status = 200;
    $range = $_SERVER['HTTP_RANGE'] ?? '';
    $ifRange = $_SERVER['HTTP_IF_RANGE'] ?? '';

    if ($range !== '' && ($ifRange === '' || $ifRange === $etag)) {
        if (preg_match('/^bytes=(\d*)-(\d*)$/', trim($range), $m) && ($m[1] !== '' || $m[2] !== '')) {
            if ($m[1] === '') {                         // suffix: last N bytes
                $n = (int)$m[2];
                $start = max(0, $size - $n);
            } else {
                $start = (int)$m[1];
                if ($m[2] !== '') {
                    $end = min((int)$m[2], $size - 1);
                }
            }
            if ($start > $end || $start >= $size) {
                http_response_code(416);
                header('Content-Range: bytes */' . $size);
                return;
            }
            $status = 206;
        }
        // Multi-range or malformed: ignore and send the whole file (allowed by RFC 9110).
    }

    http_response_code($status);
    header('Content-Type: ' . $mime);
    header('Accept-Ranges: bytes');
    header('ETag: ' . $etag);
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $mtime) . ' GMT');
    header('Cache-Control: private, no-cache');
    header('X-Content-Type-Options: nosniff');
    header('X-Robots-Tag: noindex, nofollow, noarchive');
    header('Referrer-Policy: no-referrer');
    header('Content-Disposition: ' . ($download ? 'attachment' : 'inline') . '; filename="' . $dlName . '"');
    if ($status === 206) {
        header("Content-Range: bytes $start-$end/$size");
    }
    header('Content-Length: ' . ($end - $start + 1));

    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'HEAD') {
        return;
    }

    if (function_exists('apache_get_modules') && in_array('mod_xsendfile', apache_get_modules(), true) && $status === 200) {
        header('X-Sendfile: ' . $path);
        return;
    }

    $fh = fopen($path, 'rb');
    if (!$fh) {
        return;
    }
    fseek($fh, $start);
    $left = $end - $start + 1;
    while ($left > 0 && !feof($fh) && !connection_aborted()) {
        $chunk = fread($fh, min(1048576, $left));
        if ($chunk === false || $chunk === '') {
            break;
        }
        echo $chunk;
        $left -= strlen($chunk);
        flush();
    }
    fclose($fh);
}
