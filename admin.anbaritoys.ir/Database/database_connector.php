<?php
try{
    $servername="localhost";
     $username="h227443_shop3";
    $password="IQM[874{;hA$";
    $dbname="h227443_shop3";
    $cn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,[
        PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"

    ]);
}catch (PDOException $e){
    die("خطا در اتصال به دیتابیس");
}