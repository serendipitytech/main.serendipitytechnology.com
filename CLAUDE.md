# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Serendipity Technology marketing website with SMS/email contact functionality via Twilio integration.

**Tech Stack:**
- Backend: PHP 7.1+ (procedural, no framework)
- Frontend: HTML5, vanilla JavaScript, CSS + Tailwind (CDN)
- SMS/Phone: Twilio PHP SDK v8.6.3
- Animations: AOS (Animate on Scroll) v2.3.4

## Development

No build process required. This is a static PHP site that can be served directly by any PHP-enabled web server.

**Local development:**
```bash
php -S localhost:8000
```

## Architecture

### Data Flow
1. User submits contact form → `contact_twilio.php`
2. Handler validates input → Sends email OR SMS via Twilio API
3. SMS messages logged to `sms_log.json` (newline-delimited JSON)
4. `chat_ui.html` polls `sms_log.json` every 5 seconds for conversation display
5. Inbound SMS webhook → `sms_inbound.php` → appends to `sms_log.json`

### Key Files
| File | Purpose |
|------|---------|
| `index.html.original` | Main landing page |
| `contact_twilio.php` | Contact form handler (email + SMS) |
| `send_sms.php` | SMS sending utility for chat interface |
| `sms_inbound.php` | Twilio webhook for incoming SMS |
| `chat_ui.html` | Admin SMS conversation viewer |
| `css/concierge_style.css` | Main stylesheet |

### Directory Structure
- `css/` - Stylesheets
- `img/` - SVG icons and PNG assets
- `vendor/twilio/sdk/` - Twilio PHP SDK (do not modify)
- `crm/`, `help/`, `phone/` - Private directories

## Known Issues

**Credentials are hardcoded** in `contact_twilio.php` and `send_sms.php`. These should be moved to environment variables before any credential rotation.

**File-based logging** (`sms_log.json`) has no access control and won't scale. Consider database migration for production use.
