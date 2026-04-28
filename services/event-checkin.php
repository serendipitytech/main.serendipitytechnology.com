<?php
/**
 * /services/event-checkin — Event Check-In Service
 *
 * Real-time multi-device check-in deployed for your event. $499 flat.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Check-In Service — Serendipity Technology</title>
  <meta name="description" content="Real-time event check-in for galas, conferences, and private events. Multi-device sync, roster import, live dashboard. $499 per event, includes setup, training, and remote support.">
  <link rel="icon" href="/img/logos/serendipity_icon_150.png">

  <!-- Open Graph -->
  <meta property="og:title" content="Event Check-In Service — $499 per event">
  <meta property="og:description" content="Multi-device synced check-in app for galas, conferences, and private events. Set up in days — includes training and live remote support.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://serendipitytechnology.com/services/event-checkin">
  <meta property="og:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png">

  <link rel="canonical" href="https://serendipitytechnology.com/services/event-checkin">

  <?php include __DIR__ . '/partials/service-styles.php'; ?>
</head>
<body class="svc-page">

<?php
/* ============ HERO ============ */
$hero_bg_image       = 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=2000&q=70';
$hero_eyebrow        = 'Event Check-In';
$hero_title          = 'Real-time event check-in, deployed for your event';
$hero_lede           = 'Multi-device synced check-in app for galas, conferences, and private events. Set up in days, includes training and live remote support.';
$hero_accent_text    = 'Book an Event — $499';
$hero_accent_href    = 'javascript:openEventContactModal()';
$hero_cta_text       = "See What's Included";
$hero_cta_href       = '#features';
$hero_secondary_text = 'FAQ';
$hero_secondary_href = '#faq';
include __DIR__ . '/partials/service-hero.php';
?>

<?php
/* ============ FEATURES ============ */
$features_title    = "What's included with every event";
$features_subtitle = 'Everything you need to run a smooth, professional check-in — from roster setup to the last guest walking in the door.';
$features_items = [
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 6v16l7-4 8 4 7-4V2l-7 4-8-4-7 4z"/><path d="M8 2v16"/><path d="M16 6v16"/></svg>',
    'title' => 'Real-Time Multi-Device Sync',
    'desc'  => 'The moment one door staff member checks in a guest, every other device sees the update instantly — no refresh required, no duplicate entries, no confusion when you have multiple entry points.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>',
    'title' => 'Intuitive Check-In Interface',
    'desc'  => 'Swipe gestures and tap interactions for rapid guest processing. Bulk check-in entire tables or groups with a single action. Designed for volunteers and first-time users — no training manual required.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
    'title' => 'Roster Import (CSV or Google Sheets)',
    'desc'  => 'Upload your guest list as a CSV or connect directly to a Google Sheet. Smart column mapping handles varied file formats — first name, last name, table number, meal preference, whatever you have.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
    'title' => 'Role-Based Access Control',
    'desc'  => 'Five-tier permission system — Owner, Admin, Manager, Checker, Member. Door staff can only check in guests. Managers can view dashboards. Admins can import rosters and invite team members.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>',
    'title' => 'Magic Link Authentication',
    'desc'  => 'Secure, passwordless sign-in via email. Invite volunteers who can start checking in guests within minutes — no app store downloads required for web access.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>',
    'title' => 'Live Attendance Dashboard',
    'desc'  => 'Event managers inside the venue see a live count of checked-in guests, who arrived, and who is still expected. No more hunting for a paper list mid-event.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>',
    'title' => 'Mobile + Tablet Support',
    'desc'  => 'Works on iOS, Android, and any modern web browser. Use your existing tablets at the door — no specialized hardware required. iOS App Store version also available.',
  ],
  [
    'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
    'title' => 'Day-Of Remote Support Included',
    'desc'  => 'Every booking includes a dedicated remote support window on your event day. We are available by phone or chat if anything comes up at the door.',
  ],
];
include __DIR__ . '/partials/service-features.php';
?>

