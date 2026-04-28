<?php
/**
 * Shared styles for all /services/* landing pages
 * Design language: Linear / Stripe / GitHub structure with Serendipity brand
 *   - Brand gradient: #4FC4F0 → #F7B06A used for accents and section title underlines
 *   - Hero with background image + dark overlay + frosted content card (matches site pattern)
 *   - 8-12px border radius
 *   - 4/8/12/16/24/32 spacing
 *   - WCAG AA contrast
 */
?>
<style>
:root {
  --svc-bg: #ffffff;
  --svc-bg-alt: #fafafa;
  --svc-text: #1F2937;
  --svc-text-muted: #6b7280;
  --svc-text-subtle: #9ca3af;
  --svc-border: #e5e7eb;
  --svc-border-hover: #d1d5db;
  --svc-primary: #4FC4F0;
  --svc-primary-hover: #2cb1e3;
  --svc-primary-text: #ffffff;
  --svc-accent: #F7B06A;
  --svc-accent-hover: #f59e0b;
  --svc-success: #10b981;
  --svc-danger: #ef4444;
  --svc-radius-sm: 6px;
  --svc-radius: 10px;
  --svc-radius-lg: 12px;
  --svc-shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
  --svc-shadow: 0 1px 3px rgba(0,0,0,0.08);
  --svc-shadow-lg: 0 4px 12px rgba(0,0,0,0.08);
  --svc-gradient: linear-gradient(90deg, #4FC4F0, #F7B06A);
  --svc-gradient-soft: linear-gradient(135deg, rgba(79,196,240,0.08) 0%, rgba(247,176,106,0.08) 100%);
}

/* ============ LAYOUT ============ */
.svc-page {
  background: var(--svc-bg);
  color: var(--svc-text);
  font-family: 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif;
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
  position: relative;
}

.svc-section + .svc-section {
  padding-top: 0;
}

.svc-section-alt {
  background: var(--svc-bg-alt);
  border-top: 1px solid var(--svc-border);
  border-bottom: 1px solid var(--svc-border);
}

/* Brand gradient divider — used between sections for visual rhythm */
.svc-divider {
  display: block;
  height: 4px;
  width: 80px;
  margin: 0 auto;
  background: var(--svc-gradient);
  border-radius: 2px;
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
  color: var(--svc-accent);
  margin: 0 0 12px 0;
}

.svc-h1 {
  font-family: "Gill Sans", "Gill Sans MT", 'Roboto', sans-serif;
  font-size: 48px;
  font-weight: 700;
  line-height: 1.1;
  letter-spacing: -0.02em;
  margin: 0 0 16px 0;
  color: var(--svc-text);
}

.svc-h2 {
  font-family: "Gill Sans", "Gill Sans MT", 'Roboto', sans-serif;
  position: relative;
  display: inline-block;
  font-size: 32px;
  font-weight: 700;
  line-height: 1.2;
  letter-spacing: -0.01em;
  margin: 0 0 12px 0;
  color: var(--svc-text);
  padding-bottom: 12px;
}

/* Brand gradient underline on section titles — matches the home page pattern */
.svc-h2::after {
  content: "";
  display: block;
  width: 60%;
  height: 4px;
  margin-top: 8px;
  background: var(--svc-gradient);
  border-radius: 2px;
}

.svc-h2.svc-h2-center::after {
  margin-left: auto;
  margin-right: auto;
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

/* ============ HERO (with background + frosted overlay) ============ */
.svc-hero {
  position: relative;
  padding: 96px 16px 64px;
  text-align: center;
  background: var(--svc-hero-bg, linear-gradient(135deg, #4FC4F0 0%, #F7B06A 100%));
  background-size: cover;
  background-position: center center;
  overflow: hidden;
}

/* Soft dark overlay over the background image/gradient */
.svc-hero::before {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.55);
  z-index: 0;
}

/* Subtle pattern overlay for visual texture (optional) */
.svc-hero::after {
  content: "";
  position: absolute;
  inset: 0;
  background-image: radial-gradient(circle at 20% 30%, rgba(79,196,240,0.15) 0%, transparent 50%),
                    radial-gradient(circle at 80% 70%, rgba(247,176,106,0.15) 0%, transparent 50%);
  z-index: 1;
  pointer-events: none;
}

.svc-hero > .svc-container {
  position: relative;
  z-index: 2;
}

/* Frosted glass content card on top of the hero */
.svc-hero-card {
  background: rgba(255,255,255,0.92);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border-radius: var(--svc-radius-lg);
  padding: 40px 32px;
  display: inline-block;
  max-width: 720px;
  width: 100%;
  box-shadow: 0 12px 40px rgba(0,0,0,0.18);
  border: 1px solid rgba(255,255,255,0.6);
}

.svc-hero-card .svc-h1 {
  margin-bottom: 16px;
}

.svc-hero-card .svc-lede {
  margin: 0 auto 28px;
}

.svc-hero-actions {
  display: flex;
  gap: 12px;
  justify-content: center;
  flex-wrap: wrap;
}

@media (max-width: 768px) {
  .svc-hero { padding: 64px 12px 48px; }
  .svc-hero-card { padding: 28px 20px; }
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
  transition: background-color 0.15s ease, border-color 0.15s ease, color 0.15s ease, transform 0.1s ease;
  line-height: 1;
  white-space: nowrap;
}

.svc-btn:active { transform: translateY(1px); }

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

.svc-btn-accent {
  background: var(--svc-accent);
  color: #fff;
  border-color: var(--svc-accent);
}

.svc-btn-accent:hover {
  background: var(--svc-accent-hover);
  border-color: var(--svc-accent-hover);
  color: #fff;
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
  transition: border-color 0.15s ease, box-shadow 0.15s ease, transform 0.15s ease;
  position: relative;
}

.svc-pricing-card:hover {
  border-color: var(--svc-border-hover);
  box-shadow: var(--svc-shadow-lg);
  transform: translateY(-2px);
}

/* Featured card: gradient border via background-clip technique */
.svc-pricing-card.featured {
  border: 2px solid transparent;
  background:
    linear-gradient(var(--svc-bg), var(--svc-bg)) padding-box,
    var(--svc-gradient) border-box;
  padding: 23px;
}

.svc-pricing-badge {
  display: inline-block;
  position: absolute;
  top: -12px;
  left: 24px;
  background: var(--svc-accent);
  color: #fff;
  font-size: 11px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  padding: 4px 10px;
  border-radius: var(--svc-radius-sm);
  box-shadow: 0 2px 8px rgba(247,176,106,0.4);
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
  color: var(--svc-primary);
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
  width: 40px;
  height: 40px;
  border-radius: var(--svc-radius-sm);
  background: var(--svc-gradient-soft);
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
  transition: transform 0.2s ease, color 0.2s ease;
  color: var(--svc-text-muted);
}

.svc-faq-item[open] .svc-faq-toggle {
  transform: rotate(45deg);
  color: var(--svc-accent);
}

.svc-faq-answer {
  font-size: 15px;
  color: var(--svc-text-muted);
  line-height: 1.6;
  margin: 12px 0 0 0;
  padding-right: 32px;
}

.svc-faq-answer a {
  color: var(--svc-primary);
  text-decoration: underline;
}

/* ============ CTA BLOCK ============ */
.svc-cta {
  background: var(--svc-gradient-soft);
  border: 1px solid var(--svc-border);
  border-radius: var(--svc-radius-lg);
  padding: 48px 32px;
  text-align: center;
  margin-top: 32px;
  position: relative;
  overflow: hidden;
}

/* Subtle gradient bar at the top of the CTA */
.svc-cta::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: var(--svc-gradient);
}

.svc-cta .svc-h2 {
  margin-bottom: 12px;
  display: inline-block;
}

.svc-cta .svc-h2::after {
  margin-left: auto;
  margin-right: auto;
}

.svc-cta p { color: var(--svc-text-muted); margin: 0 0 24px 0; font-size: 16px; }

/* ============ FINE PRINT ============ */
.svc-fineprint {
  font-size: 12px;
  color: var(--svc-text-subtle);
  margin-top: 24px;
  line-height: 1.5;
  max-width: 720px;
  margin-left: auto;
  margin-right: auto;
}

.svc-fineprint a { color: var(--svc-text-muted); text-decoration: underline; }

/* ============ UTILITIES ============ */
.svc-text-center { text-align: center; }
.svc-mb-0 { margin-bottom: 0; }
.svc-mt-32 { margin-top: 32px; }
</style>
