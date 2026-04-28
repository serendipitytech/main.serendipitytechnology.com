<?php
/**
 * Shared styles for all /services/* landing pages
 * Design language: Linear / Stripe / GitHub inspired
 *   - Functional, clean, no decorative gradients on Most Popular badges
 *   - 8-12px border radius max
 *   - 4/8/12/16/24/32 spacing scale
 *   - Body text 14-16px
 *   - WCAG AA contrast minimum
 */
?>
<style>
:root {
  --svc-bg: #ffffff;
  --svc-bg-alt: #f9fafb;
  --svc-text: #111827;
  --svc-text-muted: #6b7280;
  --svc-text-subtle: #9ca3af;
  --svc-border: #e5e7eb;
  --svc-border-hover: #d1d5db;
  --svc-primary: #4FC4F0;
  --svc-primary-hover: #2cb1e3;
  --svc-primary-text: #ffffff;
  --svc-accent: #F7B06A;
  --svc-success: #10b981;
  --svc-danger: #ef4444;
  --svc-radius-sm: 6px;
  --svc-radius: 10px;
  --svc-radius-lg: 12px;
  --svc-shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
  --svc-shadow: 0 1px 3px rgba(0,0,0,0.08);
  --svc-shadow-lg: 0 4px 12px rgba(0,0,0,0.08);
}

/* ============ LAYOUT ============ */
.svc-page {
  background: var(--svc-bg);
  color: var(--svc-text);
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5;
}

.svc-container {
  max-width: 1100px;
  margin: 0 auto;
  padding: 0 24px;
}

.svc-section {
  padding: 64px 0;
}

.svc-section + .svc-section {
  padding-top: 0;
}

.svc-section-alt {
  background: var(--svc-bg-alt);
  border-top: 1px solid var(--svc-border);
  border-bottom: 1px solid var(--svc-border);
}

@media (max-width: 768px) {
  .svc-section { padding: 48px 0; }
  .svc-container { padding: 0 16px; }
}

/* ============ TYPOGRAPHY ============ */
.svc-eyebrow {
  font-size: 13px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--svc-primary);
  margin: 0 0 12px 0;
}

.svc-h1 {
  font-size: 48px;
  font-weight: 700;
  line-height: 1.1;
  letter-spacing: -0.02em;
  margin: 0 0 16px 0;
  color: var(--svc-text);
}

.svc-h2 {
  font-size: 32px;
  font-weight: 700;
  line-height: 1.2;
  letter-spacing: -0.01em;
  margin: 0 0 12px 0;
  color: var(--svc-text);
}

.svc-h3 {
  font-size: 20px;
  font-weight: 600;
  margin: 0 0 8px 0;
  color: var(--svc-text);
}

.svc-lede {
  font-size: 18px;
  color: var(--svc-text-muted);
  margin: 0 0 32px 0;
  max-width: 640px;
}

.svc-text-muted { color: var(--svc-text-muted); }
.svc-text-subtle { color: var(--svc-text-subtle); font-size: 14px; }

@media (max-width: 768px) {
  .svc-h1 { font-size: 36px; }
  .svc-h2 { font-size: 26px; }
  .svc-lede { font-size: 16px; }
}

/* ============ HERO ============ */
.svc-hero {
  padding: 80px 0 48px;
  text-align: center;
}

.svc-hero .svc-h1 {
  max-width: 720px;
  margin-left: auto;
  margin-right: auto;
}

.svc-hero .svc-lede {
  margin-left: auto;
  margin-right: auto;
  margin-bottom: 32px;
}

.svc-hero-actions {
  display: flex;
  gap: 12px;
  justify-content: center;
  flex-wrap: wrap;
}

@media (max-width: 768px) {
  .svc-hero { padding: 48px 0 32px; }
}

/* ============ BUTTONS ============ */
.svc-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 12px 20px;
  font-size: 15px;
  font-weight: 600;
  border-radius: var(--svc-radius-sm);
  border: 1px solid transparent;
  cursor: pointer;
  text-decoration: none;
  transition: background-color 0.15s ease, border-color 0.15s ease, color 0.15s ease;
  line-height: 1;
}

.svc-btn-primary {
  background: var(--svc-primary);
  color: var(--svc-primary-text);
  border-color: var(--svc-primary);
}

.svc-btn-primary:hover {
  background: var(--svc-primary-hover);
  border-color: var(--svc-primary-hover);
  color: var(--svc-primary-text);
}

.svc-btn-secondary {
  background: var(--svc-bg);
  color: var(--svc-text);
  border-color: var(--svc-border);
}

.svc-btn-secondary:hover {
  border-color: var(--svc-border-hover);
  background: var(--svc-bg-alt);
  color: var(--svc-text);
}

.svc-btn-block {
  display: flex;
  width: 100%;
}

.svc-btn-lg {
  padding: 14px 24px;
  font-size: 16px;
}

/* ============ PRICING ============ */
.svc-pricing-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 16px;
  margin-top: 32px;
}

.svc-pricing-card {
  background: var(--svc-bg);
  border: 1px solid var(--svc-border);
  border-radius: var(--svc-radius-lg);
  padding: 24px;
  display: flex;
  flex-direction: column;
  transition: border-color 0.15s ease, box-shadow 0.15s ease;
  position: relative;
}

