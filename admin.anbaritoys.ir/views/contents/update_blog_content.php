<?php
$anBlog = selectBlogg($_GET['blog_id']);
?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-paper"></use></svg>
                ویرایش مقاله
            </h3>
            <div class="an-card-sub">کد مقاله: <b dir="ltr"><?php echo $anBlog['id'] ?></b></div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manageArticles.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به مقالات
        </a>
    </div>
    <div class="an-card-body">
        <?php echo initFormErrors() ?>
        <form method="post" novalidate>
            <input type="hidden" name="action" value="update_blog">
            <input type="hidden" name="id" value="<?php echo $anBlog['id'] ?>">
            <div class="an-form-grid">
                <div class="an-field">
                    <label>عنوان مقاله <small>*</small></label>
                    <input type="text" class="an-input" name="title" value="<?php echo $anBlog['title'] ?>" placeholder="عنوان مقاله را وارد کنید">
                </div>
                <div class="an-field">
                    <label>نویسنده <small>*</small></label>
                    <input type="text" class="an-input" name="Created" value="<?php echo $anBlog['Created'] ?>" placeholder="عنوان فرد را وارد کنید">
                </div>
                <div class="an-field">
                    <label>برچسب‌ها</label>
                    <input type="text" class="an-input" name="label" value="<?php echo $anBlog['label'] ?>" placeholder="برچسب ها">
                </div>
                <div class="an-field">
                    <label>توضیح کوتاه (سئو)</label>
                    <input type="text" class="an-input" name="MiniDescription" value="<?php echo $anBlog['MiniDescription'] ?>" placeholder="برای سئو">
                </div>
                <div class="an-field" style="grid-column:1/-1">
                    <label>متن مقاله <small>*</small></label>
                    <textarea data-an-editor name="description" style="display:none"><?php echo $anBlog['description'] ?></textarea>
                </div>
            </div>
            <div class="an-form-actions" style="margin-top:22px">
                <button type="submit" class="an-btn an-btn-primary">
                    <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-check"></use></svg>
                    ذخیره تغییرات
                </button>
                <a class="an-btn an-btn-ghost" href="manageArticles.php">انصراف</a>
            </div>
        </form>
    </div>
</div>
