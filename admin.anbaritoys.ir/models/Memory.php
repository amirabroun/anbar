<?php
function Creatememory($title){
    global $cn;
    $sql="insert into memories (title) VALUE (?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
   return $result->execute();
}
function selectmemoryTBL(){
    global $cn;
    $sql="select * from memories ";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;

}
function updateStatusmemory($status,$color_id){
    global $cn;
    $sql="update memories set status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$status);
    $result ->bindValue(2,$color_id);
    return $result->execute();

}
function selectMemoryId ($id){
    global $cn;
    $sql="select * from memories where id =?";
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
function selectmemory ($id){
    global $cn;
    $sql="select * from memories where id =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}