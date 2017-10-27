<?php

    include("../../dbConnection.php");
    $conn = getDatabaseConnection();
    
    $sql = "DELETE FROM tc_user
        WHERE userId = " . $_GET['userId'];
        
    $stmt->$conn->prepare($sql);
    $stmt->execure();
    
    header("Location: admin.php");
?>