
            <!-- Start main-content -->
            <main class="main-content dt-sl mt-4 mb-3">
                <div class="container main-container">
                    <div class="row">

                        <?php
                        require_once 'views/partial/sidebar.php';
                        ?>
                        <!-- Start Content -->
                        <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                            <div class="row">
                                <div class="col-12">
                                    <div
                                            class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                        <h2>کد هدیه ها</h2>
                                    </div>
                                    <div class="dt-sl">
                                        <div class="row">


                                            <?php
                                            $user_id = getIdUsers($_SESSION['user_sing']);
                                            $select_discount_code_user_interest = select_discount_code_user_interest($user_id['id']);
                                            if ($select_discount_code_user_interest){
                                            foreach ($select_discount_code_user_interest as $code){
                                            $id_code = $code['discount_id'];
                                            $select_discount_id = select_discount_code_userById($id_code);
                                            ?>

                                                <div class="col-lg-4 col-md-12">
                                                <div class="card-horizontal-product">
                                                    <div class="card-horizontal-product-content">
                                                        <div class="rating-stars">
                                                            <i class="mdi mdi-star active"></i>
                                                            <i class="mdi mdi-star active"></i>
                                                            <i class="mdi mdi-star active"></i>
                                                            <i class="mdi mdi-star active"></i>
                                                            <i class="mdi mdi-star active"></i>
                                                        </div>
                                                        <div class="card-horizontal-product-title">
                                                            <a href="#">
                                                                <h3><?php echo $select_discount_id['title'] ?></h3>
                                                            </a>
                                                        </div>
                                                        <div class="card-horizontal-product-price">کد هدیه:
                                                            <span class="text-info"><?php echo $select_discount_id['discount_code_one_user_name'] ?></span>
                                                        </div>
                                                        <div class="card-horizontal-product-price">
                                                            <span>مبلغ تخفیف:<?php echo $select_discount_id['price'] ?></span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                            }
                                            }else{
                                                ?>

                                                    <div class="col-lg-4 col-md-12">
                                                    <div class="card-horizontal-product">
                                                        <div class="card-horizontal-product-content">
                                                            <div class="rating-stars">
                                                                <i class="mdi mdi-star active"></i>
                                                                <i class="mdi mdi-star active"></i>
                                                                <i class="mdi mdi-star active"></i>
                                                                <i class="mdi mdi-star active"></i>
                                                                <i class="mdi mdi-star active"></i>
                                                            </div>
                                                            <div class="card-horizontal-product-title">
                                                                <a href="#">
                                                                    <h3>شما کد هدیه ای ندارید</h3>
                                                                </a>
                                                            </div>
                                                            <div class="card-horizontal-product-price">کد هدیه:
                                                                <span class="text-info">-----</span>
                                                            </div>
                                                            <div class="card-horizontal-product-price">
                                                                <span>مبلغ تخفیف:-----</span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                            }
                                            ?>


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

