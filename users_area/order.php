<?php
include('../includes/connect.php'); 
include('../functions/common_function.php');
session_start();
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}

// getting total items and total price of all items
$get_IP_address=getIPAddress();
$total_price=0;
$cart_query="SELECT * FROM cart_details WHERE ip_address='$get_IP_address'";
$result_cart_price=mysqli_query($con,$cart_query);
$invoice_number=mt_rand();

$status="pending";
$count=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];

    // selecting query from products table
    $cart_product="SELECT * FROM products WHERE product_id='$product_id'";
    $run_price=mysqli_query($con,$cart_product);
    $counT=mysqli_num_rows($run_price);
    while($row_prd_price=mysqli_fetch_array($run_price)){
        $product_price=array($row_prd_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
        
    }
}
// try
$ip = getIPAddress(); 
$output=0;
$cartTotalPrice="SELECT SUM(total_price) AS totalALL FROM cart_details WHERE ip_address='$ip'";
$resSUM=mysqli_query($con,$cartTotalPrice);
while( $row_product_price= mysqli_fetch_array($resSUM)){
  $output=$row_product_price['totalALL'];
}

    $subtotal=$output;

    // cart fetch and inserted into order items table
    $sqlCart="SELECT * FROM `cart_details`";
    $data = mysqli_query($con, $sqlCart);
    $result = mysqli_num_rows($data);
    if ($result) {
        while ($row = mysqli_fetch_array($data)) { 
            $product_id=$row['product_id'];
            $qty=$row['quantity'];
            $product_price=$row['product_price'];
            $total_price=$row['total_price'];
            
            $insert_item_query="INSERT INTO `order_items`(`invoice_number`, `product_id`, `qty`, `price`,`total_price`) VALUES ('$invoice_number','$product_id','$qty','$product_price','$total_price')";
            $run=mysqli_query($con,$insert_item_query);
            // if($run){
            //     echo"<script>alert('data inserted into item table');</script>";
            // }
        }
        
    }
    // cart fetch

// insert orders
$insert_orders="INSERT INTO user_orders (user_id,amount_due,invoice_number,total_products,order_date,order_status)VALUES('$user_id','$subtotal','$invoice_number','$count',NOW(),'$status')";
$result_query=mysqli_query($con,$insert_orders);
if($result_query){
    $_SESSION['message']="Your Orders are submitted successfully. Kindly proceed to payment option";
    // echo"<script>alert('orders are submitted successfully');</script>";
    echo"<script>window.open('profile.php','_self')</script>";
}

// insert pending orders
$insert_pending_orders="INSERT INTO orders_pending (user_id,invoice_number,product_id,quantity,order_status)VALUES('$user_id','$invoice_number','$product_id','$quantity','$status')";
$result_pending_order=mysqli_query($con,$insert_pending_orders);


// delete items from cart
$empty_cart="DELETE FROM cart_details WHERE ip_address='$get_IP_address'";
$reS=mysqli_query($con,$empty_cart);

?>