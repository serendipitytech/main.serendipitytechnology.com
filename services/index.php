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
<body class="svc-page">

<?php
/* ============ HERO ============ */
$hero_eyebrow        = 'Services';
$hero_title          = 'Ready-to-launch solutions, no custom build required';
$hero_lede           = 'Productized services from Serendipity Technology — built and proven, deployed for you within days.';
$hero_cta_text       = 'View Custom Projects';
$hero_cta_href       = '/projects.php';
$hero_secondary_text = 'Get in Touch';
$hero_secondary_href = 'javascript:openServicesContactModal()';
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
        <a href="javascript:openServicesContactModal()" class="svc-btn svc-btn-secondary svc-btn-lg">
          Let's Talk
        </a>
      </div>
    </div>

  </div>
</section>

<footer style="border-top:1px solid var(--svc-border); padding:32px 0; text-align:center; font-size:13px; color:var(--svc-text-muted);">
  <div class="svc-container">
    <p style="margin:0 0 8px 0;">
      <a href="/" style="color:inherit; text-decoration:none;">Serendipity Technology</a>
      &middot;
      <a href="/services/business-sites" style="color:inherit; text-decoration:none;">Business Sites</a>
      &middot;
      <a href="/services/candidates" style="color:inherit; text-decoration:none;">Candidate Sites</a>
      &middot;
      <a href="/services/event-checkin" style="color:inherit; text-decoration:none;">Event Check-In</a>
      &middot;
      <a href="/services/membership" style="color:inherit; text-decoration:none;">Membership Portal</a>
    </p>
    <p style="margin:0;">&copy; <?= date('Y') ?> Serendipity Technology. Custom solutions for real problems.</p>
  </div>
</footer>

<!-- Generic contact modal for this page -->
<div id="servicesContactModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:1000; overflow-y:auto;">
  <div style="min-height:100%; display:flex; align-items:flex-start; justify-content:center; padding:32px 16px;">
    <div style="background:#fff; border-radius:12px; box-shadow:0 20px 60px rgba(0,0,0,0.2); width:100%; max-width:560px; position:relative;">
      <div style="position:sticky; top:0; background:#fff; border-bottom:1px solid #e5e7eb; padding:16px 24px; border-radius:12px 12px 0 0; display:flex; align-items:center; justify-content:space-between; z-index:10;">
        <div>
          <h2 style="margin:0 0 2px; font-size:18px; font-weight:700; color:#1f2937;">Get in Touch</h2>
          <p style="margin:0; font-size:13px; color:#6b7280;">Tell us what you need and we'll respond within 24 hours</p>
        </div>
        <button onclick="closeServicesContactModal()" aria-label="Close"
          style="width:36px; height:36px; border:none; background:none; cursor:pointer; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#9ca3af;"
          onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='none'">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
          </svg>
        </button>
      </div>
      <form id="servicesContactForm" style="padding:24px;" novalidate>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:12px;">
          <label style="display:block;">
            <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Name <span style="color:#F7B06A;">*</span></span>
            <input type="text" name="name" required
              style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
              onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
              onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
          </label>
          <label style="display:block;">
            <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Email <span style="color:#F7B06A;">*</span></span>
            <input type="email" name="email" required
              style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
              onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
              onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
          </label>
        </div>
        <label style="display:block; margin-bottom:16px;">
          <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">What are you looking for? <span style="color:#F7B06A;">*</span></span>
          <textarea name="message" rows="4" required placeholder="Tell us about your project or which service you're interested in..."
            style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937; resize:vertical;"
            onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'"></textarea>
        </label>
        <div id="servicesFormMessage" style="display:none; margin-bottom:12px; padding:10px 14px; border-radius:6px; font-size:14px;"></div>
        <button type="submit" id="servicesSubmitBtn"
          style="display:flex; align-items:center; justify-content:center; gap:8px; width:100%; padding:12px 24px; font-size:15px; font-weight:700; background:#4FC4F0; color:#fff; border:none; border-radius:6px; cursor:pointer; font-family:inherit; transition:background 0.15s;">
          Send Message
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
          </svg>
        </button>
      </form>
    </div>
  </div>
</div>

<script>
function openServicesContactModal() {
  document.getElementById('servicesContactModal').style.display = 'block';
  document.body.style.overflow = 'hidden';
}
function closeServicesContactModal() {
  document.getElementById('servicesContactModal').style.display = 'none';
  document.body.style.overflow = '';
}
document.getElementById('servicesContactModal').addEventListener('click', function(e) {
  if (e.target === this) closeServicesContactModal();
});
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') closeServicesContactModal();
});

document.getElementById('servicesContactForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  var btn = document.getElementById('servicesSubmitBtn');
  var msg = document.getElementById('servicesFormMessage');
  var name    = this.querySelector('[name="name"]').value.trim();
  var email   = this.querySelector('[name="email"]').value.trim();
  var message = this.querySelector('[name="message"]').value.trim();
  var errors  = [];
  if (!name)    errors.push('Name is required.');
  if (!email)   errors.push('Email is required.');
  else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) errors.push('Please enter a valid email address.');
  if (!message) errors.push('Message is required.');
  if (errors.length) {
    msg.style.display = 'block';
    msg.style.background = '#fef2f2';
    msg.style.border = '1px solid #fecaca';
    msg.style.color = '#b91c1c';
    msg.textContent = errors.join(' ');
    return;
  }
  btn.disabled = true;
  btn.textContent = 'Sending...';
  try {
    var response = await fetch('/api/candidate-inquiry.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ name, email, message, campaign_name: 'Services Index Inquiry', office: 'N/A', election_date: '2026-01-01' })
    });
    var result = await response.json();
    if (result.success) {
      msg.style.display = 'block';
      msg.style.background = '#f0fdf4';
      msg.style.border = '1px solid #bbf7d0';
      msg.style.color = '#166534';
      msg.textContent = "Thanks! We'll be in touch within 24 hours.";
      this.reset();
    } else {
      throw new Error(result.message || 'Something went wrong');
    }
  } catch (err) {
    msg.style.display = 'block';
    msg.style.background = '#fef2f2';
    msg.style.border = '1px solid #fecaca';
    msg.style.color = '#b91c1c';
    msg.textContent = err.message || 'Something went wrong. Please try again or email us directly.';
  }
  btn.disabled = false;
  btn.innerHTML = 'Send Message <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>';
});
</script>

</body>
</html>
