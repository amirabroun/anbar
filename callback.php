<?php

if (!authUser()) {
    setMessage('عملیات غیر مجاز', 'برای دسترسی  به این صفحه ابتدا باید لاگین کنید', 'error');
    redirect('/login.php');
}

if (!authUserCart() || count(authUserCart()['products']) === 0) {
    setMessage('عملیات غیر مجاز', 'برای ادامه خرید نباید سبد خرید شما خالی باشد.', 'error');
    redirect('/cart.php');
}
if (isset($_GET['Status']) && isset($_GET['Authority'])){
    if (isset($_SESSION['user_order']) && isset($_SESSION['user_order']['tracking_code'])) {
        $cart_products = authUserCart()['products'];
        $errors = [];
        $total_amount = 0;
        $amount_payable = 0;

        foreach ($cart_products as $cart_product) {
            $details_product = getDetailsCart2($cart_product["id"]);

            if ($details_product['status'] === 'inactive') {
                unset($_SESSION['cart_user']['products'][$cart_product["id"]]);
                continue;
            } elseif ($details_product['status'] === 'stop_selling') {
                $errors[] = [
                    'title' => 'حذف محصول از سبد خرید',
                    'message' => "محصول \"{$details_product['title']}\" به دلیل توقف فروش از سبد شما حذف شد.",
                    'icon' => 'danger',
                ];

                unset($_SESSION['cart_user']['products'][$cart_product["id"]]);
                continue;
            }

            if ($details_product['status'] === 'unavialable' || (int)$details_product['stock'] === 0) {
                $errors[] = [
                    'title' => 'تغییر موجودی محصول در سبد خرید',
                    'message' => "محصول \"{$details_product['title']}\" به دلیل اتمام موجودی از سبد شما حذف شد.",
                    'icon' => 'danger',
                ];
                unset($_SESSION['cart_user']['products'][$cart_product["id"]]);
                continue;
            } elseif ((int)$details_product['stock'] < $cart_product['quantity']) {
                $errors[] = [
                    'title' => 'تغییر موجودی محصول در سبد خرید',
                    'message' => "تعداد درخواست شما از محصول \"{$details_product['title']}\" به دلیل تغییر موجودی در انبار در سبد شما بروز شد.",
                    'icon' => 'warning',
                ];
                $_SESSION['cart_user']['products'][$cart_product['id']]['quantity'] = (int)$details_product['stock'];
            }

            $cart_product = $_SESSION['cart_user']['products'][$cart_product['id']]; // get new change product info

            $final_amount =  !empty($cart_product['price_discounted']) ? $cart_product['price_discounted'] : $cart_product['price'];
            $total_amount += ((float)$cart_product['price'] * (int)$cart_product['quantity']);
            $amount_payable += ((float)$final_amount * (int)$cart_product['quantity']);
        }


        $total_amount = $_SESSION['cart_user']['summary']['total_amount'];
        $amount_payable = $_SESSION['cart_user']['summary']['amount_payable'];

        if (!empty($errors)) {
            $_SESSION['cart_user']['notification'] = $errors;
            redirect('/cart.php');
        }
        $order_status = 'failed';
        $payment_status = 'failed';
        $user_id =getIdUsers($_SESSION['user_sing']);


        if ($_GET['Status'] === "OK") {
            $status_get = 10;
            $order_status = 'failed';
            $payment_status = 'failed';
            $user_id = getIdUsers($_SESSION['user_sing']);
             $total_amount = $_SESSION['cart_user']['summary']['total_amount'];
            $amount_payable = $_SESSION['cart_user']['summary']['amount_payable'];
            $track_id = "1111";
             $order = createOrder($_SESSION['user_order']['tracking_code'], $total_amount, $order_status,(int)$user_id['id'] ,$amount_payable );
                if ($order) {
                    $order_id = getOrderId($_SESSION['user_order']['tracking_code']);
                    $payment = createPayment($order_id['id'], $_GET['Authority'], $track_id, null, $amount_payable, $status_get);
                    // save order receiver address
                }
                if (empty($order) || empty($payment)) {
                    // sat message
                    redirect('/');
                }

            $mobile = $_SESSION['user_sing'];
            
           // smsSender($mobile,$_SESSION['user_order']['tracking_code'],null,null,'order-Success');
            //smsSender('09022395095',$_SESSION['user_order']['tracking_code'],null,null,'order-Success-admin');
            
            
            foreach (authUserCart()['products'] as $product) {
                createOrderProduct($order_id['id'], $product['id'], $product['price'], $product['price_discounted'], $product['quantity']);
            }
           
            $getaddress=getAddressByis_defaultYes($user_id['id']);
            createOrderAdddress($order_id['id'], $getaddress['user_id'], $getaddress['first_name'], $getaddress['last_name'], $getaddress['post_code'], $getaddress['address'], $getaddress['city_id'], $getaddress['mobile']);
            $result = decrementProductStockAndCreateOrderProduct($amount_payable,$_SESSION['user_order']['tracking_code'],$order_id['id']);
            if ($result) {
                $_SESSION['callback_check'] = ['yes'];
                $order_status = '10';
                $payment_status = '10';

                $payment_track_id = $result['payment']['track_id'] ?? null;

                if ($order_status === '10'){
                    $order_status = 'success';
                }else{
                    $order_status = 'failed';
                }
                
               
                updateStatusPayment($payment, $payment_track_id, $payment_status);
                updateStatusOrder($order_id['id'], $order_status);
                if(isset($_SESSION['gift_code_id_user'])){
                  delete_code_user($_SESSION['gift_code_id_user'],(int)$user_id['id']);
                }
                if(isset($_SESSION['gift_code_id_stock'])){
                  update_discount_code_grop_order2($_SESSION['gift_code_id_stock']);   
                }
                smsSender('09395355271',$mobile,null,null,'order-Success-admin');
                smsSender($mobile,$mobile,null,null,'order-Success');
                unset($_SESSION['cart_user']);
                if(isset($_SESSION['gift_code_id'])){
                    unset($_SESSION['gift_code_id']);
                }
                if(isset($_SESSION['gift_code'])){
                    unset($_SESSION['gift_code']);
                }
                $_SESSION['shopping_yes'] = $_SESSION['user_order']['tracking_code'];
                redirect('shopping-complete.php?tracking_code=' . $_SESSION['user_order']['tracking_code']);
            }else{
        unset($_SESSION['gift_code'],$_SESSION['gift_code_id']);
        $_SESSION['shopping_not'] = $_SESSION['user_order']['tracking_code'];
        redirect('shopping-complete_not.php?tracking_code=' . $_SESSION['user_order']['tracking_code']);
            }
        }
        unset($_SESSION['gift_code'],$_SESSION['gift_code_id']);
        $_SESSION['shopping_not'] = $_SESSION['user_order']['tracking_code'];
        redirect('shopping-complete_not.php?tracking_code=' . $_SESSION['user_order']['tracking_code']);
    }
}

