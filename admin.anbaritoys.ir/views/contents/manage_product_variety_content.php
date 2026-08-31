<?php
$getProduct = selectProductsTBL();
?>
<div class="an-card">
    <div class="an-toolbar">
        <div class="an-search">
            <svg class="an-ic"><use href="#an-i-search"></use></svg>
            <input type="text" placeholder="جستجو در کد یا نام محصول…">
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
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($getProduct) {
                foreach ($getProduct as $key => $getproduct) {
                    $productId = (int)$getproduct['product_id'];
                    ?>
                    <tr>
                        <td data-rank="1"><?php echo $key + 1 ?></td>
                        <td><span class="an-badge is-muted" dir="ltr" style="text-align:right"><?php echo $getproduct['tracking_code'] ?></span></td>
                        <td><span class="an-cell-title"><?php echo $getproduct['full_product_persian'] ?></span></td>
                        <td>
                            <div class="an-actions">
                                <a class="an-iconbtn is-plus" href="create_product_variety.php?products_id=<?php echo $productId ?>" title="افزودن تنوع">
                                    <svg class="an-ic"><use href="#an-i-plus"></use></svg>
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
