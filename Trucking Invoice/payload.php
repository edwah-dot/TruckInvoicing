<?php
session_start();
require 'helpers.php';
require 'style/header.php';
require 'style/footer.php';

if(!isActive())
{
    header("Location: login.php");
}



if(isset($_POST["Weight"]) && isset($_POST["Description"]) && isset($_POST["TrailerID"]))
{            
    $weight = sanitize($_POST["Weight"]);
    $description = sanitize($_POST["Description"]);
    $trailer = sanitize($_POST["TrailerID"]);  
    $sql = "INSERT INTO Payload (Weight, Description, TrailerID)   
    VALUES ('$weight', '$description', '$trailer')";
    add($sql);
}



$form = "<form method ='POST'>
<div style='text-align: center; '><br>";
$result = $db->query("describe nkalar.Payload");

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($row["Field"] != "LoadID" && $row["Field"] != "TrailerID") {
                $form .= "<label for='" . $row["Field"] . "'>" . $row["Field"] . "</label> <input type='text' name='" . $row["Field"] . "' required><br><br>";                
        }
    }
}
echo $form;
ddMenu("trailer");
echo "<br><br>";
echo "<button onclick= \"location.href='home.php'\" type=\"button\">
Home</button>     <input type='submit' value='Submit'></form>";

?>

