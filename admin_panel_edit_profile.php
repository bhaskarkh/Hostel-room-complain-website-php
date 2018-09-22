<?php
require"conn.php";
session_start();
$txt="";
$err="";
$user_check=$_SESSION['login_user'];

$staff_category=$_SESSION['user_category'];
if($staff_category!='admin')
{
  header("location:login.php");
}

  
?>


<!DOCTYPE html>
<html lang="en-US">
<head>
 <meta charset="utf-8">
   <meta http-equiv="X-UA-compatible">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Giet Online Complain Portal</title>
 <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <link rel="stylesheet" type="text/css" href="mystyle.css?ts=<?=time()?>&quot; /">
  <link rel="stylesheet" type="text/css" href="design.css?ts=<?=time()?>&quot; /">
  <link rel="stylesheet" type="text/css" href="design.css?ts=<?=time()?>&quot; /">
  <link rel="stylesheet" type="text/css" href="login.css?ts=<?=time()?>&quot; /">


</head>
<body>

<!-- start of header --> 
<nav class="navbar navbar-reverse">
<div class="container-fluid">
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-10 my-menu">



<div class="navbar-header navHeader">
<button type="button" class="navbar-toggle btnColor" data-toggle="collapse" data-target="#myNavebar">
  <span class="icon-bar barColor"></span>
  <span class="icon-bar barColor"></span>
  <span class="icon-bar barColor"></span>

</button>
</div> <!-- end of navbar header-->
<div class="collapse navbar-collapse" id="myNavebar">
  <ul class="nav navbar-nav topMenu">
     <li ><a href="index.php">Home</a></li>
    <li><a href="login.php">Staff</a></li>
    <li ><a href="admin_panel_add.php">Add Technician</a></li>
    <li ><a href="admin_panel_delete.php">Delet Account</a></li>
    <li class="active"><a href="admin_panel_edit_profile.php">Edit Profile</a></li>
    <li ><a href="logout.php">Logout</a></li>


  </ul>

</div> <!-- end of collapse-->

  
</div><!-- end of column 2-->
</div><!-- end of row-->
</div><!-- end of container fluid-->


</nav><!--end of navbar-default-->
<!--end of header-->


<div class="container-fluid" id="txtHint">


</div>



<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="bootstrap.js"></script>
</body>
</html>