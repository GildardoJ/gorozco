<?php

    function getCard(){
        $randomValue= rand(0,19);
       
        return ".$randomValue.";
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Card Game </title>
        <meta charset="utf-8" />
        <link href ="/gorozco/challenges/challenge2/styles.css"  rel="stylesheet" type="text/css"/ >
    </head>
    
    <style>
    body {
        margin:50;
    }
    
        
        
    </style>
    
    <body>
        <h1>Random Card Game</h1>
    <?php
    
        $randomCard = rand(0,19);
        $randomCard1 = rand(0,19);
        
         echo "<img src='img/cards/$randomCard.png' alt='$randomCard' tittle=\"$randomCard\" width=\"70\"/>";
         echo "<img src='img/cards/$randomCard1.png' alt='$randomCard1' tittle=\"$randomCard1\" width=\"70\"/>";

        
    
    ?>
    
    
    </body>
</html>