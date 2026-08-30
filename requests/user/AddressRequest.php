<?php
if (isset($_POST['action'])&& $_POST['action']=== 'fetch_cities'){
    $user_id =getIdUsers($_SESSION['user_sing']);
    $cities=getcities($_POST['province']);

    if ($cities){
        responseJson([
            'data'=>$cities
        ]);
    } responseJson([
        'data'=>[]
    ]);
}

if (isset($_POST['action'])&& $_POST['action']=== 'add_address_user'){
    $user_id =getIdUsers($_SESSION['user_sing']);
    $validation=validator([
        'first_name'=>'required',
        'last_name'=>'required',
        'post_code'=>'required|numeric',
        'address'=>'required',
        'mobile'=>'required',
    ]);
    $row = getIsRow($user_id['id']);
    $rowNot = getIsRowNot($user_id['id']);
    if (!$rowNot){
        if ($validation['status']){
            $change = updateAddressByuser_id($user_id['id']);
            $user_id =getIdUsers($_SESSION['user_sing']);
            $add_address_user=createAddress($user_id['id'],$_POST['first_name'],$_POST['last_name'],$_POST['post_code'],$_POST['address'],$_POST['city_id'],$_POST['mobile']);
            setMessage2('success','آدرس شما با موفقیت اضافه شد');
            responseJson([
                'status'=>200,
                'title' =>'عملیات موفق',
                'text' => 'افزودن آدرس با موفیقت انجام شد',
                'type' =>'success' ,

            ]);
        }
    }elseif ($row){
        if ($validation['status']){
            $change = updateAddressByuser_id($user_id['id']);
            $add_address_user=createAddress($user_id['id'],$_POST['first_name'],$_POST['last_name'],$_POST['post_code'],$_POST['address'],$_POST['city_id'],$_POST['mobile']);
            setMessage2('success','آدرس شما با موفقیت اضافه شد');
            responseJson([
                'status'=>200,
                'title' =>'عملیات موفق',
                'text' => 'افزودن آدرس با موفیقت انجام شد',
                'type' =>'success' ,

            ]);
        }
    }else{
        setMessage2('error','تعداد آدرس های شما به حد مجاز رسیده است');
        responseJson([
            'status'=>500,
            'title' =>'عملیات ناموفق',
            'text' => 'تعداد آدرس غیر مجاز',
            'type' =>'success' ,
        ]);
    }
}