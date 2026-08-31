# Anbar (anbaritoys.ir) — Project Reference

Deep reference for AI agents and new developers. Start with [`../AGENTS.md`](../AGENTS.md); this file goes one level deeper. Open work items: [`BACKLOG.md`](BACKLOG.md).

---

## 1. Stack & identity

| | |
|---|---|
| Product | Persian (RTL) toy e-commerce, `anbaritoys.ir` |
| Code | Flat legacy PHP 8.2, no framework, no Composer app autoload, no build step |
| DB | MariaDB via PDO; raw SQL in `models/`; **no migrations** — schema exists only in the live DB (inspect via phpMyAdmin on the external `mariadb` container) |
| Frontend | Server-rendered PHP views, custom CSS (`assets/css/`), Persian fonts, RTL everywhere |
| Local runtime | Docker (colima): nginx + 2× php-fpm containers |
| Production | Shared cPanel hosting (Apache + lsapi), real subdomains |
| Repo layout | Main site at root; admin in `admin.anbaritoys.ir/` subdir; photos in `photos.anbaritoys.ir/` subdir |

The subdirectory names match **production subdomains**. In production, each folder is the docroot of its real subdomain. Locally, one nginx server emulates all of them with path prefixes (`/admin/`, photos under `PUBLIC_URL=/photos`). Code must therefore keep working under both models — this is why `config/app.php` derives `DOMAIN` / `PUBLIC_URL` / `DOCUMENT_ROOT_DOMAIN` from env instead of hardcoding.

## 2. Request lifecycle (main site)

`docs/dockerfiles/Dockerfile` bakes `auto_prepend_file=/usr/share/nginx/www/core.php` into the image (this mimics production Apache, where `.htaccess` does `php_value auto_prepend_file "/home/h227443/public_html/core.php"`). So **every request runs `core.php` first**, which:

```
core.php
├─ guard: if (defined('DOMAIN')) return;      // idempotency
├─ config/app.php          → require helpers/env.php; defines DOMAIN, PUBLIC_URL,
│                            DOCUMENT_ROOT_DOMAIN, GATEWAY_PAYMENT (zarinpal), ZARINPAL_*
├─ helpers/session.php     → ob_start(); 365-day cookie (secure/httponly/SameSite=Lax);
│                            session_start()
├─ helpers/function.php    → global helpers (see below)
├─ Database/database_connector.php → global PDO handle $cn (ERRMODE_EXCEPTION,
│                            FETCH_ASSOC, SET NAMES utf8); on failure dies with a
│                            Persian message (so a DB outage ≠ redirect, it's an error page)
├─ tools/                  → kavenegar SDK autoload, sms-service.php, idpay gateway
├─ models/                 → 16 classes: Category, Brand, Product, Photo, User, Address,
│                            deleteAddress, search, interest, order, payment,
│                            discount_code, factor, coment, contact_us, perper
└─ requests/               → 18+ handler files, INCLUDED AT FILE SCOPE on every request
```

**The `requests/` pattern is the heart of the codebase.** Every request file executes on *every* page load; it self-gates so only the matching page/action actually runs:

```php
// page-scoped: run only when the URL is /cart.php
if (pagename() === 'cart') { ... }

// action-scoped: run only on POST with a matching action name
if (isset($_POST['action']) && $_POST['action'] === 'add_to_cart') { ... }
```

Key helpers from `helpers/function.php`:

- `pagename()` — `basename($_SERVER['SCRIPT_NAME'])` without `.php` (e.g. `single-product.php` → `single-product`).
- `POST($k)` / `GET($k)` — null-safe superglobal access.
- `redirect($url='/')` — `header("Location:$url"); exit();`
- `back()` — redirect to the referring page.
- `authUser()` — returns `$_SESSION['user_sing'] ?? false` (the logged-in shop user).
- `setMessage($title,$text,$type)` / `setMessage2($text,$type)` — flash messages consumed by views.
- `dd(...)` — var_dump + exit (debug only).

Pages then `include` view partials from `views/partial/` (headers, navbar, footers, sidebars) and `views/contents/`. There are **5 different header partials** (`header`, `header_shop`, `header_product`, `header_payment`, `auth_header`) — asset tags must be kept in sync across all of them (see cache-busting rule in AGENTS.md).

