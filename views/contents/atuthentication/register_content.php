<!-- Start main-content -->
<main class="main-content dt-sl mb-3">
    <div class="container main-container">

        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">
                <div class="form-ui dt-sl dt-sn pt-4">
                    <div class="section-title title-wide mb-1 no-after-title-wide">
                        <h2 class="font-weight-bold">ثبت نام در عنبری تویز
                        </h2>
                        <a href="/index.php" class="custom-link">برگشت
                            <i class="mdi mdi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="message-light">
                        اگر قبلا با ایمیل ثبت‌نام کرده‌اید، نیاز به ثبت‌نام مجدد با شماره همراه ندارید
                    </div>
                    <?php  echo initFormErrors() ?>
                    <form action="" method="post">
                        <input type="hidden" name="action" value="register_user">
                        <div class="form-row-title">
                            <h3> شماره موبایل</h3>
                        </div>
                        <div class="form-row with-icon">
                            <input type="text" class="input-ui pr-2" placeholder=" شماره موبایل خود را وارد نمایید" name="mobile">
                            <i class="mdi mdi-account-circle-outline"></i>
                        </div>

                        <!--<div class="form-row mt-2">
                            <div class="custom-control custom-checkbox float-right mt-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                <label class="custom-control-label text-justify" for="customCheck3">
                                    <a href="#">حریم خصوصی</a> و <a href="#">شرایط و قوانین</a> استفاده از سرویس های سایت دیدیکالا را مطالعه نموده و با کلیه موارد آن موافقم.
                                </label>
                            </div>
                        </div>-->
                        <div class="form-row mt-3">
                            <button class="btn-primary-cm btn-with-icon mx-auto w-100">
                                <i class="mdi mdi-account-circle-outline"></i>
                                ثبت نام در عنبری تویز
                            </button>
                        </div>
                        <div class="form-footer text-right mt-3">
                            <span class="d-block font-weight-bold">قبلا ثبت نام کرده اید؟</span>
                            <a href="/login.php" class="d-inline-block mr-3 mt-2">وارد شوید</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>
<!-- End main-content -->
