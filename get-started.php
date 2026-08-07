<?php
$header_always_visible = true;
$header_chat_action = 'openContactModal()';
include __DIR__ . '/partials/site-header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="3TXwmMDxBCEQDR9EF8e6yvCEyiTcS7at1zDQ5f0F2zc" />

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-G50KCN37LQ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-G50KCN37LQ');
    </script>

    <title>Get Started — Custom Software Project | Serendipity Technology</title>
    <meta name="description" content="Start your custom software project with Serendipity Technology. Tell us what you need — workflow automation, data integration, or a custom app — and we'll scope it with you." />
    <link rel="canonical" href="https://serendipitytechnology.com/get-started">

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://serendipitytechnology.com/get-started" />
    <meta property="og:title" content="Get Started — Custom Software Project | Serendipity Technology" />
    <meta property="og:description" content="Tell us what you need and we'll scope your custom software project with you." />
    <meta property="og:image" content="https://serendipitytechnology.com/img/logos/serendipity_icon_500.png" />
    <meta property="og:site_name" content="Serendipity Technology" />
    <meta name="twitter:card" content="summary" />
    <style>
        :root {
            --primary: #4FC4F0;
            --primary-dark: #3BA8D8;
            --primary-light: rgba(79,196,240,0.1);
            --accent: #F7B06A;
            --accent-dark: #E89B4E;
            --charcoal: #1F2937;
            --slate: #475569;
            --gray: #94A3B8;
            --light: #E5E7EB;
            --lighter: #F3F4F6;
            --white: #FFFFFF;
            --success: #10B981;
            --error: #EF4444;
            --radius: 12px;
            --shadow: 0 4px 24px rgba(0,0,0,0.08);
            --shadow-lg: 0 20px 60px rgba(0,0,0,0.12);
        }

        * { margin:0; padding:0; box-sizing:border-box; }

        body {
            font-family: 'Roboto', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #F0F4F8;
            color: var(--charcoal);
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Progress Bar */
        .progress-container {
            background: var(--white);
            border-bottom: 1px solid var(--light);
            padding: 24px 24px 0;
        }
        .progress-steps {
            display: flex;
            justify-content: center;
            gap: 0;
            max-width: 600px;
            margin: 0 auto;
            position: relative;
        }
        .progress-step {
            flex: 1;
            text-align: center;
            position: relative;
            padding-bottom: 24px;
        }
        .progress-step::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--light);
            transition: background 0.3s ease;
        }
        .progress-step.active::after,
        .progress-step.completed::after {
            background: var(--primary);
        }
        .step-number {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--light);
            color: var(--gray);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 6px;
            transition: all 0.2s ease;
        }
        .progress-step.active .step-number {
            background: var(--primary);
            color: var(--white);
        }
        .progress-step.completed .step-number {
            background: var(--success);
            color: var(--white);
        }
        .step-label {
            font-size: 12px;
            font-weight: 500;
            color: var(--gray);
            transition: color 0.2s ease;
        }
        .progress-step.active .step-label { color: var(--charcoal); }
        .progress-step.completed .step-label { color: var(--success); }

        /* Main Content */
        .main {
            max-width: 900px;
            margin: 32px auto;
            padding: 0 24px;
        }

        /* Step Panels */
        .step-panel {
            display: none;
            animation: fadeIn 0.3s ease;
        }
        .step-panel.active { display: block; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .panel-header {
            margin-bottom: 24px;
        }
        .panel-header h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 6px;
        }
        .panel-header p {
            color: var(--slate);
            font-size: 15px;
        }

        /* Cards */
        .card {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 32px;
            margin-bottom: 24px;
        }

        /* Template Grid */
        .template-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
            margin-bottom: 24px;
        }
        .template-card {
            background: var(--white);
            border: 2px solid var(--light);
            border-radius: var(--radius);
            overflow: hidden;
            cursor: pointer;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
            position: relative;
        }
        .template-card:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow);
        }
        .template-card.selected {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79,196,240,0.2);
        }
        .template-card.selected::before {
            content: '✓';
            position: absolute;
            top: 16px;
            right: 12px;
            width: 28px;
            height: 28px;
            background: var(--primary);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            z-index: 2;
        }
        .template-swatch {
            height: 8px;
            width: 100%;
            flex-shrink: 0;
        }
        .template-info {
            padding: 16px;
        }
        .template-info h4 {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 4px;
        }
        .template-info p {
            font-size: 13px;
            color: var(--slate);
            margin-bottom: 10px;
        }
        .template-category {
            display: inline-block;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 3px 8px;
            border-radius: 4px;
            background: var(--primary-light);
            color: var(--primary-dark);
            margin-bottom: 10px;
        }
        .template-category.business { background: rgba(247,176,106,0.15); color: var(--accent-dark); }
        .template-category.campaign { background: rgba(16,185,129,0.1); color: #059669; }
        .template-category.nonprofit { background: rgba(79,196,240,0.1); color: var(--primary-dark); }

        /* Theme selector */
        .theme-selector {
            display: flex;
            gap: 8px;
            margin-bottom: 10px;
            flex-wrap: wrap;
        }
        .theme-dot-pair {
            display: flex;
            align-items: center;
            gap: 2px;
            cursor: pointer;
            padding: 3px 6px;
            border-radius: 6px;
            border: 1px solid transparent;
            transition: border-color 0.15s ease;
        }
        .theme-dot-pair:hover { border-color: var(--light); }
        .theme-dot-pair.selected { border-color: var(--primary); }
        .theme-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 1px solid rgba(0,0,0,0.08);
        }
        .theme-dot-label {
            font-size: 11px;
            color: var(--slate);
            margin-left: 4px;
        }

        .template-actions {
            display: flex;
            gap: 8px;
            margin-top: 10px;
        }
        .btn-preview {
            font-size: 12px;
            color: var(--primary);
            background: none;
            border: 1px solid var(--primary);
            border-radius: 6px;
            padding: 4px 10px;
            cursor: pointer;
            transition: background 0.15s ease, color 0.15s ease;
        }
        .btn-preview:hover {
            background: var(--primary);
            color: var(--white);
        }

        .template-alt-options {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            margin-top: 8px;
        }
        .alt-option {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 14px 20px;
            background: var(--white);
            border: 2px dashed var(--light);
            border-radius: var(--radius);
            cursor: pointer;
            transition: border-color 0.15s ease, background 0.15s ease;
            flex: 1;
            min-width: 220px;
        }
        .alt-option:hover {
            border-color: var(--primary);
            background: var(--primary-light);
        }
        .alt-option.selected {
            border-color: var(--primary);
            border-style: solid;
            background: var(--primary-light);
        }
        .alt-option-icon { font-size: 20px; }
        .alt-option div h4 { font-size: 14px; font-weight: 600; }
        .alt-option div p { font-size: 12px; color: var(--slate); }

        /* Category Filter */
        .category-filter {
            display: flex;
            gap: 8px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .filter-btn {
            padding: 6px 16px;
            border-radius: 20px;
            border: 1px solid var(--light);
            background: var(--white);
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: border-color 0.15s ease, color 0.15s ease, background 0.15s ease;
            color: var(--slate);
        }
        .filter-btn:hover { border-color: var(--primary); color: var(--primary); }
        .filter-btn.active {
            background: var(--primary);
            color: var(--white);
            border-color: var(--primary);
        }

        /* Form Styles */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px;
            color: var(--charcoal);
        }
        .form-group label .required { color: var(--accent); }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="tel"],
        .form-group input[type="url"],
        .form-group input[type="color"],
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px 14px;
            border: 2px solid var(--light);
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            color: var(--charcoal);
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
            background: var(--white);
        }
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79,196,240,0.12);
        }
        .form-group input.invalid {
            border-color: var(--error);
        }
        .form-group textarea { resize: vertical; min-height: 80px; }
        .form-group .helper {
            font-size: 12px;
            color: var(--gray);
            margin-top: 4px;
        }
        .form-group .field-error {
            font-size: 12px;
            color: var(--error);
            margin-top: 4px;
            display: none;
        }
        .form-group input.invalid + .helper { display: none; }
        .form-group input.invalid ~ .field-error { display: block; }

        .color-input-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .color-input-wrap input[type="color"] {
            width: 48px;
            height: 40px;
            padding: 2px;
            cursor: pointer;
        }
        .color-input-wrap .color-hex {
            font-size: 14px;
            color: var(--slate);
            font-family: monospace;
        }

        /* Checkbox */
        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px;
            background: var(--lighter);
            border-radius: 8px;
            margin-bottom: 20px;
            cursor: pointer;
        }
        .checkbox-group:hover { background: var(--primary-light); }
        .checkbox-group input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin-top: 2px;
            accent-color: var(--primary);
            cursor: pointer;
        }
        .checkbox-group .cb-content h4 {
            font-size: 14px;
            font-weight: 600;
        }
        .checkbox-group .cb-content p {
            font-size: 12px;
            color: var(--slate);
        }

        /* File Upload */
        .file-upload {
            border: 2px dashed var(--light);
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.15s ease, background 0.15s ease;
        }
        .file-upload:hover { border-color: var(--primary); background: var(--primary-light); }
        .file-upload input { display: none; }
        .file-upload .upload-text {
            font-size: 13px;
            color: var(--slate);
        }
        .file-upload .upload-text strong { color: var(--primary); }

        /* Plan Cards */
        .plan-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 24px;
        }
        .plan-card {
            background: var(--white);
            border: 2px solid var(--light);
            border-radius: var(--radius);
            padding: 28px 24px;
            cursor: pointer;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
            position: relative;
        }
        .plan-card:hover {
            border-color: var(--primary);
        }
        .plan-card.selected {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79,196,240,0.2);
        }
        .plan-card.popular::before {
            content: 'Most Popular';
            position: absolute;
            top: -1px;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            background: var(--accent);
            color: var(--white);
            font-size: 11px;
            font-weight: 600;
            padding: 3px 12px;
            border-radius: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .plan-name {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .plan-price { margin-bottom: 16px; }
        .plan-price .setup {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary);
        }
        .plan-price .setup-label {
            font-size: 13px;
            color: var(--gray);
        }
        .plan-price .monthly {
            font-size: 14px;
            color: var(--slate);
            margin-top: 2px;
        }
        .plan-features {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .plan-features li {
            font-size: 13px;
            padding: 5px 0;
            color: var(--slate);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .plan-features li::before {
            content: '✓';
            color: var(--success);
            font-weight: 700;
            font-size: 14px;
        }

        /* Summary */
        .summary-section { margin-bottom: 20px; }
        .summary-section h4 {
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--gray);
            margin-bottom: 8px;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            font-size: 14px;
            border-bottom: 1px solid var(--lighter);
        }
        .summary-row:last-child { border: none; }
        .summary-row .label { color: var(--slate); }
        .summary-row .value { font-weight: 600; }
        .summary-total {
            display: flex;
            justify-content: space-between;
            padding: 16px 0;
            font-size: 18px;
            font-weight: 700;
            border-top: 2px solid var(--charcoal);
            margin-top: 8px;
        }

        /* Buttons */
        .btn-row {
            display: flex;
            gap: 12px;
            justify-content: space-between;
            margin-top: 24px;
        }
        .btn {
            padding: 12px 28px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.15s ease, box-shadow 0.15s ease;
            border: none;
            font-family: inherit;
        }
        .btn-primary {
            background: linear-gradient(90deg, #4FC4F0, #F7B06A);
            color: #1F2937;
        }
        .btn-primary:hover {
            opacity: 0.9;
            box-shadow: 0 4px 12px rgba(79,196,240,0.3);
        }
        .btn-primary:disabled {
            opacity: 0.4;
            cursor: not-allowed;
            box-shadow: none;
        }
        .btn-secondary {
            background: var(--white);
            color: var(--slate);
            border: 2px solid var(--light);
        }
        .btn-secondary:hover {
            border-color: var(--primary);
            color: var(--primary);
        }
        .btn-large {
            width: 100%;
            padding: 16px;
            font-size: 16px;
        }

        /* Spinner */
        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(0,0,0,0.15);
            border-top-color: #1F2937;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
            vertical-align: middle;
            margin-right: 8px;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* Confirmation */
        .confirmation {
            text-align: center;
            padding: 40px 20px;
        }
        .confirmation .check-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--success);
            color: var(--white);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin-bottom: 24px;
        }
        .confirmation h2 { font-size: 28px; margin-bottom: 8px; }
        .confirmation .sub {
            color: var(--slate);
            font-size: 16px;
            margin-bottom: 32px;
        }
        .dns-instructions {
            text-align: left;
            background: var(--lighter);
            border-radius: var(--radius);
            padding: 24px;
            margin: 24px 0;
        }
        .dns-instructions h4 {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 12px;
        }
        .dns-instructions code {
            display: block;
            background: var(--charcoal);
            color: #E2E8F0;
            padding: 12px 16px;
            border-radius: 6px;
            font-size: 13px;
            margin: 8px 0;
            overflow-x: auto;
        }
        .dns-instructions p {
            font-size: 13px;
            color: var(--slate);
            margin: 8px 0;
        }

        /* Alert */
        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: none;
        }
        .alert.show { display: flex; align-items: center; gap: 10px; }
        .alert-error {
            background: rgba(239,68,68,0.08);
            color: #DC2626;
            border: 1px solid rgba(239,68,68,0.2);
        }

        /* Preview Modal */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.6);
            z-index: 10000;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        .modal-overlay.show { display: flex; }
        .modal-content {
            background: var(--white);
            border-radius: var(--radius);
            width: 100%;
            max-width: 1100px;
            height: 85vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 20px;
            border-bottom: 1px solid var(--light);
            flex-shrink: 0;
        }
        .modal-header h3 { font-size: 16px; font-weight: 600; }
        .modal-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--slate);
            padding: 4px 8px;
            border-radius: 6px;
            line-height: 1;
        }
        .modal-close:hover { background: var(--lighter); }
        /* Color picker inside preview modal */
        .modal-color-bar {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 10px 20px;
            background: #fafbfc;
            border-bottom: 1px solid var(--light);
            flex-shrink: 0;
            flex-wrap: wrap;
        }
        .modal-color-bar .cp-label {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--gray);
        }
        .cp-field {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .cp-field label {
            font-size: 12px;
            color: var(--slate);
            font-weight: 500;
        }
        .cp-field input[type="color"] {
            width: 26px;
            height: 26px;
            border: 1px solid var(--light);
            border-radius: 6px;
            padding: 2px;
            cursor: pointer;
            background: var(--white);
        }
        .cp-hex {
            font-size: 11px;
            font-family: monospace;
            color: var(--gray);
            width: 52px;
        }
        .cp-reset {
            margin-left: auto;
            font-size: 11px;
            color: var(--gray);
            background: none;
            border: 1px solid var(--light);
            border-radius: 6px;
            padding: 3px 10px;
            cursor: pointer;
            font-family: inherit;
            transition: border-color 0.15s ease;
        }
        .cp-reset:hover { border-color: var(--primary); color: var(--charcoal); }
        .modal-body {
            flex: 1;
            overflow: hidden;
        }
        .modal-body iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .form-row { grid-template-columns: 1fr; }
            .template-grid { grid-template-columns: 1fr; }
            .plan-grid { grid-template-columns: 1fr; }
            .btn-row { flex-direction: column-reverse; }
            .btn-row .btn { width: 100%; text-align: center; }
            .template-alt-options { flex-direction: column; }
            .card { padding: 20px; }
        }

        @media (prefers-reduced-motion: reduce) {
            .step-panel { animation: none; }
            .btn, .template-card, .filter-btn, .plan-card { transition: none; }
        }
    </style>
