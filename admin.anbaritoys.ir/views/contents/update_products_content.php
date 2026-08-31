<?php $product = selectproduct($_GET['products_id']); ?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-edit"></use></svg>
                ویرایش محصول
            </h3>
            <div class="an-card-sub"><?php echo htmlspecialchars($product['title']) ?></div>
        </div>
        <div class="an-actions">
            <a class="an-btn an-btn-ghost an-btn-sm" href="manage_products_photos.php?product_id=<?php echo $_GET['products_id'] ?>">
                <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-image"></use></svg>
                عکس‌های محصول
            </a>
            <a class="an-btn an-btn-ghost an-btn-sm" href="manage_products_category.php?product_id=<?php echo $_GET['products_id'] ?>">
                <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-layers"></use></svg>
                دسته‌بندی
            </a>
            <a class="an-btn an-btn-soft an-btn-sm" href="manage_products.php">
                <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
                بازگشت
            </a>
        </div>
    </div>
    <div class="an-card-body">
        <?php echo initFormErrors() ?>
        <form class="form" method="post">
            <input type="hidden" name="action" value="update_product">
            <input type="hidden" name="category_id" value="37">
            <div class="an-form-grid">
                <div class="an-field">
                    <label>عنوان فارسی <small>*</small></label>
                    <input type="text" class="an-input" name="title" value="<?php echo $product['title'] ?>">
                </div>
                <div class="an-field">
                    <label>عنوان انگلیسی <small>*</small></label>
                    <input type="text" class="an-input" name="english_title" value="<?php echo $product['english_title'] ?>" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>قیمت (تومان) <small>*</small></label>
                    <input type="text" class="an-input" name="price" value="<?php echo $product['price'] ?>" inputmode="numeric">
                </div>
                <div class="an-field">
                    <label>قیمت با تخفیف</label>
                    <input type="text" class="an-input" name="price_discounted" value="<?php echo $product['price_discounted'] ?>" inputmode="numeric">
                </div>
                <div class="an-field">
                    <label>موجودی <small>*</small></label>
                    <input type="text" class="an-input" name="stock" value="<?php echo $product['stock'] ?>" inputmode="numeric">
                </div>
                <div class="an-field">
                    <label>وضعیت</label>
                    <select class="an-select" name="status">
                        <option value="active" <?php echo $product['status'] === 'active' ? 'selected' : '' ?>>فعال</option>
                        <option value="inactive" <?php echo $product['status'] === 'inactive' ? 'selected' : '' ?>>غیر فعال</option>
                    </select>
                </div>
                <div class="an-field">
                    <label>برند</label>
                    <?php $selectBrandsForProducts = selectBrandForProduct(); ?>
                    <select class="an-select" name="brand_id">
                        <option value="33">انتخاب کنید…</option>
                        <?php
                        if ($selectBrandsForProducts) {
                            foreach ($selectBrandsForProducts as $selectbrandsforproducts) {
                                ?>
                                <option <?php echo $selectbrandsforproducts['id'] === $product['brand_id'] ? 'selected' : '' ?>
                                        value="<?php echo $selectbrandsforproducts['id'] ?>"><?php echo $selectbrandsforproducts['title'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="an-field">
                    <label>برچسب‌ها <small>(سئو — با - جدا کنید)</small></label>
                    <input type="text" class="an-input" name="label" value="<?php echo $product['label'] ?>">
                </div>
                <div class="an-field an-span-2">
                    <label>توضیح کوتاه <small>(سئو)</small></label>
                    <input type="text" class="an-input" name="MiniDescription" value="<?php echo $product['MiniDescription'] ?>">
                </div>
                <div class="an-field an-span-2">
                    <label>نقد و بررسی <small>*</small></label>
                    <textarea data-an-editor name="review" placeholder="نقد و بررسی محصول…"><?php echo $product['review'] ?></textarea>
                </div>
                <div class="an-field an-span-2">
                    <label>توضیحات <small>*</small></label>
                    <textarea data-an-editor name="description" placeholder="توضیحات کامل محصول…"><?php echo $product['description'] ?></textarea>
                </div>
            </div>
            <div class="an-form-actions" style="margin-top:22px">
                <button type="submit" class="an-btn an-btn-primary">
                    <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-check"></use></svg>
                    ذخیره تغییرات
                </button>
                <a class="an-btn an-btn-ghost" href="manage_products.php">انصراف</a>
            </div>
        </form>
    </div>
</div>
