
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
                                        <h2>سوالات شما</h2>
                                    </div>
                                    <div class="dt-sl">
                                        <div class="row">


                                            <?php
                                            $user_id = getIdUsers($_SESSION['user_sing']);
                                            $getCategory = selectCategoryTBLquestion222($user_id['id']);
                                            if ($getCategory){
                                            foreach ($getCategory as $code){
                                            $tracking_code = select_productss($code['teack_product']);
                                            ?>

                                                <div class="col-lg-6 col-md-12">
                                                <div class="card-horizontal-product">
                                                    <div class="card-horizontal-product-content">
                                                        <div class="rating-stars">
                                                            <i class="mdi mdi-star active"></i>
                                                            <i class="mdi mdi-star active"></i>
                                                            <i class="mdi mdi-star active"></i>
                                                            <i class="mdi mdi-star active"></i>
                                                            <i class="mdi mdi-star active"></i>
                                                        </div>
                                                        <div class="card-horizontal-product-price">
                                                            <span>سوال در مورد کالای:<br><?php echo $tracking_code['title'] ?></span>
                                                        </div>
                                                        <hr>
                                                        <div class="card-horizontal-product-title">
                                                                <h3> سوال شما :<br> <?php echo $code['text_user'] ?></h3>
                                                        </div>
                                                        <hr>
                                                        <div class="card-horizontal-product-price">پاسخ:<br>
                                                            <span class="text-info"><?php

                                                            if ($code['text_admin'] === 'nulll'){
                                                                echo 'هنوز پاسخی داده نشده';
                                                            }else{
                                                                echo $code['text_admin'];
                                                            }

                                                            ?>
                                                            </span>
                                                        </div>
                                                        <hr>
                                                        <div class="card-horizontal-product-title">
                                                            <h3> وضعیت :<br> <?php echo statusComante($code['status']) ?></h3>
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
                                                                    <h3>شما پرسش و پاسخی ندارید</h3>
                                                                </a>
                                                            </div>
                                                            <div class="card-horizontal-product-price">سوال شما:
                                                                <span class="text-info">-----</span>
                                                            </div>
                                                            <div class="card-horizontal-product-price">
                                                                <span>پاسخ:-----</span>
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

