<?php

    include 'inc/functions.php';
?>

<script type="text/javascript">  // sounds
    function play_sound() {
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', '/gorozco/HomeWork/hw2/music/ding.flac');
        audioElement.setAttribute('autoplay', 'autoplay');
        audioElement.load();
        audioElement.play();
    }
</script>

<!DOCTYPE html>
<html>
    <head>
        <title> Word Search </title>
        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    
    
    <body>
        <header>
            <h1> Word Search </h1>
            <br>
        </header>
        <div>
        <form>
                <input type="submit" value="NEW!"/>
        </form>
        </div>
           
        <div id="main">
            <?php
                play();  // call play functoin
            ?>
            
            
        
        </div>
        
    <footer>
        <hr>2017&copy; Orozco <br/>
        <strong>Disclaimer:</strong> The information in this webpage is fictitous. <br/>
        It is used for academic purposes only. <br/>
        <img src="img/Cal-State-Monterey-Bay.jpg" alt="CSUMB logo" />
    </footer>
        
    </body>
</html>


