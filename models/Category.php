<?php
function createCategory($title,$title_english,$parent_id ){
    global $cn;
    if (empty($parent_id)){
        $parent_id=null;
    }
    $sql="insert into categories (parent_id, title, english_title) VALUE (?,?,?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$parent_id);
    $result ->bindValue(2,$title);
    $result ->bindValue(3,$title_english);
    return $result->execute();

}

function selectCategory (){
    global $cn;
    $sql="select * from categories where parent_id is null";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectCollation2 (){
    global $cn;
    $sql="select * from collection where status = 'active'";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectCategoryIndex (){
    global $cn;
    $sql="select * from categories where status = 'active' and Collection_id = 12";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectCategoryAge (){
    global $cn;
    $sql="select * from categories where Collection_id = '13' and status = 'active'";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectCategoryShackss (){
    global $cn;
    $sql="select * from categories where Collection_id = '14' and status = 'active'";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectBrandIndex (){
    global $cn;
    $sql="select * from brands where status = 'active' and id != '33'";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectCategoryByCollection_id ($Collection_id){
    global $cn;
    $sql="select * from categories where Collection_id = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$Collection_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectCollectionFIL ($Collection_id){
    global $cn;
    $sql="select * from Collection where id = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$Collection_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectCategoryzero ($category_zero){
    global $cn;
    $sql="select * from categories where parent_id = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$category_zero);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectCategoryzeroCollation ($category_zero){
    global $cn;
    $sql="select * from categories where status ='active' and Collection_id = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$category_zero);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectBrand (){
    global $cn;
    $sql="select * from brands where id != 33";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getcategory ($category){
    global $cn;
    $sql="select title from categories where id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$category);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function getcategoryByCollection ($category){
    global $cn;
    $sql="select * from categories where Collection_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$category);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getcategoryByCollectionIn (){
    global $cn;
    $sql="select * from collection";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getcategoryByCollectionInn ($id){
    global $cn;
    $sql="select * from collection where id=?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getbrand ($category){
    global $cn;
    $sql="select title from brands where id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$category);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectCategoryTBLll(){
    global $cn;
    $sql="select * from categories ";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;

}

function selectParentCategory ($id){
    global $cn;
    $sql="select * from categories where id =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function updateStatusCategory($status,$category_id){
    global $cn;
    $sql="update categories set status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$status);
    $result ->bindValue(2,$category_id);
    return $result->execute();


}
function deleteCategory($category_id){
    global $cn;
    $sql="DELETE FROM `categories` WHERE `categories`.`id` = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$category_id);
    return $result->execute();

}
