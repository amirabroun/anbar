<?php
$getProduct = selectProductTBL();
// برچسب فارسی + رنگ بج برای هر وضعیت (در JS هم همین نگاشت استفاده می‌شود)
$anbarStatusMeta = [
    'active'       => ['فعال', 'success'],
    'inactive'     => ['غیر فعال', 'danger'],
    'unavialable'  => ['ناموجود', 'warning'],
    'stop_selling' => ['توقف فروش', 'warning'],
];
$anbarSuggestedMeta = [
    'yes' => ['پیشنهادی', 'success'],
    'no'  => ['عادی', 'muted'],
];
?>
<div class="an-card">
    <div class="an-toolbar">
        <div class="an-search">
            <svg class="an-ic"><use href="#an-i-search"></use></svg>
            <input type="text" placeholder="جستجو در نام، کد یا برند…">
        </div>
        <span class="an-count"></span>
        <a class="an-btn an-btn-primary an-btn-sm" href="create_products.php" style="margin-right:14px">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-plus"></use></svg>
            افزودن محصول
        </a>
    </div>
    <div class="an-table-wrap">
        <table class="an-table" data-an-table data-an-page-size="10">
            <thead>
            <tr>
                <th data-sortable data-rank># <span class="an-sort">▲▼</span></th>
                <th>عکس</th>
                <th data-sortable>کد محصول <span class="an-sort">▲▼</span></th>
                <th data-sortable>نام کالا <span class="an-sort">▲▼</span></th>
                <th data-sortable>قیمت <span class="an-sort">▲▼</span></th>
                <th data-sortable>تخفیف <span class="an-sort">▲▼</span></th>
                <th data-sortable>موجودی <span class="an-sort">▲▼</span></th>
                <th>وضعیت</th>
                <th>کالای پیشنهادی</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($getProduct) {
                foreach ($getProduct as $key => $getproduct) {
                    $productId = (int)$getproduct['id'];
                    $productStatus = $getproduct['status'];
                    $productSuggested = $getproduct['Suggested'];
                    [$statusText, $statusColor] = $anbarStatusMeta[$productStatus] ?? ['نامشخص', 'muted'];
                    [$suggestedText, $suggestedColor] = $anbarSuggestedMeta[$productSuggested] ?? ['نامشخص', 'muted'];
                    // مسیر عکس بندانگشتی (لوکال: /photos/... — cPanel: http://photos.anbaritoys.ir/...)
                    $thumbUrl = null;
                    if (!empty($getproduct['photo_path'])) {
                        $thumbUrl = normalizedPath(DOMAIN['public'], $getproduct['photo_path']);
                        if ($thumbUrl[0] !== '/' && strpos($thumbUrl, 'http') !== 0) {
                            $thumbUrl = '/' . $thumbUrl;
                        }
                    }
                    $hasDiscount = !empty($getproduct['price_discounted']) && (int)$getproduct['price_discounted'] > 0;
                    $stock = (int)$getproduct['stock'];
                    ?>
                    <tr>
                        <td data-rank="1"><?php echo $key + 1 ?></td>
                        <td>
                            <?php if ($thumbUrl) { ?>
                                <img src="<?php echo $thumbUrl ?>" alt="<?php echo htmlspecialchars($getproduct['title']) ?>" class="an-thumb" onerror="this.onerror=null;this.src='assets/media/logos/favicon.ico';this.style.opacity='.35'">
                            <?php } else { ?>
                                <span class="an-thumb-ph"><svg class="an-ic" style="width:18px;height:18px"><use href="#an-i-image"></use></svg></span>
                            <?php } ?>
                        </td>
                        <td><span class="an-code"><?php echo $getproduct['tracking_code'] ?></span></td>
                        <td style="min-width:190px">
                            <span class="an-cell-title"><?php echo $getproduct['title'] ?></span>
                            <span class="an-cell-sub"><?php echo $getproduct['brand_title'] ?? 'بدون برند' ?></span>
                        </td>
                        <td class="an-cell-num" data-sort="<?php echo (int)$getproduct['price'] ?>"><?php echo number_format((int)$getproduct['price']) ?> <small>تومان</small></td>
                        <td class="an-cell-num" data-sort="<?php echo (int)$getproduct['price_discounted'] ?>">
                            <?php if ($hasDiscount) { ?>
                                <?php echo number_format((int)$getproduct['price_discounted']) ?> <small>تومان</small>
                            <?php } else { ?>
                                <span style="color:var(--an-faint)">—</span>
                            <?php } ?>
                        </td>
                        <td data-sort="<?php echo $stock ?>">
                            <?php if ($stock <= 0) { ?>
                                <span class="an-badge is-danger"><span class="an-dot"></span>ناموجود</span>
                            <?php } elseif ($stock < 5) { ?>
                                <span class="an-badge is-warning"><span class="an-dot"></span><?php echo $stock ?> عدد</span>
                            <?php } else { ?>
                                <span class="an-badge is-success"><span class="an-dot"></span><?php echo $stock ?> عدد</span>
                            <?php } ?>
                        </td>
                        <td id="status<?php echo $productId ?>" data-status="<?php echo $productStatus ?>">
                            <button type="button" class="an-badge is-<?php echo $statusColor ?>"
                                    onclick="AN.toggleProductStatus(<?php echo $productId ?>)"
                                    title="برای تغییر وضعیت کلیک کنید">
                                <span class="an-dot"></span><?php echo $statusText ?>
                            </button>
                        </td>
                        <td id="Suggested<?php echo $productId ?>" data-suggested="<?php echo $productSuggested ?>">
                            <button type="button" class="an-badge is-<?php echo $suggestedColor ?>"
                                    onclick="AN.toggleProductSuggested(<?php echo $productId ?>)"
                                    title="برای تغییر کالای پیشنهادی کلیک کنید">
                                <svg class="an-ic" style="width:12px;height:12px;stroke-width:2.2"><use href="#an-i-star"></use></svg>
                                <?php echo $suggestedText ?>
                            </button>
                        </td>
                        <td>
                            <div class="an-actions">
                                <a class="an-iconbtn is-edit" href="update_products.php?products_id=<?php echo $productId ?>" title="ویرایش محصول">
                                    <svg class="an-ic"><use href="#an-i-edit"></use></svg>
                                </a>
                                <a class="an-iconbtn is-bolt" href="#" onclick="AN.toggleProductStatus(<?php echo $productId ?>);return false;" title="فعال / غیرفعال">
                                    <svg class="an-ic"><use href="#an-i-bolt"></use></svg>
                                </a>
                                <a class="an-iconbtn is-star" href="#" onclick="AN.toggleProductSuggested(<?php echo $productId ?>);return false;" title="کالای پیشنهادی">
                                    <svg class="an-ic"><use href="#an-i-star"></use></svg>
                                </a>
                                <a class="an-iconbtn is-image" href="manage_products_photos.php?product_id=<?php echo $productId ?>" title="مدیریت عکس‌ها">
                                    <svg class="an-ic"><use href="#an-i-image"></use></svg>
                                </a>
                                <a class="an-iconbtn is-tags" href="manage_products_category.php?product_id=<?php echo $productId ?>" title="دسته‌بندی محصول">
                                    <svg class="an-ic"><use href="#an-i-layers"></use></svg>
                                </a>
                                <button type="button" class="an-iconbtn is-trash" onclick="AN.deleteProduct(<?php echo $productId ?>, this)" title="حذف محصول">
                                    <svg class="an-ic"><use href="#an-i-trash"></use></svg>
                                </button>
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
