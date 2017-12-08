<?php
    
include '../../dbConnection.php';

$conn = getDatabaseConnection('tcp');

function getDeviceTypes() {
    global $conn;
    $sql = "SELECT DISTINCT(deviceType)
            FROM `tc_device` 
            ORDER BY deviceType";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo "<option> "  . $record['deviceType'] . "</option>";
        
    }
}

function displayDevices(){
    global $conn;
    
    $sql = "SELECT * FROM tc_device WHERE 1";
    

    if (isset($_GET['submit'])){
        
        $namedParameters = array(); // associative array.
         
        
        if(!empty($_GET['deviceName'])){
            
            //The following query allows SQL injection due to the single quotes.
            //$sql .= " AND deviceName LIKe '%" . $_GET['deviceName'] . "%'";
            $sql .= " AND deviceName LIKE :deviceName"; // using named parameters,
            //to avoid using single quotes, prevent hacking by sql injection.
                                            //^place holder
            $namedParameters[':deviceName'] = "%" . $_GET['deviceName'] . "%"; 
            
        }
        
        if(!empty($_GET['deviceType'])){
           
            $sql .= " AND deviceType = :dType"; 
            $namedParameters[':dType'] = $_GET['deviceType'] ;
        }
        
        if (!empty($_GET['available'])){
            $sql .= " AND status = :status";
            $namedParameters[':status'] = "A";
            //echo $_GET['status'];
        }
        
        if(!empty($_GET['orderByName'])){
            $sql .= " ORDER BY deviceName ";
        }
        
        if(!empty($_GET['orderByPrice'])){
            $sql .= " ORDER BY price ";
        }
        
    }//endIf (isset)
    
    //If user types a deviceName
     //   "AND deviceName LIKE '%$_GET['deviceName']%'";
    //if user selects device type
      //  "AND deviceType = '$_GET['deviceType']";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
     foreach ($records as $record) {
        
        echo  $record['deviceName'] . " " . $record['deviceType'] . " " .
              $record['price'] .  "  " . $record['status'] . 
              "<a href='checkoutHistory.php?deviceId=".$record['deviceId']."'> Checkout History </a> <br />";
        
     }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> -Lab 5: Device Search- </title>
    </head>
    <body>
        
        <h1> Technology Center: Checkout System </h1>
        
        <form action="">
            Device: <input type="text" name="deviceName" placeholder="Device Name"/>
            Type: 
            <select name="deviceType" id="device">
                <option value="">Select One</option>
                <?=getDeviceTypes()?>
            </select>
            
            <input type="checkbox" name="available" id="available">
            <label for="available"> Available </label>
            
            <br>
            Order by:
            <input type="radio" name="orderByName" id="orderByName" value="name"/> 
             <label for="oder"> Name </label>
            <input type="radio" name="orderByPrice" id="orderByPrice" value="price"/> 
             <label for="oder"> Price </label>
            
            <input type="submit" name="submit" value="Search!" >
        </form>
        
        <hr>
        <?=displayDevices()?>
    </body>
</html>