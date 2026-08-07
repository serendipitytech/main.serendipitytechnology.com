<?php
/**
 * /services/membership — Membership Portal Service
 *
 * Unlimited members, events, admins. Flat monthly — no per-member tax.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Membership Portal — Serendipity Technology</title>
  <meta name="description" content="Membership management with unlimited members, events, and admins. One flat monthly price for clubs, nonprofits, and associations. $199 setup + $49/month.">
  <link rel="icon" href="/img/logos/serendipity_icon_150.png">

  <!-- Open Graph -->
  <meta property="og:title" content="Membership Portal — $49/month, unlimited members">
  <meta property="og:description" content="No per-member fees. Unlimited members, events, and admins. Designed for clubs, nonprofits, and associations.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://serendipitytechnology.com/services/membership">
  <meta property="og:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png">

  <link rel="canonical" href="https://serendipitytechnology.com/services/membership">

  <!-- Schema.org Service -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "Membership management software",
    "name": "Membership Portal for Clubs & Nonprofits",
    "description": "Member management with unlimited members, events, and admins at one flat monthly price. Designed for clubs, nonprofits, and associations — no per-member fees.",
    "provider": {
      "@type": "Organization",
      "name": "Serendipity Technology",
      "url": "https://serendipitytechnology.com"
    },
    "areaServed": [
      { "@type": "Place", "name": "Volusia County, FL" },
      { "@type": "Place", "name": "Central Florida" },
      { "@type": "State", "name": "Florida" }
    ],
    "offers": {
      "@type": "Offer",
      "price": "199",
      "priceCurrency": "USD",
      "description": "Membership portal setup, then flat monthly pricing with no per-member tax",
      "url": "https://serendipitytechnology.com/services/membership"
    }
  }
  </script>

  <?php include __DIR__ . '/partials/service-styles.php'; ?>
  <style>
    /* Newsletter add-on section */
    .newsletter-addons {
      margin-top: 48px;
    }
    .newsletter-addons-title {
      font-family: "Gill Sans", "Gill Sans MT", 'Roboto', sans-serif;
      font-size: 22px;
      font-weight: 700;
      color: var(--svc-text);
      margin: 0 0 8px 0;
      text-align: center;
    }
    .newsletter-addons-sub {
      font-size: 14px;
      color: var(--svc-text-muted);
      text-align: center;
      margin: 0 0 24px 0;
    }
    .newsletter-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 16px;
    }
    .newsletter-card {
      border: 1px solid var(--svc-border);
      border-radius: var(--svc-radius);
      padding: 20px;
      text-align: center;
      background: var(--svc-bg);
      transition: border-color 0.15s, box-shadow 0.15s;
    }
    .newsletter-card:hover {
      border-color: var(--svc-primary);
      box-shadow: var(--svc-shadow-lg);
    }
    .newsletter-card-name {
      font-size: 14px;
      font-weight: 600;
      color: var(--svc-text-muted);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin: 0 0 8px 0;
    }
    .newsletter-card-price {
      font-size: 32px;
      font-weight: 700;
      color: var(--svc-primary);
      line-height: 1;
      margin: 0 0 4px 0;
    }
    .newsletter-card-price span {
      font-size: 16px;
      font-weight: 400;
      color: var(--svc-text-muted);
    }
    .newsletter-card-volume {
      font-size: 13px;
      color: var(--svc-text-muted);
      margin: 0;
    }
  </style>
</head>
<body class="svc-page has-fixed-header">

<?php
$header_always_visible = true;
$header_chat_action = 'openMembershipContactModal()';
include __DIR__ . '/../partials/site-header.php';
?>

<?php
/* ============ HERO ============ */
$hero_bg_image       = 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=2000&q=70';
$hero_eyebrow        = 'Membership Portal';
$hero_title          = 'Member management without the per-member tax';
$hero_lede           = 'Unlimited members, unlimited events, unlimited admins. One flat monthly price — designed for clubs, nonprofits, and associations.';
$hero_accent_text    = 'Get Started — $199';
$hero_accent_href    = 'javascript:openMembershipContactModal()';
$hero_cta_text       = 'See Pricing';
$hero_cta_href       = '#pricing';
$hero_secondary_text = "What's Included";
$hero_secondary_href = '#features';
include __DIR__ . '/partials/service-hero.php';
?>

