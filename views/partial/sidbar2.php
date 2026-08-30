<!-- Start Sidebar -->
<div class="col-lg-3 col-md-12 col-sm-12 sticky-sidebar">
    <div class="dt-sn mb-3">
        <div class="col-12">
            <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide">
                <h2>فیلتر محصولات</h2>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="widget-search">
                <form method="get" action="search.php" class='search'>
                    <input name="search" type='text'
                           placeholder='به فارسی یا انگلیسی یا کد محصول را جستجو کنید…'>
                    <button type="submit" class="btn-search-widget">
                        <img src="/assets/img/theme/search.png" alt="جست و جو در عنبری تویز">
                    </button>
                </form>
            </div>
        </div>
        <form action="">
            <div class="col-12 filter-product mb-3">
                <div class="accordion" id="accordionExample">
                    <!--<div class="card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-right collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">
                                    مجموعه ها
                                    <i class="mdi mdi-chevron-down"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                             data-parent="#accordionExample">
                            <div class="card-body">

                                <?php
/*                                $Collection = getcategoryByCollectionIn();
                                if ($Collection){
                                    foreach ($Collection as $gory){
                                        */?>
                                        <a style="margin-top: -10px;" class='nav-link text-dark text-center hover btn-info' href='<?php /*echo collectionstUrl($gory['id'])*/?>'><?php /*echo $gory['title'] */?></a>
                                        <hr style="margin-top: -2px">
                                        <?php
/*                                    }
                                }
                                */?>

                            </div>
                        </div>
                    </div>-->

                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-right collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="false" aria-controls="collapseOne">
                                    دسته بندی
                                    <i class="mdi mdi-chevron-down"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">

                                <div class="custom-control custom-checkbox">
                                    <?php
                                    $category = selectCategory();
                                    $class = 'list-item-has-children';
                                    if ($category){
                                        foreach ($category as $gory){
                                            ?>
                                            <a href='<?php echo cagegorystUrl($gory['id'])?>'>
                                                    <div class="custom-control custom-checkbox text-dark mt-1">
                                                        <input class="custom-control-input">
                                                        <label class="custom-control-label"><?php echo $gory['title'] ?></label>
                                                    </div>
                                            </a>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-right collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                        برند
                                        <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                 data-parent="#accordionExample">
                                <div class="card-body">

                                    <?php
                                    $brand = selectBrand();
                                    if ($brand){
                                        foreach ($brand as $gory){
                                            ?>
                                            <a href='<?php echo brandtUrl($gory['id'])?>'>
                                                <?php
                                                if (pagename()==='brand' && $_GET['id'] === $gory['id']){
                                                    ?>
                                                    <input style="margin-top: 10px;" type="checkbox" id="coding" name="interest" value="coding" checked>
                                                    <label class="label" style="font-size: 15px;color: #333333;"><?php echo $gory['title'] ?></label>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <div class="custom-control custom-checkbox text-dark mt-1">
                                                        <input class="custom-control-input">
                                                        <label class="custom-control-label"><?php echo $gory['title'] ?></label>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </a>
                                            <?php
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
        </form>
<hr>


                    <form method="get" action="price.php" >
                        <div class="row align-items-center mb-2">
                            <div class="mr-3"><label for="widget-rtlproductprice-2-widget-min">حداقل قیمت:</label></div>
                            <div class="col">
                                <div class="input-group w-100">
                                    <div class="input-field input-has-append">
                                        <input id="widget-rtlproductprice-2-widget-min" type="number" name="minPrice" pattern="[0-9]{1,}" class="form-control" value="
                                             <?php
                                                if (isset($_SESSION['minPrice'])){
                                                    echo $_SESSION['minPrice'];
                                                    }
                                                ?>
                                        " data-widget="حداقل قیمت" placeholder=" مثلا: 300 هزار تومان">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center mb-3">
                            <div class="mr-3"><label for="widget-rtlproductprice-2-widget-max">حداکثر قیمت:</label></div>
                            <div class="col">
                                <div class="input-group w-100">
                                    <div class="input-field input-has-append">
                                        <input id="widget-rtlproductprice-2-widget-min" type="number" name="maxPrice" pattern="[0-9]{1,}" class="form-control" value="
                                            <?php
                                                if (isset($_SESSION['maxPrice'])){
                                                    echo $_SESSION['maxPrice'];
                                                }
                                            ?>
                                        " data-widget="حداقل قیمت" placeholder=" مثلا: 300 هزار تومان">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="">
                                <button type="submit" class="btn btn-info mr-5">فیلتر قیمت</button>
                            </div>
                            <div class="mr-4">
                                <a href="products.php" class="btn btn-danger">حذف فیلتر ها</a>
                            </div>
                        </div>
                    </form>




                </div>
            </div>

    </div>
</div>
<!-- End Sidebar -->