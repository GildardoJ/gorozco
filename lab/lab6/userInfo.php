<?php

session_start();

if(!isset($_SESSION['username'])){ // validates that admin has indeed logged in.
    
    header("location: index.php");
}
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
       
    $sql = "SELECT * 
            FROM tc_user 
            WHERE userId =  " . $_GET['userId'] ;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    //print_r($records);

    //echo $records[0]['firstName'];



?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body><br><br>
        <?php
            echo $records[0]['firstName'] . " " . $records[0]['lastName'];
            echo "<br/ > Email: " .$records[0]['email'];
            echo "<br/ > UniversityId: " .$records[0]['universityId'] ."";
            echo "<br/ > gender: " .$records[0]['gender'] ."";
            echo "<br/ > phone: " .$records[0]['phone']."";
            echo "<br/ > role: " .$records[0]['role']."";
        ?>
        

    </body>
</html>