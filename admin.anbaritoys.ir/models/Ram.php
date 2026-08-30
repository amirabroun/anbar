<?php
function Createram($title){
    global $cn;
    $sql="insert into rams (title) VALUE (?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
   return $result->execute();
}
function selectramTBL(){
    global $cn;
    $sql="select * from rams ";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;

}
function selectRamId ($id){
    global $cn;
    $sql="select * from rams where id =?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
function updateStatusram($status,$ram_id){
    global $cn;
    $sql="update rams set status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$status);
    $result ->bindValue(2,$ram_id);
    return $result->execute();

}

function selectram ($id){
    global $cn;
    $sql="select * from rams where id =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}