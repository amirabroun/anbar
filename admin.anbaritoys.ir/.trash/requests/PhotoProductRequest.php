if (!isset($_FILES['photo_product']) || !isset($_POST['product_id'])){
}
else {
    $photo_suffix=pathinfo($_FILES['photo_product']['name'],PATHINFO_EXTENSION);
    $photo_name=PREFIX_IMAGE_CODE['product'].generateRandomString().".$photo_suffix";
    $src= '/images/products/';
    $photoCreate=createPhoto($photo_name,$src,$photo_suffix);
    if ($photoCreate){
        $sort=1;
        $LastPhoto=getLastPhotoProduct($_POST['product_id']);
        if ($LastPhoto){
            $sort = $LastPhoto['sort']+1;
        }
        createPhotoProduct($photoCreate,$_POST['product_id'],$sort);
        $full_path_image=normalizedPath(DOCUMENT_ROOT_DOMAIN['public'],$src,$photo_name);
        if (move_uploaded_file($_FILES['photo_product']['tmp_name'],$full_path_image)){
            responseJson([
                'message' => 'عکس با موفقیت ذخیره شد.',
            ]);
        }
        http_response_code(500);
        responseJson([
            'message' => 'ذخیره عکس با خطا مواجه شد.',
        ]);
    }
    http_response_code(500);
    responseJson([
        'message' => 'خطای داخلی داده است.',
    ]);
}
if (!isset($_FILES['photo_category']) || !isset($_POST['category_id'])) {

} else {
    $photo_suffix = pathinfo($_FILES['photo_product']['name'], PATHINFO_EXTENSION);
    $photo_name = PREFIX_IMAGE_CODE['product'] . generateRandomString() . ".$photo_suffix";
    $src = '/images/category/';
    $photoCreate = createPhoto($photo_name, $src, $photo_suffix);
    if ($photoCreate) {
        $sort = 1;
        $LastPhoto = getLastPhotoProduct($_POST['product_id']);
        if ($LastPhoto) {
            $sort = $LastPhoto['sort'] + 1;
        }
        createPhotoProduct($photoCreate, $_POST['product_id'], $sort);
        $full_path_image = normalizedPath(DOCUMENT_ROOT_DOMAIN['public'], $src, $photo_name);
        if (move_uploaded_file($_FILES['photo_product']['tmp_name'], $full_path_image)) {
            responseJson([
                'message' => 'عکس با موفقیت ذخیره شد.',
            ]);
        }
        http_response_code(500);
        responseJson([
            'message' => 'ذخیره عکس با خطا مواجه شد.',
        ]);
    }
    http_response_code(500);
    responseJson([
        'message' => 'خطای داخلی داده است.',
    ]);
}