
<?php

//returns array with 100 URLs to images from Pixabay.com, based on a "keyword"
function getImageURLs($keyword,&$imageDescription,&$numb,$sort = "relevance") {
  
    $curl = curl_init();
    curl_setopt_array($curl, array( 
      //CURLOPT_URL => "https://pixabay.com/api/?key=6500360-2241358d626e1b170fd611b40&q=$keyword&image_type=photo&orientation=$orientation&safesearch=true&per_page=100",
      CURLOPT_URL =>  "https://api.walmartlabs.com/v1/search?apiKey=4q62wjkngrg5cn84343jfz8f&query=$keyword&categoryId=3944&sort=$sort&ord=des",
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
    $numb = $data['numItems'];
    
    for ($i = 0; $i < 10; $i++) {
       $imageURLs[] = $data['items'][$i]['mediumImage'];
       $imageDescription[] = $data['items'][$i]['shortDescription'];
    }
    
    $err = curl_error($curl);
    curl_close($curl);
    
    echo " sizeof array()  + " . $numb . " ";
    echo sizeof($imageURLs);
   // echo " in function getImageURLs! ". $data['numItems'] . " ";
    
    print_r($imageURLs);
    echo " in function getImageURLs! ". $data['numItems'] . " ";
    print_r($imageDescription);
    
    return $imageURLs;
}

?>
