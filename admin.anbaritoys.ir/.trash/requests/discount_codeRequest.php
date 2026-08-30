<?php

if (isset($_POST['action']) && $_POST['action'] === 'create_discount_code') {

    if (isset($_POST['action2']) && $_POST['action2'] === 'one_user') {

    $validation=validator([
    'title'=>'required|persian_chars',
    'price'=>'numeric',
    'min_name'=>'numeric',
]);

    if ($validation['status']){
        $create_discount_code = createDiscount_code($_POST['title'], $_POST['title_english'],$_POST['price'],$_POST['min_name']);
        if ($create_discount_code) {
                setMessage('عملیات موفق', 'افزودن کد هدیه با موفقیت انجام شد', 'success');
            }
        } else{  setMessage('عملیات نا موفق', 'افزودن کد هدیه انجام نشد', 'error');

        }
    }

    if (isset($_POST['action2']) && $_POST['action2'] === 'grop') {

    $validation=validator([
    'title'=>'required|persian_chars',
    'stock'=>'numeric',
    'price'=>'numeric',
    'min_name'=>'numeric',
]);

    if ($validation['status']){
        $create_discount_code = createDiscount_code5($_POST['title'], $_POST['title_english'],$_POST['stock'],$_POST['price'],$_POST['min_name']);
        if ($create_discount_code) {
                setMessage('عملیات موفق', 'افزودن کد تخفیف با موفقیت انجام شد', 'success');
            }
        } else{  setMessage('عملیات نا موفق', 'افزودن کد تخفیف انجام نشد', 'error');

        }
    }

}
if (isset($_GET['action']) && $_GET['action'] === 'delete_grop_code') {
    $delete_category = deleteGropCode($_GET['code_id']);
    if ($delete_category) {
        setMessage('عملیات موفق', 'حذف کد تخفیف با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'حذف کد تخفیف با موفقیت انجام نشد', 'error');
    back();
}

if (isset($_GET['action']) && $_GET['action'] === 'discount_code_user') {
    $delete_category = deleteuserCode($_GET['code_id']);
    if ($delete_category) {
        setMessage('عملیات موفق', 'حذف کد تخفیف با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'حذف کد تخفیف با موفقیت انجام نشد', 'error');
    back();
}

if (isset($_POST['change_user_dic_code_on_mmm'])) {
if (selectcheckinusercode($_POST['change_user_dic_code_on_mmm'],$_POST['id'])){
    $delete_category = deleteuserCodein($_POST['change_user_dic_code_on_mmm'],$_POST['id']);
    if ($delete_category){
        setMessage('عملیات موفق', 'این کد تخفیف برای این کاربر غیر فعال شد', 'success');
    }
}else {
    $create_discount_code = change_code($_POST['change_user_dic_code_on_mmm'], $_POST['id']);
    if ($create_discount_code) {
        setMessage('عملیات موفق', 'این کد تخفیف برای این کاربر فعال شد', 'success');
    } else {
        setMessage('عملیات نا موفق', 'افزودن کد تخفیف انجام نشد', 'error');
    }
}
}

if (isset($_POST['change_product_dic_code_on_mmm'])) {
if (selectcheckinPRODUCTcode($_POST['change_product_dic_code_on_mmm'],$_POST['id'])){
    $delete_category = deleteproductCodein($_POST['change_product_dic_code_on_mmm'],$_POST['id']);
    if ($delete_category){
        setMessage('عملیات موفق', 'این کد تخفیف برای این کالا غیر فعال شد', 'success');
    }
}else {
    $create_discount_code = change_code_product($_POST['id'],$_POST['change_product_dic_code_on_mmm']);
    if ($create_discount_code) {
        setMessage('عملیات موفق', 'این کد تخفیف برای این کالا فعال شد', 'success');
    } else {
        setMessage('عملیات نا موفق', 'افزودن کد تخفیف انجام نشد', 'error');
    }
}
}


if (isset($_POST['change_product_dic_code_on_nnn'])) {
if (selectcheckinPRODUCTcode2($_POST['change_product_dic_code_on_nnn'],$_POST['id'])){
    $delete_category = deleteproductCodein2($_POST['change_product_dic_code_on_nnn'],$_POST['id']);
    if ($delete_category){
        setMessage('عملیات موفق', 'این کد تخفیف برای این کالا غیر فعال شد', 'success');
    }
}else {
    $create_discount_code = change_code_product2($_POST['id'],$_POST['change_product_dic_code_on_nnn']);
    if ($create_discount_code) {
        setMessage('عملیات موفق', 'این کد تخفیف برای این کالا فعال شد', 'success');
    } else {
        setMessage('عملیات نا موفق', 'افزودن کد تخفیف انجام نشد', 'error');
    }
}
}