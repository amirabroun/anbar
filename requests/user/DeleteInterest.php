<?php
if (POST('action')=== 'DeleteInterest'){
    $id =$_REQUEST['id'];
    $ok = selectInterestByProductId($_POST['id']);
    foreach ($ok as $ll){
        $id = $ll['id'];
        if (deleteDeleteInterest($id)){
            setMessage('عملیات موفق','کالا از علاقه مندی های شما حذف شد','success');
        }
        else{
            setMessage('عملیات موفق','کالا از علاقه مندی های شما حذف شد','success');
        }
    }
}
