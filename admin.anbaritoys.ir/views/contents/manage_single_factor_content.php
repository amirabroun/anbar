<?php
$selectAddressOrdersByUserId = selectAdressOrdersByUserIdd($_GET['id']);
$selectPeyOrdersByUserId = selectPeyOrdersByUserIdd($_GET['id']);
$selectOrdersByUserId = selectOrdersByUserIdByIdd($_GET['id']);
$selectorder_productByUserId = selectorder_productByUserIdd($_GET['id']);
$selectorder_citiByUserId = selectorder_cititByUserIdd($selectAddressOrdersByUserId['city_id']);
$selectorder_preByUserId = selectorder_preByUserIdd($selectorder_citiByUserId['province_id']);
?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-printer"></use></svg>
                جزئیات فاکتور
            </h3>
            <div class="an-card-sub">فاکتور فروش سفارش <span dir="ltr"><?php echo $selectOrdersByUserId['tracking_code'] ?></span></div>
        </div>
        <a class="an-btn an-btn-soft an-btn-sm" href="manage_factor.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به فاکتورها
        </a>
    </div>
    <div class="an-card-body">
        <div class="an-invoice">
            <div class="an-invoice-head">
                <h2>فاکتور فروش</h2>
                <div class="an-invoice-meta">
                    <div>
                        <span>تاریخ ثبت سفارش</span>
                        <b><?php echo $selectOrdersByUserId['create_at'] ?></b>
                    </div>
                    <div>
                        <span>شماره فاکتور</span>
                        <b dir="ltr"><?php echo $selectOrdersByUserId['tracking_code'] ?></b>
                    </div>
                    <div>
                        <span>کد پیگیری پرداخت</span>
                        <b dir="ltr"><?php echo $selectPeyOrdersByUserId['payment_track_id'] ?></b>
                    </div>
                </div>
            </div>
            <div class="an-invoice-body">
                <div class="an-invoice-box">
                    <h5>اطلاعات تحویل‌گیرنده</h5>
                    <div class="an-invoice-meta">
                        <div>
                            <span>نام و نام خانوادگی</span>
                            <b><?php echo $selectAddressOrdersByUserId['first_name'] . ' ' . $selectAddressOrdersByUserId['last_name'] ?></b>
                        </div>
                        <div>
                            <span>شماره تماس</span>
                            <b dir="ltr"><?php echo $selectAddressOrdersByUserId['mobile'] ?></b>
                        </div>
                        <div>
                            <span>مبلغ قابل پرداخت</span>
                            <b><?php echo priceFormant($selectOrdersByUserId['amount_payable']) ?></b>
                        </div>
                    </div>
                    <div class="an-invoice-meta" style="margin-top:14px">
                        <div style="flex:3">
                            <span>آدرس</span>
                            <b style="font-weight:400;font-size:12.5px;line-height:2">
                                استان <?php echo $selectorder_preByUserId['name'] ?>، شهر <?php echo $selectorder_citiByUserId['name'] ?> — <?php echo $selectAddressOrdersByUserId['address'] ?> — کد پستی <?php echo $selectAddressOrdersByUserId['post_code'] ?>
                            </b>
                        </div>
                    </div>
                </div>

                <h5 style="margin:0 0 12px;font-size:13.5px">کالاهای خریداری‌شده</h5>
                <div class="an-invoice-items">
                    <?php
                    foreach ($selectorder_productByUserId as $order_product) {
                        $getDetailsProductsByID = getDetailsProductsByIDd2($order_product['product_id']);
                        $photo = getLastPhotoProduct($order_product['product_id']);
                        $photo2 = $photo ? getPhotoProduct222($photo['photo_id']) : false;
                        ?>
                        <div class="an-invoice-item">
                            <?php if ($photo2) { ?>
                                <img src="<?php echo normalizedPath(DOMAIN['public'], $photo2['src'], $photo2['name']) ?>" alt="<?php echo $getDetailsProductsByID['title'] ?>">
                            <?php } else { ?>
                                <img src="<?php echo normalizedPath(DOMAIN['public'], '/images/180.png') ?>" alt="بدون تصویر">
                            <?php } ?>
                            <div class="an-invoice-item-info">
                                <b><?php echo $getDetailsProductsByID['title'] ?></b>
                                <span>کد مرسوله: <span dir="ltr"><?php echo $getDetailsProductsByID['tracking_code'] ?></span></span>
                                <?php if (empty($getDetailsProductsByID['price_discounted'])) { ?>
                                    <span style="margin-top:4px"><?php echo priceFormant($getDetailsProductsByID['price']) ?></span>
                                <?php } else { ?>
                                    <span style="margin-top:4px">
                                        <?php echo priceFormant($getDetailsProductsByID['price_discounted']) ?>
                                        <del style="margin-right:6px"><?php echo priceFormant($getDetailsProductsByID['price']) ?></del>
                                    </span>
                                <?php } ?>
                            </div>
                            <div class="an-invoice-item-price">
                                <span class="an-invoice-qty"><?php echo $order_product['quantity'] ?> عدد</span>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <div class="an-invoice-actions" style="margin-top:26px">
                    <button type="button" class="an-btn an-btn-primary" data-an-print>
                        <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-download"></use></svg>
                        دانلود فاکتور
                    </button>
                    <button type="button" class="an-btn an-btn-ghost" data-an-print>
                        <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-printer"></use></svg>
                        چاپ فاکتور
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
