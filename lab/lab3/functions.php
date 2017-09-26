<?php

function elapsedTime(){
global $start;
     echo "<hr>";
     $elapsedSecs = microtime(true) - $start;
     echo "This match elapsed time: " . $elapsedSecs . " secs <br /><br/>";

     echo "Matches played:"  . $_SESSION['matchCount'] . "<br />";

     $_SESSION['totalElapsedTime'] += $elapsedSecs;
     
     echo "Total elapsed time in all matches: " .  $_SESSION['totalElapsedTime'] . "<br /><br />";
     
     echo "Average time: " . ( $_SESSION['totalElapsedTime']  / $_SESSION['matchCount']);
     
     $_SESSION['matchCount']++;
} //elapsedTime


function play(){

//$start = microtime(true);

for ($i = 0; $i < 1000000; $i++) {
    $j = rand(1,3000) * rand(1,2000);
}


$deck = range(0,51);  //creates array with values 1 to 52

$suits = array("clubs","spades","hearts","diamonds");

shuffle($deck);

    echo "   <div class='player-field'>";
    $playerTotal = 0;  // total points for each player
    $totalPoints = 0;
    $i= 0; // what player we are on.
    $players = array(0,0,0,0);  // 4 players
    
    $playerPics = array(0,1,2,3);
    
    shuffle($playerPics);
    
    //echo " < div>";
        echo "<img class='image-object' src='img/".$playerPics[0].".jpg' alt='Picture of card'>";


foreach ($deck as $card) { // for loop
        
        echo "<img class='image-object' src='img/".$suits[floor($card / 13)]."/".(($card % 13) + 1).".png' alt='Picture of card'>";
        
        if($playerTotal > 35){
            $players[$i] = $playerTotal;
            $i ++;
            
            //echo $playerTotal;
            echo "<h3 class='player-points'> $playerTotal</h3>";
            echo " <br />";
            //echo " </div>";
            //echo " <div> ";
            echo "</div>";
            if($i != 4){
                echo "<div class='player-field'>";
                echo "<img class='image-object' src='img/".$playerPics[$i].".jpg' alt='Picture of card'>";
                
            }
            $playerTotal = 0;
        }
        
        if($i >3){
            break;
        }
        
        $playerTotal += (($card % 13) + 1); // <!-- keep track of each players --> 
        $totalPoints += (($card % 13) + 1); //  <!-- Game total points for all players-->
        
}


    $winningIndex = 0;
    $biggerNum = 0;
    for($i = 0; $i < 4; $i++){
        if(($players[$i] > $biggerNum) && ($players[$i] <= 42)){
            $biggerNum = $players[$i];
            $winningIndex = $i;
            $totalPoints -= $players[$i];
        }
    }

    echo "<div class='end-field'>";
    echo "Player " . ($winningIndex + 1) . " wins";
    echo "<br />";
    if($winningIndex < 3){
    for($i = $winningIndex + 1; $i < 4; $i++){
     if($players[$i]==$players[$winningIndex]){
        echo "Player " . ($i + 1) . " wins";
       $totalPoints -= $players[$i];
           
       }
    }
    echo "<br />";
    echo "<h2> Points: " . $totalPoints . "</h2>";
    
    }
    echo "<br />";
    $elapsedSecs = microtime(true) - $start;
    echo $elapsedSecs . " secs";
    
    //echo "</div>";
    
   
}



?>