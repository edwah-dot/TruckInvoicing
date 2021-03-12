<?php
// //CONNECT_TO_DATABASE///////////////////////////////////
$server = 'localhost';
$user = 'nkalar';
$password = 'edwinblue';
$database = 'nkalar';
$db = new mysqli($server, $user, $password, $database);

if($db->connect_error) {
    exit("Bad Connection\n");
}
else {
    // DEVELOPMENT
    // echo "We're connected<br>";
}
function isActive() {
    if(isset($_SESSION['active']) ){
        return($_SESSION['active']); 
    }
    return(false);
}
function sanitize($var)
{
	return(htmlentities(strip_tags(trim($var)), ENT_QUOTES));
}
function add($sql) 
{
    global $db;

    if($db->query($sql) === TRUE)
        echo "<strong>Added</strong>";
    else
        echo "error";
}

function remove($sql) 
{
    global $db;

    if($db->query($sql) === TRUE)
        echo "<strong>Removed</strong>";
    else
        echo "error";
}
function getLastId($id, $table ) {
    global $db;
    $query = "SELECT MAX($id) FROM $table";
    $result2 = mysqli_query($db, $query);
    while($row2 = mysqli_fetch_array($result2))
    {
        $id = $row2[0];
    }    

    return $id+1;
}

function ddMenu($type)
{
    global $db;

    switch($type)
    {
        case "status":
            $query = "SELECT * FROM Status";
            $result2 = mysqli_query($db, $query);
            $dropdown = "";
            echo "Select Status: ";
            echo "<select name = 'Status'>";
            echo "<option value='0" .   "'>"   . "</option>";
            while($row2 = mysqli_fetch_array($result2))
            {
                // $dropdown .= "<div class='custom-select'>";
                $dropdown = $dropdown."<option value='" . $row2[0] . "'>" . $row2[1] . "</option>";
            }
            echo $dropdown;
            echo "</select><br><br>";
            break;    

        case "payload":
            $query = "SELECT * FROM Payload NATURAL JOIN Trailer ORDER BY LoadID";
            $result2 = mysqli_query($db, $query);
            $dropdown = "";
            echo "Select Payload: ";
            echo "<select name = 'Payload'>";
            while($row2 = mysqli_fetch_array($result2))
            {
                $dropdown = $dropdown."<option value='" . $row2[1] . "'>". $row2[2] . " ". $row2[3] .  ", " . $row2[4] ."</option>";
            }
            echo $dropdown;
            echo "</select>";
            break;        
        case "position":
            $query = "SELECT * FROM Position";
            $result2 = mysqli_query($db, $query);
            $dropdown = "";
            echo "Select Position: ";
            echo "<select name = 'PositionID'>";
            while($row2 = mysqli_fetch_array($result2))
            {
                $dropdown = $dropdown."<option value='$row2[0]'> $row2[1]</option>";
            }
            echo $dropdown;
            echo "</select>";
            break;

            case "supervisor":
                $query = "SELECT EmployeeID,Fname, Lname FROM Employee WHERE PositionID = 5";
                $result2 = mysqli_query($db, $query);
                $dropdown = "";
                echo "Select Supervisor: ";
                echo "<select name = 'SupervisorID'>";
                while($row2 = mysqli_fetch_array($result2))
                {
                    $dropdown = $dropdown."<option value='$row2[0]'> $row2[1]" . " " . $row2[2] . "</option>";
                }
                echo $dropdown;
                echo "</select>";
                break;            
        case "customer":
            $query = "SELECT * FROM Customer";
            $result2 = mysqli_query($db, $query);
            $dropdown = "";
            
            echo "Select Customer: ";
            echo "<select name = 'CustomerID'>";
            echo "<option value='0" .   "'>"   . "</option>";
            while($row2 = mysqli_fetch_array($result2))
            {
                // $dropdown .= "<div class='custom-select'>";
                $dropdown = $dropdown."<option value='" . $row2[0] . "'>" . $row2[1] . "</option>";
            }
            echo $dropdown;
            echo "</select>           ";
            // echo "<button onclick= \"location.href='customer.php'\" type=\"button\">
            //         Create Customer</button>";
            break;  

        case "destination":
            $dropdown = "";
            $query = "SELECT * FROM Address";
            $result2 = mysqli_query($db, $query);
            
            echo "Destination Address: ";
            echo "<select name = 'Destination'>";
            while($row2 = mysqli_fetch_array($result2))
            {
                $dropdown = $dropdown."<option value='" . $row2[0] . "'>" . $row2[1] ." ". $row2[2] . " ". $row2[3] .  ", " . $row2[4] ."</option>";
            }
            echo $dropdown;
            echo "</select>     ";
            echo "<button onclick= \"location.href='address.php'\" type=\"button\">Create Address</button>";
            break;

        case "pickup":
            $dropdown = "";
            $query = "SELECT * FROM Address";
            $result2 = mysqli_query($db, $query);
            
            echo "Pickup Address: ";
            echo "<select name = 'Pickup'>";
            while($row2 = mysqli_fetch_array($result2))
            {
                $dropdown = $dropdown."<option value='" . $row2[0] . "'>" . $row2[1] ." ". $row2[2] . " ". $row2[3] .  ", " . $row2[4] ."</option>";
            }
            echo $dropdown;
            echo "</select>     ";
            echo "<button onclick= \"location.href='address.php'\" type=\"button\">Create Address</button>";
            break;  

            case "truck":
            $dropdown = "";
            $query = "SELECT * FROM Truck NATURAL JOIN Trailer NATURAL JOIN Employee ORDER BY TruckID";
            $result2 = mysqli_query($db, $query);
            
            echo "Select Truck: ";
            echo "<select name = 'TruckID'>";
            while($row2 = mysqli_fetch_array($result2))
            {
                $dropdown = $dropdown."<option value='" . $row2[2] . "'>" . $row2[3] ." ". $row2[4] . " ". $row2[8] .  " ". $row2[9] .  " " . $row2[7] ."</option>";
            }
            echo $dropdown;
            echo "</select>     ";
            echo "<button onclick= \"location.href='truck.php'\" type=\"button\">Create Truck</button>";
            break;  
        
        case "trailer":
            $query = "SELECT * FROM Trailer";
            $result2 = mysqli_query($db, $query);
            $dropdown = "";
            
            echo "Select Trailer: ";
            echo "<select name = 'TrailerID'>";
            while($row2 = mysqli_fetch_array($result2))
            {
                $dropdown = $dropdown."<option value='" . $row2[0] . "'>" . $row2[1] . "</option>";
            }
            echo $dropdown;
            echo "</select>";
                       
            break;

            case "address":
                $dropdown = "";
                $query = "SELECT * FROM Address";
                $result2 = mysqli_query($db, $query);
                
                echo "Address: ";
                echo "<select name = 'AddressID'>";
                while($row2 = mysqli_fetch_array($result2))
                {
                    $dropdown = $dropdown."<option value='" . $row2[0] . "'>" . $row2[1] ." ". $row2[2] . " ". $row2[3] .  ", " . $row2[4] ."</option>";
                }
                echo $dropdown;
                echo "</select>     ";
                echo "<button onclick= \"location.href='address.php'\" type=\"button\">Create Address</button>";
                break;       
                
            case "employee":
                $query = "SELECT * FROM Employee";
                $result2 = mysqli_query($db, $query);
                $dropdown = "";
    
                echo "Select Employee: ";
                echo "<select name = 'EmployeeID'>";
                while($row2 = mysqli_fetch_array($result2))
                {
                    $dropdown = $dropdown."<option value='" . $row2[0] . "'>" . $row2[1] ." ". $row2[2] . "</option>";
                }
                echo $dropdown;
                echo "</select>     ";
                echo "<button onclick= \"location.href='employee.php'\" type=\"button\">
                        Create Employee</button>";
                break;

    }
}


//GLOBAL_VAR $db////////////////////////////////////////
?>