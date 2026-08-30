<?php
function getprovinces (){
    global $cn;
    $sql="select * from provinces";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function getaddresses(){
    global $cn;
    $sql="select * from addresses";
    $result=$cn->prepare($sql);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function getcities ($province_id){
    global $cn;
    $sql="select * from cities where province_id=? ";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$province_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}
function createAddress ($user_id,$first_name,$last_name,$post_code,$address,$city_id,$mobile){
    global $cn;
    $sql="INSERT INTO `addresses` (`user_id`,`first_name`,`last_name`,`post_code`,`address`,`city_id`,`mobile`) VALUES (?,?,?,?,?,?,?)";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->bindValue(2,$first_name);
    $result->bindValue(3,$last_name);
    $result->bindValue(4,$post_code);
    $result->bindValue(5,$address);
    $result->bindValue(6,$city_id);
    $result->bindValue(7,$mobile);
    return $result->execute();
}

function createAddressNo ($user_id,$first_name,$last_name,$post_code,$address,$city_id,$mobile){
    global $cn;
    $sql="INSERT INTO `addresses` (`user_id`,`first_name`,`last_name`,`post_code`,`address`,`city_id`,`mobile`) VALUES (?,?,?,?,?,?,?)";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->bindValue(2,$first_name);
    $result->bindValue(3,$last_name);
    $result->bindValue(4,$post_code);
    $result->bindValue(5,$address);
    $result->bindValue(6,$city_id);
    $result->bindValue(7,$mobile);
    return $result->execute();
}


function getIsDefault (){
    global $cn;
    $sql="select * from addresses where is_default='yes' ";
    $result=$cn->query($sql);
    if($result->rowCount()>0) {
        return true;
    }
    return false;
}

function getIsRow ($user_id){
    global $cn;
    $sql="select * from addresses where user_id=?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()<3) {
        return $result->fetch();
    }
    return false;
}

function getIsRowNot ($user_id){
    global $cn;
    $sql="select * from addresses where user_id=?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
function getIsRowNot2 ($user_id){
    global $cn;
    $sql="select * from addresses where user_id=?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
function getIsRowNot3 ($user_id){
    global $cn;
    $sql="select * from addresses where user_id=?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>1) {
        return $result->fetch();
    }
    return false;
}
function getIsRowNot4 ($user_id){
    global $cn;
    $sql="select * from addresses where user_id=?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>2) {
        return $result->fetch();
    }
    return false;
}

function selectDeleteAddress ($user_id){
    global $cn;
    $sql="select * from addresses where user_id=?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()<3) {
        return $result->fetchAll();
    }
    return false;
}

function getCheckUser ($mobile,$user_id){
    global $cn;
    $sql="select * from users where mobile = ? and id= ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$mobile);
    $result->bindValue(2,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function getIdByCreateAt ($createAt){
    global $cn;
    $sql="select * from addresses where createAt=? ";
    $result=$cn->prepare($sql);
    $result->bindValue(1, $createAt);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}


function getAddressById ($user_id){
    global $cn;
    $sql="select *,c.name city_name,p.name province_name  from addresses
            join cities c on addresses.city_id = c.id
            join provinces p on c.province_id = p.id
            where user_id=?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getAddressByis_defaultYes ($user_id){
    global $cn;
    $sql="select *,c.name city_name,p.name province_name  from addresses
            join cities c on addresses.city_id = c.id
            join provinces p on c.province_id = p.id
            where user_id=? and is_default = 'yes'";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function getIdByadd($user_id){
    global $cn;
    $sql="select * from addresses where user_id=? ";
    $result=$cn->prepare($sql);
    $result->bindValue(1, $user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function getAddressByis_defaultYes2 ($user_id){
    global $cn;
    $sql="select * from addresses where user_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}


function getAddressByis_defaultYesCheck ($user_id){
    global $cn;
    $sql="select *  from addresses where user_id=? and is_default = 'yes'";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function getOrderId ($tracking_code){
    global $cn;
    $sql="select * from orders where tracking_code = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$tracking_code);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}
/////////////////////////////////
function getAddressId ($user_id){
    global $cn;
    $sql="select * from addresses where created_at=?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function getAddressByIdIs($user_id){
    global $cn;
    $sql="select * from addresses where created_at = ? and is_default = 'no'";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function getAddressByIdIsno($user_id){
    global $cn;
    $sql="select * from addresses where user_id = ?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$user_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function getAddressByMobile($mobile){
    global $cn;
    $sql="select * from addresses where created_at=?";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$mobile);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function updateAddressByuser_id($user_id)
{
    global $cn;
    $sql = "update addresses set is_default = 'no' where user_id = ?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $user_id);
    $result->execute();
    return $result->rowCount() > 0;
}

function getAddressByMobileIsYes ($mobile){
    global $cn;
    $sql="select * from addresses where mobile=? and is_default = 'yes'";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$mobile);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}

function getAddressByMobileIsno ($mobile){
    global $cn;
    $sql="select * from addresses where mobile=? and is_default = 'no'";
    $result=$cn->prepare($sql);
    $result->bindValue(1,$mobile);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetch();
    }
    return false;
}


function changeIsDefault(){
    global $cn;
    $user_mobile = $_POST['id'];
    $getAddressByMobile = getAddressByMobile($user_mobile);
    foreach ($getAddressByMobile as $user_mobile){
        $getAddressByMobileIs = $user_mobile['is_default'];
        if ($getAddressByMobileIs === "no"){
            $id = getAddressByIdIs($_POST['id']);
            $id_org = $id['id'];
            $table = 'addresses';
            $filds = [
                  'is_default' => 'yes',
            ];
            if(updateRecordToDatabase($table, $filds,$id_org)){
                setMessage2('success', 'عملیات تغییر وضعیت با موفقیت انجام شد');
            }
        }
    }
}


