<?php
require"conn.php";
session_start();

$user_check=$_SESSION['login_user'];
if($user_check=='admin' || $user_check=='plumber')
{}
else
{
header("location:login.php");
}
   
?>