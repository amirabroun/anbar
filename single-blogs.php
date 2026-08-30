<?php
if (!isset($_GET['id'])) {
    abort();
}
require_once 'views/partial/header.php';
require_once 'views/partial/navbar.php';
require_once 'views/contents/main/single-blog_content.php';
require_once 'views/partial/footer.php';
