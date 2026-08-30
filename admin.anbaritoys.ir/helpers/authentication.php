<?php
$ignore_pages = [
    'login',
    'test',
    'LoginRequest',
];

if (!isset($_SESSION['admin_sing']) && !in_array(pagename(),$ignore_pages)){
    redirect('/login.php');
}
