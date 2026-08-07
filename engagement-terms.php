<?php
/**
 * /engagement-terms — Public Engagement Terms page.
 *
 * Linked from welcome emails, client portal, proposals.
 * Public (no auth) — same model as the other /services/* pages.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Engagement Terms — Serendipity Technology</title>
  <meta name="description" content="Rates, engagement models, payment terms, and what's included for Serendipity Technology clients.">
  <link rel="icon" href="/img/logos/serendipity_icon_150.png">

  <!-- Open Graph -->
  <meta property="og:title" content="Engagement Terms — Serendipity Technology">
  <meta property="og:description" content="How we work together: rates, models, payment terms, and what's always included.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://serendipitytechnology.com/engagement-terms">
  <meta property="og:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png">

  <link rel="canonical" href="https://serendipitytechnology.com/engagement-terms">

  <?php include __DIR__ . '/services/partials/service-styles.php'; ?>

  <style>
    /* Page-specific tweaks on top of the shared .svc-* system */
    .svc-page { padding-top: 60px; } /* offset for fixed header */
    .terms-hero {
      background: linear-gradient(135deg, #00516A 0%, #00a2e8 100%);
      color: #fff;
      padding: 56px 0 44px;
      text-align: center;
    }
    .terms-hero .svc-eyebrow { color: rgba(255,255,255,0.85); }
    .terms-hero h1 {
      margin: 8px 0 12px;
      font-size: 38px;
      font-weight: 800;
      letter-spacing: -0.01em;
      color: #fff;
    }
    .terms-hero p.lede { font-size: 17px; opacity: 0.95; max-width: 620px; margin: 0 auto; }
    .terms-hero .effective { font-size: 13px; opacity: 0.75; margin-top: 14px; }

    .terms-section { padding: 44px 0; }
    .terms-section:nth-child(even) { background: #f8fbfd; }

    .terms-section h2 {
      font-size: 22px;
      font-weight: 700;
      margin: 0 0 18px;
      color: #00516A;
      border-bottom: 2px solid #00a2e8;
      padding-bottom: 8px;
      display: inline-block;
    }

    .terms-section p, .terms-section li {
      font-size: 15.5px;
      line-height: 1.65;
      color: #374151;
    }

    .terms-card {
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 10px;
      padding: 24px 28px;
      box-shadow: 0 2px 6px rgba(15,23,42,0.04);
    }

    .rate-card {
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
      margin: 18px 0 12px;
    }
    .rate-card .rate-box {
      flex: 1 1 240px;
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 10px;
      padding: 18px 22px;
      text-align: center;
    }
    .rate-card .rate-box.discount { background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%); border-color: #6ee7b7; }
    .rate-card .label { font-size: 12px; color: #6b7280; text-transform: uppercase; letter-spacing: 0.6px; margin-bottom: 6px; }
    .rate-card .rate { font-size: 26px; font-weight: 800; color: #111827; }
    .rate-card .sub { font-size: 12.5px; color: #6b7280; margin-top: 4px; }
    .rate-card .rate-box.discount .rate { color: #065f46; }

    table.terms-table {
      width: 100%;
      border-collapse: collapse;
      margin: 16px 0 22px;
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 10px;
      overflow: hidden;
      font-size: 14.5px;
    }
    table.terms-table th, table.terms-table td {
      padding: 13px 16px;
      text-align: left;
      vertical-align: top;
      border-bottom: 1px solid #e5e7eb;
    }
    table.terms-table th { background: #f3f4f6; font-weight: 600; color: #374151; font-size: 13px; }
    table.terms-table tr:last-child td { border-bottom: none; }

    .terms-section ul { padding-left: 22px; margin: 10px 0 16px; }
    .terms-section ul li { margin-bottom: 8px; }

    .contact-cta {
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 12px;
      padding: 26px 30px;
      text-align: center;
      margin-top: 24px;
      box-shadow: 0 4px 12px rgba(15,23,42,0.06);
    }
    .contact-cta h3 { margin: 0 0 8px; font-size: 19px; color: #00516A; }
    .contact-cta a { color: #00a2e8; text-decoration: none; font-weight: 600; }
    .contact-cta a:hover { text-decoration: underline; }
    .contact-cta .phone { font-size: 16px; color: #111827; font-weight: 600; margin-top: 4px; }

    @media (max-width: 640px) {
      .terms-hero h1 { font-size: 30px; }
    }
  </style>
</head>
<body class="svc-page has-fixed-header">

<?php
$header_always_visible = true;
include __DIR__ . '/partials/site-header.php';
?>

<!-- ============ HERO ============ -->
<section class="terms-hero">
  <div class="svc-container">
    <div class="svc-eyebrow">How we work together</div>
    <h1>Engagement Terms</h1>
    <p class="lede">Rates, models, payment terms, and what's included when you work with Serendipity Technology.</p>
    <div class="effective">Effective 2026-06-09</div>
  </div>
</section>

<!-- ============ RATE STRUCTURE ============ -->
<section class="terms-section">
  <div class="svc-container">
    <h2>Rate Structure</h2>

    <div class="rate-card">
      <div class="rate-box">
        <div class="label">Standard hourly</div>
        <div class="rate">$225 / hr</div>
        <div class="sub">Default published rate</div>
      </div>
      <div class="rate-box discount">
        <div class="label">Democratic &amp; civic discount</div>
        <div class="rate">$112.50 / hr</div>
        <div class="sub">50% off for democratically-aligned causes</div>
      </div>
    </div>

    <p>
      The Democratic and civic discount applies to Democratic clubs and caucuses, county and state Democratic infrastructure, and democratically-aligned 501(c) civic organizations &mdash; including the Volusia County Democratic Black Caucus, NW Dems, the Volusia County Democratic clubs and caucuses, and similar mission-aligned organizations. Eligibility confirmed at engagement start.
    </p>
    <p><strong>Billing increments:</strong> 15 minutes ($28.13 / 15 min at discounted rate)</p>
  </div>
</section>

<!-- ============ ENGAGEMENT MODELS ============ -->
<section class="terms-section">
  <div class="svc-container">
    <h2>Engagement Models</h2>
    <table class="terms-table">
      <thead>
        <tr><th>Model</th><th>Best for</th><th>How it works</th></tr>
      </thead>
      <tbody>
        <tr>
          <td><strong>Hourly</strong><br><span style="font-size:12px;color:#6b7280;">default</span></td>
          <td>Ongoing or as-needed work</td>
          <td>Time tracked in 15-min increments, invoiced monthly in arrears, Net 30</td>
        </tr>
        <tr>
          <td><strong>Retainer</strong></td>
          <td>Stable ongoing needs (~5+ hr/month)</td>
          <td>Fixed monthly amount, typical 5-10 hr/month at +10% additional discount, billed in advance</td>
        </tr>
        <tr>
          <td><strong>Fixed-fee project</strong></td>
          <td>Defined scope with clear deliverables</td>
          <td>Quoted up front, 50% deposit + 50% on completion</td>
        </tr>
        <tr>
          <td><strong>Recurring services</strong></td>
          <td>Hosted services (Google Workspace, Stripe Connect, hosting)</td>
          <td>Quarterly or yearly invoice billed in advance, includes the service cost plus administrative support</td>
        </tr>
      </tbody>
    </table>
    <p style="color: #6b7280;">You can mix these — e.g., a small monthly retainer for routine work plus occasional fixed-fee project bills.</p>
  </div>
</section>

<!-- ============ PAYMENT TERMS ============ -->
<section class="terms-section">
  <div class="svc-container">
    <h2>Payment Terms</h2>
    <ul>
      <li><strong>Net 30</strong> on all invoices (due within 30 days of invoice date)</li>
      <li><strong>Accepted methods:</strong> Credit/debit card, ACH bank transfer (preferred for invoices over $200)</li>
      <li><strong>Late notice:</strong> Invoices &gt; 60 days past due trigger a follow-up; work may be paused pending payment</li>
      <li><strong>Recurring services billed in advance</strong> per Serendipity policy — disclaimer included on every recurring invoice</li>
    </ul>
  </div>
</section>

<!-- ============ CLIENT PORTAL ============ -->
<section class="terms-section">
  <div class="svc-container">
    <h2>Client Portal</h2>
    <p>
      Every active client gets free access to a hosted Client Portal at <a href="https://dashboard.serendipitylabs.cloud" style="color: #00a2e8; text-decoration: none; font-weight: 600;">dashboard.serendipitylabs.cloud</a>, which provides:
    </p>
    <ul>
      <li>Live project status with every work item tracked in real-time</li>
      <li>Estimate approval workflow — you see scoped work + pricing before it's started</li>
      <li>Payment history and online payment options</li>
      <li>Direct request-submission for new features or questions</li>
    </ul>
    <p>Access is via magic link (no password required) sent to your email; bookmark for permanent access.</p>
  </div>
</section>

<!-- ============ INCLUDED + EXCLUDED ============ -->
<section class="terms-section">
  <div class="svc-container">
    <h2>What's Always Included (No Charge)</h2>
    <ul>
      <li>First 30-minute scoping conversation for any new project or major change</li>
      <li>Routine email/text responsiveness on existing work</li>
      <li>Documentation of work completed (handed off to you as your engagement winds down)</li>
      <li>Periodic security and stability reviews of hosted services</li>
    </ul>

    <h2 style="margin-top: 32px;">What's Specifically Excluded</h2>
    <ul>
      <li>Out-of-pocket service costs (Google Workspace seats, Stripe processing, etc.) &mdash; passed through at cost unless otherwise quoted</li>
      <li>Travel and on-site work outside Volusia County, FL &mdash; billed separately</li>
      <li>Emergency response outside normal business hours &mdash; billed at 1.5× standard rate (minimum 1 hour)</li>
      <li>Third-party software licensing required for your specific work</li>
    </ul>
  </div>
</section>

<!-- ============ HOURS & BOUNDARIES ============ -->
<section class="terms-section">
  <div class="svc-container">
    <h2>Working Hours &amp; Boundaries</h2>
    <ul>
      <li>I generally work 8 AM – 6 PM Eastern, Monday–Friday. Off-hours response is best-effort.</li>
      <li>New engagement starts within 1–2 weeks of agreement; emergencies discussed case-by-case.</li>
      <li>I retain the right to decline work that conflicts with mission alignment or capacity.</li>
    </ul>

    <div class="contact-cta">
      <h3>Questions?</h3>
      <p><a href="mailto:troy@serendipitytech.net">troy@serendipitytech.net</a></p>
      <div class="phone">407.545.6070</div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/partials/site-footer.php'; ?>

<!-- Contact modal (in case header chat icon is clicked) -->
<?php include __DIR__ . '/partials/site-contact-modal.php'; ?>

</body>
</html>
