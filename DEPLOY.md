# Deploy — serendipitytechnology.com

**Auto-deploy is live.** Push to `main` → the site updates on the VPS in ~5 seconds. Do **not** edit files on the server directly.

## How it works

```
git push origin main
      │
      ▼
GitHub webhook (push event, main only)
      │  POST https://webhook.serendipitylabs.cloud/hooks/serendipity-site-deploy
      │  (HMAC-SHA256 signed)
      ▼
adnanh/webhook container on the VPS
      │  runs /hooks/deploy-serendipity-site.sh
      ▼
  git fetch + hard-reset to origin/main   (in /docker/serendipitytechnology/site)
  docker compose restart serendipity-tech-site
      ▼
  Live — Apache serves the bind-mounted files
```

## Where things live (VPS `serendipitylabs`, 168.231.71.143)

| Thing | Path |
|-------|------|
| Git repo (bind-mounted to Apache) | `/docker/serendipitytechnology/site` |
| Compose file | `/docker/serendipitytechnology/docker-compose.yml` |
| Container | `serendipity-tech-site` (Apache / PHP 8.2) |
| Deploy script | `/docker/webhook/hooks/deploy-serendipity-site.sh` |
| Webhook config | `/docker/webhook/hooks/hooks.json` (hook id `serendipity-site-deploy`) |
| Deploy log | `/var/log/deploys/serendipity-tech-site.log` *inside the webhook container* — read with `ssh troy@serendipitylabs 'docker exec webhook-webhook-1 tail -30 /var/log/deploys/serendipity-tech-site.log'` (this matches how all the VPS deploy scripts log) |

Hosting note: the site is served **entirely from the VPS**, not HostGator. HostGator is DNS-only. There is no `/main/` path — the site serves at root.

## Rules

1. **Never edit files directly in `/docker/serendipitytechnology/site` on the server.** Every deploy does `git reset --hard origin/main`, so uncommitted server edits are wiped (the deploy script backs any dirty tree up to `_predeploy_stash_*.patch` first, but don't rely on that). Edit locally → commit → push.
2. **`main` is the deploy branch.** Only pushes to `main` deploy. Use branches + PRs for anything you want to review before it goes live.
3. Real user data (`data/candidate_signups/`) and `*.bak.*` files are gitignored — they stay on the server only.

## Manual deploy / rollback

Redeploy current `main`:
```bash
ssh troy@serendipitylabs 'docker exec webhook-webhook-1 /hooks/deploy-serendipity-site.sh'
```

Roll back: revert the commit on `main` and push — the pipeline deploys the revert. (Or `git reset --hard <good-sha>` on the server, but a revert-commit is cleaner and keeps history honest.)
