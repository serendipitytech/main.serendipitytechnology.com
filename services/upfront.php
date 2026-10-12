<?php
/**
 * /services/upfront - Upfront product landing page (public name of the Serendipity CRM)
 * Quotes, estimates, invoices and payments for solo and small service businesses.
 *
 * Copy source: Marketing/upfront-landing-page-copy-draft.md (v2, 2026-10-11).
 *
 * PENDING INPUTS (search this file for "PENDING"):
 *   - Real UI captures from the CRM demo tenant (5 slots: hero, builder, customer page, approval, payment, setup)
 *   - Upfront wordmark (text placeholder in the hero)
 *   - Demo booking link (currently the site's own /book page, a branded embed of book.serendipitytechnology.com)
 * HARD RULE: every product image is a REAL capture from the demo tenant. No AI-generated or mocked screens.
 */

// PENDING: confirm demo booking target (and ideally a dedicated 15-minute event type).
$book_url = '/book';

// Show the draft banner on the preview host only, never on production.
$is_preview = isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'preview.') === 0;

$check = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upfront: Quotes Made to Measure | Serendipity Technology</title>
  <meta name="description" content="Upfront is quoting, approvals, invoices and online payments for solo and small service businesses. Your brand on every page, money straight to your own Stripe account. Starting at $20/month.">
  <link rel="icon" href="/img/logos/serendipity_icon_150.png">
  <link rel="canonical" href="https://serendipitytechnology.com/services/upfront">
<?php if ($is_preview): ?>
  <meta name="robots" content="noindex, nofollow">
