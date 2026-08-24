<?php
/**
 * /services/candidates — Political Candidate Site Package
 *
 * Single-page campaign websites for local and down-ballot candidates.
 * Includes hosting, custom domain, branded email, unlimited content updates.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Candidate Site Package — Serendipity Technology</title>
  <meta name="description" content="Single-page campaign website with custom domain, branded email, and unlimited updates. Built for local and down-ballot candidates. $49 setup + $20/month.">
  <link rel="icon" href="/img/logos/serendipity_icon_150.png">

  <!-- Open Graph -->
  <meta property="og:title" content="Candidate Site Package — $20/month">
  <meta property="og:description" content="Professional campaign website with custom domain, branded email, and unlimited updates. Designed for candidates who deserve better tools.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://serendipitytechnology.com/services/candidates">
  <meta property="og:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png">

  <link rel="canonical" href="https://serendipitytechnology.com/services/candidates">

  <!-- Schema.org Service -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "Political campaign website design",
    "name": "Campaign Websites for Candidates",
    "description": "Single-page campaign website with a custom domain, branded email, and unlimited content updates throughout the season. Built for local and down-ballot candidates.",
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
      "price": "49",
      "priceCurrency": "USD",
      "description": "Campaign website setup, then unlimited updates through the season",
      "url": "https://serendipitytechnology.com/services/candidates"
    }
  }
  </script>

  <?php include __DIR__ . '/partials/service-styles.php'; ?>
  <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
</head>
<body class="svc-page has-fixed-header">

<?php
$header_always_visible = true;
$header_chat_action = 'openContactModal()';
include __DIR__ . '/../partials/site-header.php';
?>

<?php
/* ============ HERO ============ */
$hero_bg_image = 'https://images.unsplash.com/photo-1541872703-74c5e44368f9?auto=format&fit=crop&w=2000&q=70';
$hero_eyebrow = 'Candidate Package';
$hero_title = 'A campaign website ready in days, not weeks';
$hero_lede = 'Single-page campaign site with your custom domain, branded email, and unlimited content updates throughout the season. Built for local and down-ballot candidates who deserve better tools.';
$hero_accent_text = 'Get Started — $49';
$hero_accent_href = '/services/candidates/signup';
$hero_cta_text = 'See Pricing';
$hero_cta_href = '#pricing';
$hero_secondary_text = "What's Included";
$hero_secondary_href = '#features';
include __DIR__ . '/partials/service-hero.php';
?>

<?php
/* ============ FEATURES ============ */
$features_title = "Everything a campaign needs";
$features_subtitle = "No monthly fees that double after qualifying. No per-update charges. Just a working website you control.";
$features_items = [
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
    'title' => 'Custom Domain Included',
    'desc' => 'Your name, your race, your domain (e.g. JohnFor2026.com). We register it, configure DNS, and set up SSL — included in setup, no extra cost.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>',
    'title' => 'Branded Email Mailbox',
    'desc' => 'A professional inbox at your domain (e.g. john@johnfor2026.com). Looks legitimate to voters, donors, and press. One mailbox included.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>',
    'title' => 'Unlimited Content Updates',
    'desc' => 'Add a press release, update your events, change your platform statement — submit a request, and we make the change. No per-update charges through your campaign cycle.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>',
    'title' => 'Donate Button',
    'desc' => "Bring your ActBlue, Anedot, or other donation link — we'll wire it to a prominent button on the site. Your processor, your account, your control.",
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
    'title' => 'Volunteer Signup Form',
    'desc' => 'Built-in form to collect volunteer information — names, contact info, areas of interest. Submissions emailed to you, no extra software needed.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
    'title' => 'Endorsements Section',
    'desc' => 'Display endorsements from elected officials, organizations, and community leaders. Easy to add as more come in.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>',
    'title' => 'Mobile-First Design',
    'desc' => "Most voters will see your site on their phone. We design for that first — fast loading, readable, and easy to navigate.",
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
    'title' => '2-Day Update Turnaround',
    'desc' => 'Submit a content change request and have it live within 2 business days. Most updates land same-day during the final stretch.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    'title' => 'Hosting, SSL, Security',
    'desc' => 'Fully managed hosting, automatic SSL renewal, daily backups, and security monitoring. Nothing for you to maintain.',
  ],
];
include __DIR__ . '/partials/service-features.php';
?>

