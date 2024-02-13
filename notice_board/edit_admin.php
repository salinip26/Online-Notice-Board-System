<?php
 
session_start();
include("conn.php");
$id = "";
$name="";
$pass = "";
  $email = "";
 
$sel= "select * from admin_profile where admin_id = $_SESSION[txtid]";
//echo $sel;
$queryres = mysqli_query($conn,$sel);
 
 
  while($row = mysqli_fetch_assoc($queryres))
  {
    $id = $row['admin_id'];
    $name = $row['admin_name'];
    $pass = $row['admin_password'];
    $email = $row['admin_email'];
    
    
  }
 
?>
 
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
  <body>
      <div>
    <form method="post" action="adminview.php">
    <table border=1 bgcolor='#EDE5E1'>
    <h3>Admin Edit Profile</h3>
    <tr>
      <td><b>Admin UserId:</b></td>
      <td><input type="text" name="txtid" value="<?php echo $id; ?>"></td>
    </tr>
    <tr>
      <td><b>Admin Name:</b></td>
      <td><input type="text" name="txtname" value="<?php echo $name;?>"></td>
    </tr>
    <tr>
      <td><b>Admin Password:</b></td>
      <td><input type="text" name="txtpass" value="<?php echo $pass;?>"></td>
    </tr>
    <tr>
      <td><b>Admin E-mail:</b></td>
      <td><input type="text" name="email" value="<?php echo $email;?>"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="update" value="Update"></td>
    </tr>
  </table>
</form>
</div>
<BR><BR>
</body>
</html>
