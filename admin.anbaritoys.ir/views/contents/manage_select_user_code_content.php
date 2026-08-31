<?php
$getUsers = selectuserTBL();
$anCodeId = (int)$_GET['category_id'];
?>
<div class="an-card">
    <div class="an-toolbar">
        <div class="an-search">
            <svg class="an-ic"><use href="#an-i-search"></use></svg>
            <input type="text" placeholder="جستجو در نام، کد ملی یا تلفن…">
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
                <th data-sortable>نام <span class="an-sort">&#9650;&#9660;</span></th>
                <th data-sortable>نام خانوادگی <span class="an-sort">&#9650;&#9660;</span></th>
                <th>کد ملی</th>
                <th>تلفن</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($getUsers) {
                foreach ($getUsers as $key => $getuser) {
                    $userId = (int)$getuser['id'];
                    $hasCode = selectcheckinusercode($anCodeId, $userId);
                    ?>
                    <tr>
                        <td data-rank="1"><?php echo $key + 1 ?></td>
                        <td><?php echo $getuser['first_name'] ?? '-----' ?></td>
                        <td><?php echo $getuser['last_name'] ?? '-----' ?></td>
                        <td dir="ltr" style="text-align:right"><?php echo $getuser['national_code'] ?? '-----' ?></td>
                        <td dir="ltr" style="text-align:right"><?php echo $getuser['mobile'] ?? '-----' ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="change_user_dic_code_on_mmm" value="<?php echo $anCodeId ?>">
                                <?php if ($hasCode) { ?>
                                    <button name="id" value="<?php echo $userId ?>" class="an-btn an-btn-ghost an-btn-sm" title="برداشتن کد از این کاربر">برداشتن کد</button>
                                <?php } else { ?>
                                    <button name="id" value="<?php echo $userId ?>" class="an-btn an-btn-primary an-btn-sm">انتخاب کاربر</button>
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
