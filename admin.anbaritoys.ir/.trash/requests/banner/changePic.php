<?php
if (isset($_POST['action'])&& $_POST['action']=== 'changeBanner1'){
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$target_dir = "../../../user/assets/img/banner/";
$target_str = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_str,PATHINFO_EXTENSION));
$target_dir.= 'smallBanner1.' . $imageFileType;
if (! move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir)) {
    setMessage('عملیات نا موفق', 'ویرایش بنر با موفقیت انجام نشد', 'error');
    $_SESSION['flag']="no";
    header("location:../../banner.php");
}else{
    $_SESSION['flag']="ok";
    setMessage('عملیات موفق', 'ویرایش بنر با موفقیت انجام شد', 'success');
    header("location:../../banner.php");
}
}

if (isset($_POST['action'])&& $_POST['action']=== 'changeBanner2'){
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$target_dir = "../../../user/assets/img/banner/";
$target_str = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_str,PATHINFO_EXTENSION));
$target_dir.= 'smallBanner_2_1.' . $imageFileType;
if (! move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir)) {
    setMessage('عملیات نا موفق', 'ویرایش بنر با موفقیت انجام نشد', 'error');
    $_SESSION['flag']="no";
    header("location:../../banner.php");
}else{
    $_SESSION['flag']="ok";
    setMessage('عملیات موفق', 'ویرایش بنر با موفقیت انجام شد', 'success');
    header("location:../../banner.php");
}
}

if (isset($_POST['action'])&& $_POST['action']=== 'changeBanner3'){
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$target_dir = "../../../user/assets/img/banner/";
$target_str = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_str,PATHINFO_EXTENSION));
$target_dir.= 'smallBanner_2_2.' . $imageFileType;
if (! move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir)) {
    setMessage('عملیات نا موفق', 'ویرایش بنر با موفقیت انجام نشد', 'error');
    $_SESSION['flag']="no";
    header("location:../../banner.php");
}else{
    $_SESSION['flag']="ok";
    setMessage('عملیات موفق', 'ویرایش بنر با موفقیت انجام شد', 'success');
    header("location:../../banner.php");
}
}

if (isset($_POST['action'])&& $_POST['action']=== 'slider1'){
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$target_dir = "../../../user/assets/img/main-slider/";
$target_str = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_str,PATHINFO_EXTENSION));
$target_dir.= '1.' . $imageFileType;
if (! move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir)) {
    setMessage('عملیات نا موفق', 'ویرایش بنر با موفقیت انجام نشد', 'error');
    $_SESSION['flag']="no";
    header("location:../../banner.php");
}else{
    $_SESSION['flag']="ok";
    setMessage('عملیات موفق', 'ویرایش بنر با موفقیت انجام شد', 'success');
    header("location:../../banner.php");
}
}

if (isset($_POST['action'])&& $_POST['action']=== 'slider2'){
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$target_dir = "../../../user/assets/img/main-slider/";
$target_str = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_str,PATHINFO_EXTENSION));
$target_dir.= '2.' . $imageFileType;
if (! move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir)) {
    setMessage('عملیات نا موفق', 'ویرایش بنر با موفقیت انجام نشد', 'error');
    $_SESSION['flag']="no";
    header("location:../../banner.php");
}else{
    $_SESSION['flag']="ok";
    setMessage('عملیات موفق', 'ویرایش بنر با موفقیت انجام شد', 'success');
    header("location:../../banner.php");
}
}

if (isset($_POST['action'])&& $_POST['action']=== 'slider3'){
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$target_dir = "../../../user/assets/img/main-slider/";
$target_str = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_str,PATHINFO_EXTENSION));
$target_dir.= '3.' . $imageFileType;
if (! move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir)) {
    setMessage('عملیات نا موفق', 'ویرایش بنر با موفقیت انجام نشد', 'error');
    $_SESSION['flag']="no";
    header("location:../../banner.php");
}else{
    $_SESSION['flag']="ok";
    setMessage('عملیات موفق', 'ویرایش بنر با موفقیت انجام شد', 'success');
    header("location:../../banner.php");
}
}

if (isset($_POST['action'])&& $_POST['action']=== 'slider4'){
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$target_dir = "../../../user/assets/img/main-slider/";
$target_str = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_str,PATHINFO_EXTENSION));
$target_dir.= '4.' . $imageFileType;
if (! move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir)) {
    setMessage('عملیات نا موفق', 'ویرایش بنر با موفقیت انجام نشد', 'error');
    $_SESSION['flag']="no";
    header("location:../../banner.php");
}else{
    $_SESSION['flag']="ok";
    setMessage('عملیات موفق', 'ویرایش بنر با موفقیت انجام شد', 'success');
    header("location:../../banner.php");
}
}


if (isset($_POST['action'])&& $_POST['action']=== 'slider2_1'){
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$target_dir = "../../../user/assets/img/main-slider/slider-responsive/";
$target_str = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_str,PATHINFO_EXTENSION));
$target_dir.= '1.' . $imageFileType;
if (! move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir)) {
    setMessage('عملیات نا موفق', 'ویرایش بنر با موفقیت انجام نشد', 'error');
    $_SESSION['flag']="no";
    header("location:../../banner.php");
}else{
    $_SESSION['flag']="ok";
    setMessage('عملیات موفق', 'ویرایش بنر با موفقیت انجام شد', 'success');
    header("location:../../banner.php");
}
}

if (isset($_POST['action'])&& $_POST['action']=== 'slider2_2'){
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$target_dir = "../../../user/assets/img/main-slider/slider-responsive/";
$target_str = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_str,PATHINFO_EXTENSION));
$target_dir.= '2.' . $imageFileType;
if (! move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir)) {
    setMessage('عملیات نا موفق', 'ویرایش بنر با موفقیت انجام نشد', 'error');
    $_SESSION['flag']="no";
    header("location:../../banner.php");
}else{
    $_SESSION['flag']="ok";
    setMessage('عملیات موفق', 'ویرایش بنر با موفقیت انجام شد', 'success');
    header("location:../../banner.php");
}
}

if (isset($_POST['action'])&& $_POST['action']=== 'slider2_3'){
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$target_dir = "../../../user/assets/img/main-slider/slider-responsive/";
$target_str = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_str,PATHINFO_EXTENSION));
$target_dir.= '3.' . $imageFileType;
if (! move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir)) {
    setMessage('عملیات نا موفق', 'ویرایش بنر با موفقیت انجام نشد', 'error');
    $_SESSION['flag']="no";
    header("location:../../banner.php");
}else{
    $_SESSION['flag']="ok";
    setMessage('عملیات موفق', 'ویرایش بنر با موفقیت انجام شد', 'success');
    header("location:../../banner.php");
}
}

if (isset($_POST['action'])&& $_POST['action']=== 'slider2_4'){
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$target_dir = "../../../user/assets/img/main-slider/slider-responsive/";
$target_str = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_str,PATHINFO_EXTENSION));
$target_dir.= '4.' . $imageFileType;
if (! move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir)) {
    setMessage('عملیات نا موفق', 'ویرایش بنر با موفقیت انجام نشد', 'error');
    $_SESSION['flag']="no";
    header("location:../../banner.php");
}else{
    $_SESSION['flag']="ok";
    setMessage('عملیات موفق', 'ویرایش بنر با موفقیت انجام شد', 'success');
    header("location:../../banner.php");
}
}


