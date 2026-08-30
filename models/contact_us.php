<?php
function createContact_us ($user_id,$mobile,$name,$Issue,$Description){
    global $cn;
    $sql="INSERT INTO `contact_us` (`user_id`,`mobile`,`name`,`Issue`,`Description`) VALUES (?,?,?,?,?)";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->bindValue(2,$mobile);
    $result->bindValue(3,$name);
    $result->bindValue(4,$Issue);
    $result->bindValue(5,$Description);
    return $result->execute();
}

function selectUserIdTBLcontact_us ($user_id){
    global $cn;
    $sql=" select * from contact_us where user_id=?";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>4) {
        return $result->fetchAll();
    }
    return false;
}

function selectcontact_us (){
    global $cn;
    $sql="SELECT * FROM `about_us`";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectabout_us_mobile (){
    global $cn;
    $sql="SELECT * FROM `about_us_mobile`";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectabout_us_address (){
    global $cn;
    $sql="SELECT * FROM `about_us_address`";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectAbout_question_ById (){
    global $cn;
    $sql="select * from about_us_question where id ='1'";

    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}