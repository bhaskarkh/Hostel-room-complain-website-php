<?php
require "conn.php";
$successmsg='';
$refmsg='';
$wh=1;
date_default_timezone_set("Asia/Kolkata");
$date=date('Y-m-d H:i:s');

if($_SERVER["REQUEST_METHOD"]=="POST")
{
$category=mysqli_real_escape_string($con,$_POST['category']);
$name=mysqli_real_escape_string($con,$_POST['name']);
$roll=mysqli_real_escape_string($con,$_POST['roll']);
$nc=mysqli_real_escape_string($con,$_POST['nc']);
$room=mysqli_real_escape_string($con,$_POST['room']);
$comment=mysqli_real_escape_string($con,$_POST['comment']);


while($wh)
{
$refno=rand(1,99999);

$sql_qury="SELECT refrenceno from complain where referenceno='$refno'";

//$roww=mysqli_num_rows($reslt);
if($reslt=mysqli_query($con,$sql_qury)) 
{  echo("refno already available");
     
	

}
else
{
   $wh=0;
	$refmsg="<br>your Reference number is= $refno";
}

}



$sql="INSERT into complain (category,ptime,name,roll,nc,room,comment,referenceno) VALUES ('$category','$date','$name','$roll','$nc','$room','$comment','$refno')";

$result=mysqli_query($con,$sql);
if($result)
{
$successmsg="Complain Registered Successfully";
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
	<link rel="stylesheet" type="text/css" href="mystyle.css?ts=<?=time()?>/">
	<link rel="stylesheet" type="text/css" href="design.css?ts=<?=time()?>/">
<link rel="stylesheet" type="text/css" href="login.css?ts=<?=time()?>/">

</head>
<body>
<!-- start of header --> 
<nav class="navbar navbar-reverse">
<div class="container-fluid">
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-8 my-menu">



<div class="navbar-header navHeader">
<button type="button" class="navbar-toggle btnColor" data-toggle="collapse" data-target="#myNavebar">
	<span class="icon-bar barColor"></span>
	<span class="icon-bar barColor"></span>
	<span class="icon-bar barColor"></span>

</button>
</div> <!-- end of navbar header-->
<div class="collapse navbar-collapse" id="myNavebar">
	<ul class="nav navbar-nav topMenu">
	<li class="active"><a href="index.php">Home</a></li>
    <li ><a href="login.php">Staff</a></li>
    <li ><a href="complainstatus.php">complain status</a></li>
    <li ><a href="aboutme.php">About Me</a></li>

	</ul>
</div> <!-- end of collapse-->

	
</div><!-- end of column 2-->
</div><!-- end of row-->
</div><!-- end of container fluid-->


</nav><!--end of navbar-default-->
<!--end of header-->
<h2 class="sTable">Give Your complain Here</h2>

<div  class="container confirmmsg"><?php  echo"$successmsg"; ?><?php echo"$refmsg"; ?></div>
<div class="container frm">
<form name="carpenter" method="POST" class="form-horizontal">
<div class="form-group">
<div class="col-sm-12">
<select name="category" class="form-control">
<option value="carpenter">carpenter</option>
<option value="electrician">electrician</option>
<option value="plumber">plumber</option>
<option value="other">other</option>
</select>
</div><!--end of col-sm-12-->
</div><!--end of form group-->
<div class="form-group">
<div class="col-sm-12">
<input type="text" name="name" placeholder="Name" class="form-control">
</div>
</div>

<div class="form-group">
<div class="col-sm-12">
<input type="text" name="roll" placeholder="Roll no." class="form-control">
</div>
</div>

<div class="form-group">
<div class="col-sm-12">
<input type="text" name="nc" placeholder="NC or Hostel Name" class="form-control" required>
</div>
</div>

<div class="form-group">
<div class="col-sm-12">
<input type="number" name="room" placeholder="Room no" class="form-control" required>
</div>
</div>

<div class="form-group">
<div class="col-sm-12">
<textarea class="form-control cmt"  name="comment" id="comment" placeholder="write about your problem"></textarea>
</div>
</div>

<input type="submit" name="submit" value="submit" class="login-submit">   
</form>
</div><!-- end of container  2 image-->

<!--Start of Footer-->
<br>
<br>
<footer class="page-footer">
<div class="container-fluid"><!--Start of Footer fluid containeer-->
<div>
©Copyright 2018 GIET GUNUPUR
</div> 
<div class="footer-name">
	Developed By:Kumar Bhaskar
</div> 

</div><!--End of Footer fluid containeer-->
</footer><!--End of Footer-->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="bootstrap.js"></script>
</body>
</html>