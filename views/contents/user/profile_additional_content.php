
            <!-- Start Content -->
            <?php
            require_once 'views/partial/sidebar.php';
            ?>
            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                <div class="row">

                    <div class="col-md-10 col-sm-12 mx-auto">
                        <div class="px-3 px-res-0">
                            <div
                                class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                                <h2>ویرایش اطلاعات شخصی</h2>
                            </div>
                            <div class="form-ui additional-info dt-sl dt-sn pt-4">
                                <?php echo initFormErrors()?>
                                <form id="form_user_update">

                                    <input type="hidden" value="<?php echo $_GET['mobile']?>" name="phone">
                                    <div class="form-row-title">
                                        <h3>نام</h3>
                                    </div>
                                    <div class="form-row">
                                        <input type="text" class="input-ui pr-2" name="first_name"
                                               placeholder="نام خود را وارد نمایید" value="<?php if (isset($details_user['first_name'])){
                                            echo $details_user['first_name'];
                                        }else{echo '';} ?>">
                                    </div>
                                    <div class="form-row-title">
                                        <h3>نام و نام خانوادگی</h3>
                                    </div>
                                    <div class="form-row">
                                        <input type="text" class="input-ui pr-2" name="last_name"
                                               placeholder="نام خانوادگی خود را وارد نمایید" value="<?php if (isset($details_user['last_name'])){
                                            echo $details_user['last_name'];
                                        }else{echo '';} ?>">
                                    </div>
                                    <div class="form-row-title">
                                        <h3>کد ملی</h3>
                                    </div>
                                    <div class="form-row">
                                        <input type="text" class="input-ui pl-2 text-left dir-ltr" name="national_code"
                                               placeholder="-" value="<?php if (isset($details_user['national_code'])){
                                            echo $details_user['national_code'];
                                        }else{echo '';} ?>">
                                    </div>
                                    <div class="dt-sl">
                                        <div class="form-row mt-3 justify-content-center">
                                            <button type="submit" class="btn-primary-cm btn-with-icon ml-2">
                                                <i class="mdi mdi-account-circle-outline"></i>
                                                ثبت اطلاعات کاربری
                                            </button>
                                            <button class="btn-primary-cm bg-secondary">انصراف</button>
                                        </div>
                                    </div>
                                </form>
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