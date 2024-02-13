<?php
 
session_start();
include("conn.php");
 
$id = "";
$name="";
$pass = "";
  $email = "";
  $class = "";
$sel= "select * from student_profile where student_id = $_SESSION[txtid]";
//echo $sel;
$queryres = mysqli_query($conn,$sel);
 
 
  while($row = mysqli_fetch_assoc($queryres))
  {
    $id = $row['student_id'];
    $name = $row['student_name'];
    $pass = $row['student_password'];
    $email = $row['student_email'];
    $class = $row['student_class'];
     $_SESSION['class']=$class;
  }
 
 
?>
 
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
  <body>
      <div>
    <form  method="post" action="studentview.php">
   <table>
   <h4> Update Student Profile</h4>
    <tr>
      <td><b>Student UserId:</b></td>
      <td><input type="text" name="txtid" value="<?php echo $id; ?>"></td>
    </tr>
    <tr>
      <td><b>Student Name:</b></td>
      <td><input type="text" name="txtname"  value="<?php echo $name;?>"></td>
    </tr>
    <tr>
      <td><b>Student Password:</b></td>
      <td><input type="text" name="txtpass" value="<?php echo $pass;?>"></td>
    </tr>
    <tr>
      <td><b>Student E-mail:</b></td>
      <td><input type="text" name="email" value="<?php echo $email;?>"></td>
    </tr>
    <tr>
    <td><b>Select Class:</b></td>
    <td>
     <select name="class">
      <option><?php echo $class; ?></option>
           <option>-Select-</option>
           <option>8</option>
           <option>9</option>
           <option>10</option>
           <option>11</option>
           <option>12</option>
          </select>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="update" value="Update" class="btn btn-primary"></td>
    </tr>
  </table>
</form>
</div>
<hr>
</body>
</html>
