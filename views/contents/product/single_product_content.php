<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <!-- Start title - breadcrumb -->
        <div class="title-breadcrumb-special dt-sl mb-3">
            <div class="breadcrumb dt-sl">
                <nav>
                    <a href="#"><?php echo $details_products['brand_title']; ?></a>
                    <?php
                    $getCategory = selectcategoryyOeser($details_products['id']);
                    foreach ($getCategory as $categoryys){
                        $getCategorys = selectcategoryy($categoryys['category_id']);
                        ?>
                        <?php
                        echo $getCategorys['title'] .'|' ;
                        ?>
                        <?php
                    }
                    ?>
                    <a href="#"><?php echo $details_products['title']; ?></a>
                </nav>
            </div>
        </div>
        <!-- End title - breadcrumb -->

        <!-- Start Product -->
        <div class="dt-sn mb-5 dt-sl">
            <div class="row">
                <!-- Product Gallery-->
                <div class="col-lg-4 col-md-6 pb-5 ps-relative">
                    <!-- Product Options-->
                    <ul class="gallery-options">
                        <li>
                            <div data-product-id="<?php echo $details_products['id'] ?>" class="addInterestIndex form">
                                <input type="hidden" name="action" value="interest">
                                <?php
                                if (isset($_SESSION['user_sing'])){
                                $user_id =getIdUsers($_SESSION['user_sing']);
                                $single_id = $details_products['id'];
                                $select_one_product = select_one_product($single_id);
                                if ($select_one_product){
                                ?>
                            <button type="submit" class="add-favorites text-danger btn-Add-interest-Index" name="id text-danger" value="<?php echo $details_products['id'] ?>"><i class="mdi mdi-heart"></i></button>
                                <?php
                                }if (!$select_one_product){
                                    ?>
                                    <button type="submit" class="add-favorites btn-Add-interest-Index" name="id text-dark" value="<?php echo $details_products['id'] ?>"><i class="mdi mdi-heart"></i></button>
                                    <?php
                                }
                                }else{
                                    ?>
                                    <button type="submit" class="add-favorites btn-Add-interest-Index" name="id text-dark" value="<?php echo $details_products['id'] ?>"><i class="mdi mdi-heart"></i></button>
                                    <?php
                                }
                                ?>
                                <span class="tooltip-option">افزودن به علاقمندی</span>
                            </div>
                        </li>
                    </ul>
