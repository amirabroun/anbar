<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-percent"></use></svg>
                افزودن کد تخفیف
            </h3>
            <div class="an-card-sub">کد هدیه برای یک کاربر یا کد تخفیف تعدادی برای عموم</div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_discount_code_user.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            کدهای کاربری
        </a>
    </div>
    <div class="an-card-body">
        <?php echo initFormErrors() ?>
        <form method="post" novalidate>
            <input type="hidden" name="action" value="create_discount_code">
            <div class="an-form-grid">
                <div class="an-field">
                    <label>عنوان <small>*</small></label>
                    <input type="text" class="an-input" name="title" placeholder="عنوان">
                </div>
                <div class="an-field">
                    <label>کد تخفیف <small>*</small></label>
                    <input type="text" class="an-input" name="title_english" placeholder="DISCOUNT20" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>مبلغ کد تخفیف (تومان)</label>
                    <input type="text" class="an-input" name="price" placeholder="مثلاً 50000" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>نوع کد تخفیف</label>
                    <select class="an-select" name="action2">
                        <option value="grop">کد تخفیف</option>
                        <option value="one_user">کد هدیه</option>
                    </select>
                </div>
                <div class="an-field">
                    <label>حداقل خرید (تومان)</label>
                    <input type="text" class="an-input" name="min_name" placeholder="حداقل مبلغ سبد خرید" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>تعداد (برای کد تعدادی)</label>
                    <input type="text" class="an-input" name="stock" placeholder="فقط برای کد تخفیف تعدادی" dir="ltr" style="text-align:right">
                </div>
            </div>
            <div class="an-form-actions" style="margin-top:22px">
                <button type="submit" class="an-btn an-btn-primary">
                    <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-check"></use></svg>
                    ثبت کد تخفیف
                </button>
                <a class="an-btn an-btn-ghost" href="manage_discount_code_user.php">انصراف</a>
            </div>
        </form>
    </div>
</div>
