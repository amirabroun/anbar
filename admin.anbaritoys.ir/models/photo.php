<?php
function createPhoto($photo_name,$src,$suffix){
    global $cn;
    $sql="insert into photos (name, src, suffix) VALUE (?,?,?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$photo_name);
    $result ->bindValue(2,$src);
    $result ->bindValue(3,$suffix);
    if ($result->execute()){
        return $cn->lastInsertId();
    }
    return false;
}

function getPhotoProduct222($product_id){
    global $cn;
    $sql="SELECT * FROM `photos` WHERE id = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$product_id);
    $result->execute();
    if ($result->rowCount()>0){
        return $result->fetch();
    }
    return false;
}

function createPhotoProduct($photo_id,$product_id,$sort ){
    global $cn;
    $sql="insert into photo_product (photo_id,product_id,sort) VALUE (?,?,?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$photo_id);
    $result ->bindValue(2,$product_id);
    $result ->bindValue(3,$sort);
    return $result->execute();
}
function getLastPhotoProduct($product_id){
    global $cn;
    $sql="select * from photo_product where product_id =? order by sort DESC limit 1";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$product_id);
    $result->execute();
    if ($result->rowCount()>0){
        return $result->fetch();
    }
    return false;

}
function getPhotoProduct($product_id){
    global $cn;
    $sql="SELECT * FROM photo_product where product_id = ? ";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$product_id);
    $result->execute();
    if ($result->rowCount()>0){
        return $result->fetch();
    }
    return false;
}




// فهرست کامل عکس‌های یک محصول (getPhotoProduct فقط یک ردیف برمی‌گرداند)
function getPhotoProductList($product_id){
    global $cn;
    $sql="select pp.*, p.src, p.name from photo_product pp join photos p on p.id = pp.photo_id where pp.product_id = ? order by pp.sort asc";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$product_id);
    $result->execute();
    if ($result->rowCount()>0){
        return $result->fetchAll();
    }
    return false;
}
function getImgBlog($blog){
    try {
        global $cn;
        $sql="select * from category_photo_admin where blog_id = ?";
        $result = $cn->prepare($sql);
        $result->bindParam(1, $blog);
        $result->execute();
        if($result && $result->rowCount()>0){
            return $result->fetch();
        }
    }catch (PDOException $e){
        return false;
    }
}


function getImgBlog2($blog){
    try {
        global $cn;
        $sql="select * from brand_photo_admin where blog_id = ?";
        $result = $cn->prepare($sql);
        $result->bindParam(1, $blog);
        $result->execute();
        if($result && $result->rowCount()>0){
            return $result->fetch();
        }
    }catch (PDOException $e){
        return false;
    }
}

function getImgBlog3($blog){
    try {
        global $cn;
        $sql="select * from blog_photo_admin where blog_id = ?";
        $result = $cn->prepare($sql);
        $result->bindParam(1, $blog);
        $result->execute();
        if($result && $result->rowCount()>0){
            return $result->fetch();
        }
    }catch (PDOException $e){
        return false;
    }
}
