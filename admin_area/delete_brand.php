<?php 
include("../includes/connect.php");
$id = $_GET['id1'];
$select = "DELETE FROM brands WHERE brand_id = '$id'";
$data = mysqli_query($con,$select);
if ($data){
    echo"<script>window.open('index.php?view_brands','_self')</script>";

}else{
    echo "unable to delete";
}?> 