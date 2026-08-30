<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">

        <div class="row mt-5">
            <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-3">
                <div class="row">
                    <?php
                    $getArticles = getArticles();
                    $getArticles2 = getArticles2();

                    if ($getArticles){
                        foreach ($getArticles as $key => $Articles) {
                            ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="post-card">
                                    <div class="post-thumbnail">
                                        <a href="single-blogs.php?id=<?= $Articles['id'] ?>">
                                            <?php
                                            $photoBlog = getProductPhotoss3($Articles['id']);
                                            if ($photoBlog){
                                            $photoBlog2 = getProductPhotoss4($photoBlog['photo_id']);
                                            if (!empty($photoBlog2['name'])){
                                                ?>
                                                <img src="<?php echo DOMAIN['public'] . $photoBlog2['src'] . $photoBlog2['name']?>" alt="<?php echo $Articles['title'] ?>">
                                                <?php
                                            }else{
                                                ?>
                                                <img src='<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>' alt="تصویر مقالات عنبری تویز">
                                                <?php
                                            }
                                            }else{
                                                ?>
                                                <img src='<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>' alt="تصویر مقالات عنبری تویز">
                                                <?php
                                            }
                                            ?>
                                        </a>
                                        <span class="post-tag">مقاله</span>

                                    </div>
                                    <div class="post-title">
                                        <a href="single-blogs.php?id=<?= $Articles['id'] ?>">
                                            <?php echo $Articles['title'] ?>
                                        </a>
                                        <span class="post-date">
                                             توسط <?php echo $Articles['Created'];?> در تاریخ <?php echo $Articles['createAt'];?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }else{
                        ?>
                        <li>
                            <div class="comment-body mt-3">
                                <div class="row">
                                    <div class="col-12 comment-content">
                                        <div class="warning alert w-25" style="margin: auto;">
                                            <div class="content">
                                                <p>در حال حاضر هیچ مقاله وجود ندارد.</p>
                                            </div>
                                            <div class="icon" >
                                                <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </li>
                        <?php
                    }
                    ?>

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
                                                <img  width="50" height="50"  src='<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>' alt="جدید ترین مقالات عنبری تویز">
                                                <?php
                                            }
                                        }else{
                                            ?>
                                            <img  width="50" height="50"  src='<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>' alt="جدید ترین مقالات عنبری تویز">
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
</main>
<!-- End main-content -->