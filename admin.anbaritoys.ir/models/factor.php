<?php
function selectAdressOrdersByUserIdd ($user_id){
    global $cn;
    $sql="select * from addresses_order where order_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function priceFormant($price){
    return number_format($price). 'تومان';

}

function selectAdressOrdersByUserIddd ($user_id){
    global $cn;
    $sql="select * from addresses where id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
function selectPeyOrdersByUserIdd ($user_id){
    global $cn;
    $sql="select * from payments where order_ir = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
function selectOrdersByUserIdByIdd ($user_id){
    global $cn;
    $sql="select * from orders where id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectorder_productByUserIdd ($user_id){
    global $cn;
    $sql="select * from order_product where order_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function selectorder_cititByUserIdd ($user_id){
    global $cn;
    $sql="select * from cities where id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectorder_preByUserIdd ($user_id){
    global $cn;
    $sql="select * from provinces where id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function selectOrdersByUserIdd (){
    global $cn;
    $sql="select * from orders order by id desc";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getDetailsProductsByIDd($id) {
    global $cn;
    $sql = "select products.*, p.src photo_src, p.name photo_name, c.title category_title, c.parent_id category_parent_id from products
            join categories c on c.id = products.category_id and c.status = 'active'
            join brands b on b.id = products.brand_id and b.status = 'active'
            left join photo_product on products.id = photo_product.product_id
            left join photos p on photo_product.photo_id = p.id
            where products.status != 'inactive' and products.id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}

function getDetailsProductsByIDd2($id) {
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

function updateStatusFactor($status,$category_id){
    global $cn;
    $sql="update orders set status_admin=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$status);
    $result ->bindValue(2,$category_id);
    return $result->execute();
}