<!-- Start header-shopping -->
<header class="header-shopping dt-sl">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-2">
                <div class="header-shopping-logo dt-sl">
                    <a href="#">
                        <img src="/assets/img/logoo.png" alt="لوگو عنبری تویز" style="height:55px;">
                    </a>
                    <br>
                </div>
            </div>
            <div class="col-12 text-center" style="margin-top:-15px;">
                <ul class="checkout-steps">
                    <li>
                        <a href="#" class="active">
                            <span>اطلاعات ارسال</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#" class="active">
                            <span>پرداخت</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#" class="active">
                            <span>اتمام خرید و ارسال</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- End header-shopping -->
<?php
    $selectOrdersByUserId = selectOrdersByUserIdByTracking_code($_GET['tracking_code']);
    $id = $selectOrdersByUserId['id'];
?>
<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">

        <div class="row">
            <div class="cart-page-content col-12 px-0">
                <div class="checkout-alert dt-sn mb-4">
                    <div class="circle-box-icon successful">
                        <i class="mdi mdi-check-bold"></i>
                    </div>
                    <div class="checkout-alert-title">
                        <h4> سفارش <span
                                    class="checkout-alert-highlighted checkout-alert-highlighted-success"><?php echo $_GET['tracking_code'] ?></span>
                            با موفقیت در سیستم ثبت شد.
                        </h4>
                    </div>
                    <div class="checkout-alert-content">
                        <p class="checkout-alert-content-success">
                            سفارش نهایتا تا یک روز آماده ارسال خواهد شد.
                        </p>
                    </div>
                </div>
                <section class="checkout-details dt-sl dt-sn mt-4 pt-2 pb-3 pr-3 pl-3 mb-5 px-res-1">
                    <div class="checkout-details-title">
                        <h4>
                            کد سفارش:
                            <span>
                                        <?php echo $_GET['tracking_code'] ?>
                                    </span>
                        </h4>
                        <div class="row">
                            <div class="col-lg-9 col-md-8 col-sm-12">
                                <div class="checkout-details-title">
                                    <p>
                                        سفارش شما با موفقیت در سیستم ثبت شد و هم اکنون
                                        <span class="text-highlight text-highlight-success">تکمیل شده</span>
                                        است.
                                        جزئیات این سفارش را می‌توانید با کلیک بر روی دکمه
                                        <a href="<?php echo factorUrl($id,$_SESSION['user_sing'])?>" class="border-bottom-dt">پیگیری سفارش</a>
                                        مشاهده نمایید.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <a href="<?php echo factorUrl($id,$_SESSION['user_sing'])?>"
                                   class="btn-primary-cm bg-secondary btn-with-icon d-block text-center pr-0">
                                    <i class="mdi mdi-shopping"></i>
                                    پیگیری سفارش
                                </a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 px-res-0">
                                <div class="checkout-table">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <p>
                                                نام تحویل گیرنده:
                                                <span>
                                                            <?php
                                                            echo $_SESSION['address_name'];
                                                            ?>
                                                        </span></p>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <p>
                                                شماره تماس :
                                                <span>
                                                            <?php
                                                            echo $_SESSION['address_mobile'];
                                                            ?>
                                                        </span></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <p>
                                                تعداد مرسوله :
                                                <span>
                                                           <?php
                                                           echo $_SESSION['number_product'];
                                                           ?>
                                                        </span></p>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <p>
                                                مبلغ کل:
                                                <span>
                                                            <?php
                                                            echo priceFormant($selectOrdersByUserId['total_amount']);
                                                            ?>
                                                        </span></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <p>
                                                روش پرداخت:
                                                <span>
                                                            پرداخت اینترنتی
                                                            <span class="green">
                                                                (موفق)
                                                            </span></span></p>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <p>
                                                وضعیت سفارش:
                                                <span>
                                                            پرداخت شد
                                                        </span></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>آدرس:   &nbsp;&nbsp;
                                                <?php
                                                $user_id = getIdUsers($_SESSION['user_sing']);
                                                $getaddress=getAddressById($user_id['id']);
                                                if ($getaddress){
                                                    foreach ($getaddress as $address) {
                                                        if ($address['is_default'] === 'yes'){
                                                            echo 'استان: '.$address['province_name'] ?>&nbsp;|&nbsp; شهر: <?php echo $address['city_name'] ?>&nbsp;|&nbsp;آدرس: <?php echo $address['address'];
                                                        }
                                                    }
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>

    </div>
</main>
<!-- End main-content -->