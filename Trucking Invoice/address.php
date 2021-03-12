<?php
require 'style/header.php';
require 'style/footer.php';
require 'helpers.php';
session_start();

if(!isActive()) {header("Location: login.php");}

// check if address already exists in database
function doesntExist($street, $zipcode)
{
    global $db;
    $sql = "SELECT * From Address WHERE (Street = '$street' AND Zipcode = '$zipcode')";
    $result = $db->query($sql);

    if ($result->num_rows > 0)
        return false;
    else
        return true;
}

if(isset($_POST["Street"]) && isset($_POST["City"]) && isset($_POST["State"]) && isset($_POST["Zipcode"]))
{
        $street = sanitize($_POST["Street"]);
        $city = sanitize($_POST["City"]);
        $state = sanitize($_POST["State"]);
        $zip = sanitize($_POST["Zipcode"]);

        if(doesntExist($street, $zip))
        {
            $sql = "INSERT INTO Address (Street, City, State, Zipcode)   
            VALUES ('$street', '$city', '$state', '$zip')";
            add($sql);
        }
        else
            echo "<strong>Address already exists in database.</strong><br><br>";
}

?>
<?php
$form = "<form method ='POST'>
<div style='text-align: center; '><br><br>";
$result = $db->query("describe nkalar.Address");

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($row["Field"] != "AddressID") {
            $form .= "<label for='" . $row["Field"] . "'>" . $row["Field"] . "</label> <input type='text' name='" . $row["Field"] . "' required><br><br>";
        }
    }
}
$form .= "
            <button onclick= \"location.href='home.php'\" type=\"button\">Home</button>     <input type='submit' value='Submit'>
            </form>
            </div>";

    echo $form;

?>