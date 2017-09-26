<?php
session_start();    // Use to start  or continue an existing session. 
                    //sessions needed to keep track of score. 
   
    //$players = array("Juan"=>20); // no need to declare an empty array for associative arrays, 
    //$players["John"] = 40;
    
    if (!isset($_SESSION['matchCount'])){
        $_SESSION['matchCount'] = 0;
    }
    
    
    echo $players["John"];
    echo "<br>";
    echo $players["Juan"];
    
    $_SESSION["Juan"];
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <tittle></tittle>
    </head>
    <body>
        
    </body>
    
</html>