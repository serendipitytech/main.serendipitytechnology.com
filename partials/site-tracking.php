<?php
/**
 * Shared ad/analytics tracking: GA4 + Meta Pixel + Upfront funnel events.
 *
 * Included ONCE, from partials/site-header.php (never copy this per page; per-page copies
 * are exactly why GA4 was missing on /services/* and /book/upfront-demo).
 *
 * Active only on /services/* and /book-upfront.php (/book/upfront-demo). Older pages keep
 * their own hard-coded GA4 loader and are not touched.
 */
if (defined('SITE_TRACKING_LOADED')) { return; }
$__st_script = $_SERVER['SCRIPT_NAME'] ?? '';
if (!preg_match('#^/(services/|book-upfront\.php$)#', $__st_script)) { return; }
define('SITE_TRACKING_LOADED', true);

// ---- CONFIG -------------------------------------------------------------
// Meta Pixel ID: one-line drop-in. Replace PIXEL_ID_PENDING with the numeric ID from
// Events Manager. While it is not purely numeric the Pixel is NOT loaded (nothing breaks).
const META_PIXEL_ID = 'PIXEL_ID_PENDING';
const GA4_ID        = 'G-G50KCN37LQ';
// -------------------------------------------------------------------------

$__st_pixel_on = (bool) preg_match('/^\d{8,20}$/', META_PIXEL_ID);
$__st_path     = strtok($_SERVER['REQUEST_URI'] ?? '', '?');
?>
<!-- Google Analytics 4 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= GA4_ID ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?= GA4_ID ?>');
</script>
<?php if ($__st_pixel_on): ?>
<!-- Meta Pixel -->
<script>
  !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '<?= META_PIXEL_ID ?>');
  fbq('track', 'PageView');
</script>
<?php else: ?>
<script>
  /* Meta Pixel not configured (META_PIXEL_ID in partials/site-tracking.php). No-op stub so event code never throws. */
  window.fbq = window.fbq || function(){};
</script>
<?php endif; ?>
<script>
(function () {
  var path = <?= json_encode($__st_path) ?>;

  function ga(name, params) { try { gtag('event', name, params || {}); } catch (e) {} }
  function fb(kind, name, params, opts) { try { if (opts) { fbq(kind, name, params || {}, opts); } else { fbq(kind, name, params || {}); } } catch (e) {} }
  function uuid() {
    if (window.crypto && crypto.randomUUID) { return crypto.randomUUID(); }
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
      var r = Math.random() * 16 | 0; return (c === 'x' ? r : (r & 3 | 8)).toString(16);
    });
  }

  // Page-level ViewContent
  if (/^\/services\/upfront\/?$/.test(path)) {
    fb('track', 'ViewContent', { content_name: 'Upfront CRM' });
  } else if (/^\/book\/upfront-demo\/?$/.test(path)) {
    fb('track', 'ViewContent', { content_name: 'Demo booking' });
  }

  // Where on the page was the CTA? hero / pricing / footer (header and others fall back to the section id/tag).
  function ctaLocation(a) {
    if (a.closest('.up-hero')) { return 'hero'; }
    if (a.closest('#pricing')) { return 'pricing'; }
    if (a.closest('footer, .site-footer, .svc-cta, .svc-final-cta')) { return 'footer'; }
    if (a.closest('#scrollNav, header, nav')) { return 'header'; }
    var s = a.closest('section');
    return (s && s.id) ? s.id : 'body';
  }

  // Forward the current query string (utm_*, fbclid, gclid) onto internal CTA hops.
  function forwardParams(a) {
    if (!location.search || a.dataset.stFwd === '1') { return; }
    try {
      var u = new URL(a.href, location.href);
      var cur = new URLSearchParams(location.search);
      cur.forEach(function (v, k) { if (!u.searchParams.has(k)) { u.searchParams.set(k, v); } });
      // keep internal links relative so selectors and canonical form stay stable
      a.setAttribute('href', u.origin === location.origin ? u.pathname + u.search + u.hash : u.toString());
      a.dataset.stFwd = '1';
    } catch (e) {}
  }

  // Capture phase + mousedown/touchstart/keydown so forwarding lands before navigation and middle-click/open-in-tab.
  function prep(e) {
    var a = e.target.closest && e.target.closest('a[href="/book/upfront-demo"], a[href^="/book/upfront-demo?"], a[href*="upfront-demo.serendipitytechnology.com"]');
    if (a) { forwardParams(a); }
  }
  ['mousedown', 'touchstart', 'focusin', 'contextmenu'].forEach(function (ev) { document.addEventListener(ev, prep, true); });

  document.addEventListener('click', function (e) {
    var a = e.target.closest && e.target.closest('a[href^="/book/upfront-demo"], a[href*="upfront-demo.serendipitytechnology.com"]');
    if (!a) { return; }
    forwardParams(a);
    var loc = ctaLocation(a);
    if (a.getAttribute('href').indexOf('/book/upfront-demo') === 0) {
      ga('book_demo_click', { cta_location: loc });
      fb('trackCustom', 'BookDemoClick');
    } else {
      ga('try_demo_click', { cta_location: loc });
      fb('trackCustom', 'TryDemoClick');
    }
  }, true);

  // Booking success, called from the Cal embed listener on /book/upfront-demo.
  var booked = false;
  window.siteTrackDemoBooked = function () {
    if (booked) { return; }   // V2 + legacy event can both fire; count once
    booked = true;
    var id = uuid();           // shared event_id for later CAPI dedupe
    ga('demo_booked', { event_id: id, value: 0 });
    fb('track', 'Schedule', {}, { eventID: id });
  };
})();
</script>
