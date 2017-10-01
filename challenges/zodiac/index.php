<?php

echo "<h3> USA INDEPENDENCE </h3>";

function yearList($startYear,$endYear){
    
    $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
    $yearSum = 0;
    $j = 0;
    
    if(isset($_GET['startYear'])){
    
    echo 'Hello '.  $_GET["startYear"] . '!';
    
    }
    for ($i = $startYear; $i <= $endYear; $i = $i + 4){
        echo "<li> Year $i </li>";
        $yearSum += $i;
        
        echo "<img  src = '$zodiac[$j].png' alt='$zodiac[$j]' tittle='$zodiac[$j]' width='70' />";
        if ( $i == 1500){
            echo "happy new year";
        }
        $j++;
    }
    
    
    return $yearSum;
    
}


    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Practice: Chinese Zodiac </title>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php
        
            $startYear = 1500;
            $endYear = 1600;
            
            echo ' total ' . yearList($startYear,$endYear);
        ?>
    </body>
</html>