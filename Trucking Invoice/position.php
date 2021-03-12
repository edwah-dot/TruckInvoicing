<?php
require 'helpers.php';
require 'style/header.php';
require 'style/footer.php';
session_start();

if(!isActive()) {header("Location: login.php");}


if(isset($_POST["Job"]))
{            
    $job = sanitize($_POST["Job"]);
    $sql = "INSERT INTO Position (Job) 
    VALUES ('$job') ";
    add($sql);
}

$form ="<form method ='POST'>";
$result = $db->query("describe nkalar.Position");

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
            if($row["Field"] != "PositionID")
                $form .= "<label for='" . $row["Field"] . "'>" . $row["Field"] . "</label> <input type='text' name='" . $row["Field"] . "' required><br><br>";                
    }
}
    $form .= "<button onclick= \"location.href='home.php'\" type=\"button\">
    Home</button>     <input type='submit' value='Submit'></form>";
echo $form;
?>