<?php
// Branded short-link redirector for serendipitytechnology.com
// Public URL:  https://serendipitytechnology.com/s/<slug>   (.htaccess rewrites /s/<slug> -> s.php?c=<slug>)
// Add a link:  add a  'slug' => 'https://full/destination/url',  entry to $links below.
declare(strict_types=1);

$links = [
    // --- event check-in redeem links ---
    '44VEFQQ2' => 'https://checkin.serendipitytechnology.com/redeem?code=44VEFQQ2&event=acbc24b7-a07f-40e8-a718-c64084b1b4bf',
];

// Case-insensitive slug lookup (keys above may be stored in any case).
$slug = isset($_GET['c']) ? trim((string) $_GET['c']) : '';
$target = null;
if ($slug !== '') {
    $needle = strtoupper($slug);
    foreach ($links as $code => $url) {
        if (strtoupper($code) === $needle) { $target = $url; break; }
    }
}
if ($target !== null) {
    header('Location: ' . $target, true, 302); // 302: destinations may change per event
    exit;
}

http_response_code(404);
header('Content-Type: text/html; charset=utf-8');
echo '<!doctype html><meta charset="utf-8"><title>Link not found</title>'
   . '<body style="font-family:system-ui,-apple-system,sans-serif;max-width:32rem;margin:4rem auto;padding:0 1rem;color:#1a1a2e">'
   . '<h1>Link not found</h1><p>That short link is not valid or has expired.</p>'
   . '<p><a href="https://serendipitytechnology.com/">serendipitytechnology.com</a></p></body>';
