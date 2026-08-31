<?php
$homeBrands = selectBrandIndex();
if ($homeBrands):
?>
<!-- Start Brand Grid -->
<section class="home-section brand-section">
    <div class="section-title title-wide no-after-title-wide">
        <h2>برندهای محبوب</h2>
    </div>
    <div class="brand-grid">
        <?php foreach ($homeBrands as $brand):
            $brandPhoto = getProductPhotossss($brand['id']);
            $brandImg = !empty($brandPhoto['name'])
                ? normalizedPath(DOMAIN['public'], $brandPhoto['src'], $brandPhoto['name'])
                : normalizedPath(DOMAIN['public'], '/images/180.png');
        ?>
        <a class="brand-pill" href="<?php echo brandtUrl($brand['id']) ?>">
            <span class="brand-pill__logo">
                <img loading="lazy" decoding="async" src="<?php echo $brandImg ?>" alt="<?php echo $brand['title'] ?>">
            </span>
            <span class="brand-pill__name"><?php echo $brand['title'] ?></span>
        </a>
        <?php endforeach; ?>
    </div>
</section>
<!-- End Brand Grid -->
<?php endif; ?>
