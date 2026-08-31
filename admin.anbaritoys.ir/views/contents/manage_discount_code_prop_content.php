<?php
$getCode = selectcode_gropTBL();
?>
<div class="an-card">
    <div class="an-toolbar">
        <div class="an-search">
            <svg class="an-ic"><use href="#an-i-search"></use></svg>
            <input type="text" placeholder="جستجو در کدهای تعدادی…">
        </div>
        <span class="an-count"></span>
        <a class="an-btn an-btn-primary an-btn-sm" href="create_discount_code.php" style="margin-right:14px">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-plus"></use></svg>
            افزودن کد
        </a>
    </div>
    <div class="an-table-wrap">
        <table class="an-table" data-an-table data-an-page-size="10">
            <thead>
            <tr>
                <th data-sortable data-rank># <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>عنوان <span class="an-sort">&#9650;&#9660;</span></th>
                <th>کد تخفیف</th>
                <th data-sortable>تعداد <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>مبلغ تخفیف <span class="an-sort">&#9650;&#9660;</span></th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($getCode) {
                foreach ($getCode as $key => $getcode) {
                    $codeId = (int)$getcode['id'];
                    ?>
                    <tr>
                        <td data-rank="1"><?php echo $key + 1 ?></td>
                        <td><span class="an-cell-title"><?php echo $getcode['title'] ?></span></td>
                        <td><span class="an-badge is-muted" dir="ltr" style="text-align:right"><?php echo $getcode['discount_code_one_user_name'] ?></span></td>
                        <td dir="ltr" style="text-align:right"><?php echo $getcode['stock'] ?></td>
                        <td dir="ltr" style="text-align:right"><?php echo $getcode['price'] ?></td>
                        <td>
                            <div class="an-actions">
                                <a class="an-iconbtn is-trash" href="?action=delete_grop_code&code_id=<?php echo $codeId ?>" title="حذف کد">
                                    <svg class="an-ic"><use href="#an-i-trash"></use></svg>
                                </a>
                                <a class="an-btn an-btn-ghost an-btn-sm" href="select_products_grop_code.php?category_id=<?php echo $codeId ?>" title="انتخاب محصولات غیرقابل اعمال">
                                    <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-box"></use></svg>
                                    محصولات مستثنی
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="an-empty" style="display:none">
        <svg class="an-ic"><use href="#an-i-search"></use></svg>
        <b>موردی پیدا نشد</b>
        عبارت جستجو را تغییر دهید.
    </div>
    <div class="an-pager"><span class="an-pager-info"></span></div>
</div>
