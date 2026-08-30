<?php
if (isset($_POST['action']) && $_POST['action'] === 'create_collection') {
    $validation=validator([
        'title'=>'required|persian_chars',
        'title_english'=>'required|english_chars',
    ]);

    if ($validation['status']){
        $create_category = createCollection($_POST['title'], $_POST['title_english']);
        if ($create_category) {
                setMessage('عملیات موفق', 'افزودن مجموعه با موفقیت انجام شد', 'success');
            }
        } else{  setMessage('عملیات نا موفق', 'افزودن مجموعه با موفقیت انجام نشد', 'error');

        }
}

if (isset($_POST['action']) && $_POST['action'] === 'update_collection') {
    $validation=validator([
        'title'=>'required|persian_chars',
        'english_title'=>'english_chars'
    ]);
    if ($validation['status']){
        $update_category = updateCollection($_POST['title'], $_POST['title_english'], $_POST['status'], $_GET['collection_id']);
        $id1=$_POST["id"];
        if ($update_category) {
            setMessage('عملیات موفق', 'ویرایش دسته با موفقیت انجام نشد', 'success');
        } else setMessage('عملیات نا موفق', 'ویرایش دسته با موفقیت انجام نشد', 'error');
    }


}


if (isset($_GET['action']) && $_GET['action'] === 'change_status_collection') {
    $new_status=$_GET['old_status'] === 'active' ? 'inactive' : 'active';
    $update_status_category = updateStatusCollection($new_status, $_GET['category_id']);

    if ($update_status_category) {
        setMessage('عملیات موفق', 'ویرایش وضعیت با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'ویرایش وضعیت با موفقیت انجام نشد', 'error');
    back();
}

if (isset($_GET['action']) && $_GET['action'] === 'delete_collection') {
    $delete_category = deleteCollection($_GET['category_id']);
    if ($delete_category) {
        setMessage('عملیات موفق', 'حذف مجموعه با موفقیت انجام شد', 'success');
    } else setMessage('عملیات نا موفق', 'حذف مجموعه با موفقیت انجام نشد', 'error');
    back();
}
