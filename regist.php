<?php
require 'config.php';

if(isset($_POST['submit']))
{
  $fullname = $_POST['fullname'];
  $address = $_POST['addr'];
  $email = $_POST['email'];
  $password = $_POST['pswd'];
  $phone = $_POST['pnb'];
  $username = $_POST['username'];
  
  $query = "select * from account 
      where email = '$email' or phone = '$phone' or username = '$username'";
  $duplicate = mysqli_query($conn, $query);
  if(mysqli_num_rows($duplicate)>0){
      echo
      "<script>alert('Username or email or phone has already exist')</script>";
  } 
  else{
      if(isset($_POST['is_staff'])){
      
          $query = " INSERT INTO ACCOUNT (EMAIL, PASSWORD , FULL_NAME, ADDRESS, PHONE, username, is_staff) 
          VALUES ('".$email."','".$password."','".$fullname."','".$address."','".$phone."', '".$username."','1') ";
          }
          else{
              $query = " INSERT INTO ACCOUNT (EMAIL, PASSWORD , FULL_NAME, ADDRESS, PHONE, username) 
          VALUES ('".$email."','".$password."','".$fullname."','".$address."','".$phone."', '".$username."') ";
          }
          mysqli_query($conn, $query);
          echo
      "<script>alert('Regis successfully')</script>";
    }  
}
?>

<!DOCTYPE html>

<html>
    <head>
    <title>Library System</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">        
      
  
    </head>
    <body>
    <div class="container"  >
  <h2>Regist</h2>
  <br>
  <form method="POST" action="">
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Staff
    </label>
  </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" require>
    </div>
    <div class="form-group">
      <label for="addr">Address:</label>
      <input type="text" class="form-control" id="addr" placeholder="Enter address" name="addr" require>
    </div>
    <div class="form-group">
      <label for="fullname">fullname:</label>
      <input type="text" class="form-control" id="fullname" placeholder="Enter fullname" name="fullname" require>
    </div>
    <div class="form-group">
      <label for="pnb">Phone number:</label>      
      <input type="tel" class="form-control" id="pnb" placeholder="Enter phone number" name="pnb" require>
    </div>
    <div class="form-group">
      <label for="username">username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" require>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" require>
    </div>
    <div class = "text-left">
      <button type="submit" class="btn btn-primary" name="submit">Register</button>
     </div>    
  </form>
  <br>
  <a href="http://localhost/firstPHP/login.php">Login</a>
  <hr>
</div>



    </body>
</html>




