
<?php
if (isset($_POST['action']) && $_POST['action']==='manager_login' ){
    $validation=validator([
        'email'=>'required',
        'password'=>'required|password',
    ]);
    if ($validation['status']){
        $login = Login($_POST['email'], $_POST['password']);
        if ($login){
            $_SESSION['admin_sing']=$login['id'];
            responseJson([
                'status'=>200,
                'title' =>'عملیات موفق',
                'text' => 'ورود با موفقیت انجام شد',
                'type' =>'success' ,
            ]);
        }responseJson([
            'status'=>400,
            'title' =>'عملیات نا موفق',
            'text' => 'اطلاعات معتبر نیست',
            'type' =>'error' ,

        ]);


    }
    responseJson([
        'title' => 'عملیات ناموفق',
        'text' => 'خطاهای بوجود آمده را برطرف کنید.',
        'type' => 'error',
    ]);


}
