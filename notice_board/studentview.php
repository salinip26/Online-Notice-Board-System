<?php
session_start();
include("headernav.html");
include("conn.php");
 
if(isset($_POST['update']))
{
$_SESSION['txtid']=$_POST['txtid'];
}
else
{
  
 
}
 
 
$name="";
  $email = "";
  $class = "";
$sel= "select * from student_profile where student_id = $_SESSION[txtid]";
//echo $sel;
$queryres = mysqli_query($conn,$sel);
 
 
  while($row = mysqli_fetch_assoc($queryres))
  {
    
    $name = $row['student_name'];
    $email = $row['student_email'];
    $class = $row['student_class'];
  }
 
 
 
if(isset($_POST['update']))
{
  
$query = "update student_profile set student_name='$_POST[txtname]',student_password='$_POST[txtpass]',student_email='$_POST[email]',student_class=$_POST[class] where student_id=$_POST[txtid]";
  //echo $query;
  $query_run = mysqli_query($conn,$query);
  if($query_run){
    echo "<script type='text/javascript'>
    alert('Profile Updated successfully...');
    </script>";
}
else
{
echo "<script type='text/javascript'>
alert('Can't update try again...');
</script>";
 }
}	
?>
 
<html>
<head>
 
<title>Student Dashboard</title>
    <!-- Bootstrap files -->
    <script src="bootstrap-4.4.1/js/bootstrap.min.js" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <!-- CSS File -->
    <link rel="stylesheet" href="css/style.css">
 
    <script src="jQuery/juqery_latest.js" charset="utf-8"></script>
      <script type="text/javascript">
     $(document).ready(function(){
        $("#edit_profile_button").click(function(){
          $("#main_content").load('edit_student.php');
        });
 
        $("#view_notice_button").click(function(){
          $("#main_content").load('view_notice_student.php');
        });
 
      });
    
    </script>
 
</head>
<body>
<hr>


  
      <div class="row">
        <div class="col-md-3" id="left_sidebar">
          <center>
            <b>Student ID: <?php echo $_SESSION['txtid'];?></b><br><br>
            <a href="studentlogout.php" type="button">Logout</a>
          </center>
          <hr>
          <center><button type="button" id="edit_profile_button">Edit Profile</button></center><br>
          <center><button type="button" id="view_notice_button">View All Notices</button></center><br><br>
          
          <hr>
        </div>
        <div class="col-md-8" id="main_content">
          <form action="studentview.php" method="post">
          <h2>Welcome Student!</h2>
          <hr>
          <table>
          <tr>
          <th>Student Name: <?php echo $name?></th>
          </tr>
          <tr>
           <th>Student Email: <?php echo $email?></th>
         </tr>
         <tr>
           <th>Class: <?php echo $class?></th>
         </tr>
       </table>
         </form>
        </div>
      </div>
<hr>
  <br>
</body>
</html>
<?php
include("footer.html");
?>
