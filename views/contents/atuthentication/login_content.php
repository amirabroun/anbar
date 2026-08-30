<!-- Start main-content -->
<main class="main-content dt-sl mb-3">
    <div class="container main-container">

        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">
                <div class="form-ui dt-sl dt-sn pt-4">
                    <div class="section-title title-wide mb-1 no-after-title-wide">
                        <h2 class="font-weight-bold">ورود به عنبری تویز</h2>
                        <a href="/index.php" class="custom-link">برگشت
                            <i class="mdi mdi-arrow-right"></i>
                        </a>
                    </div>
                    <?php  echo initFormErrors() ?>
                    <form action="" method="post">
                        <input type="hidden" name="action" value="login_user">
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
                                <label class="custom-control-label" for="customCheck3">
                                    مرا به خاطر بسپار
                                </label>
                            </div>
                        </div>-->
                        <div class="form-row mt-3">
                            <button class="btn-primary-cm btn-with-icon mx-auto w-100">
                                <i class="mdi mdi-login-variant"></i>
                                ورود به عنبری تویز
                            </button>
                        </div>
                        <div class="form-footer text-right mt-3">
                            <span class="d-block font-weight-bold" >کاربر جدید هستید؟</span>
                            <a href="/register.php" class="d-inline-block mr-3 mt-2">ثبت نام در عنبری تویز</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>
<!-- End main-content -->

<!-- Core JS Files -->
<script src="./assets/js/vendor/jquery-3.4.1.min.js"></script>
<script src="./assets/js/vendor/popper.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./assets/js/vendor/bootstrap.min.js"></script>
<!-- Plugins -->
<script src="./assets/js/vendor/owl.carousel.min.js"></script>
<script src="./assets/js/vendor/isotope.pkgd.min.js"></script>
<script src="./assets/js/vendor/jquery.horizontalmenu.js"></script>

<script src="./assets/js/vendor/nouislide r.min.js"></script>
<script src="./assets/js/vendor/wNumb.js"></script>
<script src="./assets/js/vendor/ResizeSensor.min.js"></script>
<script src="./assets/js/vendor/theia-sticky-sidebar.min.js"></script>
<script src="./assets/js/vendor/countdown.min.js"></script>
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

<!-- Main JS File -->
<script src="./assets/js/main.js"></script>
</body>

</html>