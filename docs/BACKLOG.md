# Anbar — Open Backlog

Staged, known-but-unfixed items. Ordered roughly by priority. Nothing here is committed to a date; pick items with the owner (کارفرما) first.

## Security

1. **Zarinpal verification wiring** — `callback.php` trusts `$_GET['Status']` from the gateway redirect. `verify.php` exists but is not wired in. Orders can be marked paid without a server-side verify call against zarinpal. *(highest-value fix)*
2. **Rotate hardcoded credentials** — real DB password, `SECRET_TOKEN`, and the zarinpal merchant id are hardcoded as `env()` fallbacks in `Database/database_connector.php` / `config/app.php` and are already in git history. Rotation must happen at the provider side (git history can't be rewritten safely here).
3. **CSRF protection for admin actions** — admin CRUD endpoints accept POSTs without tokens.
4. **nginx deny rules (local Docker)** — currently downloadable over HTTP: `/.env`, `/error_log`, `/.git/*`, `/docs/*`, `*.sql|zip` bundles, `docker-compose*.yml`. Proposed blocklist was drafted but NOT applied. (Prod is cPanel/Apache and needs its own rules.)

## Bugs / UX

5. **Admin guard absolute redirect** — `admin.anbaritoys.ir/helpers/authentication.php` does `redirect('/login.php')`; correct on the prod subdomain, but locally sends you to the *main site's* login. Needs a base-path-aware redirect.
6. **products.php performance** — renders the whole catalog ~4× per page (≈85k DOM nodes). Needs real pagination + query consolidation.
7. **Broken product images** — 9 DB photo rows point at missing files; either re-upload or clean the rows.

## Hygiene

8. **`.trash/` tracking** — ~2758 files under `admin.anbaritoys.ir/.trash/` (a gitignored dir) are still tracked from the init commit. Remove from the index (`git rm -r --cached`).
9. **Stray root files** — `538541.txt`, `note.pdf`, `seo.pdf`, `seo2.pdf`, `order.pptx`, `test.html`, `cart.png`, `login.png`, `*.pptx/pdf` at root: confirm with owner, then move into `docs/` or delete.
10. **Kavenegar SMS keys** — wire real API keys for login/register verification (currently a deployment stub).

## Operational notes (not bugs)

- Sessions live in each container's `/tmp` — any container recreation logs out all shop users and admins. If uptime of logins matters, move sessions to Redis (external `redis` container already exists on the `app` network).
- `docker ps` shows the shared `mariadb` container `unhealthy` — cosmetic; it serves fine.
- Local admin login requires the secret URL (`?secret=whirlpool(SECRET_TOKEN)`).
