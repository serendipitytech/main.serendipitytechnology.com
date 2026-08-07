<?php
$header_always_visible = true;
$header_chat_action = 'openContactModal()';
include __DIR__ . '/partials/site-header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Site Templates — Serendipity Technology</title>
  <meta name="description" content="Ready-to-deploy website templates for campaigns, businesses, and nonprofits." />
  <link rel="canonical" href="https://serendipitytechnology.com/templates" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />

  <style>
    :root {
      --st-primary: #4FC4F0;
      --st-accent:  #F7B06A;
      --st-charcoal: #1F2937;
      --st-gradient: linear-gradient(90deg, #4FC4F0, #F7B06A);
      --border: #e2e6ea;
      --text-muted: #6b7280;
    }

    *, *::before, *::after { box-sizing: border-box; }

    html {
      font-family: 'Roboto', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, sans-serif;
      scroll-behavior: smooth;
    }

    body {
      background: #ffffff;
      color: #1a1a1a;
      margin: 0;
    }

    /* ─── Page Header ─────────────────────────── */
    .page-header {
      padding: 56px 0 40px;
      border-bottom: 1px solid var(--border);
    }
    .page-header h1 {
      font-size: clamp(1.75rem, 3vw, 2.5rem);
      font-weight: 800;
      color: var(--st-charcoal);
      letter-spacing: -0.02em;
      margin: 0 0 12px;
      position: relative;
      display: inline-block;
    }
    .page-header h1::after {
      content: '';
      position: absolute;
      bottom: -6px;
      left: 0;
      width: 60px;
      height: 3px;
      background: var(--st-gradient);
      border-radius: 2px;
    }
    .page-header p {
      font-size: 1rem;
      color: var(--text-muted);
      max-width: 580px;
      margin: 16px 0 0;
      line-height: 1.65;
    }

    /* ─── Section Label ───────────────────────── */
    .section-label {
      font-size: 0.75rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--st-accent);
      margin-bottom: 24px;
    }

    /* ─── Template Cards ──────────────────────── */
    .cards-section {
      padding: 48px 0;
      border-bottom: 1px solid var(--border);
    }

    .template-card {
      border: 1px solid var(--border);
      border-radius: 10px;
      overflow: hidden;
      background: #fff;
      display: flex;
      flex-direction: column;
      cursor: pointer;
      transition: box-shadow 0.15s ease, border-color 0.15s ease;
      height: 100%;
    }
    .template-card:hover {
      box-shadow: 0 4px 16px rgba(0,0,0,0.08);
      border-color: var(--st-primary);
    }
    .template-card.active {
      border-color: var(--st-primary);
      box-shadow: 0 0 0 3px rgba(79,196,240,0.15);
    }

    .card-swatch {
      height: 8px;
      width: 100%;
      flex-shrink: 0;
    }

    .card-body-inner {
      padding: 20px;
      display: flex;
      flex-direction: column;
      flex: 1;
    }

    .card-title {
      font-size: 0.95rem;
      font-weight: 700;
      color: var(--st-charcoal);
      margin: 0 0 6px;
    }
    .card-desc {
      font-size: 0.85rem;
      color: var(--text-muted);
      line-height: 1.55;
      margin: 0 0 16px;
      flex: 1;
    }

    .color-dots {
      display: flex;
      align-items: center;
      gap: 6px;
      margin-bottom: 16px;
    }
    .color-dot {
      width: 14px;
      height: 14px;
      border-radius: 50%;
      border: 1px solid rgba(0,0,0,0.08);
      flex-shrink: 0;
    }

    .card-actions {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }
    .btn-preview {
      background: var(--st-primary);
      color: #fff;
      border: none;
      border-radius: 6px;
      padding: 7px 14px;
      font-size: 0.82rem;
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      transition: opacity 0.15s ease;
      display: inline-block;
    }
    .btn-preview:hover {
      opacity: 0.88;
      color: #fff;
    }
    .btn-use {
      background: transparent;
      color: var(--st-charcoal);
      border: 1px solid var(--border);
      border-radius: 6px;
      padding: 7px 14px;
      font-size: 0.82rem;
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      transition: border-color 0.15s ease, color 0.15s ease;
      display: inline-block;
    }
    .btn-use:hover {
      border-color: var(--st-primary);
      color: var(--st-charcoal);
    }

    /* ─── Preview Section ─────────────────────── */
    .preview-section {
      padding: 48px 0 64px;
    }
    .preview-label-bar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 12px;
    }
    .preview-label-bar .label-text {
      font-size: 0.85rem;
      font-weight: 600;
      color: #333;
    }
    .preview-label-bar .label-variant {
      color: var(--st-accent);
    }
    .preview-label-bar a {
      font-size: 0.82rem;
      color: var(--text-muted);
      text-decoration: none;
      transition: color 0.15s ease;
    }
    .preview-label-bar a:hover { color: var(--st-charcoal); }

    /* ─── Color Picker Bar ────────────────────── */
    .color-picker-bar {
      display: flex;
      align-items: center;
      gap: 1.25rem;
      padding: 0.6rem 1rem;
      background: #fafbfc;
      border: 1px solid var(--border);
      border-color: var(--st-primary);
      border-bottom: none;
      border-radius: 10px 10px 0 0;
      flex-wrap: wrap;
    }
    .color-picker-bar .cp-label {
      font-size: 0.72rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      color: var(--text-muted);
      white-space: nowrap;
    }
    .cp-field {
      display: flex;
      align-items: center;
      gap: 0.4rem;
    }
    .cp-field label {
      font-size: 0.75rem;
      color: #555;
      font-weight: 500;
      white-space: nowrap;
    }
    .cp-field input[type="color"] {
      width: 28px;
      height: 28px;
      border: 1px solid var(--border);
      border-radius: 6px;
      padding: 2px;
      cursor: pointer;
      background: #fff;
    }
    .cp-field .cp-hex {
      font-size: 0.72rem;
      font-family: monospace;
      color: var(--text-muted);
      width: 58px;
    }
    .cp-reset {
      margin-left: auto;
      font-size: 0.72rem;
      color: var(--text-muted);
      background: none;
      border: 1px solid var(--border);
      border-radius: 6px;
      padding: 0.25rem 0.65rem;
      cursor: pointer;
      font-family: inherit;
      transition: border-color 0.15s ease;
    }
    .cp-reset:hover { border-color: var(--st-primary); color: #333; }

    .preview-frame-wrapper {
      border: 1px solid var(--st-primary);
      border-radius: 0 0 10px 10px;
      overflow: hidden;
      background: #f5f5f5;
    }
    .preview-frame-wrapper iframe {
      display: block;
      width: 100%;
      height: 70vh;
      border: none;
    }

    /* ─── CTA ─────────────────────────────────── */
    .cta-section {
      padding: 48px 0;
      background: #fafafa;
      border-top: 1px solid var(--border);
      text-align: center;
    }
    .cta-section h2 {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--st-charcoal);
      margin-bottom: 8px;
    }
    .cta-section p {
      color: var(--text-muted);
      margin-bottom: 24px;
    }
    .btn-cta {
      display: inline-block;
      padding: 12px 28px;
      background: var(--st-gradient);
      color: #1F2937;
      font-weight: 700;
      font-size: 0.95rem;
      border-radius: 8px;
      text-decoration: none;
      transition: opacity 0.15s ease;
    }
    .btn-cta:hover { opacity: 0.9; color: #1F2937; }

    @media (prefers-reduced-motion: reduce) {
      html { scroll-behavior: auto; }
      .template-card, .btn-preview, .btn-use { transition: none; }
    }
  </style>
</head>
<body class="has-fixed-header">

  <!-- Page Header -->
  <div class="page-header">
    <div class="container" style="max-width: 1200px; padding-left: 2rem; padding-right: 2rem;">
      <h1>Site Templates</h1>
      <p>Ready-to-deploy templates for campaigns, businesses, and nonprofits. Each template is fully customizable with your brand colors, content, and images.</p>
    </div>
  </div>

  <!-- Campaign Template Cards -->
  <section class="cards-section">
    <div class="container" style="max-width: 1200px; padding-left: 2rem; padding-right: 2rem;">
      <p class="section-label">Campaign</p>
      <div class="row g-4">

        <!-- Campaign Standard — Navy & Orange -->
        <div class="col-md-4">
          <div class="template-card active" data-preview="https://sites-demo.serendipitylabs.cloud/templates/preview-campaign.html" data-name="Campaign" data-primary="#0B1F3A" data-accent="#E36A2C" id="card-campaign" onclick="selectVariant(this)">
            <div class="card-swatch" style="background: #0B1F3A;"></div>
            <div class="card-body-inner">
              <p class="card-title">Campaign — Navy &amp; Orange</p>
              <p class="card-desc">Bold navy and orange. Ideal for political campaigns, advocacy groups, and civic organizations.</p>
              <div class="color-dots">
                <div class="color-dot" style="background: #0B1F3A;" title="Primary: #0B1F3A"></div>
                <div class="color-dot" style="background: #E36A2C;" title="Accent: #E36A2C"></div>
              </div>
              <div class="card-actions">
                <button class="btn-preview" onclick="event.stopPropagation(); loadPreview('https://sites-demo.serendipitylabs.cloud/templates/preview-campaign.html','Campaign — Navy &amp; Orange','#0B1F3A','#E36A2C')">Preview</button>
                <a href="mailto:hello@serendipitytechnology.com?subject=Template%20Request%20%E2%80%94%20Campaign%20(Navy%20%26%20Orange)" class="btn-use" onclick="event.stopPropagation()">Use This Template</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Campaign Standard — Slate & Teal -->
        <div class="col-md-4">
          <div class="template-card" data-preview="https://sites-demo.serendipitylabs.cloud/templates/preview-campaign.html" data-name="Campaign — Slate &amp; Teal" data-primary="#2c3e50" data-accent="#17a589" id="card-campaign-teal" onclick="selectVariant(this)">
            <div class="card-swatch" style="background: #2c3e50;"></div>
            <div class="card-body-inner">
              <p class="card-title">Campaign — Slate &amp; Teal</p>
              <p class="card-desc">Clean slate and teal. Modern, professional variation for nonprofits, researchers, and civic professionals.</p>
              <div class="color-dots">
                <div class="color-dot" style="background: #2c3e50;" title="Primary: #2c3e50"></div>
                <div class="color-dot" style="background: #17a589;" title="Accent: #17a589"></div>
              </div>
              <div class="card-actions">
                <button class="btn-preview" onclick="event.stopPropagation(); loadPreview('https://sites-demo.serendipitylabs.cloud/templates/preview-campaign.html','Campaign — Slate &amp; Teal','#2c3e50','#17a589')">Preview</button>
                <a href="mailto:hello@serendipitytechnology.com?subject=Template%20Request%20%E2%80%94%20Campaign%20(Slate%20%26%20Teal)" class="btn-use" onclick="event.stopPropagation()">Use This Template</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Nonprofit & Business Template Cards -->
  <section class="cards-section">
    <div class="container" style="max-width: 1200px; padding-left: 2rem; padding-right: 2rem;">
      <p class="section-label">Nonprofit &amp; Business</p>
      <div class="row g-4">

        <!-- Nonprofit / Cause — Green & Gold -->
        <div class="col-md-4">
          <div class="template-card" data-preview="https://sites-demo.serendipitylabs.cloud/templates/preview-nonprofit.html" data-name="Nonprofit / Cause — Green &amp; Gold" data-primary="#2d6a4f" data-accent="#d4a017" id="card-nonprofit" onclick="selectVariant(this)">
            <div class="card-swatch" style="background: #2d6a4f;"></div>
            <div class="card-body-inner">
              <p class="card-title">Nonprofit / Cause — Green &amp; Gold</p>
              <p class="card-desc">Warm green and gold. Purpose-built for charities, nonprofits, and cause-driven organizations. Includes donation progress bars, causes grid, events, and volunteer sections.</p>
              <div class="color-dots">
                <div class="color-dot" style="background: #2d6a4f;" title="Primary: #2d6a4f"></div>
                <div class="color-dot" style="background: #d4a017;" title="Accent: #d4a017"></div>
              </div>
              <div class="card-actions">
                <button class="btn-preview" onclick="event.stopPropagation(); loadPreview('https://sites-demo.serendipitylabs.cloud/templates/preview-nonprofit.html','Nonprofit / Cause — Green &amp; Gold','#2d6a4f','#d4a017')">Preview</button>
                <a href="mailto:hello@serendipitytechnology.com?subject=Template%20Request%20%E2%80%94%20Nonprofit%20(Green%20%26%20Gold)" class="btn-use" onclick="event.stopPropagation()">Use This Template</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Nonprofit / Cause — Blue & Coral -->
        <div class="col-md-4">
          <div class="template-card" data-preview="https://sites-demo.serendipitylabs.cloud/templates/preview-nonprofit.html" data-name="Nonprofit / Cause — Blue &amp; Coral" data-primary="#1B4F72" data-accent="#E74C3C" id="card-nonprofit-blue" onclick="selectVariant(this)">
            <div class="card-swatch" style="background: #1B4F72;"></div>
            <div class="card-body-inner">
              <p class="card-title">Nonprofit / Cause — Blue &amp; Coral</p>
              <p class="card-desc">Bold blue and coral. Strong, urgent palette for advocacy campaigns, social justice organizations, and cause-first nonprofits.</p>
              <div class="color-dots">
                <div class="color-dot" style="background: #1B4F72;" title="Primary: #1B4F72"></div>
                <div class="color-dot" style="background: #E74C3C;" title="Accent: #E74C3C"></div>
              </div>
              <div class="card-actions">
                <button class="btn-preview" onclick="event.stopPropagation(); loadPreview('https://sites-demo.serendipitylabs.cloud/templates/preview-nonprofit.html','Nonprofit / Cause — Blue &amp; Coral','#1B4F72','#E74C3C')">Preview</button>
                <a href="mailto:hello@serendipitytechnology.com?subject=Template%20Request%20%E2%80%94%20Nonprofit%20(Blue%20%26%20Coral)" class="btn-use" onclick="event.stopPropagation()">Use This Template</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Business / Consulting — Forest & Gold -->
        <div class="col-md-4">
          <div class="template-card" data-preview="https://sites-demo.serendipitylabs.cloud/templates/preview-business.html" data-name="Business / Consulting — Forest &amp; Gold" data-primary="#1a3d2b" data-accent="#c8973a" id="card-business" onclick="selectVariant(this)">
            <div class="card-swatch" style="background: #1a3d2b;"></div>
            <div class="card-body-inner">
              <p class="card-title">Business / Consulting — Forest &amp; Gold</p>
              <p class="card-desc">Professional forest green and gold. Built for consulting firms, agencies, and service businesses. Includes services showcase, process steps, pricing tiers, and client testimonials.</p>
              <div class="color-dots">
                <div class="color-dot" style="background: #1a3d2b;" title="Primary: #1a3d2b"></div>
                <div class="color-dot" style="background: #c8973a;" title="Accent: #c8973a"></div>
              </div>
              <div class="card-actions">
                <button class="btn-preview" onclick="event.stopPropagation(); loadPreview('https://sites-demo.serendipitylabs.cloud/templates/preview-business.html','Business / Consulting — Forest &amp; Gold','#1a3d2b','#c8973a')">Preview</button>
                <a href="mailto:hello@serendipitytechnology.com?subject=Template%20Request%20%E2%80%94%20Business%20Consulting%20(Forest%20%26%20Gold)" class="btn-use" onclick="event.stopPropagation()">Use This Template</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Business / Consulting — Slate & Teal -->
        <div class="col-md-4">
          <div class="template-card" data-preview="https://sites-demo.serendipitylabs.cloud/templates/preview-business.html" data-name="Business / Consulting — Slate &amp; Teal" data-primary="#2c3e50" data-accent="#17a589" id="card-business-slate" onclick="selectVariant(this)">
            <div class="card-swatch" style="background: #2c3e50;"></div>
            <div class="card-body-inner">
              <p class="card-title">Business / Consulting — Slate &amp; Teal</p>
              <p class="card-desc">Sleek slate and teal. Modern, versatile palette for tech firms, agencies, and professional service providers.</p>
              <div class="color-dots">
                <div class="color-dot" style="background: #2c3e50;" title="Primary: #2c3e50"></div>
                <div class="color-dot" style="background: #17a589;" title="Accent: #17a589"></div>
              </div>
              <div class="card-actions">
                <button class="btn-preview" onclick="event.stopPropagation(); loadPreview('https://sites-demo.serendipitylabs.cloud/templates/preview-business.html','Business / Consulting — Slate &amp; Teal','#2c3e50','#17a589')">Preview</button>
                <a href="mailto:hello@serendipitytechnology.com?subject=Template%20Request%20%E2%80%94%20Business%20Consulting%20(Slate%20%26%20Teal)" class="btn-use" onclick="event.stopPropagation()">Use This Template</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Preview Section -->
  <section class="preview-section" id="preview-section">
    <div class="container" style="max-width: 1200px; padding-left: 2rem; padding-right: 2rem;">
      <div class="preview-label-bar">
        <p class="label-text">
          Previewing: <span class="label-variant" id="preview-variant-name">Campaign — Navy &amp; Orange</span>
        </p>
        <a href="https://sites-demo.serendipitylabs.cloud/templates/preview-campaign.html" id="preview-new-tab-link" target="_blank" rel="noopener noreferrer">Open in new tab ↗</a>
      </div>
      <!-- Color Picker Bar -->
      <div class="color-picker-bar">
        <span class="cp-label">Customize colors</span>
        <div class="cp-field">
          <label for="cp-primary">Primary</label>
          <input type="color" id="cp-primary" value="#0B1F3A" title="Primary color">
          <span class="cp-hex" id="cp-primary-hex">#0B1F3A</span>
        </div>
        <div class="cp-field">
          <label for="cp-accent">Accent</label>
          <input type="color" id="cp-accent" value="#E36A2C" title="Accent color">
          <span class="cp-hex" id="cp-accent-hex">#E36A2C</span>
        </div>
        <button class="cp-reset" id="cp-reset">Reset</button>
      </div>

      <div class="preview-frame-wrapper">
        <iframe id="preview-iframe" src="https://sites-demo.serendipitylabs.cloud/templates/preview-campaign.html" title="Template preview" loading="lazy"></iframe>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="cta-section">
    <div class="container" style="max-width: 700px; padding-left: 2rem; padding-right: 2rem;">
      <h2>Ready to get started?</h2>
      <p>Pick a template and we'll have your site live in days — not weeks.</p>
      <a href="/get-started" class="btn-cta">Start Your Site →</a>
    </div>
  </section>

  <script>
    (function () {
      'use strict';

      var cards       = document.querySelectorAll('.template-card');
      var iframe      = document.getElementById('preview-iframe');
      var variantName = document.getElementById('preview-variant-name');
      var newTabLink  = document.getElementById('preview-new-tab-link');
      var cpPrimary   = document.getElementById('cp-primary');
      var cpAccent    = document.getElementById('cp-accent');
      var cpPrimaryHex = document.getElementById('cp-primary-hex');
      var cpAccentHex  = document.getElementById('cp-accent-hex');
      var cpReset     = document.getElementById('cp-reset');

      var currentSrc     = 'https://sites-demo.serendipitylabs.cloud/templates/preview-campaign.html';
      var currentPrimary = '#0B1F3A';
      var currentAccent  = '#E36A2C';

      // Apply colors into iframe CSS variables
      function applyColors(primary, accent) {
        try {
          var doc  = iframe.contentDocument || iframe.contentWindow.document;
          var root = doc.documentElement;
          root.style.setProperty('--primary',      primary);
          root.style.setProperty('--primary-dark', shadeColor(primary, -15));
          root.style.setProperty('--accent',       accent);
          root.style.setProperty('--accent-dark',  shadeColor(accent, -15));
        } catch (e) { /* cross-origin guard */ }
      }

      function shadeColor(hex, pct) {
        var num = parseInt(hex.replace('#', ''), 16);
        var r   = Math.min(255, Math.max(0, (num >> 16)         + pct));
        var g   = Math.min(255, Math.max(0, ((num >> 8) & 0xFF) + pct));
        var b   = Math.min(255, Math.max(0, (num & 0xFF)        + pct));
        return '#' + ((1 << 24) | (r << 16) | (g << 8) | b).toString(16).slice(1);
      }

      // Re-apply after iframe loads
      iframe.addEventListener('load', function () {
        applyColors(cpPrimary.value, cpAccent.value);
      });

      function loadPreview(src, name, primary, accent) {
        currentSrc     = src;
        currentPrimary = primary;
        currentAccent  = accent;

        cpPrimary.value          = primary;
        cpAccent.value           = accent;
        cpPrimaryHex.textContent = primary;
        cpAccentHex.textContent  = accent;

        iframe.src = src;
        variantName.innerHTML = name;
        newTabLink.href = src;
        document.getElementById('preview-section').scrollIntoView({ behavior: 'smooth', block: 'start' });
      }

      window.loadPreview = loadPreview;

      window.selectVariant = function (card) {
        cards.forEach(function (c) { c.classList.remove('active'); });
        card.classList.add('active');
        loadPreview(
          card.getAttribute('data-preview'),
          card.getAttribute('data-name'),
          card.getAttribute('data-primary'),
          card.getAttribute('data-accent')
        );
      };

      // Color picker inputs — live update
      cpPrimary.addEventListener('input', function () {
        cpPrimaryHex.textContent = cpPrimary.value;
        applyColors(cpPrimary.value, cpAccent.value);
      });
      cpAccent.addEventListener('input', function () {
        cpAccentHex.textContent = cpAccent.value;
        applyColors(cpPrimary.value, cpAccent.value);
      });

      // Reset button
      cpReset.addEventListener('click', function () {
        cpPrimary.value          = currentPrimary;
        cpAccent.value           = currentAccent;
        cpPrimaryHex.textContent = currentPrimary;
        cpAccentHex.textContent  = currentAccent;
        applyColors(currentPrimary, currentAccent);
      });

    }());
  </script>

<?php
$footer_simple = false;
include __DIR__ . '/partials/site-footer.php';
include __DIR__ . '/partials/site-contact-modal.php';
?>
