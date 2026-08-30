<?php
$homeProducts = getLastProductsPriceIndex();
if ($homeProducts):
?>
<!-- Start Product Carousel -->
<section class="home-section">
    <div class="section-title title-wide no-after-title-wide">
        <h2>پیشنهاد برای شما</h2>
        <a href="products.php">مشاهده همه محصولات</a>
    </div>
    <div class="product-carousel carousel-md owl-carousel owl-theme">
        <?php foreach ($homeProducts as $product):
            $pp = selectPhotoProducts($product['id']);
            $ppInfo = $pp ? selectPhotosByID($pp['photo_id']) : false;
            $product['photo_name'] = $ppInfo['name'] ?? '';
            $product['photo_src'] = $ppInfo['src'] ?? '';
            $pImg = !empty($product['photo_name'])
                ? normalizedPath(DOMAIN['public'], $product['photo_src'], $product['photo_name'])
                : normalizedPath(DOMAIN['public'], '/images/180.png');
        ?>
        <div class="item">
            <div class="product-card">
                <a class="product-thumb" href="<?php echo productUrl($product['tracking_code']) ?>">
                    <img loading="lazy" decoding="async" src="<?php echo $pImg ?>" alt="<?php echo $product['title'] ?>">
                    <?php if ((int)$product['stock'] === 0): ?>
                        <span class="product-badge product-badge--out">اتمام موجودی</span>
                    <?php elseif (!empty($product['price_discounted']) && $product['price_discounted'] > 0): ?>
                        <span class="product-badge"><?php echo cal_percentage($product['price'] - $product['price_discounted'], $product['price']) ?>%</span>
                    <?php endif; ?>
                </a>
                <div class="product-card-body">
                    <h5 class="product-title"><a href="<?php echo productUrl($product['tracking_code']) ?>"><?php echo $product['title'] ?></a></h5>
                    <span class="product-price">
                        <?php if ((int)$product['stock'] !== 0): ?>
                            <?php if (empty($product['price_discounted']) || $product['price_discounted'] <= 0): ?>
                                <strong><?php echo priceFormant($product['price']) ?></strong>
                            <?php else: ?>
                                <del><?php echo priceFormant($product['price']) ?></del>
                                <strong><?php echo priceFormant($product['price_discounted']) ?></strong>
                            <?php endif; ?>
                        <?php else: ?>
                            <em class="product-price--na">ناموجود</em>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<!-- End Product Carousel -->
<?php endif; ?>
