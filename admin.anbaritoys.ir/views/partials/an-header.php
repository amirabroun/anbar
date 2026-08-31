<?php
/* پوسته جدید انبار — هد + نوار بالا (فاز ۱)؛ جایگزین header.php فقط در wrapper های فاز ۱ */
$anPage = basename($_SERVER['SCRIPT_NAME']);
$anPageMap = [
    'index.php'                   => ['داشبورد', 'grid', 'خانه'],
    'manage_products.php'         => ['محصولات', 'box', 'فروشگاه'],
    'create_products.php'         => ['افزودن محصول', 'package-plus', 'فروشگاه'],
    'update_products.php'         => ['ویرایش محصول', 'edit', 'فروشگاه'],
    'manage_products_category.php' => ['دسته‌بندی محصول', 'layers', 'فروشگاه'],
    'manage_products_photos.php'  => ['عکس‌های محصول', 'image', 'فروشگاه'],
    'manage_factor.php'           => ['فاکتورها', 'cart', 'سفارش‌ها'],
    'manage_single_factor.php'    => ['جزئیات فاکتور', 'printer', 'سفارش‌ها'],
    'manage_user.php'             => ['کاربران', 'users', 'کاربران'],
];
[$anTitle, $anIcon, $anCrumb] = $anPageMap[$anPage] ?? ['پنل مدیریت', 'grid', ''];
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $anTitle ?> | پنل مدیریت انبار</title>
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico">
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body class="an-body">
<?php include __DIR__ . '/an-icon.php'; ?>
<div class="an-app">
<?php include __DIR__ . '/an-side-bar.php'; ?>
<div class="an-backdrop" id="anBackdrop"></div>
<div class="an-main">
    <header class="an-topbar">
        <button type="button" class="an-iconbtn an-burger" id="anBurger" aria-label="منو">
            <svg class="an-ic"><use href="#an-i-menu"></use></svg>
        </button>
        <div class="an-topbar-title">
            <svg class="an-ic" style="color:var(--an-primary)"><use href="#an-i-<?php echo $anIcon ?>"></use></svg>
            <?php echo $anTitle ?>
            <?php if ($anCrumb) { ?><span class="an-crumb">/ <?php echo $anCrumb ?></span><?php } ?>
        </div>
        <div class="an-topbar-side">
            <a class="an-topbar-link" href="<?php echo DOMAIN['main'] ?>" target="_blank" rel="noopener">
                <svg class="an-ic" style="width:16px;height:16px"><use href="#an-i-external"></use></svg>
                <span>مشاهده فروشگاه</span>
            </a>
            <div class="an-userchip">
                <span class="an-userchip-avatar">م</span>
                <div>
                    <b>مدیر انبار</b>
                    <span>pannel.anbaritoys.ir</span>
                </div>
            </div>
            <a class="an-iconbtn is-plain" href="/loginout.php" title="خروج از پنل">
                <svg class="an-ic"><use href="#an-i-logout"></use></svg>
            </a>
        </div>
    </header>
    <main class="an-content">