</head>
<body class="has-fixed-header">

<!-- Page intro (SEO h1 + orientation) -->
<div style="max-width:900px;margin:0 auto;padding:24px 24px 0;text-align:center;">
    <h1 style="font-family:'Gill Sans','Gill Sans MT',sans-serif;font-size:clamp(1.6rem,4vw,2.2rem);color:#1F2937;margin:0 0 8px;">Get Started With Your Custom Software Project</h1>
    <p style="color:#475569;font-size:1.05rem;margin:0 0 8px;">Pick a starting point, tell us what you need, and we'll scope it with you.</p>
</div>

<!-- Progress -->
<div class="progress-container">
    <div class="progress-steps">
        <div class="progress-step active" data-step="1">
            <div class="step-number">1</div>
            <div class="step-label">Template</div>
        </div>
        <div class="progress-step" data-step="2">
            <div class="step-number">2</div>
            <div class="step-label">Details</div>
        </div>
        <div class="progress-step" data-step="3">
            <div class="step-number">3</div>
            <div class="step-label">Plan</div>
        </div>
        <div class="progress-step" data-step="4">
            <div class="step-number">4</div>
            <div class="step-label">Confirm</div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="main">

    <!-- Step 1: Template Selection -->
    <div class="step-panel active" id="step1">
        <div class="panel-header">
            <h2>Choose Your Template</h2>
            <p>Pick a starting point — we'll customize it to match your brand perfectly.</p>
        </div>

        <div class="category-filter">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="campaign">Campaign</button>
            <button class="filter-btn" data-filter="nonprofit">Nonprofit</button>
            <button class="filter-btn" data-filter="business">Business</button>
        </div>

        <div class="template-grid" id="templateGrid">
            <!-- Templates populated by JS -->
        </div>

        <div class="template-alt-options">
            <div class="alt-option" data-template-id="envato" onclick="selectAltOption(this, 'envato')">
                <span class="alt-option-icon">🛒</span>
                <div>
                    <h4>Browse Envato Elements</h4>
                    <p>Explore thousands of premium templates</p>
                </div>
            </div>
            <div class="alt-option" data-template-id="custom" onclick="selectAltOption(this, 'custom')">
                <span class="alt-option-icon">📁</span>
                <div>
                    <h4>I Have My Own Template</h4>
                    <p>Bring your own HTML/CSS template</p>
                </div>
            </div>
        </div>

        <div class="btn-row">
            <div></div>
            <button class="btn btn-primary" onclick="nextStep()" id="step1Next" disabled>Continue →</button>
        </div>
    </div>

    <!-- Step 2: Client Details -->
    <div class="step-panel" id="step2">
        <div class="panel-header">
            <h2>Tell Us About Your Project</h2>
            <p>We'll use this to set up and customize your site.</p>
        </div>

        <div class="card">
            <div class="form-row">
                <div class="form-group">
                    <label>Business or Name <span class="required">*</span></label>
                    <input type="text" id="clientName" placeholder="e.g., Smith Consulting" required>
                    <div class="field-error">Please enter a name</div>
                </div>
                <div class="form-group">
                    <label>Contact Email <span class="required">*</span></label>
                    <input type="email" id="contactEmail" placeholder="you@example.com" required>
                    <div class="field-error">Please enter a valid email</div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Domain Name <span class="required">*</span></label>
                    <input type="text" id="domainName" placeholder="e.g., smithconsulting.com">
                    <div class="helper">Already have a domain? Enter it here. Need one? We'll help you get set up.</div>
                    <div class="field-error">Please enter a domain name</div>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" id="phoneNumber" placeholder="(407) 555-0100">
                </div>
            </div>

            <div class="form-group">
                <label>Logo</label>
                <div class="file-upload" onclick="document.getElementById('logoFile').click()">
                    <input type="file" id="logoFile" accept="image/*">
                    <div class="upload-text" id="logoText">
                        <strong>Click to upload</strong> or drag and drop<br>
                        PNG, JPG, or SVG (max 5MB)
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Preferred Color</label>
                    <div class="color-input-wrap">
                        <input type="color" id="primaryColor" value="#4FC4F0">
                        <span class="color-hex" id="colorHex">#4FC4F0</span>
                    </div>
                    <div class="helper">We'll use this as your primary brand color</div>
                </div>
                <div></div>
            </div>

            <div class="form-group">
                <label>Tell us about your project</label>
                <textarea id="projectDesc" placeholder="What does your business do? Any specific features or pages you need? Anything you'd like us to know..."></textarea>
            </div>

            <div class="checkbox-group" onclick="toggleCheckbox('mailingList')">
                <input type="checkbox" id="mailingList">
                <div class="cb-content">
                    <h4>Add Email Newsletter</h4>
                    <p>Collect subscribers and send email campaigns. We handle the setup and deliverability. Included in Growth and Campaign plans.</p>
                </div>
            </div>
        </div>

        <div class="btn-row">
            <button class="btn btn-secondary" onclick="prevStep()">← Back</button>
            <button class="btn btn-primary" onclick="nextStep()" id="step2Next">Continue →</button>
        </div>
    </div>

    <!-- Step 3: Plan Selection -->
    <div class="step-panel" id="step3">
        <div class="panel-header">
            <h2>Choose Your Plan</h2>
            <p>All plans include SSL, hosting, and a custom contact form. Cancel anytime.</p>
        </div>

        <div class="plan-grid">
            <div class="plan-card" onclick="selectPlan('starter')">
                <div class="plan-name">Starter</div>
                <div class="plan-price">
                    <div class="setup">$299</div>
                    <div class="setup-label">one-time setup</div>
                    <div class="monthly">then $29/mo</div>
                </div>
                <ul class="plan-features">
                    <li>Custom website</li>
                    <li>Contact form</li>
                    <li>SSL certificate</li>
                    <li>Mobile-responsive</li>
                    <li>Managed hosting</li>
                </ul>
            </div>

            <div class="plan-card popular" onclick="selectPlan('growth')">
                <div class="plan-name">Growth</div>
                <div class="plan-price">
                    <div class="setup">$499</div>
                    <div class="setup-label">one-time setup</div>
                    <div class="monthly">then $49/mo</div>
                </div>
                <ul class="plan-features">
                    <li>Everything in Starter</li>
                    <li>Email newsletter</li>
                    <li>Site analytics</li>
                    <li>Priority support</li>
                    <li>Monthly reporting</li>
                </ul>
            </div>

            <div class="plan-card" onclick="selectPlan('campaign')">
                <div class="plan-name">Campaign</div>
                <div class="plan-price">
                    <div class="setup">$699</div>
                    <div class="setup-label">one-time setup</div>
                    <div class="monthly">then $79/mo</div>
                </div>
                <ul class="plan-features">
                    <li>Everything in Growth</li>
                    <li>Donation integration</li>
                    <li>Event pages</li>
                    <li>Volunteer signup</li>
                    <li>Social media integration</li>
                </ul>
            </div>
        </div>

        <!-- Summary -->
        <div class="card" id="summaryCard" style="display:none">
            <div class="summary-section">
                <h4>Order Summary</h4>
                <div class="summary-row">
                    <span class="label">Template</span>
                    <span class="value" id="summaryTemplate">—</span>
                </div>
                <div class="summary-row">
                    <span class="label">Theme</span>
                    <span class="value" id="summaryTheme">—</span>
                </div>
                <div class="summary-row">
                    <span class="label">Client</span>
                    <span class="value" id="summaryClient">—</span>
                </div>
                <div class="summary-row">
                    <span class="label">Domain</span>
                    <span class="value" id="summaryDomain">—</span>
                </div>
                <div class="summary-row">
                    <span class="label">Plan</span>
                    <span class="value" id="summaryPlan">—</span>
                </div>
                <div class="summary-row">
                    <span class="label">Email Newsletter</span>
                    <span class="value" id="summaryMailing">—</span>
                </div>
            </div>
            <div class="summary-total">
                <span>Setup Fee</span>
                <span id="summaryTotal">—</span>
            </div>
            <p style="font-size:13px; color:var(--gray); margin-top:8px;">
                Monthly hosting billed separately via invoice after site goes live.
            </p>

            <div class="checkbox-group" onclick="toggleCheckbox('termsAgree')" style="margin-top:20px; margin-bottom:0;">
                <input type="checkbox" id="termsAgree" onclick="event.stopPropagation(); formState.termsAgree = this.checked; checkSubmitReady();">
                <div class="cb-content">
                    <h4>I agree to the terms of service</h4>
                    <p>By proceeding, you agree to Serendipity Technology's service agreement and hosting terms.</p>
                </div>
            </div>
        </div>

        <div id="alertBox" class="alert alert-error"></div>

        <div class="btn-row">
            <button class="btn btn-secondary" onclick="prevStep()">← Back</button>
            <button class="btn btn-primary" onclick="submitOrder()" id="submitBtn" disabled>Proceed to Payment →</button>
        </div>
    </div>

    <!-- Step 4: Confirmation -->
    <div class="step-panel" id="step4">
        <div class="card">
            <div class="confirmation" id="confirmationContent">
                <div class="check-circle">✓</div>
                <h2>Welcome Aboard!</h2>
                <p class="sub">Your site is being set up. Here's what happens next.</p>

                <div class="dns-instructions">
                    <h4>Step 1: Point Your Domain</h4>
                    <p>Log in to your domain registrar and update your DNS records:</p>
                    <code>Type: A    Host: @    Value: 168.231.71.143</code>
                    <code>Type: CNAME    Host: www    Value: <span id="dnsDomain">yourdomain.com</span></code>
                    <p>DNS changes typically take 15 minutes to 24 hours to propagate.</p>
                </div>

                <div class="dns-instructions">
                    <h4>Step 2: We Build Your Site</h4>
                    <p>Our team will customize your selected template with your branding. You'll receive a preview link within <strong>2-3 business days</strong> to review before we go live.</p>
                </div>

                <div class="dns-instructions">
                    <h4>Step 3: You'll Hear From Us</h4>
                    <p>A confirmation email is on its way to <strong id="confirmEmail">your email</strong> with all the details.</p>
                    <p style="margin-top:12px;">Questions? Reply to the email or call us at <strong>407-545-6070</strong>.</p>
                </div>
            </div>

            <!-- Loading state -->
            <div class="confirmation" id="loadingContent" style="display:none;">
                <div style="font-size:48px; margin-bottom:24px;">🚀</div>
                <h2>Setting Up Your Site...</h2>
                <p class="sub">This will only take a moment.</p>
                <div class="spinner" style="margin: 24px auto;"></div>
            </div>

            <!-- Error state -->
            <div class="confirmation" id="errorContent" style="display:none;">
                <h2>Something Went Wrong</h2>
                <p class="sub" id="errorMessage">We couldn't process your request. Please try again or contact us directly.</p>
                <div style="margin-top:24px;">
                    <button class="btn btn-primary" onclick="retrySubmit()">Try Again</button>
                    <a href="mailto:troy@serendipitytech.net" class="btn btn-secondary" style="display:inline-block; text-decoration:none; margin-left:12px;">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div class="modal-overlay" id="previewModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="previewTitle">Template Preview</h3>
            <button class="modal-close" onclick="closePreview()">×</button>
        </div>
        <div class="modal-color-bar">
            <span class="cp-label">Customize colors</span>
            <div class="cp-field">
                <label for="modalCpPrimary">Primary</label>
                <input type="color" id="modalCpPrimary" value="#0B1F3A">
                <span class="cp-hex" id="modalCpPrimaryHex">#0B1F3A</span>
            </div>
            <div class="cp-field">
                <label for="modalCpAccent">Accent</label>
                <input type="color" id="modalCpAccent" value="#E36A2C">
                <span class="cp-hex" id="modalCpAccentHex">#E36A2C</span>
            </div>
            <button class="cp-reset" id="modalCpReset">Reset</button>
        </div>
        <div class="modal-body">
            <iframe id="previewFrame" src="about:blank" title="Template preview"></iframe>
        </div>
    </div>
