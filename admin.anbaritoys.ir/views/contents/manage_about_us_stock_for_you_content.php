<?php
$limit = selectAbout_usStockById(1);
?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-sliders"></use></svg>
                تعداد محصولات مرتبط
            </h3>
            <div class="an-card-sub">تعداد محصولاتی که در صفحهٔ محصول به‌عنوان «مرتبط» نمایش داده می‌شود</div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="index.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به داشبورد
        </a>
    </div>
    <div class="an-card-body">
        <?php echo initFormErrors() ?>
        <form method="post" novalidate>
            <input type="hidden" name="action" value="update_about_us_stock">
            <div class="an-form-grid">
                <div class="an-field">
                    <label>تعداد <small>*</small></label>
                    <input type="number" class="an-input" name="stock" value="<?php echo $limit['stock'] ?? '' ?>">
                </div>
            </div>
            <div class="an-form-actions" style="margin-top:22px">
                <button type="submit" class="an-btn an-btn-primary">
                    <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-check"></use></svg>
                    ثبت
                </button>
            </div>
        </form>
    </div>
</div>
