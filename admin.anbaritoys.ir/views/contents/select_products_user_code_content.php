<?php
$getProduct = selectProductTBL();
$anCodeId = (int)$_GET['category_id'];
?>
<div class="an-card">
    <div class="an-toolbar">
        <div class="an-search">
            <svg class="an-ic"><use href="#an-i-search"></use></svg>
            <input type="text" placeholder="جستجو در کد یا نام کالا…">
        </div>
        <span class="an-count"></span>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_discount_code_user.php" style="margin-right:14px">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت
        </a>
    </div>
    <div class="an-table-wrap">
        <table class="an-table" data-an-table data-an-page-size="10">
            <thead>
            <tr>
                <th data-sortable data-rank># <span class="an-sort">&#9650;&#9660;</span></th>
                <th>کد محصول</th>
                <th data-sortable>نام کالا <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>قیمت <span class="an-sort">&#9650;&#9660;</span></th>
                <th>موجودی</th>
                <th>برند</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($getProduct) {
                foreach ($getProduct as $key => $getproduct) {
                    $getBrand = selectbrand($getproduct['brand_id']);
                    ?>
                    <tr>
                        <td data-rank="1"><?php echo $key + 1 ?></td>
                        <td><span class="an-badge is-muted" dir="ltr" style="text-align:right"><?php echo $getproduct['tracking_code'] ?></span></td>
                        <td><span class="an-cell-title"><?php echo $getproduct['title'] ?></span></td>
                        <td dir="ltr" style="text-align:right"><?php echo $getproduct['price'] ?></td>
                        <td dir="ltr" style="text-align:right"><?php echo $getproduct['stock'] ?></td>
                        <td><?php echo $getBrand['title'] ?? '-----' ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="change_product_dic_code_on_mmm" value="<?php echo $anCodeId ?>">
                                <?php if (selectcheckinPRODUCTcode($anCodeId, (int)$getproduct['id'])) { ?>
                                    <button name="id" value="<?php echo $getproduct['id'] ?>" class="an-btn an-btn-ghost an-btn-sm">برداشتن کد</button>
                                <?php } else { ?>
                                    <button name="id" value="<?php echo $getproduct['id'] ?>" class="an-btn an-btn-primary an-btn-sm">انتخاب کالا</button>
                                <?php } ?>
                            </form>
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
