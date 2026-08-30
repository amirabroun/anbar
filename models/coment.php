<?php
function createComente ($text_user,$name,$user_id,$product_id){
    global $cn;
    $sql="INSERT INTO `comente` (`text_user`,`name`,`user_id`,`teack_product`) VALUES (?,?,?,?)";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$text_user);
    $result->bindValue(2,$name);
    $result->bindValue(3,$user_id);
    $result->bindValue(4,$product_id);
    return $result->execute();
}

function createquestion ($text_user,$name,$user_id,$product_id){
    global $cn;
    $sql="INSERT INTO `question` (`text_user`,`name`,`text_admin`,`user_id`,`teack_product`) VALUES (?,?,'nulll',?,?)";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$text_user);
    $result->bindValue(2,$name);
    $result->bindValue(3,$user_id);
    $result->bindValue(4,$product_id);
    return $result->execute();
}

function selectUserIdTBLcomente ($user_id,$teack_product){
    global $cn;
    $sql=" select * from comente where user_id=? and teack_product = ?";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->bindValue(2,$teack_product);
    $result->execute();
    if($result->rowCount()>4) {
        return $result->fetchAll();
    }
    return false;
}

function selectUserIdTBLquestion ($user_id,$teack_product){
    global $cn;
    $sql=" select * from question where user_id=? and teack_product = ?";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->bindValue(2,$teack_product);
    $result->execute();
    if($result->rowCount()>4) {
        return $result->fetch();
    }
    return false;
}

function selectUserIdTBLquestion2 ($user_id,$teack_product){
    global $cn;
    $sql=" select * from question where user_id=? and teack_product = ?";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->bindValue(2,$teack_product);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectcoment ($user_id,$teack_product){
    global $cn;
    $sql=" select * from comente where user_id=? and teack_product = ? order by id desc ";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->bindValue(2,$teack_product);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectcoment2 ($teack_product){
    global $cn;
    $sql=" select * from comente where teack_product = ? AND status ='active' order by id desc ";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$teack_product);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectquestion ($user_id,$teack_product){
    global $cn;
    $sql=" select * from question where user_id=? and teack_product = ? order by id desc ";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->bindValue(2,$teack_product);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectquestion2 ($teack_product){
    global $cn;
    $sql=" select * from question where teack_product = ? and status = 'active' order by id desc ";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$teack_product);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
