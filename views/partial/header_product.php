<!DOCTYPE html>
<html lang='fa'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <meta name='theme-color' content='#e63950'>
    <meta name='msapplication-navbutton-color' content='#e63950'>
    <meta name='apple-mobile-web-app-status-bar-style' content='#e63950'>
    <?php
    if(pageName()==='single-product'){
        $_GET['title'] = $details_products['title'];
        $Single_ProductsTagMeta = explode("-", $details_products['label']);
        $r = '';
        
        foreach ($Single_ProductsTagMeta as $Single_ProductsTagMetas){
          
                $r .= $Single_ProductsTagMetas . ',';
            
        }
        $r = substr($r, 0 ,-1);
        ?>
        <meta name="keywords" content="<?php echo $r; ?>">
        <meta name="description" content="<?php echo $details_products['MiniDescription']; ?>">
        <?php
        }else{
        ?>
        <meta name="description" content="فروش اساب بازی عنبری تویز">
        <meta name="keywords" content="فروش اساباب بازی عنبری تویز anbaritoys لازم کودک">
        <?php
        }
    ?>
    <title>محصولات عنبری تویز</title>
    <link rel="icon" href="/assets/img/logoo.png" type="image/x-icon" />
    <!-- Bootstrap -->
    <link rel='stylesheet' href='/assets/css/vendor/bootstrap.min.css'>
    <!-- Plugins -->
    <link rel='stylesheet' href='/assets/css/vendor/owl.carousel.min.css'>
    <link rel='stylesheet' href='/assets/css/vendor/jquery.horizontalmenu.css'>
    <link rel='stylesheet' href='/assets/css/vendor/nice-select.css'>
    <link rel='stylesheet' href='/assets/css/vendor/nouislider.min.css'>
    <link rel='stylesheet' href='/assets/css/vendor/fancybox.min.css'>
    <!-- Font Icon -->
    <link rel='stylesheet' href='/assets/css/vendor/materialdesignicons.min.css'>
    <!-- Main CSS File -->
    <link rel='stylesheet' href='/assets/css/main.css'>
    <link rel='stylesheet' href='/assets/css/colors/anbar.css?v=2' id='colorswitch'>
<link rel='stylesheet' href='/assets/css/anbar-refresh.css?v=7'>

    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());

        document.onkeydown = function(e) {
            if(event.keyCode == 123) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }
        }

    </script>

</head>

<body>
    
        <div class="promo-bar">
    <a href="https://www.instagram.com/anbari_toys?igsh=d2NpOTVqeWFxMjVt" class="promo-bar__link" target="_blank" rel="noopener">
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16"> <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/> </svg>
        <span>جدیدترین تخفیف ها در پیج عنبری تویز - با ما همراه باشید!</span>
    </a>
</div>
    
<div class='wrapper'>
    <!-- Start header -->