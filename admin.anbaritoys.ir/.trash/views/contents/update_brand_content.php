<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">برند ها</h5>
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
            $brad=selectBrandd($_GET['brand_id']);
            ?>
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">ویرایش برند</h3>
                </div>
                <?php
                echo initFormErrors()
                ?>
                <form class="form" method="post"  enctype="multipart/form-data">
                    <input type="hidden" name="action" value="update_brand">
                    <div class="card-body">
                        <div class="form-group row">

                            <input type="hidden" class="form-control" name="id" value="<?php  echo $brad['id'] ?>" />

                            <div class="col-lg-6">
                                <label>عنوان برند:</label>
                                <input type= "text" class="form-control" placeholder="عنوان" name="title" value="<?php  echo $brad['title']?>"/>
                            </div>
                            <div class="col-lg-6">
                                <label>عنوان انگلیسی برند:</label>
                                <input type= "text" class="form-control" placeholder="عنوان" name="english_title" value="<?php  echo $brad['english_title']?>"/>
                            </div>
                            <div class="col-lg-6">
                                <label >وضعیت:</label>
                                <select class="form-control selectpicker " name="status">
                                    <option value="active" > فعال</option>
                                    <option value="inactive" > غیر فعال</option>
                                </select>
                            </div>

                            <div class="col-lg-6 mt-5">
                                <label>تصویر:</label>
                                <input name="pic" type="file" class="form-control">
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