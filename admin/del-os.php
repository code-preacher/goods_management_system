<?php 
ob_start();
session_start();
include '../inc/checklogin.php';
checkLogin();
$id=$_GET['id'];
?>

<?php
include '../inc/config.php';
$j=mysqli_query($con,"delete from goods_booking where id='$id'");
 if ($j) {
  $_SESSION['nmsg']= '<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>Booked goods was successfully deleted....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
 header("location:view-os.php");
 } else {
  $_SESSION['nmsg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>Error deleting Booked goods....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'; 
 header("location:view-os.php");
 }
 


?>


