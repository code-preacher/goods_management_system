<?php 
ob_start();
session_start();
include '../inc/checklogin.php';
checkLogin();
$id=$_GET['id'];
?>

<?php
include '../inc/config.php';
$j=mysqli_query($con,"delete from software where id='$id'");
 if ($j) {
  $_SESSION['lmsg']= '<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>Software was successfully deleted....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
 header("location:view-s.php");
 } else {
  $_SESSION['lmsg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>Software was not successfully deleted....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'; 
 header("location:view-s.php");
 }
 


?>


