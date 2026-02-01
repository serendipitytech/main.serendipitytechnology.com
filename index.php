<?php
require_once __DIR__ . '/projects.php';
$featuredProjects = getFeaturedProjects();
$gridProjects = getGridProjects();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Serendipity Technology | Custom App Solutions & Workflow Automation</title>
  <meta name="description" content="Custom software solutions that streamline operations through purpose-built workflows, data integration, and automated reporting. Transform your business processes today." />
  <link rel="canonical" href="https://serendipitytechnology.com/main/" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="img/logos/serendipity_icon_150.png" />
  <link rel="apple-touch-icon" href="img/logos/serendipity_icon_500.png" />

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://serendipitytechnology.com/main/" />
  <meta property="og:title" content="Serendipity Technology | Custom App Solutions & Workflow Automation" />
  <meta property="og:description" content="Custom software solutions that streamline operations through purpose-built workflows, data integration, and automated reporting." />
  <meta property="og:image" content="https://serendipitytechnology.com/main/img/logos/serendipity_icon_500.png" />
  <meta property="og:site_name" content="Serendipity Technology" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:title" content="Serendipity Technology | Custom App Solutions" />
  <meta name="twitter:description" content="Custom software solutions with purpose-built workflows, data integration, and automated reporting." />
  <meta name="twitter:image" content="https://serendipitytechnology.com/main/img/logos/serendipity_icon_500.png" />

  <!-- Schema.org Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Serendipity Technology",
    "url": "https://serendipitytechnology.com",
    "logo": "https://serendipitytechnology.com/main/img/logos/serendipity_icon_500.png",
    "description": "Custom software solutions that streamline operations through purpose-built workflows, data integration, and automated reporting.",
    "founder": {
      "@type": "Person",
      "name": "Troy Shimkus"
    },
    "contactPoint": {
      "@type": "ContactPoint",
      "telephone": "+1-407-545-6070",
      "contactType": "customer service",
      "email": "troy@serendipitytech.net"
    },
    "sameAs": []
  }
  </script>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "Serendipity Technology",
    "image": "https://serendipitytechnology.com/main/img/logos/serendipity_icon_500.png",
    "url": "https://serendipitytechnology.com",
    "telephone": "+1-407-545-6070",
    "email": "troy@serendipitytech.net",
    "priceRange": "$$",
    "description": "Custom software solutions that streamline operations through purpose-built workflows, data integration, and automated reporting.",
    "serviceType": ["Custom Software Development", "Workflow Automation", "Data Integration", "Business Process Automation"]
  }
  </script>

  <!-- Your custom styles -->
  <link rel="stylesheet" href="css/concierge_style.css">

  <!-- AOS animations -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

  <!-- ✅ Correct Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Cloudflare Turnstile CAPTCHA -->
  <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      AOS.init({
        once: true,
        duration: 800
      });
    });
  </script>
</head>
<body>
<nav id="scrollNav">
  <div class="scroll-nav-inner">
    <img src="img/logo_sm.png" alt="Logo" class="scroll-logo" />
    <span class="scroll-title">Custom App Solutions</span>
    <button class="scroll-chat-btn" onclick="openModal()" aria-label="Open Chat">
      <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 12.5C21 14.9853 18.9853 17 16.5 17H13L7.5 21V17H6.5C4.01472 17 2 14.9853 2 12.5V8.5C2 6.01472 4.01472 4 6.5 4H16.5C18.9853 4 21 6.01472 21 8.5V12.5Z" />
      </svg>
    </button>
  </div>
</nav>

<div id="header-sentinel"></div>
<header id="mainHeader">
  <div class="header-overlay">
    <img src="img/logo.png" alt="Serendipity Technology Logo" class="mx-auto mb-4" style="width: 300px;" />
    <h1 class="text-4xl font-bold mt-6 mb-2 text-white">Custom App Solutions</h1>
    <p class="text-lg mb-6 text-white">Solving pain points with creativity and tech built just for you.</p>
<button onclick="openModal()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
  Let's Talk
</button>
  </div>
</header>

