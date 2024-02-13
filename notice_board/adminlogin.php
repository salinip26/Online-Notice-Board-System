<?php
 
include("conn.php");
include("headernav.html");
 
//message from adminview.php
if(isset($_GET['msg']))
{
echo" <font color='red'><h1>".$_GET['msg'].
"</h1></font>";
}
if(isset($_POST["submit"]))
{	
$submit_name=$_POST["submit"];
//echo $submit_name;
//check for empty fields
if(!empty($_POST["txtid"]) && !empty($_POST["txtpass"]))
{
$id=$_POST["txtid"];
$pass=$_POST["txtpass"];

//echo $id." ".$pass;
 
//verify the admin with the database
$sel="select * from admin_profile where admin_id=$id and admin_password='$pass'";
//echo $sel;
$queryres=mysqli_query($conn,$sel);
$num=mysqli_num_rows($queryres); 
 
if($num>0)
{
//echo"Valid User";
//Redirect him to the admin view page 
header("location:adminview.php?id=$id&txtpass=$pass");

}
else
{
echo"<h4 style='color:red;'><center> Incorrect admin User Id or Password!</center></h4>";
}
 
}
else
{
echo"<h4 style='color:blue;'><center>Admin UserId or Password is not entered!</center></h4>";
}
}
 
 
?>
 
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
 
<body>
<form action="adminlogin.php" method="post">
<hr>
<div class="myDiv">
<table border=1 bgcolor='#E0EBE5' class='center'>
<h3> Admin Login Page </h3>
<tr>
<td><b>Admin UserId:</b></td>
<td><input type="text" name="txtid" placeholder="UserId"></td>
</tr>
<tr>
<td><b>Admin Password:</b></td>
<td><input type="password" name="txtpass" placeholder="Password"></td>
</tr>

<tr>
<td></td>
<td><input type="submit" name="submit" value="Login"></td>
</tr>
</table>
 
<a href="adminregis.php">Register as an Admin</a>
</div>
<hr>
<br><br><br>
 
</form>
</body>
</html>
<?php
echo"<br>";
include("footer.html");
?>

