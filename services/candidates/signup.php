<?php
/**
 * /services/candidates/signup.php
 * Campaign signup form — Pass 1 (data collection, no Stripe yet).
 * Collects full campaign details and posts to /api/candidate-signup.php.
 *
 * TODO: Pass 2 — add Stripe Checkout after candidate-signup.php saves the record.
 */

$error = trim($_GET['error'] ?? '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Campaign Signup — Serendipity Technology</title>
  <meta name="description" content="Start your campaign website. Tell us about your race and we'll get your site live in days.">
  <link rel="icon" href="/img/logos/serendipity_icon_150.png">
  <link rel="canonical" href="https://serendipitytechnology.com/services/candidates/signup">

  <?php include __DIR__ . '/../partials/service-styles.php'; ?>
  <style>
    /* ---- Signup page extras ---- */
    .signup-hero {
      background: linear-gradient(135deg, #1a2a3a 0%, #0f1e2d 100%);
      padding: 56px 16px 64px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .signup-hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background-image:
        radial-gradient(circle at 15% 40%, rgba(79,196,240,0.18) 0%, transparent 55%),
        radial-gradient(circle at 85% 60%, rgba(247,176,106,0.15) 0%, transparent 55%);
      pointer-events: none;
    }
    .signup-hero > .svc-container { position: relative; z-index: 1; }

    .signup-card {
      background: #fff;
      border-radius: var(--svc-radius-lg);
      box-shadow: 0 12px 40px rgba(0,0,0,0.16);
      border: 1px solid var(--svc-border);
      max-width: 760px;
      margin: 0 auto;
      overflow: hidden;
    }

    .signup-card-header {
      padding: 28px 32px 20px;
      border-bottom: 1px solid var(--svc-border);
      background: var(--svc-bg-alt);
    }

    .signup-card-header h1 {
      font-family: "Gill Sans", "Gill Sans MT", 'Roboto', sans-serif;
      font-size: 24px;
      font-weight: 700;
      color: var(--svc-text);
      margin: 0 0 4px 0;
    }

    .signup-card-header p {
      font-size: 14px;
      color: var(--svc-text-muted);
      margin: 0;
    }

    .signup-form { padding: 28px 32px 32px; }

    .signup-section {
      margin-bottom: 32px;
    }

    .signup-section-title {
      font-size: 13px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--svc-primary);
      margin: 0 0 16px 0;
      padding-bottom: 8px;
      border-bottom: 2px solid var(--svc-border);
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .signup-section-title::before {
      content: attr(data-num);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      background: var(--svc-primary);
      color: #fff;
      font-size: 11px;
      font-weight: 700;
      flex-shrink: 0;
    }

    .signup-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
    }
    .signup-grid .full { grid-column: 1 / -1; }

    .signup-field label {
      display: block;
      font-size: 13px;
      font-weight: 600;
      color: var(--svc-text);
      margin-bottom: 5px;
    }
    .signup-field label .req {
      color: var(--svc-accent);
      margin-left: 2px;
    }
    .signup-field label .opt {
      font-weight: 400;
      color: var(--svc-text-muted);
      margin-left: 4px;
      font-size: 12px;
    }

    .signup-input {
      width: 100%;
      padding: 9px 12px;
      font-size: 14px;
      border: 1px solid var(--svc-border);
      border-radius: var(--svc-radius-sm);
      background: var(--svc-bg-alt);
      color: var(--svc-text);
      font-family: inherit;
      box-sizing: border-box;
      transition: border-color 0.15s, box-shadow 0.15s, background 0.15s;
    }
    .signup-input:focus {
      outline: none;
      border-color: var(--svc-primary);
      box-shadow: 0 0 0 3px rgba(79,196,240,0.15);
      background: #fff;
    }
    .signup-input::placeholder { color: var(--svc-text-subtle); }

    .signup-checks {
      display: flex;
      flex-direction: column;
      gap: 12px;
      margin-bottom: 24px;
    }
    .signup-check {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      font-size: 14px;
      color: var(--svc-text-muted);
      cursor: pointer;
    }
    .signup-check input[type="checkbox"] {
      flex-shrink: 0;
      margin-top: 2px;
      width: 16px;
      height: 16px;
      accent-color: var(--svc-primary);
      cursor: pointer;
    }
    .signup-check a { color: var(--svc-primary); text-decoration: underline; }

    .signup-submit {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      width: 100%;
      padding: 14px 24px;
      font-size: 16px;
      font-weight: 700;
      background: var(--svc-accent);
      color: #fff;
      border: none;
      border-radius: var(--svc-radius-sm);
      cursor: pointer;
      font-family: inherit;
      transition: background 0.15s, transform 0.1s;
    }
    .signup-submit:hover { background: #f59e0b; }
    .signup-submit:active { transform: translateY(1px); }

    .signup-notice {
      margin-top: 12px;
      font-size: 12px;
      color: var(--svc-text-subtle);
      text-align: center;
    }

    .error-banner {
      background: #fef2f2;
      border: 1px solid #fecaca;
      color: #b91c1c;
      border-radius: var(--svc-radius-sm);
      padding: 12px 16px;
      font-size: 14px;
      margin-bottom: 20px;
    }

    @media (max-width: 640px) {
      .signup-grid { grid-template-columns: 1fr; }
      .signup-form { padding: 20px 16px 24px; }
      .signup-card-header { padding: 20px 16px 16px; }
    }
  </style>
</head>
<body class="svc-page">

<!-- Hero banner -->
<div class="signup-hero">
  <div class="svc-container">
    <p class="svc-eyebrow" style="color:#F7B06A; text-align:center;">Candidate Package — $49 Setup + $20/month</p>
    <h2 style="font-family:'Gill Sans','Gill Sans MT',sans-serif; font-size:32px; font-weight:700; color:#fff; margin:0 0 8px; text-align:center;">
      Tell us about your campaign
    </h2>
    <p style="color:rgba(255,255,255,0.7); font-size:15px; margin:0; text-align:center;">
      We'll review your submission and email you within 1 business day to confirm domain availability and next steps.
    </p>
  </div>
</div>

<!-- Form card -->
<section class="svc-section" style="padding-top:40px; padding-bottom:64px; background:var(--svc-bg-alt);">
  <div class="svc-container">
    <div class="signup-card">
      <div class="signup-card-header">
        <h1>Campaign Signup Form</h1>
        <p>All fields marked <span style="color:var(--svc-accent);">*</span> are required. Everything else helps us get your site right the first time.</p>
      </div>

      <form class="signup-form" method="POST" action="/api/candidate-signup.php" novalidate>

        <?php if ($error): ?>
        <div class="error-banner">
          <?= htmlspecialchars($error) ?>
        </div>
        <?php endif; ?>

        <!-- Section 1: Candidate Info -->
        <div class="signup-section">
          <p class="signup-section-title" data-num="1">Candidate Info</p>
          <div class="signup-grid">
            <div class="signup-field full">
              <label for="candidate_name">Candidate Full Name <span class="req">*</span></label>
              <input class="signup-input" type="text" id="candidate_name" name="candidate_name"
                placeholder="Jane Smith" required>
            </div>
            <div class="signup-field">
              <label for="candidate_email">Candidate Email <span class="req">*</span>
                <span class="opt">(becomes your login)</span></label>
              <input class="signup-input" type="email" id="candidate_email" name="candidate_email"
                placeholder="jane@example.com" required>
            </div>
            <div class="signup-field">
              <label for="candidate_phone">Candidate Phone <span class="opt">(optional)</span></label>
              <input class="signup-input" type="tel" id="candidate_phone" name="candidate_phone"
                placeholder="(407) 555-1234">
            </div>
          </div>
        </div>

        <!-- Section 2: Campaign Details -->
        <div class="signup-section">
          <p class="signup-section-title" data-num="2">Campaign Details</p>
          <div class="signup-grid">
            <div class="signup-field full">
              <label for="campaign_name">Campaign / Committee Name <span class="req">*</span>
                <span class="opt">(as registered with election supervisor)</span></label>
              <input class="signup-input" type="text" id="campaign_name" name="campaign_name"
                placeholder="Jane Smith for Volusia County School Board" required>
            </div>
            <div class="signup-field">
              <label for="office">Office Sought <span class="req">*</span></label>
              <input class="signup-input" type="text" id="office" name="office"
                placeholder="School Board, District 4" required>
            </div>
            <div class="signup-field">
              <label for="jurisdiction">Jurisdiction <span class="opt">(optional)</span></label>
              <input class="signup-input" type="text" id="jurisdiction" name="jurisdiction"
                placeholder="Volusia County">
            </div>
            <div class="signup-field">
              <label for="party">Party Affiliation <span class="opt">(optional)</span></label>
              <select class="signup-input" id="party" name="party">
                <option value="">— Select —</option>
                <option value="Democrat">Democrat</option>
                <option value="Republican">Republican</option>
                <option value="Nonpartisan">Nonpartisan</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="signup-field">
              <label for="election_date">Election Date <span class="req">*</span></label>
              <input class="signup-input" type="date" id="election_date" name="election_date" required>
            </div>
            <div class="signup-field">
              <label for="primary_date">Primary Date <span class="opt">(if applicable)</span></label>
              <input class="signup-input" type="date" id="primary_date" name="primary_date">
            </div>
            <div class="signup-field">
              <label for="treasurer_name">Treasurer Name <span class="opt">(optional)</span></label>
              <input class="signup-input" type="text" id="treasurer_name" name="treasurer_name"
                placeholder="Bob Jones">
            </div>
            <div class="signup-field">
              <label for="treasurer_email">Treasurer Email <span class="opt">(optional)</span></label>
              <input class="signup-input" type="email" id="treasurer_email" name="treasurer_email"
                placeholder="treasurer@example.com">
            </div>
          </div>
        </div>

        <!-- Section 3: Website Details -->
        <div class="signup-section">
          <p class="signup-section-title" data-num="3">Website Details</p>
          <div class="signup-grid">
            <div class="signup-field">
              <label for="desired_domain">Desired Domain <span class="opt">(optional)</span></label>
              <input class="signup-input" type="text" id="desired_domain" name="desired_domain"
                placeholder="janesmith2026.com">
            </div>
            <div class="signup-field">
              <label for="backup_domains">Backup Domain Options <span class="opt">(optional)</span></label>
              <input class="signup-input" type="text" id="backup_domains" name="backup_domains"
                placeholder="smithforschoolboard.com, votesmith2026.com">
            </div>
            <div class="signup-field">
              <label for="donation_processor">Donation Processor <span class="opt">(optional)</span></label>
              <select class="signup-input" id="donation_processor" name="donation_processor">
                <option value="">— Select —</option>
                <option value="ActBlue">ActBlue</option>
                <option value="Anedot">Anedot</option>
                <option value="WinRed">WinRed</option>
                <option value="Other">Other</option>
                <option value="None">Not set up yet</option>
              </select>
            </div>
            <div class="signup-field">
              <label for="donation_url">Donation Link URL <span class="opt">(optional)</span></label>
              <input class="signup-input" type="url" id="donation_url" name="donation_url"
                placeholder="https://secure.actblue.com/donate/...">
            </div>
          </div>
        </div>

        <!-- Section 4: Confirmation -->
        <div class="signup-section">
          <p class="signup-section-title" data-num="4">Confirmation</p>
          <div class="signup-checks">
            <label class="signup-check">
              <input type="checkbox" name="confirm_rep" value="1" required>
              <span>I confirm I am the candidate or authorized representative of this campaign.</span>
            </label>
            <label class="signup-check">
              <input type="checkbox" name="confirm_optin" value="1" required>
              <span>I understand that any newsletter add-on is for opt-in subscribers only — no voter file blasts.</span>
            </label>
            <label class="signup-check">
              <input type="checkbox" name="confirm_tos" value="1" required>
              <span>I agree to the <a href="/terms" target="_blank">Terms of Service</a> and <a href="/privacy" target="_blank">Privacy Policy</a>.</span>
            </label>
          </div>

          <button type="submit" class="signup-submit">
            Continue to Payment — $49 setup
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
            </svg>
          </button>
          <p class="signup-notice">
            You won't be charged yet. We'll review your submission and confirm domain availability first.
          </p>
        </div>

      </form>
    </div>

    <p style="text-align:center; margin-top:16px; font-size:13px; color:var(--svc-text-muted);">
      Questions? <a href="mailto:info@serendipitytech.net" style="color:var(--svc-primary);">info@serendipitytech.net</a>
      &nbsp;&middot;&nbsp;
      <a href="/services/candidates" style="color:var(--svc-text-muted);">Back to Candidate Package</a>
    </p>
  </div>
</section>

<footer style="border-top:1px solid var(--svc-border); padding:24px 0; text-align:center; font-size:13px; color:var(--svc-text-muted);">
  <div class="svc-container">
    &copy; <?= date('Y') ?> Serendipity Technology. All campaigns deserve good tools.
  </div>
</footer>

</body>
</html>
