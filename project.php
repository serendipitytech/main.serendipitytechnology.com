<?php
/**
 * Project Detail Page
 *
 * Displays a single project based on ?slug= parameter
 * Reads from /projects/{slug}.md
 */

require_once __DIR__ . '/projects.php';

// Get and validate slug
$slug = $_GET['slug'] ?? '';
$slug = preg_replace('/[^a-z0-9\-]/', '', strtolower($slug));

if (empty($slug)) {
    header('Location: index.php');
    exit;
}

// Load project
$project = getProjectBySlug($slug);

if (!$project || empty($project['meta']['title'])) {
    header('HTTP/1.0 404 Not Found');
    $pageTitle = 'Project Not Found';
    $notFound = true;
} else {
    $meta = $project['meta'];
    $content = $project['content'];
    $pageTitle = $meta['title'];
    $notFound = false;
}

// Get all projects for navigation
$allProjects = getAllProjects();
$currentIndex = null;
foreach ($allProjects as $i => $p) {
    if ($p['meta']['slug'] === $slug) {
        $currentIndex = $i;
        break;
    }
}
// Circular navigation - wrap around at ends
$totalProjects = count($allProjects);
$prevIndex = ($currentIndex - 1 + $totalProjects) % $totalProjects;
$nextIndex = ($currentIndex + 1) % $totalProjects;
$prevProject = $allProjects[$prevIndex];
$nextProject = $allProjects[$nextIndex];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-G50KCN37LQ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-G50KCN37LQ');
    </script>
    <title><?= htmlspecialchars($pageTitle) ?> | Serendipity Technology</title>
    <?php if (!$notFound): ?>
    <meta name="description" content="<?= htmlspecialchars($meta['summary'] ?? 'Custom software project by Serendipity Technology') ?> | Volusia County workflow automation specialists." />
    <meta name="geo.region" content="US-FL" />
    <meta name="geo.placename" content="Volusia County" />
    <link rel="canonical" href="https://serendipitytechnology.com/project.php?slug=<?= htmlspecialchars($slug) ?>" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="img/logos/serendipity_icon_150.png" />
    <link rel="apple-touch-icon" href="img/logos/serendipity_icon_500.png" />

    <!-- Critical CSS for Above-the-Fold Content -->
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap');
      :root{--color-primary:#4FC4F0;--color-accent:#F7B06A;--color-text:#1F2937;--font-body:'Roboto',-apple-system,BlinkMacSystemFont,sans-serif;--font-heading:"Gill Sans","Gill Sans MT",'Roboto',sans-serif;--header-height:60px}
      body{font-family:var(--font-body);font-weight:300;font-size:17px;margin:0;background:#fff;color:var(--color-text);line-height:1.7;-webkit-font-smoothing:antialiased}
      h1,h2,h3{font-family:var(--font-heading);font-weight:700;line-height:1.3;color:var(--color-text)}
      #scrollNav{position:fixed;top:0;left:0;right:0;display:flex;align-items:center;justify-content:space-between;background-color:rgba(255,255,255,.92);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);box-shadow:0 1px 0 rgba(0,0,0,.06);padding:.5rem 1rem;z-index:999;height:var(--header-height);box-sizing:border-box}
      .scroll-nav-inner{max-width:1000px;margin:0 auto;width:100%;display:flex;align-items:center;justify-content:space-between;padding:0 1rem;box-sizing:border-box}
      .scroll-logo{height:40px}.scroll-title{font-size:1.2rem;font-weight:700}
      .project-page{padding-top:var(--header-height)}
    </style>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://serendipitytechnology.com/project.php?slug=<?= htmlspecialchars($slug) ?>" />
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?> | Serendipity Technology" />
    <meta property="og:description" content="<?= htmlspecialchars($meta['summary'] ?? 'Custom software project by Serendipity Technology') ?>" />
    <meta property="og:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png" />
    <meta property="og:site_name" content="Serendipity Technology" />
    <meta property="og:locale" content="en_US" />
    <meta property="article:publisher" content="https://www.facebook.com/serendipitytech" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>" />
    <meta name="twitter:description" content="<?= htmlspecialchars($meta['summary'] ?? 'Custom software project') ?>" />
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
    <?php endif; ?>

    <link rel="stylesheet" href="css/concierge_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            AOS.init({ once: true, duration: 600 });
        });
    </script>
