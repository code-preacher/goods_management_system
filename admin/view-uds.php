<?php 
ob_start();
session_start();
include '../inc/checklogin.php';
checkLogin();
include('../inc/config.php');
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

<!-- Main open -->
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">View Undelivered Goods</li>
        </ol>



<!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-times-circle"></i>
            ALL UNDELIVERED GOODS</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                   <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Goods Name</th>
                    <th>Goods Info</th>
                    <th>Goods Type</th>
                    <th>Goods Price (Per Bag/Carton)</th>
                    <th>Goods Quantity</th>
                    <th>Goods Charge</th>
                    <th>Payment Reference</th>
                    <th>Source Location</th>
                    <th>Destination Location</th>
                  
                   

                  </tr>
                </thead>
                
                <tbody>
<?php

 $seat=mysqli_query($con,"SELECT * FROM goods_booking where delivery_status='0' order by id desc");
 while($dy=mysqli_fetch_array($seat)){
?>
                  <tr>
                   <td><?php echo $dy['cname']; ?></td>
                        <td><?php echo $dy['cemail']; ?></td>
                    <td><?php echo $dy['name']; ?></td>
                   <td><?php echo $dy['info']; ?></td>
                   <td><?php echo $dy['type']; ?></td>
                   <td><?php echo "₦".$dy['price']; ?></td>
                   <td><?php echo $dy['quantity']; ?></td>
                   <td><?php echo "₦".$dy['charge']; ?></td>
                    <td><?php echo $dy['payment_ref']; ?></td>
                     <td><?php echo $dy['source']; ?></td>
                    <td><?php echo $dy['destination']; ?></td>
                  
                  </tr>
                <?php
}
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
<!-- Main close -->

<?php
include 'inc/footer.php';
?>