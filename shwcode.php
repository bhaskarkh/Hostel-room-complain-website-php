<?php
require"conn.php";
session_start();

$user_check=$_SESSION['login_user'];
if($user_check!='admin')
{
  header("location:login.php");
}
   
?>

<!DOCTYPE html>
<html>
<head>
<style>


table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
require"conn.php";
$sid=0;
$q=mysqli_real_escape_string($con,$_GET['q']);

if($q=='noselect' || $q==NULL)
{
$sql="SELECT * FROM complain order by id DESC";	
}
else if($q=='1'||$q=='0')
{
$sql="SELECT * FROM complain WHERE status='$q' order by id DESC ";
}
else
{
$sql="SELECT * FROM complain WHERE category='$q' order by id DESC ";
}
$result=mysqli_query($con,$sql);

echo"<table class="."table".">
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
<th class="."tnc".">Update</th>
</tr>

</thead>";
echo "<tbody class="."tbd".">";

while($row = mysqli_fetch_array($result)) {
 $sid++;
  $catclass=$row['category'];
	 if($row['status']==1)
    {$statusclass='done';}
  else
  {
   $statusclass='notdone';
  }
   echo "<tr class="."Trow".">";

echo  "<td class="."tsid".">" . $sid . "</td>"."<td class=".$catclass.">" . $row['referenceno']. "</td>"."<td class=".$statusclass.">" .$statusclass. "</td>"."<td class=".$catclass.">" . $row['ptime'] . "</td>"."<td class=".$catclass.">".$row['category']."</td>"."<td class=".$catclass.">" . $row['nc'] . "</td>". "<td class=".$catclass." >" . $row['room'] ."</td>"."</td>"."<td class=".$catclass.">" . $row['name'] . "</td>"."<td class=".$catclass.">" . $row['roll'] . "</td>"."<td class=".$catclass.">" ."<div style='color:black;font-weight:bold;font-size:16px;'>".$row['techname']."</div>".$row['complet_time']. "</td>"."<td class=".$catclass." id="."cmtbox".">".$row['comment']. "</td>"."<td class=".$catclass.">"."<form method="."POST".">"."<input type="."text"." id=".$row['referenceno']." name="."technician_name"." style="."color:black;".">"."<input type="."submit"." id=".$row['referenceno']." name="."dd"." value=".$row['referenceno']." style="."margin-left:60px;".">"."</form>". "</td>";  //$row['index'] the index here is a field name
echo "</tr>";
}


echo "</tbody></table>";
mysqli_close($con);
?>
</body>
</html>