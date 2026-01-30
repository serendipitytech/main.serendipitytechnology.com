# Unified Business Communications Inbox - Project Roadmap

## Session Summary (2026-01-29)

### Project Goal
Transform the existing `chat_ui.html` into a secure unified inbox that combines SMS conversations and voicemail transcripts with AI analysis, enabling quick responses from the business number.

### Current Infrastructure

| Component | Value |
|-----------|-------|
| Twilio Number | 407-545-6070 |
| Twilio SID | ACf64e57b65ff3e1aa9090dafb4b524f7e |
| Phone Number SID | PNb5d6efd56b984024b002f70c6d42052e |
| Personal Cell | 407-443-6844 |
| n8n Instance | https://n8n.serendipitylabs.cloud |
| Voicemail Webhook | https://n8n.serendipitylabs.cloud/webhook/twilio-voicemail |
| Studio Flow SID | FW555afc681cbde70a439747e2085a0477 |

### Existing System Analysis

**Working Components:**
- Voicemail flow: Call → Twilio Studio → Recording → Transcription → n8n → Claude AI analysis → SMS notification
- Basic SMS send/receive via `send_sms.php` and `sms_inbound.php`
- Simple chat UI at `chat_ui.html` (polls `sms_log.json`)

**Current Issues:**
1. No authentication on chat interface
2. No Twilio webhook signature validation
3. Hardcoded credentials in PHP files
4. Flat file storage (`sms_log.json`) publicly accessible
5. No rate limiting
6. Voicemails not integrated into dashboard
7. Spam filtering needed

### Voicemail Notification Format (from n8n)
```
🟡 VM from (386) 853-1580
Sales Call | MEDIUM
[AI summary of voicemail]
💬 Suggested: [AI suggested response]
🔊 [recording URL]
```

---

## Architecture Decisions

| Decision | Choice | Rationale |
|----------|--------|-----------|
| Authentication | Simple password in `.env` | Single user, keep it simple |
| Database | File-based JSON (for now) | Quick to implement, can migrate later |
| Real-time | Polling (5s) | Simple, upgrade to WebSocket if needed |
| Framework | Vanilla PHP + JS | Match existing stack |
| Supabase | Not using | Avoid complexity for MVP |

---

## Implementation Roadmap

### Phase 1: Security Foundation
- [ ] Create `.env` file structure
- [ ] Create `config.php` to load environment variables
- [ ] Move Twilio credentials from hardcoded to `.env`
- [ ] Add Twilio webhook signature validation to `sms_inbound.php`
- [ ] Create `auth.php` session-based authentication
- [ ] Create `login.html` login page
- [ ] Protect dashboard endpoints with auth check

### Phase 2: Data Layer
- [ ] Create `data/` directory for JSON storage
- [ ] Restructure message storage: `data/messages.json`
- [ ] Create voicemail storage: `data/voicemails.json`
- [ ] Create `api/messages.php` - GET/POST messages
- [ ] Create `api/voicemails.php` - GET voicemails
- [ ] Create `api/webhook-voicemail.php` - receive voicemail data from n8n
- [ ] Migrate existing `sms_log.json` data

### Phase 3: Unified Inbox UI
- [ ] Replace `chat_ui.html` with new unified inbox
- [ ] Left panel: Conversation list (SMS + Voicemail threads grouped by number)
- [ ] Unread/new message indicators
- [ ] Voicemail cards with:
  - AI urgency badge (🔴 HIGH / 🟡 MEDIUM / 🟢 LOW)
  - Category label
  - AI summary
  - Audio player
  - "Send Suggested Response" button
- [ ] SMS thread view with chat bubbles
- [ ] Reply form (sends from business number)
- [ ] Real-time polling for new messages

### Phase 4: n8n Integration Updates
- [ ] Create new n8n workflow node to POST voicemail data to website
- [ ] Update inbound SMS webhook to notify dashboard
- [ ] Add spam detection logic (optional)

### Phase 5: Polish & Enhancements (Future)
- [ ] WebSocket for true real-time updates
- [ ] Contact name labels (simple contacts.json lookup)
- [ ] Message search
- [ ] Archive/delete conversations
- [ ] Spam marking and filtering
- [ ] Mobile-responsive improvements
- [ ] Migrate to Supabase for persistent storage

---

## File Structure (Planned)

```
serendipitytechnology.com/
├── .env                      # Credentials (gitignored)
├── config.php                # Load env vars
├── auth.php                  # Session auth helpers
├── login.html                # Login page
├── chat_ui.html              # Unified inbox (replaces old version)
├── api/
│   ├── messages.php          # GET/POST SMS messages
│   ├── voicemails.php        # GET voicemails
│   └── webhook-voicemail.php # Receive from n8n
├── data/                     # JSON storage (gitignored)
│   ├── messages.json
│   └── voicemails.json
├── send_sms.php              # Updated to use config.php
├── sms_inbound.php           # Updated with validation + auth
└── ...
```

---

## Environment Variables Needed

```env
# Twilio
TWILIO_ACCOUNT_SID=ACf64e57b65ff3e1aa9090dafb4b524f7e
TWILIO_AUTH_TOKEN=<rotated_token>
TWILIO_PHONE_NUMBER=+14075456070

# Dashboard Auth
DASHBOARD_PASSWORD=<secure_password>

# Webhook Secret (for n8n → website)
WEBHOOK_SECRET=<random_string>
```

---

## Next Steps (When Resuming)

1. Start with Phase 1: Create `.env`, `config.php`, and auth layer
2. Test auth flow works before proceeding
3. Build out API endpoints (Phase 2)
4. Then tackle the UI (Phase 3)

---

## Reference: Current File Contents

### sms_inbound.php (needs updating)
- Receives Twilio webhook POST
- No signature validation
- Appends to `sms_log.json`

### send_sms.php (needs updating)
- Hardcoded credentials
- Sends via Twilio SDK
- Logs to `sms_log.json`

### chat_ui.html (to be replaced)
- Tailwind CSS via CDN
- Two-panel layout (conversation list + messages)
- Polls `sms_log.json` every 5 seconds
- No authentication
