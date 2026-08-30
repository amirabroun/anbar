<?php
function CreateColor($title,$english_title){
    global $cn;
    $sql="insert into colors (title,english_title) VALUE (?,?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
    $result ->bindValue(2,$english_title);
   return $result->execute();
}
function selectColorTBL(){
    global $cn;
    $sql="select * from colors ";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;

}
function updateColor($title,$title_english,$status,$brand_id ){
    global $cn;
    $sql="update colors set title=?,english_title=?,status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
    $result ->bindValue(2,$title_english);
    $result ->bindValue(3,$status);
    $result ->bindValue(4,$brand_id);
    return $result->execute();

}
function updateStatusColor($status,$color_id){
    global $cn;
    $sql="update colors set status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$status);
    $result ->bindValue(2,$color_id);
    return $result->execute();

}
function selectColorId ($id){
    global $cn;
    $sql="select * from colors where id =?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
//function deleteBrand($brand_id){
//    global $cn;
//    $sql="DELETE FROM `brands` WHERE `brands`.`id` = ?";
//    $result=$cn->prepare($sql);
//    $result ->bindValue(1,$brand_id);
//    return $result->execute();
//
//}
function selectcolor ($id){
    global $cn;
    $sql="select * from colors where id =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}