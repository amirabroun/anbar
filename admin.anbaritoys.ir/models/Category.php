<?php
function createCategoryy($title,$title_english,$parent_id,$Collection_id ){
    global $cn;
    if (empty($parent_id)){
        $parent_id=null;
    }
    $sql="insert into categories (parent_id, title, english_title , Collection_id) VALUE (?,?,?,?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$parent_id);
    $result ->bindValue(2,$title);
    $result ->bindValue(3,$title_english);
    $result ->bindValue(4,$Collection_id);
    return $result->execute();

}

function createDiscount_code($title,$title_english,$price,$min_price){
    global $cn;
    $sql="insert into discount_code_one_user (title, discount_code_one_user_name,price,min_price) VALUE (?,?,?,?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
    $result ->bindValue(2,$title_english);
    $result ->bindValue(3,$price);
    $result ->bindValue(4,$min_price);
    return $result->execute();

}

function createDiscount_code5($title,$title_english,$stock,$price,$minPrice){
    global $cn;
    $sql="insert into discount_code_grop (title, discount_code_one_user_name, stock,price,min_price) VALUE (?,?,?,?,?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
    $result ->bindValue(2,$title_english);
    $result ->bindValue(3,$stock);
    $result ->bindValue(4,$price);
    $result ->bindValue(5,$minPrice);
    return $result->execute();

}

function change_code($title,$title_english){
    global $cn;
    $sql="insert into discount_code_user (discount_id,user_id,sort) VALUE (?,?,'1')";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
    $result ->bindValue(2,$title_english);
    return $result->execute();
}

function change_code_product($title,$title_english){
    global $cn;
    $sql="insert into discount_code_product (product_id,discount_id,sort) VALUE (?,?,'1')";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
    $result ->bindValue(2,$title_english);
    return $result->execute();
}

function change_code_product2($title,$title_english){
    global $cn;
    $sql="insert into discount_code_product_grop (product_id,discount_id,sort) VALUE (?,?,'1')";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
    $result ->bindValue(2,$title_english);
    return $result->execute();
}

function updateCategory($title,$title_english,$parent_id,$status,$Collection_id, $category_id ){
    global $cn;

    if (empty($parent_id)){
        $parent_id=null;
    }
    if (empty($Collection_id)){
        $Collection_id=0;
    }
    $sql="update categories set parent_id=?,title=?,english_title=?,status=?,Collection_id=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$parent_id);
    $result ->bindValue(2,$title);
    $result ->bindValue(3,$title_english);
    $result ->bindValue(4,$status);
    $result ->bindValue(5,$Collection_id);
    $result ->bindValue(6,$category_id);

    return $result->execute();
}


function updateblogg($title,$title_english,$Collection_id,$category_id,$label,$MiniDescription ){
    global $cn;

    if (empty($parent_id)){
        $parent_id=null;
    }
    if (empty($Collection_id)){
        $Collection_id=0;
    }
    $sql="update paper set title=?,Created=?,description=?,label=?,MiniDescription=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
    $result ->bindValue(2,$title_english);
    $result ->bindValue(3,$Collection_id);
    $result ->bindValue(4,$label);
    $result ->bindValue(5,$MiniDescription);
    $result ->bindValue(6,$category_id);

    return $result->execute();
}

function selectCategory (){
    global $cn;
    $sql="select * from categories where parent_id is null";
    $result=$cn->query($sql);
    $result->execute();
    if($result->rowCount()>0) {
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
        return $result->fetchAll();
    }
    return false;
}

function selectcheckinusercode ($discount_id,$user_id){
    global $cn;
    $sql="select * from discount_code_user where discount_id = ? and user_id = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$discount_id);
    $result ->bindValue(2,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectcheckinPRODUCTcode ($discount_id,$user_id){
    global $cn;
    $sql="select * from discount_code_product where discount_id = ? and product_id = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$discount_id);
    $result ->bindValue(2,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectcheckinPRODUCTcode2 ($discount_id,$user_id){
    global $cn;
    $sql="select * from discount_code_product_grop where discount_id = ? and product_id = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$discount_id);
    $result ->bindValue(2,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectCategoryTBLquestion(){
    global $cn;
    $sql="select * from question ";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectCategoryTBLcontact_us(){
    global $cn;
    $sql="select * from contact_us ";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectCategoryTBLcomente(){
    global $cn;
    $sql="select * from comente ";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}


function selectCategoryTBLquestion22($id){
    global $cn;
    $sql="select * from question where id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectCategoryTBLcontact_us22($id){
    global $cn;
    $sql="select * from contact_us where id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectCategoryTBLcomente2($id){
    global $cn;
    $sql="select * from comente where id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectuserTBL(){
    global $cn;
    $sql="select * from users";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectcode_userTBL(){
    global $cn;
    $sql="select * from discount_code_one_user";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;

}

function selectcode_gropTBL(){
    global $cn;
    $sql="select * from discount_code_grop";
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

function selectBlogg ($id){
    global $cn;
    $sql="select * from paper where id =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}


function selectCollationCategory ($id){
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

function selectmobileuser ($id){
    global $cn;
    $sql="select * from users where id =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectproductTrack ($id){
    global $cn;
    $sql="select * from products where tracking_code =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function Sells ($id){
    global $cn;
    $sql="select status from sell where id =?";

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

function updateStatusSell($status,$category_id){
    global $cn;
    $sql="update sell set status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$status);
    $result ->bindValue(2,$category_id);
    return $result->execute();
}

function updateStatusComante($status,$category_id){
    global $cn;
    $sql="update comente set status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$status);
    $result ->bindValue(2,$category_id);
    return $result->execute();
}

function updateStatusMassage($status,$category_id){
    global $cn;
    $sql="update question set status=? where id=?";
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

function deleteCategoryOrder($category_id,$product_id){
    global $cn;
    $sql="DELETE FROM `category_product` WHERE `category_id` = ? and `product_id` = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$category_id);
    $result ->bindValue(2,$product_id);
    return $result->execute();
}

function deleteGropCode($id){
    global $cn;
    $sql="DELETE FROM `discount_code_grop` WHERE `id` = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    return $result->execute();
}

function deleteuserCode($id){
    global $cn;
    $sql="DELETE FROM `discount_code_one_user` WHERE `id` = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    return $result->execute();
}

function deleteuserCodein($id,$user_id){
    global $cn;
    $sql="DELETE FROM `discount_code_user` WHERE discount_id = ? and user_id = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result ->bindValue(2,$user_id);
    return $result->execute();
}

function deleteproductCodein($id,$user_id){
    global $cn;
    $sql="DELETE FROM `discount_code_product` WHERE discount_id = ? and product_id = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result ->bindValue(2,$user_id);
    return $result->execute();
}

function deleteproductCodein2($id,$user_id){
    global $cn;
    $sql="DELETE FROM `discount_code_product_grop` WHERE discount_id = ? and product_id = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result ->bindValue(2,$user_id);
    return $result->execute();
}
