<?php
if (pageName() === 'update_photo_brand') {
    $getImgBlog = getImgBlog2(GET('brand_id'));
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
                $path = '/images/brand/';
                $full_path = rtrim(DOMAIN['document_root'], '/') . $path . $new_name;
                if (@move_uploaded_file($file['tmp_name'], $full_path)) {
                    $table = 'brand_photo';
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
                        $table = 'brand_photo_admin';
                        $filds = [
                            "id" => NULL,
                            "photo_id" => $lastId,
                            "blog_id" => GET('brand_id'),
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
                setMessage('عملیات ناموفق','درج عکس برند با موفیت درج نشد','error');
            } else {
                setMessage('عملیات موفق','درج عکس برند با موفیت درج شد','success');
                redirect('update_photo_brand.php?brand_id='.$_GET['brand_id']);
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
                $path = '/images/brand/';
                $full_path = rtrim(DOMAIN['document_root'], '/') . $path . $new_name;
                if (@move_uploaded_file($file['tmp_name'], $full_path)) {

                    $table = 'brand_photo';
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
                redirect('update_photo_brand.php?brand_id='.$_GET['brand_id']);
            }
        }
    }
}


if (isset($_POST['action'])&& $_POST['action']=== 'create_brand'){

    $validation=validator([
        'title'=>'required|persian_chars',
        'english_title'=>'required|english_chars'

    ]);
    if ($validation['status']){
        $create_brand=createBrand($_POST['title'],$_POST['english_title']);
        setMessage('عملیات موفق', 'افزودن دسته با موفقیت انجام شد', 'success');

    }else setMessage('عملیات نا موفق', 'افزودن برند با موفقیت انجام نشد', 'error');

}

if (isset($_GET['action'])&& $_GET['action']=== 'delete_prepre'){
    $id = $_REQUEST['id'];
    if (deletePrepre($id)) {
        setMessage('عملیات نا موفق', 'حذف مقاله با موفقیت انجام نشد', 'error');
    } else {
        setMessage('عملیات موفق', 'حدف مقاله با موفقیت انجام شد', 'success');
    }
}

if (isset($_POST['action'])&& $_POST['action']=== 'update_brand'){
    $validation=validator([
        'title'=>'required|persian_chars',
        'english_title'=>'english_chars'

    ]);
    if ($validation['status']){
        $update_brand=updateBrand($_POST['title'],$_POST['english_title'],$_POST['status'],$_GET['brand_id']);
        $id1=$_POST["id"];
        if ($update_brand){
            $dir="../user/brand/";
            $filename=basename($_FILES["pic"]["name"]);
            $pictype=pathinfo($filename,PATHINFO_EXTENSION);
            if ($pictype !== 'png'){
                setMessage('هشدار', 'برند مورد نظر آپدیت شد اما عکس آن تعغیر نیافت زیرا پسوند عکس وارد شده باید png باشد.', 'warning');
            }else{
                $dir.=$id1 . '.' . $pictype;
                move_uploaded_file($_FILES["pic"]["tmp_name"],$dir);
                setMessage('عملیات موفق', 'ویرایش برند با موفقیت انجام شد', 'success');
            }
        }
        else setMessage('عملیات نا موفق', 'ویرایش برند با موفقیت انجام نشد', 'error');


    }


}
if (isset($_GET['action']) && $_GET['action'] === 'change_status_brand') {
    $new_status_brand=$_GET['old_status_brand'] === 'active' ? 'inactive' : 'active';
    $update_status_brand = updateStatusBrand($new_status_brand,$_GET['brand_id']);
    if ($update_status_brand) {
        setMessage('عملیات موفق', 'ویرایش وضعیت با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'ویرایش وضعیت با موفقیت انجام نشد', 'error');
    back();


}
if (isset($_GET['action']) && $_GET['action'] === 'delete_brand') {
    $delete_brand = deleteBrand($_GET['brand_id']);
    if ($delete_brand) {
        setMessage('عملیات موفق', 'حذف برند با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'حذف برند با موفقیت انجام نشد', 'error');
    back();


}
if (pageName()=='update_brand'){
    $category=selectBrand($_GET['brand_id']);


}