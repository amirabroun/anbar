<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">وبلاگ ها</h5>
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
            $category=selectBlogg($_GET['blog_id']);
            ?>
            <div class="card card-custom gutter-b" >
                <div class="card-header">
                    <h3 class="card-title" >ویرایش بلاگ</h3>
                </div>
                <?php echo initFormErrors()?>
                <form class="form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="update_blog">
                    <input type="hidden" class="form-control" name="id" value="<?php  echo $category['id'] ?>" />
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>عنوان مقاله : </label>
                                <input type="text" name="title" class="form-control" placeholder=" عنوان مقاله را وارد کنید" value="<?php  echo $category['title'] ?>"/>
                                <span class="form-text text-muted">عنوان مقاله را وارد کنید</span>
                            </div>
                            <div class="col-lg-4">
                                <label> ایجاد توسط : </label>
                                <input type="text" name="Created" class="form-control" placeholder=" عنوان فرد  را وارد کنید" value="<?php  echo $category['Created'] ?>"/>
                                <span class="form-text text-muted">عنوان فرد را وارد کنید</span>
                            </div>
                        </div>

                        <br>

                        <div class="col-lg-12">
                            <label>برچسب ها: (برای سئو) - (کلمه ها را با - جدا کنید)</label>
                            <input type="text" class="form-control" placeholder="برچسب ها" name="label" id="label" value="<?php  echo $category['label'] ?>"/>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <label>توضیح کوتاه: (برای سئو)</label>
                            <input type="text" class="form-control" placeholder="توضیحات کوتاه برای سئو میباشد و از توضیحات طولانی خود داری کنید." name="MiniDescription" value="<?php  echo $category['MiniDescription'] ?>" id="MiniDescription"/>
                        </div>

                        <br>

                        <div class="form-group row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label>توضیحات :</label>
                                <textarea  class="summernote" id="productDescription" name="description"><?php  echo $category['description'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-success mr-2">ثبت</button>
                                <button type="reset" class="btn btn-danger">لغو</button>
                            </div>
                        </div>
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