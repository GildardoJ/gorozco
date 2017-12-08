<?php 
    
    //print_r($_FILES);
    //echo "File size " . $_FILES['myFile']['size'];
    move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"] );

    $files = scandir("gallery/", 1);
    
    //print_r($files);
    

    
    function filterUploadedFile(){
          $allowedSize= 1000000;
          //echo "In function";
          if($_FILES["myFile"]["size"] > $allowedSize){
              $fileterError = "File size too big. <br>";
          }
          return $filterError;
     }
    
    if(isset($_POST['uploadForm'])){
        $filterError = filterUploadedFile();
        if(empty($filterError)){
            if($_FILES['myFile']['error'] >0 ){
                
                echo "<br>File size too big <br>";
            }else{
                echo"<br>Upload:".$_FILES["myFile"]["name"]."<br>";
                echo"Type: ".$_FILES["myFile"]["type"]."<br>";
                echo "Size:".($_FILES["myFile"]["size"]/ 1024)."KB<br>";
                
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Photo Gallery </title>
        
        <link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel = "stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         <link  href="css/styles.css" rel="stylesheet" type="text/css" />
        <style>
        
        body {
            text-align:center;
            margin: 40px;
        }
        form {text-align:center;}
        
    </style>  
    
    <script>
      $(document).ready(function(){    
           $("img").click(function(){    
                $("img").animate({width: "500px"});
            });
     });
        
    </script>
    </head>

    <body>
       
            
        <?php
            
            for ($i = 0; $i < count($files) - 2; $i++) {
            echo "<img  id= 'myImg' src='gallery/" . $files[$i] . "'   width='300' class='upImaga' >";
            }
        
        ?>
        
        <!-- Trigger the Modal -->

    
    <!-- The Modal -->
    
     <div id="myModal" class="modal">
      <!-- The Close Button -->
      <span class="close">&times;</span>
    
      <!-- Modal Content (The Image) -->
      <img class="modal-content" id="img01">
    
      <!-- Modal Caption (Image Text) -->
      <div id="caption"></div>
    </div>
    
    <h2> Photo Gallery </h2>
    <form method="POST" enctype="multipart/form-data"> 


        <br>Select file: <input type="file" name="myFile" /> <br>
        
        <input type="submit" name="uploadForm" value="Upload File!" />

    </form>
    <script>
    // Get the modal
    var modal = document.getElementById('myModal');
    
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        modal.style.display = "none";
    }

    </script>
    
    </body>
</html>

