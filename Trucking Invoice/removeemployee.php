<?php
require 'helpers.php';
require 'style/header.php';
require 'style/footer.php';
session_start();

if(isset($_POST["EmployeeID"]))
{
    $employeeID = sanitize($_POST["EmployeeID"]);     

    $sql = "DELETE FROM Employee WHERE EmployeeID = '$employeeID'";
    remove($sql);

}


$query = "SELECT * FROM Employee";
$result2 = mysqli_query($db, $query);
$dropdown = "";
echo "<form method ='POST'>";
echo "Select Employee to remove: ";
echo "<select name = 'EmployeeID'>";
while($row2 = mysqli_fetch_array($result2))
{
    $dropdown = $dropdown."<option value='" . $row2[0] . "'>" . $row2[1] ." ". $row2[2] . "</option>";
}
echo $dropdown;
echo "</select> ";
?>
<button class="" name ="submit" type="submit">Remove Employee</button></form>