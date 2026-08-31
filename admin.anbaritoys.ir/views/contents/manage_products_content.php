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
            // برچسب فارسی + رنگ بج برای هر وضعیت (در JS هم همین نگاشت استفاده می‌شود)
            $anbarStatusMeta = [
                'active'       => ['فعال', 'success'],
                'inactive'     => ['غیر فعال', 'danger'],
                'unavialable'  => ['ناموجود', 'warning'],
                'stop_selling' => ['توقف فروش', 'warning'],
            ];
            $anbarSuggestedMeta = [
                'yes' => ['پیشنهادی', 'success'],
                'no'  => ['عادی', 'secondary'],
            ];
            ?>
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title" >محصولات</h3>
                </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-checkable" id="datatable_products" style="margin-top: 13px !important;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عکس</th>
                                <th>کد محصول</th>
                                <th>نام کالا</th>
                                <th>قیمت</th>
                                <th>تخفیف</th>
                                <th>موجودی</th>
                                <th>وضعیت</th>
                                <th>کالای پیشنهادی</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($getProduct ){
                                foreach ($getProduct as $key=> $getproduct){
                                $productId = (int)$getproduct['id'];
                                $productStatus = $getproduct['status'];
                                $productSuggested = $getproduct['Suggested'];
                                [$statusText, $statusColor] = $anbarStatusMeta[$productStatus] ?? ['نامشخص', 'secondary'];
                                [$suggestedText, $suggestedColor] = $anbarSuggestedMeta[$productSuggested] ?? ['نامشخص', 'secondary'];
                                // مسیر عکس بندانگشتی (لوکال: /photos/... — cPanel: http://photos.anbaritoys.ir/...)
                                $thumbUrl = null;
                                if (!empty($getproduct['photo_path'])) {
                                    $thumbUrl = normalizedPath(DOMAIN['public'], $getproduct['photo_path']);
                                    if ($thumbUrl[0] !== '/' && strpos($thumbUrl, 'http') !== 0) {
                                        $thumbUrl = '/' . $thumbUrl;
                                    }
                                }
                                $hasDiscount = !empty($getproduct['price_discounted']) && (int)$getproduct['price_discounted'] > 0;
                                $stock = (int)$getproduct['stock'];
                                ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td>
                                    <?php if ($thumbUrl) { ?>
                                        <img src="<?php echo $thumbUrl ?>" alt="<?php echo htmlspecialchars($getproduct['title']) ?>"
                                             class="anbar-thumb" width="46" height="46"
                                             style="width:46px;height:46px;object-fit:cover;border-radius:10px;background:#f3f6f9;border:1px solid #EBEDF3;"
                                             onerror="this.style.visibility='hidden'">
                                    <?php } else { ?>
                                        <span class="d-inline-flex align-items-center justify-content-center" style="width:46px;height:46px;border-radius:10px;background:#f3f6f9;border:1px solid #EBEDF3;color:#B5B5C3;">
                                            <i class="fas fa-image"></i>
                                        </span>
                                    <?php } ?>
                                </td>
                                <td nowrap="nowrap"><span class="label label-lg label-inline label-light-info font-weight-bold" dir="ltr"><?php echo $getproduct['tracking_code'] ?></span></td>
                                <td>
                                    <span class="text-dark-75 font-weight-bold product-title"><?php echo $getproduct['title'] ?></span>
                                    <span class="d-block text-muted font-size-sm"><?php echo $getproduct['brand_title'] ?? 'بدون برند' ?></span>
                                </td>
                                <td nowrap="nowrap" class="font-weight-bold text-dark-75"><?php echo number_format((int)$getproduct['price']) ?> <span class="text-muted font-size-sm">تومان</span></td>
                                <td nowrap="nowrap">
                                    <?php if ($hasDiscount) { ?>
                                        <span class="label label-lg label-inline label-light-danger font-weight-bold"><?php echo number_format((int)$getproduct['price_discounted']) ?> تومان</span>
                                    <?php } else { ?>
                                        <span class="text-muted">—</span>
                                    <?php } ?>
                                </td>
                                <td nowrap="nowrap">
                                    <?php if ($stock <= 0) { ?>
                                        <span class="label label-lg label-inline label-light-danger font-weight-bold">ناموجود</span>
                                    <?php } elseif ($stock < 5) { ?>
                                        <span class="label label-lg label-inline label-light-warning font-weight-bold"><?php echo $stock ?> عدد</span>
                                    <?php } else { ?>
                                        <span class="label label-lg label-inline label-light-success font-weight-bold"><?php echo $stock ?> عدد</span>
                                    <?php } ?>
                                </td>
                                <td id="status<?php echo $productId ?>" data-status="<?php echo $productStatus ?>" nowrap="nowrap">
                                    <span class="label label-lg label-inline font-weight-bold label-light-<?php echo $statusColor ?>">
                                        <span class="label label-dot label-<?php echo $statusColor ?> mr-2"></span><?php echo $statusText ?>
                                    </span>
                                </td>
                                <td id="Suggested<?php echo $productId ?>" data-suggested="<?php echo $productSuggested ?>" nowrap="nowrap">
                                    <span class="label label-lg label-inline font-weight-bold label-light-<?php echo $suggestedColor ?>">
                                        <span class="label label-dot label-<?php echo $suggestedColor ?> mr-2"></span><?php echo $suggestedText ?>
                                    </span>
                                </td>
                                <td nowrap="nowrap">
                                    <a target="_blank" href="/update_products.php?products_id=<?php echo $productId ?>" class="btn btn-light-primary btn-icon btn-sm" data-toggle="tooltip" data-theme="dark" title="ویرایش محصول">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" onclick="change_statusProducts(<?php echo $productId ?>);return false;" class="btn btn-light-warning btn-icon btn-sm" data-toggle="tooltip" data-theme="dark" title="فعال / غیرفعال کردن">
                                        <i class="fa fa-bolt"></i>
                                    </a>
                                    <a href="#" onclick="change_SuggestedProducts(<?php echo $productId ?>);return false;" class="btn btn-light-info btn-icon btn-sm" data-toggle="tooltip" data-theme="dark" title="تغییر کالای پیشنهادی">
                                        <i class="fas fa-star"></i>
                                    </a>
                                    <a target="_blank" href="/manage_products_photos.php?product_id=<?php echo $productId ?>" class="btn btn-light-success btn-icon btn-sm" data-toggle="tooltip" data-theme="dark" title="مدیریت عکس‌ها">
                                        <i class="far fa-file-image"></i>
                                    </a>
                                    <a target="_blank" href="/manage_products_category.php?product_id=<?php echo $productId ?>" class="btn btn-light-info btn-icon btn-sm" data-toggle="tooltip" data-theme="dark" title="دسته‌بندی محصول">
                                        <i class="fas fa-tags"></i>
                                    </a>
                                    <a href="#" onclick="deleteProductConfirm(<?php echo $productId ?>, this);return false;" class="btn btn-light-danger btn-icon btn-sm" data-toggle="tooltip" data-theme="dark" title="حذف محصول">
                                        <i class="fas fa-trash-alt"></i>
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
