<?php

    session_start();
    include 'inc/header.php';
    
?>


        <div class="jumbotron">
              <h1> Admin Login</h1>
        </div>
        
        
     
        <form method="POST" action="loginProcess.php">
            
            Username: <input type="text" name="username"/> <br />
            
            Password: <input type="password" name="password"/> <br />
            
            <input type="submit" name="login" value="Login"/>
            
            
        </form>
        
        
        <?php
        
            if($_SESSION['loginError'] == true){
            echo "<p style= 'color: red;' >Wrong username or password!</p>";
            }
            
            include 'inc/footer.php';
        ?>
        