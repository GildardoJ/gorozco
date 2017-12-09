
<?php
    session_start();
    //include 'inc/headerAdmin.php';
    
    if (!isset($_SESSION['username'])) { //checks whether admin has logged in
        header("Location: index.php");
        exit();
    }
    
    include '../../dbConnection.php';
    $conn = getDatabaseConnection('location');
    
    function displayLocations() {
        global $conn;
        $sql = "SELECT * 
                FROM locations
                ORDER BY locationId";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $locations = $statement->fetchAll(PDO::FETCH_ASSOC);
        //print_r($users);
        return $locations;
    }
    

    include 'inc/headerAdmin.php';


?>

        <div class="jumbotron">
          <h1> Add/Delete Locations</h1>
          
        </div>

        <script>
            
            function confirmDelete(name) {
                
                
                return confirm("Are you sure you want to delete " + name + "?");
                
            }
            
            
        </script>
        <div>       
            <!--<form action="addLocation.php">
                
                <input type="submit" value="Add new User" />
                
            </form>
            -->
            
            <br /><br />
            
            <?php
            
            $locations =displayLocations();
            
            foreach($locations as $location) {
                
                //echo $location['locationId'] . " ";
                echo "<a href='locationInfo.php?locationId=".$location['locationId']."'> ".$location['name']." ". $location['city'] ." </a> " . " ";
                
                echo "[<a href='updateLocation.php?locationId=".$location['locationId']."'> Update </a> ]";
                echo "[<a href='deleteLocation.php?locationId=".$location['locationId']."'> Delete </a> ]";
                echo "<form action='deleteLocation.php' style='display:inline' onsubmit='return confirmDelete(\"".$locaiton['name']."\")'>
                         <input type='hidden' name='locationId' value='".$locationId['locationId']."' />
                         <input type='submit' value='Delete'>
                      </form>
                    ";
                
                echo "<br />";
                
            }
            
            include 'inc/footer.php';
        
    ?>
