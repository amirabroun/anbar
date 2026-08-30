<?php
if (isset($_GET['tracking_code'])) {
    if ($_SESSION['shopping_not'] == $_GET['tracking_code']) {
        require_once 'views/partial/header_shop.php';
        require_once 'views/contents/main/shipping_failed_content.php';
        require_once 'views/partial/footer_shop.php';
    }else{
        setMessage2('warning','عملیات نامشخص');
        redirect('index.php');
    }
}else{
    setMessage2('warning','برای دسترسی به این صفحه باید خریدی انجام دهید');
    redirect('index.php');
}