<?php endif; ?>

  <meta property="og:title" content="Upfront: Quotes made to measure">
  <meta property="og:description" content="Send a custom estimate, get it approved, get paid. All on one page with your brand on it. Starting at $20/month.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://serendipitytechnology.com/services/upfront">
  <meta property="og:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "Quoting, invoicing and online payments software for small service businesses",
    "name": "Upfront",
    "description": "Custom estimates, branded customer pages, timestamped approvals, online payments and invoices for solo and small service businesses.",
    "provider": { "@type": "Organization", "name": "Serendipity Technology", "url": "https://serendipitytechnology.com" },
    "offers": {
      "@type": "Offer",
      "price": "20",
      "priceCurrency": "USD",
      "description": "Starting at $20 per month. Optional $150 one-time custom setup.",
      "url": "https://serendipitytechnology.com/services/upfront"
    }
  }
  </script>

  <?php include __DIR__ . '/partials/service-styles.php'; ?>
  <style>
    /* Page-specific styles. Shared tokens (--svc-*) come from service-styles.php. */
    html { scroll-behavior: smooth; }
    @media (prefers-reduced-motion: reduce) { html { scroll-behavior: auto; } }

    /* Contrast fixes vs. the shared service styles: orange text and white-on-orange fail AA.
       Eyebrows use the accessible blue; orange stays decorative only. */
    .up-page .svc-eyebrow { color: #176E96; }
    .up-page a:focus-visible,
    .up-page .svc-btn:focus-visible,
    .up-page summary:focus-visible { outline: 3px solid #4FC4F0; outline-offset: 3px; border-radius: 4px; }

    /* ---- Hero ---- */
    .up-hero {
      background: var(--svc-gradient-soft), var(--svc-bg-alt);
      border-bottom: 1px solid var(--svc-border);
      padding: 72px 0 64px;
      position: relative;
    }
    .up-hero::after { content: ""; position: absolute; left: 0; right: 0; bottom: 0; height: 4px; background: var(--svc-gradient); }
    .up-hero-grid { display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 48px; align-items: center; }
    .up-wordmark {
      /* PENDING: replace with the real Upfront wordmark (SVG) when supplied. */
      display: inline-flex; align-items: center; gap: 10px;
      font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
      font-size: 24px; font-weight: 700; color: var(--svc-text); letter-spacing: -0.01em; margin-bottom: 20px;
    }
    .up-wordmark small {
      font-family: 'Roboto', sans-serif; font-size: 10px; font-weight: 500; letter-spacing: 0.08em; text-transform: uppercase;
      color: #475569; border: 1px dashed #9ca3af; border-radius: 4px; padding: 2px 6px;
    }
    .up-hero .svc-h1 { font-size: 52px; }
    .up-hero .svc-lede { font-size: 20px; color: #475569; margin-bottom: 16px; }
    .up-hero .up-sub { color: #475569; max-width: 520px; margin: 0 0 28px; }
    .up-hero-cta { display: flex; flex-wrap: wrap; align-items: center; gap: 12px 20px; }
    .up-price-note { font-size: 14px; color: #475569; }
    .up-price-note strong { color: var(--svc-text); }

    /* ---- Capture placeholders: REAL demo-tenant captures replace these ---- */
    .up-capture {
      border: 2px dashed #9ca3af;
      border-radius: var(--svc-radius-lg);
      background:
        repeating-linear-gradient(135deg, transparent 0 14px, rgba(26,127,170,0.06) 14px 15px),
        #ffffff;
      display: flex; flex-direction: column; align-items: center; justify-content: center;
      text-align: center; gap: 6px; padding: 20px; color: #475569; font-size: 13px; line-height: 1.4;
    }
    .up-capture .up-capture-tag { font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #176E96; }
    .up-capture svg { color: #1A7FAA; }
    .up-capture-phone { width: 100%; max-width: 280px; aspect-ratio: 9 / 18; margin: 0 auto; border-radius: 32px; box-shadow: var(--svc-shadow-lg); }
    .up-capture-wide { width: 100%; aspect-ratio: 16 / 10; box-shadow: var(--svc-shadow); }
    .up-capture-thumb { width: 100%; aspect-ratio: 4 / 3; margin-top: 16px; padding: 12px; }
    /* When a real image replaces a placeholder */
    .up-shot { display: block; width: 100%; height: auto; border-radius: var(--svc-radius-lg); border: 1px solid var(--svc-border); box-shadow: var(--svc-shadow-lg); }

    /* ---- Problem ---- */
    .up-split { display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 40px; align-items: center; }
    .up-split p { font-size: 18px; color: #475569; margin: 0 0 12px; max-width: 520px; }
    .up-callout { background: #fff; border: 1px solid var(--svc-border); border-top: 4px solid #4FC4F0; border-radius: var(--svc-radius-lg); padding: 28px; box-shadow: var(--svc-shadow); }
    .up-callout-big { font-family: "Gill Sans", "Gill Sans MT", 'Roboto', sans-serif; font-size: 26px; font-weight: 700; line-height: 1.2; color: var(--svc-text); margin: 0 0 10px; }
    .up-callout p { margin: 0; font-size: 17px; }

    /* ---- Steps ---- */
    .up-steps { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-top: 32px; }
    .up-step { background: #fff; border: 1px solid var(--svc-border); border-radius: var(--svc-radius-lg); padding: 24px; display: flex; flex-direction: column; }
    .up-step-num {
      width: 32px; height: 32px; border-radius: var(--svc-radius-sm); background: #1A7FAA; color: #fff;
      display: inline-flex; align-items: center; justify-content: center; font-weight: 700; margin-bottom: 14px;
    }
    .up-step-pay .up-step-num { background: #F7B06A; color: #1F2937; }
    .up-step h3 { font-family: "Gill Sans", "Gill Sans MT", 'Roboto', sans-serif; font-size: 20px; margin: 0 0 8px; color: var(--svc-text); }
    .up-step p { font-size: 15px; color: #475569; margin: 0; }
    .up-step .up-capture { margin-top: auto; }

    /* ---- Custom setup ---- */
    .up-badge {
      display: inline-flex; align-items: baseline; gap: 10px; margin-top: 12px;
      background: #fff; border: 1px solid var(--svc-border); border-left: 4px solid #F7B06A;
      border-radius: var(--svc-radius); padding: 12px 18px;
    }
    .up-badge strong { font-size: 24px; color: var(--svc-text); }
    .up-badge span { font-size: 14px; color: #475569; font-weight: 500; }

    /* ---- Proof ---- */
    .up-proof { max-width: 760px; margin: 0 auto; text-align: center; }
    .up-proof blockquote {
      font-family: "Gill Sans", "Gill Sans MT", 'Roboto', sans-serif; font-size: 26px; font-weight: 700; line-height: 1.35;
      color: var(--svc-text); margin: 0;
    }

    /* ---- Pricing ---- */
    .up-pricing { display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 24px; align-items: start; margin-top: 32px; }
    .up-pricing .svc-pricing-card { transform: none; }
    .up-pricing .svc-pricing-card:hover { transform: none; }
    .up-addons { display: flex; flex-direction: column; gap: 12px; }
    .up-addon { background: #fff; border: 1px solid var(--svc-border); border-radius: var(--svc-radius); padding: 16px 18px; display: flex; justify-content: space-between; align-items: center; gap: 16px; }
    .up-addon-name { font-weight: 600; color: var(--svc-text); }
    .up-addon-note { font-size: 13px; color: #475569; }
    .up-addon-price { font-weight: 700; color: #1A7FAA; white-space: nowrap; text-align: right; }
    .up-addon-price.soon { color: #475569; font-weight: 500; }
    .up-addon-setup { border-left: 4px solid #F7B06A; }
    .up-pricing-note { font-size: 14px; color: #475569; margin: 16px 0 0; }

    /* ---- Who ---- */
    .up-who { max-width: 640px; margin: 0 auto; text-align: center; }
    .up-who p { font-size: 18px; color: #475569; }

    /* ---- Draft banner (preview host only) ---- */
    .up-draft { position: sticky; bottom: 0; z-index: 50; background: #fff7ed; border-top: 1px solid #F7B06A; color: #7c4a10; font-size: 13px; font-weight: 500; text-align: center; padding: 8px 16px; }

    @media (max-width: 900px) {
      .up-hero-grid, .up-split, .up-pricing { grid-template-columns: 1fr; }
      .up-steps { grid-template-columns: 1fr 1fr; }
      .up-hero .svc-h1 { font-size: 38px; }
      .up-hero { padding: 48px 0; }
      .up-capture-phone { max-width: 240px; }
    }
    @media (max-width: 520px) {
      .up-steps { grid-template-columns: 1fr; }
      .up-proof blockquote { font-size: 21px; }
      .up-addon { flex-direction: column; align-items: flex-start; gap: 4px; }
      .up-addon-price { text-align: left; }
    }
  </style>
</head>
<body class="svc-page up-page has-fixed-header">

<?php
$header_always_visible = true;
include __DIR__ . '/../partials/site-header.php';
?>

<main id="top">

  <!-- ============ HERO ============ -->
  <section class="up-hero">
    <div class="svc-container up-hero-grid">
      <div>
        <!-- PENDING: Upfront wordmark. Text placeholder until the asset is supplied. -->
        <div class="up-wordmark">Upfront <small>wordmark TBD</small></div>
        <p class="svc-eyebrow">For solo and small service businesses</p>
        <h1 class="svc-h1">Quotes made to measure.</h1>
        <p class="svc-lede">Send a custom estimate, get it approved, get paid. All on one page with your brand on it.</p>
        <p class="up-sub">Upfront is built by a solo business owner, for solo business owners who are done paying for software made for fifty people.</p>
        <div class="up-hero-cta">
          <a href="<?= htmlspecialchars($book_url) ?>" class="svc-btn svc-btn-primary svc-btn-lg">Book a 15-minute demo</a>
          <span class="up-price-note">Starting at <strong>$20/month</strong></span>
        </div>
      </div>
      <!-- PENDING CAPTURE hero-phone-estimate: real screen capture of a branded estimate on a phone (demo tenant) -->
      <div class="up-capture up-capture-phone" role="img" aria-label="Placeholder: real screen capture of a branded estimate on a phone, coming from the demo tenant">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h5"/></svg>
        <span class="up-capture-tag">Real capture pending</span>
        <span>A branded estimate on a phone, from the demo tenant</span>
      </div>
    </div>
  </section>

  <!-- ============ PROBLEM ============ -->
  <section class="svc-section svc-section-alt" style="padding-top:64px;">
    <div class="svc-container up-split">
      <div>
        <p class="svc-eyebrow">The problem</p>
        <h2 class="svc-h2">You need about four things, done right.</h2>
        <p>You quote in one app, take payments in another, and chase approvals by text. Or you're paying for QuickBooks just to send an estimate.</p>
      </div>
      <div class="up-callout">
        <p class="up-callout-big">Big platforms do a hundred things.</p>
        <p>You need about four of them, done right.</p>
      </div>
    </div>
  </section>

  <!-- ============ HOW IT WORKS ============ -->
  <section class="svc-section" id="how-it-works" style="padding-top:64px;">
    <div class="svc-container">
      <div class="svc-text-center">
        <p class="svc-eyebrow">How it works</p>
        <h2 class="svc-h2 svc-h2-center">From quote to paid, on one link.</h2>
      </div>
      <div class="up-steps">
        <div class="up-step">
          <span class="up-step-num" aria-hidden="true">1</span>
          <h3>Build the quote</h3>
          <p>Your products, your options, your pricing. Optional line items let customers pick what they want.</p>
          <!-- PENDING CAPTURE step-1-builder: quote builder (demo tenant) -->
          <div class="up-capture up-capture-thumb" role="img" aria-label="Placeholder: real capture of the quote builder">
            <span class="up-capture-tag">Real capture pending</span><span>Quote builder</span>
          </div>
        </div>
        <div class="up-step">
          <span class="up-step-num" aria-hidden="true">2</span>
          <h3>Send one link</h3>
          <p>Your customer sees a clean page with your logo and colors, not ours.</p>
          <!-- PENDING CAPTURE step-2-customer-page: branded customer page (demo tenant) -->
          <div class="up-capture up-capture-thumb" role="img" aria-label="Placeholder: real capture of the branded customer page">
            <span class="up-capture-tag">Real capture pending</span><span>Branded customer page</span>
          </div>
        </div>
        <div class="up-step">
          <span class="up-step-num" aria-hidden="true">3</span>
          <h3>They approve</h3>
          <p>Every approval is timestamped, so there's never a question about what was agreed.</p>
          <!-- PENDING CAPTURE step-3-approval: timestamped approval (demo tenant) -->
          <div class="up-capture up-capture-thumb" role="img" aria-label="Placeholder: real capture of a timestamped approval">
            <span class="up-capture-tag">Real capture pending</span><span>Timestamped approval</span>
          </div>
        </div>
        <div class="up-step up-step-pay">
          <span class="up-step-num" aria-hidden="true">4</span>
          <h3>You get paid</h3>
          <p>Deposits and invoices are paid online, straight into your own Stripe account.</p>
          <!-- PENDING CAPTURE step-4-payment: online payment / invoice (demo tenant) -->
          <div class="up-capture up-capture-thumb" role="img" aria-label="Placeholder: real capture of the online payment page">
            <span class="up-capture-tag">Real capture pending</span><span>Online payment</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ CUSTOM SETUP ============ -->
  <section class="svc-section svc-section-alt" style="padding-top:64px;">
    <div class="svc-container up-split">
      <div>
        <p class="svc-eyebrow">Built around your business</p>
        <h2 class="svc-h2">Not a template you have to fit into.</h2>
        <p>Most tools hand you a generic form and make you fit it. We do it the other way.</p>
        <p>Send us your current estimate sheets, the field names you use, and the line items you sell. We'll build your quote and invoice forms to match, so they tell your customers exactly what they're getting and why they can trust it.</p>
        <div class="up-badge"><strong>$150</strong><span>Custom setup, one time</span></div>
      </div>
      <!-- PENDING CAPTURE custom-setup-form: a customer-specific estimate/invoice form built from their sheet (demo tenant) -->
      <div class="up-capture up-capture-wide" role="img" aria-label="Placeholder: real capture of a custom quote form built from a customer's own estimate sheet">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M7 9h10M7 13h6"/></svg>
        <span class="up-capture-tag">Real capture pending</span>
        <span>A custom quote form built from a customer's own sheet</span>
      </div>
    </div>
  </section>

  <!-- ============ PROOF ============ -->
  <section class="svc-section" style="padding-top:64px;">
    <div class="svc-container up-proof">
      <p class="svc-eyebrow">Proof</p>
      <blockquote>A custom shutter shop was paying $110 a month for QuickBooks and Clover. They dropped both for one platform that starts at $20, and now their customers see the shop's brand front and center on every quote.</blockquote>
    </div>
  </section>

  <!-- ============ PRICING ============ -->
  <section class="svc-section svc-section-alt" id="pricing" style="padding-top:64px;">
    <div class="svc-container">
      <div class="svc-text-center">
        <p class="svc-eyebrow">Pricing</p>
        <h2 class="svc-h2 svc-h2-center">Simple, and it stays simple.</h2>
      </div>
      <div class="up-pricing">
        <div class="svc-pricing-card featured">
          <p class="svc-pricing-name">Upfront</p>
          <p class="svc-pricing-tagline">Starting at</p>
          <div class="svc-pricing-amount">
            <span class="svc-pricing-currency">$</span><span class="svc-pricing-number">20</span><span class="svc-pricing-period">/month</span>
          </div>
          <ul class="svc-pricing-features" style="margin-top:20px;">
            <li><?= $check ?>Custom estimates</li>
            <li><?= $check ?>Branded customer pages</li>
            <li><?= $check ?>Timestamped approvals</li>
            <li><?= $check ?>Online payments</li>
            <li><?= $check ?>Invoices</li>
          </ul>
          <a href="<?= htmlspecialchars($book_url) ?>" class="svc-btn svc-btn-primary svc-btn-block svc-btn-lg">Book a 15-minute demo</a>
          <p class="up-pricing-note">Payments are processed through your own Stripe account. Standard processing fees apply.</p>
        </div>
        <div>
          <div class="up-addons">
            <div class="up-addon">
              <div><div class="up-addon-name">Document signing</div></div>
              <div class="up-addon-price">$5/month</div>
            </div>
            <div class="up-addon">
              <div><div class="up-addon-name">Job scheduling</div></div>
              <div class="up-addon-price soon">Coming soon</div><!-- When it ships, swap to "$10/month". -->
            </div>
            <div class="up-addon">
              <div>
                <div class="up-addon-name">Need something specific?</div>
                <div class="up-addon-note">We can build that too. Ask on your demo.</div>
              </div>
            </div>
            <div class="up-addon up-addon-setup">
              <div>
                <div class="up-addon-name">Custom setup</div>
                <div class="up-addon-note">We build your forms from your existing sheets.</div>
              </div>
              <div class="up-addon-price">$150 one time</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ WHO'S BEHIND IT ============ -->
  <section class="svc-section" style="padding-top:64px;">
    <div class="svc-container up-who">
      <p class="svc-eyebrow">Who's behind it</p>
      <h2 class="svc-h2 svc-h2-center">A real person runs your account.</h2>
      <p>Upfront is built and run by Serendipity Technology. That means a real person set it up, knows your account, and answers when you call. We don't just ship software, we run it.</p>
    </div>
  </section>

<?php
/* ============ FAQ ============ */
$faq_title = 'Questions, answered';
$faq_items = [
  [
    'q' => 'Where does the money go?',
    'a' => 'Straight to you. You connect your own Stripe account, so payments land in your account, not ours.',
  ],
  [
    'q' => 'Are there processing fees?',
    'a' => 'Yes, Stripe\'s standard fees apply, the same as taking cards anywhere else.',
  ],
  [
    'q' => 'Can my customers see that it\'s Upfront?',
    'a' => 'Your customers see your brand: your logo, your colors, your terms.',
  ],
  [
    'q' => 'What if I need a feature you don\'t have?',
    'a' => 'Tell us on the demo. If it fits how you work, we can build it.',
  ],
];
include __DIR__ . '/partials/service-faq.php';
?>

<?php
/* ============ FINAL CTA ============ */
$cta_title          = 'See your own quote in 15 minutes.';
$cta_subtitle       = '';
$cta_text           = 'Book a demo';
$cta_href           = $book_url;
$cta_style          = 'primary';
include __DIR__ . '/partials/service-cta.php';
?>

</main>

<?php include __DIR__ . '/../partials/site-footer.php'; ?>
<?php include __DIR__ . '/../partials/site-contact-modal.php'; ?>

<?php if ($is_preview): ?>
<div class="up-draft" role="note">Draft preview. Gray dashed boxes are placeholders for real captures from the demo tenant. Not for publishing.</div>
<?php endif; ?>

</body>
</html>
