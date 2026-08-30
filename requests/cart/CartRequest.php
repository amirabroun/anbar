<?php
/*if (isset($_POST['action']) && $_POST['action'] === 'add_to_cartIndex') {
    if (!isset($_SESSION['gift_code'])){
        $details_products2 = getDetailsProducts($_POST['product']);
        if (!$details_products2 || (int)$details_products2['stock'] === 0 || $details_products2['status'] == 'unavailable') {
            setMessage('درخواست نامعتبر', 'محصول قابل فروش نیست یا پیدا نشد', 'warning');
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
            setMessage('درخواست غیر مجاز', 'محصول در سبد خرید شما موجود است', 'warning');
            back();
//      $_SESSION['cart_user']['products'][$details_products['id']] +=$product;
        } else {
            $_SESSION['cart_user']['products'][$details_products2['id']] = $product;
            $_SESSION['cart_user']['summary']['total_amount'] += $details_products2['price'];
            $_SESSION['cart_user']['summary']['amount_payable'] += $final_amount;

        }

        setMessage('عملیات موفق','محصول در سبد خرید شما اضافه شد','success');
        back();
    }else{
        $_SESSION['cart_user']['summary']['amount_payable'] += $_SESSION['price_code_in_price'];
        unset($_SESSION['gift_code'], $_SESSION['gift_code_id']);
        setMessage('هشدار', 'شما یک کد تخفیف فعال دارید کد تخفیف شما غیر فعال شد اکنون میتوانید کالای مورد نظر خود را اضافه کنید', 'warning');
        back();
    }


    }*/

if (isset($_POST['action']) && $_POST['action'] === 'delete_product_in_cart') {
    if (isset($_SESSION['cart_user']['products'][$_POST['product_id']])) {
        $details_products = $_SESSION['cart_user']['products'][$_POST['product_id']];

        $final_amount = !empty($details_products['price_discounted']) ? $details_products['price_discounted'] : $details_products['price'];

        $_SESSION['cart_user']['summary']['total_amount'] = $_SESSION['cart_user']['summary']['total_amount'] - $details_products['price'] * $details_products['quantity'];
        $_SESSION['cart_user']['summary']['amount_payable'] = $_SESSION['cart_user']['summary']['amount_payable'] - $final_amount * $details_products['quantity'];

        unset($_SESSION['cart_user']['products'][$_POST['product_id']]);

        $cart_products2 = $_SESSION['cart_user']['products'];
        $number_product=count($cart_products2);

        if ($number_product == 0){
            responseJson([
                'text'=>' سبد خرید خالی شد',
                'type'=>'success',
                'status'=>201,
            ]);
        }

        responseJson([
            'text'=>'محصول از سبد خرید حدف شد',
            'type'=>'success',
            'status'=>200,
        ]);

    }
}

