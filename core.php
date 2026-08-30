<?php
//config
include 'config/app.php';
//helper
include 'helpers/session.php';
include 'helpers/function.php';
//database
include 'Database/database_connector.php';

//tools
include 'tools/kavenegar/vendor/autoload.php';
include 'tools/sms-service.php';
include 'tools/gateway-payment/idpay.php';
//model

include 'models/Category.php';
include 'models/Brand.php';
include 'models/Product.php';
include "models/Photo.php";
include 'models/User.php';
include 'models/Address.php';
include 'models/deleteAddress.php';
include 'models/search.php';
include 'models/interest.php';
include 'models/order.php';
include 'models/payment.php';
include 'models/discount_code.php';
include 'models/factor.php';
include 'models/coment.php';
include 'models/contact_us.php';
include 'models/perper.php';

//request

//include 'requests/LoginRequest.php';
include 'requests/authentication/RegisterRequest.php';
include 'requests/authentication/LoginRequest.php';
include 'requests/authentication/VerifyRequest.php';
//include 'requests/authentication/session_code.php';

include 'requests/products/SingleProductRequest.php';
include 'requests/products/comente.php';
include 'requests/cart/CartRequest.php';
include 'requests/user/UserProfileRequest.php';
include 'requests/user/AddressRequest.php';
include 'requests/user/deleteAddress.php';
include 'requests/user/change_address.php';
include 'requests/user/sendMassage.php';
include 'requests/user/interest.php';
include 'requests/user/DeleteInterest.php';
include 'requests/user/sendMassageUser.php';
include 'requests/user/contact_us.php';
include 'requests/shopping/shoppingRequests.php';
include 'requests/shopping/PaymentRequests.php';
include 'requests/shopping/gift_code.php';
include 'requests/shopping/discount_code.php';
include 'requests/gift/gift.php';

//pages
//include 'Age.php';
