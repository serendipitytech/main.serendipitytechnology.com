<?php
/**
 * Service grid — index card grid for the /services/ catalog page
 *
 * Variables expected:
 *   $services_grid_items — array of:
 *     [
 *       'icon'    => '<svg>...</svg>',  // 28x28 recommended
 *       'name'    => 'Business Sites',
 *       'tagline' => 'One-line value prop',
 *       'price'   => 'From $10/mo + $49 setup',
 *       'href'    => '/services/business-sites',
 *     ]
 */
?>
<style>
.svc-service-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 20px;
  margin-top: 32px;
}

.svc-service-card {
  display: flex;
  flex-direction: column;
  background: var(--svc-bg);
  border: 1px solid var(--svc-border);
  border-radius: var(--svc-radius-lg);
  padding: 28px 24px;
  text-decoration: none;
  color: var(--svc-text);
  transition: border-color 0.15s ease, box-shadow 0.15s ease, transform 0.15s ease;
  position: relative;
  overflow: hidden;
  cursor: pointer;
}

.svc-service-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 3px;
  background: var(--svc-gradient);
  opacity: 0;
  transition: opacity 0.15s ease;
}

.svc-service-card:hover {
  border-color: var(--svc-border-hover);
  box-shadow: var(--svc-shadow-lg);
  transform: translateY(-3px);
  color: var(--svc-text);
}

.svc-service-card:hover::before {
  opacity: 1;
}

.svc-service-card-icon {
  width: 48px;
  height: 48px;
  border-radius: var(--svc-radius);
  background: var(--svc-gradient-soft);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--svc-primary);
  margin-bottom: 16px;
}

.svc-service-card-name {
  font-family: "Gill Sans", "Gill Sans MT", 'Roboto', sans-serif;
  font-size: 18px;
  font-weight: 700;
  color: var(--svc-text);
  margin: 0 0 6px 0;
}

.svc-service-card-tagline {
  font-size: 14px;
  color: var(--svc-text-muted);
  margin: 0 0 16px 0;
  line-height: 1.5;
  flex: 1;
}

.svc-service-card-price {
  font-size: 13px;
  font-weight: 600;
  color: var(--svc-primary);
  margin: 0 0 16px 0;
}

.svc-service-card-link {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 13px;
  font-weight: 600;
  color: var(--svc-accent);
  text-decoration: none;
}

@media (max-width: 600px) {
  .svc-service-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<div class="svc-service-grid">
  <?php foreach ($services_grid_items as $item): ?>
    <a href="<?= htmlspecialchars($item['href']) ?>" class="svc-service-card">
      <div class="svc-service-card-icon"><?= $item['icon'] ?></div>
      <h3 class="svc-service-card-name"><?= htmlspecialchars($item['name']) ?></h3>
      <p class="svc-service-card-tagline"><?= htmlspecialchars($item['tagline']) ?></p>
      <p class="svc-service-card-price"><?= htmlspecialchars($item['price']) ?></p>
      <span class="svc-service-card-link">
        Learn More
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
        </svg>
      </span>
    </a>
  <?php endforeach; ?>
</div>
