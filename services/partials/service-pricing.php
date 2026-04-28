<?php
/**
 * Service pricing — reusable pricing cards
 *
 * Variables expected:
 *   $pricing_title    — section heading (e.g. "Pricing")
 *   $pricing_subtitle — supporting copy
 *   $pricing_tiers    — array of pricing tier definitions:
 *     [
 *       'name'      => 'Standard',
 *       'tagline'   => 'For local races',
 *       'price'     => 20,            // monthly in dollars (omit for "custom")
 *       'period'    => '/month',      // default '/month', use '' for one-time
 *       'setup'     => '$49 one-time setup',
 *       'features'  => ['Unlimited updates', 'Email mailbox', ...],
 *       'disabled'  => [],            // optional features shown but disabled
 *       'cta_text'  => 'Get Started',
 *       'cta_href'  => '/services/candidates/signup',
 *       'featured'  => false,
 *       'badge'     => 'Most Popular' // optional, only for featured
 *     ]
 *   $pricing_footnote — optional fine print below cards
 */
$pricing_subtitle = $pricing_subtitle ?? '';
$pricing_footnote = $pricing_footnote ?? '';
?>
<section class="svc-section" id="pricing">
  <div class="svc-container">
    <div class="svc-text-center">
      <h2 class="svc-h2 svc-h2-center"><?= htmlspecialchars($pricing_title ?? 'Pricing') ?></h2>
      <?php if (!empty($pricing_subtitle)): ?>
        <p class="svc-lede svc-text-center" style="margin-left:auto;margin-right:auto;"><?= htmlspecialchars($pricing_subtitle) ?></p>
      <?php endif; ?>
    </div>

    <div class="svc-pricing-grid">
      <?php foreach ($pricing_tiers as $tier): ?>
        <div class="svc-pricing-card<?= !empty($tier['featured']) ? ' featured' : '' ?>">
          <?php if (!empty($tier['featured']) && !empty($tier['badge'])): ?>
            <span class="svc-pricing-badge"><?= htmlspecialchars($tier['badge']) ?></span>
          <?php endif; ?>

          <h3 class="svc-pricing-name"><?= htmlspecialchars($tier['name']) ?></h3>
          <?php if (!empty($tier['tagline'])): ?>
            <p class="svc-pricing-tagline"><?= htmlspecialchars($tier['tagline']) ?></p>
          <?php endif; ?>

          <div class="svc-pricing-amount">
            <?php if (isset($tier['price'])): ?>
              <span class="svc-pricing-currency">$</span>
              <span class="svc-pricing-number"><?= htmlspecialchars((string)$tier['price']) ?></span>
              <span class="svc-pricing-period"><?= htmlspecialchars($tier['period'] ?? '/month') ?></span>
            <?php else: ?>
              <span class="svc-pricing-number"><?= htmlspecialchars($tier['price_label'] ?? 'Custom') ?></span>
            <?php endif; ?>
          </div>

          <?php if (!empty($tier['setup'])): ?>
            <p class="svc-pricing-setup"><?= htmlspecialchars($tier['setup']) ?></p>
          <?php endif; ?>

          <ul class="svc-pricing-features">
            <?php foreach ($tier['features'] as $feature): ?>
              <li>
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="3 8.5 6.5 12 13 4"/>
                </svg>
                <span><?= $feature /* allow inline html for emphasis */ ?></span>
              </li>
            <?php endforeach; ?>
            <?php foreach (($tier['disabled'] ?? []) as $feature): ?>
              <li class="disabled">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="4" y1="4" x2="12" y2="12"/>
                  <line x1="12" y1="4" x2="4" y2="12"/>
                </svg>
                <span><?= $feature ?></span>
              </li>
            <?php endforeach; ?>
          </ul>

          <a href="<?= htmlspecialchars($tier['cta_href']) ?>" class="svc-btn svc-btn-block <?= !empty($tier['featured']) ? 'svc-btn-primary' : 'svc-btn-secondary' ?>">
            <?= htmlspecialchars($tier['cta_text'] ?? 'Get Started') ?>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <?php if (!empty($pricing_footnote)): ?>
      <p class="svc-fineprint svc-text-center svc-mt-32"><?= $pricing_footnote ?></p>
    <?php endif; ?>
  </div>
</section>
