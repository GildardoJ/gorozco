<?php
        
        include '../../dbConnection.php';
        $conn = getDatabaseConnection();
        
        $sql = "SELECT *
                FROM tc_admin
                WHERE username = :username 
                AND   password = :password";
        
        $namedParameters = array();
        $namedParameters[':username'] = $_GET['username'];     
                
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record
        
        //print_r($record);
        
        echo json_encode($record);
        
        
        //don't include html code on this page, otherwise it will be exported to json code. 

?>

