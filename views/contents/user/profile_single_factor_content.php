<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <div class="row">

            <?php
            require_once 'views/partial/sidebar.php';
            $user_id = getIdUsers($_SESSION['user_sing']);
            $selectAddressOrdersByUserId = selectAdressOrdersByUserId($_GET['id']);
            $selectPeyOrdersByUserId = selectPeyOrdersByUserId($_GET['id']);
            $selectOrdersByUserId = selectOrdersByUserIdById($_GET['id']);
            $selectorder_productByUserId = selectorder_productByUserId($_GET['id']);
            $selectorder_productByUserIdd = selectorder_productByUserId_check($_GET['id'],$user_id['id']);
            ?>

            <!-- Start Content -->
            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                <div class="row">
                    <div class="col-12">
                        <div class="profile-navbar">
                            <a href="#" class="profile-navbar-btn-back">بازگشت</a>
                            <h4>سفارش <span class="font-en"><?php echo $selectOrdersByUserId['tracking_code'] ?></span><span>ثبت شده در تاریخ  <?php echo $selectOrdersByUserId['create_at'] ?>
                                            </span></h4>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="dt-sl dt-sn">
                            <div class="row table-draught px-3">
                                <div class="col-md-6 col-sm-12">
                                    <span class="title">تحویل گیرنده:</span>
                                    <span class="value"><?php echo $selectAddressOrdersByUserId['first_name'].' '.$selectAddressOrdersByUserId['last_name'] ?></span>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <span class="title">شماره تماس تحویل گیرنده:</span>
                                    <span class="value"><?php echo $selectAddressOrdersByUserId['mobile'] ?></span>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <span class="title">کد مرسوله:</span>
                                    <span class="value"><?php echo $selectPeyOrdersByUserId['payment_track_id'] ?></span>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <span class="title">نحوه ارسال سفارش:</span>
                                    <span class="value">عادی : پست ایران</span>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <span class="title">زمان تحویل:</span>
                                    <span class="value">5 روزه کاری </span>
                                </div>
                                <div class="col-12 text-center pb-0">
                                    <span class="title">مبلغ این مرسوله:</span>
                                    <span class="value"><?php echo priceFormant($selectOrdersByUserId['amount_payable']) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content -->

        </div>
    </div>
    <!-- Start Product-Slider -->
    <section class="slider-section dt-sl mt-5 mb-5">
        <div class="row mb-3">
            <div class="col-12">
                <div class="section-title text-sm-title title-wide no-after-title-wide">
                    <h2> محصولات خریداری شده </h2>
                </div>
            </div>

            <!-- Start Product-Slider -->
            <div class="col-12 px-res-0">
                <div class="product-carousel carousel-lg owl-carousel owl-theme">


                    <?php
                    if ($selectorder_productByUserId){
                        if ($selectorder_productByUserIdd){
                            foreach ($selectorder_productByUserId as $order_product){
                                $getDetailsProductsByID = getDetailsProductsByID2($order_product['product_id']);
                                $selectPhotoProducts = selectPhotoProducts($getDetailsProductsByID['id']);
                                $selectPhotosByID = $selectPhotoProducts ? selectPhotosByID($selectPhotoProducts['photo_id']) : false;
                                $getDetailsProductsByID['photo_name'] = $selectPhotosByID['name'];
                                $getDetailsProductsByID['photo_src'] = $selectPhotosByID['src'];
                                ?>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class='discount'>
                                                <span><?php $cal_percentage = $getDetailsProductsByID['price'] - ($getDetailsProductsByID['price_discounted']); echo cal_percentage(  $cal_percentage, $getDetailsProductsByID['price']).'%<br/>'; ?></span>
                                            </div>
                                            <br>
                                        </div>
                                        <a class='product-thumb' target="_blank" href='<?php echo productUrl($getDetailsProductsByID['tracking_code'])?>'>
                                            <?php

                                            if (!empty($getDetailsProductsByID['photo_name'])){
                                                ?>
                                                <img  height="120" width="150" src='<?php echo normalizedPath(DOMAIN['public'], $getDetailsProductsByID['photo_src'], $getDetailsProductsByID['photo_name'])?>' alt='<?php echo $getDetailsProductsByID['title']?>'>
                                                <?php
                                            }else{
                                                ?>
                                                <img  height="120" width="150" src='<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>' alt='<?php echo $getDetailsProductsByID['title']?>'>
                                                <?php
                                            }
                                            ?>

                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href='<?php echo productUrl($getDetailsProductsByID['tracking_code'])?>'><?php echo $getDetailsProductsByID['title']?></a>
                                            </h5>
                                            <h5 class="product-title ">
                                                <a class="text-dark text-center" href='<?php echo productUrl($getDetailsProductsByID['tracking_code'])?>'>تعداد:<?php echo $order_product['quantity']?></a>
                                            </h5>
                                            <span class='product-price'>
                                        <?php
                                        if (empty($getDetailsProductsByID['price_discounted']))
                                        {
                                            ?>
                                            <strong><?php echo priceFormant($getDetailsProductsByID['price'])?> </strong>
                                            <?php
                                        } else
                                        {
                                            ?>
                                            <strong class="text-danger"><?php echo priceFormant($getDetailsProductsByID['price_discounted'])?> </strong>
                                            <br>
                                            <del><?php echo priceFormant($getDetailsProductsByID['price'])?></del>
                                            <?php
                                        }
                                        ?> </span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }else{
                            setMessage2('error','این فاکتور متعلق به شما نیست');
                            redirect('/');
                            back();
                            exit();
                        }
                    }else{
                        setMessage2('error','این فاکتور متعلق به شما نیست');
                        redirect('/');
                        back();
                        exit();
                    }
                    ?>


                </div>
            </div>
            <!-- End Product-Slider -->

        </div>
    </section>
    <!-- End Product-Slider -->
</main>
<!-- End main-content -->