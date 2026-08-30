<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> محصولات</h5>
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

            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon"><i class="flaticon2-favourite text-primary"></i></span>
                        <h3 class="card-label">مشاهده و  مقالات بخش کلی </h3>
                    </div>

                </div>
                <div class="card-body">
                    <!--begin: جدول داده ها-->
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable3"
                           style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>عنوان</th>
                         
                            <th>وضیعت </th>
                            <th>اخرین بروز رسانی</th>
                            <th> ایجاد شده</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $getPrepre = getPerper();
                        if ($getPrepre){
                        foreach ($getPrepre as $key => $prepre){
                            ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $prepre['title'] ?></td>

                                
                                <td style="width: 10%"><?php echo status($prepre['status'])?></td>
                                <td><?php echo $prepre['createAt']; ?></td>
                                <td><?php echo $prepre['Created']; ?></td>
                                <td style="width: 20%">
                                    <form method="get" action="">
                                        <input type="hidden" name="action" value="delete_prepre"/>
                                        <button style="padding: 17.5px"  name="id" value="<?php echo $prepre['id'];?>" class="btn btn-icon btn-danger mr-2 btn-xs">
                                        <span  class="svg-icon">
                                            <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                                             </g>
                                             </svg>
                                        </span>
                                        </button>
                                        <a href="/update_blog.php?blog_id=<?php echo $prepre['id'] ?>" class="btn btn-primary btn-icon btn-shadow-hover font-weight-bold mr-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a  href="?action=change_status_blog&category_id=<?php echo $prepre['id']?>&old_status=<?php echo $prepre['status'] ?>" class="btn btn-warning btn-icon btn-shadow-hover font-weight-bold mr-2">
                                            <i class="fa fa-bolt" style='color: white'></i>
                                        </a>
                                        <a href="/update_photo_blog.php?blog_id=<?php echo $prepre['id'] ?>" class="btn btn-primary btn-icon btn-shadow-hover font-weight-bold mr-2">
                                            <i class="far fa-file-image"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        }else{
                            ?>
                            <tr>
                                <td>-----</td>
                                <td>-----</td>
                                <td>------</td>
                                <td class="font-size-h3">مقاله ای موجود نیست.</td>
                                <td>-----</td>
                                <td>
                                    -----
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <!--end: جدول داده ها-->
                </div>

            </div>

        </div>
        <div class="example-preview">
            <!-- مودال-->
            <div class="modal fade" id="show_details_users" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-primary" id="user_details_title">نام و نام خانوادگی کاربر </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="نزدیک">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>نام :</label>
                                    <label class="text-primary" id="data-user-fname">هادی</label>
                                </div>
                                <div class="col-lg-4">
                                    <label>نام خانوادگی :</label>
                                    <label class="text-primary" id="data-user-lname">هادی</label>
                                </div>
                                <div class="col-lg-4">
                                    <label> موبایل :</label>
                                    <label class="text-primary" id="data-user-mobile">هادی</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>ایمیل :</label>
                                    <label class="text-primary" id="data-user-email">هادی</label>
                                </div>
                                <div class="col-lg-4">
                                    <label>نام کاربری :</label>
                                    <label class="text-primary" id="data-user-username">هادی</label>
                                </div>
                                <div class="col-lg-4">
                                    <label> تاریخ تولد :</label>
                                    <label class="text-primary" id="data-user-birthday">هادی</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>کد ملی:</label>
                                    <label class="text-primary" id="data-user-national_code">هادی</label>
                                </div>
                                <div class="col-lg-4">
                                    <label>وضعیت :</label>
                                    <label class="text-primary" id="data-user-user-status">هادی</label>
                                </div>
                                <div class="col-lg-4">
                                    <label>جنسیت :</label>
                                    <label class="text-primary" id="data-user-gender">هادی</label>
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-lg-7 ">
                                    <label>تاریخ ایجاد :</label>
                                    <label class="text-primary" id="data-user-createat">هادی</label>
                                </div>
                                <div class="col-lg-5">
                                    <label>اخرین بروز رسانی :</label>
                                    <label class="text-primary" id="data-user-updateat">هادی</label>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-success font-weight-bold" data-dismiss="modal">
                                بستن
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
