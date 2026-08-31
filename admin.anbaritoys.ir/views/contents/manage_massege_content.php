<?php
$getCategory = selectCategoryTBLquestion();
?>
<div class="an-card">
    <div class="an-toolbar">
        <div class="an-search">
            <svg class="an-ic"><use href="#an-i-search"></use></svg>
            <input type="text" placeholder="جستجو در نام کاربر…">
        </div>
        <span class="an-count"></span>
    </div>
    <div class="an-table-wrap">
        <table class="an-table" data-an-table data-an-page-size="10">
            <thead>
            <tr>
                <th data-sortable data-rank># <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>نام کاربر <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>شماره تماس <span class="an-sort">&#9650;&#9660;</span></th>
                <th>وضعیت</th>
                <th data-sortable>کد کالا <span class="an-sort">&#9650;&#9660;</span></th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($getCategory) {
                foreach ($getCategory as $key => $getcategory) {
                    $anUser = selectmobileuser($getcategory['user_id'] ?? null);
                    $anStatus = $getcategory['status'] ?? '';
                    ?>
                    <tr>
                        <td data-rank="1"><?php echo $key + 1 ?></td>
                        <td><span class="an-cell-title"><?php echo $getcategory['name'] ?? '-----' ?></span></td>
                        <td dir="ltr" style="text-align:right"><?php echo $anUser['mobile'] ?? '-----' ?></td>
                        <td>
                            <?php if ($anStatus === 'active') { ?>
                                <span class="an-badge is-success"><span class="an-dot"></span>تایید شده</span>
                            <?php } else { ?>
                                <span class="an-badge is-muted"><span class="an-dot"></span><?php echo $anStatus === 'inactive' ? 'تایید نشده' : 'نامشخص' ?></span>
                            <?php } ?>
                        </td>
                        <td><span class="an-code"><?php echo $getcategory['teack_product'] ?? '-----' ?></span></td>
                        <td>
                            <div class="an-actions">
                                <a class="an-iconbtn is-edit" href="manage_single_massege.php?massege_id=<?php echo $getcategory['id'] ?>" title="مشاهده و پاسخ">
                                    <svg class="an-ic"><use href="#an-i-eye"></use></svg>
                                </a>
                                <a class="an-iconbtn is-bolt" href="?action=change_status_massage&massage_id=<?php echo $getcategory['id'] ?>&old_status=<?php echo $anStatus ?>" title="تایید / عدم تایید">
                                    <svg class="an-ic"><use href="#an-i-bolt"></use></svg>
                                </a>
                                <a class="an-iconbtn is-trash" href="?action=delete_massage&id=<?php echo $getcategory['id'] ?>" title="حذف سوال">
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
