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
        
        if (isset($_GET['sort'])){
            
            $imageURLs = getImageURLs($keyword,$imageDescription,$price,$sort);
        
        }else{
            $imageURLs = getImageURLs($keyword,$imageDescription,$price);
            echo " ELSE ";
        }
        
        
        //print_r($imageURLs);
        
        //Display last 5 images!
        
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    
    function checkIFSelected($option){
        
        if($option ==$_GET['sort']){
            return "selected";
        }
    }


function display($imageURLs,$imageDescription){
    echo "<div id='box' >";
    
    for ($i = 0; $i < 5; $i++){
        //echo"<br/> ";
        echo "<img src='" . $imageURLs[$i] . "' width= '200' > Price: " . $price[$i] ;
       
            
            
        echo "<br/> " .$imageDescription[$i] . " <br/>";
       
    }
    
    echo "</div>";
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
               
                
                <select name="sort">
                <option value=""> Sort by </option>
                <option  <?=checkIFSelected('best_seller')?>>best_seller</option>
                <option <?=checkIFSelected('price')?>>price</option>
                <option <?=checkIFSelected('price_low')?> >price_low</option>
                <option <?=checkIFSelected('price_high')?> >price_high</option>
                <option <?=checkIFSelected('rating_high')?> >rating_high</option>
                <option <?=checkIFSelected('new')?> >New</option>
            </select>
                
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
            echo $sort .  " result of sort ";
            display($imageURLs,$imageDescription);
            
        ?>
        <br/>
      
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
    </body>
    <footer>
        
        
    </footer>
</html>