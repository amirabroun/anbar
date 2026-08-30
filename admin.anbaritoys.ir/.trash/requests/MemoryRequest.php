<?php

if (isset($_POST['action'])&& $_POST['action']=== 'create_memory'){

    $validation=validator([
        'title'=>'required|persian_chars',

    ]);
    if ($validation['status']){
        $create_memory=Creatememory($_POST['title']);
        if ($create_memory){
            setMessage('عملیات موفق', 'افزودن حافظه با موفقیت انجام شد', 'success');
        }else setMessage('عملیات نا موفق', 'افزودن حافظه با موفقیت انجام نشد', 'error');


    }else setMessage('عملیات نا موفق', 'افزودن حافظه با موفقیت انجام نشد', 'error');



}
if (isset($_GET['action']) && $_GET['action'] === 'change_status_memory') {
    $new_status_memory=$_GET['old_status_memory'] === 'active' ? 'inactive' : 'active';
    $update_status_memory = updateStatusmemory($new_status_memory,$_GET['memory_id']);
    if ($update_status_memory) {
        setMessage('عملیات موفق', 'ویرایش وضعیت با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'ویرایش وضعیت با موفقیت انجام نشد', 'error');
    back();


}