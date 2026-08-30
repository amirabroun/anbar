<?php

function createProduct($title,$english_title,$price,$price_discounted,$stock,$category_id,$brand_id,$review,$description,$tracking_code ){
    global $cn;
    $sql="insert into products (title,english_title,price,price_discounted,stock,category_id,brand_id,review,description,tracking_code) VALUE (?,?,?,?,?,?,?,?,?,?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
    $result ->bindValue(2,$english_title);
    $result ->bindValue(3,$price);
    $result ->bindValue(4,$price_discounted);
    $result ->bindValue(5,$stock);
    $result ->bindValue(6,$category_id);
    $result ->bindValue(7,$brand_id);
    $result ->bindValue(8,$review);
    $result ->bindValue(9,$description);
    $result->bindValue(10,$tracking_code);
   return $result->execute();
}
function updateProduct($title,$english_title,$price,$price_discounted,$stock,$status,$brand_id,$description,$review,$category_id,$product_id ){
    global $cn;
    $sql="update products set title=?,english_title=?,price=?,price_discounted=?,stock=?,status=?,brand_id=?,description=?,review=?,category_id=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$title);
    $result ->bindValue(2,$english_title);
    $result ->bindValue(3,$price);
    $result ->bindValue(4,$price_discounted);
    $result ->bindValue(5,$stock);
    $result ->bindValue(6,$status);
    $result ->bindValue(7,$brand_id);
    $result ->bindValue(8,$description);
    $result ->bindValue(9,$review);
    $result ->bindValue(10,$category_id);
    $result ->bindValue(11,$product_id);
   return $result->execute();
}
function updateStatusProduct($status,$product_id){
    global $cn;
    $sql="update products set status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$status);
    $result ->bindValue(2,$product_id);
   return $result->execute();
}

function updateSuggestedProduct($status,$product_id){
    global $cn;
    $sql="update products set Suggested=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$status);
    $result ->bindValue(2,$product_id);
   return $result->execute();
}

function selectCategoryForProduct (){
    global $cn;
    $sql="select * from categories";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}



function selectCategoryForProductBanner (){
    global $cn;
    $sql="select * from categories where collection_id = 12 and status = 'active'";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectCategoryForProductAge (){
    global $cn;
    $sql="select * from categories where collection_id = 13 and status = 'active'";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectCategoryForProductBoy (){
    global $cn;
    $sql="select * from categories where collection_id = 15 and status = 'active'";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectCategoryForProductShakhs (){
    global $cn;
    $sql="select * from categories where collection_id = 14 and status = 'active'";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectBrandForProduct (){
    global $cn;
    $sql="select * from brands";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function selectProductTBL(){
    global $cn;
    $sql="select * from products ";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;

}
function selectcategoryy ($id){
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

function selectcategoryyOeser23 ($id){
    global $cn;
    $sql="select category_id from category_product where product_id =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectbrand ($id){
    global $cn;
    $sql="select * from brands where id =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
function selectproduct ($id){
    global $cn;
    $sql="select * from products where id =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
function deleteProduct($product_id){
    global $cn;
    $sql="DELETE FROM `products` WHERE `products`.`id` = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$product_id);
    return $result->execute();

}

function selectProductsTBL()
{
    global $cn;
    $sql = "select 
    CONCAT_WS('  ','گوشی',c.title,b.title,products.english_title,'ظرفیت',m.title,'گیگابایت','و','رم',r.title,'گیگابایت') as full_product_persian,
            products.id product_id,
            products.tracking_code tracking_code
            from products
            join categories c on products.category_id = c.id
            join brands b on b.id = products.brand_id
            join details d on products.id = d.product_id
            join memories m on m.id = d.memory_id
            join rams r on r.id = d.ram_id
            join packs p on p.id = d.pack_id ";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;

}

function selectproducts($id)
{
    global $cn;
    $sql = "select products.tracking_code tracking_code,CONCAT_WS('         ','افزودن تنوع محصولات ',tracking_code) as product_variety from products where id =?";

    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}

function updateOfferProduct($offer, $product_id)
{
    global $cn;
    $sql = "update products set offer=? where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $offer);
    $result->bindValue(2, $product_id);
    $result->execute();
    return $result->rowCount();

}

function createCategoryProduct2($photo_id,$product_id,$sort ){
    global $cn;
    $sql="insert into category_product (category_id,product_id,sort) VALUE (?,?,?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$photo_id);
    $result ->bindValue(2,$product_id);
    $result ->bindValue(3,$sort);
    return $result->execute();
}

function getLastCategoryProduct($product_id){
    global $cn;
    $sql="select * from category_product where product_id =? order by sort DESC limit 1";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$product_id);
    $result->execute();
    if ($result->rowCount()>0){
        return $result->fetch();
    }
    return false;
}

function getLastCategoryProduct2($product_id,$category){
    global $cn;
    $sql="select * from category_product where product_id =? and category_id = ? order by sort DESC limit 1";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$product_id);
    $result ->bindValue(2,$category);
    $result->execute();
    if ($result->rowCount()>0){
        return $result->fetch();
    }
    return false;
}