</div>

<script>
// ===================== Data =====================
const TEMPLATES = [
  {
    id: 'campaign-standard',
    name: 'Campaign',
    category: 'campaign',
    description: 'Bold, action-oriented layout for political candidates and advocacy groups. Includes hero, issues grid, about section, contact form, and donation CTA.',
    previewUrl: 'https://sites-demo.serendipitylabs.cloud/templates/preview-campaign.html',
    themes: [
      { id: 'theme-campaign', name: 'Navy & Orange', primary: '#0B1F3A', accent: '#E36A2C' },
      { id: 'theme-professional', name: 'Slate & Teal', primary: '#2c3e50', accent: '#17a589' }
    ]
  },
  {
    id: 'nonprofit-standard',
    name: 'Nonprofit / Cause',
    category: 'nonprofit',
    description: 'Purpose-built for charities and cause-driven organizations. Includes donation progress bars, filterable causes grid, events section, and team grid.',
    previewUrl: 'https://sites-demo.serendipitylabs.cloud/templates/preview-nonprofit.html',
    themes: [
      { id: 'theme-nonprofit', name: 'Green & Gold', primary: '#2d6a4f', accent: '#d4a017' },
      { id: 'theme-nonprofit-blue', name: 'Blue & Coral', primary: '#1B4F72', accent: '#E74C3C' }
    ]
  },
  {
    id: 'business-standard',
    name: 'Business / Consulting',
    category: 'business',
    description: 'Professional layout for consulting firms, agencies, and service businesses. Includes services showcase, process steps, pricing tiers, and client testimonials.',
    previewUrl: 'https://sites-demo.serendipitylabs.cloud/templates/preview-business.html',
    themes: [
      { id: 'theme-business', name: 'Forest & Gold', primary: '#1a3d2b', accent: '#c8973a' },
      { id: 'theme-business-slate', name: 'Slate & Teal', primary: '#2c3e50', accent: '#17a589' }
    ]
  }
];

