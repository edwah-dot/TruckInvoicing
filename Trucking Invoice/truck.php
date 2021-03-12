<?php
require 'helpers.php';
require 'style/header.php';
require 'style/footer.php';
session_start();
if(!isActive()) {header("Location: login.php");}


if(isset($_POST["Make"]) && isset($_POST["Model"]) && isset($_POST["MaxWeight"]) && isset($_POST["LastServiceDate"]) && isset($_POST["EmployeeID"]) && isset($_POST["TrailerID"]))
{            
    //fix this insert
    $make = sanitize($_POST["Make"]);
    $model = sanitize($_POST["Model"]);
    $maxweight = sanitize($_POST["MaxWeight"]);
    $service = sanitize($_POST["LastServiceDate"]); 
    $employee = sanitize($_POST["EmployeeID"]);     
    $trailer = sanitize($_POST["TrailerID"]);         
    $sql = "INSERT INTO Truck (Make, Model, MaxWeight, LastServiceDate, EmployeeID, TrailerID)   
    VALUES ('$make', '$model', '$maxweight', '$service', '$employee', '$trailer')";
    add($sql);
}

$form = "<form method ='POST'>
<div style='text-align: center; '><br><br>";
$result = $db->query("describe nkalar.Truck");
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($row["Field"] != "TruckID" && $row["Field"] != "EmployeeID" && $row["Field"] != "TrailerID") {
                $form .= "<label for='" . $row["Field"] . "'>" . $row["Field"] . "</label> <input type='text' name='" . $row["Field"] . "' required><br><br>";                
        }
    }
}

echo $form;
ddMenu("trailer");
echo "<br><br>";
ddMenu("employee");
echo "<br><br>";
echo "<button onclick= \"location.href='home.php'\" type=\"button\">
Home</button>     <input type='submit' value='Submit'></form>
</div>";
?>