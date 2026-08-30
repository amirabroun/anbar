<div class="content d-flex flex-column flex-column-fluid" id="kt_content" xmlns="http://www.w3.org/1999/html">
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
            $getCategory = selectcode_gropTBL();
            ?>
            <div class="card card-custom gutter-b">
                <div class="card-header" ">
                    <h3 class="card-title">کد تخفیف های تعدادی</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="datatable_category" style="margin-top: 13px !important;font-family: 'B Nazanin'">
                        <thead>
                        <tr>
                            <th>Record ID</th>
                            <th>عنوان</th>
                            <th>کد تخفیف</th>
                            <th>مبلغ تخفیف</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($getCategory ){
                            foreach ($getCategory as $key=> $getcategory){
                                ?>
                                <tr>
                                    <td ><?php echo $key +1 ?></td>
                                    <td><?php echo $getcategory['title']?></td>
                                    <td><?php echo $getcategory['discount_code_one_user_name'] ?></td>
                                    <td><?php echo $getcategory['stock'] ?></td>
                                    <td><?php echo $getcategory['price'] ?></td>
                                    <td nowrap="nowrap">
                                        <a href="?action=delete_grop_code&code_id=<?php echo $getcategory['id']?>" class="btn btn-danger btn-icon btn-shadow-hover font-weight-bold mr-2">
                                            <i class="fa fa-trash" ></i>
                                        </a>
                                        <a href="select_products_grop_code.php?category_id=<?php echo $getcategory['id']?>" class="btn btn-warning btn-icon btn-shadow-hover font-weight-bold mr-2" style="width: 50%">
                                            <span class="text-dark font-size-h3">  انتخاب محصولات غیر قابل اعمال</span>
                                        </a>
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