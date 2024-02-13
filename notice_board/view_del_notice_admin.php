<?php
include("conn.php");
if(isset($_GET['delete']))
{
 
  $id=$_GET['id'];
  $del="delete from events_details where event_id=$id";
  echo $del;
  $q=mysqli_query($conn,$del);
  if($q)
  {
    echo "<script>alert('Deleted Notice..!!');
 
    </script>";
    header("location:adminview.php?id=$id");
    
  }
}
 
 
?>
 
 
 
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <br>
    <center><h3>All Notices</h3></center><br>
    <?php
    include("conn.php");
    $query = 'select * from events_details';
    $query_run = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($query_run)){
      ?>
      <form method="get" action="view_notice_admin.php">
        <input type="hidden" name="id" value="<?php echo $row['event_id']?>">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Event Name:<?php echo $row['event_name'];?></h5>
          <p class="card-text">Event Date: <?php echo $row['event_date'];?></p>
          <p class="card-text">Message: <?php echo $row['message'];?></p>
          <input type="submit" name="delete" value="Delete" class="btn btn-primary">
        </form>
        </div>
      </div>
 
      <?php
    }
    ?>
    <hr>
  </body>
</html>
