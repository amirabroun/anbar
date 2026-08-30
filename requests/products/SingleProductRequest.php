<?php
if (pagename()==='single-product'){

    if (isset($_GET['tracking_code'])){
        $details_products= getDetailsProducts($_GET['tracking_code']);
        if (!$details_products){
            abort();
        }
    }else{abort();}
}
