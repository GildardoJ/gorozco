<?php

//returns array with 100 URLs to images from Pixabay.com, based on a "keyword"
function getImageURLs($keyword, $orientation="horizontal") {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://pixabay.com/api/?key=6500360-2241358d626e1b170fd611b40&q=$keyword&image_type=photo&orientation=$orientation&safesearch=true&per_page=100",
      //CCURLOPT_URL =>  "https://api.walmartlabs.com/v1/search?apiKey=f5gxmkzbaedzwbpzuk2ntywy&query=$keyword&categoryId=3944&sort=price&ord=des",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
      ),
    ));
    
    $jsonData = curl_exec($curl);
    $data = json_decode($jsonData, true); //true makes it an array!
    
    $imageURLs = array();
    for ($i = 0; $i < 99; $i++) {
       $imageURLs[] = $data['hits'][$i]['webformatURL'];
     // $imageURLs[] = $data['item'][$i]['mediumImage'];
    }
    
    $err = curl_error($curl);
    curl_close($curl);
    
    return $imageURLs;
}

?>