const PLANS = {
    starter:  { name: 'Starter',  setup: 299, monthly: 29 },
    growth:   { name: 'Growth',   setup: 499, monthly: 49 },
    campaign: { name: 'Campaign', setup: 699, monthly: 79 }
};

// ===================== State =====================
let currentStep = 1;
let formState = {
    template: null,
    templateSource: 'catalog',
    theme: null,
    themeName: null,
    clientName: '',
    contactEmail: '',
    domainName: '',
    phoneNumber: '',
    primaryColor: '#4FC4F0',
    projectDesc: '',
    mailingList: false,
    plan: null,
    termsAgree: false
};

// Track default colors per preview URL for the modal color picker reset
const previewDefaults = {};
TEMPLATES.forEach(function(t) {
    if (t.themes && t.themes.length) {
        previewDefaults[t.previewUrl] = { primary: t.themes[0].primary, accent: t.themes[0].accent };
    }
});

// ===================== Templates =====================
function renderTemplates(filter) {
    const grid = document.getElementById('templateGrid');
    const filtered = (filter === 'all' || !filter) ? TEMPLATES : TEMPLATES.filter(t => t.category === filter);

    grid.innerHTML = filtered.map(function(t) {
        const selectedTheme = (formState.template === t.id && formState.theme)
            ? t.themes.find(th => th.id === formState.theme)
            : t.themes[0];
        const swatchColor = selectedTheme ? selectedTheme.primary : '#4FC4F0';

        const themeDots = t.themes.map(function(th) {
            const isSelected = formState.template === t.id && formState.theme === th.id;
            return '<div class="theme-dot-pair' + (isSelected ? ' selected' : '') + '" '
                + 'onclick="event.stopPropagation(); selectTheme(\'' + t.id + '\', \'' + th.id + '\')" '
                + 'title="' + th.name + '">'
                + '<div class="theme-dot" style="background:' + th.primary + ';"></div>'
                + '<div class="theme-dot" style="background:' + th.accent + ';"></div>'
                + '<span class="theme-dot-label">' + th.name + '</span>'
                + '</div>';
        }).join('');

        return '<div class="template-card' + (formState.template === t.id ? ' selected' : '') + '" '
            + 'data-id="' + t.id + '" onclick="selectTemplate(\'' + t.id + '\')">'
            + '<div class="template-swatch" style="background:' + swatchColor + ';"></div>'
            + '<div class="template-info">'
            + '<span class="template-category ' + t.category + '">' + t.category + '</span>'
            + '<h4>' + t.name + '</h4>'
            + '<p>' + t.description + '</p>'
            + '<div class="theme-selector">' + themeDots + '</div>'
            + (t.previewUrl ? '<div class="template-actions"><button class="btn-preview" onclick="event.stopPropagation(); openPreview(\'' + t.id + '\')">Live Preview</button></div>' : '')
            + '</div></div>';
    }).join('');
}

