<?php
function createInterest ($user_id,$product_id){
    global $cn;
    $sql="INSERT INTO `interest` (`user_id`,`product_id`) VALUES (?,?)";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->bindValue(2,$product_id);
    return $result->execute();
}

function selectInterest ($user_id,$product_id){
    global $cn;
    $sql="select * from interest where user_id = ? and product_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->bindValue(2,$product_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectIn_change ($user_id,$product_id){
    global $cn;
    $sql="select * from interest where user_id = ? and product_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->bindValue(2,$product_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function select_one_product ($product_id){
    global $cn;
    $sql="select product_id from interest where product_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$product_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectInterestByUserId ($user_id){
    global $cn;
    $sql="select * from interest where user_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectInterestByProductId ($user_id){
    global $cn;
    $sql="select * from interest where product_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}


function getLastProductsById22 ($category){
    global $cn;
    $sql="select * from products where products.id = ?  order by  products.created_at";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$category);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