<?php
/* ============ FEATURES ============ */
$features_title    = 'Built for real membership organizations';
$features_subtitle = 'Every feature your members and administrators actually need — without paying per seat, per feature, or per integration.';
$features_items = [
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
    'title' => 'Unlimited Members',
    'desc'  => 'Whether you have 50 members or 5,000, the price is the same. No per-seat tiers, no "call us for enterprise" pricing wall. Everyone in your roster is in.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
    'title' => 'Member Self-Service Profiles',
    'desc'  => 'Members can log in, update their own contact information, view their event history, and check their membership status — without emailing an administrator.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>',
    'title' => 'Event Management',
    'desc'  => 'Create unlimited events, track RSVPs, and record attendance. Integrates with the event check-in app for seamless day-of operations if needed.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
    'title' => 'Volunteer Hour Tracking',
    'desc'  => 'Members log their own volunteer hours. Coordinators can run engagement reports and recognize top contributors. Hours feed into member status calculations if needed.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
    'title' => 'Payment History & ActBlue',
    'desc'  => 'Import donation and dues records from ActBlue or other processors. Intelligent reconciliation matches payments to member profiles and calculates status automatically.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
    'title' => 'Bulk Import (CSV / Excel)',
    'desc'  => 'Moving from a spreadsheet? Import your entire member roster in one step. Smart column mapping handles most export formats from Excel, Google Sheets, or your current platform.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>',
    'title' => 'Transactional Email',
    'desc'  => '1,000 transactional email sends per month included — for welcome messages, event reminders, and status notifications. Optional newsletter add-on for broadcast campaigns.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
    'title' => 'Subdomain Included',
    'desc'  => 'Your portal lives at yourorg.serendipitytechnology.com — ready to use from day one. Add a custom domain (yourorg.com/members) for $10/month if preferred.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>',
    'title' => 'Magic Link Authentication',
    'desc'  => 'No passwords to manage. Members receive a secure sign-in link by email. One click and they are in — eliminates password reset support tickets entirely.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    'title' => 'Role-Based Access',
    'desc'  => 'Admins, chapter leaders, committee chairs, and general members each see only what they need. Granular permissions without complexity.',
  ],
];
include __DIR__ . '/partials/service-features.php';
?>

<?php
/* ============ PRICING ============ */
$pricing_title    = 'One plan. No per-member fees.';
$pricing_subtitle = 'Everything included. Add newsletter capacity as your communications grow.';
$pricing_tiers = [
  [
    'name'    => 'Membership Portal',
    'tagline' => 'For clubs, nonprofits, and associations of any size',
    'price'   => 49,
    'period'  => '/month',
    'setup'   => '$199 one-time setup',
    'features' => [
      '<strong>Unlimited members</strong> — no per-seat fees',
      '<strong>Unlimited admins</strong> and role assignments',
      '<strong>Unlimited events</strong> with RSVP tracking',
      'Volunteer hour tracking and reporting',
      'Payment history and ActBlue integration',
      'Bulk import from CSV or Excel',
      'Member self-service profiles',
      'Magic link authentication (no passwords)',
      '<strong>1,000 transactional email sends/month</strong>',
      'Subdomain included (yourorg.serendipitytechnology.com)',
      'Custom domain add-on: $10/month',
      'Data export anytime (CSV)',
      'Month-to-month, cancel anytime',
    ],
    'featured' => true,
    'badge'    => 'All-Inclusive',
    'cta_text' => 'Get Started — $199',
    'cta_href' => 'javascript:openMembershipContactModal()',
  ],
];
$pricing_footnote = 'The $199 setup fee covers configuration, data import, subdomain setup, and onboarding for your admin team. Pricing is month-to-month — no annual contract required. Custom domain mapping is $10/month in addition to the base plan.';
include __DIR__ . '/partials/service-pricing.php';
?>

