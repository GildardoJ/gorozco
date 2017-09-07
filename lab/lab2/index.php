<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <meta charset="utf-8" />
    </head>
    <body>
        
        <?php
        
        function displaySymbol($randomValue) {
           // $randomValue = rand(0,2);
            
            switch ($randomValue ) {
                
                case 0: $symbol = "orange";
                        break;
                case 1: $symbol = "lemon";
                        break;
                case 2: $symbol = "grapes";
                        break;        
            }
        
        echo "<img src='img/$symbol.png' alt='$symbol' tittle=\"$symbol\" width=\"70\"/>";
        
    //    function displayPoints = 1000
        }
        
        $randomValue1 = rand(0,2);
        displaySymbol($randomValue1);
        $randomValue2 = rand(0,2);
        displaySymbol($randomValue2);
        $randomValue3 = rand(0,2);
        displaySymbol($randomValue3);

        echo "<img src='img/$symbol.png' alt='$symbol' tittle=\"$symbol\" width=\"70\"/>";
 
       // $symbol7 = "orange";
        

        /*
        if ($randomValue == 0) {
            
            $symbol = "seven";
            
        } else if ( $randomValue == 1) {
            
            $symbol = "lemon";
            
        }else {
            
            $symbol = "grapes";
            
        }
        */
        
        
        
       // echo $randomValue;
        
       // $symbol7 = $randomValue;
        
        
        ?>
        
    </body>
</html>