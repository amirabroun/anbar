<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$target_dir = "../../../photos.anbaritoys.ir/images/products/";
$target_str = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_str,PATHINFO_EXTENSION));
$target_dir.= 'smallBanner1.' . $imageFileType;
if (! move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir)) {
    $_SESSION['error'].='آپلود با خطا رو به رو شد'.'<br>';
    $_SESSION['flag']="no";
    header("location:../index.php");
}else{
    $_SESSION['flag']="ok";
    $_SESSION['error']='تغییرات یا موفقیت انجام شد';
    header("location:../index.php");
}