<!-- Newsletter Add-Ons -->
<section class="svc-section" style="padding-top:0;" id="newsletter">
  <div class="svc-container">
    <div class="newsletter-addons">
      <h3 class="newsletter-addons-title">Newsletter Add-Ons</h3>
      <p class="newsletter-addons-sub">Opt-in subscriber lists only — for member newsletters and announcements, not voter file blasts.</p>
      <div class="newsletter-grid">
        <div class="newsletter-card">
          <p class="newsletter-card-name">Lite</p>
          <p class="newsletter-card-price">$10<span>/mo</span></p>
          <p class="newsletter-card-volume">5,000 sends/month</p>
        </div>
        <div class="newsletter-card" style="border-color:var(--svc-primary);">
          <p class="newsletter-card-name">Standard</p>
          <p class="newsletter-card-price">$25<span>/mo</span></p>
          <p class="newsletter-card-volume">25,000 sends/month</p>
        </div>
        <div class="newsletter-card">
          <p class="newsletter-card-name">Plus</p>
          <p class="newsletter-card-price">$59<span>/mo</span></p>
          <p class="newsletter-card-volume">100,000 sends/month</p>
        </div>
      </div>
      <p style="font-size:12px; color:var(--svc-text-subtle); text-align:center; margin-top:16px;">Newsletter add-ons require an active Membership Portal plan. Opt-in subscriber lists only — sending to non-consenting members or voter files violates our acceptable use policy.</p>
    </div>
  </div>
</section>

<?php
/* ============ FAQ ============ */
$faq_title = 'Common questions';
$faq_items = [
  [
    'q' => 'We have 50 members. Does this make sense for us?',
    'a' => 'Yes. At $49/month, this is $1/month per member for a 50-person organization — and it stays the same price if you grow to 500. Spreadsheets are free but cost you staff time. If you are spending more than an hour a month reconciling membership data, this pays for itself.',
  ],
  [
    'q' => 'We have 5,000 members. Will it handle that?',
    'a' => 'Yes. The platform is built on Supabase PostgreSQL, which handles millions of rows without breaking a sweat. Large organizations with complex data imports are exactly what the bulk import and reconciliation tools were built for.',
  ],
  [
    'q' => 'Can members log in themselves?',
    'a' => 'Yes. Each member gets their own login via magic link (no password required). They can view their own profile, check event history, update contact information, and log volunteer hours — without calling or emailing you.',
  ],
  [
    'q' => 'Can we set up multiple chapters or affiliates?',
    'a' => 'Multi-tenant support is available. Each chapter can have its own subdomain, branding, member roster, and admin team — all under one platform. Contact us to discuss your chapter structure and we will quote accordingly.',
  ],
  [
    'q' => 'What happens to our data if we leave?',
    'a' => 'You can export your full member roster, event records, and payment history as CSV at any time — including on your way out. We do not lock you in. After you cancel, we retain your data for 30 days in case you reconsider, then purge it.',
  ],
  [
    'q' => 'How is member data protected?',
    'a' => 'Your data is stored in a dedicated Supabase project with row-level security — each organization can only access its own data. All connections are encrypted (HTTPS/TLS). Passwords are not stored (magic link auth only). We do not sell or share your member data with third parties.',
  ],
  [
    'q' => 'Does this replace WildApricot or other membership platforms?',
    'a' => 'For many organizations, yes. If you are on WildApricot\'s $55–$90/month plans and paying per-member overages, this is likely cheaper with comparable core features. We do not have an events marketplace or public-facing website builder, but if you have a separate site (or one of our Business Site packages), this handles the member management side cleanly.',
  ],
  [
    'q' => 'Can we use our own branding in the member portal?',
    'a' => 'The portal includes your organization name and logo. Full custom branding (custom colors, custom CSS, white-label) is available as part of the setup discussion. Contact us to go over what level of branding you need.',
  ],
  [
    'q' => 'How does ActBlue integration work?',
    'a' => 'You export your ActBlue donation report (they provide CSV exports) and import it into the portal. The reconciliation engine matches payments to member profiles by email or name, calculates membership status, and flags any unmatched records for manual review. It is not a live real-time integration — it is a batch import designed to match how most organizations actually work.',
  ],
  [
    'q' => 'What is the transactional email limit for?',
    'a' => 'The 1,000/month included sends cover automated emails triggered by portal actions — welcome emails when someone joins, event reminders, password-less login links. If you want to send newsletters or broadcast emails to your member list, that requires the newsletter add-on, which is separate from transactional sends.',
  ],
];
include __DIR__ . '/partials/service-faq.php';
?>

<?php
/* ============ CLOSING CTA ============ */
$cta_title          = 'Stop managing members in spreadsheets';
$cta_subtitle       = 'Tell us about your organization and we will get you set up within a week.';
$cta_text           = 'Get Started — $199';
$cta_href           = 'javascript:openMembershipContactModal()';
$cta_secondary_text = 'Have Questions? Contact Us';
$cta_secondary_href = 'javascript:openMembershipContactModal()';
include __DIR__ . '/partials/service-cta.php';
?>

