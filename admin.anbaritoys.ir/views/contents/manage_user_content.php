<?php $getCategory = selectuserTBL(); ?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-users"></use></svg>
                کاربران
            </h3>
            <div class="an-card-sub">مدیریت دسترسی کاربران فروشگاه — کاربر بلاک‌شده امکان ورود ندارد</div>
        </div>
        <div class="an-toolbar">
            <label class="an-search">
                <svg class="an-ic"><use href="#an-i-search"></use></svg>
                <input type="search" placeholder="جستجوی نام / کد ملی / موبایل…">
            </label>
            <span class="an-count"></span>
        </div>
    </div>
    <div class="an-card-body">
        <div class="an-table-wrap">
            <table class="an-table" data-an-table data-an-page-size="15">
                <thead>
                <tr>
                    <th data-sortable data-rank>#</th>
                    <th data-sortable>نام</th>
                    <th data-sortable>نام خانوادگی</th>
                    <th data-sortable>کد ملی</th>
                    <th data-sortable>تلفن</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($getCategory) {
                    foreach ($getCategory as $key => $getcategory) {
                        $anBlocked = $getcategory['status'] !== 'active';
                        ?>
                        <tr>
                            <td data-rank data-sort="<?php echo $key + 1 ?>"><?php echo $key + 1 ?></td>
                            <td class="an-cell-title"><?php echo $getcategory['first_name'] ?? '—' ?></td>
                            <td><?php echo $getcategory['last_name'] ?? '—' ?></td>
                            <td dir="ltr" style="text-align:right"><?php echo $getcategory['national_code'] ?? '—' ?></td>
                            <td dir="ltr" style="text-align:right"><?php echo $getcategory['mobile'] ?? '—' ?></td>
                            <td nowrap>
                                <?php if (!$anBlocked) { ?>
                                    <a class="an-iconbtn is-plain" title="فعال — کلیک برای بلاک کردن"
                                       href="?action=change_status_user&amp;user_id=<?php echo $getcategory['id'] ?>&amp;old_status=<?php echo $getcategory['status'] ?>">
                                        <svg class="an-ic"><use href="#an-i-unlock"></use></svg>
                                    </a>
                                <?php } else { ?>
                                    <a class="an-iconbtn is-trash" title="بلاک‌شده — کلیک برای رفع بلاک"
                                       href="?action=change_status_user2&amp;user_id=<?php echo $getcategory['id'] ?>&amp;old_status=<?php echo $getcategory['status'] ?>">
                                        <svg class="an-ic"><use href="#an-i-lock"></use></svg>
                                    </a>
                                <?php } ?>
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
            <svg class="an-ic" style="width:30px;height:30px"><use href="#an-i-users"></use></svg>
            <p>کاربری با این مشخصات پیدا نشد.</p>
        </div>
        <div class="an-pager"></div>
    </div>
</div>
