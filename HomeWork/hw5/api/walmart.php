<?php
    
    $keyword = $_GET['keyword'];
    $sort = "new";
    echo $keyword;
    
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
    echo $jsonData;
    
    //$data = json_decode($jsonData, true); //true makes it an array!


    //echo json_encode($data);
?>