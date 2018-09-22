<?php
require"conn.php";
session_start();

$user_check=$_SESSION['login_user'];

$staff_category=$_SESSION['user_category'];
if($staff_category!='admin')
header("location:login.php");

  
?>

<?php //code to change the status from notdone to done
require"conn.php";
// Get the variables.
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$fav=1;
$fid=mysqli_real_escape_string($con,$_POST['dd']);
$technician_name=mysqli_real_escape_string($con,$_POST['technician_name']);

if($technician_name=="")
{
$query = "UPDATE complain SET status='$fav',techname='$user_check' 
WHERE referenceno='$fid'";
}
else
{
 $query = "UPDATE complain SET status='$fav',techname='$technician_name' 
WHERE referenceno='$fid'"; 
}

mysqli_query($con,$query);
mysqli_close($con);
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
  
<script>
function showUser(str) {
  if (str=="") {
 
    document.getElementById("txtHint").innerHTML=" ";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","showcode.php?q="+str,true);
  xmlhttp.send();
}
</script>
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
    <li ><a href="adminpanel.php">Admin Panel</a></li>
     <li ><a href="logout.php">Logout</a></li>


  </ul>

</div> <!-- end of collapse-->

  
</div><!-- end of column 2-->
</div><!-- end of row-->
</div><!-- end of container fluid-->


</nav><!--end of navbar-default-->
<!--end of header-->



<div class="container-fluid">

<h2 class="sTable">Complains</h2>


<form class="frmselect">
<select name="users" onchange="showUser(this.value)">
<option value="noselect">Show All</option>
<option value="electrician">electrician</option>
<option value="plumber">Plumber</option>
<option value="carpenter">carpenter</option>
<option value="other">other</option>
<option value="1">Completed</option>
<option value="0">Not completed</option>
</select>
</form>

<br>
<div class="table-responsive" id="txtHint"><!-- start of responsive table-->
<table class="table">
<thead class="thbd">
<tr>
<th class="tsid1">Sno.</th>
<th class="tref">refno</th>
<th class="tstat">status</th>
<th class="ttim">Time</th>
<th class="tcat">Category</th>
<th class="tnc">NC</th>
<th class="trom">Room</th>
<th class="tnam">Name</th>
<th class="trol">roll</th>
<th class="trol">Technician</th>
<th class="tcmt">Comment</th>
<th class="tnc">Update</th> 

</tr>

</thead>

<?php
require"conn.php";
$sid=0;
$query = "SELECT * FROM complain  order by id DESC"; 

$result = mysqli_query($con,$query);
echo "<tbody class="."tbd".">";
 // start a table tag in the HTML

while($row=mysqli_fetch_array($result))
  {   //Creates a loop to loop through results
  $sid++;
  $catclass=$row['category'];
 
  if($row['status']==1)
    {
     $statusclass='done';
    }
  else
  {
   $statusclass='notdone';
  }
echo "<tr class="."Trow".">";

echo  "<td class="."tsid".">" . $sid . "</td>"."<td class=".$catclass.">" . $row['referenceno']. "</td>"."<td class=".$statusclass.">" .$statusclass. "</td>"."<td class=".$catclass.">" . $row['ptime'] . "</td>"."<td class=".$catclass.">"."<a href=".$row['category'].".php"." class="."catlink".">".$row['category']."</a>"."<td class=".$catclass.">" . $row['nc'] . "</td>". "<td class=".$catclass." >" . $row['room'] ."</td>"."</td>"."<td class=".$catclass.">" . $row['name'] . "</td>"."<td class=".$catclass.">" . $row['roll'] . "</td>"."<td class=".$catclass.">" ."<div style='color:black;font-weight:bold;font-size:16px;'>".$row['techname']."</div>".$row['complet_time']. "</td>"."<td class=".$catclass." id="."cmtbox".">".$row['comment']. "</td>"."<td class=".$catclass.">"."<form method="."POST".">"."<input type="."text"." id=".$row['referenceno']." name="."technician_name"." style="."color:black;".">"."<br>"."<input type="."submit"." id=".$row['referenceno']." name="."dd"." value=".$row['referenceno']." style="."margin-left:60px;".">"."</form>". "</td>";  //$row['index'] the index here is a field name
echo "</tr>";
}


echo "</tbody>";
mysqli_close($con);
?>

</table>
</div> <!-- start of responsive table-->

</div>

<!--Start of Footer-->
<br>
<br>
<footer class="page-footer">
<div class="container-fluid"><!--Start of Footer fluid containeer-->
<div>
©Copyright 2017 GIET GUNUPUR
</div> 
<div style="font-size:18px;">
  Developed By:Kumar Bhaskar
</div> 

</div><!--End of Footer fluid containeer-->
</footer><!--End of Footer-->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="bootstrap.js"></script>
</body>
</html>