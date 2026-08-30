<?php
if (pagename() === 'shopping-payment') {

    if (!authUser()) {
        setMessage('عملیات غیر مجاز', 'برای دسترسی  به این صفحه ابتدا باید لاگین کنید', 'error');
        redirect('/login.php');
    }

    if (!authUserCart() || count(authUserCart()['products']) === 0) {
        setMessage('عملیات غیر مجاز', 'برای ادامه خرید نباید سبد خرید شما خالی باشد.', 'error');
        redirect('/cart.php');
    }
    $user_id = getIdUsers($_SESSION['user_sing']);
    $getAddressByis_defaultYes = getAddressByis_defaultYes($user_id['id']);

        if (!$getAddressByis_defaultYes){
            redirect('shopping.php');
        }

        $_SESSION['user_order']['defaultYes'] = $getAddressByis_defaultYes['id'];

}


if (isset($_POST['action']) && $_POST['action'] === 'to_gateway_payment'){
    if (!authUser()) {
        setMessage('عملیات غیر مجاز', 'برای دسترسی  به این صفحه ابتدا باید لاگین کنید', 'error');
        redirect('/login.php');
    }

    if (!authUserCart() || count(authUserCart()['products']) === 0) {
        setMessage('عملیات غیر مجاز', 'برای ادامه خرید نباید سبد خرید شما خالی باشد.', 'error');
        redirect('/cart.php');
    }
    $user_id = getIdUsers($_SESSION['user_sing']);
    $getAddressByis_defaultYes = getAddressByis_defaultYes($user_id['id']);

    if (!$getAddressByis_defaultYes){
        redirect('shopping.php');
    }

    if (!isset($_SESSION['user_order']['defaultYes'])){
        redirect('shopping.php');
    }

    $cart_product = authUserCart()['products'];
    $error = [];
    $total_amount = 0;
    $amount_payable = 0;
    foreach ($cart_product as $cart_product){
        $detailproduct =getDetailsCart2($cart_product['id']);
        if ($detailproduct['status'] === 'inactive'){
            unset($_SESSION['cart_user']['product'][$cart_product["id"]]);
            continue;
        }elseif ($detailproduct['status'] === 'stop_selling'){
            $error[] = [
                'title' => 'حذف محصول از سبد خرید',
                'massage' => "محصول  \"{$detailproduct['title']}\" به دلیل توقف فروش از سبد خرید شما حذف شد.",
                'icon' => 'danger',
            ];
            unset($_SESSION['cart_user']['product'][$cart_product["id"]]);
            continue;
        }

        if ($detailproduct['status'] === 'unavialable' || (int)$detailproduct['stock'] === 0){
            $error[] = [
                'title' => 'حذف محصول از سبد خرید',
                'massage' => "محصول  \"{$detailproduct['title']}\" به دلیل اتمام موجودی از سبد خرید شما حذف شد.",
                'icon' => 'danger',
            ];
            unset($_SESSION['cart_user']['product'][$cart_product["id"]]);
            continue;
        }elseif ((int)$detailproduct['stock'] < $cart_product['quantity']){
            $error[] = [
                'title' => 'تعغیر تعداد محصول در سبد خرید',
                'massage' => "محصول  \"{$detailproduct['title']}\"به اندازه درخواستی شما موجود نبود به همین دلیل تعداد کالا های شما آپدیت شد.",
                'icon' => 'warning',
            ];
            $_SESSION['cart_user']['product'][$cart_product["id"]]['quantity'] = (int)$detailproduct['stock'];
        }
        if ((float)$detailproduct['price'] !== (float)$cart_product["price"]){
            $error[] = [
                'title' => 'تعغیر قیمت در سبد خرید',
                'massage' => "قیمت محصول  \"{$detailproduct['title']}\" در سبد خرید شما تعغیر کرد",
                'icon' => 'warning',
            ];
            $_SESSION['cart_user']['product'][$cart_product["id"]]['price'] = (float)$detailproduct['price'];
        }

        if ((float)$detailproduct['price_discounted'] !== (float)$cart_product["price_discounted"]){
            $error[] = [
                'title' => 'تعغیر قیمت در سبد خرید',
                'massage' => "قیمت با تخفیف محصول  \"{$detailproduct['title']}\" در سبد خرید شما تعغیر کرد",
                'icon' => 'warning',
            ];
            $_SESSION['cart_user']['product'][$cart_product["id"]]['price_discounted'] = (float)$detailproduct['price_discounted'];
        }

        $cart_product = $_SESSION['cart_user']['products'][$cart_product['id']]; // get new change product info

        $final_amount =  !empty($cart_product['price_discounted']) ? $cart_product['price_discounted'] : $cart_product['price'];
        $total_amount += ((float)$cart_product['price'] * (int)$cart_product['quantity']);
        $amount_payable += ((float)$final_amount * (int)$cart_product['quantity']);
    }

    $_SESSION['cart_user']['summary']['total_amount'] = $total_amount;

    if (isset($_SESSION['price_org'])) {
        $_SESSION['cart_user']['summary']['amount_payable'] = $amount_payable -= $_SESSION['price_org'];
    }else{
        $_SESSION['cart_user']['summary']['amount_payable'] = $amount_payable;
    }

    if (empty($error)){
        $order_tracking_code = PREFIX_TRACKING_CODE['order'] . generateRandomNumber();
        $_SESSION['user_order']['tracking_code'] = $order_tracking_code;
        $amount_payable_result = $amount_payable * 10;
        $TR_action = createTransactionForPayment($amount_payable_result, $order_tracking_code, $_SESSION['user_mobile']);
        if ($TR_action && !empty($TR_action['link'])){
            redirect($TR_action['link']);
        }else{
            setMessage('خطا در پرداخت','امکان پرداخت در حال حاضر امکان پذیر نیست.','error');
        }
    }
}
