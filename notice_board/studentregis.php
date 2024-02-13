<?php
include("headernav.html");
include("conn.php");
//registering the new student to the db
 
if(isset($_POST["submit"]))
{
$query="insert into student_profile values(null,'$_POST[txtname]','$_POST[txtpass]','$_POST[email]',$_POST[class])"; 
echo $query."<br>";
$query_run=mysqli_query($conn,$query);
echo $query_run;
 
if($query_run)
{
echo"<script>alert('Registration is Sucessful!You may now Login');
window.location.href='studentlogin.php'
</script>";
}
else
{
echo"<script>alert('Registration failed...try again');
      window.location.href = 'studentregis.php';
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
if(document.frm_studentregis_form.txtid.value =='')
{
alert("Student Id field cannot be left empty");
document.frm_studentregis_form.txtid.focus();
return false;
}
 
if(document.frm_studentregis_form.txtname.value =='')
{
alert("Student Name field cannot be left empty");
document.frm_studentregis_form.txtname.focus();
return false;
}
 
if(document.frm_studentregis_form.txtpass.value =='')
{
alert("Student Password field cannot be left empty");
document.frm_studentregis_form.txtpass.focus();
return false;
}
 
if(document.frm_studentregis_form.email.value =='')
{
alert("Student email field cannot be left empty");
document.frm_studentregis_form.email.focus();
return false;
}
if(document.frm_studentregis_form.class.value =='0')
{
alert("Please select your class!");
document.frm_studentregis_form.class.focus();
return false;
}
 
 
 
}
</script>
</head>
<body>
<hr>
<div>
<form name="frm_studentregis_form" onSubmit="return validateform()" method="post" action="studentregis.php">
<table border=1 bgcolor='#EDE5E1'class='center'>
<center><h3> Student Registration Page </h3></center>
<tr>
<td><b>*Student UserId:</b></td>
<td><input type="text" name="txtid" placeholder="Enter User ID like 110"></td>
</tr>
<tr>
<td><b>*Student Name:</b></td>
<td><input type="text" name="txtname" placeholder="Enter your name"></td>
</tr>
<tr>
<td><b>*Student Password:</b></td>
<td><input type="password" name="txtpass" placeholder="Enter like stu@06"></td>
</tr>
<tr>
<td><b>*Student E-mail:</b></td>
<td><input type="text" name="email" placeholder="Enter your e-mail"></td>
</tr>
<tr>
<td><b>*Select Class:</b></td>
<td>
 <select name="class">
           <option value="0" selected>-Select-</option>
           <option value="1">7</option>
           <option value="2">8</option>
           <option value="3">9</option>
           <option value="4">10</option>
           <option value="5">11</option>
           <option value="6">12</option>
          </select>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" value="Register"></td>
</tr>
</table>
</form>
<center><a href="studentlogin.php">Login as a Student</a></center>
</div>
<hr>
 
</body>
</html>
 
<?php
include("footer.html");
?>
