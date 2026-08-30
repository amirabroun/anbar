<header class='main-header js-fixed-topbar dt-sl' style="margin-top:39px">
    <!-- Start topbar -->
    <div class='container main-container'>
        <div class='topbar dt-sl'>
            <div class='row'>
                <div class='col-lg-2 col-md-3 col-6' style="margin-right: 25px;position: absolute;margin-top: -12px">
                    <div class='logo-area float-right'>
                        <a href='/'>
                            <img src='/assets/img/logoo.png' alt='لوگوی عنبری تویز' width="60">
                            <span class='anbaryToysName'>عنبری تویز</span>
                        </a>
                    </div>
                </div>
                <div class='col-md-6 col-6 topbar-left' style="margin-right: auto;">
                    <ul class='nav float-left ml-2 mb-1'>
                        <?php
                        if (isset($_SESSION['cart_user']) && count($_SESSION['cart_user']['products']) > 0) {
                            $cart_products = $_SESSION['cart_user']['products'];
                            $total_amount = $_SESSION['cart_user']['summary']['total_amount'];
                            $amount_payable = $_SESSION['cart_user']['summary']['amount_payable'];
                            $number_product = count($cart_products);
                            ?>
                            <li class='nav-item' style="margin-left: 20px">
                                <a class='nav-link btn text-dark shadow' href='#' data-toggle='dropdown'
                                   aria-haspopup='true'
                                   aria-expanded='false'>
                                    <span class='label-dropdown'>سبد خرید</span>
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\فروشگاه\Cart1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M18.1446364,11.84388 L17.4471627,16.0287218 C17.4463569,16.0335568 17.4455155,16.0383857 17.4446387,16.0432083 C17.345843,16.5865846 16.8252597,16.9469884 16.2818833,16.8481927 L4.91303792,14.7811299 C4.53842737,14.7130189 4.23500006,14.4380834 4.13039941,14.0719812 L2.30560137,7.68518803 C2.28007524,7.59584656 2.26712532,7.50338343 2.26712532,7.4104669 C2.26712532,6.85818215 2.71484057,6.4104669 3.26712532,6.4104669 L16.9929851,6.4104669 L17.606173,3.78251876 C17.7307772,3.24850086 18.2068633,2.87071314 18.7552257,2.87071314 L20.8200821,2.87071314 C21.4717328,2.87071314 22,3.39898039 22,4.05063106 C22,4.70228173 21.4717328,5.23054898 20.8200821,5.23054898 L19.6915238,5.23054898 L18.1446364,11.84388 Z" fill="#000000" opacity="0.3"/>
        <path d="M6.5,21 C5.67157288,21 5,20.3284271 5,19.5 C5,18.6715729 5.67157288,18 6.5,18 C7.32842712,18 8,18.6715729 8,19.5 C8,20.3284271 7.32842712,21 6.5,21 Z M15.5,21 C14.6715729,21 14,20.3284271 14,19.5 C14,18.6715729 14.6715729,18 15.5,18 C16.3284271,18 17,18.6715729 17,19.5 C17,20.3284271 16.3284271,21 15.5,21 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                    <span class='count'><?php echo $number_product ?></span>
                                </a>
                                <div class='dropdown-menu cart dropdown-menu-sm dropdown-menu-left'>
                                    <div class='dropdown-header'>سبد خرید</div>
                                    <div class='dropdown-list-icons'>
                                        <?php
                                        foreach ($cart_products as $key=> $product) {

                                            $detailproduct = getDetailsCart2($product['id']);
                                            $selectPhotoProducts = selectPhotoProducts($product['id']);
                                            $selectPhotosByID = $selectPhotoProducts ? selectPhotosByID($selectPhotoProducts['photo_id']) : false;
                                            $detailproduct['photo_name'] = $selectPhotosByID['name'];
                                            $detailproduct['photo_src'] = $selectPhotosByID['src'];
                                            ?>
                                            <a href="<?php echo productUrl($detailproduct['tracking_code']) ?>"
                                               target="_blank" class='dropdown-item'>
                                                <div class='dropdown-item-icon'>
                                                    <?php

                                                    if (!empty($detailproduct['photo_name'])) {
                                                        ?>
                                                        <img src="<?php echo normalizedPath(DOMAIN['public'], $detailproduct['photo_src'], $detailproduct['photo_name']) ?>"
                                                             alt='<?php echo $detailproduct['title']; ?>'>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img src="<?php echo normalizedPath(DOMAIN['public'], '/images/180.png') ?>"
                                                             alt='عکس محصولات عنبری تویز'>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class='mr-3'>
                                                    <?php
                                                    if (isset($detailproduct['title'] )){
                                                        echo $detailproduct['title'];
                                                    }
                                                    ?>
                                                    <div class='pt-1'>
                                                        <?php
                                                        if (empty($detailproduct['price_discounted'])) {
                                                            ?>
                                                            <strong><?php echo priceFormant($product['price']) ?> </strong>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <strong class="text-danger"><?php echo priceFormant($product['price_discounted']) ?> </strong>
                                                            <br>
                                                            <del><?php echo priceFormant($product['price']) ?></del>
                                                            <?php
                                                        }
                                                        ?></div>
                                                </div>
                                                <form method="post" class="test_<?php echo $product['id'] ?>">
                                                    <input type="hidden" name="action"
                                                           value="delete_product_in_mini_cart">
                                                    <input type="hidden" name="product_id"
                                                           value="<?php echo $product['id'] ?>">
                                                </form>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <hr>
                                    <div class='dropdown-footer text-center'>
                                        <div class='dt-sl mb-3'>
                                            <span class='float-right'>جمع :</span>
                                            <span class='float-left'><?php echo priceFormant($amount_payable) ?></span>
                                        </div>
                                        <a href='/cart.php' class='btn btn-success'>مشاهده سبد خرید</a>
                                        <?php
                                        if (isset($_SESSION['user_sing'])) {
                                            ?>
                                            <a href='shopping.php' class='btn btn-primary'>پرداخت</a>
                                            <?php
                                        } else {
                                            ?>
                                            <form method="post" action="">
                                                <input type="hidden" name="action" value="finishCart">
                                                <button type="submit" class="btn btn-primary px-3 mt-3 mr-2">
                                                    ورود و پرداخت
                                                </button>
                                            </form>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <?php
                        } else {
                        ?>
                        <li class='nav-item'>
                            <a class='nav-link  btn text-dark shadow' href='/cart.php'>
                                <span class='label-dropdown'>سبد خرید</span>
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <img src="/cart.png" width="25"> 
                                </span>
                            </a>
                            <!--<div class='dropdown-menu cart dropdown-menu-sm dropdown-menu-left'>

                                <div class="cart-page cart-empty">
                                    <div class="circle-box-icon"><i class="mdi mdi-cart-remove"></i></div>
                                </div>
                                <div class='dropdown-header' style="text-align: center">سبد خرید شما خالی است</div>
                                <div class='dropdown-list-icons'>
                                </div>
                            </div>
                        </li>-->
                            <?php
                            }
                            ?>

                    </ul>

                    <ul class='nav float-left nav-item'>
                        <?php
                        if (isset($_SESSION['user_sing'])) {
                            ?>
                            <a class='nav-link  btn shadow ml-2'
                               href="<?php echo userinterestUrl($_SESSION['user_sing']) ?>">
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\عمومی\Half-heart.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M12,19.5 C6,16 3,12.6834696 3,9.55040872 C3,6.72217984 4.651,4.5 7.5,4.5 C9.1095,4.5 10.99175,6.32463215 12,7.5 L12,19.5 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>
                            </a>
                            <?php
                        } else {
                            ?>

                            <?php
                        }
                        ?>

                    </ul>

                    <ul class='nav float-left nav-item'>
                        <?php
                        if (isset($_SESSION['user_sing'])) {
                            ?>
                            <a class='nav-link  btn text-dark shadow ml-2' href='' data-toggle='dropdown'
                               aria-haspopup='true'
                               aria-expanded='false'>
                                <span class='label-dropdown'>حساب کاربری</span>
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\عمومی\User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>
                            </a>
                            <div class='dropdown-menu dropdown-menu-sm dropdown-menu-left'>
                                <a class='dropdown-item' href='<?php echo userUrl($_SESSION['user_sing']) ?>'>
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                         <img src="/login.png" width="25"> 
                                    </span>
                                    پروفایل
                                </a>
                                <a class='dropdown-item' href='<?php echo userUrlupdate($_SESSION['user_sing']) ?>'>
                                    <i class='mdi mdi-account-edit-outline'></i>ویرایش حساب کاربری
                                </a>
                                <div class='dropdown-divider' role='presentation'></div>
                                <a class='dropdown-item' href='/loginout.php'>
                                    <i class='mdi mdi-logout-variant'></i>خروج
                                </a>
                            </div>
                            <?php
                        } else {
                            ?>
                            <a class='nav-link btn text-dark shadow ml-2' href='login.php'>
                                <span class='label-dropdown'>ورود | ثبت نام</span>
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <img src="/login.png" width="25"> 
                                </span>
                            </a>
                            <?php
                        }
                        ?>

                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- End topbar -->

       <!-- Start bottom-header -->
    <div class='bottom-header dt-sl mb-sm-bottom-header'>
        <div class='container main-container'>
            <!-- Start Main-Menu -->
            <nav class='main-menu dt-sl'>
                <ul class='list float-right hidden-sm col-lg-8'>
                    <!-- mega menu 2 column -->
                    <li class='list-item mega-menu mega-menu-col-2'>
                        <a class='nav-link' href='index.php'>
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\خانه\خانه-heart.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 C2.99998155,19.0000663 2.99998155,19.0000652 2.99998155,19.0000642 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z" fill="#000000" opacity="0.3"/>
        <path d="M13.8,12 C13.1562,12 12.4033,12.7298529 12,13.2 C11.5967,12.7298529 10.8438,12 10.2,12 C9.0604,12 8.4,12.8888719 8.4,14.0201635 C8.4,15.2733878 9.6,16.6 12,18 C14.4,16.6 15.6,15.3 15.6,14.1 C15.6,12.9687084 14.9396,12 13.8,12 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span>
                            خانه</a>
                    </li>
                    <!-- dropdown-menu -->
                    <li class='list-item list-item-has-children menu-col-1'>
                        <a class='nav-link' href='#'>

                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\ساختار\ساختار-4-blocks.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span>

                            دسته بندی کالا ها</a>
                        <ul class='sub-menu nav'>

                            <?php
                            $category = selectCollation2();
                            $class = 'list-item-has-children';
                            if ($category) {
                                foreach ($category as $gory) {
                                    $categoryzero = selectCategoryzeroCollation($gory['id']);
                                    ?>
                                    <li class='list-item <?php if ($categoryzero) {
                                        echo $class;
                                    } ?>'>
                                        <a class='nav-link' href='<?php echo cagegorystUrl($gory['id']) ?>'><?php echo $gory['title'] ?></a>
                                        <ul class='sub-menu nav'>
                                            <?php
                                            if ($categoryzero) {
                                                foreach ($categoryzero as $zero) {
                                                    ?>
                                                    <li class='list-item'>
                                                        <a class='nav-link'
                                                           href='<?php echo cagegorystUrl($zero['id']) ?>'><?php echo $zero['title'] ?>
                                                        </a>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <?php
                                }
                            } else {
                                ?>
                                <a class='nav-link' href='javascript:;'>دسته بندی وجود ندارد.</a>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <li class='list-item menu-col-1'>
                        <a class='nav-link' href='/question.php'>
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\کد\Question-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
        <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                            راهنمای خرید
                        </a>
                    </li>

                    <li class='list-item'>
                        <a class='nav-link' href='single-blog.php'>
                           <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\خانه\Library.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/>
        <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>
    </g>
</svg><!--end::Svg Icon--></span>
                            مقالات
                        </a>
                    </li>

                    <li class='list-item'>
                        <a class='nav-link' href="javascript:;" data-toggle="modal"
                           data-target="#exampleModalGIFT">
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\فروشگاه\Gift.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M4,6 L20,6 C20.5522847,6 21,6.44771525 21,7 L21,8 C21,8.55228475 20.5522847,9 20,9 L4,9 C3.44771525,9 3,8.55228475 3,8 L3,7 C3,6.44771525 3.44771525,6 4,6 Z M5,11 L10,11 C10.5522847,11 11,11.4477153 11,12 L11,19 C11,19.5522847 10.5522847,20 10,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,12 C4,11.4477153 4.44771525,11 5,11 Z M14,11 L19,11 C19.5522847,11 20,11.4477153 20,12 L20,19 C20,19.5522847 19.5522847,20 19,20 L14,20 C13.4477153,20 13,19.5522847 13,19 L13,12 C13,11.4477153 13.4477153,11 14,11 Z" fill="#000000"/>
        <path d="M14.4452998,2.16794971 C14.9048285,1.86159725 15.5256978,1.98577112 15.8320503,2.4452998 C16.1384028,2.90482849 16.0142289,3.52569784 15.5547002,3.83205029 L12,6.20185043 L8.4452998,3.83205029 C7.98577112,3.52569784 7.86159725,2.90482849 8.16794971,2.4452998 C8.47430216,1.98577112 9.09517151,1.86159725 9.5547002,2.16794971 L12,3.79814957 L14.4452998,2.16794971 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span>
                            کادوی تولد
                        </a>
                    </li>


                    <li class='list-item'>
                        <a class='nav-link' href='contact-us.php'>تماس با ما</a>
                    </li>

                    <li class='list-item'>
                        <a class='nav-link' href='about-us.php'>درباره ما</a>
                    </li>

                </ul>

                <ul class='nav float-left nav-item col-lg-4'>
                    <div class='hidden-sm col-12'>
                        <div class='search-area dt-sl'>
                            <form method="get" action="search.php" class='search'>
                                <input name="search" type='text'
                                       placeholder='نام کالا مورد نظر خود را جستجو کنید…'>
                                <button type='submit' style="background-color: #ff2c4c"><img
                                            src='/assets/img/theme/search.png' alt='سرچ در عنبری تویز'></button>
                                <button class='close-search-result' type='button'><i class='mdi mdi-close'></i></button>
                            </form>
                        </div>
                    </div>
                </ul>


                <button class='btn-menu' style="margin-top: -45px;margin-right: 30px">

                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\ساختار\ساختار-top-panel-4.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M3,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,13 C14,13.5522847 13.5522847,14 13,14 L3,14 C2.44771525,14 2,13.5522847 2,13 L2,11 C2,10.4477153 2.44771525,10 3,10 Z M3,16 L13,16 C13.5522847,16 14,16.4477153 14,17 L14,19 C14,19.5522847 13.5522847,20 13,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,17 C2,16.4477153 2.44771525,16 3,16 Z" fill="#000000"/>
        <rect fill="#000000" opacity="0.3" x="16" y="10" width="5" height="10" rx="1"/>
    </g>
</svg><!--end::Svg Icon--></span>

                </button>

                <div class='side-menu'>
                    <div class='search-box-side-menu dt-sl text-center mt-2 mb-3'>
                        <form method="get" action="search.php" class='search position-relative'>
                            <input class="py-4" name="search" type='text'
                                   placeholder='نام کالا را جست و جو کنید...'>
                            <button  type="submit" class="btn position-absolute p-0" style="top:5px;left:10px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-search m-2" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                    <ul class='navbar-nav dt-sl'>

                        <li>
                            <a href='index.php'>
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\خانه\خانه-heart.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 C2.99998155,19.0000663 2.99998155,19.0000652 2.99998155,19.0000642 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z" fill="#000000" opacity="0.3"/>
        <path d="M13.8,12 C13.1562,12 12.4033,12.7298529 12,13.2 C11.5967,12.7298529 10.8438,12 10.2,12 C9.0604,12 8.4,12.8888719 8.4,14.0201635 C8.4,15.2733878 9.6,16.6 12,18 C14.4,16.6 15.6,15.3 15.6,14.1 C15.6,12.9687084 14.9396,12 13.8,12 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                خانه</a>
                        </li>

                        <li>
                            <a class='nav-link' href='/question.php'>
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\کد\Question-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
        <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                راهنمای خرید
                            </a>
                        </li>
                        <li>
                            <a class='nav-link' href="javascript:;" data-toggle="modal"
                               data-target="#exampleModalGIFT">
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\فروشگاه\Gift.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M4,6 L20,6 C20.5522847,6 21,6.44771525 21,7 L21,8 C21,8.55228475 20.5522847,9 20,9 L4,9 C3.44771525,9 3,8.55228475 3,8 L3,7 C3,6.44771525 3.44771525,6 4,6 Z M5,11 L10,11 C10.5522847,11 11,11.4477153 11,12 L11,19 C11,19.5522847 10.5522847,20 10,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,12 C4,11.4477153 4.44771525,11 5,11 Z M14,11 L19,11 C19.5522847,11 20,11.4477153 20,12 L20,19 C20,19.5522847 19.5522847,20 19,20 L14,20 C13.4477153,20 13,19.5522847 13,19 L13,12 C13,11.4477153 13.4477153,11 14,11 Z" fill="#000000"/>
        <path d="M14.4452998,2.16794971 C14.9048285,1.86159725 15.5256978,1.98577112 15.8320503,2.4452998 C16.1384028,2.90482849 16.0142289,3.52569784 15.5547002,3.83205029 L12,6.20185043 L8.4452998,3.83205029 C7.98577112,3.52569784 7.86159725,2.90482849 8.16794971,2.4452998 C8.47430216,1.98577112 9.09517151,1.86159725 9.5547002,2.16794971 L12,3.79814957 L14.4452998,2.16794971 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                کادوی تولد
                            </a>
                        </li>


                        <li class='sub-menu'>
                            <a class='nav-link' href='#'>
                               <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\ساختار\ساختار-4-blocks.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                دسته بندی کالا ها</a>
                            <ul class='sub-menu nav'>

                                <?php
                                $category = selectCollation2();
                                $class = 'sub-menu';
                                if ($category) {
                                    foreach ($category as $gory) {
                                        $categoryzero = selectCategoryzeroCollation($gory['id']);
                                        ?>
                                        <li class='list-item <?php if ($categoryzero) {
                                            echo $class;
                                        } ?>'>
                                            <a class='nav-link' href='javascript:;'><?php echo $gory['title'] ?></a>
                                            <ul class='sub-menu nav'>
                                                <?php
                                                if ($categoryzero) {
                                                    foreach ($categoryzero as $zero) {
                                                        $categoryzerooo = selectCategoryzero($zero['id']);
                                                        ?>
                                                        <li class='list-item <?php if ($categoryzerooo) {
                                                            echo $class;
                                                        } ?>'>
                                                            <a class='nav-link'
                                                               href='<?php echo cagegorystUrl($zero['id']) ?>'><?php echo $zero['title'] ?></a>
                                                            <ul class='sub-menu nav'>
                                                                <?php
                                                                if ($categoryzerooo) {
                                                                    foreach ($categoryzerooo as $zeroo) {
                                                                        ?>
                                                                        <li class='list-item'>
                                                                            <a class='nav-link'
                                                                               href='<?php echo cagegorystUrl($zeroo['id']) ?>'><?php echo $zeroo['title'] ?></a>

                                                                        </li>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </ul>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <a class='nav-link' href='javascript:;'>دسته بندی وجود ندارد.</a>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>

                        <li>
                            <a href='single-blog.php'><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\خانه\Library.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/>
        <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                مقالات
                            </a>
                        </li>
                        <li>
                            <a href='contact-us.php'>تماس با ما</a>
                        </li>
                        <li>
                            <a href='about-us.php'>درباره ما</a>
                        </li>
                    </ul>
                </div>
                <div class='overlay-side-menu'>
                </div>
            </nav>
            <!-- End Main-Menu -->
        </div>
    </div>
    <!-- End bottom-header -->
</header>
<div class="modal fade " id="exampleModalGIFT" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">کادوی تولد :</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <div>
                            <div>
                                <form action="" method="get">
                                    <input type="hidden" name="action" value="selectAge">
                                    <input type="radio" class="btn-check d-none checkedInputGreen" name="options" id="option1"
                                           autocomplete="off" checked value="53">
                                    <label class="btn btn-success" for="option1">دختر</label>

                                    <input type="radio" class="btn-check d-none checkedInputRed" name="options" id="option2"
                                           autocomplete="off" value="54">
                                    <label class="btn btn-danger " for="option2">پسر</label>

                                    <div class="clearfix"></div>


                                    <?php
                                    $categoryAge = selectCategoryAge();
                                    if ($categoryAge) {
                                        foreach ($categoryAge as $key => $gory) {
                                            ?>
                                            <div class="form-check form-check-inline mt-2">
                                                <input class="form-check-input d-none checkedInput" type="radio"
                                                       name="inlineRadioOptions"
                                                       id="inlineRadio<?php echo $key ?>"
                                                       value="<?php echo $gory['id'] ?>"
                                                    <?php
                                                    if ($key === 0) {
                                                        echo 'checked';
                                                    }
                                                    ?>
                                                >
                                                <label class="form-check-label btn btn-primary"
                                                       for="inlineRadio<?php echo $key ?>"><?php echo $gory['title'] ?></label>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <div class="clearfix"></div>
                                    <button type="submit" class="btn btn-warning mt-3"
                                            style="float: left;font-size: 20px;border:4px solid #ae5c00">بگرد برام
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="">
                            <img src="/assets/img/gift.png" class="img-fluid" alt="کادوی تولد عنبری تویز">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
            </div>
        </div>
    </div>
</div>