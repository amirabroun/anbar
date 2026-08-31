<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-image"></use></svg>
                عکس‌های محصول
            </h3>
            <div class="an-card-sub">ترتیب نمایش عکس‌ها همان ترتیب آپلود است — عکس اول، عکس اصلی محصول می‌شود.</div>
        </div>
        <a class="an-btn an-btn-soft an-btn-sm" href="manage_products.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به محصولات
        </a>
    </div>
    <div class="an-card-body">
        <div class="an-drop" id="anDrop" data-an-product="<?php echo $_GET['product_id'] ?>">
            <input type="file" accept="image/*" multiple hidden>
            <svg class="an-ic" style="width:34px;height:34px"><use href="#an-i-upload"></use></svg>
            <b>عکس‌ها را اینجا رها کنید یا کلیک کنید</b>
            <span>JPEG / PNG / WEBP — حداکثر ۳ مگابایت در هر فایل (تا ۵ فایل در هر بار)</span>
        </div>
    </div>
</div>

<div class="an-card">
    <div class="an-card-head">
        <h3 class="an-card-title">
            <svg class="an-ic"><use href="#an-i-grid"></use></svg>
            گالری تصاویر
        </h3>
    </div>
    <div class="an-card-body">
        <div class="an-photo-grid" id="anPhotoGrid">
            <?php
            $product_photos = getPhotoProductList($_GET['product_id']);
            if ($product_photos) {
                foreach ($product_photos as $photo) {
                    ?>
                    <figure class="an-photo-item">
                        <img src="<?php echo normalizedPath(DOMAIN['public'], $photo['src'], $photo['name']) ?>"
                             alt="تصویر <?php echo $photo['sort'] ?>" loading="lazy">
                        <figcaption>
                            <span>تصویر <?php echo $photo['sort'] ?></span>
                            <?php if ((int)$photo['sort'] === 1) { ?><span class="an-badge is-primary">اصلی</span><?php } ?>
                        </figcaption>
                    </figure>
                    <?php
                }
            } else {
                ?>
                <p style="color:var(--an-muted);font-size:13.5px">هنوز عکسی برای این محصول آپلود نشده است.</p>
                <?php
            }
            ?>
        </div>
    </div>
</div>
