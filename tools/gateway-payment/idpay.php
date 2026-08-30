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
            $link = 'https://www.zarinpal.com/pg/StartPay/' . $result['data']["authority"];
            if($link){
                return array("link" => $link);
            }
            else{
               return false; 
            }
            
        }
    } else {
          return false;
          // echo('Error Code: ' . $result['errors']['code']);
          // dd('message: ' .  $result['errors']['message']);

    }
    }
}

function verifyTransaction($amount, $id, $order_id){
    
    $Authority = $_GET['Authority'];
    $data = array(
    "merchant_id" => GATEWAY_PAYMENT['zarinpal']['merchant_id'],
    "authority" => $Authority,
    "amount" => $amount,
    "id" => $id,
    "order_id" => $order_id,

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
        if ($result['data']['code'] == 100) {
            return "با موفقیت ثبت شد";
            echo 'Transation success. RefID:' . $result['data']['ref_id'];
        } else {return false;
             // echo'code: ' . $result['errors']['code'];
             // dd('message: ' .  $result['errors']['message']);
             
        }
    }

}
?>