function selectTemplate(id) {
    formState.template = id;
    formState.templateSource = 'catalog';
    // Auto-select first theme if none chosen yet for this template
    const tmpl = TEMPLATES.find(t => t.id === id);
    if (tmpl && tmpl.themes.length && !formState.theme) {
        formState.theme = tmpl.themes[0].id;
        formState.themeName = tmpl.themes[0].name;
    } else if (tmpl && tmpl.themes.length) {
        // Ensure the stored theme is valid for this template
        const validTheme = tmpl.themes.find(th => th.id === formState.theme);
        if (!validTheme) {
            formState.theme = tmpl.themes[0].id;
            formState.themeName = tmpl.themes[0].name;
        }
    }
    document.querySelectorAll('.alt-option').forEach(c => c.classList.remove('selected'));
    document.getElementById('step1Next').disabled = false;
    renderTemplates(document.querySelector('.filter-btn.active').dataset.filter);
}

function selectTheme(templateId, themeId) {
    const tmpl = TEMPLATES.find(t => t.id === templateId);
    if (!tmpl) return;
    const theme = tmpl.themes.find(th => th.id === themeId);
    if (!theme) return;
    formState.theme = themeId;
    formState.themeName = theme.name;
    if (formState.template === templateId) {
        // re-render to update swatch and selected state
        renderTemplates(document.querySelector('.filter-btn.active').dataset.filter);
    }
}

