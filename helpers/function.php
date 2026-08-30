<?php
function POST($key){
    return isset($_POST[$key]) ? $_POST[$key] : null;
}
function GET($key){
    return isset($_GET[$key]) ? $_GET[$key] : null;
}
function test()
{
    echo "wellcome....";
}
function dd(...$data)
{
    var_dump(...$data);
    exit();
}

function pagename(){
    $filter_1= ltrim($_SERVER['SCRIPT_NAME'],'/');
    return rtrim(basename($filter_1),'.php');
}

function setMessage($title, $text, $type)
{
    $_SESSION['message'] = [
        'title' =>$title,
        'text' => $text,
        'type' => $type,
    ];

}

function setMessage2($text, $type)
{
    $_SESSION['message2'] = [
        'type' => $type,
        'text' => $text,
    ];
}



function generateRandomNumber($length=10){
    try {
        $min ='1' .str_repeat('0',$length-1);
        $max=str_repeat('9',$length);
        return random_int((int)$min,(int)$max);
    } catch (Throwable $exception){
        return 0;
    }



}
function validator(array $fields)
{
    $errors = [];
    foreach ($fields as $input => $field) {
        $rules = explode('|', $field);
        $validatorByRules = validatorByRules($rules, $input);
        if (!empty($validatorByRules)) {
            $errors[$input] = $validatorByRules;
        }
    }

    if (!empty($errors)) {
        if (isAjaxRequest()){
            responseJson([
                'status'=> 420,
                'title'=>'خطاهای بوجود آمده را برطرف کنید',
                'message'=>initFormErrors($errors),
            ]);
        }
        $_SESSION['form_errors'][pageName()] = [
            'errors' => $errors,
            'title' => 'لطفا خطا های زیر را برطرف کنید:',
        ];
        return ['status' => false];
    }
    return ['status' => true];
}

function validatorByRules(array $rules, $input)
{
    $errors = [];
    foreach ($rules as $rule) {
        if ($rule === 'required') {
            if (!isset($_REQUEST[$input])) {
                $errors[] = ['rule' => $rule];
            }
            continue;
        }

        if ($rule === 'numeric') {
            if (isset($_REQUEST[$input]) && !is_numeric($_REQUEST[$input])) {
                $errors[] = ['rule' => $rule];
            }
        }
        if ($rule === 'mobile') {
            if (isset($_REQUEST[$input]) && !validateMobile($_REQUEST[$input])) {
                $errors[] = ['rule' => $rule];
            }
        }
        if ($rule === 'password') {
            if (isset($_REQUEST[$input]) && !validateLenPass($input)) {
                $errors[] = ['rule' => $rule];
            }
        }
        if ($rule === 'persian_chars') {
            if (isset($_REQUEST[$input]) && !validatePersianChars($_REQUEST[$input])) {
                $errors[] = ['rule' => $rule];
            }
        }
        if ($rule === 'Issue') {
            if (isset($_REQUEST[$input]) && !validatePersianChars($_REQUEST[$input])) {
                $errors[] = ['rule' => $rule];
            }
        }
        if ($rule === 'english_chars') {
            if (isset($_REQUEST[$input]) && !validateEnglishChars($_REQUEST[$input])) {
                $errors[] = ['rule' => $rule];
            }
        }
    }
    return $errors;
}

function translate($word, $is_rule = false)
{
    $attributes = [
        'rules' => LOCALIZATION['rules'],
        'inputs' => LOCALIZATION['inputs'],
    ];
    if ($is_rule) {
        return $attributes['rules'][$word] ?? $word;
    }
    return $attributes['inputs'][$word] ?? $word;
}

function initFormErrors($errors = null)
{
    $html_last = null;
    $errors = $_SESSION['form_errors'][pageName()]['errors'] ?? $errors;
    $title_error = $_SESSION['form_errors'][pageName()]['title'] ?? null;
    if ($errors) {
        foreach ($errors as $input => $error) {
            $input_label = translate($input);
            $html_first = null;
            foreach ($error as $value) {
                $rule_label = translate($value['rule'], true);
                $html_first .= "<li style='margin: 5px 10px;list-style: decimal;' class='alert-text'>{$rule_label}</li>";
            }
            $html_last .= "<li style='margin: 5px 10px;list-style: decimal;' class='alert-text'>
                <span class='bold fof-15'>{$input_label}:</span>
                <ul style='padding: 0 10px;display: unset;font-size: 13px;'>
                    $html_first
                </ul>
            </li>";
        }
        $title_error = (empty($title_error)) ? 'لطفا خطا های زیر را برطرف کنید!' : $title_error;
        unset($_SESSION['form_errors'][pageName()]);
        return "<ul style='padding: 0 10px;display: block;text-align: right;' class='alert alert-danger alert-bold'>
                    <p class='bold fof-17 mt-3'>" . $title_error . "</p>
                    <hr>
                    $html_last
                </ul>";
    }
    return null;
}

function validatePersianChars($data)
{
    if (!preg_match("/^([0-9\-\_ پچجحخهعغفقثصضشسیبلاتنمکگوئدذرزطظژآ])+$/u", $data)) {
        return false;
    }
    return true;
}

