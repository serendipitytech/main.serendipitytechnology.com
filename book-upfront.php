<?php
/**
 * /book/upfront-demo - Branded booking page for the 15-minute Upfront demo.
 * Same embed approach as /book (Cal.com embed.js, self-hosted instance), single event only,
 * styled to match /services/upfront. Event: serendipitytech/upfront-demo.
 */
require_once __DIR__ . '/partials/upfront-helpers.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book a 15-minute Upfront demo | Serendipity Technology</title>
  <meta name="description" content="Pick a time for a 15-minute Upfront demo. We build a sample quote with your brand on the call.">
  <link rel="canonical" href="https://serendipitytechnology.com/book/upfront-demo">
  <link rel="icon" href="/img/logos/serendipity_icon_150.png">
  <meta property="og:title" content="Book a 15-minute Upfront demo">
  <meta property="og:description" content="See your own quote in 15 minutes.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://serendipitytechnology.com/book/upfront-demo">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://book.serendipitytechnology.com">
  <?php include __DIR__ . '/services/partials/service-styles.php'; ?>
  <style>
    .up-wordmark { display: inline-flex; align-items: center; line-height: 0; text-decoration: none; }
    .up-wordmark-img { display: block; height: auto; }
    .up-bar { background: #fff; border-bottom: 1px solid var(--svc-border); }
    .up-bar-in { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding-top: 12px; padding-bottom: 12px; }
    .up-bar a.back { font-size: 14px; color: #1A7FAA; font-weight: 500; }
    .up-intro { background: var(--svc-gradient-soft), var(--svc-bg-alt); border-bottom: 1px solid var(--svc-border); padding: 48px 0 36px; text-align: center; position: relative; }
    .up-intro::after { content: ""; position: absolute; left: 0; right: 0; bottom: 0; height: 4px; background: var(--svc-gradient); }
    .up-intro .svc-eyebrow { color: #176E96; }
    .up-intro h1 { font-family: "Gill Sans", "Gill Sans MT", 'Roboto', sans-serif; font-size: clamp(28px, 5vw, 42px); margin: 0 0 12px; line-height: 1.15; color: var(--svc-text); }
    .up-intro p.lede { font-size: 18px; color: #475569; max-width: 560px; margin: 0 auto; }
    .booking { max-width: 1080px; margin: 0 auto; padding: 32px 16px 56px; }
    .booking-card { background: #fff; border: 1px solid var(--svc-border); border-top: 4px solid #4FC4F0; border-radius: 12px; box-shadow: var(--svc-shadow); overflow: hidden; }
    .cal-embed-box { width: 100%; min-height: 700px; }
    .booking-fallback { text-align: center; font-size: 14px; color: #475569; margin: 16px 0 0; }
    @media (max-width: 640px) {
      .up-intro { padding: 36px 0 28px; }
      .up-intro p.lede { font-size: 16px; }
      .booking { padding: 16px 0 40px; }
      .booking-card { border-radius: 0; border-left: 0; border-right: 0; }
    }
  </style>
</head>
<body class="svc-page has-fixed-header">
<?php
$header_always_visible = true;
$header_chat_action = 'window.location.href="mailto:troy@serendipitytech.net"';
include __DIR__ . '/partials/site-header.php';
?>

<div class="up-bar">
  <div class="svc-container up-bar-in">
    <a class="up-wordmark" href="/services/upfront" aria-label="Upfront, back to the Upfront page"><?= up_wordmark(110) ?></a>
    <a class="back" href="/services/upfront">Back to Upfront</a>
  </div>
</div>

<section class="up-intro">
  <div class="svc-container">
    <p class="svc-eyebrow">15-minute demo</p>
    <h1>See your own quote in 15 minutes.</h1>
    <p class="lede">Pick a time below. We'll build a sample quote with your brand on the call.</p>
  </div>
</section>

<main class="booking" aria-label="Schedule an Upfront demo">
  <div class="booking-card">
    <div id="cal-upfront-demo" class="cal-embed-box"></div>
  </div>
  <noscript>
    <p class="booking-fallback">The scheduler needs JavaScript. <a href="https://book.serendipitytechnology.com/serendipitytech/upfront-demo">Book directly</a> or <a href="mailto:troy@serendipitytech.net">email Troy</a>.</p>
  </noscript>
  <p class="booking-fallback">Scheduler not loading? <a href="https://book.serendipitytechnology.com/serendipitytech/upfront-demo">Open it in a new tab</a> or <a href="mailto:troy@serendipitytech.net">email Troy</a>.</p>
</main>

<?php include __DIR__ . '/partials/site-footer.php'; ?>

<script type="text/javascript">
  (function (C, A, L) { let p = function (a, ar) { a.q.push(ar); }; let d = C.document; C.Cal = C.Cal || function () { let cal = C.Cal; let ar = arguments; if (!cal.loaded) { cal.ns = {}; cal.q = cal.q || []; d.head.appendChild(d.createElement("script")).src = A; cal.loaded = true; } if (ar[0] === L) { const api = function () { p(api, arguments); }; const namespace = ar[1]; api.q = api.q || []; if (typeof namespace === "string") { cal.ns[namespace] = cal.ns[namespace] || api; p(cal.ns[namespace], ar); p(cal, ["initNamespace", namespace]); } else p(cal, ar); return; } p(cal, ar); }; })(window, "https://book.serendipitytechnology.com/embed/embed.js", "init");

  Cal("init", "upfront-demo", { origin: "https://book.serendipitytechnology.com" });
  // Pass campaign attribution into the embed so Cal can store it on the booking record.
  var calConfig = { layout: "month_view" };
  new URLSearchParams(location.search).forEach(function (v, k) {
    if (/^(utm_(source|medium|campaign|term|content)|fbclid|gclid)$/.test(k)) { calConfig[k] = v; }
  });
  Cal.ns["upfront-demo"]("inline", {
    elementOrSelector: "#cal-upfront-demo",
    calLink: "serendipitytech/upfront-demo",
    config: calConfig
  });
  Cal.ns["upfront-demo"]("ui", {
    theme: "light",
    cssVarsPerTheme: { light: { "cal-brand": "#1A7FAA" } },
    hideEventTypeDetails: true,
    layout: "month_view"
  });
  // Conversion: V2 is the current lightweight event (no PII to the parent); legacy
  // "bookingSuccessful" kept as fallback. Both exist in our Cal 6.2.0; tracker de-dupes.
  Cal.ns["upfront-demo"]("on", { action: "bookingSuccessfulV2", callback: function () { if (window.siteTrackDemoBooked) { window.siteTrackDemoBooked(); } } });
  Cal.ns["upfront-demo"]("on", { action: "bookingSuccessful", callback: function () { if (window.siteTrackDemoBooked) { window.siteTrackDemoBooked(); } } });
</script>
</body>
</html>
