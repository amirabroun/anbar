<!-- Start Banner -->
<div class='row mt-3 mb-5'>
    <div class='col-12'>
        <div class='widget-banner'>
            <h5 style="text-align: center">دسته بندی مورد نظر خودت رو انتخاب کن</h5>
            <div class='col-12 mt-4'>
                <div class='brand-slider carousel-lg owl-carousel owl-theme'>
                    <?php
                    $category = selectCategoryIndex();
                    $class = 'list-item-has-children';
                    if ($category){
                    foreach ($category as $key=> $gory){
                        $categoryPlus = $key+1;
                        $categoryPlusItem = $category[$categoryPlus] ?? null;
                        if (($key % 2 == 0 && $key!=0) || $key==1 ) {
                            continue;
                        }
                    ?>
                    <div class='item'>
                        <a href='<?php echo cagegorystUrl($gory['id'])?>'>

                        <?php
                        $categorys = getProductPhotoss($gory['id']);
                        if (!empty($categorys['name'])){
                            ?>
                            <img  height="120" width="150" src='<?php echo DOMAIN['public'] . $categorys['src'] . $categorys['name']?>' alt='<?php echo $gory['title'] ?>'>
                            <?php
                        }else{
                            ?>
                            <img  height="120" width="150" src='<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>' alt='تصویر دسته بندی های عنبری تویز'>
                            <?php
                        }
                        ?>
                        </a>
                        <a style="text-align: center;margin-left: 33%" href='<?php echo cagegorystUrl($gory['id'])?>'>
                            <span class="text-dark"><?php echo $gory['title'] ?></span>
                        </a>
                        
                        
                        <a href='<?php echo cagegorystUrl($categoryPlusItem['id'])?>'>

                        <?php
                        $categorysImageItem = getProductPhotoss($categoryPlusItem['id']);
                        if (!empty($categorysImageItem['name'])){
                            ?>
                            <img  height="120" width="150" src='<?php echo DOMAIN['public'] . $categorysImageItem['src'] . $categorysImageItem['name']?>' alt='<?php echo $categoryPlusItem['title'] ?>'>
                            <?php
                        }else{
                            ?>
                            <img  height="120" width="150" src='<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>' alt='تصویر دسته بندی های عنبری تویز'>
                            <?php
                        }
                        ?>
                        </a>
                        <a style="text-align: center;margin-left: 33%" href='<?php echo cagegorystUrl($gory['id'])?>'>
                            <span class="text-dark"><?php echo $categoryPlusItem['title'] ?></span>
                        </a>
                        
                        
                    </div>
                        <?php
                    }
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class='widget-banner mt-5 mb-2'>
            <h5 style="text-align: center"><span style="font-size: 100%"><span style="font-size: 80%;color: #5d5d5d">کوچولوت چند سالشه؟</span></h5>
            <div class='col-12 mt-4'>
                <div class='brand-slider carousel-lg owl-carousel owl-theme'>
                    <?php
                    $categoryAge = selectCategoryAge();
                    $class = 'list-item-has-children';
                    if ($categoryAge){
                    foreach ($categoryAge as $gory){
                    ?>
                    <div class='item'>
                        <a href='<?php echo cagegorystUrl($gory['id'])?>'>

                        <?php
                        $categorys = getProductPhotoss($gory['id']);
                        if (!empty($categorys['name'])){
                            ?>
                            <img  height="120" width="150" src='<?php echo DOMAIN['public'] . $categorys['src'] . $categorys['name']?>' alt='<?php echo $gory['title'] ?>'>
                            <?php
                        }else{
                            ?>
                            <img  height="120" width="150" src='<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>' alt='تصویر دسته بندی سن عنبری تویز'>
                            <?php
                        }
                        ?>
                        </a>
                        <a style="text-align: center;margin-left: 33%" href='<?php echo cagegorystUrl($gory['id'])?>'>
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
    </div>
</div>
<!-- End Banner -->