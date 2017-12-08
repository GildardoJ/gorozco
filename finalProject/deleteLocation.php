<?php

    include("../../dbConnection.php");
    $conn = getDatabaseConnection();
    
    $sql = "DELETE FROM locations
        WHERE locationId = " . $_GET['locationId'];
        
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    
    header("Location: admin.php");
?>