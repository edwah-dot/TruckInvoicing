<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title></title>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">H-T</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="./home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <?php 
        session_start();
        if($_SESSION['role']=="admin"){
          echo '<li class="nav-item">
                <a class="nav-link" href="./register.php">Register User</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Remove
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="./removeemployee.php">Employee</a>
                  <a class="dropdown-item" href="./removetruck.php">Truck</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./employee.php">Add Employee</a>
              </li>';
         }
         ?>
         <li class="nav-item">
           <a class="nav-link" href="./invoice.php">Create Invoice</a>
         </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Add
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="./truck.php">Truck</a>
            <a class="dropdown-item" href="./customer.php">Customer</a>
            <a class="dropdown-item" href="./address.php">Address</a>
            <a class="dropdown-item" href="./payload.php">Payload</a>

          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Reporting
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="./reportinvoice.php">Invoices</a>
            <a class="dropdown-item" href="./reportcustomer.php">Customers</a>
            <a class="dropdown-item" href="./reporttruck.php">Trucks</a>
            <a class="dropdown-item" href="./reportemployee.php">Employees</a>
          </div>
        </li>
      </ul>
    </div>
    <a class="nav-link" href="./logout.php">Logout</a>
</nav>