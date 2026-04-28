<?php
/**
 * Service hero — reusable hero section with background + frosted card overlay
 *
 * Variables expected (set before include):
 *   $hero_bg_image — optional background image URL (uses gradient fallback if omitted)
 *   $hero_eyebrow  — small uppercase label above headline
 *   $hero_title    — main headline
 *   $hero_lede     — supporting paragraph
 *   $hero_cta_text — primary button text (default: "Get Started")
 *   $hero_cta_href — primary button href (default: "#pricing")
 *   $hero_secondary_text — optional secondary button text
 *   $hero_secondary_href — optional secondary button href
 */
$hero_cta_text = $hero_cta_text ?? 'Get Started';
$hero_cta_href = $hero_cta_href ?? '#pricing';
$hero_style = '';
if (!empty($hero_bg_image)) {
    $hero_style = 'style="--svc-hero-bg: linear-gradient(135deg, rgba(79,196,240,0.85) 0%, rgba(247,176,106,0.85) 100%), url(\'' . htmlspecialchars($hero_bg_image, ENT_QUOTES) . '\') no-repeat center center/cover;"';
}
?>
<section class="svc-hero" <?= $hero_style ?>>
  <div class="svc-container">
    <div class="svc-hero-card">
      <?php if (!empty($hero_eyebrow)): ?>
        <p class="svc-eyebrow"><?= htmlspecialchars($hero_eyebrow) ?></p>
      <?php endif; ?>
      <h1 class="svc-h1"><?= htmlspecialchars($hero_title) ?></h1>
      <?php if (!empty($hero_lede)): ?>
        <p class="svc-lede"><?= htmlspecialchars($hero_lede) ?></p>
      <?php endif; ?>
      <div class="svc-hero-actions">
        <a href="<?= htmlspecialchars($hero_cta_href) ?>" class="svc-btn svc-btn-primary svc-btn-lg">
          <?= htmlspecialchars($hero_cta_text) ?>
        </a>
        <?php if (!empty($hero_secondary_text)): ?>
          <a href="<?= htmlspecialchars($hero_secondary_href ?? '#features') ?>" class="svc-btn svc-btn-secondary svc-btn-lg">
            <?= htmlspecialchars($hero_secondary_text) ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
