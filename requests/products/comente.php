<?php
if (isset($_POST['coment']) && $_POST['coment'] === 'create_coment') {
    $user_id = getIdUsers($_SESSION['user_sing']);
    $selectUserIdTBLcomente = selectUserIdTBLcomente($user_id['id'],$_POST['teack_product']);
    if (!$selectUserIdTBLcomente) {
        if ($_POST['comente'] === '') {
            setMessage('عملیات ناموفق', 'لطفا متنی را وارد کنید', 'warning');
        } elseif (strlen($_POST['comente']) < 3) {
            setMessage('عملیات ناموفق', 'متن وارد شده باید بیشتر از 3 کاراکتر باشد', 'warning');
        } elseif (strlen($_POST['comente']) > 750) {
            setMessage('عملیات ناموفق', 'متن وارد شده نباید بیشتر از 500 کاراکتر باشد', 'warning');
        } elseif (!isset($_SESSION['user_sing'])) {
            setMessage('عملیات ناموفق', 'برای ارسال پیام باید وارد حساب کاربری خود شوید', 'warning');
        } else {
            $getDetailsUsers = getDetailsUsers($_SESSION['user_sing']);
            if ($getDetailsUsers['first_name']){
                $getName = $getDetailsUsers['first_name'];
            }else{
                $getName = 'مشتری';
            }
            $createComente = createComente($_POST['comente'], $getName, $user_id['id'], $_POST['teack_product']);
            if ($createComente) {
                setMessage('عملیات موفق', 'نظر شما در مورد این کالا با موفقیت ارسال شد و پس از تایید توسط پشتیبانی قابل مشاهده است', 'success');
            }
        }
    }else{
        setMessage('عملیات ناموفق', 'تعداد نظرات شما برای این کالا به حد مجاز رسیده است', 'warning');
    }
}

if (isset($_POST['whi']) && $_POST['whi'] === 'create_whi') {
    $user_id = getIdUsers($_SESSION['user_sing']);
    $selectUserIdTBLquestion = selectUserIdTBLquestion($user_id['id'],$_POST['teack_product']);
    if (!$selectUserIdTBLquestion) {
        $user_id = getIdUsers($_SESSION['user_sing']);
        if ($_POST['question'] === '') {
            setMessage('عملیات ناموفق', 'لطفا متنی را وارد کنید', 'warning');
        } elseif (strlen($_POST['question']) < 3) {
            setMessage('عملیات ناموفق', 'متن وارد شده باید بیشتر از 3 کاراکتر باشد', 'warning');
        } elseif (strlen($_POST['question']) > 750) {
            setMessage('عملیات ناموفق', 'متن وارد شده نباید بیشتر از 500 کاراکتر باشد', 'warning');
        } elseif (!isset($_SESSION['user_sing'])) {
            setMessage('عملیات ناموفق', 'برای ارسال پیام باید وارد حساب کاربری خود شوید', 'warning');
        } else {
            $getDetailsUsers = getDetailsUsers($_SESSION['user_sing']);
            if ($getDetailsUsers['first_name']){
                $getName2 = $getDetailsUsers['first_name'];
            }else{
                $getName2 = 'مشتری';
            }
            $createQuestion = createquestion($_POST['question'], $getName2, $user_id['id'], $_POST['teack_product']);
            if ($createQuestion) {
                setMessage('عملیات موفق', 'سوال شما در مورد این کالا با موفقیت ارسال شد جواب سوال خود را پس از جواب پشتیبانی در پروفایل خود میتوانید ببنید و سوال شما پس از تایید توسط پشتیبانی نشان داده میشود', 'success');
            }
        }
    }
    else{
        setMessage('عملیات ناموفق', 'تعداد سوالات شما برای این کالا به حد مجاز رسیده است', 'warning');
    }
}
