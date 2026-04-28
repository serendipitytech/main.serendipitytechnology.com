<?php
/**
 * Service CTA — closing call-to-action block
 *
 * Variables expected:
 *   $cta_title    — headline
 *   $cta_subtitle — supporting copy
 *   $cta_text     — button text
 *   $cta_href     — button href
 *   $cta_secondary_text — optional secondary action
 *   $cta_secondary_href — optional secondary href
 */
?>
<section class="svc-section">
  <div class="svc-container">
    <div class="svc-cta">
      <h2 class="svc-h2 svc-h2-center"><?= htmlspecialchars($cta_title ?? 'Ready to get started?') ?></h2>
      <?php if (!empty($cta_subtitle)): ?>
        <p><?= htmlspecialchars($cta_subtitle) ?></p>
      <?php endif; ?>
      <div class="svc-hero-actions">
        <a href="<?= htmlspecialchars($cta_href ?? '#pricing') ?>" class="svc-btn svc-btn-<?= $cta_style ?? 'accent' ?> svc-btn-lg">
          <?= htmlspecialchars($cta_text ?? 'Get Started') ?>
        </a>
        <?php if (!empty($cta_secondary_text)): ?>
          <a href="<?= htmlspecialchars($cta_secondary_href) ?>" class="svc-btn svc-btn-secondary svc-btn-lg">
            <?= htmlspecialchars($cta_secondary_text) ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
