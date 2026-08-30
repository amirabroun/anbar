<?php
function getUserByPhone ($phone){
    global $cn;
    $sql="select * from users where mobile=?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$phone);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}


function getUserByPhone2 ($phone){
    global $cn;
    $sql="select * from users where mobile=?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$phone);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
function createUser ($phone){
    global $cn;
    $sql="INSERT INTO `users` (`mobile`) VALUES (?);";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$phone);
   if($result->execute()){
       return$cn->lastInsertId();
   }
   return false;

}

function getDetailsUsers ($mobile){
    global $cn;
    $sql=" select * from users where mobile=?";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$mobile);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function updateUser($first_name,$last_name,$national_code,$phone){
    global $cn;
    $sql="update users set first_name=?,last_name=?,national_code=? where mobile=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$first_name);
    $result ->bindValue(2,$last_name);
    $result ->bindValue(3,$national_code);
    $result ->bindValue(4,$phone);
    return $result->execute();
}

function getIdUsers ($mobile){
    global $cn;
    $sql=" select id from users where mobile=?";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$mobile);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectCategoryTBLquestion222($id){
    global $cn;
    $sql="select * from question where user_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function select_massage_userById($gift_code){
    global $cn;
    $sql="select * from question where id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$gift_code);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
function select_productss($gift_code){
    global $cn;
    $sql="select * from products where tracking_code = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$gift_code);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
