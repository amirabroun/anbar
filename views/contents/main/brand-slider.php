<?php
$homeBrands = selectBrandIndex();
if ($homeBrands):
?>
<!-- Start Brand Slider -->
<section class="home-section">
    <div class="section-title title-wide no-after-title-wide">
        <h2>برندهای محبوب</h2>
    </div>
    <div class="brand-slider carousel-lg owl-carousel owl-theme">
        <?php foreach ($homeBrands as $brand):
            $brandPhoto = getProductPhotossss($brand['id']);
            $brandImg = !empty($brandPhoto['name'])
                ? normalizedPath(DOMAIN['public'], $brandPhoto['src'], $brandPhoto['name'])
                : normalizedPath(DOMAIN['public'], '/images/180.png');
        ?>
        <div class="item">
            <a class="brand-card" href="<?php echo brandtUrl($brand['id']) ?>">
                <span class="brand-card__img">
                    <img loading="lazy" decoding="async" src="<?php echo $brandImg ?>" alt="<?php echo $brand['title'] ?>">
                </span>
                <span class="brand-card__title"><?php echo $brand['title'] ?></span>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<!-- End Brand Slider -->
<?php endif; ?>
