<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <!-- Start title - breadcrumb -->
        <div class="title-breadcrumb-special dt-sl">
            <div class="breadcrumb dt-sl">
                <nav>
                    <a href="index.php">خانه</a>
                    <a href="single-blog.php">مقالات</a>
                    <a href="#"><?= $getArticlesById['title'] ?></a>
                </nav>
            </div>
            <div class="title-page dt-sl mb-2">
                <h1><?= $getArticlesById['title'] ?></h1>
            </div>
        </div>
        <!-- End title - breadcrumb -->

        <div class="dt-sl">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-3">
                    <div class="content-page">
                        <div class="content-desc dt-sn dt-sl">
                            <header class="entry-header dt-sl mb-3">
                                <div class="post-meta date">
                                    <i class="mdi mdi-calendar-month"></i><?= $getArticlesById['createAt'] ?>
                                </div>
                                <div class="post-meta author">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    ارسال شده توسط<a href="#"> <?= $getArticlesById['Created'] ?></a>
                                </div>

                                <?php

                                    $Single_ProductsTagMeta = explode("-", $getArticlesById['label']);
                                    $r = '';

                                    foreach ($Single_ProductsTagMeta as $Single_ProductsTagMetas){

                                        $r .= $Single_ProductsTagMetas . ',';

                                    }
                                    $r = substr($r, 0 ,-1);
                                ?>

                                <div class="post-meta category">
                                    <i class="mdi mdi-folder"></i>
                                    <a href="#"><?= $r; ?></a>
                                </div>
                            </header>
                            <div class="post-thumbnail dt-sl mb-3">
                                <?php
                                $photoBlog = getProductPhotoss3($getArticlesById['id']);
                                if ($photoBlog){
                                    $photoBlog2 = getProductPhotoss4($photoBlog['photo_id']);
                                    if (!empty($photoBlog2['name'])){
                                        ?>
                                        <img src="<?php echo DOMAIN['public'] . $photoBlog2['src'] . $photoBlog2['name']?>" alt="<?= $getArticlesById['title'] ?>">
                                        <?php
                                    }else{
                                        ?>
                                        <img width="400" height="400" src='<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>' alt="تصویر مقالات عنبری تویز">
                                        <?php
                                    }
                                }else{
                                    ?>
                                    <img width="400" height="400" src='<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>' alt="تصویر مقالات عنبری تویز">
                                    <?php
                                }
                                ?>
                            </div>
                            <?= $getArticlesById['description'] ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-3 sidebar sticky-sidebar">
                    <div class="widget-posts dt-sn dt-sl mb-3">
                        <div class="title-sidebar dt-sl mb-3">
                            <h3>جدیدترین نوشته ها</h3>
                        </div>
                        <div class="content-sidebar dt-sl">
                            <?php
                            if ($getArticles2){
                                foreach ($getArticles2 as $key => $Articles) {
                                    ?>
                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="item-thumb">
                                                <a href="single-blogs.php?id=<?= $Articles['id'] ?>">
                                                    <?php
                                                    $photoBlog = getProductPhotoss3($Articles['id']);
                                                    if ($photoBlog){
                                                        $photoBlog2 = getProductPhotoss4($photoBlog['photo_id']);
                                                        if (!empty($photoBlog2['name'])){
                                                            ?>
                                                            <img width="50" height="50" src="<?php echo DOMAIN['public'] . $photoBlog2['src'] . $photoBlog2['name']?>" alt="<?php echo $Articles['title'] ?>">
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <img  width="50" height="50"  src='<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>' alt="تصویر مقالات عنبری تویز">
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                        <img  width="50" height="50"  src='<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>' alt="تصویر مقالات عنبری تویز">
                                                        <?php
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                            <p class="title">
                                                <a href="single-blogs.php?id=<?= $Articles['id'] ?>"><?php echo $Articles['title'] ?></a>
                                            </p>
                                            <div class="item-meta">
                                                <span class="time">توسط <?php echo $Articles['Created'];?> در تاریخ <?php echo $Articles['createAt'];?></span>
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
        </div>

    </div>
</main>
<!-- End main-content -->