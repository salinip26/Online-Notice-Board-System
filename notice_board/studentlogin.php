<?php
session_start();
include("conn.php");
include("headernav.html");
 
 
if(isset($_POST["submit"]))
{	
$submit_name=$_POST["submit"];

 
//check for empty fields
if(!empty($_POST["txtid"]) && !empty($_POST["txtpass"]))
{
$id=$_POST["txtid"];
$pass=$_POST["txtpass"];
 

//echo $id." ".$pass;
 
//verify the student with the database
$sel="select * from student_profile where student_id=$id and student_password='$pass'";
//echo $sel;
$queryres=mysqli_query($conn,$sel);
$num=mysqli_num_rows($queryres);
 

if($num>0)
{
//echo"Valid User";
//Redirect him to the admin view page 
header("location:studentview.php?id=$id&txtpass=$pass");
 
}
else
{
echo"<h4 style='color:red;'><center> Incorrect Student User Id or Password!</center></h4>";
}
 
}
else
{
echo"<h4 style='color:blue;'><center>Student UserId or Password is not entered!</center></h4>";
}
}
 
?>
 
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
 
<body>
<hr>
<div class="myDiv">
<form action="studentlogin.php" method="post">
<table border=1 bgcolor='#E0EBE5' class='center'>
<h3>Student Login Page </h3>
<tr>
<td><b>Student UserId:</b></td>
<td><input type="text" name="txtid" placeholder="UserId"></td>
</tr>
<tr>
<td><b>Studnet Password:</b></td>
<td><input type="password" name="txtpass" placeholder="Password"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" value="Login"></td>
</tr>
</table>
<a href="studentregis.php">Register as a Student</a>
</form>
<hr>
<br><br><br>
</div>
</body>
</html>
<?php
echo"<br>";
include("footer.html");
?>
