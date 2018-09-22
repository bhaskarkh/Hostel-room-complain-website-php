<?php
require"conn.php";
session_start();
if(isset($_SESSION['user_category']))
{ 
$user_category=$_SESSION['user_category'];
if($user_category=='carpenter'){header("location:carpenter.php");}
if($user_category=='electrician'){header("location:electrician.php");}
if($user_category=='plumber'){header("location:plumber.php");}
if($user_category=='other'){header("location:other.php");}
if($user_category=='admin'){header("location:show.php");}
}


?>


<?php 

require"conn.php";

$txt="";
$err="";
if($_SERVER["REQUEST_METHOD"]=="POST")
 {
  $user_name=mysqli_real_escape_string($con,$_POST['login_username']);
  $user_pass=mysqli_real_escape_string($con,$_POST['login_password']);
  $sql_query="SELECT * from staff where username='$user_name' and password='$user_pass' ";
  $result=mysqli_query($con,$sql_query);
  $row=mysqli_num_rows($result);
if(!$result)
 {
  $err="CONNECTION FAILED".mysqli_error($con);
 }

$sql_query_category="SELECT * from staff where username='$user_name'";
$category_result=mysqli_query($con,$sql_query_category);

$category_row=mysqli_fetch_array($category_result,MYSQLI_ASSOC);


//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
if ($row!=0) 
{  
    $_SESSION['login_user']=$user_name;
  
    $_SESSION['user_category']=$category_row['category'];
    $_SESSION['staff_id']=$category_row['emp_id'];
    $user_category=$_SESSION['user_category'];

}
  else
   {
  $err="Username or Password is Incorrect";
   }

if($user_category=='carpenter'){header("location:carpenter.php");}
if($user_category=='electrician'){header("location:electrician.php");}
if($user_category=='plumber'){header("location:plumber.php");}
if($user_category=='other'){header("location:other.php");}
if($user_category=='admin'){header("location:show.php");}
}


?>


<!DOCTYPE html>
<html lang="en-US">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-compatible">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Giet Online Complain Portal</title>
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
            $('body').find('img[src$="https://cloud.githubusercontent.com/assets/23024110/20663010/9968df22-b55e-11e6-941d-edbc894c2b78.png"]').parent().closest('a').closest('div').remove();
        });
  </script>
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <link rel="stylesheet" type="text/css" href="mystyle.css?ts=<?=time()?>/">
  <link rel="stylesheet" type="text/css" href="login.css?ts=<?=time()?>/">
   <link rel="stylesheet" type="text/css" href="design.css?ts=<?=time()?>/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/font/css/font-awesome.css">
  
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
  <li><a href="index.php">Home</a></li>
    <li class="active"><a href="login.php">Staff</a></li>
    <li ><a href="complainstatus.php">Complain status</a></li>
    <li ><a href="aboutme.php">About me</a></li>

  </ul>
</div> <!-- end of collapse-->

  
</div><!-- end of column 2-->
</div><!-- end of row-->
</div><!-- end of container fluid-->


</nav><!--end of navbar-default-->
<!--end of header-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/font/css/font-awesome.css">
<div class="container login">

<img src="Staff.png" alt="login" class="icon-main">
 <form method="POST">
<div class="form-group">
 <i class="fa fa-user fa-2x cust" aria-hidden="true"></i>
 <input type="text" name="login_username" placeholder="username" class="loginName"><br>
  <i class="fa fa-lock fa-2x cust" aria-hidden="true"></i>
<input type="password" name="login_password" placeholder="password" class=" loginName"><br>
 <?php echo "<div style='color:white;font-size:13px;'>$err</div>"; ?>
 <input type="submit" name="submit" value="submit" class="login-submit">
  </div><!--end of form-group class-->
 </form>

</div><!--end of container-->

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="bootstrap.js"></script>
</body>
</html>