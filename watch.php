<?php
/**
 * /watch/<slug>            branded recording page (password gate -> player)
 * /watch/<slug>/stream     inline MP4 with Range support (gated)
 * /watch/<slug>/download   MP4 as attachment (gated)
 *
 * The unguessable slug is the real secret; the password (client name) is a soft gate.
 * No client data in URLs or logs; unknown/malformed slugs all return the same 404.
 */
declare(strict_types=1);

require __DIR__ . '/lib/recordings.php';

$slug = (string)($_GET['slug'] ?? '');
$action = (string)($_GET['a'] ?? 'page');
if (!in_array($action, ['page', 'stream', 'download'], true)) {
    $action = 'page';
}

header('X-Robots-Tag: noindex, nofollow, noarchive');
header('Referrer-Policy: no-referrer');
header('Cache-Control: private, no-store');

/** Render a branded message page (not found / expired). */
function watch_message(int $code, string $heading, string $body): never
{
    http_response_code($code);
    $GLOBALS['w_title'] = $heading;
    $GLOBALS['w_msg_heading'] = $heading;
    $GLOBALS['w_msg_body'] = $body;
    $GLOBALS['w_mode'] = 'message';
    watch_render();
    exit;
}

$rec = rec_find($slug);
if ($rec === null) {
    watch_message(404, 'We could not find that recording', 'The link may be mistyped or no longer active. If you were sent this link, check it for a missing character or reach out and I will send a fresh one.');
}

if (rec_is_expired($rec)) {
    if ($rec['file_deleted_at'] === null) {
        rec_delete_file($rec);   // lazy cleanup: free the disk as soon as someone notices
    }
    watch_message(410, 'This link has expired', 'Recordings are only kept for a limited time. If you still need this one, just ask and I will share it again.');
}

$path = rec_file_path($rec);
if ($path === null) {
    watch_message(404, 'This recording is not available', 'The file is no longer on the server. Reach out and I will get it back to you.');
}

$authed = rec_is_authed($rec);
$error = '';

