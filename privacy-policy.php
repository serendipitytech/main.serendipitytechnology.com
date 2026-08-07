<?php
/**
 * /privacy-policy — Public Privacy Policy.
 * Public (no auth). Includes the SMS/messaging data section required for
 * A2P 10DLC campaign registration (carriers verify this URL).
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Privacy Policy — Serendipity Technology</title>
  <meta name="description" content="How Serendipity Technology collects, uses, and protects your information, including our SMS/text messaging practices.">
  <link rel="icon" href="/img/logos/serendipity_icon_150.png">
  <meta property="og:title" content="Privacy Policy — Serendipity Technology">
  <meta property="og:description" content="How we collect, use, and protect your information, including SMS/text messaging.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://serendipitytechnology.com/privacy-policy">
  <meta property="og:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png">
  <link rel="canonical" href="https://serendipitytechnology.com/privacy-policy">

  <?php include __DIR__ . '/services/partials/service-styles.php'; ?>

  <style>
    .svc-page { padding-top: 60px; }
    .legal-hero {
      background: linear-gradient(135deg, #00516A 0%, #00a2e8 100%);
      color: #fff; padding: 56px 0 44px; text-align: center;
    }
    .legal-hero .svc-eyebrow { color: rgba(255,255,255,0.85); }
    .legal-hero h1 { margin: 8px 0 12px; }
    .legal-hero .effective { font-size: 14px; opacity: 0.9; margin-top: 10px; }
    .legal-section { padding: 40px 0; }
    .legal-section .svc-container { max-width: 820px; }
    .legal-section h2 { margin: 30px 0 10px; font-size: 22px; }
    .legal-section h3 { margin: 22px 0 6px; font-size: 17px; }
    .legal-section p, .legal-section li { color: #374151; line-height: 1.7; }
    .legal-section ul { margin: 8px 0 8px 20px; }
    .legal-callout {
      background: #f0f9ff; border-left: 4px solid #00a2e8;
      padding: 14px 18px; border-radius: 8px; margin: 16px 0;
    }
  </style>
</head>
<body>

<?php
$header_always_visible = true;
include __DIR__ . '/partials/site-header.php';
?>

<section class="legal-hero">
  <div class="svc-container">
    <div class="svc-eyebrow">Your privacy</div>
    <h1>Privacy Policy</h1>
    <p class="lede">How we collect, use, and protect your information.</p>
    <div class="effective">Effective 2026-07-24</div>
  </div>
</section>

<section class="legal-section">
  <div class="svc-container">

    <p>Serendipity Technology ("Serendipity," "we," "us," or "our"), operated by Serendipity Holdings, LLC in Volusia County, Florida, respects your privacy. This policy explains what information we collect, how we use it, and the choices you have.</p>

    <h2>Information we collect</h2>
    <ul>
      <li><strong>Contact information</strong> you provide through our forms: name, email address, phone number, organization, and the details of your inquiry.</li>
      <li><strong>Communication preferences</strong>, such as whether you asked to be contacted by email or text message.</li>
      <li><strong>Usage information</strong> collected automatically through standard web analytics (for example, pages visited and general device information).</li>
    </ul>

    <h2>How we use your information</h2>
    <ul>
      <li>To respond to your inquiry and provide the services you request.</li>
      <li>To send service-related and account-related communications, including appointment reminders, project and account updates, and replies to your messages.</li>
      <li>To operate, maintain, and improve our website and services.</li>
    </ul>

    <h2>SMS / text messaging</h2>
    <p>If you provide your mobile number and choose text as a preferred contact method, or if you text one of our keywords, you consent to receive SMS messages from Serendipity Technology related to your inquiry and your account (for example, replies, appointment reminders, and project or account updates).</p>
    <ul>
      <li>Message frequency varies.</li>
      <li>Message and data rates may apply.</li>
      <li>Reply <strong>STOP</strong> at any time to opt out, or <strong>HELP</strong> for help.</li>
    </ul>
    <div class="legal-callout">
      <strong>We do not sell or rent your personal information.</strong> Mobile phone numbers and SMS/text messaging opt-in and consent information are <strong>never shared with third parties or affiliates for any purpose, including marketing or promotional purposes</strong>. Your consent to receive text messages is used only to deliver the messages you asked for.
    </div>

    <h2>Service providers</h2>
    <p>We use trusted third-party providers to operate our services (for example, messaging, email delivery, and payment processing). These providers process information only as needed to perform services for us and are not permitted to use it for their own marketing. As noted above, SMS opt-in and consent data is not shared for marketing purposes.</p>

    <h2>Data retention</h2>
    <p>We retain personal information for as long as needed to provide our services and for legitimate business or legal purposes, after which we delete or de-identify it.</p>

    <h2>Your choices</h2>
    <ul>
      <li>You can opt out of text messages at any time by replying STOP.</li>
      <li>You can request access to, correction of, or deletion of your personal information by contacting us.</li>
    </ul>

    <h2>Children's privacy</h2>
    <p>Our services are not directed to children under 13, and we do not knowingly collect their information.</p>

    <h2>Changes to this policy</h2>
    <p>We may update this policy from time to time. The effective date above reflects the latest version.</p>

    <h2>Contact us</h2>
    <p>Questions about this policy or your information: email <a href="mailto:troy@serendipitytech.net">troy@serendipitytech.net</a> or visit <a href="https://serendipitytechnology.com">serendipitytechnology.com</a>. See also our <a href="/terms.php">Terms of Service</a>.</p>

  </div>
</section>

<?php include __DIR__ . '/partials/site-footer.php'; ?>
</body>
</html>
