<?php
/**
 * Service FAQ — accordion of common questions
 *
 * Variables expected:
 *   $faq_title — section heading (default: "Frequently Asked Questions")
 *   $faq_items — array of [ 'q' => '...', 'a' => '...' ]
 */
$faq_title = $faq_title ?? 'Frequently Asked Questions';
?>
<section class="svc-section" id="faq">
  <div class="svc-container">
    <div class="svc-text-center">
      <h2 class="svc-h2"><?= htmlspecialchars($faq_title) ?></h2>
    </div>

    <div class="svc-faq-list">
      <?php foreach ($faq_items as $item): ?>
        <details class="svc-faq-item">
          <summary class="svc-faq-question">
            <span><?= htmlspecialchars($item['q']) ?></span>
            <svg class="svc-faq-toggle" width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
              <line x1="3" y1="8" x2="13" y2="8"/>
              <line x1="8" y1="3" x2="8" y2="13"/>
            </svg>
          </summary>
          <p class="svc-faq-answer"><?= $item['a'] /* allow inline html */ ?></p>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>
