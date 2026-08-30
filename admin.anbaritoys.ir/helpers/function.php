<?php
function test()
{
    echo "wellcome....";
}
function dd(...$data)
{
    var_dump(...$data);
    exit();
}

function insertRecordToDatabase($tablename,$fileds){
    try {

        $sql="INSERT INTO ". $tablename ."(";

        foreach ($fileds as $key => $filed){
            $sql.=$key . ", ";
        }
        $sql = substr($sql, 0, -2);
        $sql.=") VALUES (";
        foreach ($fileds as $key => $filed){
            $sql.="?" . ", ";
        }



        $sql = substr($sql, 0, -2);


        $sql.=")";
        global $cn;
        $result = $cn->prepare($sql);
        $param=0;
        foreach ($fileds as $key => $filed) {
            $result->bindValue(++$param,$filed);
        }
        $result->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}


function pagename(){
    $filter_1= ltrim($_SERVER['SCRIPT_NAME'],'/');
    return rtrim(basename($filter_1),'.php');

}

function insertRecordToTable($tableName,$fields)
{

    try {
        global $cn;
        $sql = "insert into $tableName (";
        foreach ($fields as $key=>$filed){
            $sql.=$key.' ,';
        }
        $sql = rtrim($sql,' ,');

        $sql.=") values (";
        foreach ($fields as $key=>$filed){
            $sql.='? ,';
        }
        $sql = rtrim($sql,' ,');
        $sql.=")";
        $result = $cn->prepare($sql);
        $param=1;
        foreach ($fields as $key=>$filed){
            $result->bindValue($param, $filed);
            $param++;
        }

        $result->execute();
        return true;
    } catch (PDOException $e) {
        /*var_dump($e);
        die();*/
        return false;
    }
}

function setMessage($title, $text, $type)
{
    $_SESSION['message'] = [
        'title' =>$title,
        'text' => $text,
        'type' => $type,

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
                'status'=>400,
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
    exit(json_encode($data));
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

function statusFctor ($status){
    switch ($status){
        case 'active':
            return'<span style="width: 110px;"><span class="label label-primary label-dot mr-2"></span><span class="font-weight-bold text-primary">مشاهده شده</span></span>';
            case 'inactive':
            return'<span style="width: 110px;"><span class="label label-danger label-dot mr-2"></span><span class="font-weight-bold text-danger">مشاهده نشده</span></span>';
            case 'unavialable':
            return'ناموجود'
            ; case 'stop_selling':
            return'توقف فروش';
        default :
            return 'نامشخص';
    }
}
function statusFctor2 ($status){
    switch ($status){
        case 'success':
            return'<span style="width: 110px;"><span class="label label-primary label-dot mr-2"></span><span class="font-weight-bold text-primary">پرداخت موفق</span></span>';
            case 'failed':
            return'<span style="width: 110px;"><span class="label label-danger label-dot mr-2"></span><span class="font-weight-bold text-danger">پرداخت ناموفق</span></span>';
            case 'unavialable':
            return'ناموجود'
            ; case 'stop_selling':
            return'توقف فروش';
        default :
            return 'نامشخص';
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

function Suggested ($Suggested){
    switch ($Suggested){
        case 'yes':
            return'<span style="width: 110px;"><span class="label label-primary label-dot mr-2"></span><span class="font-weight-bold text-primary">فعال</span></span>';
            case 'no':
            return'<span style="width: 110px;"><span class="label label-danger label-dot mr-2"></span><span class="font-weight-bold text-danger">غیر فعال</span></span>';
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

function GET($key){
    return isset($_GET[$key]) ? $_GET[$key] : null;
}
function POST($key){
    return isset($_POST[$key]) ? $_POST[$key] : null;
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

function whirlpool($key){
    return hash('whirlpool',SECRET_TOKEN);
}