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
    <li class="active"><a href="admin_panel_delete.php">Delet Account</a></li>
    <li ><a href="admin_panel_edit_profile.php">Edit Profile</a></li>
    <li ><a href="logout.php">Logout</a></li>


  </ul>

</div> <!-- end of collapse-->

  
</div><!-- end of column 2-->
</div><!-- end of row-->
</div><!-- end of container fluid-->


</nav><!--end of navbar-default-->
<!--end of header-->
<br>


<div class="container frm_admin_panel_delete">
  <form name="carpenter" method="POST" class="form-horizontal">
    <div class="form-group">

      <div class="col-sm-12">
        <input type="text" name="em_id" placeholder="Enter Employee Id" class="form-control" style="text-align:center;">

      </div>
      <input type="submit" name="show" value="show" class="login-submit">
    </div>
    
  </form>
</div>
<br>
<br>
<div class="container-fluid">

<div class="col-sm-12">
<div class="table-responsive" id="txtHint"><!-- start of responsive table-->
<table class="table">


<?php

if(isset($_POST['show']))
{

$e_id=mysqli_real_escape_string($con,$_POST['em_id']);
$sql_qry="SELECT * FROM staff where emp_id='$e_id'";
$result=mysqli_query($con,$sql_qry);
$row=mysqli_fetch_array($result);
$_SESSION['delete_emp_id']=$e_id;
 
  if($row!=0)
   {
      $catclass=$row['category'];  
     echo "<thead class="."thbd".">"."<tr>
       <th class="."tsid1".">"."Emp Id</th>
      <th class="."tref".">"."Name</th>
    <th class="."stat".">"."Category</th>
    </tr></thead>";
    echo "<tbody class="."tbd".">";
     echo "<tr class="."Trow".">";
     echo "<td class="."tsid".">".$row['emp_id']."</td><td class=".$catclass.">".$row['username']."</td><td class="."$catclass".">".$row['category']."</td>";
     echo "</tr>";
     echo "<div class="."frm_admin_panel_delete_admin_pass"."><form method="."POST"." class="."form-horizontal".">
         <input type="."password"." name="."admin_password"." placeholder="."Enter_Admin_password"." class="."form-control"." style="."text-align:center;"."><input type="."submit"." name="."delete"." value="."delete"." class="."login-submit"."></form></div>";
   
   }
   else
   {
     $catclass=$row['category'];  
     echo "<thead class="."thbd".">"."<tr>
       <th class="."tsid1".">"."Emp Id</th>
      <th class="."tref".">"."Name</th>
    <th class="."stat".">"."Category</th>
    </tr></thead>";
   echo "<tbody class="."tbd".">";
     echo "<tr class="."Trow".">";
     echo "<td class="."tsid".">"."No data Matched"."</td><td class="."tsid".">"."No data Matched"."</td><td class="."tsid".">"."No data Matched"."</td>";
     echo "</tr>";

   }

  
  echo "</tbody>";

}


    
  
   
?>
</table>
</div>
</div>


<?php
if(isset($_POST['delete']))
   {
    $admin_password=mysqli_real_escape_string($con,$_POST['admin_password']);
    $e_id=$_SESSION['delete_emp_id'];
    $sql_qry="SELECT * FROM staff where emp_id='$e_id'";
    $result=mysqli_query($con,$sql_qry);
    $row=mysqli_fetch_array($result);
    
    if($row!=0)
    {
      

    $sql_admin_check= "SELECT * FROM staff where username='admin' and password='$admin_password'";
    $result_admin_check=mysqli_query($con,$sql_admin_check);
    $row2=mysqli_fetch_array($result_admin_check,MYSQLI_ASSOC);  
   
if($row2!=0)
{
     $sql_delete="DELETE from staff where emp_id='$e_id'";
      $delete_result=mysqli_query($con,$sql_delete);
        $row1=mysqli_fetch_array($result);
     if ($row1==0) {
                       echo "<div class="."delete_message"."><b>Employee Successfuly deleted</b></div>";
                      }
        else
          {
            echo "<div class="."delete_message"."><b>Error in Deleting the Employee Information</b></div>";
          }


}
else
  {
   echo "<div class="."delete_message"."><b>password Not matched</b></div>";
   }
        
      
    
    }
    
   }
?>

</div>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="bootstrap.js"></script>
</body>
</html>