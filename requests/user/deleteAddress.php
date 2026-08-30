<?php
if (POST('action')=== 'delete_address'){
        $delete_category = deleteAddress($_POST['id']);
        if ($delete_category) {
            setMessage2('success', 'حذف آدرس با موفقیت انجام شد');
        } else setMessage2('error', 'حذف آدرس با موفقیت انجام نشد');
        back();
}
