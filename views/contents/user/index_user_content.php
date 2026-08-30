
            <!-- Start Content -->
            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="px-3">
                            <div
                                class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2">
                                <h2>اطلاعات شخصی</h2>
                            </div>
                            <div class="profile-section dt-sl">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="label-info">
                                            <span>نام و نام خانوادگی:</span>
                                        </div>
                                        <div class="value-info">
                                            <span><?php if (isset($details_user['first_name']) &&isset($details_user['last_name'])){
                                                    echo $details_user['first_name'];echo $details_user['last_name'];
                                                }else{echo '---------';} ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="label-info">
                                            <span>شماره تلفن همراه:</span>
                                        </div>
                                        <div class="value-info">
                                            <span><?php echo $details_user['mobile']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="label-info">
                                            <span>کد ملی:</span>
                                        </div>
                                        <div class="value-info">
                                            <span>
                                                <?php if (isset($details_user['national_code'])){
                                                    echo $details_user['national_code'];
                                                }else{echo '-';} ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-section-link">
                                    <a href="<?php echo userinfoUrl($_SESSION['user_sing'])?>" class="border-bottom-dt">
                                        <i class="mdi mdi-account-edit-outline"></i>
                                        ویرایش اطلاعات شخصی
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <div
                            class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                            <h2>آخرین سفارش‌ها</h2>
                        </div>
                        <div class="dt-sl">
                            <div class="table-responsive">
                                <table class="table table-order">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>شماره سفارش</th>
                                        <th>تاریخ ثبت سفارش</th>
                                        <th>مبلغ قابل پرداخت</th>
                                        <th>مبلغ کل</th>
                                        <th>عملیات پرداخت</th>
                                        <th>جزییات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $user_id = getIdUsers($_SESSION['user_sing']);
                                    $selectOrdersByUserIdLIMIT = selectOrdersByUserIdLIMIT($user_id['id']);
                                    if ($selectOrdersByUserIdLIMIT){
                                    foreach ($selectOrdersByUserIdLIMIT as $key=> $order){
                                        ?>

                                        <tr>
                                            <td><?php echo $key+1 ?></td>
                                            <td><?php echo $order['tracking_code'] ?></td>
                                            <td><?php echo $order['create_at'] ?></td>
                                            <td><?php echo $order['total_amount'] ?></td>
                                            <td><?php echo $order['amount_payable'] ?></td>
                                            <td>

                                                <?php
                                                if ($order['status'] === 'success'){
                                                    echo "پرداخت موفق";
                                                }else{
                                                    echo "لغو شده";
                                                }
                                                ?>

                                            </td>
                                            <td class="details-link">
                                                <?php
                                                if ($order['status'] === 'success'){
                                                    ?>
                                                    <a href="<?php echo factorUrl($order['id'],$_SESSION['user_sing'])?>">
                                                        <i class="mdi mdi-chevron-left"></i>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>

                                        <?php
                                    }
                                    }else{
                                        ?>
                                        <tr>
                                            <td>#</td>
                                            <td>-----</td>
                                            <td>-----</td>
                                            <td>شما خریدی نداشته اید</td>
                                            <td>-----</td>
                                            <td>-----</td>
                                            <td class="details-link">-----</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content -->

        </div>
    </div>
</main>
<!-- End main-content -->
