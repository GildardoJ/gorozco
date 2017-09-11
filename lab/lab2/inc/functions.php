<?php

        function displaySymbol($randomValue,$pos) {
           // $randomValue = rand(0,2);
            
            switch ($randomValue ) {
                
                case 0: $symbol = "orange";
                        break;
                case 1: $symbol = "lemon";
                        break;
                case 2: $symbol = "grapes";
                        break;
                case 3: $symbol = "seven";
                        break; 
            }
            echo "<img id='reel$pos' src = 'img/$symbol.png' alt='$symbol' tittle='$symbol' width='70' />";
           // echo "<img src='img/$symbol.png' alt='$symbol' tittle='". ucfirst($symbol) . "' width='70' />";
        }
        
        
        function displayPoints($randomValue1,$randomValue2, $randomValue3, $randomValue4) {
            
            echo "<div id= 'output'>";
            if ($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3 && $randomValue3 == $randomValue4){
                switch ($randomValue1) {
                    case 0: $totalPoints = 1000;
                            echo "<h1>Jackpot!</h1>";
                            echo '<script type="text/javascript">play_sound();</script>';
                            break;
                    case 1: $totalPoints = 500;
                            break;
                    case 2: $totalPoints = 250;
                            break;
                    case 3: $totalPoints = 900;
                            break;
                }
                
                $priceMoney += $totalPoints;
                echo "<h2> You won $totalPoints points!</h2>";
                echo "<h2> Total winnings = $priceMoney ! </h2>";
            }else {
                echo "<h3> Try again! </h3>";
            }
            echo "</div>";
            return $priceMoney;
        }
        
    
       function play() {
           
         //  $priceMoney = 0;
          // echo "<h2> price moeny = $priceMoney ! </h2>";
            for ($i=1; $i<5; $i++){
                ${"randomValue" . $i } = rand(0,3);
                displaySymbol(${"randomValue" . $i},$i);
            }
            
            displayPoints($randomValue1, $randomValue2, $randomValue3,$randomValue4);
        }
        
        
        /*
        for ($i=1; $i<4; $i++){
            ${"randomValue" . $i} = rand(0,2);
            displaySymbol(${"randomValue" . $i});
        }
        displayPoints($randomValue1, $randomValue2, $randomValue3);
        */

?>