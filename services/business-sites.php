<?php
/**
 * /services/business-sites — Business Website Packages
 *
 * Managed websites with AI-powered updates, hosting, email, and client portal.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Business Website Packages — Serendipity Technology</title>
  <meta name="description" content="Managed business websites with AI-powered updates, hosting, SSL, and business email. Starting at $10/month + $49 setup. Serendipity Technology.">
  <link rel="icon" href="/img/logos/serendipity_icon_150.png">

  <!-- Open Graph -->
  <meta property="og:title" content="Business Website Packages — From $10/month">
  <meta property="og:description" content="Professional websites with AI-powered updates, hosting, and business email. Managed for you — submit a request and it goes live overnight.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://serendipitytechnology.com/services/business-sites">
  <meta property="og:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png">

  <link rel="canonical" href="https://serendipitytechnology.com/services/business-sites">

  <?php include __DIR__ . '/partials/service-styles.php'; ?>
</head>
<body class="svc-page">

<?php
/* ============ HERO ============ */
$hero_bg_image    = 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=2000&q=70';
$hero_eyebrow     = 'Business Sites';
$hero_title       = 'Professional websites with AI-powered updates';
$hero_lede        = 'Hosting, security, and a client portal — managed for you. Submit a change request, our AI builds it overnight. Starting at $10/month.';
$hero_accent_text = 'Get Started — $49';
$hero_accent_href = 'javascript:openBusinessContactModal()';
$hero_cta_text    = 'See Pricing';
$hero_cta_href    = '#pricing';
$hero_secondary_text = "What's Included";
$hero_secondary_href = '#features';
include __DIR__ . '/partials/service-hero.php';
?>

<?php
/* ============ FEATURES ============ */
$features_title    = 'Everything your business site needs';
$features_subtitle = 'No surprise charges, no managing servers. Just a professional web presence with real support behind it.';
$features_items = [
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07M8.46 8.46a5 5 0 0 0 0 7.07"/></svg>',
    'title' => 'AI-Powered Updates',
    'desc'  => 'Submit a change request through your client portal — update hours, swap photos, post announcements. Our AI drafts the changes overnight and our team reviews before going live.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    'title' => 'Hosting, SSL & Security',
    'desc'  => 'Fully managed hosting with automatic SSL certificates, daily backups, and uptime monitoring. Nothing for you to install or maintain.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>',
    'title' => 'Business Email Mailbox',
    'desc'  => 'A professional inbox at your domain — like hello@yourbusiness.com. Included from the Growth tier up, so you stop emailing clients from a Gmail address.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>',
    'title' => 'Client Portal Access',
    'desc'  => 'Log in to your branded portal to submit update requests, view project status, and communicate with our team — no email threads required.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>',
    'title' => 'Mobile-Responsive Design',
    'desc'  => 'Your site looks and works great on phones, tablets, and desktops. Built mobile-first since that is where most of your visitors are coming from.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>',
    'title' => 'Analytics Included',
    'desc'  => 'See who is visiting your site, where they are coming from, and what pages they view. No extra tools to install — your dashboard shows the essentials.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
    'title' => 'Fast Update Turnaround',
    'desc'  => 'Starter plan gets per-request updates at $19 each. Growth and above include monthly updates — with priority turnaround on Business and Pro tiers.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
    'title' => 'Multi-Page Support',
    'desc'  => 'Growth tier supports up to 3 pages (Home, About, Contact). Business gets up to 5. Pro supports up to 10 — enough for a full service menu and location pages.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
    'title' => 'Custom Domain',
    'desc'  => 'Bring your existing domain or we help you pick one. DNS, SSL, and configuration are all handled. You own the domain — always.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
    'title' => 'Real Human Support',
    'desc'  => 'We are a small team that responds to actual humans. Business and Pro clients get priority support with faster response times when something needs attention.',
  ],
];
include __DIR__ . '/partials/service-features.php';
?>

