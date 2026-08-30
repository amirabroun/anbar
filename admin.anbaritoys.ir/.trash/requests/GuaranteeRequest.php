<?php

if (isset($_POST['action'])&& $_POST['action']=== 'create_guarantee'){

    $validation=validator([
        'title'=>'required|persian_chars',

    ]);
    if ($validation['status']){
        $create_guarantee=Createguarantee($_POST['title']);
        if ($create_guarantee){
            setMessage('عملیات موفق', 'افزودن گارانتی با موفقیت انجام شد', 'success');
        }else setMessage('عملیات نا موفق', 'افزودن گارانتی با موفقیت انجام نشد', 'error');


    }else setMessage('عملیات نا موفق', 'افزودن گارانتی با موفقیت انجام نشد', 'error');



}
if (isset($_GET['action']) && $_GET['action'] === 'change_status_guarantee') {
    $new_status_guarantee=$_GET['old_status_guarantee'] === 'active' ? 'inactive' : 'active';
    $update_status_guarantee = updateStatusguarantee($new_status_guarantee,$_GET['guarantee_id']);
    if ($update_status_guarantee) {
        setMessage('عملیات موفق', 'ویرایش وضعیت با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'ویرایش وضعیت با موفقیت انجام نشد', 'error');
    back();


}