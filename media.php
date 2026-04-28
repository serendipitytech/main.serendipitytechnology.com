<?php
/**
 * /media — Media Kit & Brand Assets
 * Converted from media.html to allow PHP partial includes.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-G50KCN37LQ"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-G50KCN37LQ');
  </script>
  <title>Media Kit & Brand Assets | Serendipity Technology Press Resources</title>
  <meta name="description" content="Download Serendipity Technology logos, brand colors, and press materials. Official brand assets for Volusia County's custom software development partner." />
  <meta name="geo.region" content="US-FL" />
  <meta name="geo.placename" content="Volusia County" />
  <link rel="canonical" href="https://serendipitytechnology.com/media.php" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="img/logos/serendipity_icon_150.png" />
  <link rel="apple-touch-icon" href="img/logos/serendipity_icon_500.png" />

  <!-- Critical CSS for Above-the-Fold Content -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap');
    :root{--color-primary:#4FC4F0;--color-accent:#F7B06A;--color-text:#1F2937;--font-body:'Roboto',-apple-system,BlinkMacSystemFont,sans-serif;--font-heading:"Gill Sans","Gill Sans MT",'Roboto',sans-serif;--header-height:60px}
    body{font-family:var(--font-body);font-weight:300;font-size:17px;margin:0;background:#fff;color:var(--color-text);line-height:1.7;-webkit-font-smoothing:antialiased}
    h1,h2,h3{font-family:var(--font-heading);font-weight:700;line-height:1.3;color:var(--color-text)}
    header{background:url('https://images.squarespace-cdn.com/content/v1/55fb8119e4b0ef39e06a4b61/1447475742063-8SAIPSFZVSKUR38AH18B/image-asset.jpeg?format=2500w') no-repeat center center/cover;padding:4rem 1rem;text-align:center;position:relative;color:#fff}
    .header-overlay{background:rgba(0,0,0,.6);padding:2rem;border-radius:12px;display:inline-block;max-width:90%;transition:transform .2s,box-shadow .2s}
    .header-overlay h1{color:#fff}
    /* scrollNav styles handled by site-header.php partial */
  </style>

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://serendipitytechnology.com/media.php" />
  <meta property="og:title" content="Media Kit & Brand Assets | Serendipity Technology" />
  <meta property="og:description" content="Download Serendipity Technology logos, brand colors, typography guidelines, and press materials." />
  <meta property="og:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png" />
  <meta property="og:site_name" content="Serendipity Technology" />
  <meta property="og:locale" content="en_US" />
  <meta property="article:publisher" content="https://www.facebook.com/serendipitytech" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:title" content="Media Kit | Serendipity Technology" />
  <meta name="twitter:description" content="Download official logos, brand colors, and press materials for Serendipity Technology." />
  <meta name="twitter:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png" />

  <!-- Schema.org LocalBusiness -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "Serendipity Technology",
    "url": "https://serendipitytechnology.com",
    "description": "Custom software solutions for workflow automation, data integration, and reporting. Serving Volusia County, FL and beyond.",
    "areaServed": {
      "@type": "Place",
      "name": "Volusia County, FL"
    },
    "telephone": "+1-407-545-6070",
    "email": "troy@serendipitytech.net",
    "image": "https://serendipitytechnology.com/img/logos/serendipity_icon_500.png",
    "sameAs": [
      "https://facebook.com/serendipitytech"
    ]
  }
  </script>

  <link rel="stylesheet" href="css/concierge_style.css">
  <link rel="stylesheet" href="css/media.css">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      AOS.init({
        once: true,
        duration: 800
      });
    });
  </script>
  <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
</head>
<body class="has-fixed-header">