</head>
<body>

<!-- Reading Progress Bar -->
<div class="reading-progress" id="readingProgress"></div>

<!-- Sticky Nav (always visible on project pages) -->
<nav id="scrollNav" class="always-visible">
    <div class="scroll-nav-inner">
        <a href="index.php"><img src="img/logo_sm.png" alt="Logo" class="scroll-logo" /></a>
        <span class="scroll-title">Custom App Solutions</span>
        <a href="index.php" class="scroll-chat-btn" aria-label="Home">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
        </a>
    </div>
</nav>

<div class="project-page">
<?php if ($notFound): ?>
    <div class="not-found">
        <h1>Project Not Found</h1>
        <p>Sorry, we couldn't find the project you're looking for.</p>
        <a href="index.php" class="btn" style="display: inline-block; background: var(--color-primary); color: white; padding: 0.75rem 1.5rem; border-radius: 8px; text-decoration: none;">
            Back to Home
        </a>
    </div>
<?php else: ?>

    <!-- Hero Section -->
    <section class="project-hero" data-aos="fade-up">
        <div class="project-hero-inner">
            <a href="index.php#projectsGrid" class="back-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                All Projects
            </a>

            <div class="project-header <?= (!empty($meta['hero_image']) && file_exists(__DIR__ . '/img/' . $meta['hero_image'])) ? 'has-hero-image' : '' ?>">
                <div class="project-header-left">
                    <div class="project-icon-large">
                        <img src="img/<?= htmlspecialchars($meta['icon'] ?? 'default.svg') ?>" alt="<?= htmlspecialchars($meta['title']) ?> icon">
                    </div>
                    <div class="project-title-area">
                        <?php if (!empty($meta['featured'])): ?>
                            <span class="featured-badge-large">Featured</span>
                        <?php endif; ?>
                        <h1><?= htmlspecialchars($meta['title']) ?></h1>
                        <div class="project-meta-row">
                            <?php if (!empty($meta['tags'])): ?>
                                <div class="project-tags">
                                    <?php foreach ($meta['tags'] as $tag): ?>
                                        <span class="project-tag"><?= htmlspecialchars($tag) ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($meta['github'])): ?>
                                <a href="<?= htmlspecialchars($meta['github']) ?>" target="_blank" rel="noopener noreferrer" class="github-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                    </svg>
                                    View on GitHub
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php if (!empty($meta['hero_image']) && file_exists(__DIR__ . '/img/' . $meta['hero_image'])):
                    $heroOrientation = getImageOrientation(__DIR__ . '/img/' . $meta['hero_image']);
                    $thumbWidth = ($heroOrientation === 'portrait') ? 200 : 400;
                ?>
                <div class="project-hero-image <?= $heroOrientation ?>">
                    <img
                        src="thumbnail.php?src=<?= urlencode($meta['hero_image']) ?>&w=<?= $thumbWidth ?>"
                        alt="<?= htmlspecialchars($meta['title']) ?> screenshot"
                        class="hero-thumbnail"
                        data-full="img/<?= htmlspecialchars($meta['hero_image']) ?>"
                        onclick="openLightbox(this.dataset.full)"
                    >
                    <div class="hero-image-hint">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            <line x1="11" y1="8" x2="11" y2="14"></line>
                            <line x1="8" y1="11" x2="14" y2="11"></line>
                        </svg>
                        Enlarge
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Content -->
    <article class="project-content" data-aos="fade-up" data-aos-delay="100">
        <?php if (!empty($meta['summary'])): ?>
            <p class="project-summary"><?= htmlspecialchars($meta['summary']) ?></p>
        <?php endif; ?>

        <?php if (!empty($meta['images'])): ?>
            <div class="project-gallery">
                <?php foreach ($meta['images'] as $image): ?>
                    <?php if (file_exists(__DIR__ . '/img/' . $image)): ?>
                        <img
                            src="thumbnail.php?src=<?= urlencode($image) ?>&w=600"
                            data-full="img/<?= htmlspecialchars($image) ?>"
                            alt="Project screenshot"
                            onclick="openLightbox(this.dataset.full)"
                        >
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="project-body">
            <?= markdownToHtml($content) ?>
        </div>
    </article>

    <!-- Project Navigation -->
    <nav class="project-nav">
        <?php if ($prevProject): ?>
            <a href="project.php?slug=<?= htmlspecialchars($prevProject['meta']['slug']) ?>" class="project-nav-link prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                <div>
                    <div class="project-nav-label">Previous</div>
                    <div class="project-nav-title"><?= htmlspecialchars($prevProject['meta']['title']) ?></div>
                </div>
            </a>
        <?php endif; ?>

        <?php if ($nextProject): ?>
            <a href="project.php?slug=<?= htmlspecialchars($nextProject['meta']['slug']) ?>" class="project-nav-link next">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <div>
                    <div class="project-nav-label">Next</div>
                    <div class="project-nav-title"><?= htmlspecialchars($nextProject['meta']['title']) ?></div>
                </div>
            </a>
        <?php endif; ?>
    </nav>

