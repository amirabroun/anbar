<div class="an-card">
    <div class="an-card-head">
        <div>
            <h3 class="an-card-title">
                <svg class="an-ic"><use href="#an-i-image"></use></svg>
                بنر صفحه اصلی
            </h3>
            <div class="an-card-sub">تصاویر بنر تکی و دو‌تایی — پس از آپلود در همان صفحه نتیجه را می‌بینید</div>
        </div>
    </div>
    <div class="an-card-body">
        <div class="an-form-grid" style="margin-bottom:26px">
            <div class="an-field">
                <label>بنر دو‌تایی — تصویر سمت چپ</label>
                <form method="post" action="requests/banner/changePic.php" enctype="multipart/form-data" data-an-banner>
                    <input type="hidden" name="action" value="changeBanner2">
                    <input type="file" class="an-input" name="fileToUpload" accept="image/*">
                    <div class="an-form-actions" style="margin-top:12px">
                        <button type="submit" class="an-btn an-btn-primary an-btn-sm">
                            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-upload"></use></svg>
                            آپلود تصویر سمت چپ
                        </button>
                    </div>
                </form>
            </div>
            <div class="an-field">
                <label>بنر دو‌تایی — تصویر سمت راست</label>
                <form method="post" action="requests/banner/changePic.php" enctype="multipart/form-data" data-an-banner>
                    <input type="hidden" name="action" value="changeBanner3">
                    <input type="file" class="an-input" name="fileToUpload" accept="image/*">
                    <div class="an-form-actions" style="margin-top:12px">
                        <button type="submit" class="an-btn an-btn-primary an-btn-sm">
                            <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-upload"></use></svg>
                            آپلود تصویر سمت راست
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="an-field">
            <label>بنر تکی</label>
            <form method="post" action="requests/banner/changePic.php" enctype="multipart/form-data" data-an-banner>
                <input type="hidden" name="action" value="changeBanner1">
                <input type="file" class="an-input" name="fileToUpload" accept="image/*">
                <div class="an-form-actions" style="margin-top:12px">
                    <button type="submit" class="an-btn an-btn-primary an-btn-sm">
                        <svg class="an-ic" style="width:15px;height:15px"><use href="#an-i-upload"></use></svg>
                        آپلود تصویر
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
