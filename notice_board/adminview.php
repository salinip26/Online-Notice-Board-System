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
     $_SESSION['txtid']=$_GET['id'];
}
 
$id = "";
$name="";
  $email = "";
 
$sel= "select * from admin_profile where admin_id = $_SESSION[txtid]";
//echo $sel;
$queryres = mysqli_query($conn,$sel);
 
 
  while($row = mysqli_fetch_assoc($queryres))
  {
    $id = $row['admin_id'];
    $name = $row['admin_name'];
    $email = $row['admin_email'];
    
    
  }
 
 
 
if(isset($_POST['update']))
{
 
$query = "update admin_profile set admin_name='$_POST[txtname]',admin_password='$_POST[txtpass]',admin_email='$_POST[email]' where admin_id=$_POST[txtid]";
  //echo $query;
  $query_run = mysqli_query($conn,$query);
  if($query_run)
  {
    echo "<script type='text/javascript'>
    alert('Profile Updated successfully...');
    //window.location.href = 'adminview.php'
    </script>";
  }
  else
 {
    echo "<script type='text/javascript'>
    alert('Can't update try again...');
    //window.location.href = 'adminview.php'
    </script>";
  }
} 
 
 
 
 
if(isset($_POST['send_notice']))
{
  
  $query = "insert into events_details values(null,'$_POST[event_name]','$_POST[date]',$_POST[class],'$_POST[msg]')";
  $query_run = mysqli_query($conn,$query);
  if($query_run)
  {
    echo "<script>alert('Notice has been Created...!!');
    //window.location.href = 'admin_dashboard.php';
    </script>";
  }
  else
  {
    echo "<script>alert('Please try again');
    //window.location.href = 'admin_dashboard.php';
    </script>";
  }
}
?>
 
<html>
<head>
 
<title>Admin Dashboard</title>
    <!-- Bootstrap files -->
    <script src="bootstrap-4.4.1/js/bootstrap.min.js" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <!-- CSS File -->
    <link rel="stylesheet" href="css/style.css">
    <script src="jQuery/juqery_latest.js" charset="utf-8"></script>
     <script type="text/javascript">
      $(document).ready(function(){
        $("#edit_profile_button").click(function(){
          $("#main_content").load('edit_admin.php');
        });
        $("#create_notice_button").click(function(){
          $("#main_content").load('create_notice.php');
        });
 
        $("#view_notice_button").click(function(){
          $("#main_content").load('view_del_notice_admin.php');
        });
 
      });
    </script>
 
</head>
<body>
<hr>
     
      <div class='row'>
        <div class="col-md-3" id="left_sidebar">
          <center><b>Admin ID: <?php echo $_SESSION['txtid'];?></b><br>
            <a href="adminlogout.php">Logout</a>
          </center>
          
          <hr>
          <center><button type="button"  id="edit_profile_button" >Edit Profile</button></center><br>
          <center><a href="delstu.php" type="button">Delete Students</a></center><br>
          <center><button type="button"  id="create_notice_button">Create a Notice</button></center><br>
          <center><button type="button"  id="view_notice_button">View All Notices</button></center><br><br>
          
          <hr>
        </div>
         </section>
        <div class="col-md-8" id="main_content">
          <form action="studentview.php" method="post">
          <h2>Welcome Admin</h2>
          <hr>
          <hr>
          <table>
          <tr>
          <th>Student Name: <?php echo $name?></th>
          </tr>
          <tr>
           <th>Student Email: <?php echo $email?></th>
         </tr>
         
       </table>
        <br>
         <a href="studentregis.php" type="button">+ADD STUDENT</a>
         <a href="adminregis.php" type="button">+ADD ADMIN</a><br>
         <hr>
       </form>
        </div>
      </div>
 
  
 
</body>
</html>
 
 
 
 
<?php
include("footer.html");
?>

