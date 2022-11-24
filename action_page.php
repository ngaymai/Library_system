<?php
require_once('dbhelp.php');
$fullname = $address = $email = $password = $phone = $username = $is_staff = "";
if(isset($_POST['fullname']))
{
$fullname = $_POST['fullname'];
$address = $_POST['addr'];
$email = $_POST['email'];
$password = $_POST['pswd'];
$phone = $_POST['pnb'];
$username = $_POST['username'];
}
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
        mysqli_connect($conn, $query);
        echo
    "<script>alert('Regis successfully')</script>";
}   




//execute($sql);

//header("Location: login.php")

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