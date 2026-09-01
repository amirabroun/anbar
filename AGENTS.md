# AGENTS.md — Anbar (anbaritoys.ir)

> Entry point for any AI agent (ZCode, Cline, Claude Code, Cursor, …) working in this repo.
> Read this file fully before changing anything. Deep detail: [`docs/PROJECT.md`](docs/PROJECT.md) · Open work: [`docs/BACKLOG.md`](docs/BACKLOG.md)

## What this project is

`anbaritoys.ir` — a Persian (RTL) toy e-commerce site written in **flat legacy PHP 8.2**: no framework, no Composer autoloader for app code, no build step. MariaDB is accessed via thin model classes with hand-written SQL. The admin panel is the `admin.anbaritoys.ir/` folder — a real subdomain in production, the `/admin/` path in local Docker.

Everything runs in Docker locally (nginx + two php-fpm containers). Production is shared cPanel hosting with Apache.

## Repository map

```
/                          main site (each *.php at root is a page/route)
├── core.php               MAIN BOOTSTRAP — auto-prepended on every main-site request
├── config/app.php         constants: DOMAIN, PUBLIC_URL, ZARINPAL_* (reads .env via env())
├── helpers/               session.php, function.php (global helpers), env.php
├── Database/              database_connector.php — creates the global PDO handle $cn
├── models/                one class per table-ish concept (Product, Brand, Order, …)
├── requests/              request handlers, executed at file scope, gated by pagename()/$_POST['action']
├── views/                 partial/ (headers, footers, navbars, sidebars) + contents/
├── tools/                 kavenegar (SMS SDK), sms-service.php, gateway-payment/idpay.php
├── assets/                css/ (incl. colors/anbar.css + anbar-refresh.css), js, images, fonts
├── admin.anbaritoys.ir/   ADMIN PANEL — its own core.php, models, requests, auth guard
├── photos.anbaritoys.ir/  product/blog photos (prod subdomain; gitignored, real files live on server)
├── public.anbaritoys.ir/  small handler for the public. subdomain
├── docs/                  dockerfiles (Dockerfile, nginx.conf, anbar-admin.ini), project docs
├── .env.example           template for .env (cp .env.example .env)
├── .htaccess / php.ini    PRODUCTION cPanel config (do not "clean up")
└── *.php at root          pages: index, products, single-product, cart, shopping*, profile-*, login/register, callback/verify, api.php, 404.php …
```

Non-obvious: `admin.anbaritoys.ir/` has BOTH `helper/` and `helpers/` directories (legacy duplication — `functions.php` lives in `helper/`, `authentication.php` in `helpers/`). Don't "fix" casually.

## Hard rules for agents

1. **NEVER commit or push on your own.** Verbatim from the owner:
   «فقط ازین به بعد هیج وقت دیگه خودت چیزی رو کامیت نکن» — only commit when explicitly asked *in the current session*, and never push.
2. **Commit style** (when asked): granular Conventional Commits in English (`fix(docker): …`), subject + a body explaining what & why. These commits are shown to the client (کارفرما) — keep them clean.
3. **No secrets in files, commits, or docs.** Real credentials exist in `.env` (never commit it) and as hardcoded fallbacks in `Database/database_connector.php` / `config/app.php`. Never print or copy real DB passwords, `SECRET_TOKEN`, or the zarinpal merchant id into new files.
4. **Respect CRLF.** Most repo files use `\r\n` line endings. Keep them; a script/edit that inserts `\n`-only lines will silently mismatch on `str.replace`-style operations. When instrumenting PHP with Python, try `b'\r\n'` first.
5. **CSS cache-busting:** any change to `assets/css/anbar-refresh.css` (or `colors/anbar.css`) must bump `?v=N` in **all 5 header partials**: `views/partial/header.php`, `header_shop.php`, `header_product.php`, `header_payment.php`, `auth_header.php`.
6. **Don't restructure.** The `auto_prepend_file` + `pagename()`-gated architecture is deliberate (it mimics production Apache). No framework-ification, no PSR-4, no whole-file reformatting (it would destroy CRLF history and blame).
7. **Preserve production files:** `.htaccess` (contains the prod `auto_prepend_file` line), root `php.ini`, `docker-compose.yml`, `docs/dockerfiles/*` are load-bearing.

## Knowledge maintenance — mandatory for every agent

The agent docs are **living operational knowledge, not read-only documentation**. Every agent that works in this repo must hand what it learned to the next one:

1. **Before ending a session, record durable findings in the right file:**
   - Architecture/behavior facts (routes, tables, env keys, deploy steps, quirks) → `docs/PROJECT.md`.
   - A bug you found but did NOT fix (out of scope, or owner decision needed) → `docs/BACKLOG.md` with file, line, symptom, and why it was left.
   - A trap that will bite the next agent (wrong GET params, false-alarm test output, tooling gotchas) → the matching `AGENTS.md` section, 1–2 lines max.
2. **Fixed something? Update or delete the claim that said it was broken.** Stale docs are worse than none.
3. **Facts only, no narration.** One bullet per fact, with the file/function/table name and the *why*. No session logs, no plans, no promises of future work.
4. **Verify before writing.** Only record what you actually ran/grepped/tested in this repo; mark anything unverified explicitly as "suspected, untested".
5. **No secrets, ever** — no passwords, tokens, merchant ids, `?secret=` URLs, or real user data, in any doc.
6. **Don't duplicate.** `AGENTS.md` = rules + traps (short), `docs/PROJECT.md` = deep reference, `docs/BACKLOG.md` = known-but-unfixed. Check the other two before adding; link between them instead of copying.
7. Doc edits are part of the task and stay **uncommitted** like all other changes — commit only when the owner asks in the current session (Hard rule 1). If an existing doc claim is wrong, verify and correct it instead of silently working around it.

