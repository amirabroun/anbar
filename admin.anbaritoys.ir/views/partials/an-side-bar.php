<?php /* پوسته جدید انبار — سایدبار تیره؛ همه لینک‌های پنل (صفحات فاز ۲ با ظاهر قبلی باز می‌شوند) */
$anSide = basename($_SERVER['SCRIPT_NAME']);
$anNav = function (array $items) use ($anSide) {
    foreach ($items as $href => [$label, $icon]) {
        $active = $anSide === basename($href) ? ' is-active' : '';
        echo '<a class="an-side-link' . $active . '" href="' . $href . '">'
            . '<svg class="an-ic"><use href="#an-i-' . $icon . '"></use></svg>'
            . '<span>' . $label . '</span></a>';
    }
};
?>
<aside class="an-side" id="anSide">
    <div class="an-side-brand">
        <span class="an-brand-mark"><svg class="an-ic"><use href="#an-i-box"></use></svg></span>
        <span class="an-brand-text">
            <b>انبار</b>
            <span>پنل مدیریت اسباب‌بازی</span>
        </span>
    </div>
    <nav class="an-side-nav">
        <div class="an-side-group">اصلی</div>
        <?php $anNav(['index.php' => ['داشبورد', 'grid']]); ?>

        <div class="an-side-group">فروشگاه</div>
        <?php $anNav([
            'manage_products.php'    => ['محصولات', 'box'],
            'create_products.php'    => ['افزودن محصول', 'package-plus'],
            'manage_brand.php'       => ['برندها', 'tag'],
            'manage_category.php'    => ['دسته‌بندی‌ها', 'layers'],
            'manage_collection.php'  => ['مجموعه‌ها', 'layers'],
            'banner.php'             => ['بنرها', 'flag'],
        ]); ?>

        <div class="an-side-group">سفارش‌ها</div>
        <?php $anNav(['manage_factor.php' => ['فاکتورها', 'cart']]); ?>

        <div class="an-side-group">کاربران</div>
        <?php $anNav([
            'manage_user.php'     => ['کاربران', 'users'],
            'manage_massege.php'  => ['نظرات', 'message'],
            'manage_comante.php'  => ['دیدگاه‌ها', 'message'],
            'manage_massege2.php' => ['پیام‌ها', 'message'],
        ]); ?>

        <div class="an-side-group">ویژگی‌ها</div>
        <?php $anNav([
            'create_color.php'     => ['افزودن رنگ', 'plus'],
            'manage_color.php'     => ['رنگ‌ها', 'sliders'],
            'create_memory.php'    => ['افزودن حافظه', 'plus'],
            'manage_memory.php'    => ['حافظه‌ها', 'sliders'],
            'create_ram.php'       => ['افزودن رم', 'plus'],
            'manage_ram.php'       => ['رم‌ها', 'sliders'],
            'create_guarantee.php' => ['افزودن گارانتی', 'plus'],
            'manage_guarantee.php' => ['گارانتی‌ها', 'sliders'],
            'create_battery.php'   => ['افزودن باتری', 'plus'],
            'manage_battery.php'   => ['باتری‌ها', 'sliders'],
            'create_pack.php'      => ['افزودن بسته‌بندی', 'plus'],
            'manage_pack.php'      => ['بسته‌بندی‌ها', 'sliders'],
        ]); ?>

        <div class="an-side-group">تنوع محصولات</div>
        <?php $anNav([
            'manage_products_variety.php' => ['افزودن تنوع', 'sliders'],
            'manage_all_products.php'     => ['همه محصولات', 'box'],
        ]); ?>

        <div class="an-side-group">محتوا</div>
        <?php $anNav([
            'createArticles.php' => ['افزودن مقاله', 'plus'],
            'manageArticles.php' => ['مقالات', 'paper'],
        ]); ?>

        <div class="an-side-group">مدیران و تخفیف</div>
        <?php $anNav([
            'create_manager.php'             => ['افزودن مدیر', 'plus'],
            'manage_manager.php'             => ['مدیران', 'shield'],
            'create_discount_code.php'       => ['افزودن کد تخفیف', 'plus'],
            'manage_discount_code_user.php'  => ['کدهای کاربری', 'percent'],
            'manage_discount_code_grop.php'  => ['کدهای گروهی', 'percent'],
        ]); ?>

        <div class="an-side-group">ارتباطات</div>
        <?php $anNav([
            'manage_about_us.php'              => ['درباره ما', 'info'],
            'manage_mobile.php'                => ['تلفن‌ها', 'phone'],
            'manage_about_us_address.php'      => ['آدرس‌ها', 'flag'],
            'manage_about_us_question.php'     => ['سوالات متداول', 'question'],
            'manage_about_us_stock_for_you.php' => ['تنظیم صفحه اصلی', 'sliders'],
        ]); ?>
    </nav>
    <div class="an-side-foot">
        <a href="/loginout.php">
            <svg class="an-ic" style="width:17px;height:17px"><use href="#an-i-logout"></use></svg>
            خروج از پنل مدیریت
        </a>
    </div>
</aside>
