<?php 
include("../includes/connect.php");
session_start();
$id = $_GET['id1'];
$select = "DELETE FROM products WHERE product_id = '$id'";
$data = mysqli_query($con,$select);
if ($data){
    $_SESSION['message']="Product Deleted Successfully";
    echo"<script>window.open('index.php?view_product','_self')</script>";

}else{
    echo "unable to delete";
}?> 