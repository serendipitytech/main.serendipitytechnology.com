<?php
/**
 * /how-we-work — AI-Directed Engineering explainer page
 * Serendipity Technology
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>How We Work | AI-Directed Engineering — Serendipity Technology</title>
  <meta name="description" content="One architect. AI-directed execution. Agency-scale results for small organizations in Central Florida — without the agency overhead.">
  <link rel="canonical" href="https://serendipitytechnology.com/how-we-work">
  <link rel="icon" href="/img/logos/serendipity_icon_150.png">

  <!-- Open Graph -->
  <meta property="og:title" content="How We Work — Serendipity Technology">
  <meta property="og:description" content="One architect. AI-directed execution. Agency-scale results for small organizations in Central Florida.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://serendipitytechnology.com/how-we-work">
  <meta property="og:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png">

  <!-- Fonts & Tailwind -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- AOS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

  <style>
    :root {
      --primary: #4FC4F0;
      --accent:  #F7B06A;
      --text:    #1F2937;
      --muted:   #475569;
      --bg-alt:  #f4f4f5;
      --font-body: 'Roboto', -apple-system, BlinkMacSystemFont, sans-serif;
      --font-heading: "Gill Sans", "Gill Sans MT", 'Roboto', sans-serif;
    }

    *, *::before, *::after { box-sizing: border-box; }

    body {
      font-family: var(--font-body);
      font-weight: 300;
      font-size: 16px;
      line-height: 1.7;
      color: var(--text);
      background: #fff;
      margin: 0;
      -webkit-font-smoothing: antialiased;
    }

    h1, h2, h3, h4 {
      font-family: var(--font-heading);
      font-weight: 700;
      line-height: 1.3;
      color: var(--text);
    }

    a { color: var(--primary); text-decoration: none; }
    a:hover { text-decoration: underline; }

    /* ── Gradient bar ── */
    .gradient-bar {
      height: 4px;
      background: linear-gradient(to right, #00a2e8, #ffa645);
    }

    /* ── Container ── */
    .container {
      max-width: 1080px;
      margin: 0 auto;
      padding: 0 24px;
    }

    /* ── Hero ── */
    .hero {
      background:
        linear-gradient(rgba(0,0,0,0.58), rgba(0,0,0,0.58)),
        url('https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=2000&q=70')
        no-repeat center center / cover;
      padding: 96px 24px 80px;
      text-align: center;
      color: #fff;
    }
    .hero-eyebrow {
      font-size: 13px;
      font-weight: 500;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--accent);
      margin: 0 0 16px;
    }
    .hero h1 {
      color: #fff;
      font-size: clamp(28px, 5vw, 48px);
      margin: 0 0 20px;
    }
    .hero-lede {
      font-size: 18px;
      font-weight: 300;
      max-width: 620px;
      margin: 0 auto 32px;
      color: rgba(255,255,255,0.88);
    }
    .hero-actions {
      display: flex;
      gap: 12px;
      justify-content: center;
      flex-wrap: wrap;
    }
    .btn-primary {
      background: var(--primary);
      color: #fff;
      font-weight: 500;
      padding: 12px 28px;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      font-size: 15px;
      transition: background 0.2s;
      text-decoration: none;
    }
    .btn-primary:hover { background: #38b2dc; text-decoration: none; color: #fff; }
    .btn-ghost {
      background: transparent;
      color: #fff;
      font-weight: 400;
      padding: 12px 24px;
      border-radius: 8px;
      border: 1.5px solid rgba(255,255,255,0.5);
      cursor: pointer;
      font-size: 15px;
      transition: border-color 0.2s;
      text-decoration: none;
    }
    .btn-ghost:hover { border-color: #fff; text-decoration: none; color: #fff; }

    /* ── Section wrapper ── */
    .section {
      padding: 72px 24px;
    }
    .section-alt { background: var(--bg-alt); }

    .section-header {
      text-align: center;
      max-width: 680px;
      margin: 0 auto 48px;
    }
    .section-header h2 { font-size: clamp(22px, 3.5vw, 32px); margin: 0 0 12px; }
    .section-header p { color: var(--muted); font-size: 16px; margin: 0; }

    /* ── Concept prose ── */
    .prose {
      max-width: 720px;
      margin: 0 auto;
    }
    .prose p { color: var(--muted); margin: 0 0 20px; font-size: 16px; }
    .prose p:last-child { margin-bottom: 0; }

    /* ── Benefit cards ── */
    .benefit-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
      max-width: 960px;
      margin: 0 auto;
    }
    @media (max-width: 720px) {
      .benefit-grid { grid-template-columns: 1fr; }
    }
    @media (min-width: 721px) and (max-width: 900px) {
      .benefit-grid { grid-template-columns: repeat(2, 1fr); }
    }
    .benefit-card {
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 10px;
      padding: 28px 24px;
    }
    .benefit-icon {
      width: 44px;
      height: 44px;
      border-radius: 8px;
      background: rgba(79,196,240,0.10);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--primary);
      margin-bottom: 16px;
    }
    .benefit-card h3 {
      font-size: 16px;
      margin: 0 0 8px;
    }
    .benefit-card p {
      font-size: 14px;
      color: var(--muted);
      margin: 0;
      line-height: 1.6;
    }

    /* ── Stats row ── */
    .stats-row {
      display: flex;
      justify-content: center;
      gap: 48px;
      flex-wrap: wrap;
      margin: 0 0 40px;
    }
    .stat {
      text-align: center;
    }
    .stat-number {
      font-family: var(--font-heading);
      font-size: 44px;
      font-weight: 700;
      color: var(--primary);
      line-height: 1;
      display: block;
    }
    .stat-label {
      font-size: 13px;
      color: var(--muted);
      margin-top: 6px;
      display: block;
      max-width: 160px;
    }

    /* ── Vignettes ── */
    .vignette-list {
      max-width: 800px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 24px;
    }
    .vignette-card {
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 10px;
      padding: 32px 28px;
    }
    .vignette-card h3 {
      font-size: 18px;
      margin: 0 0 12px;
      color: var(--text);
    }
    .vignette-card p {
      font-size: 15px;
      color: var(--muted);
      margin: 0 0 16px;
      line-height: 1.65;
    }
    .vignette-before-after {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
      margin: 16px 0;
    }
    @media (max-width: 560px) {
      .vignette-before-after { grid-template-columns: 1fr; }
    }
    .ba-box {
      padding: 12px 16px;
      border-radius: 6px;
      font-size: 14px;
      line-height: 1.5;
    }
    .ba-before {
      background: #fef2f2;
      border: 1px solid #fecaca;
      color: #7f1d1d;
    }
    .ba-after {
      background: #f0fdf4;
      border: 1px solid #bbf7d0;
      color: #14532d;
    }
    .ba-label {
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      margin-bottom: 4px;
      display: block;
      opacity: 0.7;
    }
    .vignette-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
      margin-top: 8px;
    }
    .tag {
      font-size: 12px;
      padding: 3px 10px;
      background: rgba(79,196,240,0.10);
      color: #0e7490;
      border-radius: 100px;
      font-weight: 400;
    }

    /* ── Process steps ── */
    .steps {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 32px;
      max-width: 900px;
      margin: 0 auto;
    }
    @media (max-width: 700px) {
      .steps { grid-template-columns: 1fr; gap: 24px; }
    }
    .step {
      display: flex;
      flex-direction: column;
    }
    .step-number {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: var(--primary);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 15px;
      margin-bottom: 16px;
      flex-shrink: 0;
    }
    .step h3 { font-size: 16px; margin: 0 0 8px; }
    .step p { font-size: 14px; color: var(--muted); margin: 0; line-height: 1.6; }

    /* ── CTA band ── */
    .cta-band {
      background: var(--primary);
      padding: 72px 24px;
      text-align: center;
      color: #fff;
    }
    .cta-band h2 { color: #fff; font-size: clamp(22px, 3.5vw, 32px); margin: 0 0 12px; }
    .cta-band p { color: rgba(255,255,255,0.88); max-width: 540px; margin: 0 auto 28px; font-size: 16px; }
    .btn-white {
      background: #fff;
      color: var(--primary);
      font-weight: 600;
      padding: 13px 32px;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      font-size: 15px;
      text-decoration: none;
      display: inline-block;
      transition: opacity 0.2s;
    }
    .btn-white:hover { opacity: 0.9; text-decoration: none; color: var(--primary); }
    .cta-secondary-link {
      display: block;
      margin-top: 16px;
      color: rgba(255,255,255,0.8);
      font-size: 14px;
    }
    .cta-secondary-link:hover { color: #fff; text-decoration: underline; }

    /* ── AOS failsafe ── */
    @keyframes aos-failsafe { to { opacity: 1; transform: translate3d(0,0,0); } }
    [data-aos]:not(.aos-animate) { animation: aos-failsafe 0.4s ease-out 2s forwards; }
  </style>
</head>
<body class="has-fixed-header">

<?php
$header_always_visible = true;
$header_chat_action = 'window.location.href="mailto:troy@serendipitytech.net"';
include __DIR__ . '/partials/site-header.php';
?>

<div class="gradient-bar"></div>

<!-- ═══════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════ -->
<section class="hero">
  <p class="hero-eyebrow">How We Work</p>
  <h1>Agency-scale results. Solo-operated.</h1>
  <p class="hero-lede">
    Most firms charge for teams you don't need. Serendipity Technology delivers custom platforms,
    automated pipelines, and production-grade infrastructure through a different model: one
    architect, directing AI as a disciplined engineering practice.
  </p>
  <div class="hero-actions">
    <a href="mailto:troy@serendipitytech.net" class="btn-primary">Talk to Troy</a>
    <a href="#proof" class="btn-ghost">See the proof</a>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     SECTION 1 — THE CONCEPT
═══════════════════════════════════════════════ -->
<section class="section" id="concept">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <h2>What "AI-Directed Engineering" actually means</h2>
    </div>
    <div class="prose" data-aos="fade-up" data-aos-delay="60">
      <p>
        Here is the honest version of a term that gets thrown around a lot.
      </p>
      <p>
        Troy owns the architecture. He designs the system, sets the security rules, makes the final
        calls on every data model and integration point, and is accountable for what goes into
        production. What AI does is the heavy lifting of implementation — writing code against those
        specifications, reviewing it, and maintaining it across dozens of services.
      </p>
      <p>
        The analogy that works: a senior architect directing a construction crew. The architect does
        not swing a hammer for every nail, but nothing goes up without their sign-off, and the
        blueprints are entirely theirs.
      </p>
      <p>
        What this means in practice: a single practitioner running the equivalent workload of a
        small engineering team — not by cutting corners, but by redirecting where human judgment
        goes. Judgment is spent on architecture and client outcomes. Execution is delegated to AI
        under that judgment.
      </p>
      <p>
        This is not automation for its own sake. It is a deliberate practice with standards,
        reviews, and accountability built in.
      </p>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     SECTION 2 — WHAT THIS MEANS FOR YOU
═══════════════════════════════════════════════ -->
<section class="section section-alt" id="benefits">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <h2>What this model means for your organization</h2>
      <p>Three things change when you work with a practice built this way.</p>
    </div>
    <div class="benefit-grid">

      <div class="benefit-card" data-aos="fade-up" data-aos-delay="0">
        <div class="benefit-icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/>
            <line x1="12" y1="16" x2="12.01" y2="16"/>
          </svg>
        </div>
        <h3>You pay for outcomes, not overhead.</h3>
        <p>
          A traditional agency bills you for project managers, developers, QA, and account
          coordination time — organizational overhead as much as technology. This model passes
          the efficiency directly to you: the same caliber of custom software, without the
          agency markup.
        </p>
      </div>

      <div class="benefit-card" data-aos="fade-up" data-aos-delay="80">
        <div class="benefit-icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
            <circle cx="12" cy="7" r="4"/>
          </svg>
        </div>
        <h3>One person knows your entire system.</h3>
        <p>
          No handoffs. No "the person who built that moved on." Troy built it, Troy maintains
          it, Troy answers for it. When something breaks at 11pm, there is no ticket queue —
          there is a person who cares about your platform.
        </p>
      </div>

      <div class="benefit-card" data-aos="fade-up" data-aos-delay="160">
        <div class="benefit-icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/>
            <polyline points="12 6 12 12 16 14"/>
          </svg>
        </div>
        <h3>Decisions happen at the speed of one inbox.</h3>
        <p>
          Enterprise projects stall in approval chains and inter-team coordination. This
          practice is structurally incapable of that. An architecture decision gets made,
          communicated to you, and moves to implementation — not to three other stakeholders
          who need to be looped in first.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     SECTION 3 — THE RECEIPTS / INFRASTRUCTURE
═══════════════════════════════════════════════ -->
<section class="section" id="proof">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <h2>What "solo-operated" actually looks like</h2>
      <p>This is not a theoretical capability. The following infrastructure is running right now, for real clients, on a production server.</p>
    </div>

    <div class="stats-row" data-aos="fade-up" data-aos-delay="60">
      <div class="stat">
        <span class="stat-number">40+</span>
        <span class="stat-label">Production services running in parallel</span>
      </div>
      <div class="stat">
        <span class="stat-number">6</span>
        <span class="stat-label">Organizations served across distinct environments</span>
      </div>
      <div class="stat">
        <span class="stat-number">0</span>
        <span class="stat-label">Shared credentials across client environments</span>
      </div>
    </div>

    <div class="prose" data-aos="fade-up" data-aos-delay="120">
      <p>
        Every client's data, API keys, and credentials live in fully isolated environments —
        separate networks, separate secrets, no cross-contamination. That is not a policy;
        it is enforced at the infrastructure level through Docker network isolation and
        per-client secret management.
      </p>
      <p>
        Automated backups run nightly with seven-day local retention and offsite archiving.
        SSL certificates renew automatically. Traffic anomalies surface in a real-time
        analytics dashboard. An AI operations assistant monitors the stack around the clock.
        The only person overseeing all of it is Troy.
      </p>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     SECTION 4 — PROJECT VIGNETTES
═══════════════════════════════════════════════ -->
<section class="section section-alt" id="work">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <h2>Work that shows the model in action</h2>
      <p>Each of these was designed, built, and is maintained by one person.</p>
    </div>

    <div class="vignette-list">

      <!-- Vignette 1 — Elections information API -->
      <div class="vignette-card" data-aos="fade-up">
        <h3>Public-Facing Elections Information API</h3>
        <p>
          A political data operation needed a way to let canvassers and volunteers look up
          voter precinct information in the field — accurately, fast, without a training
          manual. We built a public-facing elections-information API with a real-time lookup
          interface, geocoded precinct data, an administrative validation engine, and
          auto-syncing public documentation. The system handles the full data pipeline from
          source through validation through user-facing lookup, with an API that other tools
          in the organization's stack can call directly.
        </p>
        <div class="vignette-before-after">
          <div class="ba-box ba-before">
            <span class="ba-label">Before</span>
            Volunteers called a central number and waited.
          </div>
          <div class="ba-box ba-after">
            <span class="ba-label">After</span>
            Any volunteer with a phone gets a precinct result in under three seconds.
          </div>
        </div>
        <div class="vignette-tags">
          <span class="tag">API design</span>
          <span class="tag">Geospatial data pipelines</span>
          <span class="tag">Automated data validation</span>
          <span class="tag">Self-updating docs</span>
        </div>
      </div>

      <!-- Vignette 2 — Marketing automation + email infrastructure -->
      <div class="vignette-card" data-aos="fade-up">
        <h3>Marketing Automation and Email Infrastructure for a Data-Driven Organization</h3>
        <p>
          A data-driven organization managing a six-figure contact database needed reliable,
          cost-controlled outreach — not landing in spam, not hitting daily send limits, not
          paying per-contact retail rates to a commercial platform. We stood up a self-hosted
          marketing-automation platform with campaign segmentation, contact lifecycle
          management, and delivery backed by Amazon SES, provisioned for 50,000 emails per
          day. The organization owns the infrastructure; no vendor can change the pricing or
          the rules.
        </p>
        <div class="vignette-before-after">
          <div class="ba-box ba-before">
            <span class="ba-label">Before</span>
            Commercial platform with per-contact pricing and unpredictable deliverability.
          </div>
          <div class="ba-box ba-after">
            <span class="ba-label">After</span>
            Owned infrastructure. Predictable costs. 99%+ deliverability at 50,000 emails/day.
          </div>
        </div>
        <div class="vignette-tags">
          <span class="tag">Email infrastructure</span>
          <span class="tag">Amazon SES</span>
          <span class="tag">Marketing automation</span>
          <span class="tag">Deliverability configuration</span>
        </div>
      </div>

      <!-- Vignette 3 — Multi-tenant e-commerce platform -->
      <div class="vignette-card" data-aos="fade-up">
        <h3>Custom E-Commerce Platform for a Multi-Tenant Merchandise Reseller</h3>
        <p>
          An off-the-shelf storefront was costing a merchandise reseller flexibility and
          margin — it couldn't support the dynamic pricing logic, per-tenant catalog rules,
          or reporting depth the business actually needed. We replaced it with a purpose-built
          platform: a customer-facing storefront, a dynamic pricing matrix, per-tenant order
          management, and reporting dashboards that give the operator real visibility into
          sales and fulfillment across all tenants.
        </p>
        <div class="vignette-before-after">
          <div class="ba-box ba-before">
            <span class="ba-label">Before</span>
            Off-the-shelf store with rigid pricing, no per-tenant logic, limited reporting.
          </div>
          <div class="ba-box ba-after">
            <span class="ba-label">After</span>
            Purpose-built platform with dynamic pricing matrix, tenant isolation, and real-time dashboards.
          </div>
        </div>
        <div class="vignette-tags">
          <span class="tag">Custom e-commerce</span>
          <span class="tag">Multi-tenant architecture</span>
          <span class="tag">Dynamic pricing engine</span>
          <span class="tag">Reporting dashboards</span>
        </div>
      </div>

      <!-- Vignette 4 — Coalition workspace + reporting -->
      <div class="vignette-card" data-aos="fade-up">
        <h3>Collaborative Workspace and Engagement Reporting for a Nonprofit Coalition</h3>
        <p>
          A nonprofit coalition with multiple distinct member segments needed shared
          infrastructure it didn't have: a managed Google Workspace environment, standardized
          communication tooling across the coalition, and a reporting system that could track
          engagement separately by segment while rolling up to a single view for leadership.
          We built and provisioned the full workspace and built the multi-segment engagement
          reporting layer on top of it.
        </p>
        <div class="vignette-before-after">
          <div class="ba-box ba-before">
            <span class="ba-label">Before</span>
            No shared infrastructure. Each segment operating independently, no aggregate view.
          </div>
          <div class="ba-box ba-after">
            <span class="ba-label">After</span>
            Unified workspace with per-segment reporting and a consolidated leadership dashboard.
          </div>
        </div>
        <div class="vignette-tags">
          <span class="tag">Workspace provisioning</span>
          <span class="tag">Multi-segment reporting</span>
          <span class="tag">Coalition infrastructure</span>
          <span class="tag">Google Workspace</span>
        </div>
      </div>

      <!-- Vignette 5 — Membership org: inventory, dues, events -->
      <div class="vignette-card" data-aos="fade-up">
        <h3>Membership, Inventory, and Event Operations for a Member-Based Organization</h3>
        <p>
          A member-based organization was tracking inventory in spreadsheets, collecting dues
          manually, and running events with paper sign-in sheets. We built an integrated
          system covering all three: inventory management with stock tracking and reorder
          alerts, dues collection with Square payments integration, and a QR-based event
          check-in system with real-time multi-device sync and a live attendance dashboard.
        </p>
        <div class="vignette-before-after">
          <div class="ba-box ba-before">
            <span class="ba-label">Before</span>
            Spreadsheets for inventory, manual dues collection, 45-minute paper check-in lines.
          </div>
          <div class="ba-box ba-after">
            <span class="ba-label">After</span>
            Integrated platform: live inventory, integrated payments, 3-minute event check-in.
          </div>
        </div>
        <div class="vignette-tags">
          <span class="tag">Inventory management</span>
          <span class="tag">Payments integration</span>
          <span class="tag">QR check-in</span>
          <span class="tag">Real-time sync</span>
        </div>
      </div>

      <!-- Vignette 6 — Productized managed hosting platform -->
      <div class="vignette-card" data-aos="fade-up">
        <h3>Productized Managed Hosting Platform with Automated Client Onboarding</h3>
        <p>
          We built the infrastructure for Serendipity's own managed-hosting product: a client
          intake form, an automated provisioning pipeline that configures a new site in
          minutes, per-client git repositories, a self-service client portal with a Kanban
          change-request system, and workflow automation handling onboarding emails and admin
          alerts. This is not a website builder. It is the platform that makes offering
          managed hosting at scale possible without a support team.
        </p>
        <div class="vignette-tags">
          <span class="tag">Platform productization</span>
          <span class="tag">Provisioning automation</span>
          <span class="tag">Client self-service portal</span>
          <span class="tag">Workflow orchestration</span>
        </div>
      </div>

      <!-- Vignette 7 — Multi-tenant VPS infrastructure -->
      <div class="vignette-card" data-aos="fade-up">
        <h3>Self-Run Multi-Tenant Cloud Infrastructure</h3>
        <p>
          All of the above runs on infrastructure designed, provisioned, and operated by one
          person: 40+ production services across isolated client environments, managed by a
          Traefik reverse proxy with automatic SSL, nightly encrypted backups with offsite
          archiving, a real-time traffic analytics dashboard, and an AI operations assistant
          monitoring the stack around the clock. Per-client credential isolation is enforced
          at the network level — not by policy, by architecture.
        </p>
        <div class="vignette-tags">
          <span class="tag">Docker orchestration</span>
          <span class="tag">Multi-tenant isolation</span>
          <span class="tag">Automated SSL + backups</span>
          <span class="tag">24/7 AI monitoring</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     SECTION 5 — HOW WE WORK TOGETHER
═══════════════════════════════════════════════ -->
<section class="section" id="process">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <h2>Working with Serendipity Technology</h2>
    </div>
    <div class="steps">
      <div class="step" data-aos="fade-up" data-aos-delay="0">
        <div class="step-number">1</div>
        <h3>Discovery call (30 minutes)</h3>
        <p>
          Troy asks about your actual problem, not your desired solution. Most organizations
          come in wanting a feature; we usually find the right starting point is a different
          question. You leave with clarity on whether this is the right fit.
        </p>
      </div>
      <div class="step" data-aos="fade-up" data-aos-delay="80">
        <div class="step-number">2</div>
        <h3>Architecture proposal</h3>
        <p>
          A written document — not a sales deck — describing the technical approach, what you
          own at the end, how it fits your existing tools, and what it costs. No
          mystery-meat proposals.
        </p>
      </div>
      <div class="step" data-aos="fade-up" data-aos-delay="160">
        <div class="step-number">3</div>
        <h3>Build and hand-off with documentation</h3>
        <p>
          You get working software and documentation written for whoever has to maintain it
          after the engagement. We prefer long-term relationships, but you should never be
          dependent on us to use what we built.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     CTA BAND
═══════════════════════════════════════════════ -->
<section class="cta-band" data-aos="fade-up">
  <h2>Ready to talk through your project?</h2>
  <p>
    If your organization needs custom technology and you've been told you need a team or a
    big budget to do it right, let's have a conversation.
  </p>
  <a href="mailto:troy@serendipitytech.net" class="btn-white">Schedule a call with Troy</a>
  <a href="mailto:troy@serendipitytech.net" class="cta-secondary-link">troy@serendipitytech.net</a>
</section>

<?php include __DIR__ . '/partials/site-footer.php'; ?>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    AOS.init({ once: true, duration: 600, offset: 40, easing: 'ease-out', disable: 'phone' });
  });
  window.addEventListener('load', function () {
    if (typeof AOS !== 'undefined') AOS.refreshHard();
  });
</script>

</body>
</html>
