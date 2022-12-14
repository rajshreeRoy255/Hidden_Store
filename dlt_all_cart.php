<?php include ("./includes/connect.php");

$select = "DELETE FROM `cart_details`";
$data = mysqli_query($con,$select);
if ($data){
    echo"<script>window.open('carttest3.php','_self')</script>";
}else{
    echo "unable to delete";
}?>