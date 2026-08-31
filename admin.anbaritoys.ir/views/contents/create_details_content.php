<?php
$anProduct = selectproduct($_GET['product_id']);
$selectBatteryForProducts = selectBatteryForProduct();
$selectMemoryForProducts = selectMemoryForProduct();
$selectRamForProducts = selectRamForProduct();
$selectGuaranteeForProducts = selectGuaranteeForProduct();
$selectPackForProducts = selectPackForProduct();
?>
<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-sliders"></use></svg>
                افزودن جزییات محصول
            </h3>
            <div class="an-card-sub">کد محصول: <b dir="ltr"><?php echo $anProduct['tracking_code'] ?></b></div>
        </div>
        <a class="an-btn an-btn-ghost an-btn-sm" href="manage_products_variety.php">
            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-chevron"></use></svg>
            بازگشت به تنوع محصولات
        </a>
    </div>
    <div class="an-card-body">
        <?php echo initFormErrors() ?>
        <form method="post" novalidate>
            <input type="hidden" name="action" value="create_product_details">
            <input type="hidden" name="product_id" value="<?php echo $_GET['product_id'] ?>">
            <div class="an-form-grid">
                <div class="an-field">
                    <label>وزن</label>
                    <input type="text" class="an-input" name="Weight" placeholder="مثلاً 500 گرم" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>فناوری صفحه‌نمایش</label>
                    <input type="text" class="an-input" name="Screen_technology" placeholder="مثلاً LCD">
                </div>
                <div class="an-field">
                    <label>سایز</label>
                    <input type="text" class="an-input" name="Size" placeholder="سایز" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>رزولوشن عکس</label>
                    <input type="text" class="an-input" name="Photo_resolution" placeholder="رزولوشن دوربین" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>نسخه سیستم‌عامل</label>
                    <input type="text" class="an-input" name="Os_version" placeholder="نسخه سیستم‌عامل" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>تعداد سیم‌کارت</label>
                    <input type="text" class="an-input" name="sim_card" placeholder="تعداد سیم‌کارت" dir="ltr" style="text-align:right">
                </div>
                <div class="an-field">
                    <label>باتری</label>
                    <select class="an-select" name="battery_id">
                        <option value="">انتخاب کنید…</option>
                        <?php
                        if ($selectBatteryForProducts) {
                            foreach ($selectBatteryForProducts as $anBattery) {
                                ?>
                                <option value="<?php echo $anBattery['id'] ?>"><?php echo $anBattery['title'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="an-field">
                    <label>حافظه</label>
                    <select class="an-select" name="memory_id">
                        <option value="">انتخاب کنید…</option>
                        <?php
                        if ($selectMemoryForProducts) {
                            foreach ($selectMemoryForProducts as $anMemory) {
                                ?>
                                <option value="<?php echo $anMemory['id'] ?>"><?php echo $anMemory['title'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="an-field">
                    <label>رم</label>
                    <select class="an-select" name="ram_id">
                        <option value="">انتخاب کنید…</option>
                        <?php
                        if ($selectRamForProducts) {
                            foreach ($selectRamForProducts as $anRam) {
                                ?>
                                <option value="<?php echo $anRam['id'] ?>"><?php echo $anRam['title'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="an-field">
                    <label>گارانتی</label>
                    <select class="an-select" name="guarantee_id">
                        <option value="">انتخاب کنید…</option>
                        <?php
                        if ($selectGuaranteeForProducts) {
                            foreach ($selectGuaranteeForProducts as $anGuarantee) {
                                ?>
                                <option value="<?php echo $anGuarantee['id'] ?>"><?php echo $anGuarantee['title'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="an-field">
                    <label>پک (نسخه)</label>
                    <select class="an-select" name="pack_id">
                        <option value="">انتخاب کنید…</option>
                        <?php
                        if ($selectPackForProducts) {
                            foreach ($selectPackForProducts as $anPack) {
                                ?>
                                <option value="<?php echo $anPack['id'] ?>"><?php echo $anPack['title'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="an-form-actions" style="margin-top:22px">
                <button type="submit" class="an-btn an-btn-primary">
                    <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-check"></use></svg>
                    ثبت جزییات
                </button>
                <a class="an-btn an-btn-ghost" href="manage_products_variety.php">انصراف</a>
            </div>
        </form>
    </div>
</div>
