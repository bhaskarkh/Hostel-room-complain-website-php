<?php
require"conn.php";
session_start();

$user_check=$_SESSION['login_user'];
if($user_check!='admin')
{
  header("location:login.php");
}

?>

<?php
require"conn.php";
// Get the variables.
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$fav=1;
$fid=mysqli_real_escape_string($con,$_POST['dd']);
$query = "UPDATE complain SET status='$fav'
WHERE referenceno='$fid'";

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
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <link rel="stylesheet" type="text/css" href="design.css">
  <link rel="stylesheet" type="text/css" href="design.css">

 
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
    <li class="dropdown"><a href="login.php">Other Category</a>
    <ul class="dropdown-content">
      <li><a href="electrician.php">Electrician</a>
      <li><a href="plumber.php">Plumber</a>
      <li><a href="carpenter.php">Carpenter</a>
      <li><a href="other.php">Other    </a>
    </ul>
    </li>
    <li ><a href="complainstatus.php">complain status</a></li>
    <li ><a href="aboutme.php">About Me</a></li>


  </ul>
</div> <!-- end of collapse-->

  
</div><!-- end of column 2-->
</div><!-- end of row-->
</div><!-- end of container fluid-->


</nav><!--end of navbar-default-->
<!--end of header-->


<div class="container">
<h2 class="sTable">Complains</h2>


<div id="responsecontainer" align="center">

</div>
<div class="table-responsive"><!-- start of responsive table-->
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
<th class="tcmt">Comment</th>
<th class="tnc">status</th> 

</tr>

</thead>

<?php
require"conn.php";
$sid=0;
$query = "SELECT * FROM complain  order by id DESC"; 

$result = mysqli_query($con,$query);
echo "<tbody class="."tbd".">";
 // start a table tag in the HTML

while($row=mysqli_fetch_array($result)){   //Creates a loop to loop through results
  $sid++;
  $catclass=$row['category'];
 
  if($row['status']==1)
    {$statusclass='done';}
  else
  {
   $statusclass='notdone';
  }
echo "<tr class="."Trow".">";

echo  "<td class="."tsid".">" . $sid . "</td>"."<td class=".$catclass.">" . $row['referenceno']. "</td>"."<td class=".$statusclass.">" .$statusclass. "</td>"."<td class=".$catclass.">" . $row['ptime'] . "</td>"."<td class=".$catclass.">"."<a href=".$row['category'].".php"." class="."catlink".">".$row['category']."</a>"."<td class=".$catclass.">" . $row['nc'] . "</td>". "<td class=".$catclass." >" . $row['room'] ."</td>"."</td>"."<td class=".$catclass.">" . $row['name'] . "</td>"."<td class=".$catclass.">" . $row['roll'] . "</td>"."<td class=".$catclass." id="."cmtbox".">".$row['comment']. "</td>"."<td class=".$catclass.">"."<form method="."POST".">"."<input type="."submit"." id=".$row['referenceno']." name="."dd"." value=".$row['referenceno'].">"."</form>". "</td>";  //$row['index'] the index here is a field name
echo "</tr>";
}


echo "</tbody>";
mysqli_close($con);
?>

</table>
</div> <!-- start of responsive table-->
</div>




<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="bootstrap.js"></script>

</body>
</html>