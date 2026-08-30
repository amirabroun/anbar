<?php
if (isset($_GET['action']) && $_GET['action'] === 'change_status_user') {
    $new_status=$_GET['old_status'] === 'active' ? 'inactive' : 'active';
    $update_status_category = updateStatususer($new_status, $_GET['user_id']);

    if ($update_status_category) {
        setMessage('عملیات موفق', 'کابر با موفقیت مسدود شد', 'success');
    } else setMessage('عملیات نا موفق', 'کاربر مسدود نشد', 'error');
    back();
}

if (isset($_GET['action']) && $_GET['action'] === 'change_status_user2') {
    $new_status=$_GET['old_status'] === 'active' ? 'inactive' : 'active';
    $update_status_category = updateStatususer($new_status, $_GET['user_id']);

    if ($update_status_category) {
        setMessage('عملیات موفق', 'کابر با موفقیت رفع انسداد شد', 'success');
    } else setMessage('عملیات نا موفق', 'کاربر رفع انسداد نشد', 'error');
    back();
}