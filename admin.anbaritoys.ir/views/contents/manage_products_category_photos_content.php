<?php
$anCategoryPhotos = getPhotoProductList($_GET['category_id'] ?? null);
?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-upload"></use></svg>
                آپلود تصاویر دسته
            </h3>
            <div class="an-card-sub">برای آپلود، فایل‌ها را به کادر بکشید یا کلیک کنید — حداکثر ۳ مگابایت برای هر تصویر</div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_category.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به دسته‌بندی‌ها
        </a>
    </div>
    <div class="an-card-body">
        <input id="input_category_id" type="hidden" value="<?php echo $_GET['category_id'] ?? '' ?>">
        <div class="an-drop" id="anDrop" data-an-product="<?php echo $_GET['category_id'] ?? '' ?>" data-an-file="photo_category">
            <input type="file" accept="image/*" multiple hidden>
            <svg class="an-ic" style="width:34px;height:34px"><use href="#an-i-upload"></use></svg>
            <b>فایل‌ها را اینجا رها کنید یا کلیک کنید</b>
            <span>JPEG / PNG — حداکثر ۳ مگابایت در هر فایل (تا ۵ فایل در هر بار)</span>
        </div>
    </div>
</div>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">مدیریت تصاویر</h3>
            <div class="an-card-sub">تصاویر ثبت‌شده برای این دسته</div>
        </div>
    </div>
    <div class="an-card-body">
        <?php if ($anCategoryPhotos) { ?>
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(150px,1fr));gap:14px">
                <?php foreach ($anCategoryPhotos as $anPhoto) { ?>
                    <div style="text-align:center">
                        <img src="<?php echo normalizedPath(DOMAIN['public'], $anPhoto['src'], $anPhoto['name']) ?>" alt="تصویر <?php echo $anPhoto['sort'] ?>" style="width:100%;height:120px;object-fit:cover;border-radius:12px;border:1px solid var(--an-border,#e5e7eb)">
                        <div style="font-size:12px;color:var(--an-ink-2,#4b5563);margin-top:6px">تصویر <?php echo $anPhoto['sort'] ?></div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div class="an-empty" style="display:flex">
                <svg class="an-ic"><use href="#an-i-image"></use></svg>
                <b>تصویری ثبت نشده است</b>
            </div>
        <?php } ?>
    </div>
</div>
