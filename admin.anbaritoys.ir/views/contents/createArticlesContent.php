<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-paper"></use></svg>
                افزودن مقاله
            </h3>
            <div class="an-card-sub">مقالات بخش مجله انبار</div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manageArticles.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به مقالات
        </a>
    </div>
    <div class="an-card-body">
        <?php echo initFormErrors() ?>
        <form data-an-paper="create" novalidate>
            <div class="an-form-grid">
                <div class="an-field">
                    <label>عنوان مقاله <small>*</small></label>
                    <input type="text" class="an-input" name="title" placeholder="عنوان مقاله را وارد کنید">
                </div>
                <div class="an-field">
                    <label>نویسنده <small>*</small></label>
                    <input type="text" class="an-input" name="Created" placeholder="عنوان فرد را وارد کنید">
                </div>
                <div class="an-field">
                    <label>برچسب‌ها</label>
                    <input type="text" class="an-input" name="label" placeholder="برچسب ها">
                </div>
                <div class="an-field">
                    <label>توضیح کوتاه (سئو)</label>
                    <input type="text" class="an-input" name="MiniDescription" placeholder="برای سئو — از توضیح طولانی خودداری کنید">
                </div>
                <div class="an-field" style="grid-column:1/-1">
                    <label>متن مقاله <small>*</small></label>
                    <textarea data-an-editor name="description" style="display:none"></textarea>
                </div>
            </div>
            <div class="an-form-actions" style="margin-top:22px">
                <button type="submit" class="an-btn an-btn-primary" data-an-submit>
                    <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-check"></use></svg>
                    ثبت مقاله
                </button>
                <button type="reset" class="an-btn an-btn-ghost">لغو</button>
            </div>
        </form>
    </div>
</div>
