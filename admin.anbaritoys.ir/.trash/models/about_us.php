<?php
function selectAbout_usTBLll(){
    global $cn;
    $sql="select * from about_us ";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;

}

function selectAddressTBLll(){
    global $cn;
    $sql="select * from about_us_address ";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;

}

function selectQuestionTBLll(){
    global $cn;
    $sql="select * from about_us_question";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;

}

function selectMobileTBLll(){
    global $cn;
    $sql="select * from about_us_mobile";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;

}

function selectAbout_usById ($id){
    global $cn;
    $sql="select * from about_us where id =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectAddressById ($id){
    global $cn;
    $sql="select * from about_us_address where id =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectQuestionById ($id){
    global $cn;
    $sql="select * from about_us_question where id =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectMobileById ($id){
    global $cn;
    $sql="select * from about_us_mobile where id =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function update_about_us($text,$id){
    global $cn;
    $sql="update about_us set text=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$text);
    $result ->bindValue(2,$id);
    return $result->execute();
}

function update_about_us_address($text,$id){
    global $cn;
    $sql="update about_us_address set address=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$text);
    $result ->bindValue(2,$id);
    return $result->execute();
}

function update_about_us_question($text,$id){
    global $cn;
    $sql="update about_us_question set question=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$text);
    $result ->bindValue(2,$id);
    return $result->execute();
}

function update_about_us_mobile($mobile,$mobileTo,$mobile_home,$id){
    global $cn;
    $sql="update about_us_mobile set mobile=?,mobileTo=?,mobile_home=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$mobile);
    $result ->bindValue(2,$mobileTo);
    $result ->bindValue(3,$mobile_home);
    $result ->bindValue(4,$id);
    return $result->execute();
}