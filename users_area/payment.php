<?php
include('../includes/connect.php'); 
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- boostrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <!-- alertifyJS -->
            <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <!-- alertifyJS -->
</head>
<body>
    <!-- php code to access user id -->
    <?php
        $userIP=getIPAddress();
        $userUnique=$_SESSION['username'];
        $get_user="SELECT * FROM user_table WHERE user_ip='$userIP' && username='$userUnique'";
        $result=mysqli_query($con,$get_user);
        $run_query=mysqli_fetch_array($result);
        $user_id=$run_query['user_id'];


?><!-- code ended -->
    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-md-6">
            <a href="https://www.paypal.com" target="_blank"><img src="../images/pay2.jpg" class="rounded"alt="" width="80%"></a>
            </div>
            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id; ?>"> <h2 class="text-center">Payment Mode</h2></a>
            </div>
        </div>

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