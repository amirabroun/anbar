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
            $getCategory = selectCategoryTBLcontact_us22($_GET['massege_id']);
            ?>
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">پیام ها</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="datatable_category" style="margin-top: 13px !important;font-family: 'B Nazanin'">
                        <thead class="bg-info">
                        <tr>
                            <th>#</th>
                            <th>نام کاربر</th>
                            <th>شماره تماس</th>
                            <th>موضوع</th>
                            <th>پیام</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($getCategory ){
                                ?>
                                <tr>
                                    <td >اطلاعات کاربر</td>
                                    <td><?php echo $getCategory['name'] ?? '-----'?></td>
                                    <td nowrap="nowrap"><?php echo $getCategory['mobile'] ?? '-----'?></td>
                                    <td><?php echo $getCategory['Issue'] ?? '-----'?></td>
                                    <td nowrap="nowrap"><?php echo $getCategory['Description'] ?? '-----'?></td>
                                </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                        <thead  class="bg-info">
                        </thead>

                    </table>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>