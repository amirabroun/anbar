<?php
if (isset($_POST['discount_code_mmm']) && $_POST['discount_code_mmm'] === 'discount_code_in') {
    $user_id = getIdUsers($_SESSION['user_sing']);
    $select_discount_code = select_discount_code($_POST['discount_code']);
    if ($select_discount_code) {
        $price_code = select_discount_code($_POST['discount_code']);
        $select_discount_code_product_order_org = select_discount_code_product_grop_order($select_discount_code['id']);
        $select_discount_code_product_order_org2 = select_discount_code_product_grop_order2($select_discount_code['id']);
        $select_discount_code_product_order_org3 = select_discount_code_product_grop_order3($select_discount_code['id']);
        $cart_products = $_SESSION['cart_user']['products'];
        $errorss = 0;
        if ($cart_products) {
            foreach ($cart_products as $product) {
                $id_cart = $product['id'];
                if ($select_discount_code_product_order_org){
                    foreach ($select_discount_code_product_order_org as $test) {
                        if ($test['product_id'] === $id_cart) {
                            $product_in_zi = selectproduct2($id_cart);
                            $errorss = 1;
                            setMessage('عملیات ناموفق', $product_in_zi['title'] . ' در سبد خرید شما شامل این تخفیف نمیشود ', 'warning');
                        }
                    }
                }
            }
        }
        if ($errorss != 1) {
            if (!isset($_SESSION['gift_code'])) {
                if ($select_discount_code['stock'] > 0) {
                    if ($_SESSION['cart_user']['summary']['amount_payable'] > (int)$price_code['min_price']) {

                        if (empty($_POST['discount_code'])) {
                            setMessage('عملیات ناموفق', 'لطفا کد تخفیف خود را وارد کنید', 'warning');
                        } else {
                            if ($select_discount_code) {

                                $price_gift_code_price = $price_code['price'];

                                $_SESSION['price_org'] = $price_gift_code_price;
                                $_SESSION['cart_user']['summary']['amount_payable'] -= $price_gift_code_price;

                                setMessage('عملیات موفق', 'مبلغ کد تخفیف از قیمت قابل پرداخت کم شد', 'success');
                                $_SESSION['gift_code'] = 'yes';

                                $_SESSION['gift_code_id'] = $select_discount_code['id'];
                                $_SESSION['gift_code_id_stock'] = $select_discount_code['id'];
                                $_SESSION['gift_code_id_name'] = $select_discount_code['discount_code_one_user_name'];
                                $_SESSION['price_gift_code'] = $price_code['discount_code_one_user_name'];
                                $_SESSION['price_code_in_price'] = $price_code['price'];

                            } else {
                                setMessage('عملیات ناموفق', 'کد تخفیف وارد شده نامعتبر است.', 'error');
                            }
                        }


                    } else {
                        setMessage('عملیات ناموفق', 'حداقل خرید برای استفاده ازین کد تخفیف' . priceFormant($price_code['min_price']) . ' است', 'warning');
                    }
                }else{
                    setMessage('عملیات ناموفق', 'این کد تخفیف منقضی شده است', 'warning');
                }
            } else {
                setMessage('عملیات ناموفق', 'شما از یک کد تخفیف یا یک کد هدیه دیگر استفاده کرده اید', 'warning');
            }

        }
    }else {
        setMessage('عملیات ناموفق', 'کد تخفیف وارد شده نامعتبر است.', 'error');
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'delete_code_in') {
    if (isset($_SESSION['gift_code'])) {
        $_SESSION['gift_code_id'] = $_SESSION['gift_code_id_stock'];
        $select_discount_code = select_discount_codeById($_SESSION['gift_code_id']);
        if ($select_discount_code) {
            $price_code_del = select_discount_codeById($_SESSION['gift_code_id']);
            $price_code_price_in = $price_code_del['price'];
            $_SESSION['price_org'] = $price_code_price_in;
            $_SESSION['cart_user']['summary']['amount_payable'] += $_SESSION['price_code_in_price'];
            unset($_SESSION['gift_code'], $_SESSION['gift_code_id']);
            setMessage('عملیات موفق', ' اعمال کد تخفیف از بین رفت', 'success');
        }
    }else{
        setMessage('هشدار', ' شما کد تخفیف فعالی ندارید', 'warning');
    }
}