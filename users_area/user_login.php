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
    <title>User Registration</title>
    <!-- boostrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
            <div class="row d-flex align-item-center justify-content-center">
                <div class="col-lg-12 col-xl-6">
                    <form action="" method="POST">
                        <!-- user field -->
                        <div class="form-outline  mb-4">
                            <label for="user_username" class="form-label">Username</label>
                            <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                        </div>
                        <!-- password -->
                        <div class="form-outline mb-4">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                        </div>
                        <!-- button -->
                        <div class="mt-4 pt-2">
                            <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                            <p class="small fw-bold mt-2 pt-1 mb-0 ">Don't have an account? <a href="user_registration.php" class="text-danger text-decoration-none">Register</a> </p>
                        </div>

                    </form>
                </div>
            </div>

    </div>
</body>
</html>
<!-- .......................php code -->
<?php
error_reporting(0);
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    $select="SELECT * FROM user_table WHERE username='$user_username'";
    $SQL=mysqli_query($con,$select);
    $fetch_data=mysqli_fetch_array($SQL);
    $Confirm=$fetch_data['user_password'];
    $nRow=mysqli_num_rows($SQL);

    // cart item
    $user_IP=getIPAddress();
    $selectSQL="SELECT * FROM cart_details WHERE ip_address='$user_IP'";
    $SQL_select=mysqli_query($con,$selectSQL);
    $row_count=mysqli_num_rows($SQL_select);

    if($nRow>0){
        $_SESSION['username']=$user_username;
        if($user_password==$Confirm){
            // echo"<script>alert('Login successful');</script>";

            if($nRow==1 && $row_count==0){
            $_SESSION['username']=$user_username;
            $_SESSION['message']="Login successful";
            //  echo"<script>alert('Login successful');</script>";   
             echo"<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username']=$user_username;
                $_SESSION['message']="Login successful";
                // echo"<script>alert('Login successful');</script>";   
             echo"<script>window.open('payment.php','_self')</script>";
            }
        }else{
            echo"<script>alert('Invalid credential');</script>";
        }
}else{
    echo"<script>alert('Invalid credential');</script>";
}
}

?>
