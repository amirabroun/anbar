<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
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
            <?php
            $getProduct = selectProductTBL();
            ?>
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title" >محصولات</h3>
                </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-checkable" id="datatable_products" style="margin-top: 13px !important;">
                            <thead>
                            <tr>
                                <th>Record ID</th>
                                <th>کد محصول</th>
                                <th>نام کالا</th>
                                <th>قیمت</th>
                                <th>قیمت با تخفیف</th>
                                <th>موجودی</th>
                                <th>وضعیت</th>
                                <th>کالای پیشنهادی</th>
                                <th>برند</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($getProduct ){
                                foreach ($getProduct as $key=> $getproduct){
                                $getBrand = selectbrand($getproduct['brand_id']);
                                ?>
                            <tr>
                                <td><?php echo $key +1 ?></td>
                                <td><span class="label label-lg font-weight-bold label-light-info label-inline"><?php echo $getproduct['tracking_code'] ?></span></td>
                                <td><?php echo $getproduct['title']?></td>
                                <td><?php echo $getproduct['price']?></td>
                                <td><?php echo $getproduct['price_discounted'] ?? '-----' ?></td>
                                <td><?php echo $getproduct['stock']?></td>
                                <td id="status<?php echo $getproduct['id']?>"><?php echo status($getproduct['status'])?></td>
                                <td id="Suggested<?php echo $getproduct['id']?>"><?php echo Suggested($getproduct['Suggested'])?></td>
                                <td><?php echo $getBrand['title'] ?? '-----' ?></td>
                                <td nowrap="nowrap">
                                    <a target="_blank" href="/update_products.php?products_id=<?php echo $getproduct['id'] ?>" class="btn btn-primary btn-icon btn-shadow-hover font-weight-bold mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" onclick="change_statusProducts(<?php echo $getproduct['id']?>,'<?php echo $getproduct['status'] ?>');" class="btn btn-warning btn-icon btn-shadow-hover font-weight-bold mr-2">
                                        <i class="fa fa-bolt" style='color: white'></i>
                                    </a>
                                   <a href="#" onclick="change_SuggestedProducts(<?php echo $getproduct['id']?>,'<?php echo $getproduct['status'] ?>');"" class="btn btn-info btn-icon btn-shadow-hover font-weight-bold mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                                            <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"/>
                                        </svg>
                                    </a>
                                    <!--<a href="?action=delete_product&products_id=<?php /*echo $getproduct['id']*/?>" class="btn btn-danger btn-icon btn-shadow-hover font-weight-bold mr-2">
                                        <i class="fa fa-trash" style='color: white'></i>
                                    </a>-->
                                    <a target="_blank" href="/manage_products_photos.php?product_id=<?php echo $getproduct['id'] ?>" class="btn btn-success btn-icon btn-shadow-hover font-weight-bold mr-2">
                                        <i class="far fa-file-image"></i>
                                    </a>
                                    <!--<a href="/create_details.php?product_id=<?php /*echo $getproduct['id'] */?>" class="btn btn-info btn-shadow-hover font-weight-bold mr-2" style="width: 34px" data-toggle="tooltip" data-theme="dark" title="افزودن جزییات جزیی محصول">
                                        <svg style="margin-right: -5px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                                        </svg>
                                    </a>-->
                                    <a target="_blank" href="/manage_products_category.php?product_id=<?php echo $getproduct['id'] ?>" class="btn btn-info btn-shadow-hover font-weight-bold mr-2" style="width: 34px" data-toggle="tooltip" data-theme="dark" title="افزودن دسته بندی محصول">
                                        <svg style="margin-right: -5px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                                        </svg>
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