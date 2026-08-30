<?php
$ageCats = selectCategoryAge();
if ($ageCats):
?>
<!-- Start Age Grid -->
<section class="home-section">
    <div class="section-title title-wide no-after-title-wide">
        <h2>کوچولوت چند سالشه؟</h2>
    </div>
    <div class="row">
        <?php foreach ($ageCats as $age):
            $agePhoto = getProductPhotoss($age['id']);
            $ageImg = !empty($agePhoto['name'])
                ? normalizedPath(DOMAIN['public'], $agePhoto['src'], $agePhoto['name'])
                : normalizedPath(DOMAIN['public'], '/images/180.png');
        ?>
        <div class="col-6 col-md-4 col-lg-3 col-xl-2 mb-3">
            <a class="age-card" href="<?php echo cagegorystUrl($age['id']) ?>">
                <span class="age-card__img">
                    <img loading="lazy" decoding="async" src="<?php echo $ageImg ?>" alt="<?php echo $age['title'] ?>">
                </span>
                <span class="age-card__title"><?php echo $age['title'] ?></span>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<!-- End Age Grid -->
<?php endif; ?>
