<?php
    if(isset($_GET['inlineRadioOptions']) && isset($_GET['options'])){
        $_SESSION['ageId'] = $_GET['inlineRadioOptions'];
        $_SESSION['jenseId'] = $_GET['options'];
        redirect('age.php');
    }
if (pagename()==='age'){
    if (isset($_SESSION['ageId']) && isset($_SESSION['jenseId'])){
        $details_products243 = getDetailsProductsByOrderCategory22($_SESSION['jenseId']);
        $details_products33= getDetailsProductsByOrderCategory($_SESSION['jenseId']);
        $details_products4= getDetailsProductsByOrderCategory33($_SESSION['jenseId']);
    }else{
        setMessage2('warning','برای ادامه باید رده سنی خود را وارد کنید');
        redirect('products.php');
    }
}elseif (isset($_SESSION['ageId']) && isset($_SESSION['jenseId'])){
    unset($_SESSION['ageId'],$_SESSION['jenseId']);
}
