<?php
$getCategory = selectAbout_usTBLll();
?>
<div class="an-card">
    <div class="an-toolbar">
        <div class="an-search">
            <svg class="an-ic"><use href="#an-i-search"></use></svg>
            <input type="text" placeholder="جستجو در متن…">
        </div>
        <span class="an-count"></span>
    </div>
    <div class="an-table-wrap">
        <table class="an-table" data-an-table data-an-page-size="10">
            <thead>
            <tr>
                <th data-sortable data-rank># <span class="an-sort">&#9650;&#9660;</span></th>
                <th>متن</th>
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
                        <td><?php echo strip_tags($getcategory['text']) ?></td>
                        <td>
                            <div class="an-actions">
                                <a class="an-iconbtn is-edit" href="update_about_us.php?id=<?php echo $getcategory['id'] ?>" title="ویرایش متن">
                                    <svg class="an-ic"><use href="#an-i-edit"></use></svg>
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
