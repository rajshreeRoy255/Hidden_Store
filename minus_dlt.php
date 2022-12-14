<?php  
include("./includes/connect.php");

if(isset($_POST['pid'])){
     $pid=$_POST['pid'];
$select = "DELETE FROM `cart_details` WHERE product_id = '$pid'";
$data = mysqli_query($con,$select);
if ($data){
    echo"<script>window.open('carttest3.php','_self')</script>";
}
  
    
}

?>