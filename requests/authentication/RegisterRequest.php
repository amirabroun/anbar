<?php
if (isset($_POST['action'])&& $_POST['action']=== 'register_user'){
    $validation=validator([
        'mobile'=>'required|mobile',
    ]);
    if ($validation['status']){
        $getUserByPhone=getUserByPhone($_POST['mobile']);

        if (!$getUserByPhone){
            $verify_code=generateRandomNumber(6);
            $token=generateRandomString(50);
            $_SESSION[$token]['auth_register']=[
                'mobile'=> $_POST['mobile'],
                'verify_code'=>$verify_code,
                'expire_time'=>time()+ 180,
                '_back'=>'/register.php'
            ];
            smsSender($_POST['mobile'],$verify_code,null,null,'verify-register');
            redirect("/verify.php?token=$token");

        }
        setMessage2('warning', 'شماره همراه از قبل موجود است');
    }
    setMessage('عملیات نا موفق', 'خطاهای به وجود آماده را برطرف کنید', 'error');
    back();



}

