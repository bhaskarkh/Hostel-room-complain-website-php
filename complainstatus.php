<?php $failmsg=''; ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-compatible">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Giet Online Complain Portal</title>
 
  <link rel="stylesheet" type="text/css" href="bootstrap.css?ts=<?=time()?>/">
  <link rel="stylesheet" type="text/css" href="mystyle.css?ts=<?=time()?>/">
  <link rel="stylesheet" type="text/css" href="design.css?ts=<?=time()?>/">
  
 



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
  <li ><a href="index.php">Home</a></li>
    <li ><a href="login.php">Staff</a></li>
    <li class="active"><a href="complainstatus.php">complain status</a></li>
    <li ><a href="aboutme.php">About Me</a></li>
     
    

  </ul>
</div> <!-- end of collapse-->

  
</div><!-- end of column 2-->
</div><!-- end of row-->
</div><!-- end of container fluid-->


</nav><!--end of navbar-default-->
<!--end of header-->
<div class="container frmstatus">
<form method="POST" class="form-horizontal">
<div class="form-group">
<input type="text" name="inputrefno" placeholder="Enter your Reference no" class="form-control"><br>
<input type="submit" value="Check" class="btn btn-default">
</div>
</form>
</div><!--end of container-->



<?php
require"conn.php";
$sid=0;

if($_SERVER["REQUEST_METHOD"]=="POST")
{
$inputrefno=mysqli_real_escape_string($con,$_POST['inputrefno']);

$query = "SELECT * FROM complain  where referenceno='$inputrefno'";
$result=mysqli_query($con,$query);
$rw=mysqli_num_rows($result);
if($rw)
{
echo"<div class="."container".">";
echo"<h2 class="."sTable".">Complains</h2>
<div class="."table-responsive"."><!-- start of responsive table-->
<table class="."table".">
<thead class="."thbd".">
<tr>
<th class="."tsid".">Sno.</th>
<th class="."tref".">refno</th>
<th class="."tstat".">status</th>
<th class="."ttim".">Time</th>
<th class="."tcat".">Category</th>
<th class="."tnc".">NC</th>
<th class="."trom".">Room</th>
<th class="."tnam".">Name</th>
<th class="."trol".">roll</th>                                      
<th class="."trol".">Technician</th> 
<th class="."tcmt".">Comment</th>
</tr>

</thead>";
echo "<tbody class="."tbd".">";
 // start a table tag in the HTML

while($row=mysqli_fetch_array($result))
{
   //Creates a loop to loop through results
  $sid++;
  $catclass=$row['category'];

  if($row['status']==1)
    {$statusclass='done';}
  else
  {
   $statusclass='notdone';
  }
echo "<tr class="."Trow".">";

echo  "<td class="."tsid".">" . $sid . "</td>"."<td class=".$catclass.">" . $row['referenceno'] . "</td>"."<td class=".$statusclass.">" .$statusclass. "</td>"."<td class=".$catclass.">" . $row['ptime'] . "</td>"."<td class=".$catclass.">" . $row['category'] . "<td class=".$catclass.">" . $row['nc'] . "</td>". "<td class=".$catclass." >" . $row['room'] ."</td>"."</td>"."<td class=".$catclass.">" . $row['name'] . "</td>"."<td class=".$catclass.">" . $row['roll'] . "</td>"."<td class=".$catclass.">" ."<div style='color:black;font-weight:bold;font-size:16px;'>".$row['techname']."</div>".$row['complet_time']. "</td>"."<td class=".$catclass.">" . $row['comment'] . "</td>";  //$row['index'] the index here is a field name
echo "</tr>";
}


echo "</tbody>";
mysqli_close($con);
echo"</table>
</div> <!-- End of responsive table-->
</div><!-- End of Container-->";

echo"<div class='container foot'>
  <div class='panel-group'>
    <div class='panel panel-primary'>
      <div class='panel-heading maillink'>For more Any Suggestion or help <br>mail us at <a href='mailto:contact@gietcomplain.ml'>contact@gietcomplain.ml</a></div></div></div></div>";


}
else
{echo "<h2 class='sTable'>Invalid Reference number</h2>
";
}
}

?>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="bootstrap.js"></script>
</body>
</html>