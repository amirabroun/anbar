<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> کد تخفیف</h5>
                <!--end::Page Title-->
                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <a href="/index.php" class="btn btn-light-warning font-weight-bolder btn-sm font-size-h3">رفتن به خانه</a>
                <!--end::Actions-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Daterange-->
                <a href="#" class="btn btn-sm btn-light font-weight-bold mr-2" data-placement="left">
                    <span class="text-primary font-size-base font-weight-bolder" id="kt_dashboard_daterangepicker_date">خوش آمدید.</span>
                </a>
                <!--end::Daterange-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <?php
            $getProduct = selectProductTBL();
            ?>
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title" >محصولات</h3>
                </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-checkable" id="datatable_products" style="margin-top: 13px !important;">
                            <thead>
                            <tr>
                                <th>Record ID</th>
                                <th>کد محصول</th>
                                <th>نام کالا</th>
                                <th>قیمت</th>
                                <th>قیمت با تخفیف</th>
                                <th>موجودی</th>
                                <th>وضعیت</th>
                                <th>کالای پیشنهادی</th>
                                <th>برند</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($getProduct ){
                                foreach ($getProduct as $key=> $getproduct){
                                $getCategory = selectcategoryy($getproduct['category_id']);
                                $getBrand = selectbrand($getproduct['brand_id']);
                                ?>
                            <tr>
                                <td><?php echo $key +1 ?></td>
                                <td><span class="label label-lg font-weight-bold label-light-info label-inline"><?php echo $getproduct['tracking_code'] ?></span></td>
                                <td><?php echo $getproduct['title']?></td>
                                <td><?php echo $getproduct['price']?></td>
                                <td><?php echo $getproduct['price_discounted']?></td>
                                <td><?php echo $getproduct['stock']?></td>
                                <td><?php echo status($getproduct['status'])?></td>
                                <td><?php echo Suggested($getproduct['Suggested'])?></td>
                                <td><?php echo $getBrand['title']?></td>
                                <td nowrap="nowrap">
                                    <?php
                                    if (selectcheckinPRODUCTcode2($_GET['category_id'],$getproduct['id'])){
                                        ?>
                                        <form method="post" action="">
                                            <input type="hidden" name="change_product_dic_code_on_nnn" value="<?php echo $_GET['category_id']?>">
                                            <button name="id" value="<?php echo $getproduct['id']?>" class="btn btn-warning btn-icon btn-shadow-hover font-weight-bold mr-2" style="width: 100%">
                                                <span class="text-dark font-size-h3">برداشتن کد</span>
                                            </button>
                                        </form>
                                        <?php
                                    }else{
                                    ?>
                                    <form method="post" action="">
                                        <input type="hidden" name="change_product_dic_code_on_nnn" value="<?php echo $_GET['category_id']?>">
                                        <button name="id" value="<?php echo $getproduct['id']?>" class="btn btn-info btn-icon btn-shadow-hover font-weight-bold mr-2" style="width: 100%">
                                            <span class="text-dark font-size-h3">انتخاب کالا</span>
                                        </button>
                                    </form>
                                        <?php
                                    }
                                        ?>
                                </td>
                            </tr>

                            <?php

                            }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>