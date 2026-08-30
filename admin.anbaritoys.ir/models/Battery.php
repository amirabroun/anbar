<?php
function Createbattery($title){
    global $cn;
    $sql="insert into batteries (title) VALUE (?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
   return $result->execute();
}
function selectBatteriesTBL(){
    global $cn;
    $sql="select * from batteries ";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;

}
function updateStatusBattery($status,$battery_id){
    global $cn;
    $sql="update batteries set status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$status);
    $result ->bindValue(2,$battery_id);
    return $result->execute();

}
function selectBatteryForProduct (){
    global $cn;
    $sql="select * from batteries";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
