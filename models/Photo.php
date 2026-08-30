<?php
function getPhotoProduct($product_id){
    global $cn;
    $sql="select photo_product.*,photos.name,photos.src from photo_product
          join photos  on photos.id =photo_product.photo_id
          where product_id= ? order by photo_product.sort; ";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$product_id);
    $result->execute();
    if ($result->rowCount()>0){
        return $result->fetchAll();
    }
    return false;

}
