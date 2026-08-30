<?php
// مقادیر پیش‌فرض برای پروداکشن (cPanel) است؛ در محیط‌های دیگر
// (مثل داکر لوکال) همین مقادیر از فایل .env قابل تغییرند.
require_once dirname(__DIR__) . '/helpers/env.php';

const PREFIX_TRACKING_CODE =[
    'order'=>'PSO-',
    'product' =>'PSP-'
];
const LOCALIZATION = [
    'rules' => [
        'password' => 'کلمه عبور نباید کمتر از 8 کاراکتر باشد!',
        'mobile' => 'شماره تلفن وارد شده نامعتبر است!',
        'numeric' => 'مقدار فیلد باید فقط عدد باشد!',
        'required' => 'فیلد نباید خالی باشد!',
        'persian_chars' => 'لطفا مقدار فیلد را فارسی بنویسید!',
        'english_chars' => 'لطفا مقدار فیلد را لاتین بنویسید!',
    ],
    'inputs' => [
        'title' => 'عنوان',
        'parent_category' => 'دسته والد',
        'english_title' => 'عنوان لاتین',
        'price' => 'قیمت',
        'stock' => 'موجودی',
        'price_discounted' => 'قیمت با تخفیف',
        'cellphone' => 'شماره تلفن همراه',
        'mobile' => 'شماره تلفن همراه',
        'verify_code' => 'کد تایید',
        'password' => 'کلمه عبور',
        'password_rule' => 'کلمه عبور',
        'description' => 'توضیحات',
        'first_name' => 'نام',
        'last_name' => 'نام خانوادگی',
        'brand' => 'برند',
        'category' => 'دسته بندی',
        'username' => 'نام کاربری',
        'national_code'=>'کد ملی',
        'name'=>'نام گیرنده',
        'name2'=>'نام و نام خوانوادگی',
        'address'=>'آدرس',
        'post_code'=>'کد پستی',
        'Issue'=>' موضوع',
        'Description'=>'توضیحات',
    ]
];
const PREFIX_IMAGE_CODE =[
    'product' =>'IMG-'
];

// APP_URL: آدرس کامل سایت اصلی (پروداکشن: https://anbaritoys.ir/)
// PUBLIC_URL: مبنا برای آدرس فایل‌های استاتیک/عکس‌ها (پروداکشن: سابدامین photos)
define('DOCUMENT_ROOT_DOMAIN', [
    'public'=>env('PUBLIC_URL', 'photos.anbaritoys.ir')
]);

define('DOMAIN', [
    'main'=>env('APP_URL', 'https://anbaritoys.ir/'),
    'public'=>env('PUBLIC_URL', 'http://photos.anbaritoys.ir'),
    'document_root'=>env('PUBLIC_URL', 'photos.anbaritoys.ir'),
]);

define('GATEWAY_PAYMENT', [
    'zarinpal' =>[
        'callback'=>env('ZARINPAL_CALLBACK', 'https://anbaritoys.ir/callback.php'),
        'merchant_id'=> env('ZARINPAL_MERCHANT_ID', '3dd45331-3bc7-4eac-bb1c-c117b98b6c2a'),
    ]
]);
