<?php

//session_start();

    include '../../dbConnection.php';
    $conn = getDatabaseConnection('location');
    
    $sql = "SELECT * , YEAR(CURDATE())
            FROM locations 
            WHERE locationId =  :locationId" ;
    $stmt = $conn->prepare($sql);
    $stmt -> execute(array("locationId"=>$_GET['locationId']));
    $records = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
    
?>