.svc-pricing-card:hover {
  border-color: var(--svc-border-hover);
  box-shadow: var(--svc-shadow-lg);
}

.svc-pricing-card.featured {
  border-color: var(--svc-primary);
  border-width: 2px;
  padding: 23px;
}

.svc-pricing-badge {
  display: inline-block;
  position: absolute;
  top: -10px;
  left: 24px;
  background: var(--svc-primary);
  color: var(--svc-primary-text);
  font-size: 11px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  padding: 4px 10px;
  border-radius: var(--svc-radius-sm);
}

.svc-pricing-name {
  font-size: 16px;
  font-weight: 600;
  color: var(--svc-text);
  margin: 0 0 4px 0;
}

.svc-pricing-tagline {
  font-size: 13px;
  color: var(--svc-text-muted);
  margin: 0 0 20px 0;
}

.svc-pricing-amount {
  display: flex;
  align-items: baseline;
  gap: 4px;
  margin-bottom: 4px;
}

.svc-pricing-currency {
  font-size: 20px;
  font-weight: 600;
  color: var(--svc-text-muted);
}

.svc-pricing-number {
  font-size: 40px;
  font-weight: 700;
  color: var(--svc-text);
  line-height: 1;
  letter-spacing: -0.02em;
}

.svc-pricing-period {
  font-size: 14px;
  color: var(--svc-text-muted);
}

.svc-pricing-setup {
  font-size: 13px;
  color: var(--svc-text-muted);
  margin: 0 0 20px 0;
}

.svc-pricing-features {
  list-style: none;
  padding: 0;
  margin: 0 0 24px 0;
  flex: 1;
}

.svc-pricing-features li {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  padding: 6px 0;
  font-size: 14px;
  color: var(--svc-text);
  line-height: 1.4;
}

.svc-pricing-features li svg {
  flex-shrink: 0;
  margin-top: 3px;
  color: var(--svc-success);
  width: 14px;
  height: 14px;
}

.svc-pricing-features li.disabled {
  color: var(--svc-text-subtle);
}

.svc-pricing-features li.disabled svg {
  color: var(--svc-border);
}

/* ============ FEATURES / WHAT'S INCLUDED ============ */
.svc-features-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 24px;
  margin-top: 32px;
}

.svc-feature {
  padding: 0;
}

.svc-feature-icon {
  width: 36px;
  height: 36px;
  border-radius: var(--svc-radius-sm);
  background: var(--svc-bg-alt);
  display: inline-flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 12px;
  color: var(--svc-primary);
}

.svc-feature-title {
  font-size: 16px;
  font-weight: 600;
  margin: 0 0 6px 0;
  color: var(--svc-text);
}

.svc-feature-desc {
  font-size: 14px;
  color: var(--svc-text-muted);
  margin: 0;
  line-height: 1.5;
}

/* ============ FAQ ============ */
.svc-faq-list {
  max-width: 720px;
  margin: 32px auto 0;
}

.svc-faq-item {
  border-bottom: 1px solid var(--svc-border);
  padding: 20px 0;
}

.svc-faq-item:first-child { padding-top: 0; }
.svc-faq-item:last-child { border-bottom: none; }

.svc-faq-question {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  background: none;
  border: none;
  padding: 0;
  font-size: 16px;
  font-weight: 600;
  color: var(--svc-text);
  cursor: pointer;
  text-align: left;
  font-family: inherit;
}

.svc-faq-question:hover { color: var(--svc-primary); }

.svc-faq-toggle {
  flex-shrink: 0;
  margin-left: 16px;
  transition: transform 0.2s ease;
  color: var(--svc-text-muted);
}

.svc-faq-item[open] .svc-faq-toggle {
  transform: rotate(45deg);
}

.svc-faq-answer {
  font-size: 15px;
  color: var(--svc-text-muted);
  line-height: 1.6;
  margin: 12px 0 0 0;
  padding-right: 32px;
}

/* ============ CTA BLOCK ============ */
.svc-cta {
  background: var(--svc-bg-alt);
  border: 1px solid var(--svc-border);
  border-radius: var(--svc-radius-lg);
  padding: 40px 32px;
  text-align: center;
  margin-top: 32px;
}

.svc-cta .svc-h2 { margin-bottom: 8px; }
.svc-cta p { color: var(--svc-text-muted); margin: 0 0 20px 0; }

/* ============ FINE PRINT ============ */
.svc-fineprint {
  font-size: 12px;
  color: var(--svc-text-subtle);
  margin-top: 16px;
  line-height: 1.5;
  max-width: 720px;
  margin-left: auto;
  margin-right: auto;
}

.svc-fineprint a { color: var(--svc-text-muted); }

/* ============ COMPARE TABLE (optional) ============ */
.svc-compare {
  width: 100%;
  border-collapse: collapse;
  margin-top: 32px;
  font-size: 14px;
}

.svc-compare th, .svc-compare td {
  padding: 12px 16px;
  text-align: left;
  border-bottom: 1px solid var(--svc-border);
}

.svc-compare th {
  font-weight: 600;
  background: var(--svc-bg-alt);
  font-size: 13px;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  color: var(--svc-text-muted);
}

.svc-compare tr:last-child td { border-bottom: none; }

/* ============ UTILITIES ============ */
.svc-text-center { text-align: center; }
.svc-mb-0 { margin-bottom: 0; }
.svc-mt-32 { margin-top: 32px; }
</style>
