<div class="content d-flex flex-column flex-column-fluid" id="kt_content" xmlns="http://www.w3.org/1999/html">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">فاکتور ها</h5>
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
            $selectOrdersByUserId = selectOrdersByUserIdd();
            ?>
            <div class="card card-custom gutter-b">
                <div class="card-header" >
                    <h3 class="card-title">فاکتور ها</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="datatable_category" style="margin-top: 13px !important;font-family: 'B Nazanin'">
                        <thead>
                        <tr>
                            <th>Record ID</th>
                            <th>شماره سفارش</th>
                            <th>شماره سفارش دهنده</th>
                            <th>تاریخ ثبت سفارش</th>
                            <th>مبلغ کل</th>
                            <th>مبلغ قابل پرداخت</th>
                            <th>وضعیت</th>
                            <th>رسیدگی</th>
                            <th>جزییات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($selectOrdersByUserId){
                            foreach ($selectOrdersByUserId as $key=> $order){
                                $selectAddressOrdersByUserId = getUserById($order['user_id']);
                                ?>
                                <tr>
                                    <td><?php echo $key+1 ?></td>
                                    <td><?php echo $order['tracking_code'] ?></td>
                                    <td><?php echo $selectAddressOrdersByUserId['mobile'] ?></td>
                                    <td><?php echo $order['create_at'] ?></td>
                                    <td><?php echo $order['total_amount'] ?></td>
                                    <td><?php echo $order['amount_payable'] ?></td>
                                    <td style="text-align: center;font-size: 20px">
                                        <?php echo statusFctor2($order['status'])?>
                                    </td>
                                    <td style="text-align: center;font-size: 20px">
                                        <?php echo statusFctor($order['status_admin'])?>
                                    </td>
                                    <td nowrap="nowrap" style="text-align: center">
                                        <?php
                                        if ($order['status'] === 'success'){
                                            ?>
                                            <a target="_blank" href="/manage_single_factor.php?id=<?php echo $order['id'] ?>" class=" btn-icon btn-shadow-hover font-weight-bold mr-2">
                                                <span class='btn btn-primary font-size-h4' > مشاهده جزعیات</span>
                                            </a>
                                            <?php
                                        }else{
                                            ?>
                                            <a href="javascript:;" class=" btn-icon btn-shadow-hover font-weight-bold mr-2">
                                                <span class='btn btn-danger font-size-h4' > خرید لغو شده است</span>
                                            </a>
                                            <?php
                                        }
                                        if ($order['status_admin'] === 'active'){
                                            ?>
                                                <a href="?action=change_status_factor&factor_id=<?php echo $order['id']?>&old_status=<?php echo $order['status_admin'] ?>" class="btn btn-danger btn-icon btn-shadow-hover font-weight-bold mr-2">
                                                    <i class="fa fa-bolt" style='color: white'></i>
                                                </a>
                                            <?php
                                        }else{
                                            ?>
                                                <a href="?action=change_status_factor&factor_id=<?php echo $order['id']?>&old_status=<?php echo $order['status_admin'] ?>" class="btn btn-success btn-icon btn-shadow-hover font-weight-bold mr-2">
                                                    <i class="fa fa-bolt" style='color: white'></i>
                                                </a>
                                            <?php
                                        }
                                        ?>
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