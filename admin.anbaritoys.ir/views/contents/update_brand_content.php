<?php $anBrand = selectBrandd($_GET['brand_id']); ?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-edit"></use></svg>
                ویرایش برند
            </h3>
            <div class="an-card-sub"><?php echo $anBrand ? $anBrand['title'] : 'برند یافت نشد' ?></div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_brand.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به برندها
        </a>
    </div>
    <div class="an-card-body">
        <?php echo initFormErrors() ?>
        <form method="post" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="action" value="update_brand">
            <input type="hidden" name="id" value="<?php echo $anBrand['id'] ?>">
            <div class="an-form-grid">
                <div class="an-field">
                    <label>عنوان فارسی <small>*</small></label>
                    <input type="text" class="an-input" name="title" value="<?php echo $anBrand['title'] ?>">
                </div>
                <div class="an-field">
                    <label>عنوان انگلیسی</label>
                    <input type="text" class="an-input" name="english_title" value="<?php echo $anBrand['english_title'] ?>" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>وضعیت</label>
                    <select class="an-select" name="status">
                        <option value="active" <?php echo $anBrand['status'] === 'active' ? 'selected' : '' ?>>فعال</option>
                        <option value="inactive" <?php echo $anBrand['status'] === 'inactive' ? 'selected' : '' ?>>غیر فعال</option>
                    </select>
                </div>
                <div class="an-field">
                    <label>تصویر برند <small>(فقط png)</small></label>
                    <input type="file" class="an-input" name="pic">
                </div>
            </div>
            <div class="an-form-actions" style="margin-top:22px">
                <button type="submit" class="an-btn an-btn-primary">
                    <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-check"></use></svg>
                    ذخیره تغییرات
                </button>
                <a class="an-btn an-btn-ghost" href="manage_brand.php">انصراف</a>
            </div>
        </form>
    </div>
</div>
