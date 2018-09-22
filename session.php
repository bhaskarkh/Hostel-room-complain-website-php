<?php
require"conn.php";
session_start();

$user_check=$_SESSION['login_user'];
$sq="SELECT username,password from staff where username='$user_check'";
$sq_query=mysqli_query($con,$sq);
$row=mysqli_fetch_array($sq_query,MYSQLI_ASSOC);
$login_session = $row['username'];
$login_passw=$row['password'];
   
   if(!isset($_SESSION['login_user']))
   {
      header("location:login.php");
   }
   



?>