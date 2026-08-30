<!-- Start mini-footer --></div>
<br>
<br>
<br>
<br><br>
<?php
$getLastProducts = getLastProducts();
if ($getLastProducts) {
    foreach ($getLastProducts as $product) {

        ?>
        <!--                 Share:start -->
        <div class="modal fade" id="exampleModal<?php echo $product['id'] ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">اشتراک گذاری در شبکه های اجتماعی :</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <a href="https://www.instagram.com/?url=https://<?php echo productUrl($product['tracking_code']) ?>"
                           target="_blank" class="btn btn-danger"><i class="fab fa-instagram share-icon"></i></a>
                        <a href="whatsapp://send?text=<?php echo productUrl($product['tracking_code']) ?>"
                           class="btn btn-success"><i class="fab fa-whatsapp share-icon"></i></a>
                        <a href="https://www.telegram.com/?url=https://<?php echo productUrl($product['tracking_code']) ?>"
                           class="btn btn-primary"><i class="fab fa-telegram share-icon"></i></a>
                        <a href="https://www.linkedin.com/?url=https://<?php echo productUrl($product['tracking_code']) ?>"
                           class="btn btn-warning"><i class="fab fa-linkedin share-icon"></i></a>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <input class="form-control" type="text"
                                   value="<?php echo productUrl($product['tracking_code']) ?>"
                                   id="<?php echo $product['id'] ?>">
                            <button onclick="CopyText('<?php echo $product['id'] ?>')"
                                    class="btn btn-light mr-4 shadow" id="">
                                <i class="fa fa-copy"></i>
                            </button>
                            <!--disabled-->
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>
        <!--                                    Share :end-->
        <?php
    }
}
?>

<footer class="mini-footer dt-sl">
    <div class="container main-container">
        <div class="row">
            
            <div class="col-12 mt-2 mb-3">
                <div class="footer-light-text">
                    استفاده از مطالب فروشگاه اینترنتی عنبری تویز فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است.
© 2023 - طراحی و توسعه توسط تیم فنی مهندسی پاسکال
                </div>
            </div>
            <div class="col-12 text-center">
                <div class="copy-right-mini-footer">
                    Copyright © 2023 PascalCompany
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End mini-footer -->

</div>

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
<script src="/assets/js/vendor/jquery-3.4.1.min.js"></script>
<script src="/assets/js/vendor/popper.min.js"></script>
<script src="/assets/js/vendor/bootstrap.min.js"></script>
<!-- Plugins -->
<script src="/assets/js/vendor/owl.carousel.min.js"></script>
<script src="/assets/js/vendor/isotope.pkgd.min.js"></script>
<script src="/assets/js/vendor/jquery.horizontalmenu.js"></script>

<script src="/assets/js/vendor/nouislide r.min.js"></script>
<script src="/assets/js/vendor/wNumb.js"></script>
<script src="/assets/js/vendor/ResizeSensor.min.js"></script>
<script src="/assets/js/vendor/theia-sticky-sidebar.min.js"></script>
<script src="/assets/js/vendor/countdown.min.js"></script>
<script src='/assets/js/vendor/sweetalert2.js'></script>
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

<!--Start Preload-->
<div class="preload">
    <div class="preload-logo"><img class="img-fluid" src="assets/img/logoo.png">
        <div class="loading"></div>
    </div>
</div>
<!--End Preload-->
<script>
    //Preload Scripts
    let preloadElem = document.querySelector('.preload');
    function preloadHandler() {
        preloadElem.style.display = 'none';
    }

    window.addEventListener("load", preloadHandler);
</script>

<script>
    function CopyText(url) {
        // Get the text field
        var copyText = document.getElementById(url);

        // Select the text field
        copyText.setSelectionRange(0, 99999); // For mobile devices
        try{
            copyText.select();
            document.execCommand('copy');
            alert('لینک کپی شد \n' + copyText.value)
        }catch(error){
            console.log(error)
        }
    }

</script>

<!-- Main JS File -->
<script src="/assets/js/main.js"></script>
</body>

</html>
