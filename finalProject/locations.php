<?php
session_start();

include '../../dbConnection.php';
$conn = getDatabaseConnection('location');


function displayLocations() {
    global $conn;
    $sql = "SELECT * 
            FROM locations
            ORDER BY locationId";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($users);
    return $users;
    
}


include 'inc/header.php';

?>


 <?php
        
        $locations =displayLocations();
        
        foreach($locations as $location) {
            
            //echo $location['locationId'] . " ";
            echo "<a href='locationInfo.php?locationId=".$location['locationId']."'> ".$location['name']." ". $location['city'] ." </a> " . " ";
            
            echo "<br />";
            
        }
        
        include 'inc/footer.php';
?>