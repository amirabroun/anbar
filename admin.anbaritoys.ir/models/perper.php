<?php
function deletePrepre($id)
{
    global $cn;
    $sql = "delete from paper where id = ?";
    $resulte = $cn->prepare($sql);
    $resulte->bindValue(1, $id);
    $resulte->execute();
    if ($resulte->rowCount() > 0) {
        return $resulte->fetchAll();
    }
    return false;
}

function getPerper()
{
    global $cn;
    $sql = "select * from paper";
    $result = $cn->query($sql);
    if ($result && $result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}
function updateStatusblog($status,$category_id){
    global $cn;
    $sql="update paper set status=? where id=?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$status);
    $result ->bindValue(2,$category_id);
    return $result->execute();
}

