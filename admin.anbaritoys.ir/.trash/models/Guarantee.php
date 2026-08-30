<?php
function Createguarantee($title){
    global $cn;
    $sql="insert into guarantees (title) VALUE (?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
   return $result->execute();
}
function selectguaranteeTBL(){
    global $cn;
    $sql="select * from guarantees ";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;

}
function updateStatusguarantee($status,$guarantee_id){
    global $cn;
    $sql="update guarantees set status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$status);
    $result ->bindValue(2,$guarantee_id);
    return $result->execute();

}
function selectguaranteeId ($id){
    global $cn;
    $sql="select * from guarantees where id =?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}