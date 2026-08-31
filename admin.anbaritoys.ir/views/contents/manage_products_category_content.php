<?php $anProductId = isset($_GET['product_id']) ? $_GET['product_id'] : ''; ?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-layers"></use></svg>
                دسته‌بندی محصول
            </h3>
            <div class="an-card-sub">برای هر بخش، دسته را انتخاب کنید — بلافاصله به محصول متصل می‌شود.</div>
        </div>
        <a class="an-btn an-btn-soft an-btn-sm" href="manage_products.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به محصولات
        </a>
    </div>
    <div class="an-card-body">
        <div class="an-form-grid">
            <?php
            $anCatSections = [
                ['id' => 'insertBottomBannerCat',  'label' => 'دسته‌بندی زیر بنر',  'fn' => 'selectCategoryForProductBanner'],
                ['id' => 'insertBottomBannerCat2', 'label' => 'دسته جنسیتی',       'fn' => 'selectCategoryForProductBoy'],
                ['id' => 'insertBottomBannerCat3', 'label' => 'دسته رده سنی',      'fn' => 'selectCategoryForProductAge'],
                ['id' => 'insertBottomBannerCat4', 'label' => 'دسته‌بندی شخصیتی',  'fn' => 'selectCategoryForProductShakhs'],
            ];
            foreach ($anCatSections as $anSec) {
                $anCats = $anSec['fn']();
                ?>
                <div class="an-field" data-an-product="<?php echo $anProductId ?>">
                    <label><?php echo $anSec['label'] ?></label>
                    <select class="an-select" name="category_id" id="<?php echo $anSec['id'] ?>" data-an-cat>
                        <option value="1">انتخاب کنید…</option>
                        <?php
                        if ($anCats) {
                            foreach ($anCats as $anCat) {
                                ?>
                                <option value="<?php echo $anCat['id'] ?>"><?php echo $anCat['title'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <?php
            }
            ?>
        </div>

        <hr style="border:none;border-top:1px solid var(--an-border);margin:26px 0 18px">
        <label style="font-weight:700;font-size:13.5px;margin-bottom:12px;display:block">دسته‌های متصل‌شده به این محصول <small style="color:var(--an-muted);font-weight:400">(برای حذف روی دسته کلیک کنید)</small></label>
        <form action="" method="get" id="anChips" style="display:flex;flex-wrap:wrap;gap:10px">
            <input type="hidden" name="action" value="DeleteCategoryProductsOrder">
            <input type="hidden" name="product_id" value="<?php echo $anProductId ?>">
            <?php
            $getCategory = selectcategoryyOeser23($anProductId);
            if ($getCategory) {
                foreach ($getCategory as $categoryys) {
                    $getCategorys = selectcategoryy($categoryys['category_id']);
                    if (!$getCategorys) continue;
                    ?>
                    <button type="submit" name="ids" value="<?php echo $getCategorys['id'] ?>"
                            data-name="<?php echo htmlspecialchars($getCategorys['title']) ?>" class="an-chip">
                        <svg class="an-ic"><use href="#an-i-trash"></use></svg>
                        <span><?php echo $getCategorys['title'] ?></span>
                    </button>
                    <?php
                }
            } else {
                ?>
                <span style="color:var(--an-muted);font-size:13px">هنوز دسته‌ای متصل نشده است.</span>
                <?php
            }
            ?>
        </form>
    </div>
</div>
