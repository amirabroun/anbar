<?php
$category = selectMobileById($_GET['id'] ?? null);
?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-phone"></use></svg>
                ویرایش شماره‌های تماس
            </h3>
            <div class="an-card-sub">شماره‌های نمایش‌داده‌شده در سایت</div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_mobile.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به تلفن‌ها
        </a>
    </div>
    <div class="an-card-body">
        <?php echo initFormErrors() ?>
        <?php if ($category) { ?>
        <form method="post" action="" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="action" value="update_about_us_mobile">
            <input type="hidden" name="id" value="<?php echo $category['id'] ?>">
            <div class="an-form-grid">
                <div class="an-field">
                    <label>شماره تلفن ۱ <small>*</small></label>
                    <input type="text" class="an-input" name="mobile" value="<?php echo $category['mobile'] ?>" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>شماره تلفن ۲ <small>*</small></label>
                    <input type="text" class="an-input" name="mobileTo" value="<?php echo $category['mobileTo'] ?>" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>خط ثابت <small>*</small></label>
                    <input type="text" class="an-input" name="required" value="<?php echo $category['mobile_home'] ?>" dir="ltr" style="text-align:right">
                </div>
            </div>
            <div class="an-form-actions" style="margin-top:22px">
                <button type="submit" class="an-btn an-btn-primary">
                    <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-check"></use></svg>
                    ثبت تغییرات
                </button>
                <a class="an-btn an-btn-ghost" href="manage_mobile.php">انصراف</a>
            </div>
        </form>
        <?php } else { ?>
            <div class="an-empty" style="display:flex">
                <svg class="an-ic"><use href="#an-i-info"></use></svg>
                <b>رکوردی یافت نشد</b>
            </div>
        <?php } ?>
    </div>
</div>
