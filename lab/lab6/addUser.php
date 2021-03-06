<?php
session_start();

if(!isset($_SESSION['username'])){ // validates that admin has indeed logged in.
    
    header("location: index.php");
}
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
function getDepartmentInfo(){
    global $conn;        
    $sql = "SELECT deptName, departmentId 
            FROM tc_department 
            ORDER BY deptName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;
    
}

if (isset($_GET['addUserFrom'])){
    //the administrator clicked on the "Add User" button
    $firstName = $_GET['firstName'];
    $firstName = $_GET['lastName'];
    $email = $_GET['email'];
    $universityId  = $_GET['universityId'];
    $phone = $_GET['phone'];
    $gender = $_GET['gender'];
    $role = $_GET['role'];
    $deptId = $_GET['deptId'];
    
    // no single quotes for parameter Id's as it allowr for sql injection
    
    $sql = "INSERT INTO tc_user
            (firstName, lastName, email, universityId, gender, phone, role, deptId)
            VALUES 
            (:fName, :lName, :email, :universityId, :gender, :phone, :role, :deptId)";
    $namedParameters = array();
    $namedParameters[':fName'] = $firstNam;
    $namedParameters[':lName'] = $lastName;
    $namedParameters[':email'] = $email;
    $namedParameters[':universityId'] = $universityId;
    $namedParameters[':gender'] = $gender;
    $namedParameters[':phone'] = $phone;
    $namedParameters[':role'] = $role;
    $namedParameters[':deptId'] = $deptId;
    
    $stmt - $conn->prepare($sql);
    $stmt->execute($namedParameters);
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Admin: Adding New User </title>
    </head>
    <body>
        <h1> Admin Section </h1>
        <h2> Adding New Users</h2>
        
        <fieldset>
            
            <legend> Add New User </legend>
         <form>
            
            First Name: <input type="text" name="firstName"/> <br>
            Last Name: <input type="text" name="lastName"/> <br>
            Email: <input type="text" name="email"/> <br>
            University Id: <input type="text" name="universityId"/> <br>
            Phone: <input type="text" name="phone"/> <br>
            Gender: <input type="radio" name="gender" value="F" id="genderF"/> 
                    <label for="genderF">Female</label>
                    <input type="radio" name="gender" value="M" id="genderM"/> 
                    <label for="genderM">Male</label><br>
            Role:   <select name="role">
                        <option value=""> Select One </option>
                        <option>Faculty</option>
                        <option>Student</option>
                        <option>Staff</option>
                    </select>
            <br />
            Department: <select name="deptId">
                            <option value=""> Select One </option>
                            <?php
                            
                                $departments = getDepartmentInfo();
                                foreach ($departments as $record) {
                                    echo "<option value='$record[departmentId]'>$record[deptName]</option>";
                                }
                            
                            ?>
                            
                        </select>
                        <br />
                <input type="submit" name="addUserForm" value="Add User!"/>
        </form>
    
        </fieldset>
    </body>
</html>