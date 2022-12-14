<?php include("./includes/connect.php");
if(isset($_GET['uniqueProID'])){
    $id = $_GET['uniqueProID'];
    $select = "DELETE FROM cart_details WHERE product_id = '$id'";
    $data = mysqli_query($con,$select);
    if ($data){
        // echo"<script>alert('Item deleted ');</script>";
        echo"<script>window.open('carttest3.php','_self')</script>";
    }else{
        // echo"<script>alert('unable to delete');</script>";
        echo"<script>window.open('carttest3.php','_self')</script>";
    }   
}
?>