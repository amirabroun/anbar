<?php
if (isset($_GET['tracking_code'])) {
    if ($_SESSION['shopping_yes'] == $_GET['tracking_code']) {
        require_once 'views/partial/header_shop.php';
        require_once 'views/contents/main/shipping_success_content.php';
        require_once 'views/partial/footer_shop.php';
    }else{
        setMessage2('warning','عملیات نامشخص');
        redirect('index.php');
    }
}else{
    setMessage2('warning','برای دسترسی به این صفحه باید خریدی انجام دهید');
    redirect('index.php');
}