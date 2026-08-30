<?php
require_once 'views/partial/header.php';
require_once 'views/partial/navbar.php';
if (isset($_SESSION['cart_user']) && count($_SESSION['cart_user']['products'])>0){
    require_once 'views/contents/cart/cart_content.php';
}else{
    require_once 'views/contents/cart/cart_empty_content.php';
}

require_once 'views/partial/footer.php';