function validateEnglishChars($data)
{
    if (empty(trim($data))) {
        return false;
    }
    if (preg_match("/[^A-Za-z0-9\-\_\/ ]/", $data)) {
        return false;
    }
    return $data;
}

function validateMobile($data)
{
    if (empty(trim($data))) {
        return false;
    }
    if (!preg_match("/^09\d{9}$/", $data)) {
        return false;
    }
    return $data;
}

function validateLenPass($data)
{
    if (strlen($_REQUEST[$data]) < 8) {
        return false;
    }
    return $data;
}

function responseJson(array $data)
{
    exit(json_encode($data,JSON_UNESCAPED_UNICODE));
}

function isAjaxRequest(): bool
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}

function status ($status){
    switch ($status){
        case 'active':
            return'<span style="width: 110px;"><span class="label label-primary label-dot mr-2"></span><span class="font-weight-bold text-primary">فعال</span></span>';
            case 'inactive':
            return'<span style="width: 110px;"><span class="label label-danger label-dot mr-2"></span><span class="font-weight-bold text-danger">غیر فعال</span></span>';
            case 'unavialable':
            return'ناموجود'
            ; case 'stop_selling':
            return'توقف فروش';
        default :
            return 'نامشخص';
    }
}
function redirect($url =' /'){
    header("Location:$url");
    exit();

}
function back($url = '/'){
    redirect($_SERVER['HTTP_REFERER'] ??'/');

}
function generateRandomString($length=20){

    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;


}
function normalizedPath(...$paths){
        $normalizedPaths = array_map(function ($path){
            return trim($path,'/');
        },$paths);
        return implode('/',$normalizedPaths);
}
function priceFormant($price){
    return number_format($price). 'تومان';
}

function productUrl($tracking_code){
 return normalizedPath(DOMAIN['main'],"/single-product.php?tracking_code=$tracking_code");
}

function cagegorystUrl($tracking_code){
 return normalizedPath(DOMAIN['main'],"/cagegorys.php?id=$tracking_code");
}

function collectionstUrl($tracking_code){
 return normalizedPath(DOMAIN['main'],"/Collection.php?id=$tracking_code");
}

function brandtUrl($tracking_code){
 return normalizedPath(DOMAIN['main'],"/brand.php?id=$tracking_code");
}

function abort($status=404){
    include '404.php';
    http_response_code($status);
    exit();
}
function userUrl($phone){
    return normalizedPath(DOMAIN['main'],"/profile.php?mobile=$phone");
}


function userUrlupdate($phone){
    return normalizedPath(DOMAIN['main'],"/profile-additional-info.php?mobile=$phone");
}

function userinfoUrl($phone){
    return normalizedPath(DOMAIN['main'],"/profile-additional-info.php?mobile=$phone");
}

function userquestionUrl($phone){
    return normalizedPath(DOMAIN['main'],"/profile-question.php?mobile=$phone");
}

function useraddressUrl($phone){
    return normalizedPath(DOMAIN['main'],"/profile-addresses.php?mobile=$phone");
}
function userinterestUrl($phone){
    return normalizedPath(DOMAIN['main'],"/profile-interest.php?mobile=$phone");
}
function userfactorUrl($phone){
    return normalizedPath(DOMAIN['main'],"/profile-factor.php?mobile=$phone");
}

function usermassegeUrl($phone){
    return normalizedPath(DOMAIN['main'],"/profile-sendMassege.php?mobile=$phone");
}

function factorUrl($id,$phone){
    return normalizedPath(DOMAIN['main'],"/profile-single-factor.php?id=$id&mobile=$phone");
}


function cal_percentage($num_amount, $num_total) {
    $count1 = $num_amount / $num_total;
    $count2 = $count1 * 100;
    $count = number_format($count2, 0);
    return $count;
}

function authUser(){
    return $_SESSION['user_sing'] ?? false;
}

function authUserCart(){
    return $_SESSION['cart_user'] ?? false;
}

function updateRecordToDatabase($tablename,$fileds,$id){
    try {
        $sql="UPDATE ". $tablename ." SET ";
        foreach ($fileds as $key => $filed){
            $sql.=$key . "= ? , ";
        }
        $sql = substr($sql, 0, -2);
        $sql.=" WHERE id = " . $id;

        global $cn;
        $result = $cn->prepare($sql);
        $param=0;
        foreach ($fileds as $key => $filed) {
            $result->bindValue(++$param,$filed);
        }
        //dd($result);
        $result->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function statusComante ($status){
    switch ($status){
        case 'active':
            return'<span style="width: 110px;"><span class="label label-primary label-dot mr-2"></span><span class="font-weight-bold text-primary">تایید شده</span></span>';
        case 'inactive':
            return'<span style="width: 110px;"><span class="label label-danger label-dot mr-2"></span><span class="font-weight-bold text-danger">تایید نشده</span></span>';
        case 'unavialable':
            return'ناموجود'
                ; case 'stop_selling':
        return'توقف فروش';
        default :
            return 'نامشخص';
    }
}