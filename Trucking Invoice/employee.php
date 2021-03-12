<?php
require 'helpers.php';
require 'style/header.php';
require 'style/footer.php';
session_start();

if(!isActive()) {header("Location: login.php");}



if(isset($_POST["Fname"]) && isset($_POST["Lname"]) && isset($_POST["PositionID"]) && isset($_POST["SupervisorID"]))
{            
    $first = sanitize($_POST["Fname"]);
    $last = sanitize($_POST["Lname"]);
    $position = sanitize($_POST["PositionID"]);
    $salary = sanitize($_POST["Salary"]);
    $supervisor = sanitize($_POST["SupervisorID"]);
    $middle = sanitize($_POST["Mname"]);
    $companycc = sanitize($_POST["CompanyCC"]);

    if(empty($supervisor))
        $supervisor = 'NULL';
    if(empty($middle))
        $middle = 'NULL';
    if(empty($companycc))
        $companycc = 'NULL';
    if(empty($salary))
        $salary = 'NULL';

    $sql = "INSERT INTO Employee (Fname, Lname, Mname, PositionID, Salary, SupervisorID, CompanyCC)
            VALUES('$first','$last','$middle','$position','$salary','$supervisor','$companycc')";
    add($sql);   

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
$form = "<form method ='POST'>
<div style='text-align: center; '><br><br>";
$result = $db->query("describe nkalar.Employee");
$id = getLastID("EmployeeID", "Employee");
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($row["Field"] == "EmployeeID") {
            $form .= "<label for='" . $id . "'>New Emp. ID</label> <input type='text' value='                  " . $id. "' disabled><br><br>";                                
        }        
        else if($row["Field"] != "PositionID" && $row["Field"] != "SupervisorID")
            $form .= "<label for='" . $row["Field"] . "'>" . $row["Field"] . "</label> <input type='text' name='" . $row["Field"] . "'><br><br>";   


        
    }
}
echo $form;
ddMenu("position");
echo "<br><br>";
ddMenu("supervisor");
echo "<br><br>";
echo "<button onclick= \"location.href='home.php'\" type=\"button\">Home</button>     <input type='submit' value='Submit'></form></div>";


?>
