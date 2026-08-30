<?php
if (pageName() === 'update_photo_category') {
    $getImgBlog = getImgBlog(GET('category_id'));
    if (!$getImgBlog) {
        if (POST('action') === 'blogImg') {
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
                 $path = '/images/category/';
                 $full_path = rtrim(DOMAIN['document_root'], '/') . $path . $new_name;
               
                
                if (@move_uploaded_file($file['tmp_name'], $full_path)) {
                    $table = 'category_photo';
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
                        $table = 'category_photo_admin';
                        $filds = [
                            "id" => NULL,
                            "photo_id" => $lastId,
                            "blog_id" => GET('category_id'),
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
                setMessage('عملیات ناموفق','درج عکس دسته بندی با موفیت درج نشد','error');
            } else {
                setMessage('عملیات موفق','درج عکس دسته بندی با موفیت درج شد','success');
                redirect('update_photo_category.php?category_id='.$_GET['category_id']);
            }
        }
    }
    else {
        if (POST('action') === 'blogImg') {
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
                $path = '/images/category/';
                $full_path = rtrim(DOMAIN['document_root'], '/') . $path . $new_name;     
                
                
                if (@move_uploaded_file($file['tmp_name'], $full_path)) {

                    $table = 'category_photo';
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
                redirect('update_photo_category.php?category_id='.$_GET['category_id']);
            }
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'create_category') {
    $validation=validator([
    'title'=>'required|persian_chars',
    'title_english'=>'required|english_chars',
    'parent'=>'numeric'
]);

    if ($validation['status']){
        $parent_id = '';
        if (empty($_POST['parent_id'])){
            $parent_id=null;
        }else{
            $parent_id=$_POST['parent_id'];
        }
        $create_category = createCategoryy($_POST['title'], $_POST['title_english'], $parent_id,$_POST['Collection_id']);
        if ($create_category) {
                setMessage('عملیات موفق', 'افزودن دسته با موفقیت انجام شد', 'success');
        } else{
            setMessage('عملیات نا موفق', 'افزودن دسته با موفقیت انجام نشد', 'error');
    }
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'update_category') {
    $validation=validator([
        'title'=>'required|persian_chars',
        'parent'=>'numeric',
        'english_title'=>'english_chars'
    ]);
    if ($validation['status']){
        $update_category = updateCategory($_POST['title'], $_POST['title_english'], $_POST['parent_id'], $_POST['status'], $_POST['Collection_id'], $_GET['category_id']);
        $id1=$_POST["id"];
        if ($update_category) {
                setMessage('عملیات موفق', 'ویرایش دسته با موفقیت انجام شد', 'success');
            }
        } else setMessage('عملیات نا موفق', 'ویرایش دسته با موفقیت انجام نشد', 'error');



}

if (isset($_GET['action']) && $_GET['action'] === 'change_status_category') {
$new_status=$_GET['old_status'] === 'active' ? 'inactive' : 'active';
    $update_status_category = updateStatusCategory($new_status, $_GET['category_id']);

    if ($update_status_category) {
        setMessage('عملیات موفق', 'ویرایش وضعیت با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'ویرایش وضعیت با موفقیت انجام نشد', 'error');
    back();


}
if (isset($_GET['action']) && $_GET['action'] === 'delete_category') {
    $delete_category = deleteCategory($_GET['category_id']);
    if ($delete_category) {
        setMessage('عملیات موفق', 'حذف دسته با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'حذف دسته با موفقیت انجام نشد', 'error');
    back();
}

if (pageName() == 'update_category') {
    $category = selectParentCategory($_GET['category_id']);


}

if (isset($_GET['action']) && $_GET['action'] === 'DeleteCategoryProductsOrder') {
    $delete_category = deleteCategoryOrder($_GET['ids'],$_GET['product_id']);
    if ($delete_category) {
        setMessage('عملیات موفق', 'حذف دسته با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'حذف دسته با موفقیت انجام نشد', 'error');
    back();
}