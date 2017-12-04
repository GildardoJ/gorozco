<?php 
    
    //print_r($_FILES);
    //echo "File size " . $_FILES['myFile']['size'];
    move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"] );
    

    
    $files = scandir("gallery/", 1);
    
    //print_r($files);
    
    for ($i = 0; $i < count($files) - 2; $i++) {
        
        echo "<img src='gallery/" . $files[$i] . "' width='50' class='petImage' >";
        
    }
    
    
    


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Photo Gallery </title>
        
        <link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel = "stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
        
        body {
            text-align:center;
            margin: 40px;
        }
        form {text-align:center;}
        
    </style>  
    
    <script>
        $(document).ready( function(){
         
            $('#petInfoModal').modal("show");
            
            $(".petImage").click( function(){
                $('#petInfoModal').modal("show");
                $(".img").html("<img src='gallery/graffiti-2559636_640'>");
            });
      });
      
      
      
      
        
    </script>
    </head>

    <body>
    
    <h2> Photo Gallery </h2>
    <form method="POST" enctype="multipart/form-data"> 


        <input type="file" name="myFile" /> <br>
        
        <input type="submit" value="Upload File!" />

    </form>
       <!-- Modal -->
    <div class="modal fade" id="petInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="petNameModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
               <div id="petInfo"></div> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    
    </body>
</html>