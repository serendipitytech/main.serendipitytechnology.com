<?php
/**
 * Service features — what's included grid
 *
 * Variables expected:
 *   $features_title    — section heading
 *   $features_subtitle — supporting copy
 *   $features_items    — array of feature definitions:
 *     [
 *       'icon'  => '<svg>...</svg>',  // 20x20 svg recommended
 *       'title' => 'Custom Domain',
 *       'desc'  => 'Your name, your domain. We handle DNS and SSL.',
 *     ]
 */
$features_subtitle = $features_subtitle ?? '';
?>
<section class="svc-section svc-section-alt" id="features">
  <div class="svc-container">
    <div class="svc-text-center">
      <h2 class="svc-h2 svc-h2-center"><?= htmlspecialchars($features_title ?? "What's Included") ?></h2>
      <?php if (!empty($features_subtitle)): ?>
        <p class="svc-lede svc-text-center" style="margin-left:auto;margin-right:auto;"><?= htmlspecialchars($features_subtitle) ?></p>
      <?php endif; ?>
    </div>

    <div class="svc-features-grid">
      <?php foreach ($features_items as $f): ?>
        <div class="svc-feature">
          <div class="svc-feature-icon"><?= $f['icon'] ?? '' ?></div>
          <h3 class="svc-feature-title"><?= htmlspecialchars($f['title']) ?></h3>
          <p class="svc-feature-desc"><?= htmlspecialchars($f['desc']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
