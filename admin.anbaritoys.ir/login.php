<!DOCTYPE html>
<html lang="fa" dir="rtl">
<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if(!isset($_GET["secret"]) || $_GET["secret"]!== whirlpool(SECRET_TOKEN) ){
    back();
}
$anFlash = null;
if (isset($_SESSION['message'])) {
    $anFlash = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ورود مدیران | پنل مدیریت انبار</title>
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico">
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body class="an-body">
<?php include __DIR__ . '/views/partials/an-icon.php'; ?>
<div class="an-login">
    <div class="an-login-card">
        <div class="an-login-brand">
            <span class="an-brand-mark"><svg class="an-ic"><use href="#an-i-box"></use></svg></span>
            <b>پنل مدیریت انبار</b>
            <span>برای ورود، مشخصات مدیر خود را وارد کنید</span>
        </div>
        <?php if ($anFlash) { ?>
            <div class="an-alert is-<?php echo $anFlash['type'] === 'success' ? 'success' : 'error' ?>">
                <svg class="an-ic"><use href="#an-i-<?php echo $anFlash['type'] === 'success' ? 'check' : 'alert' ?>"></use></svg>
                <div><b><?php echo htmlspecialchars($anFlash['title']) ?></b><br><?php echo htmlspecialchars($anFlash['text']) ?></div>
            </div>
        <?php } ?>
        <form class="form" method="post" action="requests/LoginRequest.php">
            <input name="action" type="hidden" value="manager_login">
            <div class="an-field">
                <label for="anEmail">ایمیل</label>
                <input class="an-input" id="anEmail" type="email" placeholder="ایمیل" name="email" autocomplete="off" required>
            </div>
            <div class="an-field">
                <label for="anPassword">رمز ورود</label>
                <input class="an-input" id="anPassword" type="password" placeholder="رمز ورود" name="password" required>
            </div>
            <button class="an-btn an-btn-primary" type="submit">
                ورود به پنل
                <svg class="an-ic" style="width:17px;height:17px"><use href="#an-i-chevron"></use></svg>
            </button>
        </form>
        <div class="an-login-foot">انبار — سیستم مدیریت فروشگاه اسباب‌بازی · فنی مهندسی پاسکال</div>
    </div>
</div>
</body>
</html>
