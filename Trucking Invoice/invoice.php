<?php
require 'helpers.php';
require 'style/header.php';
require 'style/footer.php';
session_start();

if(!isActive()) {header("Location: login.php");}


$form = "<form method ='POST'>
<div style='text-align: center; '><br><br>";
$result = $db->query("describe nkalar.Invoice");

if( isset($_POST["Cost"]) && isset($_POST["CreationDate"]) &&
    isset($_POST["Status"]) && isset($_POST["Payload"]) &&
    isset($_POST["CustomerID"]) && isset($_POST["Destination"]) &&
    isset($_POST["Pickup"]) && isset($_POST["TruckID"]))
{
    $cost = sanitize($_POST["Cost"]);
    $date = sanitize($_POST["CreationDate"]);
    $status = sanitize($_POST["Status"]);
    $loadID = sanitize($_POST["Payload"]);
    $customer = sanitize($_POST["CustomerID"]);
    $destination = sanitize($_POST["Destination"]);
    $pickup = sanitize($_POST["Pickup"]);
    $truck = sanitize($_POST["TruckID"]);

    $sql = "CALL insert_invoice('$customer','$truck','$destination','$pickup','$loadID','$cost','$status', '$date')";
    add($sql);

}


if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($row["Field"] != "InvoiceID" && $row["Field"] != "LoadID" && $row["Field"] != "CustomerID" && $row["Field"] != "TruckID" && $row["Field"] != "Destination" && $row["Field"] != "Pickup" && $row["Field"] != "StatusID") {
                $form .= "<label for='" . $row["Field"] . "'>" . $row["Field"] . "</label> <input type='text' name='" . $row["Field"] . "' required><br><br>";                
        }
    }
}
echo $form;
ddMenu("status");
ddMenu("payload");
echo "<br><br>";
ddMenu("customer");
echo "<button onclick= \"location.href='customer.php'\" type=\"button\">
Create Customer</button>";
echo "<br><br>";
ddMenu("destination");
echo "<br><br>";
ddMenu("pickup");
echo "<br><br>";
ddMenu("truck");
echo "<br><button onclick= \"location.href='home.php'\" type=\"button\">
        Home</button>     <input type='submit' value='Submit'></form></div>";
?>