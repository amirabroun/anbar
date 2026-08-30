<?php
if (isset($_POST['action'])&& $_POST['action']=== 'login_user'){
    $validation=validator([
        'mobile'=>'required|mobile',
    ]);
    if ($validation['status']){
        $getUserByPhone=getUserByPhone($_POST['mobile']);
        $getUserByPhone2=getUserByPhone2($_POST['mobile']);
        if ($getUserByPhone){
            if ($getUserByPhone2['status'] == 'active') {
                $verify_code = generateRandomNumber(6);
                $token = generateRandomString(50);
                $_SESSION[$token]['auth_login'] = [
                    'mobile' => $_POST['mobile'],
                    'id' => $getUserByPhone['id'],
                    'verify_code' => $verify_code,
                    'expire_time' => time() + 180,
                    '_back' => '/login.php'
                ];
                $_SESSION['user_mobile'] = ($_POST['mobile']);
                $_SESSION['code_user_id'] = ($verify_code);
           smsSender($_POST['mobile'],$verify_code,null,null,'verify-login');
                redirect("/verify.php?token=$token");
            }else{
                setMessage2('error', 'حساب کاربری شما مسدود شده است برای اطلاعات بیشتر با پشتیبانی تماس بگیرید');
            }
        }else{
            setMessage2('warning', 'شماره همراه از قبل موجود نیست لطفا ثبت نام کنید');
        }
    }
    setMessage('عملیات نا موفق', 'خطاهای به وجود آماده را برطرف کنید', 'error');
    back();



}