<?php

    session_start();
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 6: admin Login Page </title>
    </head>
    <body>
        
        <h1> Admin Login </h1>
        
        <form method="POST" action="loginProcess.php">
            
            Username: <input type="text" name="username"/> <br />
            
            Password: <input type="password" name="password"/> <br />
            
            <input type="submit" name="login" value="Login"/>
            
            
        </form>
        
        
        <?php
            if($_SESSION['loginError'] == true){
            echo "<p style= 'color: red;' >Wrong username or password!</p>";
            }
        ?>
        
    </body>
</html>