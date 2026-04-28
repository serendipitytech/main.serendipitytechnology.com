<?php
/**
 * /services/ — Services Catalog Index
 *
 * Overview of all four productized services with links to each.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services — Serendipity Technology</title>
  <meta name="description" content="Ready-to-launch productized services from Serendipity Technology. Business websites, candidate sites, event check-in, and membership portals — deployed in days.">
  <link rel="icon" href="/img/logos/serendipity_icon_150.png">

  <!-- Open Graph -->
  <meta property="og:title" content="Services — Serendipity Technology">
  <meta property="og:description" content="Ready-to-launch solutions, no custom build required. Built and proven, deployed for you within days.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://serendipitytechnology.com/services/">
  <meta property="og:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png">

  <link rel="canonical" href="https://serendipitytechnology.com/services/">

  <?php include __DIR__ . '/partials/service-styles.php'; ?>
  <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
  <style>
    .svc-custom-block {
      background: var(--svc-bg-alt);
      border: 1px solid var(--svc-border);
      border-radius: var(--svc-radius-lg);
      padding: 40px 32px;
      text-align: center;
      margin-top: 48px;
    }
    .svc-custom-block h3 {
      font-family: "Gill Sans", "Gill Sans MT", 'Roboto', sans-serif;
      font-size: 24px;
      font-weight: 700;
      color: var(--svc-text);
      margin: 0 0 8px 0;
    }
    .svc-custom-block p {
      font-size: 15px;
      color: var(--svc-text-muted);
      margin: 0 0 24px 0;
      max-width: 540px;
      margin-left: auto;
      margin-right: auto;
    }
    .svc-custom-actions {
      display: flex;
      gap: 12px;
      justify-content: center;
      flex-wrap: wrap;
    }
  </style>
</head>
<body class="svc-page has-fixed-header">

<?php
$header_always_visible = true;
$header_chat_action = 'openContactModal()';
include __DIR__ . '/../partials/site-header.php';
?>

<?php
/* ============ HERO ============ */
$hero_eyebrow        = 'Services';
$hero_title          = 'Ready-to-launch solutions, no custom build required';
$hero_lede           = 'Productized services from Serendipity Technology — built and proven, deployed for you within days.';
$hero_cta_text       = 'View Custom Projects';
$hero_cta_href       = '/projects.php';
$hero_secondary_text = 'Get in Touch';
$hero_secondary_href = 'javascript:openContactModal()';
unset($hero_bg_image, $hero_accent_text, $hero_accent_href);
include __DIR__ . '/partials/service-hero.php';
?>

<!-- Services Grid -->
<section class="svc-section" id="services">
  <div class="svc-container">
    <div class="svc-text-center">
      <h2 class="svc-h2 svc-h2-center">Our Productized Services</h2>
      <p class="svc-lede svc-text-center" style="margin-left:auto;margin-right:auto;">Four services, each built to be deployed quickly. No discovery phase, no months of back-and-forth — pick the one that fits and we get started.</p>
    </div>

    <?php
    $services_grid_items = [
      [
        'icon'    => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
        'name'    => 'Business Sites',
        'tagline' => 'Professionally managed websites with AI-powered content updates and business email. Submit a change and it goes live overnight.',
        'price'   => 'From $10/mo + $49 setup',
        'href'    => '/services/business-sites',
      ],
      [
        'icon'    => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
        'name'    => 'Candidate Sites',
        'tagline' => 'Single-page campaign websites with custom domain, branded email, and unlimited content updates throughout your campaign season.',
        'price'   => '$20/mo + $49 setup',
        'href'    => '/services/candidates',
      ],
      [
        'icon'    => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>',
        'name'    => 'Event Check-In',
        'tagline' => 'Real-time multi-device check-in for galas, conferences, and private events. Roster import, live dashboard, and day-of remote support included.',
        'price'   => '$499 per event',
        'href'    => '/services/event-checkin',
      ],
      [
        'icon'    => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
        'name'    => 'Membership Portal',
        'tagline' => 'Unlimited members, events, and admins. Flat monthly pricing — no per-seat fees. Built for clubs, nonprofits, and associations.',
        'price'   => '$49/mo + $199 setup',
        'href'    => '/services/membership',
      ],
    ];
    include __DIR__ . '/partials/service-grid.php';
    ?>

    <!-- Custom Work Block -->
    <div class="svc-custom-block">
      <h3>Need something custom?</h3>
      <p>The productized services above cover the most common needs — but not every problem fits a packaged solution. If you need something purpose-built, we do that too.</p>
      <div class="svc-custom-actions">
        <a href="/projects.php" class="svc-btn svc-btn-primary svc-btn-lg">
          View Custom Projects
        </a>
        <a href="javascript:openContactModal()" class="svc-btn svc-btn-secondary svc-btn-lg">
          Let's Talk
        </a>
      </div>
    </div>

  </div>
</section>

<?php include __DIR__ . '/../partials/site-footer.php'; ?>
<?php include __DIR__ . '/../partials/site-contact-modal.php'; ?>

</body>
</html>