## Local development (Docker)

```bash
cp .env.example .env      # then set local values (see below)
docker-compose up -d      # NOTE: standalone `docker-compose`, NOT `docker compose` (plugin absent)
```

Runtime is **colima**. Stack (compose project `anbar`):

| Container | Role |
|---|---|
| `anbar-nginx` | nginx :80 → published on `${APP_PORT}` (currently **8008** → http://localhost:8008) |
| `anbar-php` | php-fpm for the **main site**; `auto_prepend_file=/usr/share/nginx/www/core.php` baked into the image (`anbar.ini`) |
| `anbar-admin-php` | php-fpm for the **admin panel**; same image, but `docs/dockerfiles/anbar-admin.ini` is bind-mounted **over** `conf.d/anbar.ini` so it prepends `admin.anbaritoys.ir/core.php` |

- Network: external `app` (`APP_DOCKER_NETWORK`), shared with the user's other containers (mariadb, phpmyadmin, redis, minio, …). DB is the **external** `mariadb` container (`DB_HOST=mariadb`, db `anbar`). phpMyAdmin shows it as "unhealthy" — it still works.
- Repo is bind-mounted at `/usr/share/nginx/www` in all containers.
- nginx routes `/admin/…` → `anbar-admin-php:9000` and everything else → `anbar-php:9000`.

**Live-reload rules:**
- PHP / CSS / JS edits: instant (opcache `validate_timestamps=On`, `revalidate_freq=2`).
- `docs/dockerfiles/nginx.conf`: `docker exec anbar-nginx nginx -s reload`.
- `docker-compose.yml`: `docker-compose up -d`.
- `docs/dockerfiles/Dockerfile`: `docker-compose up -d --build php`.

**Recreating any PHP container wipes `/tmp` → all sessions die** (shop logins, admin login, carts). Warn the user before `--force-recreate`/rebuild-then-recreate.

**Critical: never reintroduce `fastcgi_param PHP_VALUE "auto_prepend_file=…"` in nginx.conf.** Per-request PHP_VALUE overrides made php-fpm workers flip-flop between the main and admin prepend configs (the 2026-08-31 outage where ~50% of main-site pages 302'd to `/login.php`). Admin/main isolation is now done at the container level. Full case study: `docs/PROJECT.md` § Debugging.

## Environment & config

`helpers/env.php` provides `env($key, $default)`. **Every key has a production fallback**, so a missing `.env` does not crash — it silently points at production. Local `.env` must therefore set at least:

```env
APP_PORT=8008
APP_DOCKER_NETWORK=app
APP_URL=http://localhost:8008
PUBLIC_URL=/photos
ZARINPAL_CALLBACK=http://localhost:8008/callback.php
DB_HOST=mariadb
DB_PORT=3306
DB_DATABASE=anbar
DB_USERNAME=root
DB_PASSWORD=…
```

Keys understood by the code: `APP_URL`, `PUBLIC_URL`, `ZARINPAL_CALLBACK`, `ZARINPAL_MERCHANT_ID`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` (+ compose-only `APP_NAME`, `APP_TITLE`, `APP_PORT`, `APP_DOCKER_NETWORK`).

## Admin panel specifics

- Local URL: `http://localhost:8008/admin/…` — in production it's `https://admin.anbaritoys.ir/…`.
- Login page is **secret-gated**: `/login.php?secret=<whirlpool(SECRET_TOKEN)>`; without the right secret it bounces (`back()`).
- Auth guard `admin.anbaritoys.ir/helpers/authentication.php`: allowed pages `login`, `test`, `LoginRequest`; everyone else needs `$_SESSION['admin_sing']`, else `redirect('/login.php')` — an **absolute** path that is wrong locally (known wart, don't "fix" without the owner).
- Sessions are shared per-container in `/tmp`; shop (`$_SESSION['user_sing']`) and admin (`$_SESSION['admin_sing']`) identities are separate keys in the same session mechanism.

## Admin UI: the new `an-*` shell (2026-09)

- **Every admin page now renders the new shell** (`views/partials/an-{header,side-bar,footer,icon}.php` + `assets/css/admin.css` + `assets/js/admin.js`, IRANYekan fonts). The old Metronic partials/assets are referenced by nothing outside `.trash/` — deletion list: `docs/BACKLOG.md` §16 (needs owner approval + prod cPanel cleanup).
- Wrapper convention (3 lines): `include_once 'views/partials/an-header.php';` → `include_once 'views/contents/X_content.php';` → `include_once 'views/partials/an-footer.php';`. New pages must follow it; don't reintroduce Metronic markup.
- `admin.js` is vanilla; JS hooks are `data-an-*` attributes (uploader: `data-an-product`, `data-an-file`, `data-an-id-name`). Endpoint/field names/JSON shapes are contract — keep them byte-identical.
- **GET-param naming is inconsistent** across product pages (`?products_id=` vs `?product_id=`) — read the `$_GET` key in the page's content file before curl-smoking, or you get false warnings.
- Known **server-side** broken flows (UI fine, backend pre-dates the redesign, see BACKLOG §11–14): banner upload writes to nonexistent `www/user/…`, category-photo branch in `PhotoProductRequest.php` is dead, `create_manager` has no handler, `/test.php` backdoor. Fixing these is a backend decision with the owner, not part of UI work.

## Quick self-check after any change

```bash
for p in / /products /login.php /register.php /cart /admin/login.php; do
  curl -s -o /dev/null -w "%{http_code} $p\n" "http://localhost:8008$p"; done
# 200 expected everywhere EXCEPT /admin/login.php without ?secret= (302 by design)
```

Also grep page bodies for `Warning`/`Notice`/`Fatal` — PHP display_errors is on locally.
