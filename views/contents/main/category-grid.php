<?php
$homeCategories = selectCategoryIndex();
if ($homeCategories):
?>
<!-- Start Category Grid -->
<section class="home-section">
    <div class="section-title title-wide no-after-title-wide">
        <h2>دسته‌بندی محصولات</h2>
    </div>
    <div class="row">
        <?php foreach ($homeCategories as $cat):
            $catPhoto = getProductPhotoss($cat['id']);
            $catImg = !empty($catPhoto['name'])
                ? normalizedPath(DOMAIN['public'], $catPhoto['src'], $catPhoto['name'])
                : normalizedPath(DOMAIN['public'], '/images/180.png');
        ?>
        <div class="col-6 col-md-4 col-lg-3 col-xl-2 mb-3">
            <a class="category-card" href="<?php echo cagegorystUrl($cat['id']) ?>">
                <span class="category-card__img">
                    <img loading="lazy" decoding="async" src="<?php echo $catImg ?>" alt="<?php echo $cat['title'] ?>">
                </span>
                <span class="category-card__title"><?php echo $cat['title'] ?></span>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<!-- End Category Grid -->
<?php endif; ?>
