<?php
if (isset($_POST['action']) && $_POST['action']=== 'create_product_variety'){
    $create_product_variety=createvariety($_POST['product_id'],$_POST['color_id'],$_POST['stock'],$_POST['price'],$_POST['price_discounted']);
        if ($create_product_variety){
            responseJson([
                'title'=>'عملیات موفق',
                'text'=>'بروزرسانی محصول با موفقیت انجام شد',
                'type'=>'success',
                'status'=>200,

            ]);
        }
        else responseJson([
            'title'=>'عملیات ناموفق',
            'text'=>'بروزرسانی محصول با موفقیت انجام نشد',
            'type'=>'error',
            'status'=>400,

        ]);


}
if (isset($_POST['action']) && $_POST['action']=== 'update_product_variety'){
    $validation=validator([
        'price'=>'numeric',
        'price_discounted'=>'numeric',
        'stock'=>'numeric',
    ]);
    if ($validation['status']){
        $update_product_variety=updateProductvariety($_POST['stock'],$_POST['price'],$_POST['price_discounted'],$_POST['product_variety_id']);
        if ($update_product_variety){
            responseJson([
                'title'=>'عملیات موفق',
                'text'=>'بروزرسانی محصول با موفقیت انجام شد',
                'type'=>'success',
                'status'=>200,

            ]);
        }
        else responseJson([
            'title'=>'عملیات ناموفق',
            'text'=>'بروزرسانی محصول با موفقیت انجام نشد',
            'type'=>'error',
            'status'=>400,

        ]);

    }


}
if (isset($_GET['action']) && $_GET['action'] === 'change_is_default_product') {
    $new_is_default_product=$_GET['old_is_default_product'] === 'yes' ? 'no' : 'yes';
    $update=updatevariety($_GET['pv_id']);
    $update_is_default_product = updatedefaultProduct($new_is_default_product,$_GET['pv_id']);
    if ($update_is_default_product) {
        setMessage('عملیات موفق', 'ویرایش وضعیت با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'ویرایش وضعیت با موفقیت انجام نشد', 'error');
    back();


}


