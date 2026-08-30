<?php

/**
 * بارگذاری ساده متغیرهای محیطی بدون وابستگی به کتابخانه خارجی.
 *
 * env($key, $default):
 *   - ابتدا متغیر واقعی محیط (getenv / $_ENV / $_SERVER) را می‌خواند،
 *   - سپس فایل .env را (در ریشه پروژه) بررسی می‌کند،
 *   - در نهایت مقدار پیش‌فرض را برمی‌گرداند.
 *
 * فایل .env باید در ریشه پروژه باشد و هر خط به شکل KEY=VALUE نوشته شود.
 * خطوطی که با # شروع می‌شوند به عنوان کامنت در نظر گرفته می‌شوند.
 */

function env($key, $default = null)
{
    static $fileEnv = null;

    if ($fileEnv === null) {
        $fileEnv = loadEnvFile();
    }

    $value = getenv($key);

    if ($value === false && isset($_ENV[$key])) {
        $value = $_ENV[$key];
    }

    if ($value === false && isset($_SERVER[$key])) {
        $value = $_SERVER[$key];
    }

    if ($value === false && array_key_exists($key, $fileEnv)) {
        $value = $fileEnv[$key];
    }

    // مقدار خالی ("KEY=") هم باید به پیش‌فرض برگردد
    if ($value === false || $value === null || $value === '') {
        return $default;
    }

    return $value;
}

function loadEnvFile($path = null)
{
    $env = [];

    if ($path === null) {
        $path = dirname(__DIR__) . '/.env';
    }

    if (!is_file($path) || !is_readable($path)) {
        return $env;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if ($lines === false) {
        return $env;
    }

    foreach ($lines as $line) {
        $line = trim($line);

        // رد کردن خطوط خالی و کامنت‌ها
        if ($line === '' || $line[0] === '#' || strpos($line, '=') === false) {
            continue;
        }

        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        // حذف کوتیشن‌های اطراف مقدار (در صورت وجود)
        $length = strlen($value);
        if ($length >= 2) {
            $first = $value[0];
            $last  = $value[$length - 1];
            if (($first === '"' && $last === '"') || ($first === "'" && $last === "'")) {
                $value = substr($value, 1, -1);
            }
        }

        $env[$key] = $value;
    }

    return $env;
}
