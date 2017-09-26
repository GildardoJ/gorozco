
<?php
include "functions.php";

$start = microtime(true);

session_start(); //start or resume a session

if (!isset($_SESSION['matchCount'])) { //checks whether the session exists
    $_SESSION['matchCount'] = 1;
    $_SESSION['totalElapsedTime'] = 0;
}


?>

<html>
    <head>
        <title>Silverjack Arrays</title>
        <meta charset='utf-8'>
        <style>
            @import url("styles.css");
        </style>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    </head>
    <body>
        <header>
            <h1 id="page-title">Silverjack</h1>
        </header>
        <div class='container'>
           <?php
           
           play();
           
           elapsedTime();
           
           ?>
           
        </div>
    </body>
    <!---->
</html>