<?php
/* ============ PRICING ============ */
$pricing_title    = 'Straightforward event pricing';
$pricing_subtitle = 'No per-attendee fees, no hidden charges. Flat pricing that scales with how many events you run.';
$pricing_tiers = [
  [
    'name'    => 'Single Event',
    'tagline' => 'For a one-time gala, conference, or private event',
    'price'   => 499,
    'period'  => '',
    'setup'   => 'Per event — everything included',
    'features' => [
      '1 event',
      'Full setup and configuration',
      'Roster import (CSV or Google Sheets)',
      'Unlimited check-in devices',
      'Role-based access for your team',
      'Live attendance dashboard',
      'Day-of remote support included',
      'Staff training session (remote)',
      'Post-event attendance data export',
    ],
    'featured'  => false,
    'cta_text'  => 'Book This Event',
    'cta_href'  => 'javascript:openEventContactModal()',
  ],
  [
    'name'    => '3-Event Bundle',
    'tagline' => 'Best value for organizations running multiple events',
    'price'   => 1349,
    'period'  => '',
    'setup'   => '10% off — save $150 vs. single pricing',
    'features' => [
      '3 events (use within 12 months)',
      'Full setup and configuration for each event',
      'Roster import for each event',
      'Unlimited check-in devices per event',
      'Role-based access for your team',
      'Live attendance dashboard',
      'Day-of remote support for all 3 events',
      'Staff training session (once — reuse your team)',
      'Post-event attendance data export for each event',
      'Priority scheduling for event setup calls',
    ],
    'featured' => true,
    'badge'    => 'Best Value',
    'cta_text' => 'Book 3-Event Bundle',
    'cta_href' => 'javascript:openEventContactModal()',
  ],
  [
    'name'    => 'Onsite Support Add-On',
    'tagline' => 'Serendipity staff at your venue — in person',
    'price'   => 750,
    'period'  => '/day',
    'setup'   => 'Add to any single event or bundle booking',
    'features' => [
      'Serendipity staff member on-site at your venue',
      'Direct hardware setup and troubleshooting',
      'On-the-spot volunteer training',
      'Backup device ready if something fails',
      'Available in Volusia County and surrounding areas',
      'Travel outside Central Florida quoted separately',
    ],
    'featured'  => false,
    'cta_text'  => 'Add Onsite Support',
    'cta_href'  => 'javascript:openEventContactModal()',
  ],
];
$pricing_footnote = 'All pricing is per event. Contact us for custom arrangements — recurring series, multi-day events, or high-attendance venues with specific requirements. Travel for onsite support outside Central Florida is quoted on a per-event basis.';
include __DIR__ . '/partials/service-pricing.php';
?>

<?php
/* ============ FAQ ============ */
$faq_title = 'Common questions';
$faq_items = [
  [
    'q' => 'What devices does the check-in app run on?',
    'a' => 'The web app runs on any modern browser — Chrome, Safari, Firefox — on phones, tablets, and laptops. iOS users can also install the native app from the App Store. We recommend tablets (iPad or Android) at the door for the best experience, but phones work fine.',
  ],
  [
    'q' => 'How long does setup take?',
    'a' => 'Most events are ready within 2–3 business days of booking. We schedule a setup call, walk through your roster format, configure roles for your team, and do a test run before the event. For large or complex events (1,000+ attendees, multiple sessions), plan for 5 business days.',
  ],
  [
    'q' => 'Can we use tablets we already own?',
    'a' => 'Yes. Any iPad, Android tablet, or laptop works. We just need a modern browser and an internet connection. No specialized hardware or app installs are required for the web version — your team can be checking in guests within minutes of getting login links.',
  ],
  [
    'q' => 'What format does the guest roster need to be in?',
    'a' => 'CSV or Google Sheets. We can handle most column layouts — the import wizard maps your columns to the right fields. Minimum required: first name, last name. Optional: email, table number, meal preference, ticket type, or any custom fields you want visible to door staff.',
  ],
  [
    'q' => 'What is the refund policy if the event is canceled?',
    'a' => 'If you cancel more than 7 days before the event date, we will issue a full refund or credit toward a future event. If you cancel within 7 days, we retain 50% to cover the setup work already completed. Events rescheduled (not canceled) carry no penalty — we will transfer everything to the new date.',
  ],
  [
    'q' => 'Does check-in work if the internet goes down?',
    'a' => 'The app requires an internet connection for real-time sync. If your venue has spotty Wi-Fi, we strongly recommend having a cellular hotspot as backup. In our experience, most venues have sufficient connectivity — but for outdoor or remote events, we will discuss connectivity options during setup.',
  ],
  [
    'q' => 'Is there a white-label option?',
    'a' => 'Yes — for the 3-event bundle and above, we can configure the interface with your organization name and logo. Contact us to discuss branding requirements. Full custom branding is also available for recurring clients as a custom engagement.',
  ],
  [
    'q' => 'What happens to our data after the event?',
    'a' => 'After the event, you can export the full attendance record (who checked in, at what time) as a CSV. We retain your event data for 30 days, then purge it. If you need longer retention or integration with another system, let us know during setup.',
  ],
];
include __DIR__ . '/partials/service-faq.php';
?>

<?php
/* ============ CLOSING CTA ============ */
$cta_title          = 'Ready to run a smoother event?';
$cta_subtitle       = 'Tell us about your event and we will have your check-in system ready in days.';
$cta_text           = 'Book an Event — $499';
$cta_href           = 'javascript:openEventContactModal()';
$cta_secondary_text = 'Have Questions? Contact Us';
$cta_secondary_href = 'javascript:openEventContactModal()';
include __DIR__ . '/partials/service-cta.php';
?>

<footer style="border-top:1px solid var(--svc-border); padding:32px 0; text-align:center; font-size:13px; color:var(--svc-text-muted);">
  <div class="svc-container">
    <p style="margin:0 0 8px 0;">
      <a href="/" style="color:inherit; text-decoration:none;">Serendipity Technology</a>
      &middot;
      <a href="/services/candidates" style="color:inherit; text-decoration:none;">Candidate Sites</a>
      &middot;
      <a href="/services/business-sites" style="color:inherit; text-decoration:none;">Business Sites</a>
      &middot;
      <a href="/services/membership" style="color:inherit; text-decoration:none;">Membership Portal</a>
      &middot;
      <a href="/services/" style="color:inherit; text-decoration:none;">All Services</a>
    </p>
    <p style="margin:0;">&copy; <?= date('Y') ?> Serendipity Technology. Events run better with the right tools.</p>
  </div>
