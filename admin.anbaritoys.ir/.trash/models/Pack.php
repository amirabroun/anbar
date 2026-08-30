<?php
function CreatePack($title,$title_english){
    global $cn;
    $sql="insert into packs (title,title_english) VALUE (?,?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
    $result ->bindValue(2,$title_english);
   return $result->execute();
}
function selectPacksTBL(){
    global $cn;
    $sql="select * from packs ";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;

}
function updateStatusPack($status,$color_id){
    global $cn;
    $sql="update packs set status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$status);
    $result ->bindValue(2,$color_id);
    return $result->execute();

}
function selectPackId ($id){
    global $cn;
    $sql="select * from packs where id =?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
