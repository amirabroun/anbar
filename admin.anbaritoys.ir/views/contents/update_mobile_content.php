<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">  درباره ما</h5>
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
            $category=selectMobileById($_GET['id']);
            ?>
            <div class="card card-custom gutter-b" >
                <div class="card-header">
                    <h3 class="card-title" >ویرایش شماره ما</h3>
                </div>
                <?php echo initFormErrors()?>
                <form class="form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="update_about_us_mobile">
                    <div class="card-body">
                        <div class="form-group row">

                                <input type="hidden" class="form-control" name="id" value="<?php  echo $category['id'] ?>" />

                            <div class="col-lg-6">
                                <label>شماره تلفن 1:</label>
                                <input type="text" class="form-control" name="mobile" value="<?php  echo $category['mobile'] ?>">
                            </div>

                            <div class="col-lg-6">
                                <label>شماره تلفن 2:</label>
                                <input type="text" class="form-control" name="mobileTo" value="<?php  echo $category['mobileTo'] ?>">
                            </div>

                            <div class="col-lg-6">
                                <label>خط ثابت:</label>
                                <input type="text" class="form-control" name="required" value="<?php  echo $category['mobile_home'] ?>">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">ثبت</button>
                        </div>
                </form>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<script>

</script>