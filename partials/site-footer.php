<?php
/**
 * Shared site footer — combines services sitemap with contact info
 *
 * Variables (all optional):
 *   $footer_simple — bool, render the compact horizontal-only footer (default: false)
 */
$footer_simple = $footer_simple ?? false;
?>
<style>
  .site-footer {
    background: #f9fafb;
    border-top: 1px solid #e5e7eb;
    color: #4b5563;
    font-family: 'Roboto', -apple-system, BlinkMacSystemFont, sans-serif;
    margin-top: 64px;
  }
  .site-footer-grid {
    max-width: 1100px;
    margin: 0 auto;
    padding: 48px 24px 24px;
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr;
    gap: 32px;
  }
  @media (max-width: 768px) {
    .site-footer-grid {
      grid-template-columns: 1fr 1fr;
      gap: 24px;
    }
    .site-footer-brand { grid-column: 1 / -1; }
  }
  @media (max-width: 480px) {
    .site-footer-grid {
      grid-template-columns: 1fr;
      gap: 24px;
      padding: 32px 16px 16px;
    }
  }
  .site-footer-brand img {
    height: 36px;
    margin-bottom: 12px;
  }
  .site-footer-tagline {
    font-size: 14px;
    color: #6b7280;
    line-height: 1.5;
    margin: 0 0 16px 0;
    max-width: 320px;
  }
  .site-footer-social {
    display: flex;
    gap: 12px;
    margin-top: 8px;
  }
  .site-footer-social a {
    color: #6b7280;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    transition: color 0.15s ease, border-color 0.15s ease;
  }
  .site-footer-social a:hover {
    color: #4FC4F0;
    border-color: #4FC4F0;
  }
  .site-footer-col h4 {
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: #1F2937;
    margin: 0 0 12px 0;
  }
  .site-footer-col ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  .site-footer-col li { margin-bottom: 8px; }
  .site-footer-col a {
    color: #4b5563;
    font-size: 14px;
    text-decoration: none;
    transition: color 0.15s ease;
  }
  .site-footer-col a:hover { color: #4FC4F0; }
  .site-footer-bottom {
    border-top: 1px solid #e5e7eb;
    max-width: 1100px;
    margin: 0 auto;
    padding: 16px 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 13px;
    color: #6b7280;
    flex-wrap: wrap;
    gap: 12px;
  }
  .site-footer-bottom a {
    color: #6b7280;
    text-decoration: none;
  }
  .site-footer-bottom a:hover { color: #4FC4F0; }
  @media (max-width: 480px) {
    .site-footer-bottom {
      flex-direction: column;
      align-items: center;
      text-align: center;
      padding: 16px;
    }
  }
</style>
<footer class="site-footer">
  <?php if (!$footer_simple): ?>
  <div class="site-footer-grid">
    <div class="site-footer-brand">
      <img src="/img/logos/serendipity_horrizontal_sm.png" alt="Serendipity Technology" onerror="this.onerror=null;this.src='/img/logos/serendipity_horrizontal.png'" />
      <p class="site-footer-tagline">Custom software solutions and ready-to-launch services for businesses, nonprofits, and political campaigns in Volusia County and across Florida.</p>
      <div class="site-footer-social">
        <a href="https://www.facebook.com/serendipitytech" target="_blank" rel="noopener" aria-label="Facebook">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
        </a>
        <a href="tel:+14075456070" aria-label="Call (407) 545-6070">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        </a>
        <a href="mailto:troy@serendipitytech.net" aria-label="Email">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </a>
      </div>
    </div>

    <div class="site-footer-col">
      <h4>Services</h4>
      <ul>
        <li><a href="/services/candidates">Candidate Sites</a></li>
        <li><a href="/services/business-sites">Business Websites</a></li>
        <li><a href="/services/event-checkin">Event Check-In</a></li>
        <li><a href="/services/membership">Membership Portal</a></li>
        <li><a href="/services/">All Services</a></li>
      </ul>
    </div>

    <div class="site-footer-col">
      <h4>Work</h4>
      <ul>
        <li><a href="/projects.php">Custom Projects</a></li>
        <li><a href="/#projects">Recent Projects</a></li>
        <li><a href="/media.php">Media Kit</a></li>
      </ul>
    </div>

    <div class="site-footer-col">
      <h4>Contact</h4>
      <ul>
        <li><a href="tel:+14075456070">(407) 545-6070</a></li>
        <li><a href="mailto:troy@serendipitytech.net">troy@serendipitytech.net</a></li>
        <li><a href="javascript:openContactModal()">Send a Message</a></li>
      </ul>
    </div>
  </div>
  <?php endif; ?>

  <div class="site-footer-bottom">
    <div>&copy; <?= date('Y') ?> Serendipity Technology &middot; Troy Shimkus &middot; Volusia County, FL</div>
    <div>
      <a href="/sitemap.xml">Sitemap</a>
      &middot;
      <a href="/robots.txt">robots.txt</a>
    </div>
  </div>
</footer>
