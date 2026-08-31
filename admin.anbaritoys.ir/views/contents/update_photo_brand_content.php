<?php
$anImgBlog = getImgBlog2($_GET['brand_id'] ?? null);
$anBrandPhoto = false;
if ($anImgBlog) {
    $anPhotoStmt = $cn->prepare('select * from brand_photo where id = ?');
    $anPhotoStmt->bindValue(1, $anImgBlog['photo_id']);
    $anPhotoStmt->execute();
    $anBrandPhoto = $anPhotoStmt->fetch() ?: false;
}
?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-image"></use></svg>
                عکس برند
            </h3>
            <div class="an-card-sub">فرمت‌های مجاز: png / jpg / jpeg</div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_brand.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به برندها
        </a>
    </div>
    <div class="an-card-body">
        <?php echo initFormErrors() ?>
        <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="action" value="blogImg">
            <?php if ($anBrandPhoto) { ?>
                <div style="margin-bottom:18px">
                    <img src="<?php echo normalizedPath(DOMAIN['public'], $anBrandPhoto['src'], $anBrandPhoto['name']) ?>" alt="عکس برند" style="max-width:280px;max-height:180px;border-radius:12px;border:1px solid var(--an-border,#e5e7eb)">
                </div>
            <?php } ?>
            <div class="an-field">
                <label>انتخاب تصویر</label>
                <input type="file" class="an-input" name="product_img[]" accept=".png, .jpg, .jpeg">
            </div>
            <div class="an-form-actions" style="margin-top:22px">
                <button type="submit" class="an-btn an-btn-primary">
                    <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-upload"></use></svg>
                    درج تصویر
                </button>
            </div>
        </form>
    </div>
</div>
