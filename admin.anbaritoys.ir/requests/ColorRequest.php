<?php

if (isset($_POST['action'])&& $_POST['action']=== 'create_color'){

    $validation=validator([
        'title'=>'required|persian_chars',
        'english_title'=>'required|english_chars'

    ]);
    if ($validation['status']){
        $create_color=createcolor($_POST['title'],$_POST['english_title']);

        if ($create_color){
            setMessage('عملیات موفق', 'افزودن رنگ با موفقیت انجام شد', 'success');
        }else setMessage('عملیات نا موفق', 'افزودن رنگ با موفقیت انجام نشد', 'error');


    }else setMessage('عملیات نا موفق', 'افزودن رنگ با موفقیت انجام نشد', 'error');



}
if (isset($_POST['action'])&& $_POST['action']=== 'update_color'){
    $validation=validator([
        'title'=>'required|persian_chars',
        'english_title'=>'required|english_chars'

    ]);
    if ($validation['status']){
        $update_color=updateColor($_POST['title'],$_POST['english_title'],$_POST['status'],$_GET['color_id']);
        if ($update_color){
            setMessage('عملیات موفق', 'ویرایش رنگ با موفقیت انجام شد', 'success');
        }
        else setMessage('عملیات نا موفق', 'ویرایش رنگ با موفقیت انجام نشد', 'error');


    }


}
if (isset($_GET['action']) && $_GET['action'] === 'change_status_color') {
    $new_status_color=$_GET['old_status_color'] === 'active' ? 'inactive' : 'active';
    $update_status_color = updateStatusColor($new_status_color,$_GET['color_id']);
    if ($update_status_color) {
        setMessage('عملیات موفق', 'ویرایش وضعیت با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'ویرایش وضعیت با موفقیت انجام نشد', 'error');
    back();


}