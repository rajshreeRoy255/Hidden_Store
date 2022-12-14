<?php
include("../includes/connect.php");

// UPDATE `user_payment` SET `payment_id`='[value-1]',`order_id`='[value-2]',`invoice_number`='[value-3]',`amount`='[value-4]',`payment_mode`='[value-5]',`delivery_status`='[value-6]',`date`='[value-7]' WHERE 1

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- boostrap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<?php if(isset($_GET['orderID'])){
    $order_id=$_GET['orderID'];

    if(isset($_POST['changeStatus'])){
        $updatetatus = $_POST['updateST'];
       
        $query= "UPDATE `user_payment` SET `delivery_status` = '$updatetatus' WHERE order_id = '$order_id' ";
        $data  =mysqli_query ($con,$query);
        if($data){
            $_SESSION['message']="delivery upadted";
        //    echo"<script>alert('delivery upadted');</script>";
             echo"<script>window.open('index.php?delivery','_self')</script>";
        }
          
       }

    $deli="SELECT * FROM `user_payment`";
        $data = mysqli_query($con, $deli);
        $result = mysqli_num_rows($data);

            if ($result) {
                while ($row = mysqli_fetch_array($data)) {
                    $order_Id=$row['order_id'];
                    $amount=$row['amount'];
                    $delivery_status=$row['delivery_status'];}?>
<div class="change mt-5">
<div class="form-outline mb-4 w-50 m-auto">
<form action="" method ="POST">
    <label for="" class="fw-bold mb-3">Delivery Status</label>
        <select name="updateST" class="form-select text-center my-2" id="">
        <option value="Dispatched">Dispatched</option>
        <option value="Out Of Delivery">Out Of Delivery</option>
        <option value="Cancelled">Cancelled</option>
        <option value="Delivered">Delivered</option>
            <!-- <input type="submit" value="Update Status" name="update_btn" > -->
        </select>
    </div>

    <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="changeStatus" class="btn btn-info mb-3 px-3 fw-bold" value="Update Delivery">
                </div>
        </form>
</div>
                <?php }} ?>

                <!-- boostrap Js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>