**Gotcha:** `helpers/session.php` calls `ob_start()`. Anything `echo`ed before a `redirect()`+`exit()` is silently discarded by the output buffer. When debugging, don't rely on echo — use `header('X-...: ...')` markers (headers survive the buffer) or `file_put_contents('/tmp/…', …)`.

## 3. Auth & sessions

- One session, two identities: `$_SESSION['user_sing']` (shop customer) and `$_SESSION['admin_sing']` (admin). `restart_session.php` exists for session regeneration.
- Cookie: 365-day lifetime, `path=/`, httponly, `SameSite=Lax`, `secure` when HTTPS.
- Shop login flow: `login.php` / `register.php` → SMS verification code (`requests/authentication/{LoginRequest,RegisterRequest,VerifyRequest}.php`, SMS via **Kavenegar**, `tools/kavenegar/`). Session lifetime extended via `gc_maxlifetime` (365 days).
- Session data lives in the **container's** `/tmp` — recreating a php-fpm container logs everyone out (shop + admin).
- Admin login page additionally requires `?secret=` equal to `whirlpool(SECRET_TOKEN)` (constant defined in `admin.anbaritoys.ir/config/app.php`). Value is secret — never write it down anywhere.

## 4. Admin panel

- Folder: `admin.anbaritoys.ir/` — own `core.php` (same pattern as main, plus `helpers/authentication.php`), own `models/` (Manager, collection, about_us, Color, Battery, Detail, Guarantee, Memory, Pack, Ram, Variety, …) and `requests/` (CategoryRequest, ProductsRequest, PhotoProductRequest, …).
- Guard: pages `login`, `test`, `LoginRequest` are public; everything else requires `$_SESSION['admin_sing']`.
- Known quirks:
  - Both `helper/` and `helpers/` directories exist (legacy).
  - `redirect('/login.php')` is an absolute path — correct on the prod subdomain, breaks locally under `/admin/` (locally it lands on the main site's `/login.php`).
  - Admin pages are CRUD-style (`create_products.php`, `manage_all_products.php`, `manage_brand.php`, …) rendered with admin-side views/assets.
- Product deletion cascades across related tables (photos, category links, varieties, comments, discount-code links, order lines …) — see the delete logic in `admin.anbaritoys.ir/models/Product.php` before touching product data.

## 5. Payments & SMS

- **Zarinpal** is the configured gateway (`GATEWAY_PAYMENT` in `config/app.php`; merchant id from `env('ZARINPAL_MERCHANT_ID')` with a production fallback). Flow: `shopping-payment.php` → zarinpal → `callback.php` → `verify.php`.
  ⚠️ **Known hole:** `callback.php` currently trusts `$_GET['Status']` from the redirect instead of verifying server-side. `verify.php` exists but isn't wired into the flow. See BACKLOG.
- **IDPay** SDK also present (`tools/gateway-payment/idpay.php`) — legacy/alternative.
- **SMS**: Kavenegar SDK (`tools/kavenegar/`) wrapped by `tools/sms-service.php`; used for login/register verification codes. Real API keys are a deployment concern.

## 6. Docker topology (local)

```
                        external network "app" (shared with user's other projects)
                        ┌──────────────────────────────────────────────┐
 host :8008 ──► anbar-nginx (nginx:alpine)                              │
                │  mounts: . → /usr/share/nginx/www                     │
                │          docs/dockerfiles/nginx.conf → default.conf   │
                ├── /admin/*.php ──► anbar-admin-php:9000               │
                └── everything else ─► anbar-php:9000                   │
                                                                        │
 anbar-php     (image anbar-php; prepend = main core.php)               │
 anbar-admin-php (same image; docs/dockerfiles/anbar-admin.ini mounted  │
                  OVER conf.d/anbar.ini; prepend = admin core.php)      │
 both talk to external container "mariadb" (DB anbar) ──────────────────┘
```

- Image `anbar-php`: `php:8.2.6-fpm` + pdo_mysql, mbstring, gd, zip, intl, exif, bcmath, opcache, sockets; uploads 200M; runs as user `www` (uid 1000); `COPY . .` is shadowed by the bind mount.
- Compose file: `docker-compose.yml`; overrides in `docker-compose.override.yml`; secrets/config via `.env` (`APP_PORT=8008`, `APP_DOCKER_NETWORK=app`).
- Use the **standalone `docker-compose` binary** (`docker compose` plugin is not installed). Runtime is **colima**, not Docker Desktop.
- `mariadb` container is shared with the user's other projects and shows `unhealthy` in `docker ps` — it still serves fine; don't "fix" it as part of anbar work.

## 7. Production deployment model (cPanel)

- cPanel account `h227443`; main site docroot `public_html/` ← repo root; `admin.anbaritoys.ir/` and `photos.anbaritoys.ir/` are real subdomain docroots.
- `.htaccess` at root carries the prod prepend (`php_value auto_prepend_file "/home/h227443/public_html/core.php"`) — **this is the production equivalent of the Docker `anbar.ini`**. Keep both in sync conceptually.
- `helpers/env.php` must be uploaded to production (it's required by `config/app.php` and `Database/database_connector.php`), even though prod usually runs without a `.env` — every `env()` call falls back to hardcoded production values.
- Root `php.ini` is a cPanel relic; `docs/dockerfiles/nginx.conf` is **local-only** (prod is Apache).
- `admin.anbaritoys.ir/core.php` includes its own `Database/database_connector.php` (admin has a private copy of the Database folder).

## 8. Debugging playbook

**Toolbox:**
- `docker exec anbar-php php -l file.php` — lint in the same PHP the site runs.
- `docker compose`/`docker-compose logs -f anbar-php anbar-nginx`; per-page PHP errors also land in root `error_log` (gitignored).
- Display errors are ON locally — grep rendered HTML for `Warning|Notice|Fatal|Deprecated`.
- cURL checks: `curl -sI http://localhost:8008/...` for status + headers.

**Header tracing (the reliable technique).** Because `session.php` starts `ob_start()`, echo-based debug output is silently discarded on any `redirect()`+`exit()`. Instead:
1. Inject a marker in the suspect file: `header('X-Trace: ' . __FILE__ . ' ap=' . ini_get('auto_prepend_file'));` (mind CRLF when editing programmatically — try `b'\r\n'` before `b'\n'`).
2. Read it with `curl -sI`.
3. For environment dumps: `file_put_contents('/tmp/x.json', json_encode($_SERVER, JSON_PRETTY_PRINT));` then `docker exec` to read.
4. Remove instrumentation afterwards.

**Case study — the 2026-08-31 "homepage sometimes redirects to /login.php" incident.**
Symptom: intermittently ~50% of *main-site* requests returned `302 → /login.php` with an empty body.
Root cause: one php-fpm container (`anbar-php`) served both main site and admin. Admin requests were routed by nginx with a per-request `fastcgi_param PHP_VALUE "auto_prepend_file=…admin…/core.php"` override. Stale worker state in the shared pool made main-site requests intermittently execute with the *admin* prepend config → admin auth guard ran on `index.php` → not logged in as admin → `redirect('/login.php')`. Same URL, flip-flopping behavior depending on which worker handled the request (the user aptly called it "load balancing").
Fix: **structural isolation** — new `admin-php` compose service reusing image `anbar-php` with `docs/dockerfiles/anbar-admin.ini` bind-mounted over `conf.d/anbar.ini`; nginx `/admin/` block now `fastcgi_pass anbar-admin-php:9000`; the `PHP_VALUE` override was deleted entirely. Verified by 15/15 main-site 200s and `php-fpm -i` in both containers showing distinct `auto_prepend_file` values.
Lessons: (1) never mix per-request ini overrides with a shared fpm pool — isolate at the container level; (2) trace with response headers, not echo (ob_start); (3) when a bug smells like environment state, restart only *proves* it's stateful — keep digging for the mechanism.

**Frontend verification.** For design/CSS work, don't trust a single screenshot: verify with computed-style/geometry audits in the browser DOM (positions, sizes, overflow, z-index, RTL alignment). Screenshot-analysis tooling on harness CDN URLs is unreliable.

## 9. Conventions

- **Commits**: granular, Conventional Commits, English, with what/why bodies (client-facing). Never commit/push unprompted. Never commit `.env`, `error_log`.
- **CSS changes** → bump `?v=N` in all 5 header partials (`header`, `header_shop`, `header_product`, `header_payment`, `auth_header`). Current version: `?v=7`. `anbar-refresh.css` is the consolidated design layer (single source for overrides; `colors/anbar.css` holds palette tokens).
- **CRLF** line endings throughout — preserve.
- **Persian first**: all user-facing strings are Persian; code identifiers are English. Commit messages English.
- **Don't refactor wholesale.** Legacy patterns (file-scope request gating, mixed `helper(s)`, absolute redirects) are known and accepted; change only what the task names.
