<?php
$getPaper = getPerper();
?>
<div class="an-card">
    <div class="an-toolbar">
        <div class="an-search">
            <svg class="an-ic"><use href="#an-i-search"></use></svg>
            <input type="text" placeholder="جستجو در عنوان مقاله…">
        </div>
        <span class="an-count"></span>
        <a class="an-btn an-btn-primary an-btn-sm" href="createArticles.php" style="margin-right:14px">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-plus"></use></svg>
            افزودن مقاله
        </a>
    </div>
    <div class="an-table-wrap">
        <table class="an-table" data-an-table data-an-page-size="10">
            <thead>
            <tr>
                <th data-sortable data-rank>ردیف <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>عنوان <span class="an-sort">&#9650;&#9660;</span></th>
                <th>وضعیت</th>
                <th>آخرین بروزرسانی</th>
                <th>ایجاد شده</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($getPaper) {
                foreach ($getPaper as $key => $prepre) {
                    $blogId = (int)$prepre['id'];
                    $isActive = $prepre['status'] === 'active';
                    ?>
                    <tr>
                        <td data-rank="1"><?php echo $key + 1 ?></td>
                        <td><span class="an-cell-title"><?php echo $prepre['title'] ?></span></td>
                        <td>
                            <span class="an-badge is-<?php echo $prepre['status'] === 'active' ? 'success' : 'muted' ?>"><span class="an-dot"></span><?php echo $prepre['status'] === 'active' ? 'فعال' : 'غیرفعال' ?></span>
                        </td>
                        <td><?php echo $prepre['createAt'] ?></td>
                        <td><?php echo $prepre['Created'] ?></td>
                        <td>
                            <div class="an-actions">
                                <a class="an-iconbtn is-edit" href="update_blog.php?blog_id=<?php echo $blogId ?>" title="ویرایش مقاله">
                                    <svg class="an-ic"><use href="#an-i-edit"></use></svg>
                                </a>
                                <a class="an-iconbtn is-bolt" href="?action=change_status_blog&category_id=<?php echo $blogId ?>&old_status=<?php echo $prepre['status'] ?>" title="فعال / غیرفعال">
                                    <svg class="an-ic"><use href="#an-i-bolt"></use></svg>
                                </a>
                                <a class="an-iconbtn is-image" href="update_photo_blog.php?blog_id=<?php echo $blogId ?>" title="عکس مقاله">
                                    <svg class="an-ic"><use href="#an-i-image"></use></svg>
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
