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
            $getCategory = selectCategoryTBLcomente();
            ?>
            <div class="card card-custom gutter-b">
                <div class="card-header" >
                    <h3 class="card-title">پیام ها</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="datatable_category" style="margin-top: 13px !important;font-family: 'B Nazanin'">
                        <thead>
                        <tr>
                            <th>Record ID</th>
                            <th>نام کاربر</th>
                            <th>شماره کاربر</th>
                            <th>وضیعت</th>
                            <th>کد کالا</th>
                            <th>مشاهد جزعیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($getCategory ){
                            foreach ($getCategory as $key=> $getcategory){
                                $getCategory2 = selectmobileuser($getcategory['user_id']);
                                ?>
                                <tr>
                                    <td ><?php echo $key +1 ?></td>
                                    <td><?php echo $getcategory['name'] ?? '-----'?></td>
                                    <td><?php echo $getCategory2['mobile'] ?? '-----'?></td>
                                    <td><?php echo statusComante($getcategory['status'])?></td>
                                    <td nowrap="nowrap"><?php echo $getcategory['teack_product'] ?? '-----'?></td>
                                    <td nowrap="nowrap">
                                        <a href="/manage_single_comante.php?massege_id=<?php echo $getcategory['id'] ?>" class="btn btn-info ml-2">مشاهده</a>
                                        <a href="?action=change_status_comente&comante_id=<?php echo $getcategory['id']?>&old_status=<?php echo $getcategory['status'] ?>" class="btn btn-success btn-icon btn-shadow-hover font-weight-bold">
                                            <i class="fa fa-bolt" style='color: white'></i>
                                        </a>
                                        <a href="?action=delete_comante&id=<?php echo $getcategory['id']?>" class="btn btn-danger btn-icon btn-shadow-hover font-weight-bold mr-2">
                                            <i class="fa fa-trash" style='color: white'></i>
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