function selectAltOption(el, type) {
    formState.template = type;
    formState.templateSource = type;
    formState.theme = null;
    formState.themeName = null;
    document.querySelectorAll('.template-card').forEach(c => c.classList.remove('selected'));
    document.querySelectorAll('.alt-option').forEach(c => c.classList.remove('selected'));
    el.classList.add('selected');
    document.getElementById('step1Next').disabled = false;
}

// Category Filter
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        renderTemplates(btn.dataset.filter);
    });
});

// ===================== Plans =====================
function selectPlan(planId) {
    formState.plan = planId;
    document.querySelectorAll('.plan-card').forEach((c, i) => {
        const ids = ['starter', 'growth', 'campaign'];
        c.classList.toggle('selected', ids[i] === planId);
    });
    updateSummary();
    document.getElementById('summaryCard').style.display = 'block';
    checkSubmitReady();
}

function updateSummary() {
    const plan = PLANS[formState.plan];
    const templateObj = TEMPLATES.find(t => t.id === formState.template);
    const templateName = templateObj
        ? templateObj.name
        : (formState.template === 'envato' ? 'Envato Elements (TBD)' : 'Custom Template');

    document.getElementById('summaryTemplate').textContent = templateName;
    document.getElementById('summaryTheme').textContent = formState.themeName || '—';
    document.getElementById('summaryClient').textContent = formState.clientName || '—';
    document.getElementById('summaryDomain').textContent = formState.domainName || '—';
    document.getElementById('summaryPlan').textContent = plan ? plan.name + ' ($' + plan.monthly + '/mo)' : '—';
    document.getElementById('summaryMailing').textContent = formState.mailingList ? 'Yes' : 'No';
    document.getElementById('summaryTotal').textContent = plan ? '$' + plan.setup : '—';
}

