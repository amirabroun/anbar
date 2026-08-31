<div class="an-card">
    <div class="an-toolbar">
        <div class="an-search">
            <svg class="an-ic"><use href="#an-i-search"></use></svg>
            <input type="text" placeholder="جستجو…">
        </div>
        <span class="an-count"></span>
        <a class="an-btn an-btn-primary an-btn-sm" href="create_guarantee.php" style="margin-right:14px">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-plus"></use></svg>
            افزودن
        </a>
    </div>
    <div class="an-table-wrap">
        <table class="an-table" data-an-table data-an-page-size="10">
            <thead>
            <tr>
                <th data-sortable data-rank># <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>عنوان <span class="an-sort">&#9650;&#9660;</span></th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $getguarantee = selectguaranteeTBL();
            if ($getguarantee) {
                foreach ($getguarantee as $key => $getguarantee_item) {
                    $isActive = $getguarantee_item['status'] === 'active';
                    ?>
                    <tr>
                        <td data-rank="1"><?php echo $key + 1 ?></td>
                        <td><span class="an-cell-title"><?php echo $getguarantee_item['title'] ?></span></td>
                        <td>
                            <span class="an-badge is-<?php echo $isActive ? 'success' : 'muted' ?>"><span class="an-dot"></span><?php echo $isActive ? 'فعال' : 'غیرفعال' ?></span>
                        </td>
                        <td>
                            <div class="an-actions">
                                <a class="an-iconbtn is-bolt" href="?action=change_status_guarantee&guarantee_id=<?php echo $getguarantee_item['id'] ?>&old_status_guarantee=<?php echo $getguarantee_item['status'] ?>" title="فعال / غیرفعال">
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
