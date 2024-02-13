<?php
include("headernav.html");
include("conn.php");
 
//registering the new admin to the db
 
if(isset($_POST["submit"]))
{
$query="insert into admin_profile values(null,'$_POST[txtname]','$_POST[txtpass]','$_POST[email]',$_POST[rad1])"; 
echo $query."<br>";
$query_run=mysqli_query($conn,$query);
echo $query_run;
 
if($query_run)
{
echo"<script>alert('Registration is Sucessful!You may now Login');
window.location.href='adminlogin.php'
</script>";
}
else
{
echo"<script>alert('Registration failed...try again');
      window.location.href = 'adminregis.php';
      </script>";
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="style.css">
 
 
<script type="text/javascript">
function validateform()
{
if(document.frm_adminregis_form.txtid.value =='')
{
alert("Admin Id field cannot be left empty");
document.frm_adminregis_form.txtid.focus();
return false;
}
 
if(document.frm_adminregis_form.txtname.value =='')
{
alert("Admin Name field cannot be left empty");
document.frm_adminregis_form.txtname.focus();
return false;
}
 
if(document.frm_adminregis_form.txtpass.value =='')
{
alert("Admin Password field cannot be left empty");
document.frm_adminregis_form.txtpass.focus();
return false;
}
 
if(document.frm_adminregis_form.email.value =='')
{
alert("Admin email field cannot be left empty");
document.frm_adminregis_form.email.focus();
return false;
}
 

 
}
</script>
</head>
<body>
<hr>
<div>
<form name="frm_adminregis_form" onSubmit="return validateform()" method="post" action="adminregis.php">
<table border=1 bgcolor='#EDE5E1'class='center'>
<center><h3> Admin Registration Page </h3></center>
<tr>
<td><b>*Admin UserId:</b></td>
<td><input type="text" name="txtid" placeholder="Enter User ID like 1116"></td>
</tr>
<tr>
<td><b>*Admin Name:</b></td>
<td><input type="text" name="txtname" placeholder="Enter your name"></td>
</tr>
<tr>
<td><b>*Admin Password:</b></td>
<td><input type="password" name="txtpass" placeholder="Enter password like admin@16"></td>
</tr>
<tr>
<td><b>*Admin E-mail:</b></td>
<td><input type="text" name="email" placeholder="Enter your e-mail"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" value="Register"></td>
</tr>
</table>
</form>
<center><a href="adminlogin.php">Login as an Admin</a></center>
</div>
<hr>
 
 
</body>
</html>
<?php
include("footer.html");
?>

