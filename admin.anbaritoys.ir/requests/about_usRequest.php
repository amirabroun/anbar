<?php
if (isset($_POST['action']) && $_POST['action'] === 'update_about_us_stock') {
    $validation=validator([
        'stock'=>'required|number',
    ]);
    if ($validation['status']){
        $update_stock = update_about_stock($_POST['stock'],1);
        if ($update_stock) {
                setMessage('عملیات موفق', 'ویرایش تعداد با موفقیت انجام شد', 'success');
        } else{
            setMessage('عملیات نا موفق', 'ویرایش تعداد با موفقیت انجام نشد', 'error');
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'update_about_us') {
    $validation=validator([
        'title'=>'required',
    ]);
    if ($validation['status']){
        $update_category = update_about_us($_POST['title'],$_GET['id']);
        $id1=$_POST["id"];
        if ($update_category) {
                setMessage('عملیات موفق', 'ویرایش درباره ما با موفقیت انجام شد', 'success');
        } else{
            setMessage('عملیات نا موفق', 'ویرایش درباره ما با موفقیت انجام نشد', 'error');
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'update_about_us_mobile') {
    $validation=validator([
        'mobile'=>'required|mobile',
        'mobileTo'=>'required|mobile',
        'required'=>'required|',
    ]);
    if ($validation['status']){
        $update_category = update_about_us_mobile($_POST['mobile'],$_POST['mobileTo'],$_POST['required'],$_GET['id']);
        $id1=$_POST["id"];
        if ($update_category) {
                setMessage('عملیات موفق', 'ویرایش تلفن ها با موفقیت انجام شد', 'success');
        } else{
            setMessage('عملیات نا موفق', 'ویرایش تلفن ها با موفقیت انجام نشد', 'error');
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'update_about_us_address') {
    $validation=validator([
        'title'=>'required',
    ]);
    if ($validation['status']){
        $update_category = update_about_us_address($_POST['title'],$_GET['id']);
        $id1=$_POST["id"];
        if ($update_category) {
                setMessage('عملیات موفق', 'ویرایش آدرس  با موفقیت انجام شد', 'success');
        } else{
            setMessage('عملیات نا موفق', 'ویرایش آدرس  با موفقیت انجام نشد', 'error');
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'update_about_us_question') {
    $validation=validator([
        'title'=>'required',
    ]);
    if ($validation['status']){
        $update_category = update_about_us_question($_POST['title'],$_GET['id']);
        $id1=$_POST["id"];
        if ($update_category) {
                setMessage('عملیات موفق', 'ویرایش آمورش  با موفقیت انجام شد', 'success');
        } else{
            setMessage('عملیات نا موفق', 'ویرایش آمورش  با موفقیت انجام نشد', 'error');
        }
    }
}