<?php
/* ============ PRICING ============ */
$pricing_title    = 'Simple, predictable pricing';
$pricing_subtitle = 'Pick a tier that fits your business today. Upgrade anytime — no contract required.';
$pricing_tiers = [
  [
    'name'    => 'Starter',
    'tagline' => 'Get online, stay online',
    'price'   => 10,
    'period'  => '/month',
    'setup'   => '$49 one-time setup',
    'features' => [
      '1-page website',
      'Custom domain (you bring it or we help)',
      'Hosting & SSL included',
      'Per-request updates — <strong>$19 each</strong>',
      'Client portal access',
      'Analytics dashboard',
      'Month-to-month, cancel anytime',
    ],
    'disabled' => [
      'Business email mailbox',
      'Included monthly updates',
    ],
    'featured'  => false,
    'cta_text'  => 'Get Started — $49',
    'cta_href'  => 'javascript:openBusinessContactModal()',
  ],
  [
    'name'    => 'Growth',
    'tagline' => 'For businesses building their presence',
    'price'   => 25,
    'period'  => '/month',
    'setup'   => '$99 one-time setup',
    'features' => [
      'Up to 3 pages',
      'Custom domain',
      'Hosting & SSL included',
      '<strong>1 included update per month</strong>',
      '<strong>1 business email mailbox</strong>',
      'Client portal access',
      'Analytics dashboard',
      'Month-to-month, cancel anytime',
    ],
    'featured'  => false,
    'cta_text'  => 'Get Started — $99',
    'cta_href'  => 'javascript:openBusinessContactModal()',
  ],
  [
    'name'    => 'Business',
    'tagline' => 'The full package for growing businesses',
    'price'   => 49,
    'period'  => '/month',
    'setup'   => '$199 one-time setup',
    'features' => [
      'Up to 5 pages',
      'Custom domain',
      'Hosting & SSL included',
      '<strong>2 included updates per month</strong>',
      '<strong>2 business email mailboxes</strong>',
      'Client portal with priority queue',
      'Analytics dashboard',
      'Month-to-month, cancel anytime',
    ],
    'featured' => true,
    'badge'    => 'Most Popular',
    'cta_text' => 'Get Started — $199',
    'cta_href' => 'javascript:openBusinessContactModal()',
  ],
  [
    'name'    => 'Pro',
    'tagline' => 'For established businesses with active sites',
    'price'   => 99,
    'period'  => '/month',
    'setup'   => '$399 one-time setup',
    'features' => [
      'Up to 10 pages',
      'Custom domain',
      'Hosting & SSL included',
      '<strong>4 included updates per month — priority</strong>',
      '<strong>2 business email mailboxes (1GB each)</strong>',
      'Client portal with priority support',
      'Analytics dashboard',
      'Month-to-month, cancel anytime',
    ],
    'featured'  => false,
    'cta_text'  => 'Get Started — $399',
    'cta_href'  => 'javascript:openBusinessContactModal()',
  ],
];
$pricing_footnote = 'Additional updates on Starter are billed at $19 per request. Extra updates on paid tiers (beyond your monthly allotment) are $19 each. All plans are month-to-month with no long-term contract. <a href="javascript:openBusinessContactModal()">Contact us</a> for custom or enterprise requirements.';
include __DIR__ . '/partials/service-pricing.php';
?>

