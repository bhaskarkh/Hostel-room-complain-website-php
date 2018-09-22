<!DOCTYPE html>
<html>
<head>
<title>Other</title>
<link rel="stylesheet" type="text/css" href="/style.css">
<link rel="stylesheet" type="text/css" href="/form.css">

<?php
require "conn.php";
$successmsg='';


if($_SERVER["REQUEST_METHOD"]=="POST")
{
$category=mysqli_real_escape_string($con,$_POST['category']);
$name=mysqli_real_escape_string($con,$_POST['name']);
$roll=mysqli_real_escape_string($con,$_POST['roll']);
$nc=mysqli_real_escape_string($con,$_POST['nc']);
$room=mysqli_real_escape_string($con,$_POST['room']);
$comment=mysqli_real_escape_string($con,$_POST['comment']);
$date=date('Y-m-d H:i:s');

$sql="INSERT into complain (category,ptime,name,roll,nc,room,comment) VALUES ('$category',CURRENT_TIMESTAMP,'$name','$roll','$nc','$room','$comment')";
$result=mysqli_query($con,$sql);
if($result)
{
$successmsg="Complain Registered Successfully";
}

}
 ?>
</head>
<body>

<ul>
      <li><a href="index.php">Home</a></li>
      <li><a>Complain Page</a>
       <ul>
            <li><a href="student.php">student</a></li>
            <li><a href="login.php">Admin</a></li>
             <li><a href="show.php">Show</a></li>
      </ul>
      </li>
      <li><a href="contact.php">contact us</a></li>
      <li><a href="aboutme.php">About Me</a></li>
</ul>

<br>
<br>
<div class="hed1"><h>Register Your Complain Here</h></div>
<div class="frm">
<form name="carpenter" method="POST">
<select name="category">
<option value="carpenter">carpenter</option>
<option value="electrician">electrician</option>
<option value="plumber">plumber</option>
<option value="other">other</option>
</select>
<br>
<input type="/" name="name" placeholder="Name"><br>
<input type="/" name="roll" placeholder="roll"><br>
<input type="/" name="nc" placeholder="NC" required><br>
<input type="number" name="room" placeholder="room no." required><br>
<br>
<textarea class="comment"  name="comment" id="comment" placeholder="write about your problem"></textarea><br>
<div style="background-color:green;color:white;"> <?php echo "$successmsg"; ?></div>
<input type="submit" name="submit" value="submit" class="sbm"><br>    
</form>
</div>
</body>
</html>