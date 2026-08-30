<?php
$cart_products=$_SESSION['cart_user']['products'];
$total_amount=$_SESSION['cart_user']['summary']['total_amount'];
$amount_payable=$_SESSION['cart_user']['summary']['amount_payable'];
$number_product=count($cart_products);
?>
<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <div class="row">
            <dic class="col-12">
                <?php
                if (!empty($error)){
                    foreach ($error as $error_on){
                        ?>
                        <div class="alert alert-danger">
                            <div class="alert-text"><?php echo $error_on['icon'] ?></div>
                            <div class="alert-text"><?php echo $error_on['title'] ?></div>
                            <div class="alert-text"><?php echo $error_on['massage'] ?></div>
                        </div>
                        <?php
                    }
                }
                ?>
            </dic>
        </div>
        <div class="row">

            <div class="cart-page-content col-xl-9 col-lg-8 col-12 px-0">
                <section class="page-content dt-sl">


                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                        <h2>شیوه پرداخت</h2>
                    </div>
                    <form method="post" id="shipping-data-form" class="dt-sn pt-3 pb-3 mb-4">
                        <div class="checkout-pack">
                            <div class="row">
                                <div class="checkout-time-table checkout-time-table-time">
                                    <!--<div class="col-12">
                                        <div class="radio-box custom-control custom-radio pl-0 pr-3">
                                            <input type="radio" class="custom-control-input" name="post-pishtaz" id="1" value="1" checked>
                                            <label for="1" class="custom-control-label">
                                                <i class="mdi mdi-credit-card-outline checkout-additional-options-checkbox-image"></i>
                                                <div class="content-box">
                                                    <div
                                                        class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                                                        پرداخت اینترنتی هوشمند دیجی‌کالا
                                                        <span class="help-sn" data-toggle="tooltip" data-html="true"
                                                              data-placement="bottom"
                                                              title="<div class='help-container is-left'><div class='help-arrow'></div><p class='help-text'>با پرداخت اینترنتی، سفارش شما با اولویت بیشتری نسبت به پرداخت در محل پردازش و ارسال می شود. در صورت پرداخت ناموفق هزینه کسر شده حداکثر طی ۷۲ ساعت به حساب شما بازگردانده می‌شود.</p></div>">
                                                                    <span class="mdi mdi-information-outline"></span>
                                                                </span>
                                                    </div>
                                                    <ul class="checkout-time-table-subtitle-bar">
                                                        <li>
                                                            آنلاین با تمامی کارت‌های بانکی
                                                        </li>
                                                    </ul>
                                                </div>
                                            </label>
                                        </div>
                                    </div>-->
                                    <div class="col-12">
                                        <div class="radio-box custom-control custom-radio pl-0 pr-3">
                                                <i class="mdi mdi-credit-card-multiple-outline checkout-additional-options-checkbox-image"></i>
                                                <div class="content-box">
                                                    <div
                                                        class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                                                        پرداخت اینترنتی زرین پال zarinpal  
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>





                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                        <h2>خلاصه سفارش</h2>
                    </div>
                    <div class="dt-sn pt-3 pb-5">
                        <div class="checkout-order-summary">
                            <div class="accordion checkout-order-summary-item" id="accordionExample">
                                <div class="card pt-sl-res">
                                    <div class="card-header checkout-order-summary-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="false"
                                                    aria-controls="collapseOne">
                                                <div class="checkout-order-summary-row">
                                                    <div
                                                        class="checkout-order-summary-col checkout-order-summary-col-post-time">
                                                        مرسوله
                                                        <span class="fs-sm">(<?php
                                                            $_SESSION['number_product'] = $number_product;
                                                            echo $number_product?> کالا)</span>
                                                    </div>
                                                    <div
                                                        class="checkout-order-summary-col checkout-order-summary-col-how-to-send">
                                                        <span class="dl-none-sm">نحوه ارسال</span>
                                                        <span class="dl-none-sm">
                                                                  پست ایران
                                                                </span>
                                                    </div>
                                                    <div
                                                        class="checkout-order-summary-col checkout-order-summary-col-how-to-send">
                                                        <span>ارسال از</span>
                                                        <span class="fs-sm">
                                                                    2 روز کاری
                                                                </span>
                                                    </div>
                                                    <div
                                                        class="checkout-order-summary-col checkout-order-summary-col-shipping-cost">
                                                        <span>هزینه ارسال</span>
                                                        <span class="fs-sm">
                                                                    66 تومان
                                                                </span>
                                                    </div>
                                                </div>
                                                <i class="mdi mdi-chevron-down icon-down"></i>
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="box">
                                                <div class="row">


                                                    <?php
                                                    foreach ($cart_products as $product){
                                                    $detailproduct =getDetailsCart2($product['id']);
                                                        $selectPhotoProducts = selectPhotoProducts($product['id']);
                                                        $selectPhotosByID = $selectPhotoProducts ? selectPhotosByID($selectPhotoProducts['photo_id']) : false;
                                                        $detailproduct['photo_name'] = $selectPhotosByID['name'];
                                                        $detailproduct['photo_src'] = $selectPhotosByID['src'];
                                                    ?>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="product-box-container">
                                                            <div class="product-box product-box-compact">
                                                                <a class="product-thumb" href="<?php echo productUrl($product['tracking_code'])?>">
                                                                    <?php

                                                                    if (!empty($detailproduct['photo_name'])){
                                                                        ?>
                                                                        <img height="150" width="150" src="<?php echo normalizedPath(DOMAIN['public'], $detailproduct['photo_src'], $detailproduct['photo_name'])?>" alt='<?php echo $detailproduct['title'] ?>'>
                                                                        <?php
                                                                    }else{
                                                                        ?>
                                                                        <img height="150" width="150" src="<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>" alt='تصویر محصولات عنبری تویز'>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </a>
                                                                <div class="product-box-title">
                                                                    <a href="<?php echo productUrl($product['tracking_code'])?>"> <?php echo $detailproduct['title'] ?></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <?php
                                                    }
                                                    ?>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-sm-6 col-12">
                            <div class="dt-sn pt-3 pb-3 px-res-1">
                                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0">
                                    <h2>استفاده از کارت هدیه
                                        <span class="help-sn" data-toggle="tooltip" data-html="true"
                                              data-placement="bottom"
                                              title="<div class='help-container is-left'><div class='help-arrow'></div><p class='help-text'>با استفاده از کد کارت هدیه، تمام یا بخشی از مبلغ سفارش توسط کارت هدیه پرداخت می‌شود.
                                                        در صورت باقی ماندن بخشی از مبلغ کارت هدیه، امکان استفاده از باقی مانده مبلغ برای خریدهای بعدی امکان‌پذیر است.</p></div>">
                                                    <span class="mdi mdi-information-outline"></span>
                                                </span>
                                    </h2>
                                </div>
                                <p>
                                    با ثبت کد کارت هدیه، مبلغ کارت هدیه از “مبلغ قابل پرداخت” کسر می‌شود.
                                </p>
                                <div class="form-ui">

                                    <form action="" method="post">
                                        <input type="hidden" name="gift_code" value="change_gift_code">
                                        <div class="row text-center">
                                            <div class="col-xl-8 col-lg-12 px-0">
                                                <div class="form-row">
                                                    <input name="gift_code_name" type="text" class="input-ui pr-2" placeholder="مثلا 1234ABCD5678EFGH0123">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-12 px-0">
                                                <button class="btn btn-primary mt-res-1">ثبت کد هدیه</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-12">
                            <div class="dt-sn pt-3 pb-3 px-res-1">
                                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0">
                                    <h2>استفاده از کد تخفیف
                                        <span class="help-sn" data-toggle="tooltip" data-html="true"
                                              data-placement="bottom"
                                              title="<div class='help-container is-left'><div class='help-arrow'></div><p class='help-text'>بعد از نهایی شدن سفارش کد تخفیف را ثبت نمایید. بعد از ثبت کد تخفیف امکان بازگشت و یا تغییر سبد وجود نخواهد داشت. در صورت تغییر سفارش، کد تخفیف از بین خواهد رفت و امکان اعمال مجدد آن وجود ندارد</p></div>">
                                                    <span class="mdi mdi-information-outline"></span>
                                                </span>
                                    </h2>
                                </div>
                                <p>
                                    با ثبت کد تخفیف، مبلغ کد تخفیف از “مبلغ قابل پرداخت” کسر می‌شود.
                                </p>
                                <div class="form-ui">
                                        <form action="" method="post">
                                            <input type="hidden" name="discount_code_mmm" value="discount_code_in">
                                        <div class="row text-center">
                                            <div class="col-xl-8 col-lg-12 px-0">
                                                <div class="form-row">
                                                    <input name="discount_code" type="text" class="input-ui pr-2" placeholder="مثلا 837A2CS">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-12 px-0">
                                                <button class="btn btn-primary mt-res-1">ثبت کد تخفیف</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="mt-5">
                        <a href="/shopping.php" class="float-right border-bottom-dt"><i class="mdi mdi-chevron-double-right"></i>بازگشت به شیوه ارسال</a>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="delete_code_in">
                            <button type="submit" class="float-left border-bottom-dt btn btn-outline-danger shadow" style="border: 1px #f67474 solid">حذف کد هدیه یا کد تخفیف</button>
                        </form>
                    </div>
                </section>
            </div>




            <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar" >
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
                            <span class="checkout-summary-price-value-amount">
                                <?php echo priceFormant($amount_payable+66000)?>
                            </span>
                        </div>

                        <form action="" method="post">
                            <input name="action" type="hidden" value="to_gateway_payment">
                            <a href="javascript:;" class="mb-2 d-block">
                                <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0 pl-0">
                                    <i class="mdi mdi-arrow-left"></i>
                                    پرداخت و ثبت نهایی سفارش
                                </button>
                            </a>
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