<?php endif; ?>
</div>

<!-- Lightbox Modal -->
<div id="lightbox" class="lightbox" onclick="closeLightbox(event)">
    <button class="lightbox-close" onclick="closeLightbox(event)" aria-label="Close lightbox">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>
    <img id="lightbox-img" src="" alt="Enlarged screenshot">
</div>

<footer class="mt-10 text-center text-sm text-gray-600 py-4 bg-gray-100">
  <div>&copy; <?= date('Y') ?> Serendipity Technology &bull; Troy Shimkus &bull; Volusia County, FL</div>
  <div class="mt-2 flex items-center justify-center gap-4">
    <a href="tel:+14075456070" class="text-blue-500 hover:underline">(407) 545-6070</a>
    <span>&bull;</span>
    <a href="https://www.facebook.com/serendipitytech" target="_blank" rel="noopener" class="text-blue-500 hover:underline inline-flex items-center gap-1">
      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
      Facebook
    </a>
  </div>
</footer>

<script>
    // Reading progress bar
    function updateReadingProgress() {
        const article = document.querySelector('.project-content');
        if (!article) return;

        const articleTop = article.offsetTop;
        const articleHeight = article.offsetHeight;
        const windowHeight = window.innerHeight;
        const scrollTop = window.scrollY;

        // Calculate progress through the article
        const start = articleTop - windowHeight;
        const end = articleTop + articleHeight - windowHeight;
        const progress = Math.max(0, Math.min(1, (scrollTop - start) / (end - start)));

        document.getElementById('readingProgress').style.width = (progress * 100) + '%';
    }

    window.addEventListener('scroll', updateReadingProgress);
    window.addEventListener('resize', updateReadingProgress);
    updateReadingProgress();

    // Lightbox functions
    function openLightbox(src) {
        const lightbox = document.getElementById('lightbox');
        const img = document.getElementById('lightbox-img');
        img.src = src;
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox(event) {
        // Only close if clicking the backdrop or close button, not the image
        if (event.target.id === 'lightbox' || event.target.closest('.lightbox-close')) {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const lightbox = document.getElementById('lightbox');
            if (lightbox.classList.contains('active')) {
                lightbox.classList.remove('active');
                document.body.style.overflow = '';
            }
        }
    });
</script>

</body>
</html>
