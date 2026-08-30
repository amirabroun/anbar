<?php
function updateStatususer($status,$category_id){
    global $cn;
    $sql="update users set status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$status);
    $result ->bindValue(2,$category_id);
    return $result->execute();
}
function getUserById ($id){
    global $cn;
    $sql="select * from users where id=?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
function updataMassage($massage,$id){
    global $cn;
    $sql="update question set text_admin=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$massage);
    $result ->bindValue(2,$id);
    return $result->execute();
}
function deleteMassage($id){
    global $cn;
    $sql="DELETE FROM `question` WHERE `id` = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    return $result->execute();
}

function deletecontact_us($id){
    global $cn;
    $sql="DELETE FROM `contact_us` WHERE `id` = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    return $result->execute();
}

function delete_comante($id){
    global $cn;
    $sql="DELETE FROM `comente` WHERE `id` = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    return $result->execute();
}