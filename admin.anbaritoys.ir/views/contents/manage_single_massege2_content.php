<?php
$getMessage = selectCategoryTBLcontact_us22($_GET['massege_id'] ?? null);
?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-message"></use></svg>
                جزئیات پیام
            </h3>
            <div class="an-card-sub">پیام ثبت‌شده از بخش تماس با ما</div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_massege2.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به پیام‌ها
        </a>
    </div>
    <div class="an-card-body">
        <?php if ($getMessage) { ?>
            <div class="an-form-grid">
                <div class="an-field">
                    <label>نام</label>
                    <div><?php echo $getMessage['name'] ?? '-----' ?></div>
                </div>
                <div class="an-field">
                    <label>شماره تماس</label>
                    <div dir="ltr" style="text-align:right"><?php echo $getMessage['mobile'] ?? '-----' ?></div>
                </div>
                <div class="an-field">
                    <label>موضوع</label>
                    <div><?php echo $getMessage['Issue'] ?? '-----' ?></div>
                </div>
                <div class="an-field an-span-2">
                    <label>متن پیام</label>
                    <div style="line-height:2"><?php echo $getMessage['Description'] ?? '-----' ?></div>
                </div>
            </div>
        <?php } else { ?>
            <div class="an-empty" style="display:flex">
                <svg class="an-ic"><use href="#an-i-info"></use></svg>
                <b>پیامی یافت نشد</b>
            </div>
        <?php } ?>
    </div>
</div>
