<?php
require 'config.php';

if(isset($_POST["submit"]))
{
  $password = $_POST['pswd'];
  $username = $_POST['username'];
  
  
  $query = "select * from account 
      where username = '$username'";
  $res = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($res);
  if(mysqli_num_rows($res)>0){
      if($password == $row["PASSWORD"]){        
       // $_SESSION["login"]=true;
       // $_SESSION["id"] = $row["SSN"];
      setcookie("login", "true", time() + 24 * 60 * 60, "/");
      setcookie("id", $row["SSN"], time()+ 24*60*60, "/");
        header("Location: src/dashboard.php");
      }
      else{
        echo
      "<script>alert('Wrong Password')</script>";
      }
  } 
  else{      
          echo
      "<script>alert('User not exist')</script>";
    }  
  }
?>

<!DOCTYPE html>

<html>
    <head>
    <title>Login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">        
       <!----> 
    </head>
    <body>
    <div class="container">
  <h2>Login</h2>
  <form method="Post" action="">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
    <div class = "text-left">
      <button type="submit" class="btn btn-primary" name="submit">Login</button>
      </div>
       
    <div class="text-center" >        
        <p>Don't have an accounts? <a href="./regist.php"> Sign up</a></p>   
    </div>    
  </form>
</div>




    </body>
</html>