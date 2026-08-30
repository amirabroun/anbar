<?php
/*try{
require  'tools/kavenegar/vendor/autoload.php';
$sender = "10008663";
$receptor = "09395355271";
$message = "وب سرویس تخصصی کاوه نگار ";
$api = new \Kavenegar\KavenegarApi("7933653463386C5778676F4A4F4448634D66743143776D6C3278344B332F70717A49767967777569626F773D");
$api->Send($sender,$receptor,$message);
}catch(\Kavenegar\Exceptions\ApiException $e){
        echo $e->errorMessage();
}
catch(\Kavenegar\Exceptions\HttpException $e){
        echo $e->errorMessage();
}*/


require_once 'views/partial/header.php';
require_once 'views/partial/navbar.php';
require_once 'views/contents/main/Age_content.php';
require_once 'views/partial/footer.php';