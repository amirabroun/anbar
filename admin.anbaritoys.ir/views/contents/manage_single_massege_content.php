<?php
$getMessage = selectCategoryTBLquestion22($_GET['massege_id'] ?? null);
$anUser = $getMessage ? selectmobileuser($getMessage['user_id']) : null;
$anProduct = ($getMessage && !empty($getMessage['teack_product'])) ? selectproductTrack($getMessage['teack_product']) : null;
$anReply = $getMessage['text_admin'] ?? '';
if ($anReply === 'nulll') {
    $anReply = 'هنوز پاسخی داده نشده';
}
?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-message"></use></svg>
                جزئیات سوال
            </h3>
            <div class="an-card-sub">اطلاعات کاربر و کالا + ثبت پاسخ</div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_massege.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به نظرات
        </a>
    </div>
    <div class="an-card-body">
        <?php if ($getMessage) { ?>
            <div class="an-form-grid">
                <div class="an-field">
                    <label>نام کاربر</label>
                    <div><?php echo $anUser['first_name'] ?? '-----' ?></div>
                </div>
                <div class="an-field">
                    <label>نام خانوادگی</label>
                    <div><?php echo $anUser['last_name'] ?? '-----' ?></div>
                </div>
                <div class="an-field">
                    <label>شماره تماس</label>
                    <div dir="ltr" style="text-align:right"><?php echo $anUser['mobile'] ?? '-----' ?></div>
                </div>
                <div class="an-field">
                    <label>کد کالا</label>
                    <div><span class="an-code"><?php echo $getMessage['teack_product'] ?? '-----' ?></span></div>
                </div>
                <div class="an-field">
                    <label>نام کالا</label>
                    <div><?php echo $anProduct['title'] ?? '-----' ?></div>
                </div>
                <div class="an-field">
                    <label>قیمت با تخفیف</label>
                    <div><?php echo $anProduct['price_discounted'] ?? '-----' ?></div>
                </div>
                <div class="an-field an-span-2">
                    <label>متن پیام کاربر</label>
                    <div style="line-height:2"><?php echo $getMessage['text_user'] ?? '-----' ?></div>
                </div>
            </div>
            <form method="post" action="" novalidate style="margin-top:26px">
                <input type="hidden" name="admin_massage" value="massage_admin">
                <input type="hidden" name="id" value="<?php echo $getMessage['id'] ?>">
                <div class="an-form-grid">
                    <div class="an-field an-span-2">
                        <label>پاسخ شما</label>
                        <input type="text" class="an-input" name="send_admin" value="<?php echo $anReply ?>">
                    </div>
                </div>
                <div class="an-form-actions" style="margin-top:20px">
                    <button type="submit" class="an-btn an-btn-primary">
                        <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-check"></use></svg>
                        ارسال پاسخ
                    </button>
                </div>
            </form>
        <?php } else { ?>
            <div class="an-empty" style="display:flex">
                <svg class="an-ic"><use href="#an-i-info"></use></svg>
                <b>سوالی یافت نشد</b>
            </div>
        <?php } ?>
    </div>
</div>
