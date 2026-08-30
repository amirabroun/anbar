<?php

if (isset($_POST['action'])&& $_POST['action']=== 'create_battery'){

    $validation=validator([
        'title'=>'required',

    ]);
    if ($validation['status']){
        $create_battery=Createbattery($_POST['title']);
        if ($create_battery){
            setMessage('عملیات موفق', 'افزودن باتری با موفقیت انجام شد', 'success');
        }else setMessage('عملیات نا موفق', 'افزودن باتری با موفقیت انجام نشد', 'error');


    }else setMessage('عملیات نا موفق', 'افزودن باتری با موفقیت انجام نشد', 'error');



}
if (isset($_GET['action']) && $_GET['action'] === 'change_status_battery') {
    $new_status_battery=$_GET['old_status_battery'] === 'active' ? 'inactive' : 'active';
    $update_status_battery = updateStatusBattery($new_status_battery,$_GET['battery_id']);
    if ($update_status_battery) {
        setMessage('عملیات موفق', 'ویرایش وضعیت با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'ویرایش وضعیت با موفقیت انجام نشد', 'error');
    back();


}