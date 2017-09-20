<?php

function displaySymbol($symbol){
    
    echo "<img src = '../lab/lab2/img/$symbol.png' width= '70'/>";
}
$symbols = array("lemon","orange","cherry");

//print_r($symbols); // displays array contents, only for debugging purposes

//echo $symbols[0];

//displaySymbol($symbols[0]);

$symbols[] = "grapes"; // grapes is now in index 3, brackets add elements. 


//$symbols[2] = "seven"; // replacing value

array_push($symbols, "seven"); // adds element at the end of the array

displaySymbol($symbols[4]);

for ($i=0; $i < count($symbols); $i++){ // count is going to get the size of the array, 
    displaySymbol($symbols[$i]);       // that way we dont overrun the array. 
}

sort($symbols); // order elements in ascending order
print_r($symbols);
rsort($symbols); // will sort elemetns in decending order.

//shuffle($symbols); // will shuffle the element  in the array. 
echo "<hr>";
for ($i=0; $i < count($symbols); $i++){ // count is going to get the size of the array, 
    displaySymbol($symbols[$i]);       // that way we dont overrun the array. 
}

$lastSymbol =array_pop($symbols); // retrieves and REMOVES last element in array

//displaySymbol($lastSymbol);
echo "<hr>";
print_r($symbols);

foreach ($symbols as $symbol){
    displaySymbol($symbol);
}

unset($symbols[2]);  // element two removed and other elements not shifted over. 

echo "<hr>";
print_r($symbols);

$symbols = array_values($symbols); // re-indexes the array
echo "<hr>";
print_r($symbols);

//display a random symbol

displaySymbol(($symbols[rand(0,count($symbols))]));
displaySymbol(($symbols[ array_rand($symbols)]));

?>

<!DOCTYPE html>
<html>
    <head>
        <title> PHP arrays </title>
    </head>
    <body>
        
        
    </body>
</html>