<?php
$change_cart_foll = $_SESSION['cart_user']['summary']['amount_payable'];

echo priceFormant($change_cart_foll);
