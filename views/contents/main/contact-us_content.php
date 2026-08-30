<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">

        <!-- Start Product -->
        <div class="dt-sn mb-5 dt-sl">
            <div class="row comments-add-col--content posi">
                <!--برای لوگو-->
                <div class="col-md-3"></div>
                <!--برای لوگو-->
                <div class="col-md-6 col-sm-12">
                    <div class="form-ui">
                        <?php echo initFormErrors();?>
                        <form class="px-5" method="post" action="">
                            <input type="hidden" name="create_contact_us" value="contact_us">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-row-title mb-2">شماره همراه</div>
                                    <div class="form-row">
                                        <input name="mobile" class="input-ui pr-2" type="text"
                                               placeholder="شماره همراه خود را وارد نمایید">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-row-title mb-2">نام و نام خانوادگی</div>
                                    <div class="form-row">
                                        <input name="name2" class="input-ui pr-2" type="text"
                                               placeholder="نام و نام خانوادگی خود را وارد کنید">
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="form-row-title mb-2">موضوع</div>
                                    <div class="form-row">
                                        <input name="Issue" class="input-ui pr-2" type="text"
                                               placeholder="موضوع متن خود را وارد نمایید">
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="form-row-title mb-2">متن نظر شما </div>
                                    <div class="form-row">
                                                <textarea name="description" class="input-ui pr-2 pt-2" rows="5"
                                                          placeholder="متن خود را بنویسید"></textarea>
                                    </div>
                                </div>

                                <div class="col-12 px-0">
                                    <?php
                                    if (isset($_SESSION['user_sing'])){
                                    ?>
                                    <button type="submit" class="btn btn btn-primary px-3 mt-3 mr-2">
                                       ارسال پیام
                                    </button>
                                    <?php
                                    }else{
                                        ?>
                        </form>
                                        <form method="post" action="" >
                                            <input type="hidden" name="action" value="sendMassage">
                                        <button type="submit" class="btn btn-primary px-3 mt-3 mr-2">
                                        ورود و ارسال پیام
                                        </button>
                                        </form>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>

                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <!-- End Product -->

    </div>


</main>

<div class="container main-container mt-4">
    <?php
    $selectcontact_us = selectcontact_us();
    $selectabout_us_mobile = selectabout_us_mobile();
    $selectabout_us_address = selectabout_us_address();
    ?>
    <div class="row">
        <div class="col-12">
            <div class="page-question-not-found">
                <div class="row">
                    <div class="col-12">
                        <div class="page-question-not-found-text">
                            جواب یا پرسش خود را پیدا نکردید؟
                            <br>
                            روش‌های ارتباط با ما
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-center">
                        <img src="https://anbaritoys.com/assets/img/faq/phone.svg" alt="شماره تماس عنبری تویز">
                        <div class="page-contact-option-text mr-3">
                            شماره تماس 1 :
                            <?php
                            echo $selectabout_us_mobile['mobile'];
                            ?>
                            <br>
                            شماره تماس 2 :
                            <?php
                            echo $selectabout_us_mobile['mobileTo'];
                            ?>
                            <br>
                            شماره تماس خط ثابت :
                            <?php
                            echo $selectabout_us_mobile['mobile_home'];
                            ?>

                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-center">
                        <img src="https://anbaritoys.com/assets/img/faq/email.svg" class="mb-5" alt="آدرس عنبری تویز">
                        <div class="page-contact-option-text mr-3">
                            آدرس :
                            <?php
                            echo $selectabout_us_address['address'];
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End main-content -->
