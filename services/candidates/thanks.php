<?php
/**
 * /services/candidates/thanks.php
 * Thank-you page shown after successful campaign signup form submission.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submission Received — Serendipity Technology</title>
  <meta name="description" content="We received your campaign signup. We'll be in touch within 1 business day.">
  <link rel="icon" href="/img/logos/serendipity_icon_150.png">
  <meta name="robots" content="noindex">

  <?php include __DIR__ . '/../partials/service-styles.php'; ?>
  <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
  <style>
    .thanks-hero {
      background: linear-gradient(135deg, #1a2a3a 0%, #0f1e2d 100%);
      padding: 80px 16px 96px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .thanks-hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background-image:
        radial-gradient(circle at 20% 40%, rgba(79,196,240,0.2) 0%, transparent 55%),
        radial-gradient(circle at 80% 60%, rgba(247,176,106,0.15) 0%, transparent 55%);
      pointer-events: none;
    }
    .thanks-hero > .svc-container { position: relative; z-index: 1; }

    .thanks-card {
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-radius: var(--svc-radius-lg);
      padding: 48px 40px;
      max-width: 640px;
      margin: 0 auto;
      box-shadow: 0 16px 48px rgba(0,0,0,0.18);
      border: 1px solid rgba(255,255,255,0.6);
    }

    .thanks-icon {
      width: 64px;
      height: 64px;
      background: linear-gradient(135deg, #4FC4F0, #F7B06A);
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
    }

    .thanks-card h1 {
      font-family: "Gill Sans", "Gill Sans MT", 'Roboto', sans-serif;
      font-size: 28px;
      font-weight: 700;
      color: var(--svc-text);
      margin: 0 0 12px 0;
    }

    .thanks-card .lede {
      font-size: 16px;
      color: var(--svc-text-muted);
      margin: 0 0 28px 0;
    }

    .next-steps {
      background: var(--svc-bg-alt);
      border: 1px solid var(--svc-border);
      border-radius: var(--svc-radius);
      padding: 20px 24px;
      text-align: left;
      margin-bottom: 28px;
    }

    .next-steps h3 {
      font-size: 13px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--svc-text-muted);
      margin: 0 0 12px 0;
    }

    .next-steps ol {
      margin: 0;
      padding-left: 20px;
      font-size: 14px;
      color: var(--svc-text);
      line-height: 1.7;
    }

    .next-steps ol li { margin-bottom: 4px; }

    @media (max-width: 640px) {
      .thanks-card { padding: 32px 20px; }
    }
  </style>
</head>
<body class="svc-page has-fixed-header">

<?php
$header_always_visible = true;
$header_chat_action = 'openContactModal()';
include __DIR__ . '/../../partials/site-header.php';
?>

<div class="thanks-hero">
  <div class="svc-container">
    <div class="thanks-card">
      <div class="thanks-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
          stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="20 6 9 17 4 12"/>
        </svg>
      </div>

      <h1>Submission received</h1>
      <p class="lede">
        Thanks for signing up for the Serendipity Technology Candidate Package. We'll review your information and email you within 1 business day.
      </p>

      <div class="next-steps">
        <h3>What happens next</h3>
        <ol>
          <li>We review your submission and check your domain options.</li>
          <li>We email you to confirm availability and answer any questions.</li>
          <li>You complete the $49 setup payment.</li>
          <li>We build and launch your campaign site within 5 business days.</li>
        </ol>
      </div>

      <div class="svc-hero-actions">
        <a href="/services/candidates" class="svc-btn svc-btn-secondary">
          Back to Candidate Package
        </a>
        <a href="/" class="svc-btn svc-btn-primary">
          Serendipity Technology Home
        </a>
      </div>

      <p style="margin-top:20px; font-size:13px; color:var(--svc-text-muted);">
        Questions? Email <a href="mailto:info@serendipitytech.net" style="color:var(--svc-primary);">info@serendipitytech.net</a>
      </p>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../../partials/site-footer.php'; ?>
<?php include __DIR__ . '/../../partials/site-contact-modal.php'; ?>

</body>
</html>
