<?php $anCategory = selectParentCategory($_GET['category_id']); ?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-edit"></use></svg>
                ویرایش دسته‌بندی
            </h3>
            <div class="an-card-sub"><?php echo $anCategory ? $anCategory['title'] : 'دسته یافت نشد' ?></div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_category.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به دسته‌ها
        </a>
    </div>
    <div class="an-card-body">
        <?php echo initFormErrors() ?>
        <form method="post" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="action" value="update_category">
            <input type="hidden" name="id" value="<?php echo $anCategory['id'] ?>">
            <div class="an-form-grid">
                <div class="an-field">
                    <label>عنوان فارسی <small>*</small></label>
                    <input type="text" class="an-input" name="title" value="<?php echo $anCategory['title'] ?>">
                </div>
                <div class="an-field">
                    <label>عنوان انگلیسی</label>
                    <input type="text" class="an-input" name="title_english" value="<?php echo $anCategory['english_title'] ?>" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>دسته والد</label>
                    <select class="an-select" name="parent_id">
                        <option value="0">انتخاب کنید…</option>
                        <?php
                        $categoreis = selectCategory();
                        if ($categoreis) {
                            foreach ($categoreis as $categoryItem) {
                                ?>
                                <option <?php echo $categoryItem['id'] === $anCategory['parent_id'] ? 'selected' : '' ?> value="<?php echo $categoryItem['id'] ?>"><?php echo $categoryItem['title'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="an-field">
                    <label>مجموعه</label>
                    <select class="an-select" name="Collection_id">
                        <option value="0">انتخاب کنید…</option>
                        <?php
                        $selectCollection = selectCollectionTBL();
                        if ($selectCollection) {
                            foreach ($selectCollection as $collectionItem) {
                                ?>
                                <option <?php echo $collectionItem['id'] === $anCategory['Collection_id'] ? 'selected' : '' ?> value="<?php echo $collectionItem['id'] ?>"><?php echo $collectionItem['title'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="an-field">
                    <label>وضعیت</label>
                    <select class="an-select" name="status">
                        <option value="active" <?php echo $anCategory['status'] === 'active' ? 'selected' : '' ?>>فعال</option>
                        <option value="inactive" <?php echo $anCategory['status'] === 'inactive' ? 'selected' : '' ?>>غیر فعال</option>
                    </select>
                </div>
            </div>
            <div class="an-form-actions" style="margin-top:22px">
                <button type="submit" class="an-btn an-btn-primary">
                    <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-check"></use></svg>
                    ذخیره تغییرات
                </button>
                <a class="an-btn an-btn-ghost" href="manage_category.php">انصراف</a>
            </div>
        </form>
    </div>
</div>
