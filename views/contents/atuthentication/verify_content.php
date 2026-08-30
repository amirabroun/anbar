<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">

        <div class="row">

            <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">
                <div class="form-ui dt-sl dt-sn pt-4">
                    <div class="section-title title-wide mb-1 no-after-title-wide">
                        <h2 class="font-weight-bold">تایید شماره</h2>
                    </div>
                    <div class="message-light">
                        برای شماره همراه <?php echo $auth_details['mobile'] ?> کد تایید ارسال گردید
                        <a href="<?php echo $auth_details['_back'] ?>" class="btn-link-border">
                            ویرایش شماره
                        </a>
                        <?php
/*                        echo  $_SESSION['code_user_id'];
                        */?>
                    </div>
                    <?php  echo initFormErrors() ?>
                    <form action=""method="post">
                        <input type="hidden" name="action" value="confirmation_mobile_with_otp">
                        <div class="form-row-title">
                            <h3>کد تایید را وارد کنید</h3>
                        </div>
                        <div class="form-row">
                            <input type="text" class="input-ui pr-2" placeholder="کد ارسال شده خود را وارد کنید..." name="verify_code">
                            <i class="mdi mdi-account-circle-outline"></i>
                        </div>
                        <div class="form-row mt-2">
                            <a href="login.php">
                                <span class="text-primary">شماره تلفن اشتباه است؟</span>
                                <p id="countdown-verify-end"></p>
                            </a>
                        </div>
                        <div class="form-row mt-3">
                            <button class="btn-primary-cm btn-with-icon mx-auto w-100">
                                <i class="mdi mdi-account-circle-outline"></i>
                               تایید کد
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>
<!-- End main-content -->
<script src='./assets/js/vendor/sweetalert2.js'></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>

<?php
if (isset($_SESSION['message'])){
    ?>
    <script>
        swal.fire({
            title: "<?php echo $_SESSION['message']['title'] ?>",
            text: "<?php echo $_SESSION['message']['text'] ?>",
            icon: "<?php echo $_SESSION['message']['type'] ?>",
            confirmButtonText: 'متوجه شدم!',
        })
    </script>
    <?php
    unset($_SESSION['message']);
}

if (isset($_SESSION['message2'])){
    ?>
    <script>
        Toast.fire({
            icon: '<?php echo $_SESSION['message2']['text']; ?>',
            title: '<?php echo $_SESSION['message2']['type']; ?>'
        })
    </script>
    <?php
    unset($_SESSION['message2']);
}
?>