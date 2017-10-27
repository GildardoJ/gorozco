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
        
        
        
        
        function displayPuzzle($letters){
            
            for($j=0; $j<15; $j++){  
                
                echo "<tr>";
                for ($i=0; $i<15; $i++){
                    echo "<td>";
                    echo $letters[$j][$i];
                    
                    echo "</td>";
                }
                echo "</tr>";
                
            }    
          
            echo "</table>";
            
        }
        
        function getWord(){
            $words = array("MONTEREY","SALINAS","SANTA","CALIFORNIA","WINDOWS","CUBA", "INTERNET");
            
            $rand = rand(0,sizeof($words)-1);
            
            $word = $words[$rand];
           
            return $word;
        }
        
        
            
        function insertWord(&$letters){
            
            $word = getWord();
            echo $word . " ";    // shows word at the top of page
            $strlen = strlen($word); // needed for for loops.
            //echo "strlen = " . $strlen . " " ; // debugging value for stringlength. 
            $randRow = rand(0,(15-$strlen));
            $randCollum  = rand(0,14);
            
            //echo $randRow . " ";  // output row index
            //echo $randCollum;     // output collum index
            
            $wordArr = str_split($word);  // convert from string to array
            
            
            $randReverse = rand(0,1); // to reverse word or not too.
            
            if( $randReverse == 0){
                $wordInsert = $wordArr; // do nothing
            } else if ( $randReverse == 1 ){
                $wordInsert = array_reverse($wordArr);
                
            }
            
            $iterate = 0; // iterate insterted word into array 
            switch(rand(0,1)){
                case 0: // insert into 2d array on Row
                    
                    for($j=$randCollum; $j< $randCollum+1; $j++){  // creat 15x15 table filled with random letters
                         for ($i= $randRow; $i< ($randRow + $strlen); $i++){
                            
                            $letters[$j][$i] = $wordInsert[$iterate] ;
                            $iterate++;
                        }
                    }
                    break;
                case 1:  // insert into 2d array on Collum
                    for($j=$randCollum; $j< $randCollum+1; $j++){  // creat 15x15 table filled with random letters
                         for ($i= $randRow; $i< ($randRow + $strlen); $i++){
                            
                            $letters[$i][$j] = $wordInsert[$iterate] ;
                            $iterate++;
                        }
                    }
                    
                    
                    break;
               
            }
       
        }
   
    
       function play() {
           
          echo "<table id='transparent'>";
          
          $alphas = range ('A', 'Z'); //new array of letters from A to Z
          $letters = array(array()); // new 2d array.
           
          shuffle($alphas);            // randomise of alphas array
          
         for($j=0; $j<15; $j++){  // creat 15x15 table filled with random letters
            for ($i=0; $i<15; $i++){
                $letters[$j][$i] = $alphas[$i];
            }
            shuffle($alphas);
          }    
          
          insertWord($letters);
          displayPuzzle($letters);
          
          echo "</table>";
        }
        
        
        

?>