<?php
$change_cart_foll_total = $_SESSION['cart_user']['summary']['total_amount'];

echo priceFormant($change_cart_foll_total);
