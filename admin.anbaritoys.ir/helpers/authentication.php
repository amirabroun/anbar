<?php
$ignore_pages = [
    'login',
    'test',
    'LoginRequest',
];

if (!isset($_SESSION['admin_sing']) && !in_array(pagename(),$ignore_pages)){
    // prod serves the panel at admin.anbaritoys.ir root; local Docker under /admin/ —
    // bounce inside the panel instead of the main site's login (BACKLOG #5)
    $admin_base = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? '/'), '/');
    redirect($admin_base . '/login.php');
}