if (isset($_POST['action']) && $_POST['action'] === 'change_quantity'){
    if (!isset($_SESSION['cart_user']['products'][$_POST['item']])){
        responseJson([
            'text'=>'درخواست ارسال شده نا معتبر است',
            'type'=>'error',
            'status'=>400,
        ]);
    }
    $details_products=getDetailsCart3($_POST['item']);
    $product=$_SESSION['cart_user']['products'][$_POST['item']];
    $final_amount=!empty($details_products['price_discounted']) ? $details_products['price_discounted'] : $details_products['price'];

    $_SESSION['cart_user']['summary']['total_amount'] -= $product['price'] * $product['quantity'];
    $_SESSION['cart_user']['summary']['amount_payable'] -= $final_amount * $product['quantity'];

    if ($_POST['event'] === 'increment') {
        if ($details_products['stock'] >= ($_SESSION['cart_user']['products'][$_POST['item']]['quantity'] + 1)) {
            $_SESSION['cart_user']['products'][$_POST['item']]['quantity'] += 1;
            $_SESSION['cart_user']['summary']['total_amount'] += $product['price'] * ($product['quantity'] + 1);
            $_SESSION['cart_user']['summary']['amount_payable'] += $final_amount * ($product['quantity'] + 1);

            $single_cart=[
                'quantity' => $_SESSION['cart_user']['products'][$_POST['item']]['quantity'],
            ];

            $change_cart2 = json_encode($single_cart['quantity']);

            $change_single_cart_foll = json_decode($change_cart2);

            $_SESSION['quantity_cart'] = $change_single_cart_foll;

//            dd($_SESSION['cart_user']['summary']);
            responseJson([
                'text' => 'بروزرسانی با موفقیت انجام شد',
                'type' => 'success',
                'status' => 200,
            ]);
        }
        responseJson([
            'text' => 'تعداد درخواستی شما بیشتر از موجودی محصول شد',
            'type' => 'error',
            'status' => 400,
        ]);

    }


    else if ($_POST['event'] === 'decrement') {
        if ($_SESSION['cart_user']['products'][$_POST['item']]['quantity'] <= 1) {
            responseJson([
                'text' => 'تعداد کالای درخواستی نمیتواند کمتر از یک عدد باشد',
                'type' => 'warning',
                'status' => 400,
            ]);
        }

        if ($details_products['stock'] >= ($_SESSION['cart_user']['products'][$_POST['item']]['quantity'] - 1)) {
            $_SESSION['refresh'] = ['yes'];
            $_SESSION['cart_user']['products'][$_POST['item']]['quantity'] -= 1 ;
            $_SESSION['cart_user']['summary']['total_amount'] += $product['price'] * ($product['quantity'] - 1);
            $_SESSION['cart_user']['summary']['amount_payable'] += $final_amount * ($product['quantity'] - 1);
            responseJson([
                'text' => 'بروزرسانی با موفقیت انجام شد',
                'type' => 'success',
                'status' => 200,
            ]);

        }

        $single_cart=[
            'quantity' => $_SESSION['cart_user']['products'][$_POST['item']]['quantity'],
        ];

        $change_cart2 = json_encode($single_cart['quantity']);

        $change_single_cart_foll = json_decode($change_cart2);

        $_SESSION['quantity_cart'] = $change_single_cart_foll;



        $_SESSION['cart_user']['products'][$_POST['item']]['quantity'] = $details_products['stock'];

        $_SESSION['cart_user']['summary']['total_amount'] += $product['price'] * ($product['quantity'] - 1);
        $_SESSION['cart_user']['summary']['amount_payable'] += $final_amount * ($product['quantity'] - 1);
        responseJson([
            'text' => 'بروزرسانی با موفقیت انجام شد',
            'type' => 'warning',
            'status' => 200,
        ]);
        }
}

/*<div id="loading_foll_page_cart">
                <div class="loading_page_back"></div>
                <div class="btn btn-light p-3 loading_page"><span>کمی صبر کنید...<div class="loader2"></div> </span><span><span class="spinner  spinner-danger "></span></span></div></div>
            </div>
            <script>
setTimeout(function(){
    document.getElementById("loading_foll_page_cart").style.display = "none";
}, 3000);
</script>*/

if (isset($_SESSION['cart_user']['summary']['amount_payable'])) {
    $final_amount = $_SESSION['cart_user']['summary']['amount_payable'];
    $total_amount = $_SESSION['cart_user']['summary']['total_amount'];

    $cart = [
        'final_amount' => $final_amount,
        'total_amount' => $total_amount,
    ];

    $price_discount_cart = $total_amount - $final_amount;

    $change_cart = json_encode($cart['final_amount']);
    $change_cart_total_amount = json_encode($cart['total_amount']);
    $price_discount_cart_fool2 = json_encode($price_discount_cart);

    $change_cart_foll = json_decode($change_cart);
    $change_cart_foll_total = json_decode($change_cart_total_amount);

    $price_discount_cart_fool = json_decode($price_discount_cart_fool2);
}