<section class='slider-section dt-sl mb-5'>
    <div class='row mb-3'>
        <div class='col-12'>
            <div class='section-title text-sm-title title-wide no-after-title-wide'>
                <h2>برای شما!</h2>
                <a href='products.php'>مشاهده همه محصولات</a>
            </div>
        </div>
        <?php
        $getLastProductsPrice = getLastProductsPriceIndex();
        ?>
        <!-- Start Product-Slider -->
        <div class='col-12 px-res-0'>
            <div class='product-carousel carousel-md owl-carousel owl-theme'>
                <?php
                if ($getLastProductsPrice) {
                    foreach ($getLastProductsPrice as $product) {

                                $selectPhotoProducts = selectPhotoProducts($product['id']);
                                $selectPhotosByID = selectPhotosByID($selectPhotoProducts['photo_id']);
                                $product['photo_name'] = $selectPhotosByID['name'];
                                $product['photo_src'] = $selectPhotosByID['src'];
                        ?>
                        <div class='item'>
                            <div class='product-card'>
                                <div class='product-head'>
                                    <div class='rating-stars'>
                                    </div>
                                    <div class='discount'>
                                        <?php
                                        if (!empty($product['price_discounted'])) {
                                            ?>
                                            <div class="product-head">

                                                <?php

                                                if ($product['stock'] == 0) {
                                                    ?>
                                                    <div class="discount" style="width: 320%">
                                                        <span>اتمام موجودی</span>
                                                    </div>
                                                    <?php
                                                } else if (!empty($product['price_discounted'])) {
                                                    ?>
                                                    <div class="discount">
                                                        <span><?php $cal_percentage = $product['price'] - ($product['price_discounted']);
                                                            echo cal_percentage($cal_percentage, $product['price']) . '%<br/>'; ?></span>
                                                    </div>
                                                    <?php
                                                } else {
                                                    echo '<br><br>';
                                                }

                                                ?>

                                            </div>
                                            <br>
                                            <?php
                                        } else {
                                            echo '.';
                                        }

                                        ?>                                            </div>
                                </div>

                                <a class='product-thumb' target="_blank"
                                   href='<?php echo productUrl($product['tracking_code']) ?>'>
                                    <?php

                                    if (!empty($product['photo_name'])) {
                                        ?>
                                        <img height="150" width="150"
                                             src='<?php echo normalizedPath(DOMAIN['public'], $product['photo_src'], $product['photo_name']) ?>'
                                             alt='<?php echo $product['title'] ?>'>
                                        <?php
                                    } else {
                                        ?>
                                        <img height="120" width="150"
                                             src='<?php echo normalizedPath(DOMAIN['public'], '/images/180.png') ?>'
                                             alt='تصویر محصولات عنبری تویز'>
                                        <?php
                                    }
                                    ?>

                                </a>
                                <div class='product-card-body'>
                                    <h5 class='product-title'>
                                        <a href='<?php echo productUrl($product['tracking_code']) ?>'><?php echo $product['title'] ?></a>
                                    </h5>
                                    <a class='product-meta'
                                       href='<?php echo productUrl($product['tracking_code']) ?>'></a>
                                    <span class='product-price'>
                                        <?php
                                        if ($product['stock'] != 0) {
                                            if (empty($product['price_discounted'])) {
                                                ?>
                                                <strong><?php echo priceFormant($product['price']) ?> </strong>
                                                <?php
                                            } else {
                                                ?>
                                                <del><?php echo priceFormant($product['price']) ?></del>
                                                <br>
                                                <strong class="text-danger"><?php echo priceFormant($product['price_discounted']) ?> </strong>
                                                <?php
                                            }
                                        }else{
                                            ?>
                                            <br> <br> 
                                            <?php
                                        }
                                        ?> </span>
                                </div>

                                <div class="row d-flex justify-content-center align-items-center mt-3">

                                    <div class="addCartIndex ml-1" data-product-id="<?php echo $product['tracking_code']?>">
                                        <!--<input type="hidden" name="action" value="add_to_cartIndex">-->
                                        <input type="hidden" name="product"
                                               value="<?php echo $product['tracking_code']; ?>">
                                        <button class="btn btn-primary btn-Add-Cart-Index">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                 fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                                <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="addInterestIndex ml-1" data-product-id="<?php echo $product['id']?>">
                                        <input type="hidden" name="action" value="interest">
                                        <?php
                                        if (isset($_SESSION['user_sing'])) {
                                            $user_id = getIdUsers($_SESSION['user_sing']);
                                            $single_id = $product['id'];
                                            $select_one_product = select_one_product($single_id);
                                            if ($select_one_product) {
                                                ?>
                                                <button
                                                        type="submit" class="btn btn-danger  btn-Add-interest-Index" name="id"
                                                        value="<?php echo $product['id'] ?>">
                                                    <svg style="margin-top: 3px;color: #aeaeae"
                                                         xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                         fill="currentColor" class="bi bi-heart-fill"
                                                         viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                              d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                    </svg>
                                                </button>
                                                <?php
                                            }
                                            if (!$select_one_product) {
                                                ?>
                                                <button
                                                        type="submit" class="btn btn-danger btn-Add-interest-Index" name="id"
                                                        value="<?php echo $product['id'] ?>">
                                                    <svg style="margin-top: 3px" xmlns="http://www.w3.org/2000/svg"
                                                         width="20" height="20" fill="currentColor"
                                                         class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                              d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                    </svg>
                                                </button>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <button type="submit" class="btn btn-danger btn-Add-interest-Index"
                                                    name="id" value="<?php echo $product['id'] ?>">
                                                <svg style="margin-top: 3px" xmlns="http://www.w3.org/2000/svg"
                                                     width="20" height="20" fill="currentColor" class="bi bi-heart-fill"
                                                     viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                          d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                </svg>
                                            </button>
                                            <?php
                                        }
                                        ?>
                                    </div>

                                    <a class="btn btn-success pointer-event" data-toggle="modal"
                                       data-target="#exampleModal<?php echo $product['id'] ?>">
                                        <svg style="margin-top: 4px" xmlns="http://www.w3.org/2000/svg"
                                             width="20" height="20" fill="currentColor" class="bi bi-share-fill"
                                             viewBox="0 0 16 16">
                                            <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
                                        </svg>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <?php

                    }
                } else {
                    ?>
                    <div class="warning alert" style="margin: auto;">
                        <div class="content">
                            <p>هیچ کالایی موجود نیست </p>
                        </div>
                        <div class="icon">
                            <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#fff"
                                      d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/>
                            </svg>
                        </div>
                    </div>
                    <?php
                }
                ?>


            </div>
        </div>
        <!-- End Product-Slider -->
    </div>
</section>


<div class='widget-banner mt-5 mb-5'>
    <h5 style="text-align: center"><span style="font-size: 100%"></span><br><span style="font-size: 80%;color: #5d5d5d">😍شخصیت مورد علاقتو انتخاب کن 😍</span>
    </h5>
    <div class='col-12 mt-4'>
        <div class='brand-slider carousel-lg owl-carousel owl-theme'>
            <?php
            $categoryAge = selectCategoryShackss();
            $class = 'list-item-has-children';
            if ($categoryAge) {
                foreach ($categoryAge as $gory) {
                    ?>
                    <div class='item'>
                        <a href='<?php echo cagegorystUrl($gory['id']) ?>'>
                            <?php
                            $categorys = getProductPhotoss($gory['id']);
                            if (!empty($categorys['name'])) {
                                ?>
                                <img height="120" width="150"
                                     src='<?php echo DOMAIN['public'] . $categorys['src'] . $categorys['name'] ?>'
                                     alt='<?php echo $gory['title'] ?>'>
                                <?php
                            } else {
                                ?>
                                <img height="120" width="150"
                                     src='<?php echo normalizedPath(DOMAIN['public'], '/images/180.png') ?>'
                                     alt='تصویر محصولات عنبری تویز'>
                                <?php
                            }
                            ?>
                        </a>
                        <a style="text-align: center;margin-left: 33%" href='<?php echo cagegorystUrl($gory['id']) ?>'>
                            <span class="text-dark"><?php echo $gory['title'] ?></span>
                        </a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>


<!-- Start Product-Slider -->
<div class='row'>
    <div class='col-xl-10 col-lg-12'>
        <section class='slider-section dt-sl mb-5'>
            <div class='row mb-3'>
                <div class='col-12'>
                    <div class='section-title text-sm-title title-wide no-after-title-wide'>
                        <h2>محصولات اخیر</h2>
                        <a href='products.php'>مشاهده همه محصولات</a>
                    </div>
                </div>
                <?php
                $getLastProducts = getLastProducts();
                $getLastProductsSuggested = getLastProductsSuggested();
                ?>
                <!-- Start Product-Slider -->
                <div class='col-12 px-res-0'>
                    <div class='product-carousel carousel-md owl-carousel owl-theme'>
                        <?php
                        if ($getLastProducts) {
                            foreach ($getLastProducts as $product) {
$selectPhotoProducts = selectPhotoProducts($product['id']);
                                $selectPhotosByID = selectPhotosByID($selectPhotoProducts['photo_id']);
                                $product['photo_name'] = $selectPhotosByID['name'];
                                $product['photo_src'] = $selectPhotosByID['src'];
                                ?>
                                <div class='item'>
                                    <div class='product-card'>
                                        <div class="product-head">

                                            <?php

                                            if ($product['stock'] == 0) {
                                                ?>
                                                <div class="discount">
                                                    <span>اتمام موجودی</span>
                                                </div>
                                                <br>
                                                <br>
                                                <?php
                                            }

                                            else if (!empty($product['price_discounted'])) {
                                                ?>
                                                <div class="discount">
                                                    <span><?php $cal_percentage = $product['price'] - ($product['price_discounted']);
                                                        echo cal_percentage($cal_percentage, $product['price']) . '%<br/>'; ?></span>
                                                </div>
                                                <br>
                                                <?php
                                            } else {
                                                echo '<br><br>';
                                            }
                                            ?>

                                        </div>


                                        <a class='product-thumb' target="_blank"
                                           href='<?php echo productUrl($product['tracking_code']) ?>'>
                                            <?php

                                            if (!empty($product['photo_name'])) {
                                                ?>
                                                <img height="150" width="150"
                                                     src='<?php echo normalizedPath(DOMAIN['public'], $product['photo_src'], $product['photo_name']) ?>'
                                                     alt='<?php echo $product['title'] ?>'>
                                                <?php
                                            } else {
                                                ?>
                                                <img height="120" width="150"
                                                     src='<?php echo normalizedPath(DOMAIN['public'], '/images/180.png') ?>'
                                                     alt='تصویر محصولات عنبری تویز'>
                                                <?php
                                            }
                                            ?>
                                        </a>
                                        <div class='product-card-body'>
                                            <h5 class='product-title'>
                                                <a href='<?php echo productUrl($product['tracking_code']) ?>'><?php echo $product['title'] ?></a>
                                            </h5>
                                            <a class='product-meta'
                                               href='<?php echo productUrl($product['tracking_code']) ?>'></a>
                                            <span class='product-price'>
                                        <?php
                                        if ($product['stock'] != 0) {
                                            if (empty($product['price_discounted'])) {
                                                ?>
                                                <strong><?php echo priceFormant($product['price']) ?> </strong>
                                                <?php
                                            } else {
                                                ?>
                                                <del><?php echo priceFormant($product['price']) ?></del>
                                                <br>
                                                <strong class="text-danger"><?php echo priceFormant($product['price_discounted']) ?> </strong>
                                                <?php
                                            }
                                        }else{
                                            ?>
                                            <br> <br> 
                                            <?php
                                        }
                                        ?> </span>
                                        </div>
                                        <div class="row d-flex justify-content-center align-items-center mt-3">

                                            <div class="addCartIndex ml-1" data-product-id="<?php echo $product['tracking_code']?>">
                                                <!--<input type="hidden" name="action" value="add_to_cartIndex">-->
                                                <input type="hidden" name="product"
                                                       value="<?php echo $product['tracking_code']; ?>">
                                                <button class="btn btn-primary btn-Add-Cart-Index">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                         fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="addInterestIndex ml-1" data-product-id="<?php echo $product['id']?>">
                                                <input type="hidden" name="action" value="interest">
                                                <?php
                                                if (isset($_SESSION['user_sing'])) {
                                                    $user_id = getIdUsers($_SESSION['user_sing']);
                                                    $single_id = $product['id'];
                                                    $select_one_product = select_one_product($single_id);
                                                    if ($select_one_product) {
                                                        ?>
                                                        <button
                                                                type="submit" class="btn btn-danger  btn-Add-interest-Index" name="id"
                                                                value="<?php echo $product['id'] ?>">
                                                            <svg style="margin-top: 3px;color: #aeaeae"
                                                                 xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                 fill="currentColor" class="bi bi-heart-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                      d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                            </svg>
                                                        </button>
                                                        <?php
                                                    }
                                                    if (!$select_one_product) {
                                                        ?>
                                                        <button
                                                                type="submit" class="btn btn-danger btn-Add-interest-Index" name="id"
                                                                value="<?php echo $product['id'] ?>">
                                                            <svg style="margin-top: 3px" xmlns="http://www.w3.org/2000/svg"
                                                                 width="20" height="20" fill="currentColor"
                                                                 class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                      d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                            </svg>
                                                        </button>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <button type="submit" class="btn btn-danger btn-Add-interest-Index"
                                                            name="id" value="<?php echo $product['id'] ?>">
                                                        <svg style="margin-top: 3px" xmlns="http://www.w3.org/2000/svg"
                                                             width="20" height="20" fill="currentColor" class="bi bi-heart-fill"
                                                             viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                  d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                        </svg>
                                                    </button>
                                                    <?php
                                                }
                                                ?>
                                            </div>

                                            <a class="btn btn-success pointer-event" data-toggle="modal"
                                               data-target="#exampleModal<?php echo $product['id'] ?>">
                                                <svg style="margin-top: 4px" xmlns="http://www.w3.org/2000/svg"
                                                     width="20" height="20" fill="currentColor" class="bi bi-share-fill"
                                                     viewBox="0 0 16 16">
                                                    <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
                                                </svg>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        } else {
                            ?>
                            <div class="warning alert" style="margin: auto;">
                                <div class="content">
                                    <p>هیچ کالایی موجود نیست </p>
                                </div>
                                <div class="icon">
                                    <svg height="50" viewBox="0 0 512 512" width="50"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#fff"
                                              d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/>
                                    </svg>
                                </div>
                            </div>

                            <?php
                        }
                        ?>


                    </div>
                </div>
                <!-- End Product-Slider -->

            </div>
        </section>
    </div>


    <div class='col-xl-2 col-lg-3 hidden-lg pr-0'>
        <div class='widget-suggestion dt-sn pt-3 mt-3'>
            <div class='widget-suggestion-title'>
                <img src='https://anbaritoys.com/assets/img/theme/suggestion-title.png' alt='پیشنهادی های عنبری تویز'>
            </div>
            <div id='progressBar'>
                <div class='slide-progress'></div>
            </div>
            <div id='suggestion-slider' class='owl-carousel owl-theme'>

                <?php
                if ($getLastProductsSuggested) {
                    foreach ($getLastProductsSuggested as $product) {
                        $cal_percentage = $product['price'] - ($product['price_discounted']);
                        $selectPhotoProducts = selectPhotoProducts($product['id']);
                                $selectPhotosByID = selectPhotosByID($selectPhotoProducts['photo_id']);
                                $product['photo_name'] = $selectPhotosByID['name'];
                                $product['photo_src'] = $selectPhotosByID['src'];
                        ?>
                        <div class='item'>
                            <div class='product-card mb-3 shadow-unset'>
                                <div class='product-head'>
                                    <div class='rating-stars'>
                                    </div>
                                    <?php

                                    if ($product['stock'] == 0) {
                                        ?>
                                        <div class="discount">
                                            <span>اتمام موجودی</span>
                                        </div>
                                        <br>
                                        <?php
                                    }

                                    else if (!empty($product['price_discounted'])) {
                                        ?>
                                        <div class="discount">
                                                    <span><?php $cal_percentage = $product['price'] - ($product['price_discounted']);
                                                        echo cal_percentage($cal_percentage, $product['price']) . '%<br/>'; ?></span>
                                        </div>
                                        <br>
                                        <?php
                                    } else {
                                        echo '<br><br>';
                                    }
                                    ?>
                                </div>
                                <a class='product-thumb' href='<?php echo productUrl($product['tracking_code']) ?>'>
                                    <?php

                                    if (!empty($product['photo_name'])) {
                                        ?>
                                        <img height="150" width="150"
                                             src='<?php echo normalizedPath(DOMAIN['public'], $product['photo_src'], $product['photo_name']) ?>'
                                             alt='<?php echo $product['title'] ?>'>
                                        <?php
                                    } else {
                                        ?>
                                        <img height="120" width="150"
                                             src='<?php echo normalizedPath(DOMAIN['public'], '/images/180.png') ?>'
                                             alt='تصویر محصولات عنبری تویز'>
                                        <?php
                                    }
                                    ?>
                                </a>
                                <div class='product-card-body'>
                                    <h5 class='product-title'>
                                        <a href='<?php echo productUrl($product['tracking_code']) ?>'><?php echo $product['title'] ?></a>
                                    </h5>
                                    <span class='product-price'>
                                        <?php
                                        if ($product['stock'] != 0) {
                                            if (empty($product['price_discounted'])) {
                                                ?>
                                                <strong><?php echo priceFormant($product['price']) ?> </strong>
                                                <?php
                                            } else {
                                                ?>
                                                <del><?php echo priceFormant($product['price']) ?></del>
                                                <br>
                                                <strong class="text-danger"><?php echo priceFormant($product['price_discounted']) ?> </strong>
                                                <?php
                                            }
                                        }else{
                                            ?>
                                            <br> <br> 
                                            <?php
                                        }
                                        ?> </span>
                                </div>
                            </div>
                        </div>
                        <?php

                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>
<!-- End Product-Slider -->


<div class='widget-banner mt-3 mb-5'>
    <h5 style="text-align: center"><span style="font-size: 100%"></span><br><span style="font-size: 80%;color: #5d5d5d">برند خاصی مد نظرته؟</span>
    </h5>
    <div class='col-12 mt-4'>
        <div class='brand-slider carousel-lg owl-carousel owl-theme'>
            <?php
            $categoryAge = selectBrandIndex();
            $class = 'list-item-has-children';
            if ($categoryAge) {
                foreach ($categoryAge as $gory) {
                    ?>
                    <div class='item'>
                        <a href='<?php echo brandtUrl($gory['id']) ?>'>

                            <?php
                            $categorys = getProductPhotossss($gory['id']);
                            if (!empty($categorys['name'])) {
                                ?>
                                <img height="120" width="150"
                                     src='<?php echo DOMAIN['public'] . $categorys['src'] . $categorys['name'] ?>'
                                     alt='<?php echo $gory['title'] ?>'>
                                <?php
                            } else {
                                ?>
                                <img height="120" width="150"
                                     src='<?php echo normalizedPath(DOMAIN['public'], '/images/180.png') ?>'
                                     alt='تصویر محصولات عنبری تویز'>
                                <?php
                            }
                            ?>
                        </a>
                        <a style="text-align: center;margin-left: 33%" href='<?php echo cagegorystUrl($gory['id']) ?>'>
                            <span class="text-dark"><?php echo $gory['title'] ?></span>
                        </a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