<?php
/* ============ FAQ ============ */
$faq_title = 'Common questions';
$faq_items = [
  [
    'q' => 'Can you migrate my existing website?',
    'a' => 'Yes. If you have an existing site, we will review it during onboarding and replicate the content and design into your new managed setup. We can match your existing look or redesign — your call. Migrations are included in the setup fee.',
  ],
  [
    'q' => 'What counts as an "update"?',
    'a' => 'An update is any content change you submit through your client portal — updating text, swapping images, adding a new announcement, changing business hours, adding a menu item. One logical change request = one update. If you submit several related changes at once (e.g. "update our hours, phone number, and address"), that counts as one update. Major structural redesigns or adding new pages are quoted separately.',
  ],
  [
    'q' => 'How does the AI-powered update process work?',
    'a' => 'You submit a request through your client portal describing what you want changed. Our AI drafts the edits to the actual site code overnight. A Serendipity team member reviews the output for accuracy and quality, then pushes the change live. This means faster turnaround than traditional "we\'ll get to it" agency queues, without sacrificing human oversight.',
  ],
  [
    'q' => 'Can I cancel anytime?',
    'a' => 'Yes. There are no annual contracts or early-termination fees. Cancel at the end of any billing month. Your site stays live through the end of your last paid period. We can provide a static backup of your site files on request.',
  ],
  [
    'q' => 'Do I own my domain?',
    'a' => 'Yes — always. If we register a domain on your behalf, it is registered in your name or your business name. If you ever leave, the domain goes with you. We never hold domains hostage.',
  ],
  [
    'q' => 'What is the difference between a "page" and a section?',
    'a' => 'A page is a distinct URL — like /about or /services. Sections are scrollable blocks within a single page. Starter clients get one page (which can have multiple sections — hero, services, contact, etc.). Growth clients can have up to 3 separate pages, Business up to 5, Pro up to 10.',
  ],
  [
    'q' => 'How long does it take to launch?',
    'a' => 'Most new sites go live within 5–7 business days of signing up. We collect your content, brand assets, and preferences during onboarding, then build and launch. If you have a hard deadline, mention it when you sign up.',
  ],
  [
    'q' => 'What support is available if something breaks?',
    'a' => 'All plans include support via your client portal. Business and Pro clients get priority response — typically within a few hours during business hours. For Starter and Growth, we respond within 1 business day. Critical issues (site down) are treated as urgent regardless of plan.',
  ],
  [
    'q' => 'Can I upgrade or downgrade my plan?',
    'a' => 'Yes. Upgrade at any time — the new pricing takes effect at the next billing cycle. Downgrades take effect at the end of your current billing period. If you need to drop pages when downgrading, we will work with you on what to consolidate.',
  ],
  [
    'q' => 'Do you build e-commerce or booking systems?',
    'a' => 'The managed packages cover informational and lead-generation websites. For e-commerce, online booking, or other interactive features, contact us — we handle custom builds outside the standard tier structure.',
  ],
];
include __DIR__ . '/partials/service-faq.php';
?>

<?php
/* ============ CLOSING CTA ============ */
$cta_title          = 'Ready to launch your site?';
$cta_subtitle       = 'Tell us about your business and we will have your site live within a week.';
$cta_text           = 'Get Started — $49';
$cta_href           = 'javascript:openBusinessContactModal()';
$cta_secondary_text = 'Have Questions? Contact Us';
$cta_secondary_href = 'javascript:openBusinessContactModal()';
include __DIR__ . '/partials/service-cta.php';
?>

<footer style="border-top:1px solid var(--svc-border); padding:32px 0; text-align:center; font-size:13px; color:var(--svc-text-muted);">
  <div class="svc-container">
    <p style="margin:0 0 8px 0;">
      <a href="/" style="color:inherit; text-decoration:none;">Serendipity Technology</a>
      &middot;
      <a href="/services/candidates" style="color:inherit; text-decoration:none;">Candidate Sites</a>
      &middot;
      <a href="/services/event-checkin" style="color:inherit; text-decoration:none;">Event Check-In</a>
      &middot;
      <a href="/services/membership" style="color:inherit; text-decoration:none;">Membership Portal</a>
      &middot;
      <a href="/services/" style="color:inherit; text-decoration:none;">All Services</a>
    </p>
    <p style="margin:0;">&copy; <?= date('Y') ?> Serendipity Technology. Websites that work as hard as you do.</p>
  </div>
</footer>

