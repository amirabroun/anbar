<?php

if (isset($_POST['action'])&& $_POST['action']=== 'create_pack'){

    $validation=validator([
        'title'=>'required|persian_chars',
        'english_title'=>'required|english_chars'

    ]);
    if ($validation['status']){
        $create_pack=CreatePack($_POST['title'],$_POST['english_title']);
        if ($create_pack){
            setMessage('عملیات موفق', 'افزودن نسخه با موفقیت انجام شد', 'success');
        }else setMessage('عملیات نا موفق', 'افزودن نسخه با موفقیت انجام نشد', 'error');


    }else setMessage('عملیات نا موفق', 'افزودن نسخه با موفقیت انجام نشد', 'error');



}
if (isset($_GET['action']) && $_GET['action'] === 'change_status_pack') {
    $new_status_pack=$_GET['old_status_pack'] === 'active' ? 'inactive' : 'active';
    $update_status_pack = updateStatusPack($new_status_pack,$_GET['pack_id']);
    if ($update_status_pack) {
        setMessage('عملیات موفق', 'ویرایش وضعیت با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'ویرایش وضعیت با موفقیت انجام نشد', 'error');
    back();


}