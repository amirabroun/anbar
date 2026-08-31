<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-plus"></use></svg>
                افزودن دسته‌بندی
            </h3>
            <div class="an-card-sub">دسته‌ها ساختار فروشگاه را می‌سازند — والد و مجموعه اختیاری‌اند</div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_category.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به دسته‌ها
        </a>
    </div>
    <div class="an-card-body">
        <?php echo initFormErrors() ?>
        <form method="post" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="action" value="create_category">
            <div class="an-form-grid">
                <div class="an-field">
                    <label>عنوان فارسی <small>*</small></label>
                    <input type="text" class="an-input" name="title" placeholder="عنوان">
                </div>
                <div class="an-field">
                    <label>عنوان انگلیسی <small>*</small></label>
                    <input type="text" class="an-input" name="title_english" placeholder="English title" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>دسته والد</label>
                    <select class="an-select" name="parent_id">
                        <option value="0">انتخاب کنید…</option>
                        <?php
                        $selectCategories = selectCategory();
                        if ($selectCategories) {
                            foreach ($selectCategories as $selectCategory) {
                                ?>
                                <option value="<?php echo $selectCategory['id'] ?>"><?php echo $selectCategory['title'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="an-field">
                    <label>زیرمجموعه</label>
                    <select class="an-select" name="Collection_id">
                        <option value="0">انتخاب کنید…</option>
                        <?php
                        $selectCollection = selectCollectionTBL();
                        if ($selectCollection) {
                            foreach ($selectCollection as $selectCollectionItem) {
                                ?>
                                <option value="<?php echo $selectCollectionItem['id'] ?>"><?php echo $selectCollectionItem['title'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="an-form-actions" style="margin-top:22px">
                <button type="submit" class="an-btn an-btn-primary">
                    <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-check"></use></svg>
                    ثبت دسته
                </button>
                <a class="an-btn an-btn-ghost" href="manage_category.php">انصراف</a>
            </div>
        </form>
    </div>
</div>
