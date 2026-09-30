<?php
/**
 * Link-in-bio page for Troy Shimkus.  Public URL: serendipitytechnology.com/me
 * Add / edit / reorder links in the $links array below. Set url to "" to hide a row.
 * vCard "Save my contact" is served by this same file at /me?vcard=1.
 * Visual style matches the Serendipity contact lock screen (light gradient, stacked logo).
 */
declare(strict_types=1);

// Keep this page out of search engines / compliant crawlers (applies to the
// vCard response below and the page). Not listed in robots.txt or the sitemap
// and not linked from site nav, so it stays effectively unadvertised.
header('X-Robots-Tag: noindex, nofollow, noarchive');

if (isset($_GET['vcard'])) {
    header('Content-Type: text/vcard; charset=utf-8');
    header('Content-Disposition: attachment; filename="troy-shimkus.vcf"');
    echo implode("\r\n", [
        'BEGIN:VCARD', 'VERSION:3.0',
        'N:Shimkus;Troy;;;', 'FN:Troy Shimkus',
        'ORG:Serendipity Technology', 'TITLE:Owner',
        'EMAIL;TYPE=INTERNET,PREF:troy@serendipitytech.net',
        'URL:https://serendipitytechnology.com',
        'TEL;TYPE=CELL:+14074436844',
        'END:VCARD',
    ]) . "\r\n";
    exit;
}

$name    = 'Troy Shimkus';
$title   = 'Owner, Serendipity Technology';
$links = [
    ['label' => 'Save my contact', 'url' => '/me?vcard=1', 'icon' => 'contact', 'primary' => true],
    ['label' => 'Website',         'url' => 'https://serendipitytechnology.com', 'icon' => 'globe'],
    ['label' => 'Email me',        'url' => 'mailto:troy@serendipitytech.net',   'icon' => 'mail'],
    ['label' => 'Text me',         'url' => 'sms:+14074436844', 'icon' => 'message'],
    ['label' => 'YouTube',         'url' => 'https://www.youtube.com/@serendipitytech', 'icon' => 'youtube'],
    ['label' => 'LinkedIn',        'url' => 'https://www.linkedin.com/in/troyshimkus/', 'icon' => 'linkedin'],
];

function icon(string $n): string {
    $s = 'width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"';
    return [
        'contact' => "<svg $s><path d='M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2'/><circle cx='9' cy='7' r='4'/><line x1='19' y1='8' x2='19' y2='14'/><line x1='22' y1='11' x2='16' y2='11'/></svg>",
        'globe'   => "<svg $s><circle cx='12' cy='12' r='10'/><line x1='2' y1='12' x2='22' y2='12'/><path d='M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z'/></svg>",
        'mail'    => "<svg $s><rect x='2' y='4' width='20' height='16' rx='2'/><path d='m22 7-10 6L2 7'/></svg>",
        'message' => "<svg $s><path d='M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z'/></svg>",
        'youtube' => "<svg $s><path d='M22.5 6.5a2.8 2.8 0 0 0-2-2C18.9 4 12 4 12 4s-6.9 0-8.5.5a2.8 2.8 0 0 0-2 2A29 29 0 0 0 1 12a29 29 0 0 0 .5 5.5 2.8 2.8 0 0 0 2 2C5.1 20 12 20 12 20s6.9 0 8.5-.5a2.8 2.8 0 0 0 2-2A29 29 0 0 0 23 12a29 29 0 0 0-.5-5.5z'/><path d='m10 15 5-3-5-3z'/></svg>",
        'linkedin'=> "<svg $s><path d='M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z'/><rect x='2' y='9' width='4' height='12'/><circle cx='4' cy='4' r='2'/></svg>",
    ][$n] ?? '';
}
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Troy Shimkus</title>
<meta name="description" content="Troy Shimkus, Owner of Serendipity Technology. Save my contact, website, and links.">
<meta name="robots" content="noindex, nofollow, noarchive, noimageindex">
<meta property="og:title" content="Troy Shimkus">
<meta property="og:description" content="Owner, Serendipity Technology">
<style>
:root{--ink:#16233c;--muted:#5b6b85;--card:#ffffff;--line:#e4e9f2;--blue:#00a2e8;--orange:#ffa645;}
*{box-sizing:border-box}
body{margin:0;min-height:100vh;font-family:Inter,-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;
  color:var(--ink);background:linear-gradient(160deg,#e7f1fc 0%,#eef2f7 46%,#f5f1ea 100%);
  display:flex;justify-content:center;padding:max(46px,env(safe-area-inset-top)) 22px 40px;}
.wrap{width:100%;max-width:440px;text-align:center;display:flex;flex-direction:column;min-height:calc(100vh - 86px)}
.logo{width:186px;margin:8px auto 26px}
h1{font-size:30px;font-weight:800;margin:0 0 6px;letter-spacing:-.02em;color:#12233f}
.title{color:var(--muted);font-size:16px;margin:0 0 34px}
.links{display:flex;flex-direction:column;gap:14px}
a.btn{display:flex;align-items:center;gap:14px;width:100%;padding:18px 22px;border-radius:16px;
  background:var(--card);border:1px solid var(--line);color:var(--ink);text-decoration:none;font-size:16.5px;font-weight:600;
  box-shadow:0 3px 10px rgba(20,40,80,.06);transition:transform .08s ease,box-shadow .15s ease}
a.btn:hover{transform:translateY(-1px);box-shadow:0 8px 18px rgba(20,40,80,.12)}
a.btn:active{transform:translateY(0)}
a.btn .lbl{flex:1;text-align:center;margin-right:21px}
a.btn.primary{background:linear-gradient(135deg,var(--blue),#0089c7);color:#fff;border:none;box-shadow:0 8px 20px rgba(0,120,190,.30)}
.ico{display:flex;width:21px}
footer{margin-top:auto;padding-top:38px}
.accent{width:64px;height:4px;border-radius:4px;margin:0 auto 16px;background:linear-gradient(to right,var(--blue),var(--orange))}
.site{font-size:16px;font-weight:600;color:#12233f}
.email{display:block;margin-top:4px;font-size:15px;color:var(--blue);text-decoration:none}
</style>
</head>
<body>
<main class="wrap">
  <img class="logo" src="/img/logos/serendipity_stacked_vector.svg" alt="Serendipity Technology">
  <h1><?= htmlspecialchars($name) ?></h1>
  <p class="title"><?= htmlspecialchars($title) ?></p>

  <div class="links">
  <?php foreach ($links as $l): if (empty($l['url'])) continue; ?>
    <a class="btn<?= !empty($l['primary']) ? ' primary' : '' ?>" href="<?= htmlspecialchars($l['url']) ?>"<?= str_starts_with($l['url'],'http') ? ' target="_blank" rel="noopener"' : '' ?>>
      <span class="ico"><?= icon($l['icon']) ?></span>
      <span class="lbl"><?= htmlspecialchars($l['label']) ?></span>
    </a>
  <?php endforeach; ?>
  </div>

  <footer>
    <div class="accent"></div>
    <div class="site">SerendipityTechnology.com</div>
    <a class="email" href="mailto:troy@serendipitytech.net">Troy@SerendipityTech.net</a>
  </footer>
</main>
</body>
</html>