<?php include __DIR__ . '/../partials/site-footer.php'; ?>

<!-- Membership Contact Modal -->
<div id="membershipContactModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:1000; overflow-y:auto;">
  <div style="min-height:100%; display:flex; align-items:flex-start; justify-content:center; padding:32px 16px;">
    <div style="background:#fff; border-radius:12px; box-shadow:0 20px 60px rgba(0,0,0,0.2); width:100%; max-width:640px; position:relative;">

      <!-- Modal header -->
      <div style="position:sticky; top:0; background:#fff; border-bottom:1px solid #e5e7eb; padding:16px 24px; border-radius:12px 12px 0 0; display:flex; align-items:center; justify-content:space-between; z-index:10;">
        <div>
          <h2 style="margin:0 0 2px; font-size:18px; font-weight:700; color:#1f2937;">Get in Touch</h2>
          <p style="margin:0; font-size:13px; color:#6b7280;">Tell us about your organization and we'll get back within 24 hours</p>
        </div>
        <button onclick="closeMembershipContactModal()" aria-label="Close"
          style="width:36px; height:36px; border:none; background:none; cursor:pointer; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#9ca3af; transition:background 0.15s;"
          onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='none'">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
          </svg>
        </button>
      </div>

      <!-- Form -->
      <form id="membershipContactForm" style="padding:24px;" novalidate>

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
            <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Organization Name <span style="color:#F7B06A;">*</span></span>
            <input type="text" name="org_name" required
              style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
              onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
              onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
          </label>
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:12px;">
          <label style="display:block;">
            <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Organization Type</span>
            <select name="org_type"
              style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
              onfocus="this.style.borderColor='#4FC4F0';this.style.background='#fff'"
              onblur="this.style.borderColor='#e5e7eb';this.style.background='#f9fafb'">
              <option value="">— Select —</option>
              <option value="club">Club / Civic Organization</option>
              <option value="nonprofit">Nonprofit / 501(c)(3)</option>
              <option value="association">Professional Association</option>
              <option value="political">Political / Party Organization</option>
              <option value="other">Other</option>
            </select>
          </label>
          <label style="display:block;">
            <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Approx. Member Count</span>
            <input type="number" name="current_member_count" placeholder="e.g. 250" min="1"
              style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
              onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
              onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
          </label>
        </div>

        <label style="display:block; margin-bottom:12px;">
          <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Current Software / System</span>
          <input type="text" name="current_software" placeholder="e.g. WildApricot, Google Sheets, nothing yet"
            style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
            onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
        </label>

        <label style="display:block; margin-bottom:16px;">
          <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Message <span style="font-size:12px; font-weight:400; color:#9ca3af;">(optional)</span></span>
          <textarea name="message" rows="3" placeholder="Tell us about your organization, current pain points, or questions..."
            style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937; resize:vertical;"
            onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'"></textarea>
        </label>

        <div id="membershipFormMessage" style="display:none; margin-bottom:12px; padding:10px 14px; border-radius:6px; font-size:14px;"></div>

        <button type="submit" id="membershipSubmitBtn"
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
function openMembershipContactModal() {
  document.getElementById('membershipContactModal').style.display = 'block';
  document.body.style.overflow = 'hidden';
}
function closeMembershipContactModal() {
  document.getElementById('membershipContactModal').style.display = 'none';
  document.body.style.overflow = '';
}
document.getElementById('membershipContactModal').addEventListener('click', function(e) {
  if (e.target === this) closeMembershipContactModal();
});
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') closeMembershipContactModal();
});

document.getElementById('membershipContactForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  var btn = document.getElementById('membershipSubmitBtn');
  var msg = document.getElementById('membershipFormMessage');

  var name     = this.querySelector('[name="name"]').value.trim();
  var email    = this.querySelector('[name="email"]').value.trim();
  var org_name = this.querySelector('[name="org_name"]').value.trim();

  var errors = [];
  if (!name)     errors.push('Name is required.');
  if (!email)    errors.push('Email is required.');
  else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) errors.push('Please enter a valid email address.');
  if (!org_name) errors.push('Organization name is required.');

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
    var response = await fetch('/api/membership-inquiry.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data)
    });
    var result = await response.json();

    if (result.success) {
      if (typeof gtag === 'function') { gtag('event', 'generate_lead', { form_location: 'service_membership' }); }
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
