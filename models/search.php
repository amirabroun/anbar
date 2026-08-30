<?php
function search1(){
    global $cn;
    $sql="select * from products where products.title like ? and status = 'active' order by  products.id desc";
    $result = $cn->prepare($sql);
    $result->bindValue(1,'%'.$_GET['search'].'%');
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function search2(){
    global $cn;
    $sql="select * from products where products.english_title like ? and status = 'active' order by  products.id desc";
    $result = $cn->prepare($sql);
    $result->bindValue(1,'%'.$_GET['search'].'%');
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function search3(){
    global $cn;
    $sql="select * from products where tracking_code like ? and status = 'active' order by  products.id desc";
    $result = $cn->prepare($sql);
    $result->bindValue(1,'%'.$_GET['search'].'%');
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}


function search4(){
    global $cn;
    $sql="select * from products where products.title like ? and status = 'active' order by  products.id";
    $result = $cn->prepare($sql);
    $result->bindValue(1,'%'.$_GET['search'].'%');
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function search5(){
    global $cn;
    $sql="select * from products where products.english_title like ? and status = 'active' order by  products.id";
    $result = $cn->prepare($sql);
    $result->bindValue(1,'%'.$_GET['search'].'%');
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function search6(){
    global $cn;
    $sql="select * from products where tracking_code like ? and status = 'active' order by  products.id";
    $result = $cn->prepare($sql);
    $result->bindValue(1,'%'.$_GET['search'].'%');
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function search7(){
    global $cn;
    $sql="select * from products where products.title like ? and status = 'active' order by  products.price";
    $result = $cn->prepare($sql);
    $result->bindValue(1,'%'.$_GET['search'].'%');
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function search8(){
    global $cn;
    $sql="select * from products where products.english_title like ? and status = 'active' order by  products.price";
    $result = $cn->prepare($sql);
    $result->bindValue(1,'%'.$_GET['search'].'%');
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function search9(){
    global $cn;
    $sql="select * from products where tracking_code like ? and status = 'active' order by  products.price";
    $result = $cn->prepare($sql);
    $result->bindValue(1,'%'.$_GET['search'].'%');
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function search10(){
    global $cn;
    $sql="select * from products where products.title like ? and status = 'active' order by  products.price desc ";
    $result = $cn->prepare($sql);
    $result->bindValue(1,'%'.$_GET['search'].'%');
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function search11(){
    global $cn;
    $sql="select * from products where products.english_title like ? and status = 'active' order by  products.price desc ";
    $result = $cn->prepare($sql);
    $result->bindValue(1,'%'.$_GET['search'].'%');
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function search12(){
    global $cn;
    $sql="select * from products where tracking_code like ? and status = 'active' order by  products.price desc ";
    $result = $cn->prepare($sql);
    $result->bindValue(1,'%'.$_GET['search'].'%');
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}