<?php
if (isset($_POST['gift_code']) && $_POST['gift_code'] === 'change_gift_code') {
    $user_id = getIdUsers($_SESSION['user_sing']);
    $select_discount_code_user = select_discount_code_user($_POST['gift_code_name']);
    if ($select_discount_code_user) {
        $select_discount_code_user_order = select_discount_code_user_order($select_discount_code_user['id'], $user_id['id']);
        $price_gift_code=select_discount_code_user($_POST['gift_code_name']);
        $select_discount_code_product_order = select_discount_code_product_order($select_discount_code_user['id']);
        $cart_products = $_SESSION['cart_user']['products'];
        $errorss = 0;
        foreach ($cart_products as $product) {
            $id_cart = $product['id'];
            if ($select_discount_code_product_order){
                foreach ($select_discount_code_product_order as $test) {
                    if ($test['product_id'] === $id_cart) {
                        $product_in_zi = selectproduct2($id_cart);
                        $errorss = 1;
                        setMessage('عملیات ناموفق', $product_in_zi['title'] . ' در سبد خرید شما شامل این تخفیف نمیشود ', 'warning');
                    }
                }
            }
        }

        if ($errorss != 1) {
            if (!isset($_SESSION['gift_code'])) {

                if ($_SESSION['cart_user']['summary']['amount_payable'] > (int)$price_gift_code['min_price']) {

                    if (empty($_POST['gift_code_name'])) {
                        setMessage('عملیات ناموفق', 'لطفا کد هدیه خود را وارد کنید', 'warning');
                    } else {
                        if ($select_discount_code_user) {
                            if ($select_discount_code_user_order) {

                                $price_gift_code_price = $price_gift_code['price'];

                                $_SESSION['price_org'] = $price_gift_code_price;
                                $_SESSION['cart_user']['summary']['amount_payable'] -= $price_gift_code_price;

                                setMessage('عملیات موفق', 'مبلغ کارت هدیه از قیمت قابل پرداخت کم شد', 'success');
                                $_SESSION['gift_code'] = 'yes';
                                $_SESSION['gift_code_id'] = $select_discount_code_user_order['discount_id'];
                                $_SESSION['gift_code_id_user'] = $select_discount_code_user_order['discount_id'];
                                $_SESSION['gift_code_id_id'] = $select_discount_code_user_order['id'];
                                $_SESSION['gift_code_id_name'] = $select_discount_code_user['discount_code_one_user_name'];
                                $_SESSION['price_gift_code'] = $price_gift_code['discount_code_one_user_name'];
                                $_SESSION['price_code_in_price'] = $price_gift_code['price'];

                            } else {
                                setMessage('عملیات ناموفق', 'این کد هدیه برای شما قابل استفاده نمیباشد', 'warning');
                            }
                        } else {
                            setMessage('عملیات ناموفق', 'کد هدیه وارد شده نامعتبر است.', 'error');
                        }
                    }


                } else {
                    setMessage('عملیات ناموفق', 'حداقل خرید برای استفاده ازین کد تخفیف' . priceFormant($price_gift_code['min_price']) . ' است', 'warning');
                }
            } else {
                setMessage('عملیات ناموفق', 'شما از یک کد تخفیف یا یک کد هدیه دیگر استفاده کرده اید', 'warning');
            }
        }
    }
    else {
        setMessage('عملیات ناموفق', 'کد هدیه وارد شده نامعتبر است.', 'error');
    }
}
