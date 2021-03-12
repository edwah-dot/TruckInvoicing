<?php
require 'style/header.php';
require 'style/footer.php';
require 'helpers.php';
session_start();
if(!isActive()) {header("Location: login.php");}

function doesntExist($user)
{
    global $db;
    $sql = "SELECT * From Users WHERE (Username = '$user')";
    $result = $db->query($sql);

    if ($result->num_rows > 0)
        return false;
    else
        return true;
}

if(isset($_POST['fname']) && isset($_POST['lname']) && 
   isset($_POST['username']) && isset($_POST['password1']) && 
   isset($_POST['password2']) && isset($_POST['role'])) {

    $fname = sanitize($_POST['fname']);
    $lname = sanitize($_POST['lname']);
    $username = sanitize($_POST['username']);
    $password1 = sanitize($_POST['password1']);
    $password2 = sanitize($_POST['password2']);
    $role = sanitize($_POST['role']);    
    if($password1 != $password2){ 
        echo "Passwords don't match.<br>"; 
        header("Location: register.php"); 
        exit;
        }

        if(doesntExist($username))
        {
            $hashedpw = password_hash($password1, PASSWORD_DEFAULT);
            $sql = "INSERT INTO Users (FirstName, LastName, Username, Password, Role)
                    VALUES ('$fname', '$lname', '$username', '$hashedpw', '$role')";

            add($sql);
        }
        else
            echo "<strong>Username already exists in database.</strong><br><br>";
    }



?>

<form action='register.php' method='POST'>
  <div style = "text-align: center"><br><br>
  <div class="form-group row" >
    <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="inputEmail3" name='fname' required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="inputEmail3" name='lname' required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-4">
      <input type="username" class="form-control" id="username" name='username' required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label" >Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="inputPassword3" name='password1' required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label" >Confirm Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="inputPassword3" name='password2'  required>
    </div>
  </div>
  <div class = "col-sm-4">
  <input type="radio" name="role" value = admin>Admin<br>
  <input type="radio" name="role" value = employee>Employee<br>
  </div>
    <button class="btn btn-primary" type="submit">Register Now</button>
</form>
  </div>