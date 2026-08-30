<?php
function api(){
    $getLastProducts=getLastProductsss();
    //responseJson($getLastProducts);
    $products = [];
    
    foreach($getLastProducts as $item){
        
        if($item['stock']>0){
            $stock = "instock";
        }else{
            $stock = null;
        }
        
        $cat = [];
        $getCategory = selectcategoryyOeser($item['id']);
        foreach ($getCategory as $categoryys){
            $getCategorys = selectcategoryy($categoryys['category_id']);
            $cat[] = $getCategorys['title'] ;
        }
        
        $image = '';
        $images = [];
        $getPhotoProduct=getPhotoProduct($item['id']);
        if($getPhotoProduct){
            foreach ($getPhotoProduct as $key=> $photo){
                if($key===0){
                    $image = normalizedPath(DOMAIN['public'], $photo['src'], $photo['name']);
                }
                $images[] = $image = normalizedPath(DOMAIN['public'], $photo['src'], $photo['name']);
            }
        }
        
        $products[] = 
            [
            
                "title" => $item['title'],
                "subtitle" => $item['english_title'],
                "id" => $item['id'],
                "current_price" => $item['price_discounted'],
                "old_price" => $item['price'],
                "availability" => $stock,
                "categories" => $cat,
                "image_link" => $image,
                "image_links" => $images,
                "page_url" => "https://anbaritoys.com/single-product.php?tracking_code=".$item['tracking_code'],
                "short_desc" => $item['MiniDescription'],
                "spec" => null,
        ];
    }
    
    
    $api = [
        'count' => count($getLastProducts),
        'total_pages_count' => count($getLastProducts)/10,
        'products' => $products,
        
    ];
    
    return responseJson($api);
}
api();