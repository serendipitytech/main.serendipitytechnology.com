<?php
/**
 * /terms — Public Website & Messaging Terms of Service.
 * Public (no auth). Includes the SMS/messaging program terms required for
 * A2P 10DLC campaign registration (carriers verify this URL).
 * Distinct from /engagement-terms.php, which covers client service rates/engagement.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terms of Service — Serendipity Technology</title>
  <meta name="description" content="Terms governing use of the Serendipity Technology website and our SMS/text messaging program.">
  <link rel="icon" href="/img/logos/serendipity_icon_150.png">
  <meta property="og:title" content="Terms of Service — Serendipity Technology">
  <meta property="og:description" content="Website and SMS/text messaging terms of service.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://serendipitytechnology.com/terms">
  <meta property="og:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png">
  <link rel="canonical" href="https://serendipitytechnology.com/terms">

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
    <div class="svc-eyebrow">The fine print</div>
    <h1>Terms of Service</h1>
    <p class="lede">Terms for using our website and our text messaging program.</p>
    <div class="effective">Effective 2026-07-24</div>
  </div>
</section>

<section class="legal-section">
  <div class="svc-container">

    <p>These Terms of Service ("Terms") govern your use of the Serendipity Technology website and our SMS/text messaging program. Serendipity Technology is operated by Serendipity Holdings, LLC in Volusia County, Florida. By using our site or opting in to our text messages, you agree to these Terms. (For client engagement rates and payment terms, see our <a href="/engagement-terms.php">Engagement Terms</a>.)</p>

    <h2>Use of the website</h2>
    <p>You may use this website for lawful purposes only. You agree not to misuse the site, interfere with its operation, or attempt to access it in an unauthorized way.</p>

    <h2>SMS / text messaging program</h2>
    <p>By providing your mobile number and selecting text as a preferred contact method, or by texting one of our keywords, you agree to receive SMS messages from Serendipity Technology related to your inquiry and your account (for example, replies to your message, appointment reminders, and project or account updates).</p>
    <ul>
      <li><strong>Program:</strong> Serendipity Technology customer-service and account notifications.</li>
      <li><strong>Message frequency</strong> varies based on your interactions with us.</li>
      <li><strong>Message and data rates may apply</strong>, per your mobile carrier plan.</li>
      <li><strong>To opt out</strong>, reply STOP at any time. You will receive one confirmation message and no further texts.</li>
      <li><strong>For help</strong>, reply HELP, email <a href="mailto:troy@serendipitytech.net">troy@serendipitytech.net</a>, or visit <a href="https://serendipitytechnology.com">serendipitytechnology.com</a>.</li>
      <li>Carriers are not liable for delayed or undelivered messages.</li>
    </ul>
    <div class="legal-callout">
      Your consent to receive text messages is not a condition of any purchase. We do not share your mobile number or SMS opt-in information with third parties for their marketing. See our <a href="/privacy-policy.php">Privacy Policy</a>.
    </div>

    <h2>Intellectual property</h2>
    <p>The content on this site is owned by or licensed to Serendipity Technology and may not be copied or reused without permission, except as allowed by law.</p>

    <h2>Disclaimers and limitation of liability</h2>
    <p>The site and its content are provided "as is" without warranties of any kind. To the fullest extent permitted by law, Serendipity Technology is not liable for indirect or consequential damages arising from your use of the site or the messaging program.</p>

    <h2>Governing law</h2>
    <p>These Terms are governed by the laws of the State of Florida, without regard to its conflict-of-law rules.</p>

    <h2>Changes to these Terms</h2>
    <p>We may update these Terms from time to time. The effective date above reflects the latest version.</p>

    <h2>Contact us</h2>
    <p>Questions about these Terms: email <a href="mailto:troy@serendipitytech.net">troy@serendipitytech.net</a> or visit <a href="https://serendipitytechnology.com">serendipitytechnology.com</a>.</p>

  </div>
</section>

<?php include __DIR__ . '/partials/site-footer.php'; ?>
</body>
</html>
