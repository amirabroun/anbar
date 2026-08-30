<?php
function Login($email,$password ){
    global $cn;
    $sql="select * from managers where email=? limit 1";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$email);
    $result->execute();
    if($result->rowCount()>0) {
        $admin= $result->fetch();
        if (password_verify($password,$admin['password'])){
            return $admin;
        }
        return false;
    }
    return false;

}
