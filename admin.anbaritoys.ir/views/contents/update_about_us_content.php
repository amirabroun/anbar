<?php
$category = selectAbout_usById($_GET['id'] ?? null);
?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-edit"></use></svg>
                ویرایش درباره ما
            </h3>
            <div class="an-card-sub">متن صفحهٔ «درباره ما» در سایت</div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_about_us.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت
        </a>
    </div>
    <div class="an-card-body">
        <?php echo initFormErrors() ?>
        <?php if ($category) { ?>
        <form method="post" action="" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="action" value="update_about_us">
            <input type="hidden" name="id" value="<?php echo $category['id'] ?>">
            <div class="an-field">
                <label>متن <small>*</small></label>
                <textarea data-an-editor name="title" style="display:none"><?php echo $category['text'] ?></textarea>
            </div>
            <div class="an-form-actions" style="margin-top:22px">
                <button type="submit" class="an-btn an-btn-primary">
                    <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-check"></use></svg>
                    ثبت تغییرات
                </button>
                <a class="an-btn an-btn-ghost" href="manage_about_us.php">انصراف</a>
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
