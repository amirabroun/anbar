<style>
    .aleart_in_css{
        margin: 0;
        padding: 0;
        box-sizing:border-box;
    }
    body{
        font-family: 'Poppins', sans-serif;
        display: flex;
        align-items:center;
        justify-content: center;
        color:#333C48;
    }
    .alert{
        display: flex;
        align-items:center;
        padding: 0.55rem 0.65rem 0.55rem 0.75rem;
        border-radius:1rem;
        min-width:400px;
        justify-content: space-between;
        margin-bottom: 2rem;
        box-shadow:
                0px 3.2px 13.8px rgba(0, 0, 0, 0.02),
                0px 7.6px 33.3px rgba(0, 0, 0, 0.028),
                0px 14.4px 62.6px rgba(0, 0, 0, 0.035),
                0px 25.7px 111.7px rgba(0, 0, 0, 0.042),
                0px 48px 208.9px rgba(0, 0, 0, 0.05),
                0px 115px 500px rgba(0, 0, 0, 0.07)
    }
    .content{
        display: flex;
        align-items:center;
    }
    .icon{
        padding: 0.5rem;
        margin-right: 1rem;
        border-radius:39% 61% 42% 58% / 50% 51% 49% 50%;
        box-shadow:
                0px 3.2px 13.8px rgba(0, 0, 0, 0.02),
                0px 7.6px 33.3px rgba(0, 0, 0, 0.028),
                0px 14.4px 62.6px rgba(0, 0, 0, 0.035),
                0px 25.7px 111.7px rgba(0, 0, 0, 0.042),
                0px 48px 208.9px rgba(0, 0, 0, 0.05),
                0px 115px 500px rgba(0, 0, 0, 0.07)
    }
    .close{
        background-color: transparent;
        border:none;
        outline:none;
        transition:all 0.2s ease-in-out;
        padding: 0.75rem;
        border-radius:0.5rem;
        cursor:pointer;
        display: flex;
        align-items:center;
        justify-content: center;
    }
    .close:hover{
        background-color: #fff;
    }

    .success{
        background-color: rgba(62, 189, 97,0.2);
        border:2px solid #3ebd61;
    }
    .success .icon{
        background-color:#3ebd61;
    }
    .info{
        background-color: rgba(0, 108, 227,0.2);
        border:2px solid #006CE3;
    }
    .info .icon{
        background-color: #006CE3;
    }
    .warning{
        background-color: rgba(239, 148, 0, 0.2);
        border:2px solid #EF9400;
    }
    .warning .icon{
        background-color: #EF9400;
    }

    .danger{
        background-color: rgba(236, 77, 43, 0.2);
        border:2px solid #EF9400;
    }
    .danger .icon{
        background-color: #EC4D2B;
    }
