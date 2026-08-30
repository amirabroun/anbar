<?php
$cart_products=$_SESSION['cart_user']['products'];
$total_amount=$_SESSION['cart_user']['summary']['total_amount'];
$amount_payable=$_SESSION['cart_user']['summary']['amount_payable'];
$number_product=count($cart_products);
?>
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
                    <li>
                        <a href="#">
                            <span>پرداخت</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>اتمام خرید و ارسال</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- End header-shopping -->

<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <div class="row">
            <div class="cart-page-content col-xl-9 col-lg-8 col-12 px-0">
                <div class="mb-5">
                        <a href="/cart.php" class="float-right border-bottom-dt"><i
                                class="mdi mdi-chevron-double-right"></i>بازگشت به سبد خرید</a>
                        <a href="/shopping-payment.php" class="float-left border-bottom-dt">تایید و ادامه ثبت سفارش<i
                                class="mdi mdi-chevron-double-left"></i></a>
                    </div>
                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                    <h2>انتخاب آدرس تحویل سفارش</h2>
                </div>
                <section class="page-content dt-sl">
                    <div class="address-section">
                        <div class="checkout-contact dt-sn rounded-0 px-0 pt-0 pb-0">
                            <div class="checkout-contact-content">

                                <?php
                                $user_id =getIdUsers($_SESSION['user_sing']);

                                $getIdByadd = getIdByadd($user_id['id']);
                                $getaddress=getAddressByis_defaultYes($user_id['id']);


                                if ($getaddress){
                                ?>

                                <ul class="checkout-contact-items">
                                    <li class="checkout-contact-item">
                                        گیرنده:
                                      <span class="card-horizontal-address-full-name"><?php echo $getaddress['first_name']?><?php echo " " ?><?php echo $getaddress['last_name']?></span>
                                        <a href="<?php echo useraddressUrl($_SESSION['user_sing'])?>" target="_blank" class="checkout-contact-btn-edit">مدیریت آدرس ها</a>
                                    </li>
                                    <li class="checkout-contact-item">
                                        <div class="checkout-contact-item checkout-contact-item-mobile">
                                            شماره تماس:
                                            <span><?php echo $getaddress['mobile'] ?></span>
                                        </div>
                                        <div class="checkout-contact-item-message">
                                            کد پستی:
                                            <span><?php echo $getaddress['post_code'] ?></span>
                                        </div>
                                        <br>
                                        استان
                                        <?php echo $getaddress['province_name'] ?>_<?php echo $getaddress['city_name'] ?>_<?php echo $getaddress['address'] ?>
                                    </li>
                                </ul>
                                  <a class="checkout-contact-location" id="btn-checkout-contact-location">تغییر آدرس
                                    ارسال</a>
                                <div class="checkout-contact-badge">
                                    <i class="mdi mdi-check-bold"></i>
                                </div>
                                    <?php
                                }else{
                                    ?>
                                     <ul class="checkout-contact-items">

                                <li class="checkout-contact-item  text-center">
                                    <div class="checkout-contact-item-message">
                                       شما هیچ آدرسی ندارید لطفا برای ادامه خرید آدرسی ایجاد کنید.
                                        <a href="<?php echo useraddressUrl($_SESSION['user_sing'])?>" class="btn btn-danger shadow">ایجاد آدرس جدید</a>
                                    </div>
                                </li>
                                </ul>
                                <?php
                                }
                                ?>
                                <br>
                              
                            </div>

                            <div class="checkout-address dt-sn px-0 pt-0 pb-0 rounded-0" id="user-address-list-container">
                                <div class="checkout-address-content">
                                    <div class="checkout-address-headline">آدرس مورد نظر خود را جهت تحویل
                                        انتخاب فرمایید:</div>
                                    <div class="checkout-address-row">
                                        <div class="checkout-address-col">
                                        </div>
                                    </div>

                                    <?php
                                    $user_id =getIdUsers($_SESSION['user_sing']);
                                    $getaddress=getAddressById($user_id['id']);
                                    if ($getaddress){
                                    foreach ($getaddress as $address){
                                    ?>
                                    <div class="checkout-address-row">
                                        <div class="checkout-address-col">
                                            <div class="checkout-address-box is-selected">
                                                <h5 class="checkout-address-title"><?php echo $address['first_name']?><?php echo " " ?><?php echo $address['last_name']?></h5>
                                                <p class="checkout-address-text">
                                                            <span><?php echo $address['province_name'] ?>_<?php echo $address['city_name'] ?>_<?php echo $address['address'] ?></span>
                                                </p>
                                                <ul class="checkout-address-list">
                                                    <li>
                                                        <ul class="checkout-address-contact-info">
                                                            <li class="">کدپستی: <span><?php echo $address['post_code'] ?></span></li><br>
                                                            <li>شماره همراه: <span><?php echo $address['mobile'] ?></span>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>


                                                    <?php
                                                    if ($address['is_default'] === 'yes'){
                                                        ?>
                                                        <button class="checkout-address-btn-submit">سفارش به این آدرس ارسال می‌شود.</button>
                                                        <?php
                                                    }else{
                                                        $getAddressId = getAddressId($address['created_at']);
                                                        foreach ($getAddressId as $address1){
                                                            ?>
                                                <form method="post" action="">
                                                    <input type="hidden" name="action" value="change_address">
                                                            <button type="submit" class="checkout-address-btn-submit" style="background-color: grey" name="id" value="<?php echo $address1['created_at'] ?> ?>">تغییر به این آدرس</button>
                                                </form>
                                                    <?php
                                                        }
                                                    }
                                                    ?>



                                            </div>
                                        </div>
                                    </div>
                                        <?php
                                    }
                                    }
                                    ?>

                                </div>
                                <button class="checkout-address-cancel" id="cancel-change-address-btn"></button>
                            </div>
                        </div>
                    </div>
                    <form method="post" id="shipping-data-form" class="dt-sn pt-3 pb-3">
                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                            <h2>انتخاب نحوه ارسال</h2>
                        </div>
                        <div class="checkout-shipment mb-4">
                            <div class="custom-control custom-radio pl-0 pr-3">
                                <input type="radio" class="custom-control-input" name="radio1" id="radio1"
                                       value="option1" checked>
                                <label for="radio1" class="custom-control-label">
                                    عادی
                                </label>
                            </div>
                        </div>
                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                            <h2>محولات انتخاب شده شما</h2>
                        </div>
                        <div class="checkout-pack">
                            <section class="products-compact">
                                <!-- Start Product-Slider -->
                                <div class="col-12">
                                    <div class="products-compact-slider carousel-md owl-carousel owl-theme">


                                        <?php
                                        foreach ($cart_products as $product){
                                        $detailproduct =getDetailsCart2($product['id']);
                                        
                                        $selectPhotoProducts = selectPhotoProducts($detailproduct['id']);
                                        $selectPhotosByID = $selectPhotoProducts ? selectPhotosByID($selectPhotoProducts['photo_id']) : false;
                                        $detailproduct['photo_name'] = $selectPhotosByID['name'];
                                        $detailproduct['photo_src'] = $selectPhotosByID['src'];
                                       
                                        ?>
                                        <div class="item">
                                            <div class="product-card mb-3">
                                               
                                                <a class="product-thumb" href="<?php echo productUrl($detailproduct['tracking_code'])?>">
                                                    <?php

                                                    if (!empty($detailproduct['photo_name'])){
                                                        ?>
                                                        <img height="150" width="150" src="<?php echo normalizedPath(DOMAIN['public'], $detailproduct['photo_src'], $detailproduct['photo_name'])?>" alt='<?php echo $detailproduct['title'] ?>'>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <img height="150" width="150" src="<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>" alt='<?php echo $detailproduct['title'] ?>تویز'>
                                                        <?php
                                                    }
                                                    ?>
                                                </a>
                                                <div class="product-card-body">
                                                    <h5 class="product-title">
                                                        <a href="<?php echo productUrl($detailproduct['tracking_code'])?>"> <?php echo $detailproduct['title'] ?></a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                                <!-- End Product-Slider -->
                            </section>

                        </div>
                    </form>

                    <div class="mt-5">
                        <a href="/cart.php" class="float-right border-bottom-dt"><i
                                class="mdi mdi-chevron-double-right"></i>بازگشت به سبد خرید</a>
                        <a href="/shopping-payment.php" class="float-left border-bottom-dt">تایید و ادامه ثبت سفارش<i
                                class="mdi mdi-chevron-double-left"></i></a>
                    </div>
                </section>
            </div>

            <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                <div class="dt-sn mb-2">
                    <ul class="checkout-summary-summary">
                        <li>
                            <span>مبلغ کل (<?php echo $number_product?> کالا)</span><span><?php echo priceFormant($total_amount)?></span>
                        </li>
                        <li class="checkout-summary-discount">
                            <span>سود شما از خرید</span><span><?php echo priceFormant($total_amount-$amount_payable)?>
                        </li>
                         <li>
                                                    <span>هزینه ارسال<span class="help-sn" data-toggle="tooltip"
                                                                           data-html="true" data-placement="bottom"
                                                                           title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>.<br>'حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر باشد.'</p></div>">
                                                            <span class="mdi mdi-information-outline"></span>
                                                        </span></span><span>66,000 تومان هزینه ارسال</span>
                                        </li>
                    </ul>
                    <div class="checkout-summary-devider">
                        <div></div>
                    </div>
                    <div class="checkout-summary-content">
                        <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                        <div class="checkout-summary-price-value">
                            <span class="checkout-summary-price-value-amount"><?php echo priceFormant($amount_payable+66000)?></span>
                        </div>

                        <form action="" method="post">
                            <input type="hidden" value="next_to_step" name="action">

                            <form action="" method="post">
                                <input name="action" type="hidden" value="next_to_payment_step">
                                <a href="javascript:;" class="mb-2 d-block">
                                    <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0 pl-0">
                                        <i class="mdi mdi-arrow-left"></i>
                                        تایید و ادامه ثبت سفارش
                                    </button>
                                </a>
                            </form>

                        </form>
                        <div>
                                    <span>
                                                        کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش
                                                        مراحل بعدی را تکمیل کنید.
                                                    </span><span class="help-sn" data-toggle="tooltip" data-html="true"
                                                                 data-placement="bottom"
                                                                 title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می‌شوند. در صورت عدم ثبت سفارش،عنبری تویز هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد.</p></div>">
                                                        <span class="mdi mdi-information-outline"></span>
                                                    </span></div>
                    </div>
                </div>
                <div class="dt-sn checkout-feature-aside pt-4">
                    <ul>
                       
                        <li class="checkout-feature-aside-item">
                                            <img src="/assets/img/svg/payment-terms.svg" alt="پرداخت عنبری تویز">
                                            66,000 تومان هزینه ارسال
                                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>

    </div>
</main>
<!-- End main-content -->
