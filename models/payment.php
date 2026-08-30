<?php

function createPayment($order_id, $pay_id, $track_id, $payment_track_id, $amount_payble,$gateway_status)
{
    global $cn;
    $sql = "INSERT INTO `payments`(`order_ir`, `pay_id`, `track_id`, `payment_track_id`, `amount_payble`, `gateway_status`) VALUES (?,?,?,?,?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $order_id);
    $result->bindValue(2, $pay_id);
    $result->bindValue(3, $track_id);
    $result->bindValue(4, $payment_track_id);
    $result->bindValue(5, $amount_payble);
    $result->bindValue(6, $gateway_status);
    if ($result->execute()) {
        return $cn->lastInsertId();
    }
    return false;
}

function updateStatusPayment($id, $payment_track_id, $status)
{
    global $cn;
    $sql = "update payments set gateway_status = ?, payment_track_id = ? where id =?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $status);
    $result->bindValue(2, Null);
    $result->bindValue(3, $id);
    $result->execute();
    return $result->rowCount() > 0;
}
