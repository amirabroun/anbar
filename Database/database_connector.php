<?php

require_once dirname(__DIR__) . '/helpers/env.php';

$servername = env('DB_HOST', 'localhost');
$port       = env('DB_PORT', '3306');
$username   = env('DB_USERNAME', 'h227443_shop3');
$password   = env('DB_PASSWORD', 'IQM[874{;hA$');
$dbname     = env('DB_DATABASE', 'h227443_shop3');

try {
    $cn = new PDO(
        "mysql:host=$servername;port=$port;dbname=$dbname",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        ]
    );
} catch (PDOException $e) {
    die("خطا در اتصال به دیتابیس");
}