function checkSubmitReady() {
    const ready = formState.plan && formState.termsAgree;
    document.getElementById('submitBtn').disabled = !ready;
}

// ===================== Form =====================
function toggleCheckbox(id) {
    const cb = document.getElementById(id);
    cb.checked = !cb.checked;
    formState[id] = cb.checked;
    if (id === 'termsAgree') checkSubmitReady();
}

document.getElementById('primaryColor').addEventListener('input', function() {
    document.getElementById('colorHex').textContent = this.value.toUpperCase();
    formState.primaryColor = this.value;
});

document.getElementById('logoFile').addEventListener('change', function() {
    if (this.files.length) {
        document.getElementById('logoText').innerHTML = '<strong>' + this.files[0].name + '</strong> selected';
    }
});

function collectFormData() {
    formState.clientName   = document.getElementById('clientName').value.trim();
    formState.contactEmail = document.getElementById('contactEmail').value.trim();
    formState.domainName   = document.getElementById('domainName').value.trim();
    formState.phoneNumber  = document.getElementById('phoneNumber').value.trim();
    formState.primaryColor = document.getElementById('primaryColor').value;
    formState.projectDesc  = document.getElementById('projectDesc').value.trim();
    formState.mailingList  = document.getElementById('mailingList').checked;
}

function validateStep2() {
    let valid = true;
    const fields = [
        { id: 'clientName',    check: v => v.length > 0 },
        { id: 'contactEmail',  check: v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v) },
        { id: 'domainName',    check: v => v.length > 0 }
    ];
    fields.forEach(f => {
        const el  = document.getElementById(f.id);
        const val = el.value.trim();
        if (!f.check(val)) {
            el.classList.add('invalid');
            valid = false;
        } else {
            el.classList.remove('invalid');
        }
    });
    return valid;
}

