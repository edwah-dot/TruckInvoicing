<?php
require 'helpers.php';
require 'style/header.php';
session_start();

?>

<table class="table table-striped" id="tblData">
  <thead>
    <tr>
      <!-- <th scope="col">Customer #</th> -->
      <th scope="col">Business Name</th>
      <th scope="col">Contact</th>
      <th scope="col">Phone Number</th>
    </tr>
  </thead>
  <tbody>
<?php
  $sql = "SELECT * FROM CompanyContact ORDER BY BusinessName";
  
  $result = mysqli_query($db, $sql);
  while($row = mysqli_fetch_array($result))
  {
    echo "<tr>";
    echo "<td>" . $row[0] . "</td>";
    echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "</tr>";
  }

?>
    </tbody>
</table>
<br>
<button id="exportButton">Export to Excel</button>
<?php
require 'style/footer.php';

?>
