/**
 * Serendipity Technology - Site Manager cookie notice + opt-out (US opt-out model)
 * CANONICAL SOURCE: /srv/sites/_shared/components/st-consent.js
 * Copy into each site as assets/js/st-consent.js (sites are static, no shared serving).
 * Sync script: /docker/site-manager/scripts/sync-st-consent.sh
 * Pattern doc:  /docker/patterns/consent-tracking-disclosure.md
 *
 * Model: DISCLOSE + OPT OUT (CCPA/CPRA style). Tags fire on load; nothing is gated.
 *   - Consent Mode default is GRANTED so analytics/ads run normally.
 *   - A visitor who clicks "Opt out", or whose browser sends Global Privacy Control
 *     (navigator.globalPrivacyControl === true), gets consent UPDATED to denied
 *     BEFORE the site's gtag config runs (this file must load first in <head>, sync).
 *   - GPC denies ad_storage / ad_user_data / ad_personalization (analytics keeps flowing).
 *   - Explicit Opt out also denies analytics_storage, sets ga-disable-<ID>, and clears
 *     existing Google analytics/ads cookies.
 *   - The notice is a small non-blocking bar. It only renders when a Google tag is on the
 *     page (so a tag-less build never claims to use cookies). It never traps focus.
 *
 * Load order in <head> (this MUST precede the gtag config calls):
 *   <script src="/assets/js/st-consent.js?v=20261021" data-ga="G-XXXX" [data-ads="true"] [data-health="true"]></script>
 *   <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXX"></script>
 *   <script> ...gtag('js', new Date()); gtag('config','G-XXXX');
 *            // Ad tag (only on sites that run one):
 *            if (window.stConsent && stConsent.adsAllowed()) { gtag('config','AW-XXXX'); }
 *   </script>
 *
 * Script-tag options (all optional):
 *   data-ga        comma list of GA4 measurement IDs (needed so explicit opt-out can set ga-disable)
 *   data-ads       "true" if the site runs an ad/remarketing tag -> wording says "analytics and advertising"
 *   data-health    "true" on health-adjacent sites -> ad tags are FORCED off (adsAllowed() is always false)
 *   data-privacy   privacy policy URL (default /privacy-policy.html)
 *   data-bg / data-fg / data-accent / data-accent-fg   brand colours for the bar (must keep AA contrast)
 *   data-force     "true" to render the bar even if no Google tag is detected
 *
 * Privacy-page controls (optional): any <button data-st-consent-toggle> flips opt-out / opt-in
 * and its text is managed here; any [data-st-consent-status] receives a plain-language status line.
 *
 * Stored choice: first-party localStorage + cookie "st_consent" ("out" | "in"), 1 year.
 * "st_consent_seen" records that the bar was dismissed. Both are strictly-necessary
 * preference storage (they only remember the visitor's choice).
 */
