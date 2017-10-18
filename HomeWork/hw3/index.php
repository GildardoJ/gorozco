<?php 

    $backgroundImgae = "img/mars.jpg";
    
    
    //API Call
    if(isset($_GET['keyword'])){
        
        echo "keyword for: " . $_GET['keyword'];
        include 'api/walmartAPI.php';
        //include 'api/pixabayAPI.php';
        
        $keyword = $_GET['keyword'];
        $sort = $_GET['sort'];
        
        if(!empty($_GET['category'])) {
            $keyword = $_GET['category'];
        }
        
        $imageURLs = getImageURLs($keyword);
        
        print_r($imageURLs);
        
        //Display last 5 images!
        
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }

    
?>


<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <tittle> HW3-Orozco</tittle>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel = "stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <style>
            @import url("css/styles.css");
            
            body {
                background-image: url("<?=$backgroundImgae?>");
            }
        </style>
    </head>
    
    <body>
        <div class="jumbotron text-center">
          <h1>Sale Appaloosa </h1>
          
        </div>
        <br/><br/>
        
        <form>
            <div id="formBox">
                <input type="text" name="keyword" placeholder ="Keyword" value="<?=$_GET['keyword']?>"/>
                <input type="radio" id="priceSort" name="priceSort" value="price"
                
                <?php
                    if($_GET['priceSort']=="price"){
                        echo "checked";
                    }
                
                ?>
                
                >
                
                <label for ="priceSort"> Sort by price </label>
               
                <input type="submit" value="Search" />
            </div>
        </form>
        <br/>
        
        <?php
            if(!isset($_GET['keyword'])){ //form has not been submitted
                echo "<h2>Type a keyword to display a slideshow with random images from walmart.com</h2>";
            }else{
                
                if(empty($_GET['keyword']) && empty($_GET['category'])){
                    echo "<h2 style='color:red'> Error! You must enter a keyword or category </h2>";
                    return;
                    exit;
                }
            }
            
            for ($i = 0; $i < 5; $i++){
                echo "<img src='" . $imageURLs[$i] . "' width= '200' >";
                //echo "<img class='image-object' src='img/".$playerPics[0].".jpg' alt='Picture of card'>";
            }
            
        ?>
        <br/>
      
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
    </body>
    <footer>
        
        
    </footer>
</html>