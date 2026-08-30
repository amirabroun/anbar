<?php
if (isset($_POST['action']) && $_POST['action']=== 'create_product_details'){
        $create_product_details=createdetail($_POST['product_id'],$_POST['battery_id'],$_POST['memory_id'],$_POST['ram_id'],$_POST['Screen_technology'],$_POST['Size'],$_POST['Weight'],$_POST['Photo_resolution'],$_POST['Os_version'],$_POST['sim_card'],$_POST['guarantee_id'],$_POST['pack_id']);
        if ($create_product_details){
            setMessage('عملیات موفق', 'افزودن جزییات محصول با موفقیت انجام شد', 'success');
        }
        else setMessage('عملیات نا موفق', 'افزودن جزییات محصول با موفقیت انجام نشد', 'error');


}