<!-- Contact Modal -->
<div id="contactModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full relative">
    <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
      &times;
    </button>
    <h2 class="text-xl font-semibold mb-4">Contact Us</h2>
    <form id="contactForm" class="space-y-4">
      <label class="block">
        <span class="text-gray-700 font-medium">Name</span>
        <input type="text" name="name" required
          class="mt-1 w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50
          focus:bg-white focus:border-[#4FC4F0] focus:ring-2 focus:ring-[#4FC4F0]/20
          outline-none transition-all duration-200" />
      </label>
      <label class="block">
        <span class="text-gray-700 font-medium">Email</span>
        <input type="email" name="email" id="email"
          class="mt-1 w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50
          focus:bg-white focus:border-[#4FC4F0] focus:ring-2 focus:ring-[#4FC4F0]/20
          outline-none transition-all duration-200" />
        <span id="emailError" class="text-red-500 text-sm mt-1 hidden"></span>
      </label>
      <label class="block">
        <span class="text-gray-700 font-medium">Phone</span>
        <input type="tel" name="phone" id="phone" required
          maxlength="14"
          inputmode="numeric"
          placeholder="(555) 555-5555"
          class="mt-1 w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50
          focus:bg-white focus:border-[#4FC4F0] focus:ring-2 focus:ring-[#4FC4F0]/20
          outline-none transition-all duration-200" />
        <span id="phoneError" class="text-red-500 text-sm mt-1 hidden"></span>
      </label>
      <label class="block">
        <span class="text-gray-700 font-medium">What is your project?</span>
        <textarea name="need" required rows="3"
          class="mt-1 w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50
          focus:bg-white focus:border-[#4FC4F0] focus:ring-2 focus:ring-[#4FC4F0]/20
          outline-none transition-all duration-200 resize-none"></textarea>
      </label>
      <div>
        <span class="block text-gray-700 font-medium mb-2">Preferred Contact</span>
        <div class="flex gap-6">
          <label class="flex items-center gap-2 cursor-pointer group">
            <input type="radio" name="contact_method" value="email" checked
              class="w-4 h-4 accent-[#4FC4F0]">
            <span class="text-gray-600 group-hover:text-gray-900 transition-colors">Email</span>
          </label>
          <label class="flex items-center gap-2 cursor-pointer group">
            <input type="radio" name="contact_method" value="sms"
              class="w-4 h-4 accent-[#4FC4F0]">
            <span class="text-gray-600 group-hover:text-gray-900 transition-colors">Text</span>
          </label>
        </div>
      </div>
      <div class="cf-turnstile" data-sitekey="0x4AAAAAACWJ-_uz-IpGJG0B" data-theme="light"></div>
      <button type="submit"
        class="w-full py-3 px-4 rounded-lg font-semibold text-white
        bg-[#4FC4F0] hover:bg-[#3ab0dc]
        shadow-md hover:shadow-lg hover:-translate-y-0.5
        transition-all duration-200">
        Send Message
      </button>
    </form>
    <div id="formSuccess" class="text-green-600 mt-4 hidden">Thanks! Your message has been sent.</div>
  </div>
</div>
  <section>
    <h2 class="section-title">What We Do</h2>
    <div class="cards-row">
      <div class="card">
        <div class="img-frame"><img src="img/data_integration.svg" alt="Automation"></div>
        <h3>Automation</h3>
        <p>Streamline your processes and reduce manual tasks with purpose-built workflows tailored to your business.</p>
      </div>
      <div class="card">
        <div class="img-frame"><img src="img/integration.svg" alt="Integration"></div>
        <h3>Integration</h3>
        <p>Connect the tools you already use — from CRMs to spreadsheets — so your data works smarter, not harder.</p>
      </div>
      <div class="card">
        <div class="img-frame"><img src="img/insight.svg" alt="Insight"></div>
        <h3>Insight</h3>
        <p>Turn your information into actionable intelligence with simple dashboards and custom reporting tools.</p>
      </div>
    </div>
  </section>
  
<section class="projects-section">
  <h2 class="section-title" style="color: #F7B06A;">Recent Projects</h2>

  <!-- Featured Projects (dynamically rendered from /projects/*.md) -->
  <div class="featured-projects">
    <?php $delay = 0; foreach ($featuredProjects as $project): $meta = $project['meta']; ?>
    <a href="project.php?slug=<?= htmlspecialchars($meta['slug']) ?>" class="featured-card" data-aos="fade-up"<?= $delay ? " data-aos-delay=\"$delay\"" : '' ?>>
      <div class="featured-badge">Featured</div>
      <div class="featured-content">
        <div class="featured-icon">
          <img src="img/<?= htmlspecialchars($meta['icon'] ?? 'default.svg') ?>" alt="<?= htmlspecialchars($meta['title']) ?> icon" />
        </div>
        <div class="featured-text">
          <h3><?= htmlspecialchars($meta['title']) ?></h3>
          <p><?= htmlspecialchars($meta['summary'] ?? '') ?></p>
        </div>
      </div>
      <div class="featured-accent"></div>
    </a>
    <?php $delay += 100; endforeach; ?>
  </div>

  <!-- Project Grid (dynamically rendered from /projects/*.md) -->
  <div class="projects-grid" id="projectsGrid">
    <?php
    $delay = 150;
    $gridArray = array_values($gridProjects); // Re-index array
    $visibleCount = 3; // Show first 3, hide the rest
    foreach ($gridArray as $i => $project):
      $meta = $project['meta'];
      $hiddenClass = $i >= $visibleCount ? ' hidden-project' : '';
    ?>
    <a href="project.php?slug=<?= htmlspecialchars($meta['slug']) ?>" class="project-card<?= $hiddenClass ?>" data-aos="fade-up"<?= $i < $visibleCount ? " data-aos-delay=\"$delay\"" : '' ?>>
      <div class="project-icon">
        <img src="img/<?= htmlspecialchars($meta['icon'] ?? 'default.svg') ?>" alt="<?= htmlspecialchars($meta['title']) ?> icon" />
      </div>
      <div class="project-text">
        <h4><?= htmlspecialchars($meta['title']) ?></h4>
        <p><?= htmlspecialchars($meta['summary'] ?? '') ?></p>
      </div>
    </a>
    <?php $delay += 50; endforeach; ?>
  </div>

  <!-- View All Button (only show if there are hidden projects) -->
  <?php if (count($gridArray) > $visibleCount): ?>
  <div class="projects-toggle" data-aos="fade-up" data-aos-delay="300">
    <button id="toggleProjects" class="toggle-btn" onclick="toggleProjects()">
      <span class="toggle-text">View All Projects</span>
      <svg class="toggle-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="6 9 12 15 18 9"></polyline>
      </svg>
    </button>
  </div>
  <?php endif; ?>
</section>
<footer class="mt-10 text-center text-sm text-gray-600 py-4 bg-gray-100">
  &copy; 2025 Serendipity Technology &bull; Troy Shimkus &bull;
  <a href="mailto:troy@serendipitytech.net" class="text-blue-500 hover:underline">troy@serendipitytech.net</a>
  <span class="block mt-2 text-xs text-gray-400"><a href="media.html" class="hover:underline">Media Kit</a></span>
</footer>

<script>
function openModal() {
  document.getElementById("contactModal").classList.remove("hidden");
}

function closeModal() {
  document.getElementById("contactModal").classList.add("hidden");
  document.getElementById("formSuccess").classList.add("hidden");
  document.getElementById("contactForm").reset();
}

// Phone number formatting and validation
const phoneInput = document.getElementById('phone');
phoneInput.addEventListener('input', function(e) {
  // Strip non-digits
  let digits = e.target.value.replace(/\D/g, '');

  // Limit to 10 digits
  if (digits.length > 10) digits = digits.slice(0, 10);

  // Format as (XXX) XXX-XXXX
  let formatted = '';
  if (digits.length > 0) formatted = '(' + digits.slice(0, 3);
  if (digits.length >= 3) formatted += ') ' + digits.slice(3, 6);
  if (digits.length >= 6) formatted += '-' + digits.slice(6, 10);

  e.target.value = formatted;
  validatePhone();
});

function validatePhone() {
  const phone = document.getElementById('phone');
  const error = document.getElementById('phoneError');
  const digits = phone.value.replace(/\D/g, '');

  if (digits.length === 0) {
    error.textContent = 'Phone number is required';
    error.classList.remove('hidden');
    return false;
  } else if (digits.length < 10) {
    error.textContent = 'Please enter a complete 10-digit phone number';
    error.classList.remove('hidden');
    return false;
  }

  error.classList.add('hidden');
  return true;
}

// Email validation
function validateEmail() {
  const email = document.getElementById('email');
  const error = document.getElementById('emailError');
  const contactMethod = document.querySelector('input[name="contact_method"]:checked').value;

  // Email required if contact method is email
  if (contactMethod === 'email' && !email.value.trim()) {
    error.textContent = 'Email is required when choosing email contact';
    error.classList.remove('hidden');
    return false;
  }

  // Validate email format if provided
  if (email.value.trim()) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value)) {
      error.textContent = 'Please enter a valid email address';
      error.classList.remove('hidden');
      return false;
    }
  }

  error.classList.add('hidden');
  return true;
}

// Re-validate email when contact method changes
document.querySelectorAll('input[name="contact_method"]').forEach(radio => {
  radio.addEventListener('change', validateEmail);
});

document.getElementById('email').addEventListener('blur', validateEmail);

// Handle form submission with proper error handling
document.getElementById('contactForm').addEventListener('submit', async function(e) {
  e.preventDefault();

  // Validate before submitting
  const phoneValid = validatePhone();
  const emailValid = validateEmail();

  if (!phoneValid || !emailValid) {
    return;
  }

  const form = e.target;
  const submitBtn = form.querySelector('button[type="submit"]');
  const successMsg = document.getElementById('formSuccess');
  const errorMsg = document.getElementById('formError');

  // Disable button and show loading state
  const originalText = submitBtn.textContent;
  submitBtn.disabled = true;
  submitBtn.textContent = 'Sending...';

  // Hide any previous messages
  successMsg.classList.add('hidden');
  if (errorMsg) errorMsg.classList.add('hidden');

  try {
    // Create form data and convert phone to digits only for backend
    const formData = new FormData(form);
    const phoneDigits = document.getElementById('phone').value.replace(/\D/g, '');
    formData.set('phone', phoneDigits);

    const res = await fetch('contact_twilio.php', {
      method: 'POST',
      body: formData
    });

    const data = await res.json();

    if (res.ok && data.status === 'ok') {
      successMsg.classList.remove('hidden');
      setTimeout(() => closeModal(), 3000);
    } else {
      showFormError(data.message || 'Something went wrong. Please try again.');
    }
  } catch (err) {
    showFormError('Network error. Please check your connection and try again.');
  } finally {
    submitBtn.disabled = false;
    submitBtn.textContent = originalText;
  }
});

function showFormError(message) {
  let errorMsg = document.getElementById('formError');
  if (!errorMsg) {
    errorMsg = document.createElement('div');
    errorMsg.id = 'formError';
    errorMsg.className = 'text-red-600 mt-4';
    document.getElementById('formSuccess').after(errorMsg);
  }
  errorMsg.textContent = message;
  errorMsg.classList.remove('hidden');
}


  window.addEventListener("scroll", () => {
    const scrollNav = document.getElementById("scrollNav");
    if (window.scrollY > 100) {
      scrollNav.classList.add("visible");
    } else {
      scrollNav.classList.remove("visible");
    }
  });

// Projects toggle functionality
function toggleProjects() {
  const grid = document.getElementById('projectsGrid');
  const btn = document.getElementById('toggleProjects');
  const text = btn.querySelector('.toggle-text');
  const icon = btn.querySelector('.toggle-icon');

  grid.classList.toggle('expanded');

  if (grid.classList.contains('expanded')) {
    text.textContent = 'Show Less';
    icon.style.transform = 'rotate(180deg)';
    // Trigger AOS for newly visible cards
    AOS.refresh();
  } else {
    text.textContent = 'View All Projects';
    icon.style.transform = 'rotate(0deg)';
  }
}
</script>

</body>
</html>