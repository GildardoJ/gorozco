<?php

    include 'inc/functions.php';
?>

<script type="text/javascript">
    function play_sound() {
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', '/gorozco/lab/lab2/music/ding.flac');
        audioElement.setAttribute('autoplay', 'autoplay');
        audioElement.load();
        audioElement.play();
    }
</script>

<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    
    
    <body>
        <div id="main">
            <?php
            
                play();
           
            ?>
            
            <form>
                <input type="submit" value="Spin!"/>
            </form>
           
        
        </div>
        
    </body>
</html>

