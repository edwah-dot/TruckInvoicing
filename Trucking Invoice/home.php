<?php
session_start();
require 'style/header.php';
require 'style/footer.php';
require 'helpers.php';

if(!isActive()) {header("Location: login.php");}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style/home.css">
</head>
<body>
<div class="bgimg">
  <div class="middle">
    <h1>Welcome to Hernandez Trucking</h1>
  </div>
</div> 

</body>
</html>