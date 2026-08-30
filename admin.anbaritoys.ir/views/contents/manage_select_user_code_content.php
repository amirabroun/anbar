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
            $getCategory = selectuserTBL();
            ?>
            <div class="card card-custom gutter-b">
                <div class="card-header" >
                    <h3 class="card-title">دسته بندی ها</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="datatable_category" style="margin-top: 13px !important;font-family: 'B Nazanin'">
                        <thead>
                        <tr>
                            <th>Record ID</th>
                            <th>نام</th>
                            <th>نام خوانوادگی</th>
                            <th>کد ملی</th>
                            <th>تلفن</th>
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
                                    <td><?php echo $getcategory['first_name'] ?? '-----'?></td>
                                    <td><?php echo $getcategory['last_name'] ?? '-----'?></td>
                                    <td><?php echo $getcategory['national_code'] ?? '-----'?></td>
                                    <td><?php echo $getcategory['mobile'] ?? '-----'?></td>
                                    <td nowrap="nowrap">
                                        <?php
                                        if (selectcheckinusercode($_GET['category_id'],$getcategory['id'])){
                                            ?>
                                            <form method="post" action="">
                                                <input type="hidden" name="change_user_dic_code_on_mmm" value="<?php echo $_GET['category_id']?>">
                                                <button name="id" value="<?php echo $getcategory['id']?>" class="btn btn-warning btn-icon btn-shadow-hover font-weight-bold mr-2" style="width: 100%">
                                                    <span class="text-dark font-size-h3">برداشتن کد</span>
                                                </button>
                                            </form>
                                        <?php
                                        }else{
                                            ?>
                                        <form method="post" action="">
                                            <input type="hidden" name="change_user_dic_code_on_mmm" value="<?php echo $_GET['category_id']?>">
                                            <button name="id" value="<?php echo $getcategory['id']?>" class="btn btn-info btn-icon btn-shadow-hover font-weight-bold mr-2" style="width: 100%">
                                                <span class="text-dark font-size-h3">انتخاب کاربر</span>
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