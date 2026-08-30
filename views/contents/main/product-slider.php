<!--
<section class='slider-section dt-sl mb-5'>
    <div class='row mb-3'>
        <div class='col-12'>
        </div>
        <?php
/*        $rand = getRand();
        $getLastProducts=getLastrandomProducts($rand['id']);
        $RandomCategories = RandomCategories($rand['id']);
        */?>
            <div class='section-title text-sm-title title-wide no-after-title-wide'>
                <h2>دسته بندی: <?php /*echo $RandomCategories['title'] */?></h2>
            </div>
        </div>


        <div class='col-12'>
            <div class='product-carousel carousel-lg owl-carousel owl-theme'>


                <?php
/*                if ($getLastProducts){
                foreach ($getLastProducts

                as $product){
                */?>
                <div class='item'>
                    <div class='product-card mb-3'>
                        <div class='product-head'>
                            <div class='rating-stars'>
                                <i class='mdi mdi-star active'></i>
                                <i class='mdi mdi-star active'></i>
                                <i class='mdi mdi-star active'></i>
                                <i class='mdi mdi-star active'></i>
                                <i class='mdi mdi-star active'></i>
                            </div>
                            <div class='discount'>
                                <span>20%</span>
                            </div>
                        </div>
                        <a class='product-thumb' href='<?php /*echo productUrl($product['tracking_code'])*/?>'>
                            <?php
/*
                            if (!empty($product['photo_name'])){
                                */?>
                                <img  height="120" width="150" src='<?php /*echo normalizedPath(DOMAIN['public'], $product['photo_src'], $product['photo_name'])*/?>' alt='Product Thumbnail'>
                                <?php
/*                            }else{
                                */?>
                                <img  height="120" width="150" src='<?php /*echo normalizedPath(DOMAIN['public'],'/images/180.png')*/?>' alt='Product Thumbnail'>
                                <?php
/*                            }
                            */?>
                        </a>
                        <div class='product-card-body'>
                            <h5 class='product-title'>
                                <a href='<?php /*echo productUrl($product['tracking_code'])*/?>'><?php /*echo $product['title']*/?></a>
                            </h5>
                            <a class='product-meta' href='<?php /*echo productUrl($product['tracking_code'])*/?>'><?php /*echo $product['category_title']*/?></a>
                            <?php
/*                            if (empty($product['price_discounted']))
                            {
                                */?>
                                <strong><?php /*echo priceFormant($product['price'])*/?> </strong>
                                <?php
/*                            } else
                            {
                                */?>
                                <strong class="text-danger"><?php /*echo priceFormant($product['price_discounted'])*/?> </strong>
                                <br>
                                <del><?php /*echo priceFormant($product['price'])*/?></del>
                                <?php
/*                            }
                            */?>
                        </div>
                    </div>
                </div>
                    <?php
/*
                }
                }
                */?>


            </div>
        </div>

    </div>
</section>
-->