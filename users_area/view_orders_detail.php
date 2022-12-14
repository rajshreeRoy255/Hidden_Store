<?php
// include("../includes/connect.php");
// session_start();
if(isset($_GET['invoiceNum'])){
   $invoiveNum=$_GET['invoiceNum'];

   $output=0;
$TotalPrice="SELECT SUM(total_price) AS totalALL FROM order_items WHERE invoice_number='$invoiveNum'";
$resSUM=mysqli_query($con,$TotalPrice);
while( $row_product_price= mysqli_fetch_array($resSUM)){
  $output=$row_product_price['totalALL'];
}

 $subtotal=$output;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>order Details</title>
</head>
<body>
  <h4>Order Details</h4>
  <table class="table table-striped table-hover ">
    <thead class='table-dark'>
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
      </tr>
    </thead>
    <tbody>
<!-- select from order item table -->
<?php 
$selectSQL="SELECT order_items.price,order_items.qty,products.product_image1,products.product_title,user_orders.order_id,user_orders.order_status FROM order_items JOIN products ON order_items.product_id=products.product_id JOIN user_orders ON order_items.invoice_number= user_orders.invoice_number WHERE order_items.invoice_number ='$invoiveNum'";
$resultRUN=mysqli_query($con,$selectSQL);
if ($resultRUN) {
  while ($row = mysqli_fetch_array($resultRUN)) {
    $order_id=$row['order_id'];
    $order_status=$row['order_status'];
    $ProductName=$row['product_title'];
    $price=$row['price'];
    $qty=$row['qty'];
    $image=$row['product_image1'];
    ?>


  
      <tr>
        <td><img src="../admin_area/product_images/<?php echo $image?>" alt="" width="30px">&nbsp;&nbsp;&nbsp;<?php echo $ProductName?></td>
        <td><?php echo $price?></td>
        <td><?php echo $qty?></td>
        </tr>
   <?php }}?>
    </tbody>
  </table>
  <div class="amount">
  <div class="row">
   <div class="col-md-6"><h5>Total Price:</h5></div>
   <div class="col-md-6 fw-bold"><i class="fa fa-inr"></i>&nbsp;&nbsp;<?php  echo number_format(($subtotal),2) ?>/-</div>

<?php if($order_status=="pending") {
echo"<div class='col-md-12'>
<a href='confirm_payment.php?order_id=$order_id' class='btn btn-info fw-bold'> Click To Pay Now</a>
</div>";
}else{
  // payment mode
  $paymentMode="SELECT * FROM `user_payment` WHERE invoice_number='$invoiveNum'";
  $data=mysqli_query($con,$paymentMode);
  $fetch_pay=mysqli_fetch_array($data);
  $payment_mode=$fetch_pay['payment_mode'];
  $delivery_status=$fetch_pay['delivery_status'];

  echo"

  <div class='col-md-12'>
     <div class='form-outline mb-4 w-50 m-auto'>
                      <label for='Product_title' class='form-label fw-bold'>
                          Payment Mode</label>
                          <input type='text' name='product_title' id='Product_title' class='form-control text-center' autocomplete='off' required='required' value='$payment_mode'>
                  </div>
     <div class='form-outline mb-4 w-50 m-auto'>
                      <label for='Product_title' class='form-label fw-bold'>
                          Status</label>
                          <input type='text' name='product_title' id='Product_title' class='form-control text-center' autocomplete='off' required='required' value='$delivery_status'>
                  </div>
     </div>
  ";
}


?>






   <!-- condition check 2 -->
   <!-- <div class="col-md-12">
   <a href="confirm_payment.php?order_id=<?php echo $order_id;?>" class="btn btn-info fw-bold"> Click To Pay Now</a>
   </div> -->
  </div>
</div>
</body>
</html>

