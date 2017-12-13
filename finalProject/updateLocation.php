<?php
session_start();

if(!isset($_SESSION['username'])){ // validates that admin has indeed logged in.
    
    header("location: index.php");
}
    include '../dbConnection.php';
    $conn = getDatabaseConnection('location');
    
function getAccessInfo(){
    
    global $conn;        
    $sql = "SELECT ppId, access 
            FROM publicPrivate 
            ORDER BY ppId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    //print_r($records);
    return $records;
}

function getSceneryInfo(){
    
    global $conn;        
    $sql = "SELECT sceneryId, view 
            FROM scenery 
            ORDER BY sceneryId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    //print_r($records);
    return $records;
}

function getLocationInfo($locationId) {
    global $conn;
    $sql = "SELECT *
            FROM locations
            WHERE  locationId = $locationId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    //print_r($record);
    return $record;


}

if (isset($_GET['updateLocationForm'])){
    
    $sql = "UPDATE locations 
            SET 
                name = :name,
                streetNum = :streetNum,
                street = :street,
                city = :city,
                zip = :zip,
                state = :state,
                publicPrivateId = :publicPrivateId,
                sceneryId = :sceneryId
            WHERE locationId = :locationId ";
    $namedParameters = array(":locationId"=>$_GET['locationId']);
    $namedParameters[":name"] = $_GET['name'];
    $namedParameters[":streetNum"] = $_GET['streetNum'];
    $namedParameters[":street"] = $_GET['street'];
    $namedParameters[":city"] = $_GET['city'];
    $namedParameters[":zip"] = $_GET['zip'];
    $namedParameters[":state"] = $_GET['state'];
    $namedParameters[":publicPrivateId"] = $_GET['publicPrivateId'];
    $namedParameters[":sceneryId"] = $_GET['sceneryId'];
    
    $stmt = $conn->prepare($sql);
    print_r($namedParameters);
    $stmt->execute($namedParameters);
    
    //$recordd = $stmt->fetch();
    
    //return $recordd;
}

if (isset($_GET['locationId'])){
    
    $locationInfo = getLocationInfo($_GET['locationId']);
    
}

include 'inc/headerAdmin.php';
?>

        <div class="jumbotron">
            <h2> Update Location?</h2>
        
        <fieldset>
            
         <form>
            
            <input type="hidden" name="locationId" value="<?=$locationInfo['locationId']?> " /><br>
            Location: <input type="text" name="name" required value="<?=$locationInfo['name']?>"/> <br>
            Street <input type="text" name="streetNum" required value="<?=$locationInfo['streetNum']?>"/> 
            <input type="text" name="street" required value="<?=$locationInfo['street']?>"/> <br>
            City: <input type="text" name="city" required value="<?=$locationInfo['city']?>"/> <br>
            State: <input type="text" name="state" value="<?=$locationInfo['state']?>"/> <br>
            zip: <input type="text" name="zip" value="<?=$locationInfo['zip']?>"/> <br>
            Scenery: <select name="sceneryId" >
                        <option value="" value="<?=$locationInfo['sceneryId']?>"> Select One </option>
                        <?php
                        
                            $locations = getSceneryInfo();
                            foreach ($locations as $record) {
                                echo "<option value='$record[sceneryId]'>$record[view]</option>";
                            }
                        
                        ?>
                            
                    </select>
            Access: <select name="publicPrivateId" value="<?=$locationInfo['publicPrivateId']?>">
                        <option value=""> Select One </option>
                        <?php
                        
                            $locations = getAccessInfo();
                            foreach ($locations as $record) {
                                echo "<option value='$record[ppId]'>$record[access]</option>";
                            }
                        
                        ?>
                        
                <input type="submit" name="updateLocationForm" value="Update Location!"/>
        </form>
    
        </fieldset>
    </body>
</html>