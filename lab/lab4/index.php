<?php

$backgroundImage = "img/sea.jpg";

    if (isset($_GET['keyword'])){  // checks to see if the url has a parameter called "keyword"
        echo "keyword typed: " .  $_GET['keyword'];
        include 'api/pixabayAPI.php';
        $imageURLs = getImageURLs($_GET['keyword']);
        //print_r($imageURLs);
        
        for($i = 0; $i < 5 ; $i++ ){
            do {
                $randomIndex = rand(0, count($imageURLs));
            }
            while ( !isset($imageURLs[$randomIndex]));
            
            echo "<img src='" . $imageURLs[rand(0,count($imageURLs))] . "'width= '200'>";
            unset($imageURLs[$randomIndex]);
        }
        
    }else {
        echo " <h2> Type a keyword to display a slideshow with random images from Pixabay.com</h2>"  ;
        
        

?>

<div id="carousel-example-generic" class= "carousel slide"

<?php
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
        <style>
            @import url("css/styles.css"); /* place bellow bootstrap*/ 
            
            body {
                background-image: url("<?=$backgroundImage?>"); /* because of php, it has to be in here not in the css page. */
            }
            
        </style>
    </head>
    
    <body>
        <!--
        <div class="jumbotron">  <!--/*gives a big gray box. */-->
      <!--      <h1> Hello! </h1>
        </div> -->

        
        <form> <!--get method standard -->
            
            <input type="text" name="keyword" placeholder ="Tye Keyword"/>
            <input type="submit" value="Search" name="submitBtn" />
            
        </form>
        
        


       <!--  /* place at the end to speed up page upload/download to user*/-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
    
</html>