<!--                    <div class="product-timeout position-relative pt-5 mb-3">-->
<!--                        <div class="promotion-badge">-->
<!--                        </div>-->
<!--                        <div class="countdown-timer" countdown data-date="10 24 2019 20:20:22">-->
<!--                            <span data-days>0</span>:-->
<!--                            <span data-hours>0</span>:-->
<!--                            <span data-minutes>0</span>:-->
<!--                            <span data-seconds>0</span>-->
<!--                        </div>-->
<!--                    </div>-->
                    <?php
                    $getPhotoProduct=getPhotoProduct($details_products['id']);
                        if($getPhotoProduct){
                            ?>
                            <div class="product-gallery">
                                <div class="product-carousel owl-carousel">
                                    <?php
                                    foreach ($getPhotoProduct as $photo){
                                        ?>
                                        <div class="item">
                                            <a class="gallery-item" href="<?php echo normalizedPath(DOMAIN['public'], $photo['src'], $photo['name'])?>"
                                               data-fancybox="gallery1" data-hash="product_photo_<?php echo $photo['id']?>">
                                                <img src="<?php echo normalizedPath(DOMAIN['public'], $photo['src'], $photo['name'])?>" alt="<?php echo $details_products['title']; ?>">
                                            </a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <ul class="product-thumbnails">
                                    <?php
                                    foreach ($getPhotoProduct as $key=>$photo){
                                        ?>
                                        <li <?php  echo $key===0?'class="active"':null?>>
                                            <a href="#product_photo_<?php echo $photo['id']?>">
                                                <img src="<?php echo normalizedPath(DOMAIN['public'], $photo['src'], $photo['name'])?>" alt="<?php echo $details_products['title']; ?>">
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <?php
                        }
                              ?>

                </div>
                <!-- Product Info -->
                <div class="col-lg-8 col-md-6 pb-5">
                    <div class="product-info dt-sl">
                        <div class="product-title dt-sl">
                            <h1> <?php echo $details_products['title']; ?>  | <?php echo $details_products['english_title']; ?>
                            </h1>
                        </div>
                        <!--<div class="product-variant dt-sl">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0">
                                <h2>انتخاب رنگ:</h2>
                            </div>
                            <ul class="product-variants float-right ml-3">
                                <li class="ui-variant">
                                    <label class="ui-variant ui-variant--color">
                                        <span class="ui-variant-shape" style="background-color: #212121"></span>
                                        <input type="radio" value="1" name="color" class="variant-selector"
                                               checked>
                                        <span class="ui-variant--check">مشکی</span>
                                    </label>
                                </li>
                                <li class="ui-variant">
                                    <label class="ui-variant ui-variant--color">
                                        <span class="ui-variant-shape" style="background-color: #f6f6f6"></span>
                                        <input type="radio" value="3" name="color" class="variant-selector">
                                        <span class="ui-variant--check">سفید</span>
                                    </label>
                                </li>
                                <li class="ui-variant">
                                    <label class="ui-variant ui-variant--color">
                                        <span class="ui-variant-shape" style="background-color: #2196f3"></span>
                                        <input type="radio" value="4" name="color" class="variant-selector">
                                        <span class="ui-variant--check">آبی</span>
                                    </label>
                                </li>
                            </ul>
                        </div>-->
                        <div class="product-params dt-sl">
                            <ul data-title="مشخصات محصول">
                                <li>
                                    <span>دسته بندی ها: </span>
                                    <span>

                                        <?php
                                        $getCategory = selectcategoryyOeser($details_products['id']);
                                        foreach ($getCategory as $categoryys){
                                            $getCategorys = selectcategoryy($categoryys['category_id']);
                                            ?>
                                            <?php
                                            echo $getCategorys['title'] .'|' ;
                                            ?>
                                            <?php
                                        }
                                        ?>

                                    </span>
                                </li>
                                <li>
                                    <span>برند: </span>
                                    <span><?php echo $details_products['brand_title']; ?></span>
                                </li>

                            </ul>
                        </div>

                        <span class="text-dark">
                            <span>توضیحات کوتاه : </span>
                            <span><?php echo $details_products['MiniDescription']; ?></span>
                        </span>

                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                            <h2>کد محصول:<span class="label label-lg font-weight-bold label-light-info label-inline"><?php echo $_GET['tracking_code'] ?></span></h2>
                        </div>
                        <?php
                            if ($details_products['stock'] == 0) {
                                ?>
                                
                                <?php
                            }else{
                                ?>
                                 <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                            <h2>قیمت : <span class="price"> <?php
                                    if (empty($details_products['price_discounted']))
                                    {
                                        ?>
                                        <strong><?php echo priceFormant($details_products['price'])?> </strong>
                                        <?php
                                    } else
                                    {
                                        ?>
                                        <strong class="text-danger"><?php echo priceFormant($details_products['price_discounted'])?> </strong>
                                        <br>
                                        <del><?php echo priceFormant($details_products['price'])?></del>
                                        <?php
                                    }
                                    ?></span> </h2>
                        </div>
                                <?php
                            }
                            ?>
                       
                        <div class="dt-sl mt-4 row">
                            <?php
                            if ($details_products['stock'] == 0) {
                                ?>
                                <div class="dt-sl mt-4">
                                    <a href="#" class="btn-primary-cm bg-secondary btn-with-icon">
                                        <i class="mdi mdi-information"></i>
                                         ناموجود
                                    </a>
                                <?php
                            }else{
                                ?>
                                <div class="addCartSingle ml-1" data-product-id="<?php echo $details_products['tracking_code']?>">
                                    <input type="hidden" name="action" value="add_to_cart">
                                    <input type="hidden" name="product" value="<?php echo $details_products['tracking_code']; ?>">
                                    <button  class="btn-primary-cm btn-with-icon btn-Add-Cart-Single">
                                        <img src="/assets/img/theme/shopping-cart.png" alt="افزودن به سبد خرید عنبری تویز">
                                        افزودن به سبد خرید
                                    </button>
                                </div>
                                <?php
                            }
                            ?>
                            <a class="btn btn-success pointer-event mr-3"
                               style="" data-toggle="modal"
                               data-target="#exampleModal<?php echo $details_products['id'] ?>">
                                <svg style="margin-top: 4px" xmlns="http://www.w3.org/2000/svg"
                                     width="20" height="20" fill="currentColor" class="bi bi-share-fill"
                                     viewBox="0 0 16 16">
                                    <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dt-sn mb-5 px-0 dt-sl pt-0">
            <!-- Start tabs -->
            <section class="tabs-product-info mb-3 dt-sl">
                <div class="ah-tab-wrapper dt-sl">
                    <div class="ah-tab dt-sl">
                        <a class="ah-tab-item" data-ah-tab-active="true" href=""><i
                                class="mdi mdi-glasses"></i>توضیحات</a>
                        <a class="ah-tab-item" href=""><i
                                class="mdi mdi-glasses"></i>نقد و بررسی</a>
                        <a class="ah-tab-item" href=""><i class="mdi mdi-comment-question-outline"></i>
                            نظرات
                        </a>
                        <a class="ah-tab-item" href=""><i class="mdi mdi-comment-question-outline"></i>
                            پرسش ها
                        </a>
                    </div>
                </div>
                <div class="ah-tab-content-wrapper product-info px-4 dt-sl">
                    <div class="ah-tab-content dt-sl" data-ah-tab-active="true">
                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                            <h2>توضیحات</h2>
                        </div>
                        <div class="product-title dt-sl">
                            <h1><?php echo $details_products['title']; ?></h1>
                            <h3><?php echo $details_products['english_title']; ?></h3>
                        </div>
                        <div class="description-product dt-sl mt-3 mb-3">
                            <div class="container">
                                <p><?php echo $details_products['description']; ?></p>
                            </div>
                        </div>
                    </div>


                    <div class="ah-tab-content dt-sl" >
                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                            <h2>نقد و بررسی</h2>
                        </div>
                        <div class="product-title dt-sl">
                            <h1><?php echo $details_products['title']; ?></h1>
                            <h3><?php echo $details_products['english_title']; ?></h3>
                        </div>
                        <div class="description-product dt-sl mt-3 mb-3">
                            <div class="container">
                                <p><?php echo $details_products['review']; ?></p>
                            </div>
                        </div>
                    </div>



                    <div class="ah-tab-content dt-sl">
                        <div class="section-title title-wide no-after-title-wide dt-sl">
                            <h2> نظرات</h2>
                            <p class="count-comment">نظر خود را در مورد محصول مطرح نمایید</p>
                        </div>
                        <div class="form-question-answer dt-sl mb-3">
                            <form method="post" action="">
                                <input type="hidden" name="coment" value="create_coment">
                                <input type="hidden" name="teack_product" value="<?php echo $_GET['tracking_code'] ?>">
                                <textarea name="comente" maxlength="550" class="form-control mb-3" rows="5"></textarea>


                                <?php
                                if (isset($_SESSION['user_sing'])){
                                    ?>
                                    <button type="submit" class="btn btn-dark float-right ml-3">ثبت نظر </button>
                                    <?php
                                }else{
                                    ?>
                                    <a class="btn btn-danger float-right ml-3" href="login.php">ورود به حساب کاربری و ثبت نظر </a>
                                    <?php
                                }
                                ?>

                                <div class="custom-control custom-checkbox float-right mt-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                </div>
                            </form>
                        </div>
                        <div class="comments-area default">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mt-5 mb-0 dt-sl">
                                <h2>نظرات</h2>
                            </div>
                            <ol class="comment-list">
                                <li>

                                    <?php
                                    $selectcoment = selectcoment2($_GET['tracking_code']);
                                    if ($selectcoment){
                                    foreach ($selectcoment as $comant){
                                    ?>

                                    <div class="comment-body shadow">
                                        <div class="comment-author">
                                            <span class="icon-comment">?</span>
                                            <cite class="fn"><?php echo $comant['name'] ?></cite>
                                            <span class="says">گفت:</span>
                                            <div class="commentmetadata">
                                                <a href="#">
                                                    <?php echo $comant['createat'] ?>
                                                </a>
                                            </div>
                                        </div>
                                        <p>
                                            <?php echo $comant['text_user'] ?>
                                        </p>

                                    </div>

                                    <?php
                                    }
                                    }else{
                                        ?>
                                    }
                                        <div class="comment-body shadow">
                                        <div class="comment-author">
                                            <span class="icon-comment">?</span>
                                            <cite class="fn">----</cite>
                                                        <span class="says">----:</span>
                                                        <div class="commentmetadata">
                                                            <a href="#">
                                                                -----
                                                            </a>
                                                        </div>
                                            </div>
                                            <p>
                                                نظری در مورد این کالا وجود ندارد
                                            </p>

                                        </div>
                                    <?php
                                    }
                                    ?>

                                </li>
                            </ol>
                        </div>
                    </div>


                    <div class="ah-tab-content dt-sl">
                        <div class="section-title title-wide no-after-title-wide dt-sl">
                            <h2>پرسش ها</h2>
                            <p class="count-comment">پرسش خود را در مورد محصول مطرح نمایید</p>
                        </div>
                        <div class="form-question-answer dt-sl mb-3">
                            <form method="post" action="">
                                <input type="hidden" name="whi" value="create_whi">
                                <input type="hidden" name="teack_product" value="<?php echo $_GET['tracking_code'] ?>">
                                <textarea name="question" maxlength="550" class="form-control mb-3" rows="5"></textarea>


                                <?php
                                if (isset($_SESSION['user_sing'])){
                                    ?>
                                    <button type="submit" class="btn btn-dark float-right ml-3">ثبت پرسش</button>
                                    <?php
                                }else{
                                    ?>
                                    <a class="btn btn-danger float-right ml-3" href="login.php">ورود به حساب کاربری و ثبت  پرسش</a>
                                    <?php
                                }
                                ?>

                                <div class="custom-control custom-checkbox float-right mt-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                </div>
                            </form>
                        </div>
                        <div class="comments-area default">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mt-5 mb-0 dt-sl">
                                <h2>پرسش ها و پاسخ ها</h2>
                            </div>
                            <ol class="comment-list">
                                <li>

                                    <?php
                                    $selectcoment = selectquestion2($_GET['tracking_code']);
                                    if ($selectcoment){
                                    foreach ($selectcoment as $comant){
                                    ?>

                                    <div class="comment-body shadow">
                                        <div class="comment-author">
                                            <span class="icon-comment">?</span>
                                            <cite class="fn"><?php echo $comant['name'] ?></cite>
                                            <span class="says">گفت:</span>
                                            <div class="commentmetadata">
                                                <a href="#">
                                                    <?php echo $comant['createat'] ?>
                                                </a>
                                            </div>
                                        </div>
                                        <p>
                                            <?php echo $comant['text_user'] ?>
                                        </p>
                                        <hr>
                                            <p style="color: #0da8ee">پاسخ:</p>
                                        <p>
                                            <?php echo $comant['text_admin'] ?>
                                        </p>

                                    </div>

                                    <?php
                                    }
                                    }else{
                                        ?>
                                        <div class="comment-body shadow">
                                        <div class="comment-author">
                                            <span class="icon-comment">?</span>
                                            <cite class="fn">----</cite>
                                                        <span class="says">----:</span>
                                                        <div class="commentmetadata">
                                                            <a href="#">
                                                                -----
                                                            </a>
                                                        </div>
                                            </div>
                                            <p>
                                                نظری در مورد این کالا وجود ندارد
                                            </p>

                                        </div>
                                    <?php
                                    }
                                    ?>

                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End tabs -->
        </div>
        <!-- End Product -->
<?php
//$stock_for_you = selectStockForYou1(1);

$order_products = GetOrderProductsSingleProduct($details_products['id']);

                            $productsM = [];

                            foreach(($order_products ?: []) as $item){
                                $productsM[] = GetOrderProductsByOrderID($item['order_id']);
                            }
                            
                            $products_Order = [];
                            
                            foreach($productsM as $item){
                                foreach(($item ?: []) as $item2){
                                     if($item2['product_id']==$details_products['id']){
                                        continue;
                                     }
                                    $products_Order[] = $item2;
                                }
                            }
                            
                            $OrderProductsId = [];
                            
                            foreach($products_Order as $item){
                                $OrderProductsId[] = $item['product_id'];
                            }
                            
                            
                            foreach($OrderProductsId as $item){
                                
                            }
                            
                            $OrderProductsOrder = array_count_values($OrderProductsId);
                            $products = [];
                            foreach($OrderProductsOrder as $key => $item){
                                if($item>=1){
                                    $products[] = selectproduct2($key);
                                }
                            }
                            
                            
                        

                          
                                /**/?><!--

                                <a href='javascript:;' style="margin-left: -50px;position: absolute;margin:67px;margin-top: 120px" class="text-dark">مشابه ها در : <?/*= $category['title'] */?></a>


                                --><?php

                                    /*$product_id = [
                                        'test1' => $getLastProduct_forPro['product_id'],
                                    ];

                                        if ($getLastProduct_forPro['product_id'] === $product_id['test1']){
                                             continue;
                                        }*/

                                    $getLastProducts_for=$products;
                                    if ($getLastProducts_for){

?>
        <!-- Start Product-Slider -->
        <section class="slider-section dt-sl mb-5">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="section-title text-sm-title title-wide no-after-title-wide">
                        <h2> برای شما!</h2>
                        <a href="products.php">مشاهده همه</a>
                    </div>
                </div>

                <!-- Start Product-Slider -->
                <div class="col-12">
                    <div class="product-carousel carousel-lg owl-carousel owl-theme">
                        <?php
                            

                                
                                    foreach ($getLastProducts_for as $product){
                                        $selectPhotoProducts = selectPhotoProducts($product['id']);
                                        $selectPhotosByID = $selectPhotoProducts ? selectPhotosByID($selectPhotoProducts['photo_id']) : false;
                                        $product['photo_name'] = $selectPhotosByID['name'] ?? '';
                                        $product['photo_src'] = $selectPhotosByID['src'] ?? '';
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
                                                             alt='<?php echo $product['title'] ?>'>
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
                            
                        
                        
                            
                        ?>
                    </div>
                </div>
                <!-- End Product-Slider -->

            </div>
        </section>
        <!-- End Product-Slider -->
        <?php
                                    }
        ?>
        
        <!-- Start Product-Slider -->
        <section class="slider-section dt-sl mb-5">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="section-title text-sm-title title-wide no-after-title-wide">
                        <h2>محصولات مشابه</h2>
                        <a href="products.php">مشاهده همه</a>
                    </div>
                </div>

                <!-- Start Product-Slider -->
                <div class="col-12">
                    <div class="product-carousel carousel-lg owl-carousel owl-theme">
                        <?php
                            $getCategory2 = selectcategoryyOeser44($details_products['id']);

                            foreach ($getCategory2 as $category_for){
                                $category = getcategory($category_for['category_id']);
                            $getCategory3 = selectcategoryyOeser55($category_for['category_id'],$details_products['id']);
                            if ($getCategory3){
                                /**/?><!--

                                <a href='javascript:;' style="margin-left: -50px;position: absolute;margin:67px;margin-top: 120px" class="text-dark">مشابه ها در : <?/*= $category['title'] */?></a>


                                --><?php
                            foreach ($getCategory3 as $key=> $getLastProduct_forPro){

                                    /*$product_id = [
                                        'test1' => $getLastProduct_forPro['product_id'],
                                    ];

                                        if ($getLastProduct_forPro['product_id'] === $product_id['test1']){
                                             continue;
                                        }*/

                                    $getLastProducts_for=getProductsByCategory($getLastProduct_forPro['product_id']);

                                if ($getLastProducts_for){
                                    foreach ($getLastProducts_for as $product){
                                        $selectPhotoProducts = selectPhotoProducts($product['id']);
                                        $selectPhotosByID = $selectPhotoProducts ? selectPhotosByID($selectPhotoProducts['photo_id']) : false;
                                        $product['photo_name'] = $selectPhotosByID['name'] ?? '';
                                        $product['photo_src'] = $selectPhotosByID['src'] ?? '';
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
                                                             alt='<?php echo $product['title'] ?>'>
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
                                }
                        }
                        }
                            }
                        ?>
                    </div>
                </div>
                <!-- End Product-Slider -->

            </div>
        </section>
        <!-- End Product-Slider -->

    </div>
</main>
<!-- End main-content -->