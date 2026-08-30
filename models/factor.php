<?php
function selectOrdersByUserId ($user_id){
    global $cn;
    $sql="select * from orders where user_id = ? order by id desc";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectOrdersByUserIdLIMIT ($user_id){
    global $cn;
    $sql="select * from orders where user_id = ? order by id desc limit 3";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectOrdersByUserIdById ($user_id){
    global $cn;
    $sql="select * from orders where id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectOrdersByUserIdByTracking_code ($user_id){
    global $cn;
    $sql="select * from orders where tracking_code = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectAdressOrdersByUserId ($user_id){
    global $cn;
    $sql="select * from addresses_order where order_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectorder_productByUserId ($user_id){
    global $cn;
    $sql="select * from order_product where order_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectorder_productByUserId_check ($order_id,$user_id){
    global $cn;
    $sql="select * from orders where id = ? and user_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$order_id);
    $result->bindValue(2,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectPeyOrdersByUserId ($user_id){
    global $cn;
    $sql="select * from payments where order_ir = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}