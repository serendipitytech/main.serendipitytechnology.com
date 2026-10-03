<?php
/**
 * /book - Branded booking page
 * Embeds the self-hosted Cal.com instance (book.serendipitytechnology.com) via the official embed.js.
 * Serendipity Technology
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book a Call with Troy | Serendipity Technology</title>
  <meta name="description" content="Book a free discovery call with Troy at Serendipity Technology. Pick a time that works and we will talk through what you are trying to build.">
  <link rel="canonical" href="https://serendipitytechnology.com/book">
  <link rel="icon" href="/img/logos/serendipity_icon_150.png">

  <meta property="og:title" content="Book a Call with Troy | Serendipity Technology">
  <meta property="og:description" content="Pick a time and talk through what you are trying to build. No pitch deck, just a straight conversation.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://serendipitytechnology.com/book">
  <meta property="og:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://book.serendipitytechnology.com">

  <style>
    :root {
      --primary: #4FC4F0;
      --primary-deep: #1A7FAA;
      --primary-hover: #176E96;
      --accent: #F7B06A;
      --text: #1F2937;
      --muted: #475569;
      --line: #E5E7EB;
      --bg-alt: #f4f4f5;
      --font-body: 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif;
      --font-heading: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
    }
    *, *::before, *::after { box-sizing: border-box; }
    body {
      font-family: var(--font-body);
      font-weight: 300;
      font-size: 16px;
      line-height: 1.7;
      color: var(--text);
      background: #fff;
      margin: 0;
      -webkit-font-smoothing: antialiased;
    }
    h1, h2 { font-family: var(--font-heading); font-weight: 700; line-height: 1.25; color: var(--text); margin: 0; }
    a { color: var(--primary-deep); text-decoration: underline; }
    a:hover { color: var(--primary-hover); }
    a:focus-visible { outline: 3px solid var(--primary); outline-offset: 3px; border-radius: 2px; }
    .gradient-bar { height: 4px; background: linear-gradient(to right, #4FC4F0, #F7B06A); }

    /* The fixed site header is 60px tall */
    body.has-fixed-header { padding-top: 60px; }

    .intro { background: var(--bg-alt); padding: 56px 24px 40px; text-align: center; border-bottom: 1px solid var(--line); }
    .intro-inner { max-width: 680px; margin: 0 auto; }
    .eyebrow {
      font-size: 13px; font-weight: 500; letter-spacing: 0.12em; text-transform: uppercase;
      color: var(--primary-deep); margin: 0 0 12px;
    }
    .intro h1 { font-size: clamp(28px, 5vw, 42px); margin-bottom: 16px; }
    .intro p.lede { font-size: 18px; color: var(--muted); margin: 0 auto; }
    .accent-rule { width: 64px; height: 4px; border-radius: 4px; margin: 24px auto 0;
      background: linear-gradient(to right, #4FC4F0, #F7B06A); }

    .booking { max-width: 1080px; margin: 0 auto; padding: 32px 16px 64px; }
    .booking-card {
      background: #fff; border: 1px solid var(--line); border-top: 4px solid var(--primary);
      border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.08); overflow: hidden;
    }
    .choices { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; padding: 20px 16px 4px; }
    .choice {
      font-family: var(--font-body); font-size: 16px; font-weight: 500; cursor: pointer;
      padding: 12px 24px; border-radius: 8px; min-height: 48px;
      background: #fff; color: var(--primary-deep); border: 2px solid var(--primary-deep);
      transition: background 0.2s, color 0.2s;
    }
    .choice:hover { background: #f0f9ff; color: var(--primary-hover); border-color: var(--primary-hover); }
    .choice[aria-pressed="true"] { background: var(--primary-deep); color: #fff; }
    .choice[aria-pressed="true"]:hover { background: var(--primary-hover); border-color: var(--primary-hover); }
    .choice:focus-visible { outline: 3px solid var(--primary); outline-offset: 3px; }
    .choice small { font-weight: 300; font-size: 13px; display: block; opacity: 0.95; }
    .cal-panel[hidden] { display: none; }
    .cal-embed-box { width: 100%; min-height: 700px; }
    .booking-fallback { text-align: center; font-size: 14px; color: var(--muted); margin: 16px 0 0; }

    .help { max-width: 680px; margin: 0 auto; padding: 0 24px 56px; text-align: center; color: var(--muted); font-size: 15px; }

    @media (max-width: 640px) {
      .intro { padding: 40px 16px 28px; }
      .intro p.lede { font-size: 16px; }
      .booking { padding: 16px 0 40px; }
      .booking-card { border-radius: 0; border-left: 0; border-right: 0; }
    }
  </style>
</head>
<body class="has-fixed-header">

<?php
$header_always_visible = true;
$header_chat_action = 'window.location.href="mailto:troy@serendipitytech.net"';
include __DIR__ . '/partials/site-header.php';
?>

<div class="gradient-bar"></div>

<section class="intro">
  <div class="intro-inner">
    <p class="eyebrow">Let's talk</p>
    <h1>Book a call with Troy</h1>
    <p class="lede">
      Tell me what you are trying to build or fix, and we will figure out if I am the right fit.
      It is a short, straight conversation with the person who will actually do the work. Pick a time below.
    </p>
    <div class="accent-rule" aria-hidden="true"></div>
  </div>
</section>

<main class="booking" aria-label="Schedule a call">
  <div class="booking-card">
    <div class="choices" role="group" aria-label="Choose a call type">
      <button type="button" class="choice" id="btn-discovery" data-target="discovery" aria-pressed="true">
        Discovery Call (45 min)<small>For new projects and bigger questions</small>
      </button>
      <button type="button" class="choice" id="btn-intro" data-target="intro" aria-pressed="false">
        Intro Call (30 min)<small>A quick hello and a first look</small>
      </button>
    </div>
    <div class="cal-panel" id="panel-discovery">
      <div id="cal-discovery" class="cal-embed-box"></div>
    </div>
    <div class="cal-panel" id="panel-intro" hidden>
      <div id="cal-intro" class="cal-embed-box"></div>
    </div>
  </div>
  <noscript>
    <p class="booking-fallback">
      The scheduler needs JavaScript. You can also book a
      <a href="https://book.serendipitytechnology.com/serendipitytech/discovery">Discovery Call</a>
      or an <a href="https://book.serendipitytechnology.com/serendipitytech/intro">Intro Call</a> directly,
      or <a href="mailto:troy@serendipitytech.net">email Troy</a>.
    </p>
  </noscript>
  <p class="booking-fallback" id="fallback-text">
    Scheduler not loading? <a id="fallback-link" href="https://book.serendipitytechnology.com/serendipitytech/discovery">Open it in a new tab</a>
    or <a href="mailto:troy@serendipitytech.net">email Troy</a>.
  </p>
</main>

<?php include __DIR__ . '/partials/site-footer.php'; ?>

<!-- Cal.com official embed snippet (self-hosted instance) -->
<script type="text/javascript">
  (function (C, A, L) { let p = function (a, ar) { a.q.push(ar); }; let d = C.document; C.Cal = C.Cal || function () { let cal = C.Cal; let ar = arguments; if (!cal.loaded) { cal.ns = {}; cal.q = cal.q || []; d.head.appendChild(d.createElement("script")).src = A; cal.loaded = true; } if (ar[0] === L) { const api = function () { p(api, arguments); }; const namespace = ar[1]; api.q = api.q || []; if (typeof namespace === "string") { cal.ns[namespace] = cal.ns[namespace] || api; p(cal.ns[namespace], ar); p(cal, ["initNamespace", namespace]); } else p(cal, ar); return; } p(cal, ar); }; })(window, "https://book.serendipitytechnology.com/embed/embed.js", "init");

  var CAL_ORIGIN = "https://book.serendipitytechnology.com";
  var EVENTS = {
    discovery: "serendipitytech/discovery",
    intro: "serendipitytech/intro"
  };
  var loaded = {};

  // One namespace per event type, initialised the first time its calendar is shown
  // (a hidden container measures 0px wide, so the Intro embed waits until its tab is visible).
  function loadCalendar(key) {
    if (loaded[key]) return;
    loaded[key] = true;
    Cal("init", key, { origin: CAL_ORIGIN });
    Cal.ns[key]("inline", {
      elementOrSelector: "#cal-" + key,
      calLink: EVENTS[key],
      config: { layout: "month_view" }
    });
    Cal.ns[key]("ui", {
      theme: "light",
      cssVarsPerTheme: { light: { "cal-brand": "#1A7FAA" } },
      hideEventTypeDetails: true,
      layout: "month_view"
    });
  }

  function showCalendar(key) {
    Object.keys(EVENTS).forEach(function (k) {
      var on = k === key;
      document.getElementById("panel-" + k).hidden = !on;
      document.getElementById("btn-" + k).setAttribute("aria-pressed", on ? "true" : "false");
    });
    document.getElementById("fallback-link").href = CAL_ORIGIN + "/" + EVENTS[key];
    loadCalendar(key);
  }

  document.querySelectorAll(".choice").forEach(function (btn) {
    btn.addEventListener("click", function () { showCalendar(btn.dataset.target); });
  });
  showCalendar("discovery");
</script>
</body>
</html>
