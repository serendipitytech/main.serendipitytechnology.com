<?php
/**
 * /services/upfront - Upfront product landing page (public name of the Serendipity CRM)
 * Quotes, estimates, invoices and payments for solo and small service businesses.
 *
 * Copy source: Marketing/upfront-landing-page-copy-draft.md (v2, 2026-10-11).
 *
 * PENDING INPUTS (search this file for "PENDING"):
 * Wordmark: typographic (square mark + "Upfront" in display font), approved by Troy 2026-10-12. No logo file.
 * HARD RULE: every product image is a REAL capture from the demo tenant. No AI-generated or mocked screens.
 */

require_once __DIR__ . '/../partials/upfront-helpers.php';

// Branded embed of the dedicated 15-minute Cal event (Upfront Demo only; /book exposes the longer call types).
$book_url = '/book/upfront-demo';
// Live demo workspace: registration page (not /sign-in).
$demo_url = 'https://upfront-demo.serendipitytechnology.com';

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
  <meta property="og:image" content="https://serendipitytechnology.com<?= up_img('upfront-og-1200x630.jpg') ?>">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:image" content="https://serendipitytechnology.com<?= up_img('upfront-og-1200x630.jpg') ?>">

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
    /* Wordmark: rendered image (see partials/upfront-helpers.php). */
    .up-wordmark { display: inline-flex; align-items: center; line-height: 0; text-decoration: none; }
    .up-wordmark-img { display: block; height: auto; }
    .up-hero .up-wordmark { margin-bottom: 20px; }
    .up-bar { background: #fff; border-bottom: 1px solid var(--svc-border); }
    .up-bar-in { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding-top: 12px; padding-bottom: 12px; }
    .up-bar .svc-btn { padding: 9px 14px; font-size: 14px; }
    .up-foot { border-top: 1px solid var(--svc-border); padding: 28px 0 0; margin-top: 16px; }
    .up-foot-in { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 8px 24px; font-size: 14px; color: #475569; }
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
    .up-shot-hero { max-width: 340px; margin: 0 auto; aspect-ratio: 9 / 17; object-fit: cover; object-position: top; border-radius: 28px; }
    .up-thumb { margin-top: 16px; aspect-ratio: 4 / 5; object-fit: cover; object-position: top; box-shadow: var(--svc-shadow); }
    .up-step .up-thumb { margin-top: auto; }
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
    .up-step h3 + p { margin-bottom: 16px; }

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
    .up-who { display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 40px; align-items: center; }
    .up-who p { font-size: 18px; color: #475569; margin: 0 0 14px; }
    .up-who-photo { width: 100%; height: auto; border-radius: var(--svc-radius-lg); box-shadow: var(--svc-shadow-lg); }

    /* ---- Draft banner (preview host only) ---- */
    .up-draft { position: sticky; bottom: 0; z-index: 50; background: #fff7ed; border-top: 1px solid #F7B06A; color: #7c4a10; font-size: 13px; font-weight: 500; text-align: center; padding: 8px 16px; }

    @media (max-width: 900px) {
      .up-hero-grid, .up-split, .up-pricing, .up-who { grid-template-columns: 1fr; }
      .up-steps { grid-template-columns: 1fr 1fr; }
      .up-hero .svc-h1 { font-size: 38px; }
      .up-hero { padding: 48px 0; }
      .up-capture-phone { max-width: 240px; }
    }
    @media (max-width: 640px) {
      /* Steps go single column so thumbnails render ~full width (legible), not ~200px. */
      .up-steps { grid-template-columns: 1fr; }
      .up-step .up-thumb { aspect-ratio: auto; max-height: 460px; }
      .up-shot-hero { max-width: 300px; }
      .up-hero .svc-h1 { font-size: 34px; }
      /* Hero CTAs stack full width so labels never wrap awkwardly on small phones. */
      .up-hero-cta { flex-direction: column; align-items: stretch; gap: 12px; }
      .up-hero-cta .svc-btn { width: 100%; justify-content: center; text-align: center; }
      .up-price-note { text-align: center; }
    }
    @media (max-width: 520px) {
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

<div class="up-bar">
  <div class="svc-container up-bar-in">
    <a class="up-wordmark" href="#top" aria-label="Upfront, back to top"><?= up_wordmark(110) ?></a>
    <a href="<?= htmlspecialchars($book_url) ?>" class="svc-btn svc-btn-primary">Book a demo</a>
  </div>
</div>

<main id="top">

  <!-- ============ HERO ============ -->
  <section class="up-hero">
    <div class="svc-container up-hero-grid">
      <div>
        <div class="up-wordmark"><?= up_wordmark(150) ?></div>
        <p class="svc-eyebrow">For solo and small service businesses</p>
        <h1 class="svc-h1">Quotes made to measure.</h1>
        <p class="svc-lede">Send a custom estimate, get it approved, get paid. All on one page with your brand on it.</p>
        <p class="up-sub">Upfront is built by a solo business owner, for solo business owners who are done paying for software made for fifty people.</p>
        <div class="up-hero-cta">
          <a href="<?= htmlspecialchars($book_url) ?>" class="svc-btn svc-btn-primary svc-btn-lg">Book a 15-minute demo</a>
          <a href="<?= htmlspecialchars($demo_url) ?>" class="svc-btn svc-btn-secondary svc-btn-lg" rel="noopener">Try the live demo</a>
          <span class="up-price-note">Starting at <strong>$20/month</strong></span>
        </div>
      </div>
      <img class="up-shot up-shot-hero" src="<?= up_img('hero-customer-estimate.jpg') ?>" width="780" height="1840" alt="A customer-facing estimate on a phone, with the shop's logo, itemized shutters and shades, totals and the deposit to start">
    </div>
  </section>

  <!-- ============ PROBLEM ============ -->
  <section class="svc-section svc-section-alt" style="padding-top:64px;">
    <div class="svc-container up-split">
      <div>
        <p class="svc-eyebrow">The problem</p>
        <h2 class="svc-h2">Too many tools for one quote.</h2>
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
          <img class="up-shot up-thumb" src="<?= up_img('step1-thumb.jpg') ?>" width="784" height="1060" loading="lazy" alt="An estimate line item in the Upfront builder with product-specific fields and a line total">
        </div>
        <div class="up-step">
          <span class="up-step-num" aria-hidden="true">2</span>
          <h3>Send one link</h3>
          <p>Your customer sees a clean page with your logo and colors, not ours.</p>
          <img class="up-shot up-thumb" src="<?= up_img('step2-thumb.jpg') ?>" width="784" height="889" loading="lazy" alt="The customer link box on an estimate, with a Copy link button to send it to the customer">
        </div>
        <div class="up-step">
          <span class="up-step-num" aria-hidden="true">3</span>
          <h3>They approve</h3>
          <p>Every approval is timestamped, so there's never a question about what was agreed.</p>
          <img class="up-shot up-thumb" src="<?= up_img('step3-approval.jpg') ?>" width="780" height="1426" loading="lazy" alt="The customer approval form with name, email, and an approve button, noting the name, time and IP address are recorded">
        </div>
        <div class="up-step up-step-pay">
          <span class="up-step-num" aria-hidden="true">4</span>
          <h3>You get paid</h3>
          <p>Deposits and invoices are paid online, straight into your own Stripe account.</p>
          <img class="up-shot up-thumb" src="<?= up_img('step4-payment.jpg') ?>" width="780" height="1410" loading="lazy" alt="A customer estimate page marked Approved with the deposit received, showing itemized products, totals and the paid deposit">
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
      <img class="up-shot" src="<?= up_img('custom-setup-products.jpg') ?>" width="1000" height="698" loading="lazy" alt="Settings, Products: product types and the fields each one asks for, configurable per business">
    </div>
  </section>

  <!-- ============ PROOF ============ -->
  <section class="svc-section" style="padding-top:64px;">
    <div class="svc-container up-proof">
      <p class="svc-eyebrow">Proof</p>
      <blockquote>A custom shutter shop was paying $110 a month for QuickBooks and Clover. They are replacing both with Upfront, a platform that starts at $20, so their customers see the shop's brand front and center on every quote.</blockquote>
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
      <div class="up-who-copy">
        <p class="svc-eyebrow">Who's behind it</p>
        <h2 class="svc-h2">A real person runs your account.</h2>
        <!-- DRAFT bio (Marketing/upfront-bio-draft.md), pending Marketing's final review. -->
        <p>Hi, I'm Troy. I built Upfront after watching too many small shops pay for bloated software that does a hundred things they will never use. I run it myself, so when you reach out, you get the person who knows your account, not a ticket queue.</p>
        <p>Serendipity Technology is a small shop building practical tools for other small operators. Upfront is the one I use for my own clients, so it has to actually work.</p>
      </div>
      <img class="up-who-photo" src="<?= up_img('troy-presenting.jpg') ?>" width="1000" height="667" loading="lazy" alt="Troy Shimkus, founder of Serendipity Technology, gesturing toward the text beside him">
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
    'a' => 'Your brand leads every page: your logo, your colors, your terms. A small "Upfront, powered by Serendipity Technology" line sits in the footer, and that\'s it.',
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
$cta_secondary_text = 'Try the live demo';
$cta_secondary_href = $demo_url;
include __DIR__ . '/partials/service-cta.php';
?>

</main>

<div class="svc-container up-foot">
  <div class="up-foot-in">
    <span class="up-wordmark"><?= up_wordmark(100) ?></span>
    <span>Upfront, powered by Serendipity Technology. Quotes made to measure.</span>
  </div>
</div>

<?php include __DIR__ . '/../partials/site-footer.php'; ?>
<?php include __DIR__ . '/../partials/site-contact-modal.php'; ?>

<?php if ($is_preview): ?>
<div class="up-draft" role="note">Draft preview. Not for publishing.</div>
<?php endif; ?>

</body>
</html>
