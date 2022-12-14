<?php
include("../includes/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        <!-- alertifyJS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <!-- alertifyJS -->
</head>
<body>
    <table class="table table-striped table-hover">
        <thead class='table-dark'>
            <tr>
                <th>Order Id</th>
                <th>Invoice Number</th>
                <th>Payment Mode</th>
                <th>Amount</th>
                <th>Delivery Status</th>
            </tr>
        </thead>
        <tbody>
            
    <div class="container">
        <h3>Delivery</h3>
        <?php 
        $deli="SELECT * FROM `user_payment`";
        $data = mysqli_query($con, $deli);
        $result = mysqli_num_rows($data);

            if ($result) {
                while ($row = mysqli_fetch_array($data)) {
                    $order_Id=$row['order_id'];
                    $invoice_number=$row['invoice_number'];
                    $payment_mode=$row['payment_mode'];
                    $amount=$row['amount'];
                    $delivery_status=$row['delivery_status'];?>

                <tr>
                <td><?php echo $order_Id; ?></td>
                <td><?php echo $invoice_number; ?></td>
                <td><?php echo $payment_mode; ?></td>
                <td><?php echo number_format(($amount),2); ?>/-</td>
                <td><a href="index.php?orderID=<?php echo $order_Id; ?>" class="text-decoration-none"><?php echo $delivery_status; ?></a></td>
            </tr>



<?php }
            }
        ?>

</tbody>
    </table>
    </div>

      <!-- alertifyJS -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script>
    <?php if(isset($_SESSION['message'])){?>
     alertify.set('notifier','position', 'top-center');
 alertify.success('<?= $_SESSION['message']; ?>');
  </script>
  <?php
unset($_SESSION['message']);
}
?>
  <!-- alertifyJS -->
</body>
</html>