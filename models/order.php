<?php

function GetOrderProductsSingleProduct($product_id){
    global $cn;
    $sql="select * from order_product where product_id = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$product_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function GetOrderProductsByOrderID($order_id){
    global $cn;
    $sql="select * from order_product where order_id = ?";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$order_id);
    $result->execute();
    if($result->rowCount()>0) {
        return $result->fetchAll();
    }
    return false;
}

function createOrder($tracking_code,$total_amount, $status,$user_id, $amount_payable){
    global $cn;
    $sql="insert into  orders (tracking_code,total_amount,status,user_id,amount_payable) values (?,?,?,?,?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$tracking_code);
    $result ->bindValue(2,$total_amount);
    $result ->bindValue(3,$status);
    $result ->bindValue(4,$user_id);
    $result ->bindValue(5,$amount_payable);
    return $result->execute();
}

function GetOrderProducts($tracking_code,$total_amount, $status,$user_id, $amount_payable){
    global $cn;
    $sql="insert into  orders (tracking_code,total_amount,status,user_id,amount_payable) values (?,?,?,?,?)";
    $result=$cn->prepare($sql);
    $result ->bindValue(1,$tracking_code);
    $result ->bindValue(2,$total_amount);
    $result ->bindValue(3,$status);
    $result ->bindValue(4,$user_id);
    $result ->bindValue(5,$amount_payable);
    return $result->execute();
}


function updateStatusOrder($order_id, $status)
{
    global $cn;
    $sql = "update orders set status = ? where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $status);
    $result->bindValue(2, $order_id);
    $result->execute();
    return $result->rowCount() > 0;
}

function createOrderProduct($order_id, $product_id, $price, $price_discounted, $quantity)
{
    global $cn;
    $sql = "insert into order_product (order_id, product_id, price, price_discounted, quantity) VALUES (?,?,?,?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $order_id);
    $result->bindValue(2, $product_id);
    $result->bindValue(3, $price);
    $result->bindValue(4, $price_discounted);
    $result->bindValue(5, $quantity);
    return $result->execute();
}

function createOrderAdddress($order_id, $user_id, $first_name, $last_name, $post_code,$address,$city_id,$mobile)
{
    global $cn;
    $sql = "insert into addresses_order (order_id, user_id, first_name, last_name, post_code,address,city_id,mobile) VALUES (?,?,?,?,?,?,?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $order_id);
    $result->bindValue(2, $user_id);
    $result->bindValue(3, $first_name);
    $result->bindValue(4, $last_name);
    $result->bindValue(5, $post_code);
    $result->bindValue(6, $address);
    $result->bindValue(7, $city_id);
    $result->bindValue(8, $mobile);
    return $result->execute();
}

function decrementProductStockAndCreateOrderProduct($amount,$order_tracking_code, $order_id)
{
    try {
        $products = authUserCart()['products'];
        if(!$products){
            return false;
        }
        foreach ($products as $product) {
            $result = updateProductStock($product['id'], $product['quantity']);
        }
        return true;
    } catch (Throwable $exception) {
        // save error log
        return false;
    }
}
