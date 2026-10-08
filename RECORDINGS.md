# Meeting recording share (/watch)

Private, branded recording pages at `https://serendipitytechnology.com/watch/<slug>`.

## Publish
```bash
/docker/serendipitytechnology/scripts/publish-recording.sh ~/Zoom/meeting.mp4 \
  --client "Acme Corp" [--title "Kickoff call"] [--expires 60d|2w|12h|never] \
  [--no-password] [--password "override"] [--move]
```
Prints the link. Password defaults to the client name (case-insensitive, trimmed); it is a soft gate, the 12-char random slug is the real secret.
Other commands: `--list` (views/plays/downloads/first view), `--revoke <slug>`, `--cleanup` (delete expired/revoked/orphan files).

## How it works
- Files: `site/data/recordings/rec_<hex>.mp4` + `recordings.db` (SQLite) + `.hmac_key`. Gitignored, denied by Apache (`data/.htaccess`), only served via `watch.php` with Range support (mod_xsendfile is not installed, PHP chunked fallback).
- Routes (`.htaccess`): `/watch/<slug>`, `/watch/<slug>/stream`, `/watch/<slug>/download`.
- Password cookie: stateless HMAC, 12h, path-scoped to the slug. 10 wrong tries per slug per 15 min locks the form.
- Views count only after the gate and ignore bots/link-preview UAs. `plays` = stream starts at byte 0.
- Expired links show a friendly 410 page and delete the file on first visit; `--cleanup` sweeps the rest.
- noindex: meta tag, `X-Robots-Tag`, and `Disallow: /watch/` in robots.txt.
- Not in git: recordings. Publishing needs this feature deployed (the CLI lives in `lib/`).
