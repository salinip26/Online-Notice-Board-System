<?php
 
session_start();
include("conn.php");
include("headernav.html");
 
 
if(isset($_POST["delete"]))
{
   $id=$_POST['id'];
   $del="delete from student_profile where student_id=$id";
   //echo $del;
   $q=mysqli_query($conn,$del);
   if($q)
  {
    echo "<script>alert('Deleted Student..!!');
    </script>";
  }
 
}
 
 
?>
<!DOCTYPE html>
<html>
<style type="text/css">
   <script src="bootstrap-4.4.1/js/bootstrap.min.js" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <!-- CSS File -->
    <link rel="stylesheet" href="css/style.css">
</style>
<body>
 
</body>
</html>
 
<div>
  <?php
    $query = 'select * from student_profile';
    //echo $query;
    $query_run = mysqli_query($conn,$query);
    while($row = mysqli_fetch_row($query_run)){
      ?>
      
        <br>
        <div >
          <center>
            <form method="post" action="delstu.php">
              <input type="hidden" name="id" value="<?php echo $row[0];?>">
               <div class="card">
        <div class="card-body">
          <h8 class="card-title">Student ID: <?php echo $row[0];?></h8>
          <p class="card-text">Student Name: <?php echo $row[1];?></p>
          <p class="card-text">Email: <?php echo $row[3];?></p>
          <p class="card-text">Class: <?php echo $row[4];?></p>
          <input type="submit" name="delete" value="Delete" class="btn btn-primary">
          
        </div>
      </div>
        </form>
        </center>
      
      <?php
    }
    ?>
   
  </div> 
<?php
echo"<br>";
include("footer.html");
?>

