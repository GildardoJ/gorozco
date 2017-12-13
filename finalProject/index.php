<?php

    session_start();
    include 'inc/header.php';
    
?>


        <div class="container-fluid bg-1 text-center">
              <h1> Admin Login</h1>
        </div>
        
        <div class="container-fluid bg-2 text-center">
              <table style="width:100%"> 
                    <form method="POST" action="loginProcess.php">
                        <fieldset>   
                            <label> Username:</label>
                             <input type="text" name="username"/> <br />
                        </fieldset>
                       <fieldset>   
                            <label> Password :</label>
                             <input type="password" name="password"/> <br />
                        </fieldset>
                        <fieldset> 
                           <input type="submit" class="btn btn-secondary" name="login" value="Login"/>
                        </fieldset> 
                        
                    </form>
                </table>
        </div>
        
        <?php
        
            if($_SESSION['loginError'] == true){
            echo "<p style= 'color: red;' >Wrong username or password!</p>";
            }
            
            include 'inc/footer.php';
        ?>
        