</footer>

<!-- Event Check-In Contact Modal -->
<div id="eventContactModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:1000; overflow-y:auto;">
  <div style="min-height:100%; display:flex; align-items:flex-start; justify-content:center; padding:32px 16px;">
    <div style="background:#fff; border-radius:12px; box-shadow:0 20px 60px rgba(0,0,0,0.2); width:100%; max-width:640px; position:relative;">

      <!-- Modal header -->
      <div style="position:sticky; top:0; background:#fff; border-bottom:1px solid #e5e7eb; padding:16px 24px; border-radius:12px 12px 0 0; display:flex; align-items:center; justify-content:space-between; z-index:10;">
        <div>
          <h2 style="margin:0 0 2px; font-size:18px; font-weight:700; color:#1f2937;">Book Your Event</h2>
          <p style="margin:0; font-size:13px; color:#6b7280;">Tell us about your event and we'll get back within 24 hours</p>
        </div>
        <button onclick="closeEventContactModal()" aria-label="Close"
          style="width:36px; height:36px; border:none; background:none; cursor:pointer; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#9ca3af; transition:background 0.15s;"
          onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='none'">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
          </svg>
        </button>
      </div>

      <!-- Form -->
      <form id="eventContactForm" style="padding:24px;" novalidate>

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
            <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Organization <span style="color:#F7B06A;">*</span></span>
            <input type="text" name="organization" required
              style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
              onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
              onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
          </label>
        </div>

        <label style="display:block; margin-bottom:12px;">
          <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Event Name <span style="color:#F7B06A;">*</span></span>
          <input type="text" name="event_name" required placeholder="e.g. Annual Gala 2026"
            style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
            onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
        </label>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:12px;">
          <label style="display:block;">
            <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Event Date <span style="color:#F7B06A;">*</span></span>
            <input type="date" name="event_date" required
              style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
              onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
              onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
          </label>
          <label style="display:block;">
            <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Expected Attendees <span style="color:#F7B06A;">*</span></span>
            <input type="number" name="expected_attendees" required placeholder="e.g. 250" min="1"
              style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
              onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
              onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
          </label>
        </div>

        <label style="display:block; margin-bottom:12px;">
          <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Event Location / Venue</span>
          <input type="text" name="location" placeholder="e.g. Daytona Beach Marriott"
            style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937;"
            onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
        </label>

        <label style="display:block; margin-bottom:16px;">
          <span style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:4px;">Message <span style="font-size:12px; font-weight:400; color:#9ca3af;">(optional)</span></span>
          <textarea name="message" rows="3" placeholder="Tell us about your event, any special requirements, or questions about onsite support..."
            style="width:100%; padding:9px 12px; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; background:#f9fafb; box-sizing:border-box; font-family:inherit; color:#1f2937; resize:vertical;"
            onfocus="this.style.borderColor='#4FC4F0';this.style.boxShadow='0 0 0 3px rgba(79,196,240,0.15)';this.style.background='#fff'"
            onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'"></textarea>
        </label>

        <div id="eventFormMessage" style="display:none; margin-bottom:12px; padding:10px 14px; border-radius:6px; font-size:14px;"></div>

        <button type="submit" id="eventSubmitBtn"
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
function openEventContactModal() {
  document.getElementById('eventContactModal').style.display = 'block';
  document.body.style.overflow = 'hidden';
}
function closeEventContactModal() {
  document.getElementById('eventContactModal').style.display = 'none';
  document.body.style.overflow = '';
}
document.getElementById('eventContactModal').addEventListener('click', function(e) {
  if (e.target === this) closeEventContactModal();
});
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') closeEventContactModal();
});

document.getElementById('eventContactForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  var btn = document.getElementById('eventSubmitBtn');
  var msg = document.getElementById('eventFormMessage');

  var name               = this.querySelector('[name="name"]').value.trim();
  var email              = this.querySelector('[name="email"]').value.trim();
  var organization       = this.querySelector('[name="organization"]').value.trim();
  var event_name         = this.querySelector('[name="event_name"]').value.trim();
  var event_date         = this.querySelector('[name="event_date"]').value.trim();
  var expected_attendees = this.querySelector('[name="expected_attendees"]').value.trim();

  var errors = [];
  if (!name)               errors.push('Name is required.');
  if (!email)              errors.push('Email is required.');
  else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) errors.push('Please enter a valid email address.');
  if (!organization)       errors.push('Organization is required.');
  if (!event_name)         errors.push('Event name is required.');
  if (!event_date)         errors.push('Event date is required.');
  if (!expected_attendees) errors.push('Expected attendee count is required.');

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
    var response = await fetch('/api/event-checkin-inquiry.php', {
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
      msg.textContent = "Thanks! We'll be in touch within 24 hours to get your event set up.";
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
