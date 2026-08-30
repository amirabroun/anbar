<?php
if (isset($_POST['action'])&& $_POST['action']=== 'interest'){
        if (isset($_SESSION['user_sing'])) {
            $user_id = getIdUsers($_SESSION['user_sing']);
        }
        if (!isset($_SESSION['user_sing'])) {
            responseJson([
                'text' => 'ابتدا به حساب کاربری خود وارد شوید سپس دوباره امتحان کنید',
                'type' => 'error',
                'status' => 400,
            ]);
        } else if (selectInterest($user_id['id'],$_POST['id'])) {
            $change_in = selectIn_change($user_id['id'], $_POST['id']);
            $delete_category = deleteDeleteInterest($change_in['id']);
            responseJson([
                'text' => 'کالا از علاقه مندی های حذف شد',
                'type' => 'success',
                'status' => 200,
            ]);
        } else {
            $add_address_user = createInterest($user_id['id'], $_POST['id']);
            responseJson([
                'text' => 'کالا با موفقیت به علاقه مندی های شما اضافه شد',
                'type' => 'success',
                'status' => 200,
            ]);
        }

}
