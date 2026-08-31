<?php /* پوسته جدید انبار — فوتر + اسکریپت‌ها + تبدیل فلاش سشن به توست */ ?>
    </main>
    <footer class="an-footer">
        <span><b>انبار</b> — سیستم مدیریت فروشگاه اسباب‌بازی</span>
        <span>2023© <b>فنی مهندسی پاسکال</b></span>
    </footer>
</div><!-- /.an-main -->
</div><!-- /.an-app -->
<div class="an-toast-stack" id="anToastStack"></div>
<script src="assets/js/admin.js"></script>
<?php if (isset($_SESSION['message'])) { ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    AN.toast(
        <?php echo json_encode($_SESSION['message']['title']) ?>,
        <?php echo json_encode($_SESSION['message']['text']) ?>,
        <?php echo json_encode($_SESSION['message']['type']) ?>
    );
});
</script>
<?php unset($_SESSION['message']); } ?>
</body>
</html>
