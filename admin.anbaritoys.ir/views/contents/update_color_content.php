<?php $anColor = selectColorId($_GET['color_id']); ?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-edit"></use></svg>
                ویرایش رنگ
            </h3>
            <div class="an-card-sub"><?php echo $anColor ? $anColor['title'] : 'مورد یافت نشد' ?></div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_color.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به رنگ‌ها
        </a>
    </div>
    <div class="an-card-body">
        <?php echo initFormErrors() ?>
        <form method="post" novalidate>
            <input type="hidden" name="action" value="update_color">
            <div class="an-form-grid">
                <div class="an-field">
                    <label>عنوان فارسی <small>*</small></label>
                    <input type="text" class="an-input" name="title" value="<?php echo $anColor['title'] ?>">
                </div>
                <div class="an-field">
                    <label>عنوان انگلیسی <small>*</small></label>
                    <input type="text" class="an-input" name="english_title" value="<?php echo $anColor['english_title'] ?>" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>وضعیت</label>
                    <select class="an-select" name="status">
                        <option value="active" <?php echo $anColor['status'] === 'active' ? 'selected' : '' ?>>فعال</option>
                        <option value="inactive" <?php echo $anColor['status'] === 'inactive' ? 'selected' : '' ?>>غیر فعال</option>
                    </select>
                </div>
            </div>
            <div class="an-form-actions" style="margin-top:22px">
                <button type="submit" class="an-btn an-btn-primary">
                    <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-check"></use></svg>
                    ذخیره تغییرات
                </button>
                <a class="an-btn an-btn-ghost" href="manage_color.php">انصراف</a>
            </div>
        </form>
    </div>
</div>
