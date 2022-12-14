<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>orders</title>
    <style>
        i{
            font-size: 13px;
        }
        .custom_tick_color{
            color: #2ecc71;
            font-size: 20px;
            font-weight: bold;
        }
        .red_wrong{
            font-size: 22px;
            color: red;
        }
        .custom_thumbUp_color{
            color: #2ecc71;
            font-size: 18px;
            font-weight: bold;
        }.Custom_complete{
            color: #2ecc71;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <?php
$userSession=$_SESSION['username'];
$get_user="SELECT * FROM user_table WHERE username='$userSession'";
$user_run=mysqli_query($con,$get_user);
$row_fetch=mysqli_fetch_array($user_run);
$user_id=$row_fetch['user_id'];
// echo $user_id;

?>
<h3 class="text-success">All my orders</h3>
<table class="table-bordered mt-5 text-center w-100 m-auto">
    <thead class="bg-dark text-light">
    <tr>
        <!-- trying  -->
        <?php 
        $fetch_data="SELECT * FROM user_orders WHERE user_id='$user_id'";
        $runQuary=mysqli_query($con,$fetch_data);
        $resulT=mysqli_num_rows($runQuary);
        if($resulT==0){
            echo"<h2 class='text-center text-danger mt-5 '>You've not ordered anything yet :( </h2>
            <center><a href='../index.php'class='text-decoration-none text-dark'>Explore products</a></center>";
        }else{
            echo "<th>Sl no</th>
            <th>Amount Due</th>
            <th>Total products</th>
            <th>Invoice Number</th>
            <th>Date</th>
            <th>Complete/Incomplete</th>
            <th>View Order Details</th>
            <th>Payment Satus</th>
        </tr>";
        }
        
        ?><!-- code ended -->

        <!-- <th>Sl no</th>
        <th>Amount Due</th>
        <th>Total products</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Satus</th>
    </tr> -->

    <!-- code ended -->
    </thead>
    <tbody class="bg-secondary text-light">
        <!-- code to fetch order details from user_orders table -->
        <?php 
        $fetch_orders="SELECT user_orders.amount_due,user_payment.delivery_status,user_orders.order_status,user_orders.total_products,user_orders.invoice_number,user_orders.order_date,user_orders.order_id FROM user_orders LEFT JOIN user_payment ON user_orders.order_id=user_payment.order_id  WHERE user_id='$user_id'";
        $runQ=mysqli_query($con,$fetch_orders);
        $number=1;
        while($result=mysqli_fetch_array($runQ)){
            // echo $result['invoice_number']."<br>";
            $oid=$result['order_id'];
            $amount_due=$result['amount_due'];
            $invoice_number=$result['invoice_number'];
            $total_products=$result['total_products'];
            $order_date=$result['order_date'];
            $order_status=$result['order_status'];
            $delivery_status=$result['delivery_status'];
            $redirect="confirm_payment.php?order_id=$oid";
            if($order_status=='pending'){
                $order_status='Incomplete';
                $s_status='Pending';
                
                
            }elseif(($order_status=='Complete') && ($delivery_status=='Cancelled')){
                $order_status='<span style="color:red ;">Cancelled</span>';
                $s_status='<i class="fa fa-times red_wrong"></i>';
                $redirect='profile.php?my_orders';
              
            }
            else{
                $order_status='<span class="Custom_complete">Complete</span> <i class="fa fa-thumbs-up custom_thumbUp_color"></i>';
                $s_status='<i class="fa fa-check custom_tick_color" ></i>';
               $redirect='profile.php?my_orders';
            }
            $Formatted_amnt=number_format($amount_due,2);
            
            echo "<tr>
            <td>$number</td>
            <td><i class='fa fa-inr'>&nbsp;&nbsp;</i>$Formatted_amnt/-</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href= 'profile.php?invoiceNum=$invoice_number'class='text-light text-decoration-none'>view</a></td>"
            ;?><?php
            

            // ****** *******   ****       if paid then can't redirect to confirm payment page again    ***       *****     *****
            if($order_status =='pending'){
                echo "<td><a href='confirm_payment.php?order_id=$oid' class='text-light text-decoration-none'>$s_status</a></td>
                </tr>";
            }else{
                echo "<td><a href= $redirect class='text-light text-decoration-none'>$s_status</a></td>
                </tr>";
            }
            
           
            
            $number++;
            
        
        
        }
        
        ?>
        <!-- <tr
        ><td>qqq</td>
        <td>1000</td>
        <td>1000</td>
        <td>1000</td>
        <td>1000</td>
        <td>1000</td>
        <td>1000</td>
        </tr> -->
        
    </tbody>
</table>
</body>
</html>