<?php
/* داشبورد — کارت آمار + آخرین سفارش‌ها + میان‌برها */
$anProducts = dashProductsStats();
$anOrders   = dashOrdersStats();
$anUsers    = dashUsersStats();
$anPending  = dashPendingCounts();
$anLatest   = dashLatestOrders(8);
$anFctor2Meta = ['success' => ['پرداخت موفق', 'success'], 'failed' => ['پرداخت ناموفق', 'danger']];
$anFctorMeta  = ['active' => ['مشاهده شده', 'info'], 'inactive' => ['مشاهده نشده', 'muted']];
?>
<div class="an-stats">
    <div class="an-stat">
        <span class="an-stat-ic is-primary"><svg class="an-ic"><use href="#an-i-box"></use></svg></span>
        <div class="an-stat-meta">
            <div class="an-stat-value"><?php echo number_format($anProducts['total']) ?></div>
            <div class="an-stat-label">محصول ثبت‌شده</div>
            <div class="an-stat-sub"><?php echo number_format($anProducts['active']) ?> فعال · <?php echo number_format($anProducts['unavailable']) ?> ناموجود</div>
        </div>
    </div>
    <div class="an-stat">
        <span class="an-stat-ic is-amber"><svg class="an-ic"><use href="#an-i-cart"></use></svg></span>
        <div class="an-stat-meta">
            <div class="an-stat-value"><?php echo number_format($anOrders['total']) ?></div>
            <div class="an-stat-label">سفارش</div>
            <div class="an-stat-sub"><?php echo number_format($anOrders['success']) ?> موفق · <?php echo number_format($anOrders['today']) ?> امروز</div>
        </div>
    </div>
    <div class="an-stat">
        <span class="an-stat-ic is-info"><svg class="an-ic"><use href="#an-i-users"></use></svg></span>
        <div class="an-stat-meta">
            <div class="an-stat-value"><?php echo number_format($anUsers['total']) ?></div>
            <div class="an-stat-label">کاربر</div>
            <div class="an-stat-sub"><?php echo number_format($anUsers['blocked']) ?> مسدود</div>
        </div>
    </div>
    <div class="an-stat">
        <span class="an-stat-ic is-success"><svg class="an-ic"><use href="#an-i-message"></use></svg></span>
        <div class="an-stat-meta">
            <div class="an-stat-value"><?php echo number_format($anPending['comments'] + $anPending['questions']) ?></div>
            <div class="an-stat-label">در انتظار بررسی</div>
            <div class="an-stat-sub"><?php echo number_format($anPending['comments']) ?> دیدگاه · <?php echo number_format($anPending['questions']) ?> سوال</div>
        </div>
    </div>
</div>

<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-clock"></use></svg>
                آخرین سفارش‌ها
            </h3>
            <div class="an-card-sub">۸ سفارش اخیر فروشگاه</div>
        </div>
        <a class="an-btn an-btn-soft an-btn-sm" href="manage_factor.php">
            همه سفارش‌ها
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
        </a>
    </div>
    <div class="an-table-wrap">
        <table class="an-table">
            <thead>
            <tr>
                <th>#</th>
                <th>شماره سفارش</th>
                <th>شماره تماس</th>
                <th>تاریخ ثبت</th>
                <th>مبلغ کل</th>
                <th>قابل پرداخت</th>
                <th>پرداخت</th>
                <th>رسیدگی</th>
                <th>جزئیات</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($anLatest) { $anI = 0; foreach ($anLatest as $anOrder) { $anI++; ?>
                <tr>
                    <td><?php echo $anI ?></td>
                    <td><span class="an-code"><?php echo $anOrder['tracking_code'] ?></span></td>
                    <td dir="ltr" style="text-align:right"><?php echo $anOrder['mobile'] ?? '-----' ?></td>
                    <td class="an-cell-sub" style="font-size:12.5px"><?php echo $anOrder['create_at'] ?></td>
                    <td class="an-cell-num"><?php echo number_format((int)$anOrder['total_amount']) ?> <small>تومان</small></td>
                    <td class="an-cell-num"><?php echo number_format((int)$anOrder['amount_payable']) ?> <small>تومان</small></td>
                    <td>
                        <?php [$anT, $anC] = $anFctor2Meta[$anOrder['status']] ?? ['نامشخص', 'muted']; ?>
                        <span class="an-badge is-<?php echo $anC ?>"><span class="an-dot"></span><?php echo $anT ?></span>
                    </td>
                    <td>
                        <?php [$anT2, $anC2] = $anFctorMeta[$anOrder['status_admin']] ?? ['نامشخص', 'muted']; ?>
                        <span class="an-badge is-<?php echo $anC2 ?>"><span class="an-dot"></span><?php echo $anT2 ?></span>
                    </td>
                    <td>
                        <?php if ($anOrder['status'] === 'success') { ?>
                            <a class="an-btn an-btn-ghost an-btn-sm" target="_blank" href="manage_single_factor.php?id=<?php echo $anOrder['id'] ?>">مشاهده</a>
                        <?php } else { ?>
                            <span class="an-badge is-muted">خرید لغو شده</span>
                        <?php } ?>
                    </td>
                </tr>
            <?php } } else { ?>
                <tr><td colspan="9"><div class="an-empty">هنوز سفارشی ثبت نشده است</div></td></tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-bolt"></use></svg>
                میان‌برهای پرکاربرد
            </h3>
        </div>
    </div>
    <div class="an-card-body">
        <div class="an-shortcuts">
            <a class="an-shortcut" href="create_products.php">
                <span class="an-stat-ic is-primary"><svg class="an-ic"><use href="#an-i-package-plus"></use></svg></span>
                افزودن محصول
            </a>
            <a class="an-shortcut" href="manage_products.php">
                <span class="an-stat-ic is-amber"><svg class="an-ic"><use href="#an-i-box"></use></svg></span>
                مدیریت محصولات
            </a>
            <a class="an-shortcut" href="manage_factor.php">
                <span class="an-stat-ic is-info"><svg class="an-ic"><use href="#an-i-cart"></use></svg></span>
                سفارش‌ها
            </a>
            <a class="an-shortcut" href="manage_user.php">
                <span class="an-stat-ic is-success"><svg class="an-ic"><use href="#an-i-users"></use></svg></span>
                کاربران
            </a>
        </div>
    </div>
</div>
