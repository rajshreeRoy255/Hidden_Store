<?php
include("../includes/connect.php");
session_start();

if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];


    // fetching amount and invoice feom user order table
    $select="SELECT * FROM user_orders WHERE order_id='$order_id'";
    $runSQL=mysqli_query($con,$select);
    $row_fetch=mysqli_fetch_array($runSQL);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];

}

if(isset($_POST['confirm'])){
    $invoice_number=$_POST['invoice_number'];
    $amount_due=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];

    $default_delivery_status="Under Process";
    // echo $amount_due;
    // inserting into user_payment table

    $sql="INSERT INTO user_payment (order_id,invoice_number,amount,payment_mode,delivery_status,date) VALUES('$order_id','$invoice_number','$amount_due','$payment_mode','$default_delivery_status',NOW())";
    $sql_run=mysqli_query($con,$sql);
    if($sql_run){
        $_SESSION['message']="Successfully completed the payment";
        // echo"<script>alert('Successfully completed the payment');</script>";
        echo"<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_query="UPDATE user_orders SET order_status='Complete' WHERE order_id='$order_id'";
    $sql_update=mysqli_query($con,$update_query);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm_Payment Page</title>
    <!-- boostrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    
    <div class="container my-5">
    <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="POST">
            <div class="form-outline my-4 text-center w-50 m-auto">
            <label for=""class="text-light">Invoice Number</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo  $invoice_number; ?>" readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for=""class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo  $amount_due; ?>" readonly>
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
            <!-- <label for=""class="text-light">Payment Mode</label> -->
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option value="">Select Payment Mode</option>
                    <option value="UPI">Upi</option>
                    <option value="Net Banking">Net Banking</option>
                    <option value="Paytm">Paytm</option>
                    <option value="BHIM">BHIM</option>
                    <option value="Cash On Delivery">Cash On Delivery</option>
                </select>
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" name="confirm" value="Confirm">
            </div>

        </form>
            
            
    
    </div>
    
</body>
</html>
<?php



?>