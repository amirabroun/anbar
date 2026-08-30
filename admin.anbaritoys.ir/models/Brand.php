<?php
function createBrand($title,$title_english){
    global $cn;
    $sql="insert into brands (title, english_title) VALUE (?,?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
    $result ->bindValue(2,$title_english);
   return $result->execute();
}
function selectBrandTBL(){
    global $cn;
    $sql="select * from brands ";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;

}
function updateBrand($title,$title_english,$status,$brand_id ){
    global $cn;
    $sql="update brands set title=?,english_title=?,status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
    $result ->bindValue(2,$title_english);
    $result ->bindValue(3,$status);
    $result ->bindValue(4,$brand_id);
    return $result->execute();

}
function updateStatusBrand($status,$brand_id ){
    global $cn;
    $sql="update brands set status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$status);
    $result ->bindValue(2,$brand_id);
    return $result->execute();

}
function selectBrandd ($id){
    global $cn;
    $sql="select * from brands where id =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
function deleteBrand($brand_id){
    global $cn;
    $sql="DELETE FROM `brands` WHERE `brands`.`id` = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$brand_id);
    return $result->execute();

}