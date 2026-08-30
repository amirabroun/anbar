<?php
$tracking_code=PREFIX_TRACKING_CODE['product'].generateRandomNumber();
if (isset($_POST['action']) && $_POST['action']=== 'create_product'){
    $validation=validator([
        'title'=>'required|persian_chars',
        'english_title'=>'required|english_chars',
        'price'=>'numeric',
        'stock'=>'numeric',
    ]);
    if ($validation['status']){

        if ($_POST['category_id'] > 1){
            $_category_id = (int)$_POST['category_id'];
        }else{
            $_category_id = 37;
        }

        if ($_POST['brand_id'] > 1){
            $_brand_id = (int)$_POST['brand_id'];
        }else{
            $_brand_id = 33;
        }

        if ($_POST['price_discounted'] > 0){
            $price_discounted = (int)$_POST['brand_id'];
        }else{
            $price_discounted = 0;
        }

        $create_product=createProduct($_POST['title'],$_POST['english_title'],$_POST['price'], $price_discounted ,$_POST['stock'],$_category_id, $_brand_id ,$_POST['review'],$_POST['description'],$tracking_code);
        if ($create_product){
            $_SESSION['insertCategory'] = 'yes';
            global $cn;
            $lastId = $cn->lastInsertId();
            redirect("manage_products_category.php?product_id=".$lastId);
        }
        else setMessage('عملیات نا موفق', 'افزودن محصول با موفقیت انجام نشد', 'error');
    }

}
if (isset($_POST['action'])&& $_POST['action']=== 'update_product'){
    $validation=validator([
        'title'=>'required|persian_chars',
        'review'=>'required',
        'description'=>'required',
        'english_title'=>'required|english_chars',
        'price'=>'numeric',
        'price_discounted'=>'numeric',
        'stock'=>'numeric',
    ]);
    if ($validation['status']){
        if ($_POST['category_id'] === 'انتخاب کنید...'){
            $_category_id = 37;
        }else{
             $_category_id = $_POST['category_id'];
        }

        if ($_POST['brand_id'] === 'انتخاب کنید...'){
            $_brand_id = 33;
        }else{
             $_brand_id = $_POST['brand_id'];
        }

        $update_product=updateProduct($_POST['title'],$_POST['english_title'],$_POST['price'],$_POST['price_discounted'],$_POST['stock'],$_POST['status'], $_brand_id ,$_POST['description'],$_POST['review'], $_category_id ,$_GET['products_id']);
        if ($update_product){
            setMessage('عملیات موفق', 'ویرایش محصول با موفقیت انجام شد', 'success');
        }
        else setMessage('عملیات نا موفق', 'افزودن محصول با موفقیت انجام نشد', 'error');

    }

}


if (isset($_GET['action']) && $_GET['action'] === 'change_status_products') {
    $new_status=$_GET['old_status_product'] === 'active' ? 'inactive' : 'active';
    $update_status_product = updateStatusProduct($new_status, $_GET['products_id']);

    if ($update_status_product) {
        setMessage('عملیات موفق', 'ویرایش وضعیت با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'ویرایش وضعیت با موفقیت انجام نشد', 'error');
    back();
}

if (isset($_GET['action']) && $_GET['action'] === 'change_Suggested_products') {
    $new_status=$_GET['old_Suggested_product'] === 'yes' ? 'no' : 'yes';
    $update_status_product = updateSuggestedProduct($new_status, $_GET['products_id']);

    if ($update_status_product) {
        setMessage('عملیات موفق', 'محصول با موفقیت در پیشنهادی ها قرار گرفت', 'success');
    } else setMessage('عملیات نا موفق', 'محصول در پیشنهادی ها قرار نگرفت', 'error');
    back();
}


if (isset($_GET['action']) && $_GET['action'] === 'delete_product') {
    $delete_product = deleteProduct($_GET['products_id']);
    if ($delete_product) {
        setMessage('عملیات موفق', 'حذف محصول با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'حذف محصول با موفقیت انجام نشد', 'error');
    back();


}
if (pageName()=='update_products'){
    $product=selectproduct($_GET['products_id']);



}


if (pageName()=='manage_products_category'){
    if (isset($_SESSION['insertCategory'])){
        setMessage('عملیات موفق', 'افزودن محصول با موفقیت انجام شد برای تکمیل محصول و نمایش آن دسته بندی های این کالا را اضافه کنید', 'warning');
        unset($_SESSION['insertCategory']);
    }
if (isset($_POST['createCategoryToProducts'])){
    $sort=1;
    $LastPhoto=getLastCategoryProduct($_GET['product_id']);
    if ($LastPhoto){
        $sort = $LastPhoto['sort']+1;
    }
    $getLastCategoryProduct2  = getLastCategoryProduct2((int)$_GET['product_id'],(int)$_POST['category_id']);
    if (!$getLastCategoryProduct2){
        $CategoryCreate=createCategoryProduct2((int)$_POST['category_id'],(int)$_GET['product_id'],$sort);
        if ($CategoryCreate){
            setMessage('عملیات موفق', 'دسته بندی با موفقیت به این کالا اضافه شد', 'success');
        }
    }else{
        setMessage('عملیات ناموفق', 'این دسته بندی از قبل به این کالا افزوده شده', 'error');
    }
}
}
