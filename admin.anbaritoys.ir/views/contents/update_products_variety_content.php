<?php
$anVariety = selectproductvariety($_GET['product_variety_id']);
?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-layers"></use></svg>
                ویرایش تنوع محصول
            </h3>
            <div class="an-card-sub">کد محصول: <b dir="ltr"><?php echo $anVariety['tracking_code'] ?></b> · رنگ: <?php echo $anVariety['color'] ?></div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_all_products.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به لیست تنوع‌ها
        </a>
    </div>
    <div class="an-card-body">
        <?php echo initFormErrors() ?>
        <form data-an-variety="update" novalidate>
            <input type="hidden" name="product_variety_id" value="<?php echo $_GET['product_variety_id'] ?>">
            <div class="an-form-grid">
                <div class="an-field">
                    <label>موجودی <small>*</small></label>
                    <input type="text" class="an-input" name="stock" value="<?php echo $anVariety['stock'] ?>" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>قیمت (تومان) <small>*</small></label>
                    <input type="text" class="an-input" name="price" value="<?php echo $anVariety['price'] ?>" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>قیمت با تخفیف</label>
                    <input type="text" class="an-input" name="price_discounted" value="<?php echo $anVariety['price_discounted'] ?>" dir="ltr" style="text-align:right">
                </div>
            </div>
            <div class="an-form-actions" style="margin-top:22px">
                <button type="submit" class="an-btn an-btn-primary" data-an-submit>
                    <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-check"></use></svg>
                    ذخیره تغییرات
                </button>
                <a class="an-btn an-btn-ghost" href="manage_all_products.php">انصراف</a>
            </div>
        </form>
    </div>
</div>
