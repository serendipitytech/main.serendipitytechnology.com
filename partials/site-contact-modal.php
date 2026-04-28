<?php
/**
 * Shared site contact modal — opens via openContactModal() from anywhere on the site
 *
 * Self-contained: includes its own CSS and JS, no Tailwind dependency.
 * Submits to /contact_twilio.php (the existing handler).
 *
 * Pages can call openContactModal() to open it. closeContactModal() closes it.
 *
 * If a page defines its own openContactModal() function with different fields
 * (e.g. service-specific signup), that takes precedence — this partial only
 * defines those functions if they don't exist yet.
 */
?>
<style>
  #siteContactModal {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.55);
    display: none;
    align-items: flex-start;
    justify-content: center;
    z-index: 10000;
    padding: 32px 16px;
    overflow-y: auto;
  }
  #siteContactModal.open { display: flex; }
  .site-modal-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 16px 48px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 480px;
    padding: 28px;
    position: relative;
    font-family: 'Roboto', -apple-system, BlinkMacSystemFont, sans-serif;
    color: #1F2937;
  }
  .site-modal-close {
    position: absolute;
    top: 12px;
    right: 12px;
    background: none;
    border: none;
    font-size: 24px;
    line-height: 1;
    color: #9ca3af;
    cursor: pointer;
    padding: 4px 8px;
    transition: color 0.15s ease;
  }
  .site-modal-close:hover { color: #1F2937; }
  .site-modal-title {
    font-size: 20px;
    font-weight: 700;
    margin: 0 0 6px 0;
    font-family: 'Gill Sans', 'Gill Sans MT', 'Roboto', sans-serif;
  }
  .site-modal-subtitle {
    font-size: 14px;
    color: #6b7280;
    margin: 0 0 20px 0;
  }
  .site-modal-form label {
    display: block;
    margin-bottom: 14px;
  }
  .site-modal-form label span.field-label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 4px;
  }
  .site-modal-form input,
  .site-modal-form textarea {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    background: #f9fafb;
    font-size: 14px;
    font-family: inherit;
    color: #1F2937;
    box-sizing: border-box;
    transition: border-color 0.15s ease, background 0.15s ease;
  }
  .site-modal-form input:focus,
  .site-modal-form textarea:focus {
    outline: none;
    background: #fff;
    border-color: #4FC4F0;
    box-shadow: 0 0 0 3px rgba(79, 196, 240, 0.15);
  }
  .site-modal-radios {
    display: flex;
    gap: 16px;
    margin-top: 4px;
  }
  .site-modal-radios label {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin: 0;
    font-size: 14px;
    color: #4b5563;
    cursor: pointer;
  }
  .site-modal-error {
    font-size: 12px;
    color: #ef4444;
    margin-top: 4px;
    display: none;
  }
  .site-modal-error.visible { display: block; }
  .site-modal-submit {
    width: 100%;
    padding: 12px;
    border: 0;
    border-radius: 8px;
    background: #4FC4F0;
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.15s ease;
    margin-top: 8px;
  }
  .site-modal-submit:hover { background: #2cb1e3; }
  .site-modal-submit:disabled { opacity: 0.6; cursor: not-allowed; }
  .site-modal-feedback {
    font-size: 14px;
    margin-top: 12px;
    padding: 10px 12px;
    border-radius: 8px;
    display: none;
  }
  .site-modal-feedback.success {
    display: block;
    background: rgba(16, 185, 129, 0.1);
    color: #047857;
    border: 1px solid rgba(16, 185, 129, 0.3);
  }
  .site-modal-feedback.error {
    display: block;
    background: rgba(239, 68, 68, 0.08);
    color: #b91c1c;
    border: 1px solid rgba(239, 68, 68, 0.3);
  }
</style>

<div id="siteContactModal" role="dialog" aria-modal="true" aria-labelledby="siteContactModalTitle">
  <div class="site-modal-card">
    <button type="button" class="site-modal-close" onclick="closeContactModal()" aria-label="Close">&times;</button>
    <h2 id="siteContactModalTitle" class="site-modal-title">Get in touch</h2>
    <p class="site-modal-subtitle">Tell us a little about your project and we'll respond within one business day.</p>
    <form id="siteContactForm" class="site-modal-form">
      <label>
        <span class="field-label">Name</span>
        <input type="text" name="name" required>
      </label>
      <label>
        <span class="field-label">Email</span>
        <input type="email" name="email" id="siteContactEmail">
        <span class="site-modal-error" id="siteContactEmailError"></span>
      </label>
      <label>
        <span class="field-label">Phone</span>
        <input type="tel" name="phone" id="siteContactPhone" maxlength="14" inputmode="numeric" placeholder="(555) 555-5555" required>
        <span class="site-modal-error" id="siteContactPhoneError"></span>
      </label>
      <label>
        <span class="field-label">What can we help with?</span>
        <textarea name="need" rows="3" required></textarea>
      </label>
      <div>
        <span class="field-label">Preferred Contact</span>
        <div class="site-modal-radios">
          <label><input type="radio" name="contact_method" value="email" checked> Email</label>
          <label><input type="radio" name="contact_method" value="sms"> Text</label>
        </div>
      </div>
      <div id="siteContactTurnstile" class="cf-turnstile" data-sitekey="0x4AAAAAACWJ-_uz-IpGJG0B" data-theme="light" style="margin-top:12px;"></div>
      <button type="submit" class="site-modal-submit">Send Message</button>
      <div id="siteContactFeedback" class="site-modal-feedback"></div>
    </form>
  </div>
</div>

<script>
  // Define openContactModal/closeContactModal only if they don't already exist
  // (so service pages with their own service-specific modals can override).
  if (typeof window.openContactModal !== 'function') {
    window.openContactModal = function() {
      document.getElementById('siteContactModal').classList.add('open');
      document.body.style.overflow = 'hidden';
    };
    window.closeContactModal = function() {
      var modal = document.getElementById('siteContactModal');
      modal.classList.remove('open');
      document.body.style.overflow = '';
      var feedback = document.getElementById('siteContactFeedback');
      feedback.className = 'site-modal-feedback';
      feedback.textContent = '';
      // Reset Turnstile so the next open gets a fresh challenge
      if (typeof turnstile !== 'undefined') {
        try { turnstile.reset('#siteContactTurnstile'); } catch (e) {}
      }
    };

    // Close on backdrop click
    document.getElementById('siteContactModal').addEventListener('click', function(e) {
      if (e.target === this) closeContactModal();
    });

    // Close on Escape
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && document.getElementById('siteContactModal').classList.contains('open')) {
        closeContactModal();
      }
    });

    // Phone formatting
    var siteContactPhone = document.getElementById('siteContactPhone');
    if (siteContactPhone) {
      siteContactPhone.addEventListener('input', function(e) {
        var v = e.target.value.replace(/\D/g, '').slice(0, 10);
        if (v.length > 6) v = '(' + v.slice(0,3) + ') ' + v.slice(3,6) + '-' + v.slice(6);
        else if (v.length > 3) v = '(' + v.slice(0,3) + ') ' + v.slice(3);
        else if (v.length > 0) v = '(' + v;
        e.target.value = v;
      });
    }

    // Form submission
    document.getElementById('siteContactForm').addEventListener('submit', async function(e) {
      e.preventDefault();
      var form = e.target;
      var btn = form.querySelector('button[type="submit"]');
      var feedback = document.getElementById('siteContactFeedback');
      var origText = btn.textContent;

      // Basic email validation if email is the chosen method
      var method = form.querySelector('input[name="contact_method"]:checked').value;
      var email = form.email.value.trim();
      if (method === 'email' && !email) {
        feedback.className = 'site-modal-feedback error';
        feedback.textContent = 'Email is required when Email is selected as the preferred contact method.';
        return;
      }

      btn.disabled = true;
      btn.textContent = 'Sending...';
      feedback.className = 'site-modal-feedback';

      try {
        var formData = new FormData(form);
        formData.set('phone', siteContactPhone.value.replace(/\D/g, ''));
        var res = await fetch('/contact_twilio.php', { method: 'POST', body: formData });
        var data = await res.json();
        if (res.ok && data.status === 'ok') {
          feedback.className = 'site-modal-feedback success';
          feedback.textContent = 'Thanks! Your message has been sent. We\'ll be in touch soon.';
          form.reset();
          setTimeout(closeContactModal, 3000);
        } else {
          feedback.className = 'site-modal-feedback error';
          feedback.textContent = data.message || 'Something went wrong. Please try again.';
        }
      } catch (err) {
        feedback.className = 'site-modal-feedback error';
        feedback.textContent = 'Network error. Please try again.';
      } finally {
        btn.disabled = false;
        btn.textContent = origText;
        // Reset Turnstile for next attempt
        if (typeof turnstile !== 'undefined') {
          try { turnstile.reset('#siteContactTurnstile'); } catch (e) {}
        }
      }
    });
  }
</script>
