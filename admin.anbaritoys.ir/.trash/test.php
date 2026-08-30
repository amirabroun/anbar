<?php
$key = 0;
$getUser = getproduct();
$getUser2 = getproduct2();
/*foreach ($getUser as $user){
    foreach ($getUser2 as $key=> $products){
        if ($user['id'] === $products['product_id']){
           echo $products['product_id'];
           $number = $products['product_id'];
           $i = 0;
           if ((int)$products['product_id'] === (int)$number){
                $keys = $i++;
                $_SESSION['keys'] = $keys;
                continue;
           }
        }else{
            $test = $_SESSION['keys'] . $_SESSION['whi'];
            dd($test);
        }
    }$number = $_SESSION['keys'];
}
echo $key;*/
/*
foreach ($getUser2 as $product){
    $photoCreate=createPhoto($photo_name,$src,$photo_suffix);
    if ($photoCreate) {
        $sort = 1;
        $LastPhoto = getLastPhotoProduct($_POST['product_id']);
        if ($LastPhoto) {
            $sort = $LastPhoto['sort'] + 1;
        }
    }
}*/

//session_unset();

dd($_SESSION);