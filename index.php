<?php
require_once __DIR__ . '/projects.php';
$featuredProjects = getFeaturedProjects();
$gridProjects = getGridProjects();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="google-site-verification" content="3TXwmMDxBCEQDR9EF8e6yvCEyiTcS7at1zDQ5f0F2zc" />

  <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-G50KCN37LQ"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-G50KCN37LQ');
  </script>
  <title>AI-Directed Engineering: Fractional CTO and Custom Software | Serendipity Technology</title>
  <meta name="description" content="A real engineer directing AI to ship real software. Fractional CTO leadership and custom development for organizations in Florida and beyond." />
  <meta name="keywords" content="custom software development Volusia County, workflow automation Florida, data integration small business, business process automation, technology consulting Central Florida" />
  <meta name="geo.region" content="US-FL" />
  <meta name="geo.placename" content="Volusia County" />
  <link rel="canonical" href="https://serendipitytechnology.com/" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="img/logos/serendipity_icon_150.png" />
  <link rel="apple-touch-icon" href="img/logos/serendipity_icon_500.png" />

  <!-- Critical CSS for Above-the-Fold Content -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap');
    :root{--color-primary:#4FC4F0;--color-accent:#F7B06A;--color-text:#1F2937;--font-body:'Roboto',-apple-system,BlinkMacSystemFont,sans-serif;--font-heading:"Gill Sans","Gill Sans MT",'Roboto',sans-serif;--header-height:60px}
    body{font-family:var(--font-body);font-weight:300;font-size:17px;margin:0;background:#fff;color:var(--color-text);line-height:1.7;-webkit-font-smoothing:antialiased}
    h1,h2,h3{font-family:var(--font-heading);font-weight:700;line-height:1.3;color:var(--color-text)}
    header{background:url('https://images.squarespace-cdn.com/content/v1/55fb8119e4b0ef39e06a4b61/1447475742063-8SAIPSFZVSKUR38AH18B/image-asset.jpeg?format=2500w') no-repeat center center/cover;padding:4rem 1rem;text-align:center;position:relative;color:#fff}
    .header-overlay{background:rgba(0,0,0,.6);padding:2rem;border-radius:12px;display:inline-block;max-width:90%;transition:transform .2s,box-shadow .2s}
    /* scrollNav styles handled by site-header.php partial */
  </style>

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://serendipitytechnology.com/" />
  <meta property="og:title" content="Serendipity Technology | AI-Directed Engineering" />
  <meta property="og:description" content="Fractional CTO leadership and custom software, built by a real engineer directing AI." />
  <meta property="og:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png" />
  <meta property="og:site_name" content="Serendipity Technology" />
  <meta property="og:locale" content="en_US" />
  <meta property="article:publisher" content="https://www.facebook.com/serendipitytech" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:title" content="Serendipity Technology | AI-Directed Engineering" />
  <meta name="twitter:description" content="Fractional CTO leadership and custom software, built by a real engineer directing AI." />
  <meta name="twitter:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png" />

  <!-- Schema.org Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Serendipity Technology",
    "url": "https://serendipitytechnology.com",
    "logo": "https://serendipitytechnology.com/img/logos/serendipity_icon_500.png",
    "description": "Custom software solutions that streamline operations through purpose-built workflows, data integration, and automated reporting.",
    "founder": {
      "@type": "Person",
      "name": "Troy Shimkus"
    },
    "contactPoint": {
      "@type": "ContactPoint",
      "telephone": "+1-407-545-6070",
      "contactType": "customer service",
      "areaServed": {
        "@type": "State",
        "name": "Florida"
      }
    },
    "sameAs": [
      "https://www.facebook.com/serendipitytech"
    ]
  }
  </script>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "Serendipity Technology",
    "image": "https://serendipitytechnology.com/img/logos/serendipity_icon_500.png",
    "url": "https://serendipitytechnology.com",
    "telephone": "+1-407-545-6070",
    "email": "troy@serendipitytech.net",
    "priceRange": "$$",
    "description": "Custom software solutions for workflow automation, data integration, and reporting. Serving Volusia County, FL and beyond.",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Volusia County",
      "addressRegion": "FL",
      "addressCountry": "US"
    },
    "areaServed": [
      {
        "@type": "Place",
        "name": "Volusia County, FL"
      },
      {
        "@type": "Place",
        "name": "Central Florida"
      },
      {
        "@type": "State",
        "name": "Florida"
      }
    ],
    "sameAs": [
      "https://facebook.com/serendipitytech"
    ],
    "serviceType": ["Custom Software Development", "Workflow Automation", "Data Integration", "Business Process Automation", "Automated Reporting", "Technology Consulting", "SMS and Text Messaging Services", "Email Delivery", "Client Communications"]
  }
  </script>

  <!-- Your custom styles -->
  <link rel="stylesheet" href="css/concierge_style.css">

  <!-- AOS animations -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

  <!-- ✅ Correct Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Cloudflare Turnstile CAPTCHA -->
  <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      AOS.init({
        once: true,
        duration: 600,
        offset: 50,           // trigger animation slightly earlier (default 120)
        easing: 'ease-out',
        disable: 'phone'      // skip on phones, they're already mid-scroll fast
      });
    });
    // Refresh AOS positions after all images/fonts load — fixes Safari delay where
    // AOS calculates positions before page is fully laid out and gets stuck.
    window.addEventListener('load', function () {
      if (typeof AOS !== 'undefined') {
        AOS.refreshHard();
      }
    });
  </script>
  <style>
    /* Failsafe: if AOS hasn't applied within 2 seconds (e.g. CDN slow, Safari quirk),
       reveal the elements anyway. Without this, content can stay invisible behind
       opacity:0 indefinitely if AOS fails to initialize. */
    @keyframes aos-failsafe {
      to { opacity: 1; transform: translate3d(0, 0, 0); }
    }
    [data-aos]:not(.aos-animate) {
      animation: aos-failsafe 0.4s ease-out 2s forwards;
    }

    /* Services index card grid */
    .services-cards-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px;
    }
    @media (max-width: 900px) {
      .services-cards-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 500px) {
      .services-cards-grid { grid-template-columns: 1fr; }
    }
    .services-index-card {
      display: flex;
      flex-direction: column;
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 10px;
      padding: 20px;
      text-decoration: none;
      color: #1f2937;
      transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
      cursor: pointer;
    }
    .services-index-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 24px rgba(0,0,0,0.09);
      border-color: #F7B06A;
      color: #1f2937;
    }
    .services-index-card-icon {
      width: 44px;
      height: 44px;
      border-radius: 8px;
      background: linear-gradient(135deg, rgba(79,196,240,0.12) 0%, rgba(247,176,106,0.12) 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #4FC4F0;
      margin-bottom: 12px;
      flex-shrink: 0;
    }
    .services-index-card-body h3 {
      font-size: 15px;
      font-weight: 700;
      margin: 0 0 6px 0;
      color: #1f2937;
    }
    .services-index-card-body p {
      font-size: 13px;
      color: #6b7280;
      margin: 0 0 12px 0;
      line-height: 1.5;
      flex: 1;
    }
    .services-index-card-price {
      font-size: 12px;
      font-weight: 600;
      color: #1A7FAA;
    }

    /* "What We Do" grid: 4 cards balanced in one row on desktop,
       2x2 on tablet, stacked on mobile. Overrides the 3-up .cards-row
       flex sizing (min/max-width, flex:1) so the grid controls width. */
    .wwd-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1rem;
    }
    .wwd-grid .card {
      min-width: 0;
      max-width: none;
      flex: none;
    }
    .wwd-grid .card p {
      font-size: 15px;
      line-height: 1.6;
    }
    @media (max-width: 900px) {
      .wwd-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 560px) {
      .wwd-grid { grid-template-columns: 1fr; }
    }
    /* ===== Homepage v2 (feat/homepage-refresh) ===== */
    body{padding-top:60px}
    .hp{--hp-blue:#1A7FAA;--hp-blue-dk:#176E96;--hp-sky:#4FC4F0;--hp-orange:#F7B06A;--hp-ink:#1F2937;--hp-slate:#475569;--hp-line:#e5e7eb;--hp-bg:#f4f6f8;color:var(--hp-ink)}
    .hp *{box-sizing:border-box}
    .hp-wrap{max-width:1100px;margin:0 auto;padding:0 24px}
    :where(.hp) h1,:where(.hp) h2,:where(.hp) h3{margin:0}
    .hp h1,.hp h2,.hp h3{font-family:var(--font-heading);font-weight:700;color:var(--hp-ink);text-shadow:none}
    :where(.hp) p{margin:0}
    .hp-eyebrow{font-size:13px;font-weight:500;letter-spacing:.08em;text-transform:uppercase;color:var(--hp-blue);margin-bottom:16px}
    .hp-lede{font-size:19px;line-height:1.65;color:var(--hp-slate);max-width:34em}

    /* hero: overrides the legacy photo-header rule in the critical CSS */
    .hp header.hp-hero{background:radial-gradient(60% 80% at 100% 0%,rgba(79,196,240,.18),transparent 70%),radial-gradient(50% 70% at 0% 100%,rgba(247,176,106,.16),transparent 70%),#fff;color:var(--hp-ink);text-align:left;padding:56px 0 72px;position:relative}
    .hp-hero::after{content:"";position:absolute;left:0;right:0;bottom:0;height:4px;background:linear-gradient(to right,#4FC4F0,#F7B06A)}
    .hp-hero-grid{display:grid;grid-template-columns:1.15fr .85fr;gap:56px;align-items:center}
    .hp-hero h1{font-size:clamp(2.1rem,5.2vw,3.5rem);line-height:1.1;letter-spacing:-.02em;margin-bottom:24px}
    .hp-lede{margin-bottom:32px}
    .hp-cta-row{display:flex;flex-wrap:wrap;gap:12px 16px;margin-bottom:36px}
    .hp-btn{display:inline-flex;align-items:center;justify-content:center;min-height:48px;padding:0 24px;border-radius:8px;font-weight:500;font-size:16px;text-decoration:none;transition:background-color .15s,box-shadow .15s,border-color .15s;cursor:pointer;border:1px solid transparent}
    .hp-btn-primary{background:var(--hp-blue);color:#fff;box-shadow:0 1px 2px rgba(16,24,40,.12)}
    .hp-btn-primary:hover{background:var(--hp-blue-dk);color:#fff;box-shadow:0 4px 12px rgba(26,127,170,.3)}
    .hp-btn-ghost{background:#fff;color:var(--hp-ink);border-color:#cbd5e1}
    .hp-btn-ghost:hover{border-color:var(--hp-blue);color:var(--hp-blue)}
    .hp a:focus-visible,.hp button:focus-visible{outline:3px solid var(--hp-sky);outline-offset:2px;border-radius:6px}
    .hp-hero-offers{list-style:none;margin:0;padding:0;display:flex;flex-wrap:wrap;gap:12px 28px}
    .hp-hero-offers a{display:block;text-decoration:none;color:var(--hp-slate);font-size:15px;line-height:1.4;padding-left:14px;border-left:3px solid var(--hp-orange)}
    .hp-hero-offers a span{display:block;font-weight:500;color:var(--hp-ink);font-size:16px}
    .hp-hero-offers a:hover span{color:var(--hp-blue)}

    .hp-hero-panel{background:#fff;border:1px solid var(--hp-line);border-radius:16px;padding:28px;box-shadow:0 20px 40px -16px rgba(16,24,40,.18),0 2px 6px rgba(16,24,40,.05)}
    .hp-panel-title{font-size:13px;font-weight:500;letter-spacing:.08em;text-transform:uppercase;color:var(--hp-slate);margin-bottom:20px}
    .hp-steps{list-style:none;margin:0;padding:0;display:grid;gap:20px}
    .hp-steps li{display:flex;gap:16px;align-items:flex-start}
    .hp-step-n{flex:none;width:32px;height:32px;border-radius:50%;background:rgba(79,196,240,.16);color:var(--hp-blue);font-weight:700;display:flex;align-items:center;justify-content:center;font-size:15px}
    .hp-steps strong{display:block;font-weight:700;font-family:var(--font-heading);font-size:17px;color:var(--hp-ink);margin-bottom:2px}
    .hp-steps p{font-size:15px;line-height:1.55;color:var(--hp-slate)}
    .hp-panel-foot{margin-top:24px;padding-top:16px;border-top:1px solid var(--hp-line);font-size:14px;color:var(--hp-slate)}

    /* bands */
    .hp-band{background:var(--hp-bg);padding:88px 0}
    .hp-head{max-width:40em;margin-bottom:48px}
    .hp-head h2{font-size:clamp(1.7rem,3.6vw,2.4rem);line-height:1.2;letter-spacing:-.01em}
    .hp-sub{margin-top:16px;font-size:18px;color:var(--hp-slate);line-height:1.6}

    .hp-offer-grid{display:grid;grid-template-columns:1fr 1fr;gap:24px}
    .hp-offer{background:#fff;border:1px solid var(--hp-line);border-top:4px solid var(--hp-sky);border-radius:14px;padding:36px;display:flex;flex-direction:column;box-shadow:0 1px 3px rgba(16,24,40,.05)}
    .hp-offer + .hp-offer{border-top-color:var(--hp-orange)}
    .hp-offer-icon{width:48px;height:48px;border-radius:10px;background:rgba(79,196,240,.16);color:var(--hp-blue);display:flex;align-items:center;justify-content:center;margin-bottom:20px}
    .hp-offer-icon-alt{background:rgba(247,176,106,.22);color:#8a4b0a}
    .hp-offer h3{font-size:1.65rem;margin-bottom:8px}
    .hp-offer-tag{font-size:17px;color:var(--hp-slate);line-height:1.55;margin-bottom:20px}
    .hp-checks{list-style:none;margin:0 0 24px;padding:0;display:grid;gap:10px}
    .hp-checks li{position:relative;padding-left:28px;font-size:16px;line-height:1.55}
    .hp-checks li::before{content:"";position:absolute;left:0;top:.45em;width:16px;height:9px;border-left:2.5px solid var(--hp-blue);border-bottom:2.5px solid var(--hp-blue);transform:rotate(-45deg) scale(.85);transform-origin:center}
    .hp-proof{background:var(--hp-bg);border-radius:10px;padding:18px 20px;margin-bottom:28px}
    .hp-proof-label{font-size:12px;font-weight:500;letter-spacing:.08em;text-transform:uppercase;color:var(--hp-slate);margin-bottom:8px}
    .hp-proof ul{margin:0;padding-left:18px;font-size:15px;line-height:1.6;color:var(--hp-ink)}
    .hp-offer-cta{margin-top:auto;display:flex;flex-wrap:wrap;align-items:center;gap:12px 20px}
    .hp-link{background:none;border:0;padding:8px 0;font:inherit;font-size:15px;font-weight:500;color:var(--hp-blue);cursor:pointer;text-decoration:underline;text-underline-offset:3px}
    .hp-link:hover{color:var(--hp-blue-dk)}

    /* built */
    .hp-built{padding-top:88px;padding-bottom:40px}
    .hp-feature{display:grid;grid-template-columns:1.2fr .8fr;gap:32px;align-items:center;text-decoration:none;color:var(--hp-ink);background:linear-gradient(135deg,rgba(79,196,240,.10),rgba(247,176,106,.12));border:1px solid var(--hp-line);border-radius:16px;padding:36px;margin-bottom:24px;transition:box-shadow .2s,border-color .2s,transform .2s}
    .hp-feature:hover{box-shadow:0 12px 32px -12px rgba(16,24,40,.2);border-color:var(--hp-sky);transform:translateY(-2px);color:var(--hp-ink)}
    .hp-badge{display:inline-block;background:var(--hp-orange);color:var(--hp-ink);font-size:12px;font-weight:500;letter-spacing:.06em;text-transform:uppercase;padding:4px 10px;border-radius:999px;margin-bottom:14px}
    .hp-feature h3{font-size:2rem;margin-bottom:6px}
    .hp-feature-tag{font-size:18px;font-weight:500;color:var(--hp-blue);margin-bottom:12px}
    .hp-feature p{line-height:1.65}
    .hp-feature-art{background:#fff;border-radius:12px;padding:32px;display:flex;align-items:center;justify-content:center;border:1px solid var(--hp-line)}
    .hp-feature-art img{max-width:100%;height:auto}
    .hp-more{display:inline-flex;align-items:center;gap:6px;margin-top:14px;font-weight:500;font-size:15px;color:var(--hp-blue)}
    .hp-product-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
    .hp-product{display:flex;flex-direction:column;background:#fff;border:1px solid var(--hp-line);border-radius:12px;padding:24px;text-decoration:none;color:var(--hp-ink);transition:box-shadow .2s,border-color .2s,transform .2s}
    a.hp-product:hover{box-shadow:0 8px 24px -8px rgba(16,24,40,.18);border-color:var(--hp-sky);transform:translateY(-2px);color:var(--hp-ink)}
    .hp-product-icon{width:40px;height:40px;border-radius:8px;background:rgba(79,196,240,.16);color:var(--hp-blue);display:flex;align-items:center;justify-content:center;margin-bottom:14px}
    .hp-product h3{font-size:1.15rem;margin-bottom:8px}
    .hp-product p{font-size:15px;line-height:1.6;color:var(--hp-slate);flex:1}
    .hp-product .hp-more,.hp-status{margin-top:14px}
    .hp-status{font-size:14px;color:var(--hp-slate)}
    .hp-status-inline{display:inline-block;vertical-align:middle;margin-left:6px;font-family:var(--font-body);font-size:12px;font-weight:500;color:var(--hp-slate);background:var(--hp-bg);border:1px solid var(--hp-line);padding:2px 8px;border-radius:999px}
    .hp-note{margin-top:32px;text-align:center;font-size:15px;color:var(--hp-slate)}
    .hp-note a{color:var(--hp-blue);font-weight:500}

    /* projects section keeps its own styles; align spacing */
    .hp .projects-section{padding-top:56px}

    @media (max-width:900px){
      .hp-hero-grid{grid-template-columns:1fr;gap:40px}
      .hp-offer-grid{grid-template-columns:1fr}
      .hp-product-grid{grid-template-columns:1fr}
      .hp-feature{grid-template-columns:1fr;padding:28px}
      .hp-feature-art{order:-1;padding:20px}
      .hp-feature-art img{max-width:200px}
    }
    @media (max-width:560px){
      .hp-wrap{padding:0 18px}
      .hp .hp-hero{padding:40px 0 56px}
      .hp-band{padding:64px 0}
      .hp-offer{padding:26px 22px}
      .hp-btn{width:100%}
      .hp-offer-cta .hp-btn{width:auto;flex:1 1 100%}
      .hp-lede{font-size:17px}
    }
    @media (prefers-reduced-motion:reduce){.hp-feature,.hp-product,.hp-btn{transition:none}.hp-feature:hover,a.hp-product:hover{transform:none}}
  </style>
</head>
<body>
<?php
$header_always_visible = true;
$header_chat_action = 'openContactModal()';
include __DIR__ . '/partials/site-header.php';
?>

<div id="header-sentinel"></div>
<main class="hp">
<header id="mainHeader" class="hp-hero">
  <div class="hp-wrap hp-hero-grid">
    <div class="hp-hero-copy">
      <p class="hp-eyebrow">AI-Directed Engineering</p>
      <h1>A real engineer, directing AI, shipping real software.</h1>
      <p class="hp-lede">I own the architecture, the security, and the final call. AI does the heavy lifting under that direction, so you get senior judgment and agency-scale output without the agency overhead.</p>
      <div class="hp-cta-row">
        <a href="/book" class="hp-btn hp-btn-primary">Book a call</a>
        <a href="#built" class="hp-btn hp-btn-ghost">See what we've built</a>
      </div>
      <ul class="hp-hero-offers" aria-label="What we do">
        <li><a href="#fractional-cto"><span>Fractional CTO</span> Technical leadership, part-time</a></li>
        <li><a href="#custom-development"><span>Custom Development</span> Software built and shipped</a></li>
      </ul>
    </div>
    <aside class="hp-hero-panel" aria-label="How the work gets done">
      <p class="hp-panel-title">How the work gets done</p>
      <ol class="hp-steps">
        <li>
          <span class="hp-step-n" aria-hidden="true">1</span>
          <div><strong>Engineer decides</strong><p>Architecture, security, and tradeoffs are human calls, made up front.</p></div>
        </li>
        <li>
          <span class="hp-step-n" aria-hidden="true">2</span>
          <div><strong>AI builds, fast</strong><p>Drafts, tests, and refactors at a speed a solo engineer can't match alone.</p></div>
        </li>
        <li>
          <span class="hp-step-n" aria-hidden="true">3</span>
          <div><strong>Engineer reviews and ships</strong><p>Every change is reviewed against real standards before it goes live.</p></div>
        </li>
      </ol>
      <p class="hp-panel-foot">Receipts over hype. See the work below.</p>
    </aside>
  </div>
</header>


<!-- Contact Modal -->
<div id="contactModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden" style="z-index:10000;" role="dialog" aria-modal="true" aria-labelledby="contactModalTitle">
  <div id="contactModalCard" class="bg-white rounded-lg shadow-xl max-w-md w-full relative flex flex-col" style="max-height:90vh;max-height:90dvh;">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100 flex-shrink-0">
      <h2 id="contactModalTitle" class="text-xl font-semibold">Contact Us</h2>
      <button type="button" onclick="closeModal()" aria-label="Close"
        class="text-gray-500 hover:text-gray-800 text-3xl leading-none w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100">
        &times;
      </button>
    </div>
    <div class="overflow-y-auto px-6 py-4" style="overscroll-behavior:contain;-webkit-overflow-scrolling:touch;">
    <form id="contactForm" class="space-y-4">
      <label class="block">
        <span class="text-gray-700 font-medium">Name</span>
        <input type="text" name="name" required
          class="mt-1 w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50
          focus:bg-white focus:border-[#4FC4F0] focus:ring-2 focus:ring-[#4FC4F0]/20
          outline-none transition-all duration-200" />
      </label>
      <label class="block">
        <span class="text-gray-700 font-medium">Email</span>
        <input type="email" name="email" id="email"
          class="mt-1 w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50
          focus:bg-white focus:border-[#4FC4F0] focus:ring-2 focus:ring-[#4FC4F0]/20
          outline-none transition-all duration-200" />
        <span id="emailError" class="text-red-500 text-sm mt-1 hidden"></span>
      </label>
      <label class="block">
        <span class="text-gray-700 font-medium">Phone</span>
        <input type="tel" name="phone" id="phone" required
          maxlength="14"
          inputmode="numeric"
          placeholder="(555) 555-5555"
          class="mt-1 w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50
          focus:bg-white focus:border-[#4FC4F0] focus:ring-2 focus:ring-[#4FC4F0]/20
          outline-none transition-all duration-200" />
        <span id="phoneError" class="text-red-500 text-sm mt-1 hidden"></span>
      </label>
      <label class="block">
        <span class="text-gray-700 font-medium">What is your project?</span>
        <textarea name="need" required rows="3"
          class="mt-1 w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50
          focus:bg-white focus:border-[#4FC4F0] focus:ring-2 focus:ring-[#4FC4F0]/20
          outline-none transition-all duration-200 resize-none"></textarea>
      </label>
      <div>
        <span class="block text-gray-700 font-medium mb-2">Preferred Contact</span>
        <div class="flex gap-6">
          <label class="flex items-center gap-2 cursor-pointer group">
            <input type="radio" name="contact_method" value="email" checked
              class="w-4 h-4 accent-[#4FC4F0]">
            <span class="text-gray-600 group-hover:text-gray-900 transition-colors">Email</span>
          </label>
          <label class="flex items-center gap-2 cursor-pointer group">
            <input type="radio" name="contact_method" value="sms"
              class="w-4 h-4 accent-[#4FC4F0]">
            <span class="text-gray-600 group-hover:text-gray-900 transition-colors">Text</span>
          </label>
        </div>
        <p class="text-xs text-gray-500 mt-2 leading-snug">
          By selecting <strong>Text</strong>, you agree to receive SMS from Serendipity Technology at the number provided (replies to your inquiry plus appointment and project updates). Msg frequency varies. Msg &amp; data rates may apply. Reply STOP to cancel, HELP for help. Consent is not a condition of purchase, and we never share your number. See our <a href="/terms.php" class="underline hover:text-gray-700">Terms</a> and <a href="/privacy-policy.php" class="underline hover:text-gray-700">Privacy Policy</a>.
        </p>
      </div>
      <div id="turnstileWidget" class="cf-turnstile" data-sitekey="0x4AAAAAACWJ-_uz-IpGJG0B" data-theme="light"></div>
    </form>
    <div id="formSuccess" class="text-green-600 mt-4 hidden">Thanks! Your message has been sent.</div>
    </div>
    <div class="px-6 py-3 border-t border-gray-100 bg-white rounded-b-lg flex-shrink-0" style="padding-bottom:max(0.75rem,env(safe-area-inset-bottom));">
      <button type="submit" id="contactSubmit" form="contactForm"
        class="w-full py-3 px-4 rounded-lg font-semibold text-white
        bg-[#1A7FAA] hover:bg-[#176E96]
        shadow-md hover:shadow-lg
        transition-all duration-200">
        Send Message
      </button>
    </div>
  </div>
</div>
<div class="hp-band" id="offerings">
  <div class="hp-wrap">
    <div class="hp-head">
      <p class="hp-eyebrow">Two ways to work together</p>
      <h2>Strategy when you need judgment. Software when you need it built.</h2>
    </div>
    <div class="hp-offer-grid">
      <article class="hp-offer" id="fractional-cto">
        <div class="hp-offer-icon" aria-hidden="true">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l9 5-9 5-9-5 9-5z"/><path d="M3 12l9 5 9-5"/><path d="M3 17l9 5 9-5"/></svg>
        </div>
        <h3>Fractional CTO</h3>
        <p class="hp-offer-tag">Strategic technical leadership for organizations that can't hire a full-time CTO.</p>
        <ul class="hp-checks">
          <li>Technology strategy, roadmap, and vendor decisions you can defend</li>
          <li>Architecture and security review before money gets spent</li>
          <li>Hiring, contractor oversight, and honest build-versus-buy advice</li>
          <li>AI adoption that fits your organization, not a trend</li>
        </ul>
        <div class="hp-proof">
          <p class="hp-proof-label">Where the experience comes from</p>
          <ul>
            <li>PowerSchool, supporting 150+ school districts</li>
            <li>Elected City Commissioner, so public-sector constraints are familiar</li>
            <li>Vice Chair of the FDDC, running technology for a statewide political organization</li>
          </ul>
        </div>
        <div class="hp-offer-cta">
          <a href="/book" class="hp-btn hp-btn-primary">Book a call</a>
          <button type="button" class="hp-link" onclick="openContactModal()">Or send a message</button>
        </div>
      </article>

      <article class="hp-offer" id="custom-development">
        <div class="hp-offer-icon hp-offer-icon-alt" aria-hidden="true">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/><line x1="14" y1="4" x2="10" y2="20"/></svg>
        </div>
        <h3>Custom Development</h3>
        <p class="hp-offer-tag">We build the real software, AI-accelerated and engineered to last.</p>
        <ul class="hp-checks">
          <li>Web apps, internal tools, and portals built around how you actually work</li>
          <li>Workflow automation and data integration across the tools you already use</li>
          <li>Payments, messaging, and reporting wired in properly, not bolted on</li>
          <li>You own the code and the data, with no vendor lock-in</li>
        </ul>
        <div class="hp-proof">
          <p class="hp-proof-label">What you get from the approach</p>
          <ul>
            <li>Working software in weeks, not quarters</li>
            <li>Senior engineering review on every release</li>
            <li>Plain-English updates, no jargon</li>
          </ul>
        </div>
        <div class="hp-offer-cta">
          <a href="/book" class="hp-btn hp-btn-primary">Book a call</a>
          <button type="button" class="hp-link" onclick="openContactModal()">Or tell us what you need</button>
        </div>
      </article>
    </div>
  </div>
</div>

<div class="hp-wrap hp-built" id="built">
  <div class="hp-head">
    <p class="hp-eyebrow">What we've built</p>
    <h2>Proof that we ship.</h2>
    <p class="hp-sub">These are products we designed, built, and run ourselves. They are the output of the approach above.</p>
  </div>

  <a href="/services/upfront" class="hp-feature">
    <div class="hp-feature-copy">
      <span class="hp-badge">Featured product</span>
      <h3>Upfront</h3>
      <p class="hp-feature-tag">Quotes to payment for service businesses.</p>
      <p>Send a custom estimate, get it approved, and get paid, all on one page with your brand on it. Money goes straight to your own Stripe account.</p>
      <span class="hp-more">Explore Upfront <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
    </div>
    <div class="hp-feature-art">
      <img src="img/upfront/upfront-wordmark-560.png" alt="Upfront" width="280" loading="lazy">
    </div>
  </a>

  <div class="hp-product-grid">
    <a href="/project.php?slug=custom-membership-platform" class="hp-product">
      <div class="hp-product-icon" aria-hidden="true"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
      <h3>Membership Database</h3>
      <p>A multitenant membership platform for clubs, chapters, and nonprofits: dues, events, volunteer hours, and reporting, with each organization's data kept separate.</p>
      <span class="hp-more">Read the case study</span>
    </a>
    <div class="hp-product">
      <div class="hp-product-icon" aria-hidden="true"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
      <h3>Voter Engagement Platform</h3>
      <p>PrecinctWins: voter data and outreach tools for campaigns, party committees, and the volunteers who run them.</p>
      <span class="hp-status">Details coming soon</span>
    </div>
    <a href="/project.php?slug=cancer-card" class="hp-product hp-product-quiet">
      <div class="hp-product-icon" aria-hidden="true"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div>
      <h3>Cancer Card <span class="hp-status-inline">In development</span></h3>
      <p>A mobile app that makes asking for help during cancer treatment a simple, low-guilt exchange. An early build, shown here as a capability example.</p>
      <span class="hp-more">Read more</span>
    </a>
  </div>

  <p class="hp-note">Looking for a ready-made site, check-in, or membership portal? <a href="/services/">See our packaged services</a>.</p>
</div>

<section class="projects-section" id="projects">
  <h2 class="section-title" style="color: #B3701A;">Recent Projects</h2>

  <!-- Featured Projects (dynamically rendered from /projects/*.md) -->
  <div class="featured-projects">
    <?php $delay = 0; foreach ($featuredProjects as $project): $meta = $project['meta']; ?>
    <a href="project.php?slug=<?= htmlspecialchars($meta['slug']) ?>" class="featured-card" data-aos="fade-up"<?= $delay ? " data-aos-delay=\"$delay\"" : '' ?>>
      <div class="featured-badge">Featured</div>
      <div class="featured-content">
        <div class="featured-icon">
          <img src="img/<?= htmlspecialchars($meta['icon'] ?? 'default.svg') ?>" alt="<?= htmlspecialchars($meta['title']) ?> icon" />
        </div>
        <div class="featured-text">
          <h3><?= htmlspecialchars($meta['title']) ?></h3>
          <p><?= htmlspecialchars($meta['summary'] ?? '') ?></p>
        </div>
      </div>
      <div class="featured-accent"></div>
    </a>
    <?php $delay += 100; endforeach; ?>
  </div>

  <!-- Project Grid (dynamically rendered from /projects/*.md) -->
  <div class="projects-grid" id="projectsGrid">
    <?php
    $delay = 150;
    $gridArray = array_values($gridProjects); // Re-index array
    $visibleCount = 3; // Show first 3, hide the rest
    foreach ($gridArray as $i => $project):
      $meta = $project['meta'];
      $hiddenClass = $i >= $visibleCount ? ' hidden-project' : '';
    ?>
    <a href="project.php?slug=<?= htmlspecialchars($meta['slug']) ?>" class="project-card<?= $hiddenClass ?>" data-aos="fade-up"<?= $i < $visibleCount ? " data-aos-delay=\"$delay\"" : '' ?>>
      <div class="project-icon">
        <img src="img/<?= htmlspecialchars($meta['icon'] ?? 'default.svg') ?>" alt="<?= htmlspecialchars($meta['title']) ?> icon" />
      </div>
      <div class="project-text">
        <h4><?= htmlspecialchars($meta['title']) ?></h4>
        <p><?= htmlspecialchars($meta['summary'] ?? '') ?></p>
      </div>
    </a>
    <?php $delay += 50; endforeach; ?>
  </div>

  <!-- View All Button (only show if there are hidden projects) -->
  <?php if (count($gridArray) > $visibleCount): ?>
  <div class="projects-toggle" data-aos="fade-up" data-aos-delay="300">
    <button id="toggleProjects" class="toggle-btn" onclick="toggleProjects()">
      <span class="toggle-text">View All Projects</span>
      <svg class="toggle-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="6 9 12 15 18 9"></polyline>
      </svg>
    </button>
  </div>
  <?php endif; ?>
</section>
</main>
<?php include __DIR__ . '/partials/site-footer.php'; ?>

<script>
function openModal() {
  document.getElementById("contactModal").classList.remove("hidden");
  document.body.style.overflow = "hidden";
}

function closeModal() {
  document.getElementById("contactModal").classList.add("hidden");
  document.body.style.overflow = "";
  document.getElementById("formSuccess").classList.add("hidden");
  document.getElementById("contactForm").reset();
  // Reset Turnstile so the next time the modal opens the user gets a fresh challenge
  if (typeof turnstile !== 'undefined') {
    try { turnstile.reset('#turnstileWidget'); } catch (e) {
      try { turnstile.reset(); } catch (_) {}
    }
  }
}

// Close on backdrop click and Escape
document.getElementById("contactModal").addEventListener("click", function (e) {
  if (e.target === this) closeModal();
});
document.addEventListener("keydown", function (e) {
  var m = document.getElementById("contactModal");
  if (e.key === "Escape" && !m.classList.contains("hidden")) closeModal();
});

// Alias so openContactModal() (used by site-header partial) triggers the same modal
window.openContactModal = openModal;

// Phone number formatting and validation
const phoneInput = document.getElementById('phone');
phoneInput.addEventListener('input', function(e) {
  // Strip non-digits
  let digits = e.target.value.replace(/\D/g, '');

  // Limit to 10 digits
  if (digits.length > 10) digits = digits.slice(0, 10);

  // Format as (XXX) XXX-XXXX
  let formatted = '';
  if (digits.length > 0) formatted = '(' + digits.slice(0, 3);
  if (digits.length >= 3) formatted += ') ' + digits.slice(3, 6);
  if (digits.length >= 6) formatted += '-' + digits.slice(6, 10);

  e.target.value = formatted;
  validatePhone();
});

function validatePhone() {
  const phone = document.getElementById('phone');
  const error = document.getElementById('phoneError');
  const digits = phone.value.replace(/\D/g, '');

  if (digits.length === 0) {
    error.textContent = 'Phone number is required';
    error.classList.remove('hidden');
    return false;
  } else if (digits.length < 10) {
    error.textContent = 'Please enter a complete 10-digit phone number';
    error.classList.remove('hidden');
    return false;
  }

  error.classList.add('hidden');
  return true;
}

// Email validation
function validateEmail() {
  const email = document.getElementById('email');
  const error = document.getElementById('emailError');
  const contactMethod = document.querySelector('input[name="contact_method"]:checked').value;

  // Email required if contact method is email
  if (contactMethod === 'email' && !email.value.trim()) {
    error.textContent = 'Email is required when choosing email contact';
    error.classList.remove('hidden');
    return false;
  }

  // Validate email format if provided
  if (email.value.trim()) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value)) {
      error.textContent = 'Please enter a valid email address';
      error.classList.remove('hidden');
      return false;
    }
  }

  error.classList.add('hidden');
  return true;
}

// Re-validate email when contact method changes
document.querySelectorAll('input[name="contact_method"]').forEach(radio => {
  radio.addEventListener('change', validateEmail);
});

document.getElementById('email').addEventListener('blur', validateEmail);

// Handle form submission with proper error handling
document.getElementById('contactForm').addEventListener('submit', async function(e) {
  e.preventDefault();

  // Validate before submitting
  const phoneValid = validatePhone();
  const emailValid = validateEmail();

  if (!phoneValid || !emailValid) {
    return;
  }

  const form = e.target;
  const submitBtn = document.getElementById('contactSubmit');
  const successMsg = document.getElementById('formSuccess');
  const errorMsg = document.getElementById('formError');

  // Disable button and show loading state
  const originalText = submitBtn.textContent;
  submitBtn.disabled = true;
  submitBtn.textContent = 'Sending...';

  // Hide any previous messages
  successMsg.classList.add('hidden');
  if (errorMsg) errorMsg.classList.add('hidden');

  try {
    // Create form data and convert phone to digits only for backend
    const formData = new FormData(form);
    const phoneDigits = document.getElementById('phone').value.replace(/\D/g, '');
    formData.set('phone', phoneDigits);

    const res = await fetch('contact_twilio.php', {
      method: 'POST',
      body: formData
    });

    const data = await res.json();

    if (res.ok && data.status === 'ok') {
      if (typeof gtag === 'function') { gtag('event', 'generate_lead', { form_location: 'homepage_contact' }); }
      successMsg.classList.remove('hidden');
      successMsg.scrollIntoView({ block: 'nearest' });
      setTimeout(() => closeModal(), 3000);
    } else {
      showFormError(data.message || 'Something went wrong. Please try again.');
    }
  } catch (err) {
    showFormError('Network error. Please check your connection and try again.');
  } finally {
    submitBtn.disabled = false;
    submitBtn.textContent = originalText;
    // Reset Turnstile widget — the token is single-use, so we need a fresh
    // challenge before the user can submit again. Without this, a second
    // submission from the same modal session fails captcha validation.
    if (typeof turnstile !== 'undefined') {
      try {
        turnstile.reset('#turnstileWidget');
      } catch (e) {
        // Fallback: reset all widgets on the page
        try { turnstile.reset(); } catch (_) {}
      }
    }
  }
});

function showFormError(message) {
  let errorMsg = document.getElementById('formError');
  if (!errorMsg) {
    errorMsg = document.createElement('div');
    errorMsg.id = 'formError';
    errorMsg.className = 'text-red-600 mt-4';
    document.getElementById('formSuccess').after(errorMsg);
  }
  errorMsg.textContent = message;
  errorMsg.classList.remove('hidden');
  errorMsg.scrollIntoView({ block: 'nearest' });
}


// Scroll listener is handled by site-header.php partial

// Projects toggle functionality
function toggleProjects() {
  const grid = document.getElementById('projectsGrid');
  const btn = document.getElementById('toggleProjects');
  const text = btn.querySelector('.toggle-text');
  const icon = btn.querySelector('.toggle-icon');

  grid.classList.toggle('expanded');

  if (grid.classList.contains('expanded')) {
    text.textContent = 'Show Less';
    icon.style.transform = 'rotate(180deg)';
    // Trigger AOS for newly visible cards
    AOS.refresh();
  } else {
    text.textContent = 'View All Projects';
    icon.style.transform = 'rotate(0deg)';
  }
}
</script>

</body>
</html>