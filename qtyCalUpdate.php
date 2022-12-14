<?php  
include("./includes/connect.php");

if(isset($_POST['pid'])){
    
    $pprice=$_POST['pprice'];
    $pid=$_POST['pid'];
    $qty=$_POST['qty'];
    $tprice=$qty*$pprice;
    

    $update="UPDATE cart_details SET quantity = '$qty', total_price = '$tprice' WHERE product_id = '$pid' ";
    $data  =mysqli_query ($con,$update);
    if($data){
        echo "success";
    }else{
        echo "out";
    }
    
}

?>