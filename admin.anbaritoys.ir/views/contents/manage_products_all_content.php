<?php
$getAllProduct = selectallproducts();
?>
<div class="an-card">
    <div class="an-toolbar">
        <div class="an-search">
            <svg class="an-ic"><use href="#an-i-search"></use></svg>
            <input type="text" placeholder="جستجو در کد، نام یا رنگ…">
        </div>
        <span class="an-count"></span>
    </div>
    <div class="an-table-wrap">
        <table class="an-table" data-an-table data-an-page-size="10">
            <thead>
            <tr>
                <th data-sortable data-rank># <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>کد محصول <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>نام کالا <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>قیمت <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>قیمت با تخفیف <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>موجودی <span class="an-sort">&#9650;&#9660;</span></th>
                <th>رنگ</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($getAllProduct) {
                foreach ($getAllProduct as $key => $anProduct) {
                    $varietyId = (int)$anProduct['id'];
                    ?>
                    <tr>
                        <td data-rank="1"><?php echo $key + 1 ?></td>
                        <td><span class="an-badge is-muted" dir="ltr" style="text-align:right"><?php echo $anProduct['tracking_code'] ?></span></td>
                        <td><span class="an-cell-title"><?php echo $anProduct['full_title'] ?></span></td>
                        <td dir="ltr" style="text-align:right"><?php echo $anProduct['price'] ?></td>
                        <td dir="ltr" style="text-align:right"><?php echo $anProduct['price_discounted'] ?></td>
                        <td dir="ltr" style="text-align:right"><?php echo $anProduct['stock'] ?></td>
                        <td><?php echo $anProduct['color_title'] ?></td>
                        <td>
                            <div class="an-actions">
                                <a class="an-iconbtn is-edit" href="update_products_variety.php?product_variety_id=<?php echo $varietyId ?>" title="ویرایش تنوع">
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
