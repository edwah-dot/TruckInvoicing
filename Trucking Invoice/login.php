<?php
require 'helpers.php';

session_start();

if(isset($_POST['username']) && isset($_POST['password'])) {
  // validation
  if(!empty($_POST['username']))
      $user = sanitize($_POST['username']);
  if(!empty($_POST['password']))
      $password = sanitize($_POST['password']);
  
  $sql = "SELECT * FROM Users WHERE username = '$user'";
  $res = $db->query($sql);

  if ($res->num_rows > 0){
      $row = $res->fetch_assoc();
      if (password_verify($password, $row['Password'])){
          // SUCCESS
        $_SESSION['active'] = true;
        $_SESSION['user'] = $user;
        $_SESSION['fname'] = $row['FirstName'];
        $_SESSION['lname'] = $row['LastName'];
        $_SESSION['role'] = $row['Role'];

        session_regenerate_id(true);

        header("Location: home.php"); 
          
        exit();
      } 
      else {
          // invalid PASSWORD
          echo "<font color =\"red\"<strong>Invalid credentials.</strong></font>"; 
      }
  }
  else {
      // invalid EMAIL
      echo "Invalid Credentials.\n";
  }
}



?>

<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style/login.css">
</head>
<body>

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<!-- <div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div> -->
			</div>
			<div class="card-body">
				<form action = " " method = "POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name = "username" class="form-control" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name = "password" class="form-control" placeholder="password">
					</div>

					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
