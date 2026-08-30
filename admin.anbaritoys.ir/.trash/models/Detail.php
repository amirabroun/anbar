<?php

function selectColorForProduct (){
    global $cn;
    $sql="select * from colors";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function selectMemoryForProduct (){
    global $cn;
    $sql="select * from memories";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function selectRamForProduct (){
    global $cn;
    $sql="select * from rams";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function selectGuaranteeForProduct (){
    global $cn;
    $sql="select * from guarantees";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function selectPackForProduct (){
    global $cn;
    $sql="select * from packs";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function createdetail($product_id,$battery_id,$memory_id,$ram_id,$Screen_technology,$Size,$Weight,$Photo_resolution,$Os_version,$sim_card,$guarantee_id,$pack_id ){
    global $cn;
    $sql="insert into details (product_id,battery_id,memory_id,ram_id,Screen_technology,Size,Weight,Photo_resolution,Os_version,sim_card,guarantee_id,pack_id) VALUE (?,?,?,?,?,?,?,?,?,?,?,?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$product_id);
    $result ->bindValue(2,$battery_id);
    $result ->bindValue(3,$memory_id);
    $result ->bindValue(4,$ram_id);
    $result ->bindValue(5,$Screen_technology);
    $result ->bindValue(6,$Size);
    $result ->bindValue(7,$Weight);
    $result ->bindValue(8,$Photo_resolution);
    $result ->bindValue(9,$Os_version);
    $result->bindValue(10,$sim_card);
    $result->bindValue(11,$guarantee_id);
    $result->bindValue(12,$pack_id);
    return $result->execute();
}