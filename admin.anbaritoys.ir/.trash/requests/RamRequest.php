<?php

if (isset($_POST['action'])&& $_POST['action']=== 'create_ram'){

    $validation=validator([
        'title'=>'required|persian_chars',

    ]);
    if ($validation['status']){
        $create_ram=Createram($_POST['title']);
        if ($create_ram){
            setMessage('عملیات موفق', 'افزودن رم با موفقیت انجام شد', 'success');
        }else setMessage('عملیات نا موفق', 'افزودن رم با موفقیت انجام نشد', 'error');


    }else setMessage('عملیات نا موفق', 'افزودن رم با موفقیت انجام نشد', 'error');



}
if (isset($_GET['action']) && $_GET['action'] === 'change_status_ram') {
    $new_status_ram=$_GET['old_status_ram'] === 'active' ? 'inactive' : 'active';
    $update_status_ram = updateStatusram($new_status_ram,$_GET['ram_id']);
    if ($update_status_ram) {
        setMessage('عملیات موفق', 'ویرایش وضعیت با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'ویرایش وضعیت با موفقیت انجام نشد', 'error');
    back();


}