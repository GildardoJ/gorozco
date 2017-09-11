<?php

    function getRandomColor(){
        
        return "rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";

    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Random Background Color </title>
        <meta charset= "utf-8" />
    </head>
    <style>
        body {
           /* background-color: rgba(50,20,100, 1);*/
            
            <?php
           /* 
            $red = rand(0,255);
            $green = rand(0,255);
            $blue = rand(0,255);
            $a = rand(0,10)/10;
            */
            echo "background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";
            
            ?>
            
        }
        h1 {
           /* background-color: rgba(50,20,100, 1);*/
            
            <?php
           /* 
            $red = rand(0,255);
            $green = rand(0,255);
            $blue = rand(0,255);
            $a = rand(0,10)/10;
            */
            echo "color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";
            echo "background-color: " .getRandomColor(); /* allways need the dot operator for...  */

            
            ?>
            
        }
        
        h2 {
            
            background-color: <?=getRandomColor()?>;  /* instead of php we have =*/
        }
        
    </style>
    
    <body>
        <h1> Welcome! </h1>
        
        <h2> Hola! </h2>
        
    

    </body>
</html>