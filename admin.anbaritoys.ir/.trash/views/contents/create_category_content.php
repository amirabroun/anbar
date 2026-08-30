<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">دسته بندی ها</h5>
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
                    <h3 class="card-title font-weight-bold" >افزودن دسته</h3>
                </div>
                <?php echo initFormErrors()?>
                <form class="form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="create_category">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label style="font-family: ">عنوان:</label>
                                <input type="text" class="form-control" placeholder="عنوان" name="title" />
                            </div>
                                <div class="col-lg-6">
                                   <label >عنوان انگلیسی:</label>
                                    <input type="text" class="form-control" placeholder="عنوان انگلیسی" name="title_english" />
                            </div>
                            <?php
                            $selectCategories=selectCategory();
                            ?>
                            <div class="col-lg-6">
                                <label>دسته والد:</label>
                                    <select class="form-control selectpicker" name="parent_id">

                                        <option value="0" > انتخاب کنید..</option>
                                        <?php
                                        if ($selectCategories){
                                            foreach ($selectCategories as $selectCategory)
                                            {
                                                ?>
                                                <option value="<?php echo $selectCategory['id']; ?>"><?php echo $selectCategory['title']; ?></option>
                                                <?php
                                            }
                                        }

                                        ?>
                                    </select>
                            </div>

                            <?php
                            $selectCollection=selectCollection();
                            ?>
                            <div class="col-lg-6">
                                <label >زیر مجموعه:</label>
                                <select class="form-control selectpicker " name="Collection_id">

                                    <option value="0" > انتخاب کنید..</option>
                                    <?php
                                    if ($selectCollection){
                                        foreach ($selectCollection as $selectCollection)
                                        {
                                            ?>
                                            <option value="<?php echo $selectCollection['id']; ?>"><?php echo $selectCollection['title']; ?></option>
                                            <?php
                                        }
                                    }

                                    ?>
                                </select>
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