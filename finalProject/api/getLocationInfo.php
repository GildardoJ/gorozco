<?php

session_start();

    include '../../dbConnection.php';
    $conn = getDatabaseConnection('location');
    
    $sql = "SELECT * 
            FROM locations 
            WHERE locationId =  :locationId" ;
    $stmt = $conn->prepare($sql);
    $stmt->execute(array("locationId"=>$_GET['locationId']));
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
    
    return $records;
?>
