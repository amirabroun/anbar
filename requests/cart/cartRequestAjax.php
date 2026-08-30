<?php
if (isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
    if (!isset($_SESSION['gift_code'])){
        $details_products2 = getDetailsProducts($_POST['item']);
        if (!$details_products2 || (int)$details_products2['stock'] === 0 || $details_products2['status'] == 'unavailable') {
            responseJson([
                'text' => 'محصول قابل فروش نیست یا پیدا نشد',
                'type' => 'warning',
                'status' => 400,
            ]);
            back();
        }
        $product = [
            'id' => $details_products2['id'],
            'quantity' => 1,
            'price' => $details_products2['price'],
            'price_discounted' => $details_products2['price_discounted'],
        ];
        $final_amount = !empty($details_products2['price_discounted']) ? $details_products2['price_discounted'] : $details_products2['price'];
        if (!isset($_SESSION['cart_user'])) {
            $_SESSION['cart_user'] = [
                'products' => [],
                'summary' => [
                    'total_amount' => 0,
                    'amount_payable' => 0,

                ],
            ];
        }
        if (isset($_SESSION['cart_user']['products'][$details_products2['id']])) {
            responseJson([
                'text' => 'محصول در سبد خرید شما موجود است',
                'type' => 'warning',
                'status' => 400,
            ]);
            back();
//      $_SESSION['cart_user']['products'][$details_products['id']] +=$product;
        } else {
            $_SESSION['cart_user']['products'][$details_products2['id']] = $product;
            $_SESSION['cart_user']['summary']['total_amount'] += $details_products2['price'];
            $_SESSION['cart_user']['summary']['amount_payable'] += $final_amount;
        }
        responseJson([
            'text' => 'محصول به سبد خرید شما اضافه شد',
            'type' => 'success',
            'status' => 200,
        ]);
        back();
    }else{
        $_SESSION['cart_user']['summary']['amount_payable'] += $_SESSION['price_code_in_price'];
        unset($_SESSION['gift_code'], $_SESSION['gift_code_id']);
        responseJson([
            'text' => 'شما یک کد تخفیف فعال دارید کد تخفیف شما غیر فعال شد اکنون میتوانید کالای مورد نظر خود را اضافه کنید',
            'type' => 'warning',
            'status' => 400,
        ]);
        back();
    }


}


if (isset($_POST['action']) && $_POST['action'] === 'add_to_cartIndex') {
        if (!isset($_SESSION['gift_code'])){
        $details_products2 = getDetailsProducts($_POST['item']);
        if (!$details_products2 || (int)$details_products2['stock'] === 0 || $details_products2['status'] == 'unavailable') {
            responseJson([
                'text' => 'محصول قابل فروش نیست یا پیدا نشد',
                'type' => 'warning',
                'status' => 400,
            ]);
            back();
        }
        $product = [
            'id' => $details_products2['id'],
            'quantity' => 1,
            'price' => $details_products2['price'],
            'price_discounted' => $details_products2['price_discounted'],
        ];
        $final_amount = !empty($details_products2['price_discounted']) ? $details_products2['price_discounted'] : $details_products2['price'];
        if (!isset($_SESSION['cart_user'])) {
            $_SESSION['cart_user'] = [
                'products' => [],
                'summary' => [
                    'total_amount' => 0,
                    'amount_payable' => 0,

                ],
            ];
        }
        if (isset($_SESSION['cart_user']['products'][$details_products2['id']])) {
            responseJson([
                'text' => 'محصول در سبد خرید شما موجود است',
                'type' => 'warning',
                'status' => 400,
            ]);
            back();
//      $_SESSION['cart_user']['products'][$details_products['id']] +=$product;
        } else {
            $_SESSION['cart_user']['products'][$details_products2['id']] = $product;
            $_SESSION['cart_user']['summary']['total_amount'] += $details_products2['price'];
            $_SESSION['cart_user']['summary']['amount_payable'] += $final_amount;
        }
            responseJson([
                'text' => 'محصول به سبد خرید شما اضافه شد',
                'type' => 'success',
                'status' => 200,
            ]);
        back();
    }else{
        $_SESSION['cart_user']['summary']['amount_payable'] += $_SESSION['price_code_in_price'];
        unset($_SESSION['gift_code'], $_SESSION['gift_code_id']);
            responseJson([
                'text' => 'شما یک کد تخفیف فعال دارید کد تخفیف شما غیر فعال شد اکنون میتوانید کالای مورد نظر خود را اضافه کنید',
                'type' => 'warning',
                'status' => 400,
            ]);
        back();
    }
}
