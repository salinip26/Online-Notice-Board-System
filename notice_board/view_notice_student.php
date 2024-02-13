<?php
 
session_start();
include("conn.php");
 
  $class = "";
$sel= "select * from student_profile where student_id = $_SESSION[txtid]";
//echo $sel;
$queryres = mysqli_query($conn,$sel);
 
 
  while($row = mysqli_fetch_assoc($queryres))
  {
  
    $class = $row['student_class'];
     $_SESSION['class']=$class;
  }
 
 
?>
 
 
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <center>Notices</center>
    <?php
    //echo $_SESSION["class"];
    include("conn.php");
    $query = "select * from events_details where for_class = 'All' OR for_class='$_SESSION[class]'";
    //echo $query;
    $query_run = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($query_run)){
      ?>
      <div class="card">
        <div class="card-body">
          <h8 class="card-title">Name: <?php echo $row['event_name'];?></h8>
          <p class="card-text">Date: <?php echo $row['event_date'];?></p>
          <p class="card-text">Message: <?php echo $row['message'];?></p>
        </div>
      </div>
      <?php
    }
    ?>
    <hr>
  </body>
</html>
