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
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold" >افزودن کد تخفیف</h3>
                </div>
                <?php echo initFormErrors()?>
                <form class="form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="create_discount_code">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label style="font-family: ">عنوان:</label>
                                <input type="text" class="form-control" placeholder="عنوان" name="title" />
                            </div>
                            <div class="col-lg-6">
                                   <label >کد تخفیف:</label>
                                    <input type="text" class="form-control" placeholder="کد تخفیف" name="title_english" />
                            </div>

                            <div class="col-lg-6">
                                <label >مبلغ کد تخفیف:</label>
                                <input type="text" class="form-control" placeholder="مبلغ" name="price" />
                            </div>

                            <div class="col-lg-6">
                                <label >نوع کد تخفیف:</label>
                                    <select class="form-control selectpicker " name="action2">

                                                <option value="grop">کد تخفیف</option>
                                                  <option  value="one_user">کد هدیه</option>
                                                <!--<option value="one_user">کد تخفیف برای افراد خاص</option>-->

                                    </select>
                            </div>

                            <div class="col-lg-6">
                                <label>حداقل خرید:</label>
                                <input type="text" class="form-control shadow" placeholder="حداقل خرید" name="min_name" />
                            </div>

                            <div class="col-lg-6">
                                <label>اگر کد تخفیف بر اساس تعداد است تعداد را وارد کنید:</label>
                                <input type="text" class="form-control shadow" style="border: 1px solid black" placeholder="تعداد" name="stock"/>
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