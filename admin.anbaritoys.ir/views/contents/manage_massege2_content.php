<?php
$getCategory = selectCategoryTBLcontact_us();
?>
<div class="an-card">
    <div class="an-toolbar">
        <div class="an-search">
            <svg class="an-ic"><use href="#an-i-search"></use></svg>
            <input type="text" placeholder="جستجو در نام یا موضوع…">
        </div>
        <span class="an-count"></span>
    </div>
    <div class="an-table-wrap">
        <table class="an-table" data-an-table data-an-page-size="10">
            <thead>
            <tr>
                <th data-sortable data-rank># <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>نام <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>شماره تماس <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>موضوع <span class="an-sort">&#9650;&#9660;</span></th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($getCategory) {
                foreach ($getCategory as $key => $getcategory) {
                    ?>
                    <tr>
                        <td data-rank="1"><?php echo $key + 1 ?></td>
                        <td><span class="an-cell-title"><?php echo $getcategory['name'] ?? '-----' ?></span></td>
                        <td dir="ltr" style="text-align:right"><?php echo $getcategory['mobile'] ?? '-----' ?></td>
                        <td><?php echo $getcategory['Issue'] ?? '-----' ?></td>
                        <td>
                            <div class="an-actions">
                                <a class="an-iconbtn is-edit" href="manage_single_massege2.php?massege_id=<?php echo $getcategory['id'] ?>" title="مشاهده جزئیات">
                                    <svg class="an-ic"><use href="#an-i-eye"></use></svg>
                                </a>
                                <a class="an-iconbtn is-trash" href="?action=delete_massage2&id=<?php echo $getcategory['id'] ?>" title="حذف پیام">
                                    <svg class="an-ic"><use href="#an-i-trash"></use></svg>
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
