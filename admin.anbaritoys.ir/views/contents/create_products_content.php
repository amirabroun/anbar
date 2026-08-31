<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-package-plus"></use></svg>
                افزودن محصول
            </h3>
            <div class="an-card-sub">پس از ثبت، به صفحه دسته‌بندی و عکس‌های محصول هدایت می‌شوید</div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_products.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به محصولات
        </a>
    </div>
    <div class="an-card-body">
        <div class="an-alert is-error" id="anFormErrors" style="display:none"></div>
        <?php echo initFormErrors() ?>
        <form data-an-create novalidate>
            <input type="hidden" name="category_id" value="1">
            <div class="an-form-grid">
                <div class="an-field">
                    <label>عنوان فارسی <small>*</small></label>
                    <input type="text" class="an-input" id="title" name="title" placeholder="عنوان">
                </div>
                <div class="an-field">
                    <label>عنوان انگلیسی <small>*</small></label>
                    <input type="text" class="an-input" id="english_title" name="english_title" placeholder="English title" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>قیمت (تومان) <small>*</small></label>
                    <input type="text" class="an-input" id="price" name="price" placeholder="مثلاً 250000" inputmode="numeric">
                </div>
                <div class="an-field">
                    <label>قیمت با تخفیف</label>
                    <input type="text" class="an-input" id="price_discounted" name="price_discounted" placeholder="خالی = بدون تخفیف" inputmode="numeric">
                </div>
                <div class="an-field">
                    <label>موجودی <small>*</small></label>
                    <input type="text" class="an-input" id="stock" name="stock" placeholder="تعداد موجود" inputmode="numeric">
                </div>
                <div class="an-field">
                    <label>برند</label>
                    <?php $selectBrandsForProducts = selectBrandForProduct(); ?>
                    <select class="an-select" id="brand_id" name="brand_id">
                        <option value="1">انتخاب کنید…</option>
                        <?php
                        if ($selectBrandsForProducts) {
                            foreach ($selectBrandsForProducts as $selectbrandsforproducts) {
                                ?>
                                <option value="<?php echo $selectbrandsforproducts['id'] ?>"><?php echo $selectbrandsforproducts['title'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="an-field an-span-2">
                    <label>برچسب‌ها <small>(برای سئو — کلمه‌ها را با - جدا کنید)</small></label>
                    <input type="text" class="an-input" id="label" name="label" placeholder="اسباب-بازی-پسرانه">
                </div>
                <div class="an-field an-span-2">
                    <label>توضیح کوتاه <small>(برای سئو)</small></label>
                    <input type="text" class="an-input" id="MiniDescription" name="MiniDescription" placeholder="توضیح یک‌خطی محصول">
                </div>
                <div class="an-field an-span-2">
                    <label>نقد و بررسی</label>
                    <textarea data-an-editor name="review" placeholder="نقد و بررسی محصول…"></textarea>
                </div>
                <div class="an-field an-span-2">
                    <label>توضیحات</label>
                    <textarea data-an-editor name="description" placeholder="توضیحات کامل محصول…"></textarea>
                </div>
            </div>
            <div class="an-form-actions" style="margin-top:22px">
                <button type="submit" class="an-btn an-btn-primary" data-an-submit>
                    <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-check"></use></svg>
                    ثبت محصول
                </button>
                <a class="an-btn an-btn-ghost" href="manage_products.php">انصراف</a>
            </div>
        </form>
    </div>
</div>
