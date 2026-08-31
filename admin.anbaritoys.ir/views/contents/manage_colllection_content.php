<?php
$getCollection = selectCollectionTBL();
?>
<div class="an-card">
    <div class="an-toolbar">
        <div class="an-search">
            <svg class="an-ic"><use href="#an-i-search"></use></svg>
            <input type="text" placeholder="جستجو در مجموعه‌ها…">
        </div>
        <span class="an-count"></span>
        <a class="an-btn an-btn-primary an-btn-sm" href="create_collection.php" style="margin-right:14px">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-plus"></use></svg>
            افزودن مجموعه
        </a>
    </div>
    <div class="an-table-wrap">
        <table class="an-table" data-an-table data-an-page-size="10">
            <thead>
            <tr>
                <th data-sortable data-rank># <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>عنوان <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>عنوان لاتین <span class="an-sort">&#9650;&#9660;</span></th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($getCollection) {
                foreach ($getCollection as $key => $getcollection) {
                    $collectionId = (int)$getcollection['id'];
                    $isActive = $getcollection['status'] === 'active';
                    ?>
                    <tr>
                        <td data-rank="1"><?php echo $key + 1 ?></td>
                        <td><span class="an-cell-title"><?php echo $getcollection['title'] ?></span></td>
                        <td><span class="an-cell-sub" dir="ltr" style="text-align:right"><?php echo $getcollection['english_title'] ?></span></td>
                        <td>
                            <span class="an-badge is-<?php echo $isActive ? 'success' : 'muted' ?>"><span class="an-dot"></span><?php echo $isActive ? 'فعال' : 'غیرفعال' ?></span>
                        </td>
                        <td>
                            <div class="an-actions">
                                <a class="an-iconbtn is-edit" href="update_collection.php?collection_id=<?php echo $collectionId ?>" title="ویرایش مجموعه">
                                    <svg class="an-ic"><use href="#an-i-edit"></use></svg>
                                </a>
                                <a class="an-iconbtn is-bolt" href="?action=change_status_collection&category_id=<?php echo $collectionId ?>&old_status=<?php echo $getcollection['status'] ?>" title="فعال / غیرفعال">
                                    <svg class="an-ic"><use href="#an-i-bolt"></use></svg>
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
