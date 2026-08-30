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
                    <div class="circle-box-icon failed">
                        <i class="mdi mdi-close"></i>
                    </div>
                    <div class="checkout-alert-title">
                        <h4> سفارش <span
                                    class="checkout-alert-highlighted checkout-alert-highlighted-success"><?php echo $_GET['tracking_code'] ?></span>
                            ثبت شد اما پرداخت ناموفق بود.
                        </h4>
                    </div>
                    <div class="checkout-alert-content">
                        <p>
                                    <span class="checkout-alert-content-failed">برای جلوگیری از لغو سیستمی سفارش، تا ۱
                                        ساعت آینده پرداخت را انجام دهید.</span>
                            <br>
                            <span class="checkout-alert-content-small px-res-1">
                                        چنانچه طی این فرایند مبلغی از حساب شما کسر شده است، طی ۷۲ ساعت آینده به حساب شما
                                        باز خواهد گشت.
                                    </span>
                        </p>
                    </div>
                </div>

                <section class="checkout-details dt-sl dt-sn mt-4 pt-2 pb-3 pr-3 pl-3 mb-5">
                    <div class="checkout-details-title">
                        <h4 class="checkout-details-title px-res-1">
                            کد سفارش:
                            <span>
                                        <?php echo $_GET['tracking_code'] ?>
                                    </span>
                        </h4>
                        <div class="row">
                            <div class="col-lg-9 col-md-8 col-12">
                                <div class="checkout-details-title px-res-1">
                                    <p>
                                        سفارش شما با موفقیت در سیستم ثبت شد و هم اکنون
                                        <span class="text-highlight text-highlight-error">در انتظار
                                                    پرداخت</span>
                                        است.
                                        جزئیات این سفارش را می‌توانید در
                                        <a href="<?php echo userfactorUrl($_SESSION['user_sing'])?>" class="border-bottom-dt"> پروفایل خود</a>
                                        مشاهده نمایید.
                                    </p>
                                </div>

                            </div>
                            <div class="col-lg-3 col-md-4 col-12 px-res-1">
                                <a href="<?php echo userfactorUrl($_SESSION['user_sing'])?>"
                                   class="btn-primary-cm bg-secondary btn-with-icon d-block text-center pr-0">
                                    <i class="mdi mdi-shopping"></i>
                                    مشاهده فاکتور ها
                                </a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
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
                                                            <span class="red">
                                                                (ناموفق)
                                                            </span></span></p>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <p>
                                                وضعیت سفارش:
                                                <span>
                                                            پرداخت ناموفق
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
                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl px-res-1">
                    <h2>جزئیات پرداخت ها</h2>
                </div>
                <section class="checkout-details dt-sl dt-sn mb-4 pt-2 pb-3 pl-3 pr-3">
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="table-responsive">

                                <table class="checkout-orders-table">
                                    <tr>
                                        <td class="numrow">
                                            <p>
                                                ردیف
                                            </p>
                                        </td>
                                        <td class="gateway">
                                            <p>
                                                درگاه
                                            </p>
                                        </td>
                                        <td class="date">
                                            <p>
                                                تاریخ
                                            </p>
                                        </td>
                                        <td class="price">
                                            <p>
                                                مبلغ
                                            </p>
                                        </td>
                                        <td class="id">
                                            <p>
                                                مبلغ کل
                                            </p>
                                        </td>
                                        <td class="status">
                                            <p>
                                                وضعیت
                                            </p>
                                        </td>
                                        <td class="status">
                                            <p>
                                                مشاهده جزعیات
                                            </p>
                                        </td>
                                    </tr>

                                    <?php
                                    $user_id = getIdUsers($_SESSION['user_sing']);
                                    $selectOrdersByUserId = selectOrdersByUserId($user_id['id']);
                                    if ($selectOrdersByUserId){
                                        foreach ($selectOrdersByUserId as $key=> $order){
                                            ?>
                                    <tr>
                                        <td class="numrow">
                                            <p>۱</p>
                                        </td>
                                        <td class="gateway">
                                            <p>idpay</p>
                                        </td>
                                        <td class=" date">
                                             <?php echo $order['create_at'] ?>
                                        </td>
                                        <td class="price">
                                            <p><?php echo $order['total_amount'] ?></p>
                                        </td>
                                        <td class="price">
                                            <p><?php echo $order['amount_payable'] ?></p>
                                        </td>
                                        <td class="status">
                                            <p>
                                                <?php
                                                    if ($order['status'] === 'success'){
                                                        echo "پرداخت موفق";
                                                    }else{
                                                        echo "لغو شده";
                                                    }
                                                ?>
                                            </p>
                                        </td>
                                        <td class="status text-center">
                                            <?php
                                            if ($order['status'] === 'success'){
                                                ?>
                                                <a href="<?php echo factorUrl($order['id'],$_SESSION['user_sing'])?>" class="text-dark btn btn-primary" style="font-size: 20px;border: 1px solid">
                                                    مشاهده
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    }
                                    ?>

                                </table>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>
</main>
<!-- End main-content -->