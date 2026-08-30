<?php
if (pagename() === 'shopping') {
    if (!authUser()) {
        setMessage('عملیات غیر مجاز', 'برای دسترسی  به این صفحه ابتدا باید لاگین کنید', 'error');
        redirect('/login.php');
    }
    $user_id = getIdUsers($_SESSION['user_sing']);

    if (!authUserCart() || count(authUserCart()['products']) === 0) {
        setMessage('عملیات غیر مجاز', 'برای ادامه خرید نباید سبد خرید شما خالی باشد.', 'error');
        redirect('/cart.php');
    }



    if (isset($_POST['action']) && $_POST['action'] === 'next_to_payment_step') {
        $getAddressByis_defaultYes = getAddressByis_defaultYesCheck($user_id['id']);
        if ($getAddressByis_defaultYes) {
            $_SESSION['address_name'] = $getAddressByis_defaultYes['first_name'].' '.$getAddressByis_defaultYes['last_name'];
            $_SESSION['address_mobile'] = $getAddressByis_defaultYes['mobile'];
           // $_SESSION['address_address'] = $getAddressByis_defaultYes['mobile'];
            $id = $getAddressByis_defaultYes['id'];
            if (strlen($id) > 0) {
                $_SESSION['user_order']['defaultYes'] = $getAddressByis_defaultYes['id'];
                redirect('shopping-payment.php');
            }
        }else {
                setMessage('عملیات غیر مجاز', 'برای ادامه خرید باید آدرسی داشته باشید.', 'error');
            }
        }
}

// http://traning_hbcp.test/callback.php?status=10
