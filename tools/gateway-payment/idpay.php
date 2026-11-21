<?php
function createTransactionForPayment($amount, $description, $mobile = '', $email = ''){

    $data = array(
        "merchant_id" => GATEWAY_PAYMENT['zarinpal']['merchant_id'],
        "amount" => $amount,
        "callback_url" => GATEWAY_PAYMENT['zarinpal']['callback'],
    "description" => $description,
    "metadata" => [
        "email" => $email,
        "mobile"=> $mobile
        ],
    );
$jsonData = json_encode($data);
$ch = curl_init('https://api.zarinpal.com/pg/v4/payment/request.json');
curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
));

$result = curl_exec($ch);
$err = curl_error($ch);
$result = json_decode($result, true, JSON_PRETTY_PRINT);
curl_close($ch);
if ($err) {
    return false;
} else {
    if (empty($result['errors'])) {
        if ($result['data']['code'] == 100) {
            // guard on authority itself: an empty authority still builds a truthy "link" string
            if (!empty($result['data']["authority"])){
                return array("link" => 'https://www.zarinpal.com/pg/StartPay/' . $result['data']["authority"]);
            }
            return false;
        }
    } else {
          return false;
    }
    }
}

function verifyTransaction($amount){

    $Authority = $_GET['Authority'];
    $data = array(
    "merchant_id" => GATEWAY_PAYMENT['zarinpal']['merchant_id'],
    "authority" => $Authority,
    "amount" => $amount,

    );
    $jsonData = json_encode($data);
    $ch = curl_init('https://api.zarinpal.com/pg/v4/payment/verify.json');
    curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)
    ));

    $result = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);
    $result = json_decode($result, true);
    if ($err) {
        return false;
    } else {
        // 100 = verified now, 101 = already verified (callback reopened)
        if (isset($result['data']['code']) && in_array($result['data']['code'], [100, 101])) {
            return ['ref_id' => $result['data']['ref_id'] ?? '', 'code' => $result['data']['code']];
        }
    }

    return false;
}
?>