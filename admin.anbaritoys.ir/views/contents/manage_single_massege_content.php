<div class="content d-flex flex-column flex-column-fluid" id="kt_content" xmlns="http://www.w3.org/1999/html">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">پیام ها</h5>
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
            $getCategory = selectCategoryTBLquestion22($_GET['massege_id']);
            ?>
            <div class="card card-custom gutter-b">
                <div class="card-header" >
                    <h3 class="card-title">پیام ها</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="datatable_category" style="margin-top: 13px !important;font-family: 'B Nazanin'">
                        <thead class="bg-info">
                        <tr>
                            <th>#</th>
                            <th>نام کاربر</th>
                            <th>نام خوانوادگی</th>
                            <th>تلفن</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($getCategory ){
                                $getCategory2 = selectmobileuser($getCategory['user_id']);
                                ?>
                                <tr>
                                    <td >اطلاعات کاربر</td>
                                    <td><?php echo $getCategory2['first_name'] ?? '-----'?></td>
                                    <td><?php echo $getCategory2['last_name'] ?? '-----'?></td>
                                    <td nowrap="nowrap"><?php echo $getCategory2['mobile'] ?? '-----'?></td>
                                </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                        <thead  class="bg-info">
                        <tr>
                            <th>#</th>
                            <th>نام کالا</th>
                            <th>قیمت</th>
                            <th>قیمت با تخفیف</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($getCategory ){
                                $getCategory3 = selectproductTrack($getCategory['teack_product']);
                                ?>
                                <tr>
                                    <td >اطلاعات کالا</td>
                                    <td><?php echo $getCategory3['title'] ?? '-----'?></td>
                                    <td><?php echo $getCategory3['price'] ?? '-----'?></td>
                                    <td nowrap="nowrap"><?php echo $getCategory3['price_discounted'] ?? '-----'?></td>
                                </tr>
                        <?php
                        }
                        ?>

                        </tbody>

                        <thead  class="bg-info">
                        <tr>
                            <th>#</th>
                            <th>پیام کاربر</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($getCategory ){
                                $getCategory3 = selectproductTrack($getCategory['teack_product']);
                                ?>
                                <tr>
                                    <td>پیام</td>
                                    <td class="font-size-h4"><?php echo $getCategory['text_user'] ?? '-----'?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                        <?php
                        }
                        ?>

                        </tbody>


                        <thead  class="bg-info">
                        <tr>
                            <th>#</th>
                            <th> پاسخ شما</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($getCategory ){
                                $getCategory3 = selectproductTrack($getCategory['teack_product']);
                                ?>
                                <tr>
                                    <td>پاسخ شما</td>
                                    <td style="width: 30%">


                                            <form method="post" action="">
                                                <div class="row">
                                                <input name="send_admin" style="width: 75%" value="<?php

                                                if ($getCategory['text_admin'] === 'nulll'){
                                                    echo 'هنوز پاسخی داده نشده';
                                                }else{
                                                    echo $getCategory['text_admin'];
                                                }

                                                ?>">
                                                <input type="hidden" name="admin_massage" value="massage_admin">
                                                <input type="hidden" name="id" value="<?php echo $getCategory['id'] ?>">
                                                <button type="submit" class="btn btn-success">ارسال پاسخ</button>
                                                </div>
                                            </form>


                                    </td>
                                    <td class="font-size-h4"></td>
                                    <td></td>
                                </tr>
                        <?php
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