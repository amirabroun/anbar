<?php

function selectPhotoProducts($id){
    global $cn;
    $sql="select photo_id from photo_product where product_id = ? order by sort desc limit 1";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}


function selectStockForYou($id){
    global $cn;
    $sql="select stock from stock_for_you where id = ? order by sort desc limit 1";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectPhotosByID($id){
    global $cn;
    $sql="select * from photos where id = ? order by id desc limit 1";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function getLastProducts (){
    global $cn;
    $sql="select * from products where status = 'active' order by   products.created_at desc limit 10";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getLastProductsss (){
    global $cn;
    $sql="select * from products where status = 'active' order by  products.created_at";

    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getLastProductsssZero (){
    global $cn;
    $sql="select * from products where status = 'active' order by  products.created_at desc";

    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getLastProductsssPriceZero (){
    global $cn;
    $sql="select * from products where status = 'active' order by  products.price";

    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getLastProductsss100Zero (){
    global $cn;
    $sql="select * from products where status = 'active' order by  products.price desc";

    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getLastProductsByCategory ($category){
    global $cn;
      $sql=" select * from products where products.id= ? and status = 'active' order by products.id DESC";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$category);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}


function getLastProductsByCategoryy ($category){
    global $cn;
    $sql="  select products.*, p.src photo_src ,p.name photo_name,c.title category_title from products
            left join photo_product  on products.id = photo_product.product_id
            left join photos p on photo_product.photo_id = p.id
            join categories c on c.id=products.category_id
            where products.category_id= ? and  products.status = 'active'
            group by products.created_at order by  products.created_at  limit 25";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$category);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getLastProductsByBrand ($category){
    global $cn;
    $sql="select * from products where brand_id= ? and status = 'active' order by  products.created_at";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$category);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getLastProductsByCategoryIsId ($category){
    global $cn;
        $sql="select * from products where products.id= ? and status = 'active' order by  products.id DESC";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$category);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function getLastProductsByCategoryIsIdBrand ($category){
    global $cn;
    $sql="  select * from products where brand_id= ? and status = 'active' order by  products.id DESC";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$category);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getLastProductsByCategoryIsIdPrice ($category,$price){
    global $cn;
    $sql="  select * from products where price > ? and price < ? and status = 'active' order by  products.id DESC";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$category);
    $result->bindValue(2,$price);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getLastProductsByCategoryIsIdPrice2 ($category,$price){
    global $cn;
    $sql="  select * from products where price > ? and price < ? and status = 'active' order by  products.id";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$category);
    $result->bindValue(2,$price);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getLastProductsByCategoryIsIdPrice3 ($category,$price){
    global $cn;
    $sql="  select * from products where price > ? and price < ? and status = 'active' order by  products.id";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$category);
    $result->bindValue(2,$price);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getLastProductsByCategoryIsIdPrice4 ($category,$price){
    global $cn;
    $sql="select * from products where price > ? and price < ? and status = 'active' order by  products.price DESC";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$category);
    $result->bindValue(2,$price);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getLastProductsByBrandIsPriseZero ($category){
    global $cn;
    $sql="select * from products where brand_id= ? and status = 'active' order by  products.price";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$category);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getLastProductsByBrandIsPriseFool ($category){
    global $cn;
    $sql="select * from products where brand_id= ? and status = 'active' order by  products.price DESC";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$category);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectproduct2($id){
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


function getLastProductsSuggested (){
    global $cn;
    $sql="  select * from products where Suggested = 'yes' and status = 'active' order by  created_at";

    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getDetailsProducts ($tracking_code){
    global $cn;
    $sql="select products.*, brands.title as brand_title from products left join brands on products.brand_id = brands.id where products.status != 'inactive' and products.tracking_code=?";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$tracking_code);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function getDetailsProductsByOrderCategory ($tracking_code){
    global $cn;
    $sql="  select * from category_product where category_id = ? order by id desc";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$tracking_code);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getDetailsProductsByOrderCategory22 ($tracking_code){
    global $cn;
    $sql="  select * from category_product where category_id = ? ";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$tracking_code);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getDetailsProductsByOrderCategory33 ($tracking_code){
    global $cn;
    $sql="  select * from category_product where category_id = ? order by id desc";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$tracking_code);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}


function getDetailsProductsByOrderCategoryByProduct ($tracking_code,$category){
    global $cn;
    $sql="  select * from category_product where product_id = ? and category_id=?  ";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$tracking_code);
    $result->bindValue(2,$category);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function getDetailsCart2 ($id){
    global $cn;
    $sql="select * from products where products.status != 'inactive' and products.id=?";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
function getDetailsCart3 ($id){
    global $cn;
    $sql="select * from products where products.id=?";

    $result=$cn->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function getProducts (){
    global $cn;
    $sql="  select * from products order by  products.created_at  limit 12";
    $result=$cn->query($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getProductsByCategory ($brand_id){
    global $cn;
    $sql="select * from products where products.id = ? and status = 'active' order by  products.id  limit 20";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$brand_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function updateProductStock($id, $quantity) {
    global $cn;
    $sql = "update products set stock = stock - ? where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $quantity);
    $result->bindValue(2, $id);
    $result->execute();
    if($result->rowCount() > 0){
        return true;
    }
    return false;
}

function getDetailsProductsByID22($id) {
    global $cn;
    $sql = "select * from products where products.status != 'inactive' and products.id=? order by  products.created_at";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function getDetailsProductsByID2($id) {
    global $cn;
    $sql = "select * from products where products.status != 'inactive' and products.id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}


function getproduct(){
    global $cn;
    $sql="select * from products";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getproduct2(){
    global $cn;
    $sql="select * from order_product order by product_id";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getProductPhotoss($product_id){
    try {
        global $cn;
        $product_id = (int)($product_id);
        $sql = "select p.*,pp.sort from category_photo_admin pp 
        join category_photo p on p.id = pp.photo_id	where pp.blog_id = ? order by pp.sort";
        $result = $cn->prepare($sql);
        $result->bindParam(1, $product_id);
        $result->execute();
        if ($result->rowCount() > 0){
            return $result->fetch();
        }

    }catch (PDOException $e){
        return false;
    }
}

function getProductPhotossss($product_id){
    try {
        global $cn;
        $product_id = (int)($product_id);
        $sql = "select p.*,pp.sort from brand_photo_admin pp 
        join brand_photo p on p.id = pp.photo_id	where pp.blog_id = ? order by pp.sort";
        $result = $cn->prepare($sql);
        $result->bindParam(1, $product_id);
        $result->execute();
        if ($result->rowCount() > 0){
            return $result->fetch();
        }

    }catch (PDOException $e){
        return false;
    }
}

function getLastProductsPriceIndex(){
    global $cn;
    $sql="  SELECT * FROM products where status = 'active' ORDER BY RAND() limit 10";

    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectcategoryyOeser ($id){
    global $cn;
    $sql="select * from category_product where product_id =?";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectcategoryyOeser44($id){
    global $cn;
    $sql="select * from category_product where product_id = ? limit 1";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectcategoryyOeser55($id,$id2){
    global $cn;
    $sql="select * from category_product where category_id = ? and product_id != ? limit 10";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result ->bindValue(2,$id2);
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

function selectcategoryyOeser2 ($id){
    global $cn;
    $sql="select * from category_product where category_id =? order by id desc ";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectcategoryyOeser3 ($id){
    global $cn;
    $sql="select * from category_product where category_id =?  ";

    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}