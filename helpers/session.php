<?php
ob_start();

// پارامترهای کوکی سشن باید قبل از session_start تنظیم شوند؛
// path=/ است تا کوکی در کل سایت معتبر بماند و کاربر لاگ‌اوت تصادفی نشود.
$expire = 365 * 24 * 3600;
session_set_cookie_params([
    'lifetime' => $expire,
    'path' => '/',
    'domain' => '',
    'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    'httponly' => true,
    'samesite' => 'Lax',
]);
ini_set('session.gc_maxlifetime', $expire);
session_start();
