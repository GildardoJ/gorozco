<?php
 session_start();
 
 include 'inc/header.php';  
 
 include '../../dbConnection.php';
 $conn = getDatabaseConnection('location');
 
 
 function getCities() {
     global $conn;
     $sql = "SELECT DISTINCT(city) 
             FROM locations
             ORDER BY city";
     $statement = $conn->prepare($sql);
     $statement->execute();
     $locations = $statement->fetchAll(PDO::FETCH_ASSOC);
     
     //print_r($locations);
     //return $locations;
     
     foreach($locations as $location) {
             echo "<option>" . $location['city'] . "</option>";
     }
 }
 

 
 function displayLocations(){
     global $conn;
     $sql = "SELECT * FROM locations where 1";
     
     if(isset($_GET['submit'])){
         $namedParameters = array();
         if(!empty($_GET['name'])){
             $sql .= " AND name LIKE :name";
             $namedParameters[':name'] = "%" . $_GET['name'] . "%";
         }
         
         if(!empty($_GET['city'])){
             $sql .=" AND city = :city";
             
             $namedParameters[':city'] = $_GET['city'];
         }
         
         if(!empty($_GET['orderByCity'])){
             $sql .= " ORDER BY city";
         }
         
         if(!empty($_GET['orderBylocation'])){
             $sql .= " ORDER BY name";
         }
     }
     
     $statement = $conn->prepare($sql);
     $statement->execute($namedParameters);
     $locations = $statement->fetchAll(PDO::FETCH_ASSOC);
     
     foreach($locations as $location) {
         
         //echo $location['locationId'] . " ";
         echo "<a href='#' class='locationList' id='".$location['locationId']."'> ".$location['name']."  </a> " . " ";
         
         echo "<br />";
         
     }
 }
 
 ?>
    <div class="jumbotron">
        <h2> List of Locations</h2>
    </div>
        
    <script>
    
        $(document).ready( function(){
            //alert($(this).attr('id'));
             $(".locationList").click( function(){
                 
                 //alert($(this).attr('id'));
                 $('#locationInfoModal').modal("show");
                 $("#locationInfo").html("<img src='img/loading.gif'>");
                 
                 $.ajax({
                    
                     type: "GET",
                     url: "api/getLocationInfo.php",
                     dataType: "json",
                     data: { "locationId": $(this).attr('id') },
                       
                     success: function(data,status) {
                     
                        alert(data);
                        //alert(data.street);
                        
                        $("#locationInfo").html(" " + data.name + "<br>" + 
                                                " <img src='img/Its-Beach.jpg'><br >" );   
                      
                        $("#locationNameModalLabel").html(data.city);                   
                        
                     },
                     complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                     }
                     
                 });//ajax
             
             }); //.getLink click
        });//document.ready
        
 
        
    </script>

        <form active="">
              Search Location Name: <input type="text" name="name" placeholder="location name"/>
              City: 
              <select name="city" id="city">
                  <option value="">Select City</option>
                  <?=getCities()?>
              </select>
              
              Order By:
              <input type="radio" name="orderByCity" id="orderByCity" value="city"/>
              <label for="orderByCity"> City </label>
              <input type="radio" name="orderByLocation" id="orderByLocation" value="name"/>
              <label for="orderByLocation"> Location </label>
              
              
              <input type="submit" name="submit" value="Search!">
        </form>
         
         <?=displayLocations()?>
 
        <!-- Modal -->
        <div class="modal" id="locationInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="locationNameModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                   <div id="locationInfo"></div> 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    
        
    <?php
        
         include 'inc/footer.php';
     ?> 