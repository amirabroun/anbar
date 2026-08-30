<?php
function getProductPhotoss3($product_id){
    try {
        global $cn;
        $product_id = (int)($product_id);
        $sql = "select * from blog_photo_admin where blog_id = ? order by sort limit 1";
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

function getProductPhotoss4($product_id){
    try {
        global $cn;
        $product_id = (int)($product_id);
        $sql = "select * from blog_photo where id = ? limit 1";
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
function getArticles(){
    global $cn;
    $sql="select * from paper WHERE status = 'active'";
    $result=$cn->query($sql);
    if($result && $result->rowCount()>0){
        return $result->fetchAll();
    }
    return false;
}

function getArticles2(){
    global $cn;
    $sql="select * from paper WHERE status = 'active' order by id desc ";
    $result=$cn->query($sql);
    if($result && $result->rowCount()>0){
        return $result->fetchAll();
    }
    return false;
}

function getArticlesById($id){
    global $cn;
    $sql="select * from paper WHERE status = 'active' and id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$id);
    if($result->execute()){
        return $result->fetch();
    }
    return false;
}