<!-- Business Contact Modal -->
<div id="businessContactModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:1000; overflow-y:auto;">
  <div style="min-height:100%; display:flex; align-items:flex-start; justify-content:center; padding:32px 16px;">
    <div style="background:#fff; border-radius:12px; box-shadow:0 20px 60px rgba(0,0,0,0.2); width:100%; max-width:640px; position:relative;">

      <!-- Modal header -->
      <div style="position:sticky; top:0; background:#fff; border-bottom:1px solid #e5e7eb; padding:16px 24px; border-radius:12px 12px 0 0; display:flex; align-items:center; justify-content:space-between; z-index:10;">
        <div>
          <h2 style="margin:0 0 2px; font-size:18px; font-weight:700; color:#1f2937;">Get in Touch</h2>
          <p style="margin:0; font-size:13px; color:#6b7280;">Tell us about your business and we'll get back within 24 hours</p>
        </div>
        <button onclick="closeBusinessContactModal()" aria-label="Close"
          style="width:36px; height:36px; border:none; background:none; cursor:pointer; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#9ca3af; transition:background 0.15s;"
          onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='none'">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
          </svg>
        </button>
      </div>

      <!-- Form -->
      <form id="businessContactForm" style="padding:24px;" novalidate>

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
          <label style="display:block;">
            <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Phone <span style="font-size:12px; font-weight:400; color:#9ca3af;">(optional)</span></span>
            <input type="tel" name="phone"
              style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
              onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
              onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
          </label>
          <label style="display:block;">
            <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Business Name <span style="color:#F7B06A;">*</span></span>
            <input type="text" name="business_name" required
              style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
              onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
              onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
          </label>
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:12px;">
          <label style="display:block;">
            <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Business Type</span>
            <select name="business_type"
              style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
              onfocus="this.style.borderColor='#4FC4F0';this.style.background='#fff'"
              onblur="this.style.borderColor='#e5e7eb';this.style.background='#f9fafb'">
              <option value="">— Select —</option>
              <option value="retail">Retail / Shop</option>
              <option value="restaurant">Restaurant / Food</option>
              <option value="services">Professional Services</option>
              <option value="nonprofit">Nonprofit</option>
              <option value="contractor">Contractor / Trades</option>
              <option value="healthcare">Healthcare / Wellness</option>
              <option value="other">Other</option>
            </select>
          </label>
          <label style="display:block;">
            <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Service Tier Interest</span>
            <select name="tier_interest"
              style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
              onfocus="this.style.borderColor='#4FC4F0';this.style.background='#fff'"
              onblur="this.style.borderColor='#e5e7eb';this.style.background='#f9fafb'">
              <option value="">— Not sure yet —</option>
              <option value="starter">Starter ($10/mo)</option>
              <option value="growth">Growth ($25/mo)</option>
              <option value="business">Business ($49/mo)</option>
              <option value="pro">Pro ($99/mo)</option>
            </select>
          </label>
        </div>

        <label style="display:block; margin-bottom:12px;">
          <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Current Website <span style="font-size:12px; font-weight:400; color:#9ca3af;">(if any)</span></span>
          <input type="url" name="current_website" placeholder="https://yourbusiness.com"
            style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
            onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
        </label>

        <label style="display:block; margin-bottom:16px;">
          <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Message <span style="font-size:12px; font-weight:400; color:#9ca3af;">(optional)</span></span>
          <textarea name="message" rows="3" placeholder="Tell us about your business, any specific needs, or questions..."
            style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937; resize:vertical;"
            onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'"></textarea>
        </label>

        <div id="businessFormMessage" style="display:none; margin-bottom:12px; padding:10px 14px; border-radius:6px; font-size:14px;"></div>

        <button type="submit" id="businessSubmitBtn"
          style="display:flex; align-items:center; justify-content:center; gap:8px; width:100%; padding:12px 24px; font-size:15px; font-weight:700; background:#4FC4F0; color:#fff; border:none; border-radius:6px; cursor:pointer; font-family:inherit; transition:background 0.15s;">
          Submit Inquiry
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
function openBusinessContactModal() {
  document.getElementById('businessContactModal').style.display = 'block';
  document.body.style.overflow = 'hidden';
}
function closeBusinessContactModal() {
  document.getElementById('businessContactModal').style.display = 'none';
  document.body.style.overflow = '';
}
document.getElementById('businessContactModal').addEventListener('click', function(e) {
  if (e.target === this) closeBusinessContactModal();
});
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') closeBusinessContactModal();
});

document.getElementById('businessContactForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  var btn = document.getElementById('businessSubmitBtn');
  var msg = document.getElementById('businessFormMessage');

  var name          = this.querySelector('[name="name"]').value.trim();
  var email         = this.querySelector('[name="email"]').value.trim();
  var business_name = this.querySelector('[name="business_name"]').value.trim();

  var errors = [];
  if (!name)          errors.push('Name is required.');
  if (!email)         errors.push('Email is required.');
  else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) errors.push('Please enter a valid email address.');
  if (!business_name) errors.push('Business name is required.');

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

  var formData = new FormData(this);
  var data = Object.fromEntries(formData);

  try {
    var response = await fetch('/api/business-inquiry.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data)
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
  btn.innerHTML = 'Submit Inquiry <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>';
});
</script>

</body>
</html>
