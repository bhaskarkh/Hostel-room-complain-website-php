<?php
require"conn.php";
session_start();
$txt="";
$err="";
if(isset($_SESSION['staff_id']))
{
  $emp_id=$_SESSION['staff_id'];
}
else
header("location:login.php");

?>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
$old_password=mysqli_real_escape_string($con,$_POST['old_password']);
$new_password=mysqli_real_escape_string($con,$_POST['new_password']);

$sql = "SELECT * FROM staff where emp_id='$emp_id' and password='$old_password'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);  
   
if($row!=0)
{
  $sqly="UPDATE staff SET password='$new_password' WHERE emp_id='$emp_id'";

$result2=mysqli_query($con,$sqly);
  if($result)
   {
     $err="Password changed  Successfully";
   }
}
else
  {
  $err="Incorrect old Password ";
   }
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
<div class="col-sm-3"></div>
<div class="col-sm-9 my-menu">



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
    <li class="active"><a href="login.php">Staff</a></li>
    <li ><a href="complainstatus.php">complain status</a></li>
     <li ><a href="logout.php">Logout</a></li>


  </ul>

</div> <!-- end of collapse-->

  
</div><!-- end of column 2-->
</div><!-- end of row-->
</div><!-- end of container fluid-->


</nav><!--end of navbar-default-->
<!--end of header-->


<br>

<div class="container frm_admin_panel">
<form name="carpenter" method="POST" class="form-horizontal">
<div class="form-group">
<div class="col-sm-12">
<input type="password" name="old_password" placeholder="old Password" class="form-control">
</div>
</div>

<div class="form-group">
<div class="col-sm-12">
<input type="password" name="new_password" placeholder="New password" class="form-control">
</div>
</div>
<?php echo "<div style='color:white;font-size:13px;'>$err</div>"; ?>
<input type="submit" name="submit" value="submit" class="login-submit">   
</form>
</div>





<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="bootstrap.js"></script>
</body>
</html>