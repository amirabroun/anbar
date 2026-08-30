<?php

use Kavenegar\Exceptions\ApiException;
use Kavenegar\KavenegarApi;

function smsRawSender($receptor, $message): bool
{
    try {
        $api = new KavenegarApi('7933653463386C5778676F4A4F4448634D66743143776D6C3278344B332F70717A49767967777569626F773D');
        $sender = '10008663';
        $api->Send($sender, $receptor, $message);
        return true;
    } catch (ApiException | \Kavenegar\Exceptions\HttpException $e) {
//        dd($e);
        return false;
    }
}

function smsSender($phone, $value, $value2, $value3, string $template)
{
    try {
        $api = new KavenegarApi('7933653463386C5778676F4A4F4448634D66743143776D6C3278344B332F70717A49767967777569626F773D');
        $receptor = $phone;
        $token = $value;
        $token2 = $value2;
        $token3 = $value3;
        $template_sender = $template;
        $type = "sms";
        $result = $api->VerifyLookup($receptor, $token, $token2, $token3, $template_sender, $type);
        return ['status' => 200, 'ResponseText' => $result];
    }
    catch (ApiException $e) {
        //dd($e);
        return ['status' => 5, 'ResponseText' => $e->errorMessage()];
    } catch (\Kavenegar\Exceptions\HttpException $e) {
        //dd($e);
        return ['status' => 7, 'ResponseText' => $e->errorMessage()];
    }
}