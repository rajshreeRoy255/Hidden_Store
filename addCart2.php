<?php 
include("./includes/connect.php");
include('./functions/common_function.php');
@session_start();
if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress(); 
    $get_product_id =$_GET['add_to_cart'];
    $default=1;

    // fetching product price through prouduct id

    $Sqlect="SELECT * FROM `products` WHERE product_id='$get_product_id'";
    $runQ=mysqli_query($con,$Sqlect);
    $fetch=mysqli_fetch_array($runQ);
    if($runQ){
       $p_price=$fetch['product_price'];
       $card_check="SELECT * FROM cart_details WHERE product_id='$get_product_id' and ip_address='$ip'";
       $run=mysqli_query($con,$card_check);

       $row = mysqli_num_rows($run);
       if($row>0){
        $_SESSION['message']="This item is already present inside the cart";
        // echo"<script>alert('');</script>";
        echo"<script>window.open('index.php','_self')</script>";
        }else{
            // echo"ok";
            $insertV="INSERT INTO cart_details (product_id,ip_address,quantity,product_price,total_price) VALUES('$get_product_id','$ip','$default','$p_price','$p_price')";
            $runQ=mysqli_query($con,$insertV);

            $_SESSION['message']="item is added to cart";
            // echo"<script>alert('item is added to cart');</script>";
            echo"<script>window.open('index.php','_self')</script>";
           
        }

       


    }

}
?>