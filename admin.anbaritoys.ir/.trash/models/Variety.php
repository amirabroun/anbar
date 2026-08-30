<?php

function createvariety($product_id,$color_id,$stock,$price,$price_discounted){
    global $cn;
    $sql="insert into product_variety (product_id,color_id,stock,price,price_discounted) VALUE (?,?,?,?,?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$product_id);
    $result ->bindValue(2,$color_id);
    $result ->bindValue(3,$stock);
    $result ->bindValue(4,$price);
    $result ->bindValue(5,$price_discounted);
    return $result->execute();
}
function selectallproducts(){
            global $cn;
            $sql="select
            pv.is_default is_default,
            pv.id id,
            pv.price price,
            pv.price_discounted price_discounted,
            pv.stock stock,
            c.title color_title,
            p.tracking_code tracking_code,
            CONCAT_WS('  ',c2.title,b.title,p.english_title,'ظرفیت',m.title,'گیگابایت','و','رم',r.title,'گیگابایت') as full_title,
            CONCAT_WS('  ',b.english_title,p.english_title,m.title,'GB','And',r.title,'GB',c.english_title,'Phone') as full_title_english
                from products p
                join product_variety pv on p.id = pv.product_id
                join colors c on c.id = pv.color_id
                join details d on p.id = d.product_id
                join rams r on r.id = d.ram_id
                join categories c2 on c2.id = p.category_id
                join memories m on m.id = d.memory_id
                join brands b on b.id = p.brand_id
                join guarantees g on g.id = d.guarantee_id";
            $result=$cn->prepare($sql);+
             $result->execute();
            if($result->rowCount()>0) {
                return $result->fetchAll();
            }
            return false;
}

function selectproductvariety ($id){
    global $cn;
    $sql="select CONCAT(' رنگ ','',c.title) as color,
            p.tracking_code tracking_code,
            pv.price price,
            pv.price_discounted price_discounted,
            pv.stock stock
            from product_variety pv
            join colors c on c.id = pv.color_id
            join products p on p.id = pv.product_id
            where pv.id =?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
function updateProductvariety($stock,$price,$price_discounted,$variety_id ){
    global $cn;
    $sql="update product_variety set stock=?,price=?,price_discounted=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$stock);
    $result ->bindValue(2,$price);
    $result ->bindValue(3,$price_discounted);
    $result ->bindValue(4,$variety_id);
    return $result->execute();
}
function updatevariety ($id){
    global $cn;
    $sql=" update product_variety set is_default='no' where id=?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
function updatedefaultProduct($is_default,$pv_id ){
    global $cn;
    $sql="update product_variety set is_default=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$is_default);
    $result ->bindValue(2,$pv_id);
    $result->execute();
    return $result->rowCount();

}