<?php
$header_always_visible = false;
$header_chat_action = 'openContactModal()';
include __DIR__ . '/partials/site-header.php';
?>

  <div id="header-sentinel"></div>
  <header id="mainHeader" class="media-header">
    <div class="header-overlay">
      <img src="img/logo.png" alt="Serendipity Technology Logo" class="logo" />
      <h1>Media Kit</h1>
      <p class="tagline">Logos, brand assets, and company information for press use.</p>
    </div>
  </header>

  <nav class="section-nav" data-aos="fade-up">
    <a href="#about">About</a>
    <a href="#colors">Colors</a>
    <a href="#typography">Typography</a>
    <a href="#logos">Logos</a>
    <a href="#guidelines">Guidelines</a>
    <a href="#contact">Contact</a>
  </nav>

  <section id="about">
    <h2 class="section-title">About Serendipity Technology</h2>
    <div class="about-content" data-aos="fade-up">
      <p><strong>One-liner:</strong> Custom software development in Volusia County — workflow automation, data integration, and automated reporting for Florida businesses.</p>
      <div class="value-props">
        <div class="value-prop">
          <strong>Purpose-built workflows</strong> — business process automation specialists serving Central Florida.
        </div>
        <div class="value-prop">
          <strong>Integration-first approach</strong> — data integration for small businesses, nonprofits, and local government.
        </div>
        <div class="value-prop">
          <strong>No vendor lock-in</strong> — maintainable software solutions you can own, built by your service-area technology partner.
        </div>
      </div>
    </div>
    <a href="#" class="back-to-top">Back to top</a>
  </section>

  <section id="colors">
    <h2 class="section-title">Brand Colors</h2>
    <div class="color-palette" data-aos="fade-up">
      <div class="color-swatch">
        <div class="swatch" style="background-color: #4FC4F0;"></div>
        <div class="color-info">
          <span class="color-name">Primary Blue</span>
          <span class="color-hex">#4FC4F0</span>
          <span class="color-usage">Links, headers, icons</span>
        </div>
      </div>
      <div class="color-swatch">
        <div class="swatch" style="background-color: #F7B06A;"></div>
        <div class="color-info">
          <span class="color-name">Accent Orange</span>
          <span class="color-hex">#F7B06A</span>
          <span class="color-usage">Highlights, badges</span>
        </div>
      </div>
      <div class="color-swatch">
        <div class="swatch" style="background-color: #1F2937;"></div>
        <div class="color-info">
          <span class="color-name">Charcoal</span>
          <span class="color-hex">#1F2937</span>
          <span class="color-usage">Primary text</span>
        </div>
      </div>
      <div class="color-swatch">
        <div class="swatch" style="background-color: #475569;"></div>
        <div class="color-info">
          <span class="color-name">Slate</span>
          <span class="color-hex">#475569</span>
          <span class="color-usage">Secondary text</span>
        </div>
      </div>
      <div class="color-swatch">
        <div class="swatch" style="background-color: #E5E7EB; border: 1px solid #ccc;"></div>
        <div class="color-info">
          <span class="color-name">Light Gray</span>
          <span class="color-hex">#E5E7EB</span>
          <span class="color-usage">Dividers, backgrounds</span>
        </div>
      </div>
    </div>
    <a href="#" class="back-to-top">Back to top</a>
  </section>

  <section id="typography">
    <h2 class="section-title">Typography</h2>
    <div class="typography-info" data-aos="fade-up">
      <div class="font-sample">
        <span class="font-name">Gill Sans Bold</span>
        <span class="font-usage">Headlines and titles</span>
      </div>
      <div class="font-sample">
        <span class="font-name">Gill Sans Medium</span>
        <span class="font-usage">Subheads and emphasis</span>
      </div>
      <div class="font-sample">
        <span class="font-name">Roboto Light</span>
        <span class="font-usage">Body copy</span>
      </div>
    </div>
    <a href="#" class="back-to-top">Back to top</a>
  </section>

  <section id="logos">
    <h2 class="section-title">Logo Downloads</h2>
    <p class="section-intro">Right-click and "Save As" or click to download. Please maintain clear space around the logo equal to the height of the icon.</p>

    <h3 class="subsection-title">Main Logo (Primary)</h3>
    <div class="logo-grid" data-aos="fade-up">
      <div class="logo-card">
        <div class="logo-preview light-bg">
          <img src="img/logos/serendipity_main_300.png" alt="Main logo - PNG">
        </div>
        <div class="logo-details">
          <span class="logo-name">Main Logo</span>
          <span class="logo-format">PNG - 300px</span>
          <a href="img/logos/serendipity_main_300.png" download class="download-btn">Download</a>
        </div>
      </div>
      <div class="logo-card">
        <div class="logo-preview light-bg">
          <img src="img/logos/serendipity_main_vector.svg" alt="Main logo - SVG">
        </div>
        <div class="logo-details">
          <span class="logo-name">Main Logo</span>
          <span class="logo-format">SVG - Scalable</span>
          <a href="img/logos/serendipity_main_vector.svg" download class="download-btn">Download</a>
        </div>
      </div>
    </div>

    <h3 class="subsection-title">Stacked Logo</h3>
    <div class="logo-grid" data-aos="fade-up">
      <div class="logo-card">
        <div class="logo-preview light-bg">
          <img src="img/logos/serendipity_stacked_300.png" alt="Stacked logo - PNG">
        </div>
        <div class="logo-details">
          <span class="logo-name">Stacked Logo</span>
          <span class="logo-format">PNG - 300px</span>
          <a href="img/logos/serendipity_stacked_300.png" download class="download-btn">Download</a>
        </div>
      </div>
      <div class="logo-card">
        <div class="logo-preview light-bg">
          <img src="img/logos/serendipity_stacked_vector.svg" alt="Stacked logo - SVG">
        </div>
        <div class="logo-details">
          <span class="logo-name">Stacked Logo</span>
          <span class="logo-format">SVG - Scalable</span>
          <a href="img/logos/serendipity_stacked_vector.svg" download class="download-btn">Download</a>
        </div>
      </div>
    </div>

    <h3 class="subsection-title">Horizontal Logo</h3>
    <div class="logo-grid" data-aos="fade-up">
      <div class="logo-card">
        <div class="logo-preview light-bg">
          <img src="img/logos/serendipity_horrizontal_sm.png" alt="Horizontal logo - small PNG">
        </div>
        <div class="logo-details">
          <span class="logo-name">Horizontal Logo</span>
          <span class="logo-format">PNG - Small</span>
          <a href="img/logos/serendipity_horrizontal_sm.png" download class="download-btn">Download</a>
        </div>
      </div>
      <div class="logo-card">
        <div class="logo-preview light-bg">
          <img src="img/logos/serendipity_horrizontal.svg" alt="Horizontal logo - SVG">
        </div>
        <div class="logo-details">
          <span class="logo-name">Horizontal Logo</span>
          <span class="logo-format">SVG - Scalable</span>
          <a href="img/logos/serendipity_horrizontal.svg" download class="download-btn">Download</a>
        </div>
      </div>
    </div>

    <h3 class="subsection-title">Icon</h3>
    <div class="logo-grid" data-aos="fade-up">
      <div class="logo-card">
        <div class="logo-preview light-bg">
          <img src="img/logos/serendipity_icon_150.png" alt="Icon - 150px PNG">
        </div>
        <div class="logo-details">
          <span class="logo-name">Icon</span>
          <span class="logo-format">PNG - 150px</span>
          <a href="img/logos/serendipity_icon_150.png" download class="download-btn">Download</a>
        </div>
      </div>
      <div class="logo-card">
        <div class="logo-preview light-bg">
          <img src="img/logos/serendipity_icon_500.png" alt="Icon - 500px PNG">
        </div>
        <div class="logo-details">
          <span class="logo-name">Icon</span>
          <span class="logo-format">PNG - 500px</span>
          <a href="img/logos/serendipity_icon_500.png" download class="download-btn">Download</a>
        </div>
      </div>
      <div class="logo-card">
        <div class="logo-preview light-bg">
          <img src="img/logos/serendipity_icon_vector.svg" alt="Icon - SVG">
        </div>
        <div class="logo-details">
          <span class="logo-name">Icon</span>
          <span class="logo-format">SVG - Scalable</span>
          <a href="img/logos/serendipity_icon_vector.svg" download class="download-btn">Download</a>
        </div>
      </div>
    </div>
    <a href="#" class="back-to-top">Back to top</a>
  </section>

  <section id="guidelines">
    <h2 class="section-title">Brand Guidelines</h2>
    <div class="guidelines-content" data-aos="fade-up">
      <div class="guideline-card">
        <h3>Logo Usage</h3>
        <ul>
          <li>Place full-color logo on white or very light backgrounds</li>
          <li>Use white logo on dark backgrounds with solid overlay</li>
          <li>Minimum size: 120px wide (digital) / 1.25in wide (print)</li>
          <li>Maintain clear space equal to icon height on all sides</li>
        </ul>
      </div>
      <div class="guideline-card">
        <h3>Do Not</h3>
        <ul>
          <li>Stretch or distort the logo</li>
          <li>Recolor or modify the logo colors</li>
          <li>Add shadows, outlines, or effects</li>
          <li>Place on busy backgrounds without a solid overlay</li>
        </ul>
      </div>
      <div class="guideline-card full-width">
        <h3>Full Brand Guide</h3>
        <p>Download our complete brand guidelines PDF for detailed specifications on typography, color usage, and formatting rules.</p>
        <a href="img/logos/BrandingGuide.pdf" download class="download-btn large">Download Brand Guide (PDF)</a>
      </div>
    </div>
    <a href="#" class="back-to-top">Back to top</a>
  </section>

  <section id="contact">
    <h2 class="section-title">Contact</h2>
    <div class="contact-info" data-aos="fade-up">
      <p><strong>Website:</strong> <a href="https://serendipitytechnology.com">serendipitytechnology.com</a></p>
      <p><strong>Phone:</strong> <a href="tel:+14075456070">(407) 545-6070</a></p>
      <p><strong>Location:</strong> Volusia County, FL</p>
      <p><strong>Facebook:</strong> <a href="https://www.facebook.com/serendipitytech" target="_blank" rel="noopener">facebook.com/serendipitytech</a></p>
    </div>
    <a href="#" class="back-to-top">Back to top</a>
  </section>

<?php include __DIR__ . '/partials/site-footer.php'; ?>
<?php include __DIR__ . '/partials/site-contact-modal.php'; ?>

</body>
</html>
