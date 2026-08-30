<?php
if (pageName() === 'update_photo_blog') {
    $getImgBlog = getImgBlog3(GET('blog_id'));
    if (!$getImgBlog) {
        if (POST('action') === 'blogImg3') {
            #dd($_FILES);
            $files = [];
            $keys = array_keys($_FILES['product_img']);
            $error = [];
            $sort = 0;

            foreach ($keys as $item) {
                foreach ($_FILES['product_img'][$item] as $key => $file) {
                    if (isset($files[$key])) {
                        $files[$key] = array_merge([$item => $file], $files[$key]);
                        continue;
                    }
                    $files[$key] = [$item => $file];
                }
            }

            foreach ($files as $key => $file) {
                if (empty($file['size'])) {
                    continue;
                }
                $original_name = $file['name'];
                $suffix = pathinfo($file['name'], PATHINFO_EXTENSION);
                $new_name = md5($original_name . microtime()) . '.' . $suffix;
                $path = '/images/blog/';
                $full_path = rtrim(DOMAIN['document_root'], '/') . $path . $new_name;
                if (@move_uploaded_file($file['tmp_name'], $full_path)) {
                    $table = 'blog_photo';
                    $filds = [
                        'id' => NULL,
                        'name' => $new_name,
                        'suffix' => $suffix,
                        'src' => $path,
                        'size' => $file['size'],
                    ];
                    $createPhoto = insertRecordToDatabase($table, $filds);
                    if ($createPhoto) {
                        global $cn;
                        $lastId = $cn->lastInsertId();
                        $table = 'blog_photo_admin';
                        $filds = [
                            "id" => NULL,
                            "photo_id" => $lastId,
                            "blog_id" => GET('blog_id'),
                        ];
                        $create_Photo_Product = insertRecordToDatabase($table, $filds);
                        if ($create_Photo_Product) {
                            continue;
                        }

                    }
                }
                $error[] = ['file_name' => $original_name];
            }
            if ($error) {
                setMessage('عملیات ناموفق','درج عکس بلاگ با موفیت درج نشد','error');
            } else {
                setMessage('عملیات موفق','درج عکس بلاگ با موفیت درج شد','success');
                redirect('update_photo_blog.php?blog_id='.$_GET['blog_id']);
            }
        }
    }
    else {
        if (POST('action') === 'blogImg3') {
            #dd($_FILES);
            $files = [];
            $keys = array_keys($_FILES['product_img']);
            $error = [];
            $sort = 0;

            foreach ($keys as $item) {
                foreach ($_FILES['product_img'][$item] as $key => $file) {
                    if (isset($files[$key])) {
                        $files[$key] = array_merge([$item => $file], $files[$key]);
                        continue;
                    }
                    $files[$key] = [$item => $file];
                }
            }

            foreach ($files as $key => $file) {
                if (empty($file['size'])) {
                    continue;
                }
                $original_name = $file['name'];
                $suffix = pathinfo($file['name'], PATHINFO_EXTENSION);
                $new_name = md5($original_name . microtime()) . '.' . $suffix;
                $path = '/images/blog/';
                $full_path = rtrim(DOMAIN['document_root'], '/') . $path . $new_name;
                if (@move_uploaded_file($file['tmp_name'], $full_path)) {

                    $table = 'blog_photo';
                    $id = $getImgBlog['photo_id'];
                    $filds = [
                        'name' => $new_name,
                        'suffix' => $suffix,
                        'src' => $path,
                        'size' => $file['size'],
                    ];
                    $createPhoto = updateRecordToDatabase($table, $filds, $id);
                }
                $error[] = ['file_name' => $original_name];
            }
            if (!$error) {
                setMessage('عملیات ناموفق','درج عکس دسته بندی با موفیت درج نشد','error');
            } else {
                setMessage('عملیات موفق','درج عکس دسته بندی با موفیت درج شد','success');
                redirect('update_photo_blog.php?blog_id='.$_GET['blog_id']);
            }
        }
    }
}


if (isset($_POST["action"])) {
    if ($_POST["action"] === "insert_paper") {
        $validate_fields = validator([
            'title' => 'required|lenChar|persian_chars',
            'Created' => 'required',
            'description' => 'required',
        ]);
        if ($validate_fields['status']) {
            $tableName = 'paper';
            $fields = [
                'id' => NULL,
                'title' => $_REQUEST['title'],
                'Created' => $_REQUEST['Created'],
                'description' => $_POST['description'],
                'MiniDescription' => $_REQUEST['MiniDescription'],
                'label' => $_REQUEST['label'],
            ];
            if (insertRecordToTable($tableName, $fields)) {
                responsejson([
                    'text' => 'افزودن مقاله با موفقیت انجام شد',
                    'type' => 'success',
                    'status' => 200
                ]);
            }else{
                responsejson([
                    'title' => 'لطفا خطاهای وجود آمده را برطرف کنید.',
                    'icon' => 'warning',
                ]);
            }
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'change_status_blog') {
    $new_status=$_GET['old_status'] === 'active' ? 'inactive' : 'active';
    $update_status_category = updateStatusblog($new_status, $_GET['category_id']);

    if ($update_status_category) {
        setMessage('عملیات موفق', 'ویرایش وضعیت با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'ویرایش وضعیت با موفقیت انجام نشد', 'error');
    back();
}


if (isset($_POST['action']) && $_POST['action'] === 'update_blog') {
    $validation=validator([
        'title'=>'required|persian_chars',
        'Created' => 'required',
        'description' => 'required',
    ]);
    if ($validation['status']){
        $update_category = updateblogg($_POST['title'], $_POST['Created'], $_POST['description'],$_GET['blog_id'], $_POST['label'], $_POST['MiniDescription']);
        $id1=$_POST["id"];
        if ($update_category) {
            setMessage('عملیات موفق', 'ویرایش مقاله با موفقیت انجام شد', 'success');
        }
    } else setMessage('عملیات نا موفق', 'ویرایش مقاله با موفقیت انجام نشد', 'error');



}