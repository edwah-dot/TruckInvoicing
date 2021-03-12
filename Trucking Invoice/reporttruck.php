<?php
require 'helpers.php';
require 'style/header.php';
session_start();

if(!isset($_POST['sort']))
{
  ?><table class="table table-striped" method='POST' id="tblData">
  <thead>
    <tr>
      <th scope="col">Truck#</th>
      <th scope="col">Make</th>
      <th scope="col">Model</th>
      <th scope="col">Trailer <form action="" method="post"> <button class="" name = "sort"  type="submit">Sort</button> </form> </th>

    </tr>
  </thead>
  <tbody>
  
<?php
  $sql = "SELECT * FROM Truck NATURAL JOIN Trailer ORDER BY TruckID";
  
  $result = mysqli_query($db, $sql);
  while($row = mysqli_fetch_array($result))
  {
    echo "<tr>";
    echo "<th scope='row'>" . $row[1] . "</th>";  
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "<td>" . $row[7] . "</td>";
    echo "</tr>";
  }
?>
  </tbody>
</table>
<?php
  
}
else
{
  ?><table class="table table-striped" method='POST' id="tblData">
  <thead>
    <tr>
      <th scope="col">Truck #<form action="" method="post"> <?php echo "<button onclick= \"location.href='reporttruck.php'\" type=\"button\">
                        Sort</button>"; ?> </form></th>
      <th scope="col">Make</th>
      <th scope="col">Model</th>
      <th scope="col">Trailer  </th>

    </tr>
  </thead>
  <tbody>
  
<?php
  $sql = "SELECT * FROM Truck NATURAL JOIN Trailer ORDER BY TrailerDesc";
  
  $result = mysqli_query($db, $sql);
  while($row = mysqli_fetch_array($result))
  {
    echo "<tr>";
    echo "<th scope='row'>" . $row[1] . "</th>";  
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "<td>" . $row[7] . "</td>";
    echo "</tr>";
  }
?>
  </tbody>
</table>

<?php
}
?>
<br>
<button id="exportButton">Export to Excel</button>
<?php
require 'style/footer.php';

?>
