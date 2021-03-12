<?php
require('helpers.php');
require 'style/header.php';
require 'style/footer.php';
session_start();

if(!isActive()) {header("Location: login.php");}



if(isset($_POST["TrailerDesc"]))
{            
    $trailer = sanitize($_POST["TrailerDesc"]);
    $sql = "INSERT INTO Trailer (TrailerDesc) 
    VALUES ('$trailer') ";
    add($sql);
}
$id = getLastId("TrailerID", "Trailer");

$form = "<form method ='POST'>";
$result = $db->query("describe nkalar.Trailer");
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($row["Field"] == "TrailerID") {
            $form .= "<label for='" . $id . "'>TrailerID</label> <input type='text' value='                  " . $id. "' disabled><br><br>";                                
        }
        else
            $form .= "<label for='" . $row["Field"] . "'>" . $row["Field"] . "</label> <input type='text' name='" . $row["Field"] . "' required><br><br>";   
    }
}
$form .= "<button onclick= \"location.href='home.php'\" type=\"button\">
Home</button>     <input type='submit' value='Submit'></form>";
echo $form;



?>
