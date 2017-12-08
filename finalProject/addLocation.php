<?php
session_start();

if(!isset($_SESSION['username'])){ // validates that admin has indeed logged in.
    
    header("location: index.php");
}
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    
function getLength(){
    
    global $conn;        
    $sql = "SELECT locationId
            FROM locations 
            ORDER BY locationId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    //echo count($records);
    //print_r($records);
    return count($records);
    
}
function getLocationInfo(){
    
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

if (isset($_GET['addLocationForm'])){
    //the administrator clicked on the "Add User" button
    $name = $_GET['name'];
    $streetNum = $_GET['streetNum'];
    $street = $_GET['street'];
    $city = $_GET['city'];
    $zip  = $_GET['zip'];
    $state = $_GET['state'];
    $publicPrivateId = $_GET['publicPrivateId'];
    $sceneryId = $_GET['sceneryId'];
    
    // no single quotes for parameter Id's as it allowr for sql injection
    
    $sql = "INSERT INTO locations
            (locationId, name, streetNum, street, city, zip, state, publicPrivateId, sceneryId)
            VALUES 
            (:locationId, :name, :streetNum, :street, :city, :zip, :state, :publicPrivateId, :sceneryId)";
    $namedParameters = array();
    $namedParameters[':locationId'] = getlength();
    $namedParameters[':name'] = $name;
    $namedParameters[':streetNum'] = $streetNum;
    $namedParameters[':street'] = $street;
    $namedParameters[':city'] = $city;
    $namedParameters[':zip'] = $zip;
    $namedParameters[':state'] = $state;
    $namedParameters[':publicPrivateId'] = $publicPrivateId;
    $namedParameters[':sceneryId'] = $sceneryId;
    
    $stmt=$conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    //$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //return $data;
}

include 'inc/headerAdmin.php';
?>



        <div class="jumbotron">
            <h2> New Location?</h2>
        
        <fieldset>
         <form>
            
            Location: <input type="text" name="name"/> <br>
            Street Num: <input type="text" name="streetNum"/> <br>
            Street: <input type="text" name="street"/> <br>
            City: <input type="text" name="city"/> <br>
            zip: <input type="text" name="zip"/> <br>
            State: <input type="text" name="state"/> <br>
            Scenery: <select name="sceneryId">
                        <option value=""> Select One </option>
                        <?php
                        
                            $locations = getSceneryInfo();
                            foreach ($locations as $record) {
                                echo "<option value='$record[sceneryId]'>$record[view]</option>";
                            }
                        
                        ?>
                            
                    </select>
            Access: <select name="publicPrivateId">
                        <option value=""> Select One </option>
                        <?php
                        
                            $locations = getLocationInfo();
                            foreach ($locations as $record) {
                                echo "<option value='$record[ppId]'>$record[access]</option>";
                            }
                        
                        ?>
                            
                    </select>
                    <br />
                <input type="submit" name="addLocationForm" value="Add Location!"/>
        </form>
    
        </fieldset>
        
        <?php getlength() ?>
    </body>
</html>