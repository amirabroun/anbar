<?php
function deleteAddress($id){
    global $cn;
    $sql="DELETE FROM `addresses` WHERE `created_at` = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$id);
    return $result->execute();
}

function deleteDeleteInterest($id){
    global $cn;
    $sql="delete from interest where id = ?";
    $resulte = $cn->prepare($sql);
    $resulte->bindValue(1,$id);
    $resulte->execute();
    if ($resulte->rowCount() > 0){
        return $resulte->fetchAll();
    }
    return false;
}