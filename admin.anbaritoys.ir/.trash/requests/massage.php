<?php

if (isset($_GET['action']) && $_GET['action'] === 'change_status_comente') {
    $new_status=$_GET['old_status'] === 'active' ? 'inactive' : 'active';
    $update_status_category = updateStatusComante($new_status, $_GET['comante_id']);

    if ($update_status_category) {
        setMessage('عملیات موفق', 'ویرایش وضعیت با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'ویرایش وضعیت با موفقیت انجام نشد', 'error');
    back();
}

if (isset($_GET['action']) && $_GET['action'] === 'change_status_massage') {
    $new_status=$_GET['old_status'] === 'active' ? 'inactive' : 'active';
    $update_status_category = updateStatusMassage($new_status, $_GET['massage_id']);

    if ($update_status_category) {
        setMessage('عملیات موفق', 'ویرایش وضعیت با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'ویرایش وضعیت با موفقیت انجام نشد', 'error');
    back();
}


if (isset($_POST['admin_massage']) && $_POST['admin_massage']=== 'massage_admin'){
    $updataMassage = updataMassage($_POST['send_admin'], $_POST['id']);
    if ($updataMassage){
        setMessage('عملیات موفق', 'پاسخ شما با موفقیت ارسال شد', 'success');
    }else{
        setMessage('عملیات ناموفق', 'پاسخ شما رسال نشد', 'error');
    }
}
if (isset($_GET['action']) && $_GET['action'] === 'delete_massage') {
    $delete_category = deleteMassage($_GET['id']);
    if ($delete_category) {
        setMessage('عملیات موفق', 'حذف سوال با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'حذف سوال با موفقیت انجام نشد', 'error');
    back();
}

if (isset($_GET['action']) && $_GET['action'] === 'delete_massage2') {
    $delete_category = deletecontact_us($_GET['id']);
    if ($delete_category) {
        setMessage('عملیات موفق', 'حذف پیام با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'حذف پیام با موفقیت انجام نشد', 'error');
    back();
}

if (isset($_GET['action']) && $_GET['action'] === 'delete_comante') {
    $delete_category = delete_comante($_GET['id']);
    if ($delete_category) {
        setMessage('عملیات موفق', 'حذف نظر با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'حذف نظر با موفقیت انجام نشد', 'error');
    back();
}