(function () {
  "use strict";
  if (window.stConsent) return;

  var script = document.currentScript || (function () {
    var s = document.getElementsByTagName("script");
    for (var i = s.length - 1; i >= 0; i--) if (/st-consent(\.min)?\.js/.test(s[i].src)) return s[i];
    return null;
  })();
  function attr(name, dflt) {
    var v = script && script.getAttribute("data-" + name);
    return v === null || v === undefined || v === "" ? dflt : v;
  }
  var CFG = {
    ads: attr("ads", "") === "true",
    health: attr("health", "") === "true",
    privacy: attr("privacy", "/privacy-policy.html"),
    ga: (attr("ga", "") || "").split(",").map(function (x) { return x.replace(/\s+/g, ""); }).filter(Boolean),
    force: attr("force", "") === "true",
    bg: attr("bg", ""), fg: attr("fg", ""), accent: attr("accent", ""), accentFg: attr("accent-fg", "")
  };
  // Health-adjacent sites never run advertising tags, regardless of other flags.
  if (CFG.health) CFG.ads = false;

  var KEY = "st_consent", SEEN = "st_consent_seen", ONE_YEAR = 31536000;

  // ---------- storage (localStorage first, cookie fallback) ----------
  function readCookie(name) {
    var m = document.cookie.match(new RegExp("(?:^|; )" + name + "=([^;]*)"));
    return m ? decodeURIComponent(m[1]) : "";
  }
  function writeCookie(name, val) {
    try {
      document.cookie = name + "=" + encodeURIComponent(val) + "; Max-Age=" + ONE_YEAR +
        "; Path=/; SameSite=Lax" + (location.protocol === "https:" ? "; Secure" : "");
    } catch (e) {}
  }
  function read(name) {
    var v = "";
    try { v = window.localStorage.getItem(name) || ""; } catch (e) {}
    return v || readCookie(name);
  }
  function write(name, val) {
    try { window.localStorage.setItem(name, val); } catch (e) {}
    writeCookie(name, val);
  }

  // ---------- state ----------
  var gpc = false;
  try { gpc = navigator.globalPrivacyControl === true; } catch (e) {}
  var choice = read(KEY); // "out" | "in" | ""
  if (choice !== "out" && choice !== "in") choice = "";

  function adsDenied() { return CFG.health || gpc || choice === "out"; }
  function analyticsDenied() { return choice === "out"; }

  // ---------- gtag / Consent Mode ----------
  window.dataLayer = window.dataLayer || [];
  function gtag() { window.dataLayer.push(arguments); }
  if (typeof window.gtag !== "function") window.gtag = gtag;

  var GRANTED = { ad_storage: "granted", ad_user_data: "granted", ad_personalization: "granted", analytics_storage: "granted" };
  var ADS_DENIED = { ad_storage: "denied", ad_user_data: "denied", ad_personalization: "denied" };

  function setGaDisable(on) {
    var ids = CFG.ga.slice();
    var tags = document.querySelectorAll('script[src*="googletagmanager.com/gtag/js"]');
    for (var i = 0; i < tags.length; i++) {
      var m = /[?&]id=([^&]+)/.exec(tags[i].getAttribute("src") || "");
      if (m && /^G-/i.test(m[1]) && ids.indexOf(m[1]) === -1) ids.push(m[1]);
    }
    for (var j = 0; j < ids.length; j++) window["ga-disable-" + ids[j]] = !!on;
  }

  // ---------- cookie clearing ----------
  var ANALYTICS_COOKIES = /^(_ga|_ga_[A-Za-z0-9]+|_gid|_gat.*)$/;
  var AD_COOKIES = /^(_gcl_.+|_gac_.+|__gads|__gpi|IDE|test_cookie)$/;
  function expire(name) {
    var host = location.hostname, parts = host.split("."), domains = [""];
    for (var i = 0; i < parts.length - 1; i++) domains.push("; Domain=" + parts.slice(i).join("."));
    for (var d = 0; d < domains.length; d++) {
      document.cookie = name + "=; Max-Age=0; Path=/; Expires=Thu, 01 Jan 1970 00:00:00 GMT" + domains[d];
    }
  }
  function clearCookies(includeAnalytics) {
    var all = document.cookie ? document.cookie.split("; ") : [];
    for (var i = 0; i < all.length; i++) {
      var n = all[i].split("=")[0];
      if (AD_COOKIES.test(n) || (includeAnalytics && ANALYTICS_COOKIES.test(n))) expire(n);
    }
  }

  // Apply current state to Google tags. Runs at load (before tags init) and on every change.
  function apply() {
    if (adsDenied()) {
      window.gtag("consent", "update", ADS_DENIED);
      clearCookies(false);
    }
    if (analyticsDenied()) {
      window.gtag("consent", "update", { analytics_storage: "denied" });
      setGaDisable(true);
      clearCookies(true);
    }
  }

  window.gtag("consent", "default", GRANTED);
  apply();

  // ---------- public API ----------
  var listeners = [];
  function notify() { for (var i = 0; i < listeners.length; i++) try { listeners[i](); } catch (e) {} }

  function optOut() {
    choice = "out"; write(KEY, "out"); write(SEEN, "1");
    apply(); notify();
  }
  function optIn() {
    choice = "in"; write(KEY, "in");
    setGaDisable(false);
    var next = { analytics_storage: "granted" };
    if (!adsDenied()) { next.ad_storage = "granted"; next.ad_user_data = "granted"; next.ad_personalization = "granted"; }
    window.gtag("consent", "update", next);
    apply(); notify();
  }

  window.stConsent = {
    adsAllowed: function () { return !adsDenied(); },
    analyticsAllowed: function () { return !analyticsDenied(); },
    state: function () { return { choice: choice, gpc: gpc, ads: CFG.ads, health: CFG.health, adsDenied: adsDenied(), analyticsDenied: analyticsDenied() }; },
    optOut: optOut,
    optIn: optIn,
    open: function () { show(true); },
    onChange: function (fn) { listeners.push(fn); }
  };

  // ---------- UI ----------
  var CSS =
    "#st-consent{position:fixed;left:16px;right:16px;bottom:16px;z-index:2147483000;display:flex;justify-content:flex-start;pointer-events:none;" +
    "font-family:var(--st-font,inherit);font-size:15px;line-height:1.5;letter-spacing:normal;text-transform:none;text-align:left}" +
    "#st-consent *{box-sizing:border-box}" +
    "#st-consent .st-card{pointer-events:auto;display:flex;flex-wrap:wrap;align-items:center;gap:12px 16px;max-width:640px;width:100%;" +
    "padding:14px 16px;border-radius:8px;background:var(--st-bg,#1F2328);color:var(--st-fg,#F5F7FA);" +
    "box-shadow:0 4px 16px rgba(0,0,0,.28),0 0 0 1px rgba(255,255,255,.12)}" +
    "#st-consent .st-msg{flex:1 1 260px;margin:0;padding:0;color:inherit;font:inherit;outline:none}" +
    "#st-consent .st-msg a{color:var(--st-accent,#9AD9F7);text-decoration:underline;text-underline-offset:2px;font:inherit;font-weight:600}" +
    "#st-consent .st-actions{display:flex;gap:8px;flex:0 0 auto}" +
    "#st-consent .st-btn{appearance:none;-webkit-appearance:none;margin:0;min-height:44px;min-width:44px;padding:10px 16px;border-radius:6px;" +
    "font:inherit;font-weight:600;line-height:1.2;letter-spacing:normal;text-transform:none;text-decoration:none;cursor:pointer;" +
    "border:2px solid var(--st-fg,#F5F7FA);background:transparent;color:var(--st-fg,#F5F7FA);box-shadow:none}" +
    "#st-consent .st-btn:hover{background:rgba(255,255,255,.12)}" +
    "#st-consent a:focus-visible,#st-consent .st-btn:focus-visible{outline:3px solid var(--st-accent,#9AD9F7);outline-offset:2px}" +
    "@media (max-width:640px){#st-consent{left:8px;right:8px;bottom:calc(8px + env(safe-area-inset-bottom,0px))}" +
    "#st-consent .st-card{padding:12px}#st-consent .st-actions{flex:1 1 100%}#st-consent .st-btn{flex:1 1 0}}" +
    "@media (prefers-reduced-motion:no-preference){#st-consent .st-card{animation:st-consent-in .2s ease-out}}" +
    "@keyframes st-consent-in{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:none}}" +
    "@media print{#st-consent{display:none!important}}";

  var root = null, msgEl = null, actionsEl = null, readyDone = false;

  function wording() {
    return CFG.ads ? "analytics and advertising" : "analytics";
  }
  function el(tag, cls, text) {
    var n = document.createElement(tag);
    if (cls) n.className = cls;
    if (text) n.textContent = text;
    return n;
  }
  function btn(label, cls, onClick, aria) {
    var b = el("button", "st-btn" + (cls ? " " + cls : ""), label);
    b.type = "button";
    if (aria) b.setAttribute("aria-label", aria);
    b.addEventListener("click", onClick);
    return b;
  }
  function hasGoogleTag() {
    return !!document.querySelector('script[src*="googletagmanager.com/gtag/js"],script[src*="googletagmanager.com/gtm.js"]');
  }
  function reserveSpace() {
    if (!root || !document.body) return;
    var h = root.getBoundingClientRect().height + 16;
    document.body.style.setProperty("padding-bottom", "calc(" + (document.body.getAttribute("data-st-pb") || "0px") + " + " + Math.ceil(h) + "px)", "important");
  }
  function releaseSpace() {
    if (document.body) document.body.style.removeProperty("padding-bottom");
  }
  function hide() {
    if (root && root.parentNode) root.parentNode.removeChild(root);
    root = null; releaseSpace();
    write(SEEN, "1");
  }

  function renderNotice() {
    msgEl.textContent = "";
    actionsEl.textContent = "";
    msgEl.appendChild(document.createTextNode("We use cookies for " + wording() + ". See our "));
    var a = el("a", "", "Privacy Policy");
    a.href = CFG.privacy;
    msgEl.appendChild(a);
    msgEl.appendChild(document.createTextNode("."));
    if (CFG.ads && gpc) {
      msgEl.appendChild(document.createTextNode(" Your browser's Global Privacy Control signal is on, so advertising cookies are off."));
    }
    actionsEl.appendChild(btn("Opt out", "", function () { optOut(); renderOptedOut(true); reserveSpace(); }));
    actionsEl.appendChild(btn("Got it", "st-btn-eq", hide, "Dismiss cookie notice"));
  }
  function renderOptedOut(focus) {
    msgEl.textContent = "";
    actionsEl.textContent = "";
    msgEl.appendChild(document.createTextNode("You have opted out of " + wording() + " cookies. We will remember this on this browser."));
    actionsEl.appendChild(btn("Undo", "", function () { optIn(); renderNotice(); reserveSpace(); msgEl.focus(); }));
    actionsEl.appendChild(btn("Close", "st-btn-eq", hide, "Close cookie notice"));
    if (focus) msgEl.focus();
  }

  function show(force) {
    if (root) return;
    if (!document.body) return;
    if (!document.getElementById("st-consent-css")) {
      var st = document.createElement("style");
      st.id = "st-consent-css"; st.textContent = CSS;
      document.head.appendChild(st);
    }
    root = el("div"); root.id = "st-consent";
    root.setAttribute("role", "region");
    root.setAttribute("aria-label", "Cookie notice");
    if (CFG.bg) root.style.setProperty("--st-bg", CFG.bg);
    if (CFG.fg) root.style.setProperty("--st-fg", CFG.fg);
    if (CFG.accent) root.style.setProperty("--st-accent", CFG.accent);
    if (CFG.accentFg) root.style.setProperty("--st-accent-fg", CFG.accentFg);
    var card = el("div", "st-card");
    msgEl = el("p", "st-msg"); msgEl.tabIndex = -1;
    msgEl.setAttribute("aria-live", "polite");
    actionsEl = el("div", "st-actions");
    card.appendChild(msgEl); card.appendChild(actionsEl);
    root.appendChild(card);
    document.body.appendChild(root);
    if (choice === "out") renderOptedOut(false); else renderNotice();
    reserveSpace();
    window.addEventListener("resize", reserveSpace);
    void force;
  }

  // ---------- privacy-page controls ----------
  function statusText() {
    var parts = [];
    if (choice === "out") parts.push("You have opted out of " + (CFG.ads ? "analytics and advertising" : "analytics") + " cookies on this browser.");
    else if (CFG.ads && gpc) parts.push("Advertising cookies are off because your browser sends Global Privacy Control. Analytics cookies are on.");
    else parts.push((CFG.ads ? "Analytics and advertising" : "Analytics") + " cookies are on for this browser.");
    return parts.join(" ");
  }
  function syncControls() {
    var t = document.querySelectorAll("[data-st-consent-toggle]");
    for (var i = 0; i < t.length; i++) {
      t[i].textContent = choice === "out" ? "Opt back in to cookies" : "Opt out of " + wording() + " cookies";
      t[i].setAttribute("aria-pressed", choice === "out" ? "true" : "false");
    }
    var s = document.querySelectorAll("[data-st-consent-status]");
    for (var j = 0; j < s.length; j++) {
      s[j].textContent = statusText();
      s[j].setAttribute("aria-live", "polite");
    }
  }
  var CONTROL_CSS =
    ".st-consent-toggle{appearance:none;-webkit-appearance:none;margin:0;min-height:44px;padding:10px 16px;border-radius:6px;" +
    "font:inherit;font-weight:600;line-height:1.2;letter-spacing:normal;text-transform:none;color:inherit;background:transparent;" +
    "border:2px solid currentColor;cursor:pointer}" +
    ".st-consent-toggle:hover{background:rgba(127,127,127,.15)}" +
    ".st-consent-toggle:focus-visible{outline:3px solid currentColor;outline-offset:2px}" +
    // Section anchor clears sticky headers; :where() = zero specificity so a site's own rules always win.
    "#cookies{scroll-margin-top:96px}" +
    ":where(#cookies) :where(h2,h3){margin-top:1.5em;margin-bottom:.5em}" +
    ":where(#cookies) :where(p,ul){margin-top:0;margin-bottom:1em}";
  function bindControls() {
    var t = document.querySelectorAll("[data-st-consent-toggle]");
    if (t.length && !document.getElementById("st-consent-ctl-css")) {
      var cs = document.createElement("style");
      cs.id = "st-consent-ctl-css"; cs.textContent = CONTROL_CSS;
      document.head.appendChild(cs);
    }
    for (var i = 0; i < t.length; i++) {
      t[i].addEventListener("click", function () { if (choice === "out") optIn(); else optOut(); });
    }
    var o = document.querySelectorAll("[data-st-consent-open]");
    for (var k = 0; k < o.length; k++) {
      o[k].addEventListener("click", function (e) { e.preventDefault(); show(true); });
    }
    listeners.push(syncControls);
    syncControls();
  }

  function ready() {
    if (readyDone) return; readyDone = true;
    if (document.body && !document.body.getAttribute("data-st-pb")) {
      document.body.setAttribute("data-st-pb", window.getComputedStyle(document.body).paddingBottom || "0px");
    }
    bindControls();
    var seen = read(SEEN) === "1";
    if ((CFG.force || hasGoogleTag()) && !seen) show(false);
  }
  if (document.readyState === "loading") document.addEventListener("DOMContentLoaded", ready);
  else ready();
})();