<?php
/* ============ PRICING ============ */
$pricing_title = 'Simple, predictable pricing';
$pricing_subtitle = 'No multi-year contracts. No qualifying-stage rate hikes. Cancel anytime — like when we help you win your primary so you can turn your focus to serving your constituents.';
$pricing_tiers = [
  [
    'name' => 'Candidate',
    'tagline' => 'For local and down-ballot races',
    'price' => 20,
    'period' => '/month',
    'setup' => '$49 one-time setup',
    'features' => [
      '<strong>Custom domain</strong> registered and managed',
      '<strong>1 branded email mailbox</strong> at your domain',
      '<strong>Unlimited content updates</strong> (2-day turnaround)',
      'Single-page campaign site',
      'Donate button (your ActBlue/Anedot link)',
      'Volunteer signup form',
      'Endorsements section',
      'Mobile-optimized design',
      'Hosting, SSL, daily backups',
      'Month-to-month, cancel anytime',
    ],
    'featured' => true,
    'badge' => 'All-In-One',
    'cta_text' => 'Get Started — $49',
    'cta_href' => '/services/candidates/signup',
  ],
  [
    'name' => 'Newsletter Add-On',
    'tagline' => 'Optional — add when you need it',
    'price' => 10,
    'period' => '/month',
    'setup' => 'Add to any active candidate plan',
    'features' => [
      '5,000 email sends per month',
      'Drag-and-drop email builder',
      'Subscriber management',
      '<strong>Opt-in lists only</strong> (no voter file blasts)',
      'Open and click tracking',
      'Send from your branded address',
      'Higher tiers available ($25/mo for 25K, $59/mo for 100K)',
    ],
    'featured' => false,
    'cta_text' => 'Newsletter FAQ',
    'cta_href' => '#faq',
  ],
];
$pricing_footnote = '<strong>Designed for active campaigns.</strong> The Candidate Package is intended for political campaigns ending within 12 months of signup. For ongoing political organizations, PACs, or campaigns more than a year out, see our <a href="/services/business-sites">Business Site packages</a> or <a href="javascript:openContactModal()">contact us</a> for custom options.';
include __DIR__ . '/partials/service-pricing.php';
?>

<?php
/* ============ FAQ ============ */
$faq_title = 'Common questions';
$faq_items = [
  [
    'q' => 'How quickly can my site go live?',
    'a' => 'Most campaign sites launch within 5 business days of signup. We collect your content, design, and donation link, then build and deploy. If you need faster turnaround for a primary or filing deadline, let us know during signup and we will rush.',
  ],
  [
    'q' => 'What happens if my race ends early — primary loss, withdrew, or election over?',
    'a' => 'Just cancel. There is no contract, no early-termination fee. Your last billed month is the last month. We will keep your site live through the end of the billing period, then archive your content. If you want a final snapshot or an offline copy, just ask.',
  ],
  [
    'q' => 'Can I keep the site running after the election?',
    'a' => "Yes — many candidates pivot the site into an 'elected official' page or community presence. Reach out and we will discuss converting your account to one of our Business Site packages.",
  ],
  [
    'q' => 'Do I own my domain?',
    'a' => 'Yes. The domain is registered in your name (or your committee\'s name) — not ours. If you ever leave, the domain goes with you.',
  ],
  [
    'q' => 'Can I use my own donation processor?',
    'a' => 'Yes — and we strongly recommend that. Bring your ActBlue, Anedot, WinRed, NGP, or any other link. We just wire it to a prominent button on your site. Your donations flow directly to your committee.',
  ],
  [
    'q' => 'What kind of updates can I request?',
    'a' => "Any content change — adding a new endorsement, updating your events list, swapping out photos, changing your platform language, posting a press statement. We don't restrict by type or count. If a request requires significant new design work (a totally new section, complex graphics, etc.) we may quote it separately, but routine campaign updates are unlimited.",
  ],
  [
    'q' => 'Why no email blasts to voter files?',
    'a' => 'Our newsletter add-on requires opt-in subscribers — people who actively signed up for your updates through your website. Sending unsolicited email to voter files violates our email provider\'s acceptable use policy and damages email deliverability for everyone. If you specifically need voter-file email outreach, we can refer you to our partner platform <a href="https://flddc.org">FLDDC FES</a> which is purpose-built for that and has the proper sender infrastructure.',
    'id' => 'faq-newsletter',
  ],
  [
    'q' => 'Do you handle FEC compliance or campaign finance reporting?',
    'a' => 'No. We build and host your website. Compliance with FEC, state election commission, and finance reporting rules is your campaign\'s responsibility (or your treasurer\'s). We can add required disclaimers to your site at your direction.',
  ],
  [
    'q' => 'What if I need a multi-page site or more advanced features?',
    'a' => 'The Candidate Package is intentionally a single page. For multi-page campaigns, complex donation flows, custom integrations, or larger design needs, contact us about a custom build or look at our <a href="/services/business-sites">Business Site packages</a>.',
  ],
];
include __DIR__ . '/partials/service-faq.php';
?>

<?php
/* ============ CLOSING CTA ============ */
$cta_title = 'Run your campaign, not your website';
$cta_subtitle = 'Tell us about your race and we will have your site live in days.';
$cta_text = 'Get Started — $49';
$cta_href = '/services/candidates/signup';
$cta_secondary_text = 'Have Questions? Contact Us';
$cta_secondary_href = 'javascript:openContactModal()';
include __DIR__ . '/partials/service-cta.php';
?>

