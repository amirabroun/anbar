<!-- Start main-content -->
<?php
/**
 * @var array  $cart_products            محصولات سبد خرید از سشن
 * @var array  $total_amount            مبلغ کل
 * @var array  $amount_payable          مبلغ قابل پرداخت
 * @var mixed  $change_cart_foll        مبلغ قابل پرداخت (از CartRequest.php)
 * @var mixed  $change_cart_foll_total  مبلغ کل (از CartRequest.php)
 * @var mixed  $price_discount_cart_fool سود خرید (از CartRequest.php)
 */
$cart_products = $_SESSION['cart_user']['products'];
$total_amount = $_SESSION['cart_user']['summary']['total_amount'];
$amount_payable = $_SESSION['cart_user']['summary']['amount_payable'];
$number_product=count($cart_products);
?>

<main style="display: block" id="cart-noEmpity" class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">

        <div class="title-breadcrumb-special dt-sl mb-3">
            <div class="section-title text-sm-title title-wide">
                <h2><i class="mdi mdi-cart-outline"></i> سبد خرید</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2 px-0">
                <nav class="tab-cart-page">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                           role="tab" aria-controls="nav-home" aria-selected="true">سبد خرید <span
                                    class="count-cart"><?php echo $number_product?></span></a>
                        <!--                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"-->
                        <!--                           role="tab" aria-controls="nav-profile" aria-selected="false">لیست خرید بعدی<span-->
                        <!--                                class="count-cart">1</span></a>-->
                    </div>
                </nav>
            </div>
            <div class="col-12">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                         aria-labelledby="nav-home-tab">
                        <div class="row">
                            <div class="col-xl-9 col-lg-8 col-12 px-0">
                                <div class="table-responsive checkout-content dt-sl">
                                    <div class="checkout-header checkout-header--express">
                                        <span class="checkout-header-title"><i class="mdi mdi-truck-fast-outline"></i> ارسال عادی</span>
                                        <span class="checkout-header-extra-info"> کالا(<?php echo $number_product?>)</span>
                                    </div>

                                    <table class="table table-cart">
                                        <tbody>
                                        <?php
                                        foreach ($cart_products as $product){
                                            $detailproduct = getDetailsCart2($product['id']);
                                            $selectPhotoProducts = selectPhotoProducts($product['id']);
                                            $selectPhotosByID = $selectPhotoProducts ? selectPhotosByID($selectPhotoProducts['photo_id']) : false;
                                            $detailproduct['photo_name'] = $selectPhotosByID['name'];
                                            $detailproduct['photo_src'] = $selectPhotosByID['src'];
                                            if ($detailproduct){
                                            ?>
                                            <tr class="checkout-item" id="item-cart<?php echo $detailproduct['id']?>">
                                                <td>
                                                    <?php

                                                    if (!empty($detailproduct['photo_name'])){
                                                        ?>
                                                        <img height="150" width="150" src="<?php echo normalizedPath(DOMAIN['public'], $detailproduct['photo_src'], $detailproduct['photo_name'])?>" alt='<?php echo $detailproduct['title'] ?>'>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <img height="150" width="150" src="<?php echo normalizedPath(DOMAIN['public'],'/images/180.png')?>" alt='محصولات سبد خرید عنبری تویز'>
                                                        <?php
                                                    }
                                                    ?>
                                                    <div class="test_<?php echo $product['id']?> Delete-cart" data-product-id="<?php echo $product['id']?>">

                                                        <input type="hidden" class="final_amount_foll_total" data-price3="<?php echo $change_cart_foll_total -= $product['price'] ?>">
                                                        <input type="hidden" class="final_amount_foll" data-price2="<?php echo $change_cart_foll -= $product['price'] ?>">
                                                        <input type="hidden" class="final_amount_foll_discount" data-price4="<?php echo $price_discount_cart_fool ?>">

                                                        <!--<input type="hidden" name="product_id" data-product-id="<?php /*echo $product['id']*/?>" value="<?php /*echo $product['id']*/?>">-->
                                                        <button  type="button" class="checkout-btn-remove cart-btn-remove">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                            </svg>
                                                        </button>

                                                        <button id="hangout-click<?php echo $product['id']?>" type="submit" class="Delete-Cart-Foll" style="opacity: 0%">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                            </svg>
                                                        </button>

                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <a href="#">
                                                        <h3 class="checkout-title">
                                                            <?php echo $detailproduct['title'] ?>
                                                        </h3>
                                                    </a>
                                                    <p class="checkout-dealer">
                                                        <?php
                                                        if (empty($detailproduct['price_discounted']))
                                                        {
                                                            ?>
                                                            قیمت : <strong><?php echo priceFormant($product['price'])?> </strong>
                                                            <?php
                                                        } else
                                                        {
                                                            ?>
                                                            <strong class="text-danger">قیمت با تخفیف :  <?php echo priceFormant($product['price_discounted'])?> </strong>
                                                            <br>
                                                            قیمت : <del><?php echo priceFormant($product['price'])?></del>
                                                            <?php
                                                        }
                                                        ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="mb-0">تعداد</p>
                                                    <?php
                                                    //echo $_SESSION['change_cart_foll'];
                                                    ?>
                                                    <div class="number-input" data-product-id="<?php echo $detailproduct['id']?>">
                                                                <?php
                                                                /*$quantity =  json_encode($product['quantity']);
                                                                $quantity_fool =  json_decode($product['quantity']);*/
                                                                ?>

                                                                        <input type="hidden" class="final_amount_foll_total" data-price3="<?php echo $change_cart_foll_total -= $product['price'] ?>">
                                                                        <input type="hidden" class="final_amount_foll" data-price2="<?php echo $change_cart_foll -= $product['price'] ?>">
                                                                        <input type="hidden" class="final_amount_foll_discount" data-price4="<?php echo $price_discount_cart_fool ?>">
                                                                        <button  id="diasablede_cart<?php echo $product['id'] ?>" onclick="change_quantity<?php echo $product['id'] ?>();" type="button" data-event="decrement" class="btn-change-quantity"></button>
<!--                                                                        <input type="hidden" class="final_quantity_cart" data-quantity2="<?php /*echo $quantity_fool */?>">
-->

                                                                <div id="final_quantity_cart<?php echo $product['id'] ?>" class="quantity p-1 mx-2">
                                                                    <?php echo $product['quantity'] ?>
                                                                </div>


                                                            <input type="hidden" class="final_amount_foll_total" data-price3="<?php echo $change_cart_foll_total += $product['price'] * ($product['quantity'] + 1) ?>">
                                                            <input type="hidden" class="final_amount_foll" data-price2="<?php echo $change_cart_foll += $product['price'] * ($product['quantity'] + 1) ?>">
                                                            <input type="hidden" class="final_amount_foll_discount" data-price4="<?php echo $price_discount_cart_fool ?>">

                                                            <button id="change_quantity_plus<?php echo $product['id'] ?>" onclick="change_quantity_plus<?php echo $product['id'] ?>();" type="button" data-event="increment" class="btn-change-quantity plus"></button>


<!--                                                            <input type="hidden" class="final_quantity_cart" data-quantity2="<?php /*echo $quantity_fool */?>">
-->
                                                    </div>
                                                </td>
                                                <?php
                                                $_SESSION['change_cart_foll'] = $amount_payable;
                                                ?>
                                                <td>

                                                    مجموع :
                                                    <br>
                                                    <?php
                                                    if ($product['price_discounted']){
                                                       ?>
                                                             <strong id="select_price_cart<?php echo $product['id'] ?>"><?php echo priceFormant($product['price_discounted'] * $product['quantity'])?> </strong>
                                                        <?php
                                                    }else{
                                                        ?>
                                                            <strong id="select_price_cart<?php echo $product['id'] ?>"><?php echo priceFormant($product['price'] * $product['quantity'])?> </strong>
                                                        <?php
                                                    }
                                                    ?>
                                                    <script>

                                                        let $product<?php echo $product['id'] ?> = Number(document.getElementById("final_quantity_cart<?php echo $product['id'] ?>").innerText);

                                                        if (Number($product<?php echo $product['id'] ?>) === <?php echo (int)$detailproduct['stock'] ?>){
                                                            document.getElementById("change_quantity_plus<?php echo $product['id'] ?>").style.backgroundColor = '#a2a2a2';
                                                            document.getElementById("change_quantity_plus<?php echo $product['id'] ?>").style.borderTopLeftRadius = '10px';
                                                            document.getElementById("change_quantity_plus<?php echo $product['id'] ?>").style.borderBottomLeftRadius = '10px';
                                                            document.getElementById("change_quantity_plus<?php echo $product['id'] ?>").style.cursor = 'no-drop';
                                                            document.getElementById("change_quantity_plus<?php echo $product['id'] ?>").disabled = true;
                                                        }

                                                        if (Number($product<?php echo $product['id'] ?>) === 1){
                                                            document.getElementById("diasablede_cart<?php echo $product['id'] ?>").style.backgroundColor = '#a2a2a2';
                                                            document.getElementById("diasablede_cart<?php echo $product['id'] ?>").style.borderTopRightRadius = '10px';
                                                            document.getElementById("diasablede_cart<?php echo $product['id'] ?>").style.borderBottomRightRadius = '10px';
                                                            document.getElementById("diasablede_cart<?php echo $product['id'] ?>").style.cursor = 'no-drop';
                                                            document.getElementById("diasablede_cart<?php echo $product['id'] ?>").disabled = true;
                                                        }


                                                        //plus

                                                        function change_quantity_plus<?php echo $product['id'] ?>() {
                                                            let $product<?php echo $product['id'] ?> = Number(document.getElementById("final_quantity_cart<?php echo $product['id'] ?>").innerText);
                                                            let $sum = Number("1");

                                                            let $products<?php echo $product['id'] ?> = Number($product<?php echo $product['id'] ?>) + Number($sum);
                                                            document.getElementById("final_quantity_cart<?php echo $product['id'] ?>").innerText = $products<?php echo $product['id'] ?>;

                                                            //jame
                                                            let $product2<?php echo $product['id'] ?> = Number(document.getElementById("final_quantity_cart<?php echo $product['id'] ?>").innerText);
                                                            let $sum22 =  Number($product2<?php echo $product['id'] ?>);

                                                            let $products22<?php echo $product['id'] ?> = Number(<?php

                                                            if ($product['price_discounted']){
                                                                echo $product['price_discounted'];
                                                            }else{
                                                                echo $product['price'];
                                                            }

                                                            ?>) * $sum22;

                                                            document.getElementById("select_price_cart<?php echo $product['id'] ?>").innerText = $products22<?php echo $product['id'] ?>.toLocaleString() + 'تومان';

                                                            //end jame



                                                            if (Number($products<?php echo $product['id'] ?>) > 1){
                                                                document.getElementById("diasablede_cart<?php echo $product['id'] ?>").style.backgroundColor = '#ffffff';
                                                                document.getElementById("diasablede_cart<?php echo $product['id'] ?>").style.borderTopRightRadius = '10px';
                                                                document.getElementById("diasablede_cart<?php echo $product['id'] ?>").style.borderBottomRightRadius = '10px';
                                                                document.getElementById("diasablede_cart<?php echo $product['id'] ?>").style.cursor = 'pointer';
                                                                document.getElementById("diasablede_cart<?php echo $product['id'] ?>").disabled = false;
                                                            }
                                                            if (Number($products<?php echo $product['id'] ?>) === <?php echo (int)$detailproduct['stock'] ?>){
                                                                document.getElementById("change_quantity_plus<?php echo $product['id'] ?>").style.backgroundColor = '#a2a2a2';
                                                                document.getElementById("change_quantity_plus<?php echo $product['id'] ?>").style.borderTopLeftRadius = '10px';
                                                                document.getElementById("change_quantity_plus<?php echo $product['id'] ?>").style.borderBottomLeftRadius = '10px';
                                                                document.getElementById("change_quantity_plus<?php echo $product['id'] ?>").style.cursor = 'no-drop';
                                                                document.getElementById("change_quantity_plus<?php echo $product['id'] ?>").disabled = true;
                                                            }

                                                        }

                                                        //menha

                                                        function change_quantity<?php echo $product['id'] ?>() {
                                                            let $product<?php echo $product['id'] ?> = Number(document.getElementById("final_quantity_cart<?php echo $product['id'] ?>").innerText);
                                                            let $sum = Number("1");
                                                            let $products<?php echo $product['id'] ?> = Number($product<?php echo $product['id'] ?>) - Number($sum);
                                                            document.getElementById("final_quantity_cart<?php echo $product['id'] ?>").innerText = $products<?php echo $product['id'] ?>;


                                                            //jame
                                                            let $product2<?php echo $product['id'] ?> = Number(document.getElementById("final_quantity_cart<?php echo $product['id'] ?>").innerText);
                                                            let $sum22 =  Number($product2<?php echo $product['id'] ?>);

                                                            let $products22<?php echo $product['id'] ?> = Number(<?php

                                                                if ($product['price_discounted']){
                                                                    echo $product['price_discounted'];
                                                                }else{
                                                                    echo $product['price'];
                                                                }

                                                            ?>) * $sum22;

                                                            document.getElementById("select_price_cart<?php echo $product['id'] ?>").innerText = $products22<?php echo $product['id'] ?>.toLocaleString() + 'تومان';

                                                            //end jame

                                                            if (Number($products<?php echo $product['id'] ?>) === 1){
                                                                document.getElementById("diasablede_cart<?php echo $product['id'] ?>").style.backgroundColor = '#a2a2a2';
                                                                document.getElementById("diasablede_cart<?php echo $product['id'] ?>").style.borderTopRightRadius = '10px';
                                                                document.getElementById("diasablede_cart<?php echo $product['id'] ?>").style.borderBottomRightRadius = '10px';
                                                                document.getElementById("diasablede_cart<?php echo $product['id'] ?>").style.cursor = 'no-drop';
                                                                document.getElementById("diasablede_cart<?php echo $product['id'] ?>").disabled = true;
                                                            }
                                                            if (Number($products<?php echo $product['id'] ?>) < <?php echo (int)$detailproduct['stock'] ?>){
                                                                document.getElementById("change_quantity_plus<?php echo $product['id'] ?>").style.backgroundColor = '#ffffff';
                                                                document.getElementById("change_quantity_plus<?php echo $product['id'] ?>").style.borderTopLeftRadius = '10px';
                                                                document.getElementById("change_quantity_plus<?php echo $product['id'] ?>").style.borderBottomLeftRadius = '10px';
                                                                document.getElementById("change_quantity_plus<?php echo $product['id'] ?>").style.cursor = 'pointer';
                                                                document.getElementById("change_quantity_plus<?php echo $product['id'] ?>").disabled = false;
                                                            }

                                                        }
                                                    </script>
                                                </td>
                                            </tr>
                                                <script>
                                                    let $key22 ++;
                                                </script>
                                            <?php
                                            }
                                        }
                                        ?>
                                        <script>
                                            console.log($key22)
                                            for (let i = 0; i < Number($key22); i++) {
                                                //console.log(i)
                                            }
                                        </script>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                                <div class="dt-sn mb-2">
                                    <ul class="checkout-summary-summary">
                                        <li>
                                            <span>مبلغ کل (<?php echo $number_product?> کالا)</span><span  id="final_amount_foll_total_many"><?php echo priceFormant($total_amount)?></span>
                                        </li>
                                        <li class="checkout-summary-discount" id="final_amount_foll_discount_id22">
                                            <span>سود شما از خرید</span><span id="final_amount_foll_discount_id2"><?php echo priceFormant($total_amount-$amount_payable)?></span>
                                        </li>
                                        <li>
                                                    <span>هزینه ارسال<span class="help-sn" data-toggle="tooltip"
                                                                           data-html="true" data-placement="bottom"
                                                                           title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>.<br>'حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر باشد.'</p></div>">
                                                            <span class="mdi mdi-information-outline"></span>
                                                        </span></span><span>66,000 تومان هزینه ارسال</span>
                                        </li>
                                    </ul>
                                    <div class="checkout-summary-devider">
                                        <div></div>
                                    </div>
                                    <div class="checkout-summary-content">
                                        <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                                        <div class="checkout-summary-price-value">
                                            <span class="checkout-summary-price-value-amount" id="change_cart_foll">
                                                <?php echo priceFormant($amount_payable+66000)?>
                                            </span>
                                        </div>


                                        <?php
                                        if (authUser()){
                                            ?>
                                            <a href="shopping.php" class="mb-2 d-block">
                                                <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0">
                                                    <i class="mdi mdi-arrow-left"></i>
                                                    ادامه ثبت سفارش
                                                </button>
                                            </a>
                                            <?php
                                        }else{
                                            ?>
                                            <form method="post" action="" >
                                                <input type="hidden" name="action" value="finishCart">
                                                <a href="login.php" class="mb-2 d-block">
                                                    <button type="submit" class="btn-primary-cm btn-with-icon w-100 text-center pr-0">
                                                        <i class="mdi mdi-arrow-left"></i>
                                                        ورود و ادامه ثبت سفارش
                                                    </button>
                                                </a>
                                            </form>
                                            <?php
                                        }
                                        ?>

                                        <div>
                                                    <span>
                                                        کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش
                                                        مراحل بعدی را تکمیل کنید.
                                                    </span><span class="help-sn" data-toggle="tooltip" data-html="true"
                                                                 data-placement="bottom"
                                                                 title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می‌شوند. در صورت عدم ثبت سفارش،عنبری تویز هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد.</p></div>">
                                                        <span class="mdi mdi-information-outline"></span>
                                                    </span></div>
                                    </div>
                                </div>
                                <div class="dt-sn checkout-feature-aside pt-4">
                                    <ul>
                                        
                                        <li class="checkout-feature-aside-item">
                                            <img src="/assets/img/svg/payment-terms.svg" alt="پرداخت عنبری تویز">
                                            66,000 تومان هزینه ارسال
                                        </li>
                                        <li class="checkout-feature-aside-item">
                                            <img src="/assets/img/svg/delivery.svg" alt="تحویل محصولات عنبری تویز">
                                            تحویل اکسپرس
                                        </li>
                                    </ul>
                                </div>
                                <script>
                                    let $product_discount = document.getElementById("final_amount_foll_discount_id2").innerText;
                                    if ($product_discount === '0تومان'){
                                        document.getElementById("final_amount_foll_discount_id22").style.display = "none";
                                    }

                                </script>
                            </div>
                        </div>
                    </div>
                                    </div>
            </div>
        </div>

    </div>
</main>
<!-- End main-content -->