</style>
<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <div class="row">

            <?php
            require_once 'views/partial/sidebar3.php';
            ?>





            <!-- Start Content -->
            <div class="col-lg-9 col-md-12 col-sm-12 search-card-res">
                <div class="dt-sl dt-sn px-0 search-amazing-tab">
                    <div class="ah-tab-wrapper dt-sl">
                        <div class="ah-tab dt-sl">
                            <a class="ah-tab-item" data-ah-tab-active="true" href="">جدید ترین مرتبط با این مجموعه</a>
                        </div>
                    </div>


                    <div class="ah-tab-content-wrapper dt-sl px-res-0">




                        <div class="ah-tab-content dt-sl" data-ah-tab-active="true">

                            <div class="row mb-3 mx-0 px-res-0">
                                <?php
                                $getcategoryByCollectionInn = getcategoryByCollectionInn($_GET['id']);
                                if ($getcategoryByCollectionInn){
                                    foreach ($getcategoryByCollectionInn as $getcategoryByCollectionInnnnn)
                                $category = getcategoryByCollection($getcategoryByCollectionInnnnn['id']);
                                if ($category){
                                    foreach ($category as $test){
                                    $getLastProducts=getLastProductsByCategoryy($test['id']);
                                    if ($getLastProducts){
                                        foreach ($getLastProducts as $products){
                                ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                    <div class="product-card mb-2 mx-res-0">
                                        <div class="product-head">
                                            <div class="discount">
                                                <span><?php $cal_percentage = $products['price'] - ($products['price_discounted']); echo cal_percentage(  $cal_percentage, $products['price']).'%<br/>'; ?></span>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="<?php echo productUrl($products['tracking_code'])?>" style="margin-top: 20px;">
                                            <?php

                                            if (!empty($products['photo_name'])){
                                                ?>
                                                <img  height="120" width="150" src='<?php echo normalizedPath(DOMAIN['public'], $products['photo_src'], $products['photo_name'])?>' alt='Product Thumbnail'>
                                                <?php
                                            }else{
                                                ?>
                                                <img  height="120" width="150" src='<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>' alt='Product Thumbnail'>
                                                <?php
                                            }
                                            ?>
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="<?php echo productUrl($products['tracking_code'])?>"><?php echo $products['title'] ?></a>
                                            </h5>
                                            <a class="product-meta" href="<?php echo productUrl($products['tracking_code'])?>"><?php echo $products['category_title']?></a>
                                            <span class='product-price'>
                                        <?php
                                        if (empty($products['price_discounted']))
                                        {
                                            ?>
                                            <strong><?php echo priceFormant($products['price'])?> </strong>
                                            <?php
                                        } else
                                        {
                                            ?>
                                            <strong class="text-danger"><?php echo priceFormant($products['price_discounted'])?> </strong>
                                            <br>
                                            <del><?php echo priceFormant($products['price'])?></del>
                                            <?php
                                        }
                                        ?> </span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                    }
                                    }
                                    }else{
                                    ?>

                                    <div class="warning alert w-25" style="margin: auto;">
                                        <div class="content">
                                            هیج کالای در این دسته بندی وجود ندارد.
                                        </div>
                                        <div class="icon" >
                                            <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
                                        </div>
                                    </div>

                                    <?php
                                }
                                }
                                ?>
                            </div>


                        </div>


                        <!--<div class="ah-tab-content dt-sl">

                        <div class="row mb-3 mx-0 px-res-0">
                            <?php
/*                            $getcategoryByCollectionInn = getcategoryByCollectionInn($_GET['id']);
                            if ($getcategoryByCollectionInn){
                                foreach ($getcategoryByCollectionInn as $getcategoryByCollectionInnnnn)
                                    $category = getcategoryByCollection($getcategoryByCollectionInnnnn['id']);
                                if ($category){
                                    foreach ($category as $test){
                                        $getLastProducts=getLastProductsByCategoryIsId($test['id']);

                                        if ($getLastProducts){
                                            foreach ($getLastProducts as $products){
                                                */?>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                                    <div class="product-card mb-2 mx-res-0">
                                                        <div class="product-head">
                                                            <div class="discount">
                                                                <span><?php /*$cal_percentage = $products['price'] - ($products['price_discounted']); echo cal_percentage(  $cal_percentage, $products['price']).'%<br/>'; */?></span>
                                                            </div>
                                                        </div>
                                                        <a class="product-thumb" href="<?php /*echo productUrl($products['tracking_code'])*/?>" style="margin-top: 20px;">
                                                            <?php
/*
                                                            if (!empty($products['photo_name'])){
                                                                */?>
                                                                <img  height="120" width="150" src='<?php /*echo normalizedPath(DOMAIN['public'], $products['photo_src'], $products['photo_name'])*/?>' alt='Product Thumbnail'>
                                                                <?php
/*                                                            }else{
                                                                */?>
                                                                <img  height="120" width="150" src='<?php /*echo normalizedPath(DOMAIN['public'],'/images/180.png')*/?>' alt='Product Thumbnail'>
                                                                <?php
/*                                                            }
                                                            */?>
                                                        </a>
                                                        <div class="product-card-body">
                                                            <h5 class="product-title">
                                                                <a href="<?php /*echo productUrl($products['tracking_code'])*/?>"><?php /*echo $products['title'] */?></a>
                                                            </h5>
                                                            <a class="product-meta" href="<?php /*echo productUrl($products['tracking_code'])*/?>"><?php /*echo $products['category_title']*/?></a>
                                                            <span class='product-price'>
                                    <?php
/*                                    if (empty($products['price_discounted']))
                                    {
                                        */?>
                                        <strong><?php /*echo priceFormant($products['price'])*/?> </strong>
                                        <?php
/*                                    } else
                                    {
                                        */?>
                                        <strong class="text-danger"><?php /*echo priceFormant($products['price_discounted'])*/?> </strong>
                                        <br>
                                        <del><?php /*echo priceFormant($products['price'])*/?></del>
                                        <?php
/*                                    }
                                    */?> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
/*                                            }
                                        }
                                    }
                                }else{
                                    */?>

                                    <div class="warning alert w-25" style="margin: auto;">
                                        <div class="content">
                                            هیج کالای در این دسته بندی وجود ندارد.
                                        </div>
                                        <div class="icon" >
                                            <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
                                        </div>
                                    </div>

                                    <?php
/*                                }
                            }
                            */?>
                    </div>


                        </div>


                        <div class="ah-tab-content dt-sl">

                        <div class="row mb-3 mx-0 px-res-0">
                            <?php
/*                            $getcategoryByCollectionInn = getcategoryByCollectionInn($_GET['id']);
                            if ($getcategoryByCollectionInn){
                                foreach ($getcategoryByCollectionInn as $getcategoryByCollectionInnnnn)
                                    $category = getcategoryByCollection($getcategoryByCollectionInnnnn['id']);
                                if ($category){
                                    foreach ($category as $test){
                                        $getLastProducts=getLastProductsByCategoryIsPriseZero($test['id']);



                                        if ($getLastProducts){
                                            foreach ($getLastProducts as $products){
                                                */?>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                                    <div class="product-card mb-2 mx-res-0">
                                                        <div class="product-head">
                                                            <div class="discount">
                                                                <span><?php /*$cal_percentage = $products['price'] - ($products['price_discounted']); echo cal_percentage(  $cal_percentage, $products['price']).'%<br/>'; */?></span>
                                                            </div>
                                                        </div>
                                                        <a class="product-thumb" href="<?php /*echo productUrl($products['tracking_code'])*/?>" style="margin-top: 20px;">
                                                            <?php
/*
                                                            if (!empty($products['photo_name'])){
                                                                */?>
                                                                <img  height="120" width="150" src='<?php /*echo normalizedPath(DOMAIN['public'], $products['photo_src'], $products['photo_name'])*/?>' alt='Product Thumbnail'>
                                                                <?php
/*                                                            }else{
                                                                */?>
                                                                <img  height="120" width="150" src='<?php /*echo normalizedPath(DOMAIN['public'],'/images/180.png')*/?>' alt='Product Thumbnail'>
                                                                <?php
/*                                                            }
                                                            */?>
                                                        </a>
                                                        <div class="product-card-body">
                                                            <h5 class="product-title">
                                                                <a href="<?php /*echo productUrl($products['tracking_code'])*/?>"><?php /*echo $products['title'] */?></a>
                                                            </h5>
                                                            <a class="product-meta" href="<?php /*echo productUrl($products['tracking_code'])*/?>"><?php /*echo $products['category_title']*/?></a>
                                                            <span class='product-price'>
                                    <?php
/*                                    if (empty($products['price_discounted']))
                                    {
                                        */?>
                                        <strong><?php /*echo priceFormant($products['price'])*/?> </strong>
                                        <?php
/*                                    } else
                                    {
                                        */?>
                                        <strong class="text-danger"><?php /*echo priceFormant($products['price_discounted'])*/?> </strong>
                                        <br>
                                        <del><?php /*echo priceFormant($products['price'])*/?></del>
                                        <?php
/*                                    }
                                    */?> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
/*                                            }
                                        }
                                    }
                                }else{
                                    */?>

                                    <div class="warning alert w-25" style="margin: auto;">
                                        <div class="content">
                                            هیج کالای در این دسته بندی وجود ندارد.
                                        </div>
                                        <div class="icon" >
                                            <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
                                        </div>
                                    </div>

                                    <?php
/*                                }
                            }
                            */?>
                    </div>-->


                        <!--</div>-->


                        <!--<div class="ah-tab-content dt-sl">
                            <div class="row mb-3 mx-0 px-res-0">
                                <?php
/*                                if ($getLastProducts){
                                    foreach ($getLastProducts as $productCategory){
                                        */?>
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                            <div class="product-card mb-2 mx-res-0">
                                                <div class="product-head">
                                                    <div class="discount">
                                                        <span><?php /*$cal_percentage = $productCategory['price'] - ($productCategory['price_discounted']); echo cal_percentage(  $cal_percentage, $productCategory['price']).'%<br/>'; */?></span>
                                                    </div>
                                                </div>
                                                <a class="product-thumb" href="<?php /*echo productUrl($productCategory['tracking_code'])*/?>" style="margin-top: 20px;">
                                                    <?php
/*
                                                    if (!empty($productCategory['photo_name'])){
                                                        */?>
                                                        <img  height="120" width="150" src='<?php /*echo normalizedPath(DOMAIN['public'], $productCategory['photo_src'], $productCategory['photo_name'])*/?>' alt='Product Thumbnail'>
                                                        <?php
/*                                                    }else{
                                                        */?>
                                                        <img  height="120" width="150" src='<?php /*echo normalizedPath(DOMAIN['public'],'/images/180.png')*/?>' alt='Product Thumbnail'>
                                                        <?php
/*                                                    }
                                                    */?>
                                                </a>
                                                <div class="product-card-body">
                                                    <h5 class="product-title">
                                                        <a href="<?php /*echo productUrl($productCategory['tracking_code'])*/?>"><?php /*echo $productCategory['title'] */?></a>
                                                    </h5>
                                                    <a class="product-meta" href="<?php /*echo productUrl($productCategory['tracking_code'])*/?>"><?php /*echo $productCategory['category_title']*/?></a>
                                                    <span class='product-price'>
                                        <?php
/*                                        if (empty($productCategory['price_discounted']))
                                        {
                                            */?>
                                            <strong><?php /*echo priceFormant($productCategory['price'])*/?> </strong>
                                            <?php
/*                                        } else
                                        {
                                            */?>
                                            <strong class="text-danger"><?php /*echo priceFormant($productCategory['price_discounted'])*/?> </strong>
                                            <br>
                                            <del><?php /*echo priceFormant($productCategory['price'])*/?></del>
                                            <?php
/*                                        }
                                        */?> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
/*                                    }
                                }else{
                                    */?>

                                    <div class="warning alert w-25" style="margin: auto;">
                                        <div class="content">
                                            هیج کالای در این دسته بندی وجود ندارد.
                                        </div>
                                        <div class="icon" >
                                            <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
                                        </div>
                                    </div>

                                    <?php
/*                                }
                                */?>                            </div>
                        </div>

                        <div class="ah-tab-content dt-sl">
                            <div class="row mb-3 mx-0 px-res-0">
                                <?php
/*                                if ($getLastProductsPriseZero){
                                    foreach ($getLastProductsPriseZero as $productCategory){
                                        */?>
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                            <div class="product-card mb-2 mx-res-0">
                                                <div class="product-head">
                                                    <div class="discount">
                                                        <span><?php /*$cal_percentage = $productCategory['price'] - ($productCategory['price_discounted']); echo cal_percentage(  $cal_percentage, $productCategory['price']).'%<br/>'; */?></span>
                                                    </div>
                                                </div>
                                                <a class="product-thumb" href="<?php /*echo productUrl($productCategory['tracking_code'])*/?>" style="margin-top: 20px;">
                                                    <?php
/*
                                                    if (!empty($productCategory['photo_name'])){
                                                        */?>
                                                        <img  height="120" width="150" src='<?php /*echo normalizedPath(DOMAIN['public'], $productCategory['photo_src'], $productCategory['photo_name'])*/?>' alt='Product Thumbnail'>
                                                        <?php
/*                                                    }else{
                                                        */?>
                                                        <img  height="120" width="150" src='<?php /*echo normalizedPath(DOMAIN['public'],'/images/180.png')*/?>' alt='Product Thumbnail'>
                                                        <?php
/*                                                    }
                                                    */?>
                                                </a>
                                                <div class="product-card-body">
                                                    <h5 class="product-title">
                                                        <a href="<?php /*echo productUrl($productCategory['tracking_code'])*/?>"><?php /*echo $productCategory['title'] */?></a>
                                                    </h5>
                                                    <a class="product-meta" href="<?php /*echo productUrl($productCategory['tracking_code'])*/?>"><?php /*echo $productCategory['category_title']*/?></a>
                                                    <span class='product-price'>
                                        <?php
/*                                        if (empty($productCategory['price_discounted']))
                                        {
                                            */?>
                                            <strong><?php /*echo priceFormant($productCategory['price'])*/?> </strong>
                                            <?php
/*                                        } else
                                        {
                                            */?>
                                            <strong class="text-danger"><?php /*echo priceFormant($productCategory['price_discounted'])*/?> </strong>
                                            <br>
                                            <del><?php /*echo priceFormant($productCategory['price'])*/?></del>
                                            <?php
/*                                        }
                                        */?> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
/*                                    }
                                }else{
                                    */?>

                                    <div class="warning alert w-25" style="margin: auto;">
                                        <div class="content">
                                            هیج کالای در این دسته بندی وجود ندارد.
                                        </div>
                                        <div class="icon" >
                                            <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
                                        </div>
                                    </div>

                                    <?php
/*                                }
                                */?>                            </div>
                        </div>

                        <div class="ah-tab-content dt-sl">
                            <div class="row mb-3 mx-0 px-res-0">
                                <?php
/*                                if ($getLastProductsPriseFool){
                                    foreach ($getLastProductsPriseFool as $productCategory){
                                        */?>
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                            <div class="product-card mb-2 mx-res-0">
                                                <div class="product-head">
                                                    <div class="discount">
                                                        <span><?php /*$cal_percentage = $productCategory['price'] - ($productCategory['price_discounted']); echo cal_percentage(  $cal_percentage, $productCategory['price']).'%<br/>'; */?></span>
                                                    </div>
                                                </div>
                                                <a class="product-thumb" href="<?php /*echo productUrl($productCategory['tracking_code'])*/?>" style="margin-top: 20px;">
                                                    <?php
/*
                                                    if (!empty($productCategory['photo_name'])){
                                                        */?>
                                                        <img  height="120" width="150" src='<?php /*echo normalizedPath(DOMAIN['public'], $productCategory['photo_src'], $productCategory['photo_name'])*/?>' alt='Product Thumbnail'>
                                                        <?php
/*                                                    }else{
                                                        */?>
                                                        <img  height="120" width="150" src='<?php /*echo normalizedPath(DOMAIN['public'],'/images/180.png')*/?>' alt='Product Thumbnail'>
                                                        <?php
/*                                                    }
                                                    */?>
                                                </a>
                                                <div class="product-card-body">
                                                    <h5 class="product-title">
                                                        <a href="<?php /*echo productUrl($productCategory['tracking_code'])*/?>"><?php /*echo $productCategory['title'] */?></a>
                                                    </h5>
                                                    <a class="product-meta" href="<?php /*echo productUrl($productCategory['tracking_code'])*/?>"><?php /*echo $productCategory['category_title']*/?></a>
                                                    <span class='product-price'>
                                        <?php
/*                                        if (empty($productCategory['price_discounted']))
                                        {
                                            */?>
                                            <strong><?php /*echo priceFormant($productCategory['price'])*/?> </strong>
                                            <?php
/*                                        } else
                                        {
                                            */?>
                                            <strong class="text-danger"><?php /*echo priceFormant($productCategory['price_discounted'])*/?> </strong>
                                            <br>
                                            <del><?php /*echo priceFormant($productCategory['price'])*/?></del>
                                            <?php
/*                                        }
                                        */?> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
/*                                    }
                                }else{
                                    */?>

                                    <div class="warning alert w-25" style="margin: auto;">
                                        <div class="content">
                                            هیج کالای در این دسته بندی وجود ندارد.
                                        </div>
                                        <div class="icon" >
                                            <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
                                        </div>
                                    </div>

                                    <?php
/*                                }
                                */?>                            </div>
                        </div>-->

                    </div>
                </div>
            </div>
            <!-- End Content -->
        </div>
    </div>
</main>
<!-- End main-content -->

