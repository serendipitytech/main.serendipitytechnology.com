<?php
/**
 * Shared analytics head block: cookie notice/opt-out component + GA4.
 *
 * The ONE place GA4 and the consent component are loaded for serendipitytechnology.com
 * (replaces the per-page hard-coded gtag snippets). Include it inside <head>, or let
 * partials/site-tracking.php include it on the ad-funnel pages. Idempotent: the constant
 * below stops a second include from double-loading.
 *
 * Standard: /docker/patterns/consent-tracking-disclosure.md (US opt-out model: disclose,
 * fire on load, real opt-out, honor Global Privacy Control). Load order matters: st-consent.js
 * MUST run before gtag('config') so a stored opt-out / GPC is applied before the tag starts.
 * Component source of truth: /srv/sites/_shared/components/st-consent.js (copy at assets/js/).
 * data-ads="true" because this site runs the Meta Pixel on the Upfront funnel pages.
 */
if (defined('SITE_ANALYTICS_LOADED')) { return; }
define('SITE_ANALYTICS_LOADED', true);
const ST_GA4_ID = 'G-G50KCN37LQ';
?>
<script src="/assets/js/st-consent.js?v=20261031" data-ga="<?= ST_GA4_ID ?>" data-ads="true" data-privacy="/privacy-policy#cookies"></script>
<!-- Google Analytics 4 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= ST_GA4_ID ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?= ST_GA4_ID ?>');
</script>