// ===================== Navigation =====================
function goToStep(step) {
    currentStep = step;
    document.querySelectorAll('.step-panel').forEach((p, i) => {
        p.classList.toggle('active', i + 1 === step);
    });
    document.querySelectorAll('.progress-step').forEach((s, i) => {
        s.classList.remove('active', 'completed');
        if (i + 1 === step) s.classList.add('active');
        if (i + 1 < step)  s.classList.add('completed');
    });
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function nextStep() {
    if (currentStep === 1 && !formState.template) return;
    if (currentStep === 2) {
        collectFormData();
        if (!validateStep2()) return;
    }
    if (currentStep === 3) return;
    goToStep(currentStep + 1);
    if (currentStep === 3) updateSummary();
}

function prevStep() {
    if (currentStep > 1) {
        if (currentStep === 2) collectFormData();
        goToStep(currentStep - 1);
    }
}

// ===================== Submit =====================
async function submitOrder() {
    if (!formState.plan || !formState.termsAgree) return;
    collectFormData();

    const plan        = PLANS[formState.plan];
    const templateObj = TEMPLATES.find(t => t.id === formState.template);
    const themeObj    = templateObj ? templateObj.themes.find(th => th.id === formState.theme) : null;

    goToStep(4);
    document.getElementById('confirmationContent').style.display = 'none';
    document.getElementById('errorContent').style.display        = 'none';
    document.getElementById('loadingContent').style.display      = 'block';

    const payload = {
        form_secret:         'cda8193e84e759c4ec66d7a4b24c11cea631921ae4dce77d',
        template:            formState.template,
        templateSource:      formState.templateSource,
        templateName:        templateObj ? templateObj.name : formState.template,
        theme:               formState.theme   || 'theme-campaign',
        themeName:           formState.themeName || '',
        themePrimary:        themeObj ? themeObj.primary : '#0B1F3A',
        themeAccent:         themeObj ? themeObj.accent  : '#E36A2C',
        clientName:          formState.clientName,
        contactEmail:        formState.contactEmail,
        domainName:          formState.domainName,
        phoneNumber:         formState.phoneNumber,
        primaryColor:        formState.primaryColor,
        projectDescription:  formState.projectDesc,
        mailingList:         formState.mailingList,
        plan:                formState.plan,
        planName:            plan.name,
        setupFee:            plan.setup,
        monthlyFee:          plan.monthly,
        submittedAt:         new Date().toISOString()
    };

    try {
        // NOTE: This secret is a speed bump against automated scanners only.
        // It is visible in page source. Real protection is server-side input validation.
        // Must match the n8n workflow's Secret Check gate, or submissions are routed to
        // "Reject: Unauthorized" and never provisioned.
        const _ws = 'cda8193e84e759c4ec66d7a4b24c11cea631921ae4dce77d';
        const response = await fetch('https://n8n.serendipitylabs.cloud/webhook/initialize-site', {
            method:  'POST',
            headers: {
                'Content-Type':       'application/json',
                'x-onboarding-secret': _ws
            },
            body:    JSON.stringify(payload)
        });

        if (!response.ok) {
            const data = await response.json().catch(() => ({}));
            throw new Error(data.error || 'Server error (' + response.status + ')');
        }

        document.getElementById('loadingContent').style.display      = 'none';
        document.getElementById('confirmationContent').style.display = 'block';
        document.getElementById('dnsDomain').textContent  = formState.domainName;
        document.getElementById('confirmEmail').textContent = formState.contactEmail;

    } catch (error) {
        document.getElementById('loadingContent').style.display = 'none';
        document.getElementById('errorContent').style.display   = 'block';
        document.getElementById('errorMessage').textContent     = error.message;
    }
}

function retrySubmit() {
    goToStep(3);
}

// ===================== Preview Modal =====================
var modalCpPrimary    = document.getElementById('modalCpPrimary');
var modalCpAccent     = document.getElementById('modalCpAccent');
var modalCpPrimaryHex = document.getElementById('modalCpPrimaryHex');
var modalCpAccentHex  = document.getElementById('modalCpAccentHex');
var modalCpReset      = document.getElementById('modalCpReset');
var previewFrame      = document.getElementById('previewFrame');
var currentPreviewUrl = null;

function applyPreviewColors(primary, accent) {
    try {
        var doc  = previewFrame.contentDocument || previewFrame.contentWindow.document;
        var root = doc.documentElement;
        root.style.setProperty('--primary',      primary);
        root.style.setProperty('--primary-dark', shadeColor(primary, -15));
        root.style.setProperty('--accent',       accent);
        root.style.setProperty('--accent-dark',  shadeColor(accent, -15));
    } catch (e) { /* cross-origin guard */ }
}

function shadeColor(hex, pct) {
    var num = parseInt(hex.replace('#', ''), 16);
    var r   = Math.min(255, Math.max(0, (num >> 16)         + pct));
    var g   = Math.min(255, Math.max(0, ((num >> 8) & 0xFF) + pct));
    var b   = Math.min(255, Math.max(0, (num & 0xFF)        + pct));
    return '#' + ((1 << 24) | (r << 16) | (g << 8) | b).toString(16).slice(1);
}

previewFrame.addEventListener('load', function() {
    applyPreviewColors(modalCpPrimary.value, modalCpAccent.value);
});

modalCpPrimary.addEventListener('input', function() {
    modalCpPrimaryHex.textContent = this.value;
    applyPreviewColors(this.value, modalCpAccent.value);
});
modalCpAccent.addEventListener('input', function() {
    modalCpAccentHex.textContent = this.value;
    applyPreviewColors(modalCpPrimary.value, this.value);
});
modalCpReset.addEventListener('click', function() {
    var defaults = (currentPreviewUrl && previewDefaults[currentPreviewUrl])
        ? previewDefaults[currentPreviewUrl]
        : { primary: '#0B1F3A', accent: '#E36A2C' };
    modalCpPrimary.value        = defaults.primary;
    modalCpAccent.value         = defaults.accent;
    modalCpPrimaryHex.textContent = defaults.primary;
    modalCpAccentHex.textContent  = defaults.accent;
    applyPreviewColors(defaults.primary, defaults.accent);
});

function openPreview(templateId) {
    const t = TEMPLATES.find(t => t.id === templateId);
    if (!t || !t.previewUrl) return;
    currentPreviewUrl = t.previewUrl;

    // Set color picker to selected theme or first theme
    const activeTheme = (formState.template === templateId && formState.theme)
        ? t.themes.find(th => th.id === formState.theme)
        : t.themes[0];
    const defaults = activeTheme || { primary: '#0B1F3A', accent: '#E36A2C' };

    modalCpPrimary.value          = defaults.primary;
    modalCpAccent.value           = defaults.accent;
    modalCpPrimaryHex.textContent = defaults.primary;
    modalCpAccentHex.textContent  = defaults.accent;
    // Update reset defaults
    previewDefaults[t.previewUrl] = { primary: defaults.primary, accent: defaults.accent };

    document.getElementById('previewTitle').textContent = t.name + ' — Live Preview';
    previewFrame.src = t.previewUrl;
    document.getElementById('previewModal').classList.add('show');
    document.body.style.overflow = 'hidden';
}

function closePreview() {
    document.getElementById('previewModal').classList.remove('show');
    previewFrame.src = 'about:blank';
    document.body.style.overflow = '';
}

document.getElementById('previewModal').addEventListener('click', function(e) {
    if (e.target === this) closePreview();
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closePreview();
});

// ===================== Init =====================
renderTemplates('all');
</script>

<?php
$footer_simple = true;
include __DIR__ . '/partials/site-footer.php';
include __DIR__ . '/partials/site-contact-modal.php';
?>
