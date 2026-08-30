<!-- Start mini-footer -->

<script>
    document.addEventListener('contextmenu', event => event.preventDefault());

    document.onkeydown = function(e) {
        if(event.keyCode == 123) {
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
            return false;
        }
        if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
            return false;
        }
    }

</script>

<footer class="mini-footer dt-sl">
    <div class="container main-container">
        <div class="row">

            <div class="col-12 text-center mt-2">
                <p class="text-secondary text-footer">
                    استفاده از کارت هدیه یا کد تخفیف، درصفحه ی پرداخت امکان پذیر است.
                </p>
            </div>
            <div class="col-12 text-center">
                <div class="copy-right-mini-footer">
                    Copyright © 2023 pascalCompany
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End mini-footer -->

</div>

<!-- colorPanel -->
<div id="colorswitch-option">
    <button><i class="mdi mdi-settings"></i></button>
    <ul>
        <li class="active" data-path="./assets/css/colors/default.css"><span style="background-color: #f7858d;"></span></li>
        <li data-path="/assets/css/colors/amber-color.css"><span style="background-color: #ffab00;"></span></li>
        <li data-path="/assets/css/colors/blue-color.css"><span style="background-color: #2979ff;"></span></li>
        <li data-path="/assets/css/colors/blue-grey-color.css"><span style="background-color: #607d8b;"></span></li>
        <li data-path="/assets/css/colors/brown-color.css"><span style="background-color: #795548;"></span></li>
        <li data-path="/assets/css/colors/cyan-color.css"><span style="background-color: #00bcd4;"></span></li>
        <li data-path="/assets/css/colors/green-color.css"><span style="background-color: #4caf50;"></span></li>
        <li data-path="/assets/css/colors/indigo-color.css"><span style="background-color: #3f51b5;"></span></li>
        <li data-path="/assets/css/colors/lime-color.css"><span style="background-color: #cddc39;"></span></li>
        <li data-path="/assets/css/colors/orange-color.css"><span style="background-color: #ff9800;"></span></li>
        <li data-path="/assets/css/colors/red-color.css"><span style="background-color: #f44336;"></span></li>
        <li data-path="/assets/css/colors/teal-color.css"><span style="background-color: #009688;"></span></li>
        <li data-path="/assets/css/colors/purple-color.css"><span style="background-color: #9c27b0;"></span></li>
    </ul>
</div>
<!-- end colorPanel -->


<!-- Core JS Files -->
<!-- Core JS Files -->
<script src='/assets/js/vendor/jquery-3.4.1.min.js'></script>
<script src='/assets/js/vendor/popper.min.js'></script>
<script src='/assets/js/vendor/bootstrap.min.js'></script>
<!-- Plugins -->
<script src='/assets/js/vendor/owl.carousel.min.js'></script>
<script src='/assets/js/vendor/jquery.horizontalmenu.js'></script>
<script src='/assets/js/vendor/jquery.nice-select.min.js'></script>
<script src='/assets/js/vendor/jquery.fancybox.min.js'></script>
<script src='/assets/js/vendor/nouislider.min.js'></script>
<script src='/assets/js/vendor/wNumb.js'></script>
<script src='/assets/js/vendor/ResizeSensor.min.js'></script>
<script src='/assets/js/vendor/theia-sticky-sidebar.min.js'></script>
<script src='/assets/js/vendor/sweetalert2.js'></script>
<!-- Main JS File -->
<script src='./assets/js/main.js'></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
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
<!-- google map js -->

<!-- Main JS File -->
<script src="/assets/js/main.js"></script>
</body>

</html>