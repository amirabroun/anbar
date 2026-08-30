<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <div class="row">

            <!-- Start Sidebar -->
            <?php
            require_once 'views/partial/sidebar.php';
            ?>
            <!-- End Sidebar -->

            <!-- Start Content -->
            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                <div class="row">
                    <div class="col-12">
                        <div
                                class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                            <h2>آدرس ها</h2>
                        </div>
                        <div class="dt-sl">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="card-horizontal-address text-center px-4">
                                        <button class="checkout-address-location" data-toggle="modal"
                                                data-target="#modal-location">
                                            <strong>ایجاد آدرس جدید</strong>
                                            <i class="mdi mdi-map-marker-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <?php
                                $user_id =getIdUsers($_SESSION['user_sing']);
                                $getaddress=getAddressById($user_id['id']);

                                if ($getaddress){
                                foreach ($getaddress as $address){
                                ?>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card-horizontal-address">
                                        <div class="card-horizontal-address-desc">
                                            <h4 class="card-horizontal-address-full-name"><?php echo $address['first_name']?><?php echo " " ?><?php echo $address['last_name']?></h4>
                                            <p>

                                                <?php echo $address['province_name'] ?>_<?php echo $address['city_name'] ?>_<?php echo $address['address'] ?>
                                            </p>
                                        </div>
                                        <div class="card-horizontal-address-data">
                                            <ul class="card-horizontal-address-methods float-right">
                                                <li class="card-horizontal-address-method">
                                                    <i class="mdi mdi-email-outline"></i>
                                                    کدپستی : <span><?php echo $address['post_code'] ?></span>
                                                </li>
                                                <li class="card-horizontal-address-method">
                                                    <i class="mdi mdi-cellphone-iphone"></i>
                                                    تلفن همراه : <span><?php echo $address['mobile'] ?></span>
                                                </li>
                                            </ul>


                                            <div class="card-horizontal-address-actions row">

                                                <?php
                                                if ($address['is_default'] === 'yes'){
                                                    ?>
                                                    <?php
                                                }else{
                                                $getAddressId = getAddressId($address['created_at']);
                                                foreach ($getAddressId as $address1){
                                                ?>
                                                    <form method="post" action="" class="col-2 mr-1">
                                                        <input type="hidden" name="action" value="delete_address">

                                                        <button type="submit" class="mr-3 mb-2 btn btn-danger" name="id" value="<?php echo $address1['created_at'] ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                            </svg>
                                                        </button>
                                                    </form>

                                                    <?php
                                                    }
                                                    }
                                                    ?>

                                                    <form method="post" action="" >
                                                        <input type="hidden" name="action" value="change_address">
                                                        <?php
                                                        if ($address['is_default'] === 'yes'){
                                                            ?>
                                                            <button class=" btn btn-success ml-2 mr-5" disabled>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-check" viewBox="0 0 16 16">
                                                                    <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708L7.293 1.5Z"/>
                                                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547 1.17-1.951a.5.5 0 1 1 .858.514Z"/>
                                                                </svg>
                                                                پیش فرض</button>
                                                            <?php
                                                        }else{
                                                            $getAddressId = getAddressId($address['created_at']);
                                                            foreach ($getAddressId as $address1){
                                                                ?>
                                                                <button type="submit" class="btn btn-primary col-11 mr-5" name="id" value="<?php echo $address1['created_at'] ?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-slash" viewBox="0 0 16 16">
                                                                        <path d="M13.879 10.414a2.5 2.5 0 0 0-3.465 3.465l3.465-3.465Zm.707.707-3.465 3.465a2.501 2.501 0 0 0 3.465-3.465Zm-4.56-1.096a3.5 3.5 0 1 1 4.949 4.95 3.5 3.5 0 0 1-4.95-4.95Z"/>
                                                                        <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708L7.293 1.5Z"/>
                                                                    </svg>
                                                                    تغییر به پیش فرض</button>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </form>
                                            </div>
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
            <!-- End Content -->
        </div>
    </div>
</main>
<!-- End main-content -->

<!-- Start Modal location new -->
<div class="modal fade" id="modal-location" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div style="z-index: -10" class="modal-dialog modal-lg send-info modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    <i class="now-ui-icons location_pin"></i>
                    افزودن آدرس جدید
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-ui dt-sl">
                            <form class="form-account" id="form_user_add_address">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                نام گیرنده
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pr-2 text-right" type="text"
                                                   placeholder="نام خود را وارد نمایید" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                نام خانوادگی گیرنده
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pr-2 text-right" type="text"
                                                   placeholder="نام خانوادگی خود را وارد نمایید" name="last_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                شماره موبایل
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pl-2 dir-ltr text-left" type="text"
                                                   placeholder="09xxxxxxxxx" name="mobile">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                کد پستی
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pl-2 dir-ltr text-right" type="text"
                                                   placeholder="کد پستی را وارد کنید" name="post_code">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                استان
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <?php
                                            $provinces=getprovinces();
                                            if ($provinces){
                                                ?>
                                                <div class="custom-select-ui">
                                                    <select class="right" name="province">
                                                        <option  data-display="استان را انتخاب کنید" value="0"> استان را انتخاب کنید </option>
                                                        <?php
                                                        foreach ($provinces as $province){
                                                            ?>
                                                            <option value="<?php echo $province['id'] ?>"><?php echo $province['name'] ?></option>
                                                            <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                شهر
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <div class="custom-select-ui">
                                                <select class="right" name="city">
                                                    <option value="khrasan-north">-------</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                آدرس پستی
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                                    <textarea class="input-ui pr-2 text-right"
                                                              placeholder=" آدرس تحویل گیرنده را وارد نمایید" name="address"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 pr-4 pl-4">
                                        <button type="submit"  class="btn btn-sm btn-primary btn-submit-form">ثبت
                                            و
                                            ارسال به این آدرس</button>
                                        <button type="reset" class="btn-link-border float-left mt-2">انصراف
                                            و بازگشت</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal location new -->

<!-- Start Modal location edit -->
<div class="modal fade" id="modal-location-edit" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-lg send-info modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    <i class="now-ui-icons location_pin"></i>
                    ویرایش آدرس
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-ui dt-sl">
                            <form class="form-account" action="">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                نام و نام خانوادگی
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pr-2 text-right" type="text"
                                                   placeholder="نام خود را وارد نمایید">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                شماره موبایل
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pl-2 dir-ltr text-left" type="text"
                                                   placeholder="09xxxxxxxxx">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                استان
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <div class="custom-select-ui">
                                                <select class="right">
                                                    <option value="khrasan-north">
                                                        خراسان شمالی
                                                    </option>
                                                    <option value="tehran">
                                                        تهران
                                                    </option>
                                                    <option value="esfahan">
                                                        اصفهان
                                                    </option>
                                                    <option value="shiraz">
                                                        شیراز
                                                    </option>
                                                    <option value="tabriz">
                                                        تبریز
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                شهر
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <div class="custom-select-ui">
                                                <select class="right">
                                                    <option value="bojnourd">
                                                        بجنورد
                                                    </option>
                                                    <option value="garme">
                                                        گرمه
                                                    </option>
                                                    <option value="shirvan">
                                                        شیروان
                                                    </option>
                                                    <option value="mane">
                                                        مانه و سملقان
                                                    </option>
                                                    <option value="esfarayen">
                                                        اسفراین
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                آدرس پستی
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                                    <textarea class="input-ui pr-2 text-right"
                                                              placeholder=" آدرس تحویل گیرنده را وارد نمایید"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                کد پستی
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pl-2 dir-ltr text-left placeholder-right"
                                                   type="text" placeholder=" کد پستی را بدون خط تیره بنویسید">
                                        </div>
                                    </div>
                                    <div class="col-12 pr-4 pl-4">
                                        <button type="button" class="btn btn-sm btn-primary btn-submit-form">ثبت
                                            و
                                            ارسال به این آدرس</button>
                                        <button type="button" class="btn-link-border float-left mt-2">انصراف
                                            و بازگشت</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal location edit -->

<!-- Start Modal remove-location -->
<div class="modal fade" id="remove-location" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">


    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mb-3" id="exampleModalLabel">آیا مطمئنید که
                    این آدرس حذف شود؟</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="remodal-general-alert-button remodal-general-alert-button--cancel"
                        data-dismiss="modal">خیر</button>

                <form method="post" action="">
                    <input type="hidden" name="action" value="delete_address">

                <button type="submit" class="remodal-general-alert-button remodal-general-alert-button--approve" name="id" value="<?php echo $address1['created_at'] ?>">بله</button>
                </form>


            </div>
        </div>
    </div>

</div>
<!-- End Modal remove-location -->