<?php
if (isset($_POST['action'])&& $_POST['action']=== 'fetch_cities'){
    $cities=getcities($_POST['province']);
    if ($cities){
        responseJson([
            'data'=>$cities
        ]);
    } responseJson([
        'data'=>[]
    ]);
}
