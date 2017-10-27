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
    
    print_r($records);




?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <?php
            echo $record['firstName'] . " " . $records['lastName'];
            echo "<br/ > Email: " .$redords['email'];
            echo "<br/ > UniversityId: " .$redords['universityId'];
            echo "<br/ > gender: " .$redords['gender'];
            echo "<br/ > phone: " .$redords['phone'];
            echo "<br/ > role: " .$redords['role'];
        ?>
        

    </body>
</html>