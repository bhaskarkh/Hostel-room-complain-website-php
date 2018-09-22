<?php
require"session.php";
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
  <link rel="stylesheet" type="text/javascript" href="category.js>
 
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
    <li ><a href="login.php">Admin</a></li>
    <li ><a href="show.php">contact us</a></li>
    <li ><a href="">About Me</a></li>

  </ul>
</div> <!-- end of collapse-->

  
</div><!-- end of column 2-->
</div><!-- end of row-->
</div><!-- end of container fluid-->


</nav><!--end of navbar-default-->
<!--end of header-->
<div class="container">
<h2 class="sTable">Complains</h2>
<div class="table-responsive"><!-- start of responsive table-->
<table class="table">
<thead class="thbd">
<tr>
<th class="tsid">Sno.</th>
<th class="ttim">Time</th>
<th class="tcat">Category</th>
<th class="tnc">NC</th>
<th class="trom">Room</th>
<th class="tnam">Name</th>
<th class="trol">roll</th>                                      

<th class="tcmt">Comment</th>
</tr>

</thead>

<?php
require"conn.php";
$sid=0;
$query = "SELECT * FROM complain  where category='carpentar' order by id DESC"; 
$result = mysqli_query($con,$query);
echo "<tbody class="."tbd".">";
 // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
  $sid++;
  $catclass=$row['category'];
echo "<tr class="."Trow".">";

echo  "<td class="."tsid".">" . $sid . "</td>"."<td class=".$catclass.">" . $row['ptime'] . "</td>"."<td class=".$catclass.">" . $row['category'] . "<td class=".$catclass.">" . $row['nc'] . "</td>". "<td class=".$catclass." >" . $row['room'] ."</td>"."</td>"."<td class=".$catclass.">" . $row['name'] . "</td>"."<td class=".$catclass.">" . $row['roll'] . "</td>"."<td class=".$catclass.">" . $row['comment'] . "</td>";  //$row['index'] the index here is a field name
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