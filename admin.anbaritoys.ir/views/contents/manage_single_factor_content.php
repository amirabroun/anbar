
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">


        <?php
        $selectAddressOrdersByUserId = selectAdressOrdersByUserIdd($_GET['id']);
        $selectPeyOrdersByUserId = selectPeyOrdersByUserIdd($_GET['id']);
        $selectOrdersByUserId = selectOrdersByUserIdByIdd($_GET['id']);
        $selectorder_productByUserId = selectorder_productByUserIdd($_GET['id']);
        $selectorder_citiByUserId = selectorder_cititByUserIdd($selectAddressOrdersByUserId['city_id']);
        $selectorder_preByUserId = selectorder_preByUserIdd($selectorder_citiByUserId['province_id']);
        ?>

        <!--begin::Wrapper-->

            <!--begin::Content-->
            <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class=" container" style="margin-top: -5%">
                        <!-- begin::Card-->
                        <div class="card card-custom overflow-hidden">
                            <div class="card-body p-0">
                                <!-- begin: فاکتور-->
                                <!-- begin: فاکتور header-->
                                <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0" style="background-image: url(assets/media/bg/bg-6.jpg);">
                                    <div class="col-md-9">
                                        <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                            <h1 class="display-4 text-white font-weight-boldest mb-10">فاکتور</h1>
                                        </div>
                                        <div class="border-bottom w-100 opacity-20"></div>
                                        <div class="d-flex justify-content-between text-white pt-6">
                                            <div class="d-flex flex-column flex-root">
                                                <span class="font-weight-bolde mb-2r">تاریخ</span>
                                                <span class="opacity-70"><?php echo $selectOrdersByUserId['create_at'] ?></span>
                                            </div>
                                            <div class="d-flex flex-column flex-root">
                                                <span class="font-weight-bolder mb-2">شماره فاکتور</span>
                                                <span class="opacity-70"><?php echo $selectOrdersByUserId['tracking_code'] ?></span>
                                            </div>
                                            <div class="d-flex flex-column flex-root">
                                                <span class="font-weight-bolder mb-2">آدرس خریدار</span>
                                                <span class="text-light" style="font-family: 'B Yekan';font-size: 15px;"><?php echo 'استان: ' . $selectorder_preByUserId['name'] .' | شهر: ' . $selectorder_citiByUserId['name'] .' '. ' | آدرس: ' . $selectAddressOrdersByUserId['address'] . ' | کد پستی: ' . $selectAddressOrdersByUserId['post_code']  ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: فاکتور header-->

                                <!-- begin: فاکتور body-->
                                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                    <div class="col-md-9">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th class="pl-0 font-weight-bold text-muted  text-uppercase">#</th>
                                                    <th class="text-right font-weight-bold text-muted text-uppercase">نام و نام خوانوادگی</th>
                                                    <th class="text-right font-weight-bold text-muted text-uppercase">شمارخ تماس</th>
                                                    <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">کد مرسوله</th>
                                                    <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">مبلغ این مرسوله</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="font-weight-boldest font-size-lg">
                                                    <td class="pl-0 pt-7">اطلاعات تحویل گیرنده:</td>
                                                    <br>
                                                    <td class="text-right pt-7"><?php echo $selectAddressOrdersByUserId['first_name'].' '.$selectAddressOrdersByUserId['last_name'] ?></td>
                                                    <br>
                                                    <td class="text-right pt-7"><?php echo $selectAddressOrdersByUserId['mobile'] ?></td>
                                                    <br>
                                                    <td class="text-danger pr-0 pt-7 text-right"><?php echo $selectPeyOrdersByUserId['payment_track_id'] ?></td>
                                                    <br>
                                                    <td class="text-danger pr-0 pt-7 text-right"><?php echo priceFormant($selectOrdersByUserId['amount_payable']) ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: فاکتور body-->

                                <!-- begin: فاکتور footer-->
                                <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                                    <div class="col-md-9">
                                        <div class="font-weight-bolder font-size-lg mb-3">مشخصات کالا های خریداری شده</div>

                                        <?php
                                      
                                        
                                        foreach ($selectorder_productByUserId as $order_product){
                                            
                                        $getDetailsProductsByID = getDetailsProductsByIDd2($order_product['product_id']);
                                        $photo = getLastPhotoProduct($order_product['product_id']);
                                    
                                        if($photo){
                                            $photo2 = getPhotoProduct222($photo['photo_id']);
                                        }
                                        
                                        
                                        ?>
                                        <div class="d-flex justify-content-between flex-column flex-md-row font-size-lg">
                                            <div class="d-flex flex-column mb-10 mb-md-0">

                                                <div class="d-flex justify-content-between mb-3">
                                                    <span class="mr-15 font-weight-bold">نام کالا:</span>
                                                    
                                                    <span class="text-right"><?php echo $getDetailsProductsByID['title']?></span></span>
                                                </div>

                                                <div class="d-flex justify-content-between mb-3">
                                                    <span class="mr-15 font-weight-bold">تعداد:</span>
                                                    <span class="text-right" style="background-color: #00ff80;padding-right: 10px;padding-left: 10px; border-radius: 10px;font-size: 20px"><?php echo $order_product['quantity']?></span>
                                                </div>


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
                                                    <strong class="text-danger">قیمت با تخفیف :  <?php echo priceFormant($getDetailsProductsByID['price_discounted'])?></strong>
                                                    <br>
                                                    <del>قیمت اصلی :  <?php echo priceFormant($getDetailsProductsByID['price'])?></del>
                                                    <?php
                                                }
                                                ?> </span>

                                                <div class="d-flex justify-content-between">
                                                    <span class="mr-15 font-weight-bold">کد پیگیری:</span>
                                                    <span class="text-right"><?php echo $getDetailsProductsByID['tracking_code']?></span></span>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column text-md-right">
                                                <?php
                                                
                                                if ($photo2){
                                                    ?>
                                                    <img  height="120" width="150" src='<?php echo normalizedPath(DOMAIN['public'], $photo2['src'], $photo2['name'])?>' alt='Product Thumbnail'>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <img  height="120" width="150" src='<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>' alt='Product Thumbnail'>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                            <br>
                                            <hr>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- end: فاکتور footer-->

                                <!-- begin: فاکتور action-->
                                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                    <div class="col-md-9">
                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">دانلود فاکتور</button>
                                            <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">چاپ فاکتور</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: فاکتور action-->

                                <!-- end: فاکتور-->
                            </div>
                        </div>
                        <!-- end::Card-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->


        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->

<!--end::Main-->