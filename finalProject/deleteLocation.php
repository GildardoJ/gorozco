<?php

    include("../dbConnection.php");
    $conn = getDatabaseConnection('location');
    
    $sql = "DELETE FROM locations
        WHERE locationId = " . $_GET['locationId'];
        
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    
    header("Location: admin.php");
?>