<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();
?>
<?php
include("../inc/config.php");
if(isset($_POST['submit'])){
$name=$_POST['name'];
$info=$_POST['info'];
$source=$_POST['source'];
$destination=$_POST['destination'];

$type=$_POST['type'];
if ($type=='1') {
$price=1000;
$ty='Bag';
} else {
$price=2000;
$ty='Carton';
}

$quantity=$_POST['quantity'];

$charge=$price * $quantity;

  $ref=str_shuffle(rand(uniqid(),99999999));
  $date=date("d-m-y @ g:i A");

$fd=mysqli_query($con,"SELECT * FROM user WHERE email='".$_SESSION['email']."'");
$pv=mysqli_fetch_array($fd);
$cn=$pv['name'];
$em=$pv['email'];

$da=mysqli_query($con,"insert into goods_booking(cname,cemail,name,info,type,price,quantity,charge,payment_ref,payment_status,delivery_status,source,destination,date) values('$cn','$em','$name','$info','$ty','$price','$quantity','$charge','$ref','0','0','$source','$destination','$date')");
if ($da) {
$_SESSION['qmsg']='<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>Goods Booking was successful....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
} else {
  $_SESSION['qmsg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>Error Sending Booking....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GOODS TRANSPORTATION MANAGEMENT SYSTEM</title>

  <?php
include 'inc/header.php';
  ?>



  <div id="wrapper">
<?php
include 'inc/sidebar.php';
?>


    <div id="content-wrapper">

<div class="container-fluid col-lg-12">
  <?php
               if (!empty($_SESSION['qmsg'])) {
                      echo $_SESSION['qmsg'];
                       $_SESSION['qmsg']="";
               }
         
               ?>
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Goods Booking : ₦1000 for Carton, ₦2000 for Bag </div>
      <div class="card-body">
       <form action="#" method="post">
      
          <div class="form-group">
           <div class="form-label-group">
                  <input type="text" id="GoodsName" name="name" class="form-control" placeholder="Goods Name" required="required" autofocus="autofocus">
                  <label for="GoodsName">Goods Name</label>
                </div>
          </div>

             <div class="form-group">
           <div class="form-label-group">
                  <input type="text" id="GoodsDescription" name="info" class="form-control" placeholder="Goods Description" required="required" autofocus="autofocus">
                  <label for="GoodsDescription">Goods Description</label>
                </div>
          </div>

             <div class="form-group">

                <select name="type" class="form-control" placeholder="Goods Type" required="required" autofocus="autofocus">
                  <option value="null">------Select Goods Type------</option>
                  <option value="1">BAG</option>
                  <option value="2">CARTON</option>
                </select>
          </div>



             <div class="form-group">
           <div class="form-label-group">
                  <input type="text" id="GoodsQuantity" name="quantity" class="form-control" placeholder="Goods Quantity" required="required" autofocus="autofocus">
                  <label for="GoodsQuantity">Goods Quantity</label>
                </div>
          </div>


          <div class="form-group">

                <select  class="form-control" name="source" placeholder="source" required="required" autofocus="autofocus">
                  <option value="null">------Select Source Location------</option>
                  <option value="MAKURDI">MAKURDI</option>
                  <option value="LAGOS">LAGOS</option>
                </select>
          </div>

           <div class="form-group">

                <select  class="form-control" name="destination" placeholder="Destination" required="required" autofocus="autofocus">
                  <option value="null">------Select Destination Location------</option>
                 <option value="MAKURDI">MAKURDI</option>
                  <option value="LAGOS">LAGOS</option>
                </select>
          </div>



         
<br/>
          <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit">Book</button>
          </div>
         
        </form>
        <div class="text-center">
         
        </div>
      </div>
    </div>
  </div>

      <!-- /.container-fluid -->
<!-- Main close -->

<?php
include 'inc/footer.php';
?>