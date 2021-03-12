<?php
require 'helpers.php';
require 'style/header.php';
require 'style/footer.php';
session_start();

if(isset($_POST["TruckID"]))
{
    $truckID = sanitize($_POST["TruckID"]);     

    $sql = "DELETE FROM Truck WHERE TruckID = '$truckID'";
    remove($sql);

}

$query = "SELECT * FROM Truck NATURAL JOIN Trailer NATURAL JOIN Employee ORDER BY TruckID";
$result2 = mysqli_query($db, $query);

echo "<form method ='POST'>";
echo "Select truck to remove: ";
echo "<select name = 'TruckID'>";
while($row2 = mysqli_fetch_array($result2))
{
    $dropdown = $dropdown."<option value='" . $row2[2] . "'>" . $row2[3] ." ". $row2[4] . " ". $row2[5] .  " " . $row2[7] ."</option>";
}
echo $dropdown;
echo "</select>     ";
?>
<button class="" name ="submit" type="submit">Remove Truck</button></form>