<?php include __DIR__ . '/../partials/site-footer.php'; ?>

<!-- Candidate Contact Modal -->
<div id="candidateContactModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:1000; overflow-y:auto;">
  <div style="min-height:100%; display:flex; align-items:flex-start; justify-content:center; padding:32px 16px;">
    <div style="background:#fff; border-radius:12px; box-shadow:0 20px 60px rgba(0,0,0,0.2); width:100%; max-width:640px; position:relative;">

      <!-- Modal header -->
      <div style="position:sticky; top:0; background:#fff; border-bottom:1px solid #e5e7eb; padding:16px 24px; border-radius:12px 12px 0 0; display:flex; align-items:center; justify-content:space-between; z-index:10;">
        <div>
          <h2 style="margin:0 0 2px; font-size:18px; font-weight:700; color:#1f2937;">Get in Touch</h2>
          <p style="margin:0; font-size:13px; color:#6b7280;">Tell us about your race and we'll get back within 24 hours</p>
        </div>
        <button onclick="closeContactModal()" aria-label="Close"
          style="width:36px; height:36px; border:none; background:none; cursor:pointer; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#9ca3af; transition:background 0.15s;"
          onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='none'">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
          </svg>
        </button>
      </div>

      <!-- Form -->
      <form id="candidateContactForm" style="padding:24px;" novalidate>

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
            <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Campaign / Committee Name <span style="color:#F7B06A;">*</span></span>
            <input type="text" name="campaign_name" required
              style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
              onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
              onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
          </label>
        </div>

        <label style="display:block; margin-bottom:12px;">
          <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Office Sought <span style="color:#F7B06A;">*</span></span>
          <input type="text" name="office" required placeholder="e.g. Volusia County School Board, District 4"
            style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
            onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
        </label>

        <label style="display:block; margin-bottom:12px;">
          <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Election Date <span style="color:#F7B06A;">*</span></span>
          <input type="date" name="election_date" required
            style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
            onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
        </label>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:12px;">
          <label style="display:block;">
            <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Domain Status</span>
            <select name="domain_status"
              style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
              onfocus="this.style.borderColor='#4FC4F0';this.style.background='#fff'"
              onblur="this.style.borderColor='#e5e7eb';this.style.background='#f9fafb'">
              <option value="">— Select —</option>
              <option value="have">I have a domain</option>
              <option value="need">I need one registered</option>
              <option value="unsure">Not sure yet</option>
            </select>
          </label>
          <label style="display:block;">
            <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Domain Name <span style="font-size:12px; font-weight:400; color:#9ca3af;">(optional)</span></span>
            <input type="text" name="domain" placeholder="e.g. janesmith2026.com"
              style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
              onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
              onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
          </label>
        </div>

        <label style="display:block; margin-bottom:16px;">
          <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Message <span style="font-size:12px; font-weight:400; color:#9ca3af;">(optional)</span></span>
          <textarea name="message" rows="3" placeholder="Tell us about your race, timeline, or any questions..."
            style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937; resize:vertical;"
            onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'"></textarea>
        </label>

        <div id="candidateFormMessage" style="display:none; margin-bottom:12px; padding:10px 14px; border-radius:6px; font-size:14px;"></div>

        <button type="submit" id="candidateSubmitBtn"
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
function openContactModal() {
  document.getElementById('candidateContactModal').style.display = 'block';
  document.body.style.overflow = 'hidden';
}
function closeContactModal() {
  document.getElementById('candidateContactModal').style.display = 'none';
  document.body.style.overflow = '';
}
document.getElementById('candidateContactModal').addEventListener('click', function(e) {
  if (e.target === this) closeContactModal();
});
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') closeContactModal();
});

document.getElementById('candidateContactForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  var btn = document.getElementById('candidateSubmitBtn');
  var msg = document.getElementById('candidateFormMessage');

  var name          = this.querySelector('[name="name"]').value.trim();
  var email         = this.querySelector('[name="email"]').value.trim();
  var campaign_name = this.querySelector('[name="campaign_name"]').value.trim();
  var office        = this.querySelector('[name="office"]').value.trim();
  var election_date = this.querySelector('[name="election_date"]').value.trim();

  var errors = [];
  if (!name)          errors.push('Name is required.');
  if (!email)         errors.push('Email is required.');
  else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) errors.push('Please enter a valid email address.');
  if (!campaign_name) errors.push('Campaign / committee name is required.');
  if (!office)        errors.push('Office sought is required.');
  if (!election_date) errors.push('Election date is required.');

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
    var response = await fetch('/api/candidate-inquiry.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data)
    });
    var result = await response.json();

    if (result.success) {
      if (typeof gtag === 'function') { gtag('event', 'generate_lead', { form_location: 'service_candidates' }); }
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
