<?php
require 'helpers.php';
require 'style/header.php';
require 'style/footer.php';
session_start();

if(!isActive()) {header("Location: login.php");}

// check if customer already exists in database
function doesntExist($biz, $addr)
{
    global $db;
    $sql = "SELECT * From Customer WHERE (BusinessName = '$biz' AND AddressID = '$addr')";
    $result = $db->query($sql);

    if ($result->num_rows > 0)
        return false;
    else
        return true;
}

if(isset($_POST["BusinessName"]) && isset($_POST["ContactName"]) && isset($_POST["PhoneNumber"]) && isset($_POST["AddressID"]))
{            
    $bizname = sanitize($_POST["BusinessName"]);
    $contact = sanitize($_POST["ContactName"]);
    $phone = sanitize($_POST["PhoneNumber"]);
    $address = sanitize($_POST["AddressID"]);
    
    if(doesntExist($bizname, $address))
    {
        $sql = "INSERT INTO Customer (BusinessName, ContactName, PhoneNumber, AddressID)   
        VALUES ('$bizname', '$contact', '$phone', '$address')";
        add($sql);
    }
    else
        echo "<strong>Customer already exists in database.</strong><br><br>";
}

$form = "<form method ='POST'>
<div style='text-align: center; '><br><br>";
$result = $db->query("describe nkalar.Customer");
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($row["Field"] != "CustomerID" && $row["Field"] != "AddressID") {
                $form .= "<label for='" . $row["Field"] . "'>" . $row["Field"] . "</label> <input type='text' name='" . $row["Field"] . "' required><br><br>";                
        }
    }
}
echo $form;
ddMenu("address");
echo "<br><br>";
echo "<button onclick= \"location.href='home.php'\" type=\"button\">
        Home</button>     <input type='submit' value='Submit'></form></div>";
?>