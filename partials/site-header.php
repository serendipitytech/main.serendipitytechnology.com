<?php
/**
 * Shared site header — scroll-triggered nav bar with logo and contact button
 *
 * Variables (set before include — all optional):
 *   $header_always_visible — bool, force always-visible mode (default: false, scroll-triggered)
 *   $header_chat_action    — JS function name to call when chat icon clicked
 *                            (default: 'openContactModal()')
 *
 * Pages should ensure their CSS includes the .scroll-nav styles below, OR rely on the
 * include of this file's <style> block. The styles are scoped to #scrollNav so they
 * won't conflict with other pages.
 *
 * Pair with /partials/site-contact-modal.php for the contact modal that the chat
 * icon opens. The modal must define openContactModal() (or whatever function name
 * is set in $header_chat_action).
 */
$header_always_visible = $header_always_visible ?? false;
$header_chat_action = $header_chat_action ?? 'openContactModal()';
?>
<style>
  #scrollNav {
    position: fixed;
    top: <?= $header_always_visible ? '0' : '-80px' ?>;
    left: 0;
    right: 0;
    opacity: <?= $header_always_visible ? '1' : '0' ?>;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.06);
    padding: 0.5rem 1rem;
    z-index: 999;
    transition: top 0.3s, opacity 0.3s;
    height: 60px;
    box-sizing: border-box;
  }
  #scrollNav.visible,
  #scrollNav.always-visible {
    top: 0;
    opacity: 1;
  }
  .scroll-nav-inner {
    max-width: 1100px;
    margin: 0 auto;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1rem;
    box-sizing: border-box;
  }
  .scroll-logo-link {
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
    color: inherit;
    transition: opacity 0.15s ease;
  }
  .scroll-logo-link:hover { opacity: 0.7; }
  .scroll-logo {
    height: 40px;
    width: auto;
  }
  .scroll-title {
    font-size: 1rem;
    font-weight: 700;
    color: #1F2937;
    font-family: 'Gill Sans', 'Gill Sans MT', 'Roboto', sans-serif;
  }
  @media (max-width: 480px) {
    .scroll-title { display: none; }
  }
  .scroll-nav-links {
    display: flex;
    align-items: center;
    gap: 20px;
  }
  .scroll-nav-link {
    font-size: 14px;
    font-weight: 500;
    color: #475569;
    text-decoration: none;
    transition: color 0.15s ease;
    white-space: nowrap;
  }
  .scroll-nav-link:hover { color: #4FC4F0; }
  @media (max-width: 768px) {
    .scroll-nav-links { display: none; }
  }
  .scroll-chat-btn {
    background: none;
    border: none;
    font-size: 1.4rem;
    cursor: pointer;
    color: #1F2937;
    padding: 6px;
    display: inline-flex;
    align-items: center;
    transition: color 0.15s ease;
  }
  .scroll-chat-btn:hover { color: #4FC4F0; }
  /* When always-visible, body needs top padding so content doesn't hide under nav */
  body.has-fixed-header {
    padding-top: 60px;
  }
</style>
<nav id="scrollNav"<?= $header_always_visible ? ' class="always-visible"' : '' ?>>
  <div class="scroll-nav-inner">
    <a href="/" class="scroll-logo-link" aria-label="Serendipity Technology home">
      <img src="/img/logo_sm.png" alt="Serendipity Technology" class="scroll-logo" />
      <span class="scroll-title">Serendipity Technology</span>
    </a>
    <div class="scroll-nav-links">
      <a href="/services/" class="scroll-nav-link">Services</a>
      <a href="/#projects" class="scroll-nav-link">Projects</a>
      <a href="/media.php" class="scroll-nav-link">Media</a>
    </div>
    <button class="scroll-chat-btn" onclick="<?= $header_chat_action ?>" aria-label="Contact Us">
      <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 12.5C21 14.9853 18.9853 17 16.5 17H13L7.5 21V17H6.5C4.01472 17 2 14.9853 2 12.5V8.5C2 6.01472 4.01472 4 6.5 4H16.5C18.9853 4 21 6.01472 21 8.5V12.5Z" />
      </svg>
    </button>
  </div>
</nav>
<?php if (!$header_always_visible): ?>
<script>
  // Scroll-triggered header — appears after user scrolls past 200px
  (function() {
    var nav = document.getElementById('scrollNav');
    if (!nav) return;
    window.addEventListener('scroll', function() {
      if (window.scrollY > 200) {
        nav.classList.add('visible');
      } else {
        nav.classList.remove('visible');
      }
    }, { passive: true });
  })();
</script>
<?php endif; ?>
