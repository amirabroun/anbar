<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">

        <div class="row">
            <div class="col-12">
                <div class="page dt-sl dt-sn pt-3 pb-5">
                    <div class="section-title title-wide mb-1 no-after-title-wide">
                        <h2 class="font-weight-bold">درباره ما</h2>
                    </div>

                    <p><?php
                            $selectcontact_us = selectcontact_us();
                            $selectabout_us_mobile = selectabout_us_mobile();
                            $selectabout_us_address = selectabout_us_address();
                           echo $selectcontact_us['text'];
                        ?>
                    </p>

                </div>
            </div>
        </div>

    </div>
    <div class="container main-container mt-4">
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
                            <img src="/assets/img/faq/phone.svg" alt="شماره تماس عنبری تویز">
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
                            <img src="/assets/img/faq/email.svg" class="mb-5" alt="آدرس عنبریر تویز">
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
</main>
<!-- End main-content -->