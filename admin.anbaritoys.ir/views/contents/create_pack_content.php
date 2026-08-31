<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-plus"></use></svg>
                افزودن بسته‌بندی
            </h3>
            <div class="an-card-sub">مورد جدید برای ویژگی محصولات</div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_pack.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت
        </a>
    </div>
    <div class="an-card-body">
        <?php echo initFormErrors() ?>
        <form method="post" novalidate>
            <input type="hidden" name="action" value="create_pack">
            <div class="an-form-grid">
                <div class="an-field">
                    <label>عنوان فارسی <small>*</small></label>
                    <input type="text" class="an-input" name="title" placeholder="عنوان">
                </div>
                <div class="an-field">
                    <label>عنوان انگلیسی </label>
                    <input type="text" class="an-input" name="english_title" placeholder="English title" dir="ltr" style="text-align:right">
                </div>
            </div>
            <div class="an-form-actions" style="margin-top:22px">
                <button type="submit" class="an-btn an-btn-primary">
                    <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-check"></use></svg>
                    ثبت
                </button>
                <a class="an-btn an-btn-ghost" href="manage_pack.php">انصراف</a>
            </div>
        </form>
    </div>
</div>
