<?php
if (isset($_GET['action']) && $_GET['action'] === 'change_status_factor') {
    $new_status=$_GET['old_status'] === 'active' ? 'inactive' : 'active';
    $update_status_category = updateStatusFactor($new_status, $_GET['factor_id']);

    if ($update_status_category) {
        setMessage('عملیات موفق', 'ویرایش وضعیت با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'ویرایش وضعیت با موفقیت انجام نشد', 'error');
    back();
}