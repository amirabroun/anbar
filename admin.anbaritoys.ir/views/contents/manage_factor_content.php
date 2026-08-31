<?php
$selectOrdersByUserId = selectOrdersByUserIdd();
$anFctor2Meta = [
    'success' => ['پرداخت موفق', 'success'],
    'failed'  => ['پرداخت ناموفق', 'danger'],
];
$anFctorMeta = [
    'active'   => ['مشاهده شده', 'info'],
    'inactive' => ['مشاهده نشده', 'muted'],
];
?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-cart"></use></svg>
                فاکتورها
            </h3>
            <div class="an-card-sub">لیست سفارش‌های ثبت‌شده در فروشگاه</div>
        </div>
        <div class="an-toolbar">
            <label class="an-search">
                <svg class="an-ic"><use href="#an-i-search"></use></svg>
                <input type="search" placeholder="جستجو در سفارش‌ها…">
            </label>
            <span class="an-count"></span>
        </div>
    </div>
    <div class="an-card-body">
        <div class="an-table-wrap">
            <table class="an-table" data-an-table data-an-page-size="12">
                <thead>
                <tr>
                    <th data-sortable data-rank>#</th>
                    <th data-sortable>شماره سفارش</th>
                    <th data-sortable>سفارش‌دهنده</th>
                    <th data-sortable>تاریخ ثبت</th>
                    <th data-sortable>مبلغ کل</th>
                    <th data-sortable>مبلغ قابل پرداخت</th>
                    <th data-sortable>وضعیت پرداخت</th>
                    <th data-sortable>رسیدگی</th>
                    <th>جزئیات</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($selectOrdersByUserId) {
                    foreach ($selectOrdersByUserId as $key => $order) {
                        $anUser = getUserById($order['user_id']);
                        $anF2 = $anFctor2Meta[$order['status']] ?? ['نامشخص', 'muted'];
                        $anF1 = $anFctorMeta[$order['status_admin']] ?? ['نامشخص', 'muted'];
                        ?>
                        <tr>
                            <td data-rank data-sort="<?php echo $key + 1 ?>"><?php echo $key + 1 ?></td>
                            <td><span class="an-code" dir="ltr"><?php echo $order['tracking_code'] ?></span></td>
                            <td dir="ltr" style="text-align:right"><?php echo $anUser ? $anUser['mobile'] : '—' ?></td>
                            <td data-sort="<?php echo strtotime($order['create_at']) ?>"><?php echo $order['create_at'] ?></td>
                            <td class="an-cell-num" data-sort="<?php echo (int)$order['total_amount'] ?>"><?php echo number_format((int)$order['total_amount']) ?></td>
                            <td class="an-cell-num" data-sort="<?php echo (int)$order['amount_payable'] ?>"><?php echo number_format((int)$order['amount_payable']) ?></td>
                            <td>
                                <span class="an-badge is-<?php echo $anF2[1] ?>"><span class="an-dot"></span><?php echo $anF2[0] ?></span>
                            </td>
                            <td>
                                <span class="an-badge is-<?php echo $anF1[1] ?>"><span class="an-dot"></span><?php echo $anF1[0] ?></span>
                            </td>
                            <td nowrap>
                                <div class="an-actions">
                                    <?php if ($order['status'] === 'success') { ?>
                                        <a class="an-iconbtn is-plain" target="_blank" href="manage_single_factor.php?id=<?php echo $order['id'] ?>" title="مشاهده جزئیات فاکتور">
                                            <svg class="an-ic"><use href="#an-i-external"></use></svg>
                                        </a>
                                    <?php } else { ?>
                                        <span class="an-badge is-muted" title="خرید لغو شده است">لغو شده</span>
                                    <?php } ?>
                                    <?php if ($order['status_admin'] === 'active') { ?>
                                        <a class="an-iconbtn is-bolt" href="?action=change_status_factor&amp;factor_id=<?php echo $order['id'] ?>&amp;old_status=<?php echo $order['status_admin'] ?>" title="علامت‌گذاری به‌عنوان مشاهده‌نشده">
                                            <svg class="an-ic"><use href="#an-i-bolt"></use></svg>
                                        </a>
                                    <?php } else { ?>
                                        <a class="an-iconbtn" href="?action=change_status_factor&amp;factor_id=<?php echo $order['id'] ?>&amp;old_status=<?php echo $order['status_admin'] ?>" title="علامت‌گذاری به‌عنوان مشاهده‌شده">
                                            <svg class="an-ic"><use href="#an-i-bolt"></use></svg>
                                        </a>
                                    <?php } ?>
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
            <svg class="an-ic" style="width:30px;height:30px"><use href="#an-i-cart"></use></svg>
            <p>سفارشی با این مشخصات پیدا نشد.</p>
        </div>
        <div class="an-pager"></div>
    </div>
</div>
