<?php
function dd($key){
    die(var_dump($key));
}
function pageName(){
    return str_replace(".php","",(ltrim($_SERVER["SCRIPT_NAME"],'/')));
}
function redirect($path){
    header("Location: ".$path);
    exit();
}
function dominUrl($path= ''){
    return $_SERVER['REQUEST_SCHEME'] .'://' .DOMAIN['public']['URL'] . '/' . ltrim($path,'/');
}
function productURl($tracking_code){
    return normalizePath( DOMAIN['main'] , "/single.php?tracking_code=$tracking_code");

}
function normalizePath(...$phat){

    $normalizePaths = array_map(function ($phat){
        return trim($phat,'/');
    }, $phat);
    return implode('/',$normalizePaths);

}
function url($path = null){
    $path_host = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
    //For Linux And Windows
    return $path_host . '/' . ltrim($path,'/');
}
function curenPage($path=null){
    $path_host = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
    return $path_host . '/' . ltrim($_SERVER['SCRIPT_NAME'],'/') . ltrim($path,'/');
}
function POST($key){
    return isset($_POST[$key]) ? $_POST[$key] : null;
}
function GET($key){
    return isset($_GET[$key]) ? $_GET[$key] : null;
}
function whirlpool($key){
    return hash('whirlpool',SECRET_TOKEN);
}
function setAlert($title,$icon,$text,$btn){
    $_SESSION["message"]=[
        'title'=>$title,
        'icon'=>$icon,
        'text'=>$text,
        'btn'=>$btn,
    ];
}
/////////////////////////////////////////////
function insertRecordToTable($tableName,$fields)
{

    try {
        global $conn;
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
        $result = $conn->prepare($sql);
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
function updateRecordToTable($tableName,$fields,$id)
{
    try {
        global $conn;
        $sql = "UPDATE $tableName SET ";
        foreach ($fields as $key=>$filed){
            $sql.=$key.'=? ,';
        }
        $sql = rtrim($sql,' ,');
        $sql.=' WHERE id='.$id;

        $result = $conn->prepare($sql);
        $param=1;
        foreach ($fields as $key=>$filed){
            $result->bindValue($param,$filed);
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
/// ////////////////////////////////////////
function validator(array  $fields){
    $errors =[];
    foreach ($fields as $key => $filed){
        $rules = explode('|',$filed);
        $validatorByRules= validatorByRules($rules,$key);
        if(!empty($validatorByRules)){
            $errors[$key] = $validatorByRules;
        }
    }
    if(!empty($errors)){
        $_SESSION['form_errors'][pageName()]=[
            'errors' => $errors,
            'title' => 'لطفا خطاهای زیر را برطرف کنید : ',
        ];

        return ['status' => false];
    }
    return ['status' => true];
}
function validatorByRules(array $rules , $input){
    $errors = [];
    foreach ($rules as $rule) {
        if($rule === 'required' || $rule === 'empty'){
            if(!isset($_REQUEST[$input]) || $_REQUEST[$input]===""){
                $errors[]=['rule' => $rule];
            }
            continue;
        }
        if($rule === 'number'){
            if(isset($_REQUEST[$input]) && !validateNumber($_REQUEST[$input])){
                $errors[]=['rule' => $rule];
            }
        }
        if($rule === 'mobile'){
            if(isset($_REQUEST[$input]) && !validateMobile($_REQUEST[$input])){
                $errors[]=['rule' => $rule];
            }
        }
        if($rule === 'password'){
            if(isset($_REQUEST[$input]) && !validatePassword($_REQUEST[$input])){
                $errors[]=['rule' => $rule];
            }
        }
        if($rule === 'repassword'){
            if($_REQUEST['password']!==$_REQUEST['repassword']){
                $errors[]=['rule' => 'repassword'];
            }
        }

        if($rule === 'lenChar'){
            if(isset($_REQUEST[$input]) && !lenChar($_REQUEST[$input])){
                $errors[]=['rule' => $rule];
            }
        }
        if($rule === 'national_code'){
            if(isset($_REQUEST[$input]) && !lenChar($_REQUEST[$input])){
                $errors[]=['rule' => $rule];
            }
        }

        if($rule === 'validatePostCode'){
            if(isset($_REQUEST[$input]) && !validatePostCode($_REQUEST[$input])){
                $errors[]=['rule' => $rule];
            }
        }
        if($rule === 'persian_chars'){
            if(isset($_REQUEST[$input]) && !validatePersian_Chars($_REQUEST[$input])){
                $errors[]=['rule' => $rule];
            }
        }
        if($rule === 'english_chars'){
            if(isset($_REQUEST[$input]) && !validateEnglish_Chars($_REQUEST[$input])){
                $errors[]=['rule' => $rule];
            }
        }

        if($rule === 'email'){
            if(isset($_REQUEST[$input]) && !validateEmail($_REQUEST[$input])){
                $errors[]=['rule' => $rule];
            }
        }

    }

    return $errors;
}
function validateNumber($data){
    if(!preg_match('/^[0-9]*$/' , $data)){
        return false;
    }
    return $data;
}
function validateMobile($data){
    if(!preg_match('/^(\+98|0)?9\d{9}$/' , $data)){
        return false;
    }
    return $data;
}
function validatePassword($data){
    if(strlen($data)<8){
        return false;
    }
    return $data;
}
function lenChar($data){
    if(strlen($data)>20){
        return false;
    }
    return $data;
}
function validatePersian_Chars($data){
    if(preg_match('/^[^\x{600}-\x{6FF}]+$/u', str_replace("\\\\","", $data))){
        return false;
    }
    return $data;
}
function validateEnglish_Chars($data){
    if(preg_match('/[^A-Za-z0-9 ]+/' , $data)){
        return false;
    }
    return $data;
}
function validateEmail($data){
    if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$data)){
        return false;
    }
    return $data;
}
function initFormErrors(){
    $html_last = null;
    $errors = @$_SESSION['form_errors'][pageName()]['errors'];
    $title_error =  @$_SESSION['form_errors'][pageName()]['title'];
    if($errors){

        foreach ($errors as $key => $error) {

            $input_label = translate($key);
            $html_first = null;
            foreach ($error as $value){

                $rule_lable = translate($value['rule'],true);

                $html_first.="<li style='list-style-type: none;' class='alert-text'>{$rule_lable}</li>";


            }
            $html_last .="<li style='' class=''>
            <span style='bold fof-15;color:red;border-radius:10px;font-size:16px;list-style-type: none;'>{$input_label}:</span>
            <ul style='padding: 0 10px;display: unset;font-size: 13px;color: black'>
             $html_first
            </ul>
            </li>";
        }
        $title_error = (empty($title_error)) ? 'لطفا خطاهای زیر را برطرف کنید!' :$title_error;
        unset($_SESSION['form_errors'][pageName()]);
        return "<ul style='border-radius: 10px;padding: 30px;border: 1px solid gray' class='bg-gray-400'>
        <li class='alert alert-danger' style='font-size: 16px;color:black;border:1px solid black;list-style-type: none'>{$title_error}</li>
        {$html_last}
        </ul>";
    }

}
function translate($word,$is_rule = false)
{
    $attributes = [
        'rules' => [
            'lenChar'=>'مقدار فیلد نباید از 20 کاراکتر بیشتر نباشد!',
            'nameANDfamily' => 'نام و نام خانوادگی',
            'codeDore'=>'لطفا را وارد کنید!',
            'password' => 'کلمه عبور نباید از 8 کاراکتر کمتر باشد!',
            'mobile' => 'شماره تلفن وارد شده نا معتبر است!',
            'codeDore' => 'شماره کد وارد شده نا معتبر است!',
            'onemobile' => 'شماره تلفن وارد شده نا معتبر است!',
            'number' => 'مقدار فیلد باید فقط عدد باشد!',
            'required' => 'فیلد نباید خالی باشد!',
            'english_chars' => 'لطفا مقدار را لاتین بنویسید!',
            'email' => 'لطفا ایمیل را با ساختار مناسب وارد کنید!',
            'repassword'=>'کلمه عبور با تکرارش مطابقت ندارد',
        ],
        'inputs' => [
            'title' => 'عنوان',
            'mobile' => 'شماره موبایل',
            'password_confirmation' => 'تکرار کلمه عبور',
            'unit_price' => 'قیمت',
            'unit_in_stock' => 'موجودی',
            'brand' => 'برند',
            'english_title' => 'عنوان انگلیسی',
            'category' => 'دسته بندی',
            'price_discounted' => 'قسمت با تخفیف',
            'cellphone' => 'شماره تلفن همراه',
            'password' => 'کلمه عبور',
            'password_rule' => 'کلمه عبور',
            'description' => 'توضیحات',
            'first_name' => 'نام',
            'last_name' => 'نام خانوادگی',
            'email' => 'ایمیل',
            'national_code' => 'کد ملی ',
            'onemobile' => ' موبایل',
            'date' => ' تاریخ تولد',
            'firstName' => 'نام',
            'codeDore' => 'نام دوره  ',
            'username' => 'نام کاربری',
            'lastName' => 'نام خانوادگی',
            'repassword' => 'تکرار کلمه عبور',
            'province' => 'استان را وارد کنید',
            'city' => 'شهر را وارد کنید',
            'adrass' => 'آدرس را وارد کنید',
            'postal_code' => 'کد پستی  را وارد کنید',
            'name' => 'نام نباید خالی باشد',
            'nameANDfamily'=>'نام ونام خوانوادگی',
            'namedore'=>'نام دوره',
            'decrebtion'=>'توضیحات ',
        ],
    ];
    if($is_rule){
        return @$attributes['rules'][$word];
    }
    return @$attributes['inputs'][$word];
}
////////////////////////////////////////////
function numberFormat($number){
    return number_format($number)." تومان ";
}
///////new sms function/////////
function bcrypt($data,$hash=null){
    if (!$hash){
        return password_verify($data,$hash);
    }
    return password_hash($data,PASSWORD_BCRYPT,[
        'cost'=>11
    ]);
}
function generateDigit($length=5){
    $min='1' . str_repeat('0',$length-1);
    $max=str_repeat('9',$length);
    return random_int($min,$max);
}
function generateTrackingCode($length = 150) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function phone_Number(){
if (isset($_SESSION['auth']['register']['mobile'])){
    echo$_SESSION['auth']['register']['mobile'];
}
}
////////////////////////////////////////////
function userProfile($user_id){
    try {
        global $conn;
        $sql="select * from users where id=?";
        $result = $conn->prepare($sql);
        $result->bindParam(1,$_SESSION['userLogin']);
        $result->execute();
        if($result && $result->rowCount()>0){

            return $result->fetchAll();
        }
    }catch (PDOException $e){
        return false;
    }
}

function responsejson(array $data){
    exit(json_encode($data));
}