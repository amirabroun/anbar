<?php
if (isset($_POST['create_contact_us'])&& $_POST['create_contact_us']=== 'contact_us'){

    if (isset($_SESSION['user_sing'])) {
        $user_id = getIdUsers($_SESSION['user_sing']);
    }
    $validator = validator([
        'mobile' => 'required|mobile',
        'name2' => 'required|persian_chars',
        'Issue' => 'required|persian_chars',
        'description' => 'required|',
    ]);
    if ($validator['status']) {
        $selectUserIdTBLcontact_us = selectUserIdTBLcontact_us($user_id['id']);
        if (!$selectUserIdTBLcontact_us){
            $add_contact_us = createContact_us($user_id['id'], $_POST['mobile'], $_POST['name2'], $_POST['Issue'], $_POST['description']);
            if ($add_contact_us) {
                setMessage('عملیات موفق', 'پیام شما با موفقیت به پشتبانی ارسال شد', 'success');
            }
        }else{
                setMessage('عملیات ناموفق', 'تعداد پیام های شما به پشتبانی به حد مجاز رسیده است', 'error');
        }
    }
}
