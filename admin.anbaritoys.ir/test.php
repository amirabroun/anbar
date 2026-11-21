<?php
// was a public backdoor printing whirlpool(SECRET_TOKEN) — the admin login secret
// URL (BACKLOG #14) — now gated behind the admin session
if (!isset($_SESSION['admin_sing'])) {
    http_response_code(403);
    die('forbidden');
}
dd(whirlpool(SECRET_TOKEN));