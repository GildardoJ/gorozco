<?php

    $backgroundImage = "img/sea.jpg";
    // API call goes here
    if (isset($_GET['keyword'])){  // checks to see if the url has a parameter called "keyword"
       // echo "keyword for: " .  $_GET['keyword'];
        include 'api/pixabayAPI.php';
        
        $keyword = $_GET['keyword'];
        if(!empty($_GET['category'])) {
            
            $keyword = $_GET['category'];
        }
        
        if (isset($_GET['layout'])){
            
          $imageURLs = getImageURLs($keyword, $_GET['layout']);  
          
        }else{
            
            $imageURLs =getImageURLs($keyword);
        
        }
        
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
        
        function checkIFSelected($option){
            
            if($option == $_GET['category']) {
                
                return "selected";
            }
        }
  
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4: Image Carousel</title>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
        <style>
            @import url("css/styles.css"); /* place bellow bootstrap*/ 
            
            body {
                background-image: url("<?=$backgroundImage?>"); /* because of php, it has to be in here not in the css page. */
            }
            
        </style>
    </head>
    
    <body>
        <br/><br/>
        
        <form > <!--get method standard -->
        <div id= "formBox">
            <input type="text" name="keyword" placeholder ="Keyword" value="<?=$_GET['keyword']?>"/>
            
            <input type="radio" id="lhorizontal" name="layout" value="horizontal" <?= ($_GET['layout']=='horizontal')?"checked":"" ?> >
            <label for ="lhorizontal">Horizontal </label>
            
            <input type="radio" id="lvertical" name= "layout" value="vertical"
           
            <?php
                if($_GET['layout']=="vertical"){
                    echo "checked";
                }
            ?>
            
            >
            
            <label for="lvertical"> Vertical</label>
           
            
            <select name="category">
                <option value=""> Select One </option>
                <option <?=checkIFSelected('Corolla')?>>Corolla</option>
                <option <?=checkIFSelected('ocean')?>>Oceon</option>
                <option <?=checkIFSelected('Forest')?> >Forest </option>
                <option <?=checkIFSelected('Mountain')?> >Mountain </option>
                <option <?=checkIFSelected('Otters')?> >Otters</option>
                <option <?=checkIFSelected('Sky')?> >Sky</option>
            </select>
            <br>
            <br>
            <input type="submit" value="Search"  />
            
            </div> 
            
        </form>
     
        
        <br /><br />
        
        <?php
            if(!isset($_GET['keyword'])){ //form has not been submitted
                echo "<h2>Type a keyword to display a slideshow with random images from Pixabay.com</h2>";
            }else{ //form has been submitted
            
                if (empty($_GET['keyword']) && empty($_GET['category'])){
                    echo "<h2 style='color:red'> Error! You must enter a keyword or category </h2>";
                    return;
                    exit;
                }
            // Display Carousel HEre
        ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators Here -->
            
            <ol class="carousel-indicators">
                <?php
                    for($i = 0; $i < 5; $i++) {
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0) ? "class='active'" : "";
                        echo "></li>";
                    }
                ?>
            </ol>
              <!-- Wrapper for images -->
            <div class="carousel-inner" role="listbox">
                <?php
                    for($i = 0; $i < 7; $i++) {
                        do {
                            $randomIndex = rand(0, count($imageURLs));
                        } while(!isset($imageURLs[$randomIndex])); 
                        
                        echo '<div class="item ';
                        echo ($i == 0) ? "active" : "";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
        
        <!-- Controls Here -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        
        </div>
        
        <?php
            } // end else
        ?>
        
        <br>
       

       <!--  /* place at the end to speed up page upload/download to user*/-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
    
</html>