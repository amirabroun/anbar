<?php
function createCollection($title,$title_english){
global $cn;
$sql="insert into collection (title, english_title) VALUE (?,?)";
$result=$cn->prepare($sql);
$result ->bindValue(1,$title);
$result ->bindValue(2,$title_english);
return $result->execute();
}

function selectCollection2 ($id){
    global $cn;
    $sql="select * from collection where id =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectCollectionTBL(){
    global $cn;
    $sql="select * from collection";
    $result=$cn->query($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
   
}

function deleteCollection($category_id){
    global $cn;
    $sql="DELETE FROM `collection` WHERE `id` = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$category_id);
    return $result->execute();
}

function updateStatusCollection($status,$category_id){
    global $cn;
    $sql="update collection set status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$status);
    $result ->bindValue(2,$category_id);
    return $result->execute();
}

function updateCollection($title,$title_english,$status,$category_id ){
    global $cn;
    $sql="update collection set title=?,english_title=?,status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
    $result ->bindValue(2,$title_english);
    $result ->bindValue(3,$status);
    $result ->bindValue(4,$category_id);
    return $result->execute();

}

