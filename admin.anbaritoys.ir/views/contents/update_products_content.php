<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> محصولات</h5>
                <!--end::Page Title-->
                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <a href="/index.php" class="btn btn-light-warning font-weight-bolder btn-sm font-size-h3">رفتن به خانه</a>
                <!--end::Actions-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Daterange-->
                <a href="#" class="btn btn-sm btn-light font-weight-bold mr-2" data-placement="left">
                    <span class="text-primary font-size-base font-weight-bolder" id="kt_dashboard_daterangepicker_date">خوش آمدید.</span>
                </a>
                <!--end::Daterange-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <?php
            $product=selectproduct($_GET['products_id']);
            ?>
            <div class="card card-custom gutter-b" >
                <div class="card-header">
                    <h3 class="card-title">افزودن محصولات</h3>
                </div>
                <?php  echo initFormErrors()?>
                <form class="form" method="post">
                    <input type="hidden" name="action" value="update_product">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label s>عنوان فارسی:</label>
                                <input type="text" class="form-control" placeholder="عنوان" name="title" value="<?php echo $product['title']?>" />
                            </div>
                            <div class="col-lg-6">
                                   <label >عنوان انگلیسی:</label>
                                    <input type="text" class="form-control" placeholder="عنوان انگلیسی" name="english_title" value="<?php echo $product['english_title']?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-lg-6">
                                    <label >قیمت:</label>
                                    <input type="text" class="form-control" placeholder="قیمت"  name=" price" value="<?php echo $product['price']?>"/>
                                </div>
                                <div class="col-lg-6">
                                    <label>قیمت با تخفیف:</label>
                                    <input type="text" class="form-control" placeholder="قیمت با تخفیف" name="price_discounted" value="<?php echo $product['price_discounted']?>" />
                                </div>
                            </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>موجودی:</label>
                                <input type="text" class="form-control" placeholder="موجودی" name="stock" value="<?php echo $product['stock']?>"/>
                            </div>
                            <div class="col-lg-6">
                                    <label >وضعیت:</label>
                                    <select class="form-control selectpicker " name="status" >
                                        <option value="active">فعال</option>
                                        <option value="inactive"> غیر فعال</option>

                                    </select>
                                </div>

                        </div>
                        <div class="form-group row">
                            <!--<div class="col-lg-6">
                                <?php
/*                                $selectCategoriesForProducts=selectCategoryForProduct();
                                */?>
                                <label  style="font-family: 'B Nazanin'">دسته بندی:</label>
                                <select class="form-control selectpicker " name="category_id" >
                                <option style="font-family: 'B Nazanin'">انتخاب کنید...</option>
                                 <?php
/*                                 if ($selectCategoriesForProducts){
                                        foreach ($selectCategoriesForProducts as $selectcategoryforproducts)
                                        {
                                            */?>
                                            <option <?php /*echo $selectcategoryforproducts['id']===$product['category_id'] ? 'selected' : null ;*/?> value="<?php /*echo $selectcategoryforproducts['id']; */?>"><?php /*echo $selectcategoryforproducts['title']; */?></option>
                                            <?php
/*                                        }
                                    }
                                 */?>
                                </select>
                            </div>-->
                            <input type="hidden" name="category_id" value="37">
                            <div class="col-lg-6">
                                <label >برند : </label>
                                <select class="form-control selectpicker" name="brand_id">
                                <option>انتخاب کنید...</option>
                                    <?php
                                    $selectBrandsForProducts=selectBrandForProduct();
                                    $selectCategoriesForProducts=selectCategoryForProduct();
                                    if ($selectBrandsForProducts){
                                        foreach ($selectBrandsForProducts as $selectbrandsforproducts)
                                        {
                                            ?>
                                            <option <?php echo $selectbrandsforproducts['id']===$product['brand_id'] ? 'selected' : null ;?> value="<?php echo $selectbrandsforproducts['id']; ?>"><?php echo $selectbrandsforproducts['title']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <br>
                        <div class="col-lg-12">
                            <label>برچسب ها: (برای سئو) - (کلمه ها را با - جدا کنید)</label>
                            <input value="<?php echo $product['label'] ?>" type="text" class="form-control" placeholder="قیمت خرید" name="label" id="label"/>
                        </div>
                        
                        <div class="col-lg-12">
                            <label>توضیح کوتاه: (برای سئو)</label>
                            <input value="<?php echo $product['MiniDescription'] ?>" type="text" class="form-control" placeholder="قیمت خرید" name="MiniDescription" id="MiniDescription"/>
                        </div>
                        <br>
                        
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label >نقد و بررسی:</label>
                                <textarea class="summernote" style="display: none;" name="review" "><?php echo $product['review'] ?></textarea>
                            </div>
                            <div class="col-lg-12">
                                <label >توضیحات:</label>
                                <textarea class="summernote"  style="display: none;" name="description"><?php echo $product['description'] ?></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">ثبت</button>
                        </div>
                </form>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>