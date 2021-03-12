<?php
require 'helpers.php';
require 'style/header.php';
session_start();

// Sort employees by last name
if(isset($_POST['last']))
{
  ?><table class="table table-striped" method='POST' id="tblData">
  <thead>
    <tr>
      <th scope="col">Employee #<form action="" method="post"> <?php echo "<button onclick= \"location.href='reportemployee.php'\" type=\"button\">
                        Sort</button>"; ?> </form></th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Position<form action="" method="post"> <button class="" name = "position"  type="submit">Sort</button> </form> </th>

    </tr>
  </thead>
  <tbody>
  
<?php
  $sql = "SELECT * FROM Employee NATURAL JOIN Position ORDER BY Lname";
  
  $result = mysqli_query($db, $sql);
  while($row = mysqli_fetch_array($result))
  {
    echo "<tr>";
    echo "<th scope='row'>" . $row[1] . "</th>";  
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "<td>" . $row[8] . "</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";

}

// sort employees by position
else if(isset($_POST['position']))
{
  ?><table class="table table-striped" method='POST' id="tblData">
  <thead>
    <tr>
      <th scope="col">Employee #<form action="" method="post"> <?php echo "<button onclick= \"location.href='reportemployee.php'\" type=\"button\">
                        Sort</button>"; ?> </form></th>
      <th scope="col">First</th>
      <th scope="col">Last <form action="" method="post"> <button class="" name = "last"  type="submit">Sort</button> </form></th>
      <th scope="col">Position<form action="" method="post"> <button class="" name = "position"  type="submit">Sort</button> </form> </th>

    </tr>
  </thead>
  <tbody>
  
<?php
  $sql = "SELECT * FROM Employee NATURAL JOIN Position ORDER BY Job";
  
  $result = mysqli_query($db, $sql);
  while($row = mysqli_fetch_array($result))
  {
    echo "<tr>";
    echo "<th scope='row'>" . $row[1] . "</th>";  
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "<td>" . $row[8] . "</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";

}

// list all employees 
else {
?>

<table class="table table-striped" id="tblData">
  <thead>
    <tr>
      <th scope="col">Employee # </th>
      <th scope="col">First</th>
      <th scope="col">Last<form action="" method="post"> <button class="" name = "last"  type="submit">Sort</button> </form></th>
      <th scope="col">Position <form action="" method="post"> <button class="" name = "position"  type="submit">Sort</button> </form></th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql = "SELECT * FROM Employee NATURAL JOIN Position";
  
  $result = mysqli_query($db, $sql);
  while($row = mysqli_fetch_array($result))
  {
    echo "<tr>";
    echo "<th scope='row'>" . $row[1] . "</th>";  
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "<td>" . $row[8] . "</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
}
?>
<br>
<button id="exportButton">Export to Excel</button>
<?php
require 'style/footer.php';

?>