// ---- password submit (POST to the page URL) ----
if ($action === 'page' && ($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && !$authed) {
    if (rec_throttled($slug)) {
        $error = 'Too many attempts. Please wait a few minutes and try again.';
    } elseif (rec_check_password($rec, (string)($_POST['pw'] ?? ''))) {
        rec_grant($slug);
        header('Location: /watch/' . $slug, true, 303);
        exit;
    } else {
        rec_note_fail($slug);
        $error = 'That does not match. Try the name of your business or organization as I know it.';
    }
}

// ---- media endpoints ----
if ($action !== 'page') {
    if (!$authed) {
        http_response_code(403);
        exit;
    }
    $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
    if (!in_array($method, ['GET', 'HEAD'], true)) {
        http_response_code(405);
        header('Allow: GET, HEAD');
        exit;
    }
    if (!rec_is_bot() && $method === 'GET') {
        $range = $_SERVER['HTTP_RANGE'] ?? '';
        $startsAtZero = $range === '' || preg_match('/^bytes=0-/', $range) === 1;
        if ($action === 'download') {
            rec_bump($slug, 'downloads');
        } elseif ($startsAtZero) {
            rec_bump($slug, 'plays');
        }
    }
    rec_serve_file($path, 'video/mp4', $action === 'download', rec_download_name($rec));
    exit;
}

// ---- page ----
if ($authed && !rec_is_bot() && ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'GET') {
    rec_bump($slug, 'views');
}
$GLOBALS['w_mode'] = $authed ? 'player' : 'gate';
$GLOBALS['w_title'] = $authed ? $rec['title'] : 'Your meeting recording';
watch_render();
exit;

function watch_render(): void
{
    global $rec, $slug, $error, $authed;
    $mode = $GLOBALS['w_mode'];
    $title = (string)$GLOBALS['w_title'];
    $h = static fn(string $s): string => htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $h($title) ?> | Serendipity Technology</title>
  <meta name="robots" content="noindex, nofollow, noarchive">
  <meta name="referrer" content="no-referrer">
  <meta name="description" content="A private meeting recording shared by Serendipity Technology.">
  <link rel="icon" href="/img/logos/serendipity_icon_150.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #4FC4F0; --primary-deep: #1A7FAA; --primary-hover: #176E96; --accent: #F7B06A;
      --text: #1F2937; --muted: #475569; --line: #E5E7EB; --bg-alt: #f4f4f5;
      --font-body: 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif;
      --font-heading: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
    }
    *, *::before, *::after { box-sizing: border-box; }
    body { font-family: var(--font-body); font-weight: 300; font-size: 16px; line-height: 1.7; color: var(--text); background: #fff; margin: 0; -webkit-font-smoothing: antialiased; }
    h1, h2 { font-family: var(--font-heading); font-weight: 700; line-height: 1.25; color: var(--text); margin: 0; }
    a { color: var(--primary-deep); text-decoration: underline; }
    a:hover { color: var(--primary-hover); }
    a:focus-visible, button:focus-visible, input:focus-visible, video:focus-visible { outline: 3px solid var(--primary); outline-offset: 3px; border-radius: 2px; }
    body.has-fixed-header { padding-top: 60px; }
    .gradient-bar { height: 4px; background: linear-gradient(to right, #4FC4F0, #F7B06A); }
    .wrap { max-width: 960px; margin: 0 auto; padding: 40px 24px 8px; }
    .eyebrow { font-size: 13px; font-weight: 500; letter-spacing: .08em; text-transform: uppercase; color: var(--primary-deep); margin: 0 0 8px; }
    h1 { font-size: 34px; }
    .sub { color: var(--muted); margin: 8px 0 0; }
    .player { margin-top: 28px; background: #0f172a; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 28px rgba(31,41,55,.18); }
    .player video { display: block; width: 100%; max-height: 72vh; background: #0f172a; }
    .actions { display: flex; flex-wrap: wrap; align-items: center; gap: 16px; margin-top: 20px; }
    .btn { display: inline-block; font-family: var(--font-body); font-size: 16px; font-weight: 500; line-height: 1; padding: 14px 22px; border-radius: 8px; border: 2px solid var(--primary-deep); background: var(--primary-deep); color: #fff; text-decoration: none; cursor: pointer; min-height: 44px; }
    .btn:hover { background: var(--primary-hover); border-color: var(--primary-hover); color: #fff; }
    .btn.secondary { background: #fff; color: var(--primary-deep); }
    .btn.secondary:hover { background: #f0f9fd; color: var(--primary-hover); }
    .meta { font-size: 14px; color: var(--muted); }
    .cta { margin-top: 40px; padding: 28px; border: 1px solid var(--line); border-left: 4px solid var(--accent); border-radius: 12px; background: var(--bg-alt); }
    .cta h2 { font-size: 22px; }
    .cta p { margin: 8px 0 16px; color: var(--muted); }
    .cta .more { margin: 16px 0 0; font-size: 15px; }
    .card { max-width: 480px; margin: 28px 0 0; padding: 28px; border: 1px solid var(--line); border-radius: 12px; background: #fff; box-shadow: 0 4px 18px rgba(31,41,55,.06); }
    .card label { display: block; font-weight: 500; margin-bottom: 8px; }
    .card input[type=text] { width: 100%; font: inherit; font-size: 16px; padding: 12px 14px; border: 1px solid #64748b; border-radius: 8px; margin-bottom: 8px; color: var(--text); }
    .hint { font-size: 14px; color: var(--muted); margin: 0 0 16px; }
    .err { background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 10px 14px; border-radius: 8px; margin: 0 0 16px; font-size: 15px; }
    @media (max-width: 640px) { .wrap { padding: 28px 16px 8px; } h1 { font-size: 28px; } .btn { width: 100%; text-align: center; } .cta { padding: 20px; } }
  </style>
</head>
<body class="has-fixed-header">
<?php
$header_always_visible = true;
$header_chat_action = 'window.location.href="mailto:troy@serendipitytech.net"';
include __DIR__ . '/partials/site-header.php';
?>
<div class="gradient-bar"></div>

<main class="wrap" id="main">
<?php if ($mode === 'message'): ?>
  <p class="eyebrow">Serendipity Technology</p>
  <h1><?= $h((string)$GLOBALS['w_msg_heading']) ?></h1>
  <p class="sub"><?= $h((string)$GLOBALS['w_msg_body']) ?></p>
  <div class="actions">
    <a class="btn" href="mailto:troy@serendipitytech.net">Email Troy</a>
    <a class="btn secondary" href="/">Visit the site</a>
  </div>

<?php elseif ($mode === 'gate'): ?>
  <p class="eyebrow">Private recording</p>
  <h1>Your meeting recording</h1>
  <p class="sub">Enter your organization's name to watch.</p>
  <form class="card" method="post" action="/watch/<?= $h($slug) ?>" autocomplete="off">
    <?php if ($error !== ''): ?><p class="err" role="alert"><?= $h($error) ?></p><?php endif; ?>
    <label for="pw">Your business or organization name</label>
    <input type="text" id="pw" name="pw" required autofocus autocapitalize="off" spellcheck="false">
    <p class="hint">Capitalization does not matter.</p>
    <button class="btn" type="submit">Watch recording</button>
  </form>

<?php else: ?>
  <p class="eyebrow">Meeting recording for <?= $h((string)$rec['client']) ?></p>
  <h1><?= $h((string)$rec['title']) ?></h1>
  <p class="sub">
    Recorded <?= $h(gmdate('F j, Y', (int)$rec['created_at'])) ?>.
    <?php if ($rec['expires_at'] !== null): ?>Available until <?= $h(gmdate('F j, Y', (int)$rec['expires_at'])) ?>.<?php endif; ?>
  </p>

  <div class="player">
    <video controls preload="metadata" playsinline aria-label="<?= $h((string)$rec['title']) ?>">
      <source src="/watch/<?= $h($slug) ?>/stream" type="video/mp4">
      Your browser can not play this video. Use the download button below instead.
    </video>
  </div>

  <div class="actions">
    <a class="btn" href="/watch/<?= $h($slug) ?>/download" download>Download (<?= $h(rec_human_bytes((int)$rec['size_bytes'])) ?>)</a>
    <span class="meta">MP4 video. Playback and download are private to this link.</span>
  </div>

  <section class="cta" aria-labelledby="cta-h">
    <h2 id="cta-h">Want to keep the momentum going?</h2>
    <p>If something came up while you watched, or you are ready for the next step, grab a time and we will pick it up.</p>
    <a class="btn" href="/book">Book a follow-up</a>
    <p class="more">Curious what else I build? See <a href="/#projects">recent projects</a> and <a href="/services/">how I can help</a>.</p>
  </section>
<?php endif; ?>
</main>

<?php include __DIR__ . '/partials/site-footer.php'; ?>
</body>
</html>
    <?php
}
