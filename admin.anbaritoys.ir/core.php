<?php
//config
//helper
include 'config/app.php';
include 'helpers/session.php';
include 'helpers/function.php';
include 'helpers/authentication.php';

//database
include 'Database/database_connector.php';
//model
include 'models/Manager.php';
include 'models/Category.php';
include 'models/Brand.php';
include 'models/Product.php';
include "models/photo.php";
include 'models/User.php';
include 'models/collection.php';
include 'models/factor.php';
include 'models/Dashboard.php';
include 'models/about_us.php';
include 'models/perper.php';
include 'models/Color.php';
include 'models/Battery.php';
include 'models/Detail.php';
include 'models/Guarantee.php';
include 'models/Memory.php';
include 'models/Pack.php';
include 'models/Ram.php';
include 'models/Variety.php';
//request

//include 'requests/LoginRequest.php';
include 'requests/CategoryRequest.php';
include 'requests/BrandRequest.php';
include 'requests/ProductsRequest.php';
include 'requests/PhotoProductRequest.php';
include 'requests/photoCategory.php';
include 'requests/banner/changePic.php';
include 'requests/discount_codeRequest.php';
include 'requests/create_collection.php';
include 'requests/users.php';
include 'requests/massage.php';
include 'requests/about_usRequest.php';
include 'requests/perper.php';
include 'requests/ColorRequest.php';
include 'requests/BatteryRequest.php';
include 'requests/DetailsRequest.php';
include 'requests/GuaranteeRequest.php';
include 'requests/MemoryRequest.php';
include 'requests/PackRequest.php';
include 'requests/RamRequest.php';
include 'requests/VarietyRequest.php';
include 'requests/FactorRequest.php';





