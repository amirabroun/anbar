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

## Admin shell migration leftovers (2026-09 redesign)

All ~70 admin pages now render the new `an-*` shell (see PROJECT.md §4). The old Metronic partials/assets are referenced by **nothing** outside `.trash/`. Items below were found during the conversion and intentionally left untouched (UI-only scope):

11. **Banner upload is broken server-side** — `requests/banner/changePic.php` (actions `changeBanner1/2/3`) moves uploads to `../../../user/assets/img/banner/` = `www/user/…`, which does not exist. The new UI surface (forms, flash, error toast) works; the file never lands anywhere.
12. **Category-photo upload branch is dead** — in `requests/PhotoProductRequest.php` the `photo_category` branch (a) requires `$_POST['category_id']` while the client sends `product_id`, (b) reads `$_FILES['photo_product']` instead of `photo_category`, (c) looks up via `getLastPhotoProduct($_POST['product_id'])`. Until fixed server-side, `manage_category_photos.php` cannot actually upload category images.
13. **create_manager has no backend** — the form ships no `name` attributes and no request handler; submitting does nothing. The managers list used to be a hardcoded demo table and is now an honest empty state. Building manager CRUD needs owner input (roles?).
14. **`/test.php` backdoor** — reachable without auth (it is on the guard's public-page list). Remove or gate it.
15. **Legacy GET-param naming across product pages** — `update_products.php`, `create_product_variety.php`, `manage_products_variety.php` take `?products_id=`; `manage_products_photos.php`, `manage_products_category.php`, `create_details.php` take `?product_id=`. Links match readers today, but curl-smoking a page with the wrong key produces false "undefined key" warnings — read the `$_GET` key in the page's `views/contents/*_content.php` first.
16. **Delete the old Metronic shell** (needs owner approval, then the same deletion on prod cPanel): `views/partials/{header,side-bar,footer,2 (1),2 (2)}.php`, `assets/plugins/` (30M), `assets/css/{style.bundle.css,style.bundle.rtl.css,pages/,themes/,fonts.css}`, `assets/js/{pages/,scripts.bundle.js,app.js}`, `assets/media/` **except** `logos/favicon.ico` (login.php references it), and the orphan `photoTest/` folder. ≈53 of 57M assets reclaimable. Keep `assets/css/admin.css`, `assets/js/admin.js`, `assets/fonts/`, `views/partials/an-*.php`.

## Hygiene

8. **`.trash/` tracking** — ~2758 files under `admin.anbaritoys.ir/.trash/` (a gitignored dir) are still tracked from the init commit. Remove from the index (`git rm -r --cached`).
9. **Stray root files** — `538541.txt`, `note.pdf`, `seo.pdf`, `seo2.pdf`, `order.pptx`, `test.html`, `cart.png`, `login.png`, `*.pptx/pdf` at root: confirm with owner, then move into `docs/` or delete.
10. **Kavenegar SMS keys** — wire real API keys for login/register verification (currently a deployment stub).

## Operational notes (not bugs)

- Sessions live in each container's `/tmp` — any container recreation logs out all shop users and admins. If uptime of logins matters, move sessions to Redis (external `redis` container already exists on the `app` network).
- `docker ps` shows the shared `mariadb` container `unhealthy` — cosmetic; it serves fine.
- Local admin login requires the secret URL (`?secret=whirlpool(SECRET_TOKEN)`).
