<?php
$getMessage = selectCategoryTBLcomente2($_GET['massege_id'] ?? null);
$anUser = $getMessage ? selectmobileuser($getMessage['user_id']) : null;
$anProduct = ($getMessage && !empty($getMessage['teack_product'])) ? selectproductTrack($getMessage['teack_product']) : null;
?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-message"></use></svg>
                جزئیات دیدگاه
            </h3>
            <div class="an-card-sub">اطلاعات کاربر، کالا و متن دیدگاه</div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_comante.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به دیدگاه‌ها
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
                    <label>قیمت کالا</label>
                    <div><?php echo $anProduct['price'] ?? '-----' ?></div>
                </div>
                <div class="an-field an-span-2">
                    <label>متن دیدگاه</label>
                    <div style="line-height:2"><?php echo $getMessage['text_user'] ?? '-----' ?></div>
                </div>
            </div>
        <?php } else { ?>
            <div class="an-empty" style="display:flex">
                <svg class="an-ic"><use href="#an-i-info"></use></svg>
                <b>دیدگاهی یافت نشد</b>
            </div>
        <?php } ?>
    </div>
</div>
