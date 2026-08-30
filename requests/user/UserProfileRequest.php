<?php
if (pagename()==='profile'){

    if (isset($_SESSION['massageLogin'])){
        setMessage2('success','وارد حساب کاربری خود شدید');
        unset($_SESSION['massageLogin']);
    }

    $user_id =getIdUsers($_SESSION['user_sing']);
    $CheckUser = getCheckUser($_GET['mobile'],$user_id['id']);
    if ($CheckUser) {
        if (isset($_GET['mobile'])) {
            $details_user = getDetailsUsers($_GET['mobile']);

            if (!$details_user) {
                abort();
            }
        } else {
            abort();
        }
    }else{
        setMessage2('error','شما در حال انجام کار های نامشخص هستید در صورت ادامه مسدود خواهید شد');
        redirect('/');
        back();
        exit();
    }
}

if (pagename()==='profile-interest'){
    $user_id =getIdUsers($_SESSION['user_sing']);
    $CheckUser = getCheckUser($_GET['mobile'],$user_id['id']);
    if ($CheckUser) {
        if (isset($_GET['mobile'])) {
            $details_user = getDetailsUsers($_GET['mobile']);

            if (!$details_user) {
                abort();
            }
        } else {
            abort();
        }
    }else{
        setMessage2('error','شما در حال انجام کار های نامشخص هستید در صورت ادامه مسدود خواهید شد');
        redirect('/');
        back();
        exit();
    }
}

if (pagename()==='profile-sendMassege'){
    $user_id =getIdUsers($_SESSION['user_sing']);
    $CheckUser = getCheckUser($_GET['mobile'],$user_id['id']);
    if ($CheckUser) {
        if (isset($_GET['mobile'])) {
            $details_user = getDetailsUsers($_GET['mobile']);

            if (!$details_user) {
                abort();
            }
        } else {
            abort();
        }
    }else{
        setMessage2('error','شما در حال انجام کار های نامشخص هستید در صورت ادامه مسدود خواهید شد');
        redirect('/');
        back();
        exit();
    }
}
if (pagename()==='profile-additional-info'){
    $user_id =getIdUsers($_SESSION['user_sing']);
    $CheckUser = getCheckUser($_GET['mobile'],$user_id['id']);
    if ($CheckUser) {
        if (isset($_GET['mobile'])) {
            $details_user = getDetailsUsers($_GET['mobile']);

            if (!$details_user) {
                abort();
            }
        } else {
            abort();
        }
    }else{
        setMessage2('error','شما در حال انجام کار های نامشخص هستید در صورت ادامه مسدود خواهید شد');
        redirect('/');
        back();
        exit();
    }
}
if (pagename()==='profile-addresses'){
    $user_id =getIdUsers($_SESSION['user_sing']);
    $CheckUser = getCheckUser($_GET['mobile'],$user_id['id']);
    if ($CheckUser) {
        if (isset($_GET['mobile'])) {
            $details_user = getDetailsUsers($_GET['mobile']);

            if (!$details_user) {
                abort();
            }
        } else {
            abort();
        }
    }else{
        setMessage2('error','شما در حال انجام کار های نامشخص هستید در صورت ادامه مسدود خواهید شد');
        redirect('/');
        back();
        exit();
    }
}
if (pagename()==='profile-factor'){
    $user_id =getIdUsers($_SESSION['user_sing']);
    $CheckUser = getCheckUser($_GET['mobile'],$user_id['id']);
    if ($CheckUser) {
        if (isset($_GET['mobile'])) {
            $details_user = getDetailsUsers($_GET['mobile']);

            if (!$details_user) {
                abort();
            }
        } else {
            abort();
        }
    }else{
        setMessage2('error','شما در حال انجام کار های نامشخص هستید در صورت ادامه مسدود خواهید شد');
        redirect('/');
        back();
        exit();
    }
}

if (pagename()==='profile-single-factor'){
    $user_id =getIdUsers($_SESSION['user_sing']);
    $CheckUser = getCheckUser($_GET['mobile'],$user_id['id']);
    if ($CheckUser) {
        if (isset($_GET['mobile'])) {
            $details_user = getDetailsUsers($_GET['mobile']);

            if (!$details_user) {
                abort();
            }
        } else {
            abort();
        }
    }else{
        setMessage2('error','شما در حال انجام کار های نامشخص هستید در صورت ادامه مسدود خواهید شد');
        redirect('/');
        back();
        exit();
    }
}

if (pagename()==='profile-question'){
    $user_id =getIdUsers($_SESSION['user_sing']);
    $CheckUser = getCheckUser($_GET['mobile'],$user_id['id']);
    if ($CheckUser) {
        if (isset($_GET['mobile'])) {
            $details_user = getDetailsUsers($_GET['mobile']);

            if (!$details_user) {
                abort();
            }
        } else {
            abort();
        }
    }else{
        setMessage2('error','شما در حال انجام کار های نامشخص هستید در صورت ادامه مسدود خواهید شد');
        redirect('/');
        back();
        exit();
    }
}

if (isset($_POST['action'])&& $_POST['action']=== 'update_user'){
    $validation=validator([
        'first_name'=>'required|persian_chars',
        'last_name'=>'required|persian_chars',
        'national_code'=>'numeric',
    ]);
    if ($validation['status']){
        $update_user=updateUser($_POST['first_name'],$_POST['last_name'],$_POST['national_code'],$_POST['phone']);
        if ($update_user){
            responseJson([
                'status'=>200,
                'text' => 'بروزرسازی اطلاعات با موفیقت انجام شد',
                'type' =>'success',
            ]);
            $_SESSION['name_user']=$details_user['first_name'];
            $_SESSION['national_code']=$details_user['national_code'];
        }else{
            responseJson([
                'error'=>400,
                'text' => 'خطا های وجود آمده را برطرف کنید',
                'type' => 'error',
            ]);
        }
    }
}




