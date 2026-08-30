<?php
const SECRET_TOKEN2 = "AmirRezaSiteSecret0001290109000102";

function whirlpool2($key){
    return hash('whirlpool',SECRET_TOKEN2);
}

if (!isset($_GET["secret"]) || $_GET["secret"] !== whirlpool2(SECRET_TOKEN2)) {
    header('Location: https://anbaritoys.com/index.php');
}
