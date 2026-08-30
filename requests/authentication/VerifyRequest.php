<?php
if (pagename()==='verify'){
    if (!isset($_GET['token']) || !isset($_SESSION[$_GET['token']])){
    redirect();
    }
    $auth_details=$_SESSION[$_GET['token']]['auth_login'] ?? $_SESSION[$_GET['token']]['auth_register'];

}
if (isset($_POST['action'])&& $_POST['action']=== 'confirmation_mobile_with_otp'){
    $validation=validator([
        'verify_code'=>'required|numeric',
    ]);
    if ($validation['status']){

        if ((int) $auth_details['verify_code'] === (int)$_POST['verify_code']){
            if (isset($_SESSION[$_GET['token']]['auth_login'])){
                $_SESSION['user_sing']=$auth_details['mobile'];
                unset($_SESSION[$_GET['token']]);
                if (isset($_SESSION['sendMassage']) && !isset($_SESSION['finishCart'])){
                    header("Location:contact-us.php");
                    dd(setMessage2('success', ' وارد حساب خود شدید حالا میتوانید پیام ارسال کنید'));
                }else if (isset($_SESSION['finishCart']) && !isset($_SESSION['sendMassage'])){
                    header("Location:shopping.php");
                    dd(setMessage2('success', ' وارد حساب خود شدید حالا میتوانید خرید های خود را پرداخت کنید'));
                }
                else {
                    $_SESSION['massageLogin'] = 'yes';
                    redirect(userUrl($_SESSION['user_sing']));
                }
            }
            elseif ($_SESSION[$_GET['token']]['auth_register']){
                $createUser=createUser($auth_details['mobile']);
                if ($createUser){
                    $_SESSION['user_sing']=$auth_details['mobile'];
                    setMessage2('حساب کاربری شما ساخته شد', 'success');
                    $_SESSION['massageLogin'] = 'yes';
                    unset($_SESSION[$_GET['token']]);
                    redirect(userUrl($_SESSION['user_sing']));
            }
                else{
                    setMessage('عملیات ناموفق', 'خطای سیستمی رخ داده است', 'error');
                    back();
                }
            }
        }
        else{
            setMessage2('error', 'کد وارد شده نا معتبر است');
        }
    }
//    setMessage('عملیات نا موفق', 'خطاهای به وجود آماده را برطرف کنید', 'error');
    back();



}

