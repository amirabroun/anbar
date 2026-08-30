<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">بنر ها</h5>
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
            <div class="row">
                <div class="col-md-12">

                    <h2> تصویر بنر دوتیایی</h2>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <form method="post" action="requests/banner/changePic.php" enctype="multipart/form-data">
                        <div class="">
                            <input type="hidden" name="action" value="changeBanner2">
                            <input type="file" class="form-control col-6" name="fileToUpload">
                            <input type="submit" class="btn btn-success m-5" value="آپلود تصویر سمت چپ">
                        </div>
                    </form>
                         </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <form method="post" action="requests/banner/changePic.php" enctype="multipart/form-data">
                        <div class="">
                            <input type="hidden" name="action" value="changeBanner3">
                            <input type="file" class="form-control col-6" name="fileToUpload">
                            <input type="submit" class="btn btn-success m-5" value="آپلود تصویر سمت راست">
                        </div>
                    </form>
                        </div>
                    </div>

<hr style="border: 1px solid black">
<hr style="border: 1px solid black">


                    <form method="post" action="requests/banner/changePic.php" enctype="multipart/form-data">
                        <div class="">
                            <h2> تصویر بنر تکی</h2>
                            <input type="hidden" name="action" value="changeBanner1">
                            <input type="file" class="form-control col-6" name="fileToUpload">
                            <input type="submit" class="btn btn-success m-5" value="آپلود تصویر">
                        </div>
                    </form>

                    <hr style="border: 1px solid black">
                    <hr style="border: 1px solid black">

                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>





