<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <?php
        /* $selectcategoryyOeser2 = selectcategoryyOeser2($_GET['id']);
         $selectcategoryyOeser3 = selectcategoryyOeser3($_GET['id']);*/
        /* $getLastProductsPriseFool=getLastProductsByCategoryIsPriseFool($selectcategoryyOeser2['category_id']);
         $categori_name = getcategory($selectcategoryyOeser2['category_id']);
         $categori_name_org = $categori_name["title"];**/
        ?>
        <div class="row">

            <?php
            require_once 'views/partial/sidbar2.php';
            ?>





            <!-- Start Content -->
            <div class="col-lg-9 col-md-12 col-sm-12 search-card-res">
                <div class="dt-sl dt-sn px-0 search-amazing-tab">
                    <div class="ah-tab-wrapper dt-sl">
                        <div class="ah-tab dt-sl">
                            <a class="ah-tab-item" data-ah-tab-active="true" href="">جدید ترین</a>
                            <a class="ah-tab-item" href="">قدیمی ترین</a>
                            <!--<a class="ah-tab-item" href="">ارزان ترین</a>
                            <a class="ah-tab-item" href="">گران ترین</a>-->
                        </div>
                    </div>


                    <div class="ah-tab-content-wrapper dt-sl px-res-0">




                        <div class="ah-tab-content dt-sl" data-ah-tab-active="true">

                            <div class="row mb-3 mx-0 px-res-0">
                                <?php
                                $key20 = 0;
                                if ($details_products243) {
                                    foreach ($details_products243 as $key=> $OrderProduct){
                                        $details_products3= getDetailsProductsByOrderCategoryByProduct($OrderProduct['product_id'],$_SESSION['ageId']);
                                        if ($details_products3){
                                            $test= getDetailsProductsByID22($details_products3['product_id']);
                                            if ($test){
                                                $key = 1;
                                                foreach ($test as $details_products4){
                                    if (!empty($details_products4['many_id'])) {
                                        $many = selectManyById($details_products4['many_id']);
                                        $details_products4['price'] = $many['price'] * $details_products4['price'];
                                        $details_products4['price_discounted'] = $many['price'] * $details_products4['price_discounted'];
                                    }
                                    $selectPhotoProducts = selectPhotoProducts($details_products4['id']);
                                    $selectPhotosByID = $selectPhotoProducts ? selectPhotosByID($selectPhotoProducts['photo_id']) : false;
                                    $details_products4['photo_name'] = $selectPhotosByID['name'];
                                    $details_products4['photo_src'] = $selectPhotosByID['src'];
                                                    ?>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                                        <div class="product-card mb-2 mx-res-0">
                                                            <div class="product-head">

                                                                <?php

                                                                if ($details_products4['stock'] == 0) {
                                                                    ?>
                                                                    <div class="discount">
                                                                        <span>اتمام موجودی</span>
                                                                    </div>
                                                                    <br>
                                                                    <br>
                                                                    <?php
                                                                }

                                                                else if (!empty($details_products4['price_discounted'])) {
                                                                    ?>
                                                                    <div class="discount">
                                                    <span><?php $cal_percentage = $details_products4['price'] - ($details_products4['price_discounted']);
                                                        echo cal_percentage($cal_percentage, $details_products4['price']) . '%<br/>'; ?></span>
                                                                    </div>
                                                                    <br>
                                                                    <?php
                                                                } else {
                                                                    echo '<br><br>';
                                                                }
                                                                ?>

                                                            </div>
                                                            <a class="product-thumb" href="<?php echo productUrl($details_products4['tracking_code'])?>" style="margin-top: 20px;">
                                                                <?php

                                                                if (!empty($details_products4['photo_name'])){
                                                                    ?>
                                                                    <img loading="lazy" decoding="async"  height="100" width="100" src='<?php echo normalizedPath(DOMAIN['public'], $details_products4['photo_src'], $details_products4['photo_name'])?>' alt='<?php echo $details_products4['title']?>'>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <img loading="lazy" decoding="async"  height="120" width="150" src='<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>' alt='تصویر محصول عنبری تویز'>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </a>
                                                            <div class="product-card-body">
                                                                <h5 class="product-title">
                                                                    <a href='<?php echo productUrl($details_products4['tracking_code'])?>'><?php echo $details_products4['title']?></a>
                                                                </h5>
                                                                <span class='product-price'>
                                        <?php
                                        if (empty($details_products4['price_discounted']))
                                        {
                                            ?>
                                            <strong><?php echo priceFormant($details_products4['price']) ?> </strong>
                                            <?php
                                        } else
                                        {
                                            ?>
                                            <strong class="text-danger"><?php echo priceFormant($details_products4['price_discounted'])?> </strong>
                                            <br>
                                            <del><?php echo priceFormant($details_products4['price'])?></del>
                                            <?php
                                        }
                                        ?> </span>
                                                            </div>
                                                            <div class="row d-flex justify-content-center align-items-center mt-3">

                                                                <div class="addCartIndex ml-1" data-product-id="<?php echo $details_products4['tracking_code']?>">
                                                                    <!--<input type="hidden" name="action" value="add_to_cartIndex">-->
                                                                    <input type="hidden" name="product"
                                                                           value="<?php echo $details_products4['tracking_code']; ?>">
                                                                    <button class="btn btn-primary btn-Add-Cart-Index">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                                             fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                                                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                                                        </svg>
                                                                    </button>
                                                                </div>

                                                                <div class="addInterestIndex ml-1" data-product-id="<?php echo $details_products4['id']?>">
                                                                    <input type="hidden" name="action" value="interest">
                                                                    <?php
                                                                    if (isset($_SESSION['user_sing'])) {
                                                                        $user_id = getIdUsers($_SESSION['user_sing']);
                                                                        $single_id = $details_products4['id'];
                                                                        $select_one_product = select_one_product($single_id);
                                                                        if ($select_one_product) {
                                                                            ?>
                                                                            <button
                                                                                    type="submit" class="btn btn-danger  btn-Add-interest-Index" name="id"
                                                                                    value="<?php echo $details_products4['id'] ?>">
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
                                                                                    value="<?php echo $details_products4['id'] ?>">
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
                                                                                name="id" value="<?php echo $details_products4['id'] ?>">
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
                                                                   data-target="#exampleModal<?php echo $details_products4['id'] ?>">
                                                                    <svg style="margin-top: 4px" xmlns="http://www.w3.org/2000/svg"
                                                                         width="20" height="20" fill="currentColor" class="bi bi-share-fill"
                                                                         viewBox="0 0 16 16">
                                                                        <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
                                                                    </svg>
                                                                </a>

                                                            </div>                                                        </div>
                                                    </div>






                                                                    <script>
                                                                            document.getElementById("aleart_age").style.display = "none";
                                                                    </script>






                                                    <?php
                                                }
                                            }
                                            else{
                                                if ($key >= 1){
                                                    continue;
                                                }else{
                                                    ?>
                                                    <div class="warning alert w-25" style="margin: auto;" id="aleart_age">
                                                        <div class="content">
                                                            هیج کالای در این جنسیت و رده سنی وجود ندارد.
                                                        </div>
                                                        <div class="icon" >
                                                            <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
                                                        </div>
                                                    </div>

                                                    <?php
                                                }
                                            }
                                        }
                                        else{
                                            if ($key >= 1){
                                                continue;
                                            }
                                            else{
                                                ?>
                                                <div class="warning alert w-25" style="margin: auto;" id="aleart_age">
                                                    <div class="content">
                                                        هیج کالای در این جنسیت و رده سنی وجود ندارد.
                                                    </div>
                                                    <div class="icon" >
                                                        <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                }

                                else{
                                    ?>

                                    <div class="warning alert w-25" style="margin: auto;" id="aleart_age">
                                        <div class="content">
                                            هیج کالای در این جنسیت و رده سنی وجود ندارد.
                                        </div>
                                        <div class="icon" >
                                            <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>
                            </div>


                        </div>



                        <div class="ah-tab-content dt-sl">

                            <div class="row mb-3 mx-0 px-res-0">
                                <?php
                                if ($details_products33) {
                                    foreach ($details_products33 as $key=> $OrderProduct){
                                        $details_products3= getDetailsProductsByOrderCategoryByProduct($OrderProduct['product_id'],$_SESSION['ageId']);
                                        if ($details_products3){
                                            $test= getDetailsProductsByID22($details_products3['product_id']);
                                        if ($test){
                                            $key = 1;
                                        foreach ($test as $details_products4){
                                    if (!empty($details_products4['many_id'])) {
                                        $many = selectManyById($details_products4['many_id']);
                                        $details_products4['price'] = $many['price'] * $details_products4['price'];
                                        $details_products4['price_discounted'] = $many['price'] * $details_products4['price_discounted'];
                                    }
                                    $selectPhotoProducts = selectPhotoProducts($details_products4['id']);
                                    $selectPhotosByID = $selectPhotoProducts ? selectPhotosByID($selectPhotoProducts['photo_id']) : false;
                                    $details_products4['photo_name'] = $selectPhotosByID['name'];
                                    $details_products4['photo_src'] = $selectPhotosByID['src'];
                                            ?>
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                                <div class="product-card mb-2 mx-res-0">
                                                    <div class="product-head">

                                                        <?php

                                                        if ($details_products4['stock'] == 0) {
                                                            ?>
                                                            <div class="discount">
                                                                <span>اتمام موجودی</span>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <?php
                                                        }

                                                        else if (!empty($details_products4['price_discounted'])) {
                                                            ?>
                                                            <div class="discount">
                                                            <span><?php $cal_percentage = $details_products4['price'] - ($details_products4['price_discounted']);
                                                                echo cal_percentage($cal_percentage, $details_products4['price']) . '%<br/>'; ?></span>
                                                            </div>
                                                            <br>
                                                            <?php
                                                        } else {
                                                            echo '<br><br>';
                                                        }
                                                        ?>

                                                    </div>
                                                    <a class="product-thumb" href="<?php echo productUrl($details_products4['tracking_code'])?>" style="margin-top: 20px;">
                                                        <?php

                                                        if (!empty($details_products4['photo_name'])){
                                                            ?>
                                                            <img loading="lazy" decoding="async"  height="100" width="100" src='<?php echo normalizedPath(DOMAIN['public'], $details_products4['photo_src'], $details_products4['photo_name'])?>' alt='<?php echo $details_products4['title']?>'>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <img loading="lazy" decoding="async"  height="120" width="150" src='<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>' alt='تصویر محصول عنبری تویز'>
                                                            <?php
                                                        }
                                                        ?>
                                                    </a>
                                                    <div class="product-card-body">
                                                        <h5 class="product-title">
                                                            <a href='<?php echo productUrl($details_products4['tracking_code'])?>'><?php echo $details_products4['title']?></a>
                                                        </h5>
                                                        <span class='product-price'>
                                                <?php
                                                if (empty($details_products4['price_discounted']))
                                                {
                                                    ?>
                                                    <strong><?php echo priceFormant($details_products4['price']) ?> </strong>
                                                    <?php
                                                } else
                                                {
                                                    ?>
                                                    <strong class="text-danger"><?php echo priceFormant($details_products4['price_discounted'])?> </strong>
                                                    <br>
                                                    <del><?php echo priceFormant($details_products4['price'])?></del>
                                                    <?php
                                                }
                                                ?> </span>
                                                    </div>
                                                    <div class="row d-flex justify-content-center align-items-center mt-3">

                                                        <div class="addCartIndex ml-1" data-product-id="<?php echo $details_products4['tracking_code']?>">
                                                            <!--<input type="hidden" name="action" value="add_to_cartIndex">-->
                                                            <input type="hidden" name="product"
                                                                   value="<?php echo $details_products4['tracking_code']; ?>">
                                                            <button class="btn btn-primary btn-Add-Cart-Index">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                                     fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                                                    <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                                                </svg>
                                                            </button>
                                                        </div>

                                                        <div class="addInterestIndex ml-1" data-product-id="<?php echo $details_products4['id']?>">
                                                            <input type="hidden" name="action" value="interest">
                                                            <?php
                                                            if (isset($_SESSION['user_sing'])) {
                                                                $user_id = getIdUsers($_SESSION['user_sing']);
                                                                $single_id = $details_products4['id'];
                                                                $select_one_product = select_one_product($single_id);
                                                                if ($select_one_product) {
                                                                    ?>
                                                                    <button
                                                                            type="submit" class="btn btn-danger  btn-Add-interest-Index" name="id"
                                                                            value="<?php echo $details_products4['id'] ?>">
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
                                                                            value="<?php echo $details_products4['id'] ?>">
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
                                                                        name="id" value="<?php echo $details_products4['id'] ?>">
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
                                                           data-target="#exampleModal<?php echo $details_products4['id'] ?>">
                                                            <svg style="margin-top: 4px" xmlns="http://www.w3.org/2000/svg"
                                                                 width="20" height="20" fill="currentColor" class="bi bi-share-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
                                                            </svg>
                                                        </a>

                                                    </div>                                                </div>
                                            </div>






                                            <script>
                                                document.getElementById("aleart_age2").style.display = "none";
                                            </script>





                                        <?php
                                        }
                                        }
                                        else{
                                        if ($key >= 1){
                                            continue;
                                        }else{
                                        ?>
                                            <div class="warning alert w-25" style="margin: auto;" id="aleart_age2">
                                                <div class="content">
                                                    هیج کالای در این جنسیت و رده سنی وجود ندارد.
                                                </div>
                                                <div class="icon" >
                                                    <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                        }
                                        }
                                        else{
                                        if ($key >= 1){
                                            continue;
                                        }
                                        else{
                                        ?>
                                            <div class="warning alert w-25" style="margin: auto;" id="aleart_age2">
                                                <div class="content">
                                                    هیج کالای در این جنسیت و رده سنی وجود ندارد.
                                                </div>
                                                <div class="icon" >
                                                    <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        }
                                    }
                                }else{
                                    ?>

                                    <div class="warning alert w-25" style="margin: auto;" id="aleart_age2">
                                        <div class="content">
                                            هیج کالای در این جنسیت و رده سنی وجود ندارد.
                                        </div>
                                        <div class="icon" >
                                            <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <!-- End Content -->
        </div>
    </div>
</main>
<!-- End main-content -->