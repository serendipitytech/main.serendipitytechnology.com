<?php
/**
 * Link-in-bio page for Troy Shimkus.  Public URL: serendipitytechnology.com/me
 * Add / edit / reorder links in the $links array below. Set a url to "" to hide a row.
 * vCard "Add to contacts" is served by this same file at /me?vcard=1.
 */
declare(strict_types=1);

// ---- vCard download (Add to contacts) ----
if (isset($_GET['vcard'])) {
    header('Content-Type: text/vcard; charset=utf-8');
    header('Content-Disposition: attachment; filename="troy-shimkus.vcf"');
    $vcf = [
        'BEGIN:VCARD', 'VERSION:3.0',
        'N:Shimkus;Troy;;;', 'FN:Troy Shimkus',
        'ORG:Serendipity Technology', 'TITLE:Founder',
        'EMAIL;TYPE=INTERNET,PREF:troy@serendipitytech.net',
        'URL:https://serendipitytechnology.com',
        // 'TEL;TYPE=CELL:+1XXXXXXXXXX',   // add phone when ready
        'END:VCARD',
    ];
    echo implode("\r\n", $vcf) . "\r\n";
    exit;
}

// ---- editable profile + links ----
$name    = 'Troy Shimkus';
$tagline = 'Founder, Serendipity Technology';
$links = [
    ['label' => 'Add to contacts', 'url' => '/me?vcard=1', 'icon' => 'contact', 'primary' => true],
    ['label' => 'Website',         'url' => 'https://serendipitytechnology.com', 'icon' => 'globe'],
    ['label' => 'Email me',        'url' => 'mailto:troy@serendipitytech.net',   'icon' => 'mail'],
    ['label' => 'YouTube',         'url' => '', 'icon' => 'youtube'], // add channel URL to show
];

function icon(string $n): string {
    $s = 'width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"';
    switch ($n) {
        case 'contact': return "<svg $s><path d='M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2'/><circle cx='9' cy='7' r='4'/><line x1='19' y1='8' x2='19' y2='14'/><line x1='22' y1='11' x2='16' y2='11'/></svg>";
        case 'globe':   return "<svg $s><circle cx='12' cy='12' r='10'/><line x1='2' y1='12' x2='22' y2='12'/><path d='M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z'/></svg>";
        case 'mail':    return "<svg $s><rect x='2' y='4' width='20' height='16' rx='2'/><path d='m22 7-10 6L2 7'/></svg>";
        case 'youtube': return "<svg $s><path d='M22.5 6.5a2.8 2.8 0 0 0-2-2C18.9 4 12 4 12 4s-6.9 0-8.5.5a2.8 2.8 0 0 0-2 2A29 29 0 0 0 1 12a29 29 0 0 0 .5 5.5 2.8 2.8 0 0 0 2 2C5.1 20 12 20 12 20s6.9 0 8.5-.5a2.8 2.8 0 0 0 2-2A29 29 0 0 0 23 12a29 29 0 0 0-.5-5.5z'/><path d='m10 15 5-3-5-3z'/></svg>";
    }
    return '';
}
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Troy Shimkus</title>
<meta name="description" content="Troy Shimkus, Serendipity Technology. Contact, website, and links.">
<meta name="robots" content="noindex">
<meta property="og:title" content="Troy Shimkus">
<meta property="og:description" content="Serendipity Technology, contact + links">
<style>
:root{--bg1:#eef2f9;--bg2:#e3e9f5;--card:#ffffff;--ink:#131a2b;--muted:#6b7280;--line:#e5e7eb;--blue:#00a2e8;--orange:#ffa645;}
@media (prefers-color-scheme:dark){:root{--bg1:#0f1630;--bg2:#0b1022;--card:#161d33;--ink:#f4f6fb;--muted:#9aa5bd;--line:#2a3350;}}
*{box-sizing:border-box}
body{margin:0;min-height:100vh;font-family:Inter,-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;
  background:radial-gradient(120% 90% at 50% 0%,var(--bg1),var(--bg2));color:var(--ink);
  display:flex;justify-content:center;padding:max(32px,env(safe-area-inset-top)) 20px 40px;}
.wrap{width:100%;max-width:460px;text-align:center}
.avatar{width:96px;height:96px;border-radius:50%;margin:8px auto 18px;display:flex;align-items:center;justify-content:center;
  background:linear-gradient(135deg,var(--blue),var(--orange));box-shadow:0 8px 24px rgba(0,60,120,.18);overflow:hidden}
.avatar img{width:64px;height:64px;object-fit:contain}
h1{font-size:26px;font-weight:800;margin:0 0 4px;letter-spacing:-.02em}
.tag{color:var(--muted);font-size:15px;margin:0 0 28px}
a.btn{display:flex;align-items:center;gap:14px;width:100%;padding:17px 20px;margin:12px 0;border-radius:16px;
  background:var(--card);border:1px solid var(--line);color:var(--ink);text-decoration:none;font-size:16px;font-weight:600;
  box-shadow:0 2px 8px rgba(16,24,40,.05);transition:transform .08s ease,box-shadow .15s ease}
a.btn:hover{transform:translateY(-1px);box-shadow:0 6px 16px rgba(16,24,40,.10)}
a.btn:active{transform:translateY(0)}
a.btn .lbl{flex:1;text-align:center;margin-right:22px}
a.btn.primary{background:linear-gradient(135deg,var(--blue),#0089c7);color:#fff;border:none;box-shadow:0 6px 18px rgba(0,120,190,.32)}
.ico{display:flex;width:22px}
footer{margin-top:34px;opacity:.7}
footer img{height:26px;width:auto}
</style>
</head>
<body>
<main class="wrap">
  <div class="avatar"><img src="/img/logos/serendipity_icon_500.png" alt="Serendipity Technology"></div>
  <h1><?= htmlspecialchars($name) ?></h1>
  <p class="tag"><?= htmlspecialchars($tagline) ?></p>

  <?php foreach ($links as $l): if (empty($l['url'])) continue; ?>
    <a class="btn<?= !empty($l['primary']) ? ' primary' : '' ?>" href="<?= htmlspecialchars($l['url']) ?>"<?= str_starts_with($l['url'],'http') ? ' target="_blank" rel="noopener"' : '' ?>>
      <span class="ico"><?= icon($l['icon']) ?></span>
      <span class="lbl"><?= htmlspecialchars($l['label']) ?></span>
    </a>
  <?php endforeach; ?>

  <footer><img src="/img/logos/serendipity_horrizontal.png" alt="Serendipity Technology"></footer>
</main>
</body>
</html>
