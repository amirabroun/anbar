<?php
function select_discount_code_user($gift_code){
    global $cn;
    $sql="select * from discount_code_one_user where discount_code_one_user_name = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$gift_code);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function select_discount_code_userById($gift_code){
    global $cn;
    $sql="select * from discount_code_one_user where id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$gift_code);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function select_discount_code($gift_code){
    global $cn;
    $sql="select * from discount_code_grop where discount_code_one_user_name = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$gift_code);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function select_discount_codeById($gift_code){
    global $cn;
    $sql="select * from discount_code_grop where id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$gift_code);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function select_discount_code_user_code_id($gift_code){
    global $cn;
    $sql="select * from discount_code_one_user where id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$gift_code);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function select_discount_code_user_order($discount_id,$user_id){
    global $cn;
    $sql="select * from discount_code_user where discount_id = ? and user_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$discount_id);
    $result->bindValue(2,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
function select_discount_code_user_interest($user_id){
    global $cn;
    $sql="select * from discount_code_user where user_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function select_discount_code_order($discount_id,$user_id){
    global $cn;
    $sql="select * from discount_code_product where product_id = ? and discount_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$discount_id);
    $result->bindValue(2,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
function select_discount_code_product_order($discount_id){
    global $cn;
    $sql="select * from discount_code_product where discount_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$discount_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function select_discount_code_product_grop_order($discount_id){
    global $cn;
    $sql="select * from discount_code_product_grop where discount_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$discount_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function select_discount_code_product_grop_order2($discount_id){
    global $cn;
    $sql="select * from discount_code_product_grop where discount_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$discount_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function select_discount_code_product_grop_order3($discount_id){
    global $cn;
    $sql="select * from discount_code_grop where id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$discount_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function delete_code_user($discount_id,$user_id){
    global $cn;
    $sql="DELETE FROM `discount_code_user` WHERE `discount_id` = ? and user_id = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$discount_id);
    $result ->bindValue(2,$user_id);
    return $result->execute();
}

function update_discount_code_grop_order2($id){
    global $cn;
    $sql="update discount_code_grop set stock = stock - 1 where id= ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}