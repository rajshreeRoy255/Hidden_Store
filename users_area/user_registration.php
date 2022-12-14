<?php
include('../includes/connect.php'); 
include('../functions/common_function.php');
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
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
            <div class="row d-flex align-item-center justify-content-center">
                <div class="col-lg-12 col-xl-6">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <!-- user field -->
                        <div class="form-outline  mb-4">
                            <label for="user_username" class="form-label">Username</label>
                            <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                        </div>
                        <!-- email field -->
                        <div class="form-outline mb-4">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email">
                        </div>
                        <!-- image field -->
                        <div class="form-outline mb-4">
                            <label for="user_image" class="form-label">User Image</label>
                            <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                        </div>
                        <!-- password -->
                        <div class="form-outline mb-4">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                        </div>
                        <!-- Confirm Password -->
                        <div class="form-outline mb-4">
                            <label for="c_password" class="form-label">Confirm Password</label>
                            <input type="password" id="c_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required="required" name="c_password">
                        </div>
                        <!-- address field -->
                        <div class="form-outline  mb-4">
                            <label for="user_address" class="form-label">Address</label>
                            <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address">
                        </div>
                        <!-- contact field -->
                        <div class="form-outline  mb-4">
                            <label for="user_contact" class="form-label">Contact Number</label>
                            <input type="number" id="user_contact" class="form-control" placeholder="Your Contact Number" autocomplete="off" required="required" name="user_contact">
                        </div>
                        <!-- button -->
                        <div class="mt-4 pt-2">
                            <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                            <p class="small fw-bold mt-2 pt-1 mb-0 ">Already have an account? <a href="user_login.php" class="text-danger text-decoration-none">Login</a> </p>
                        </div>

                    </form>
                </div>
            </div>

    </div>
</body>
</html>
<!-- php code................. -->
<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email =$_POST['user_email'];
    $user_password =$_POST['user_password'];
    $c_password =$_POST['c_password'];
    $user_address =$_POST['user_address'];
    $user_contact =$_POST['user_contact'];

    // image
    $user_image =$_FILES['user_image']['name'];
    $user_image_tmp =$_FILES['user_image']['tmp_name'];

    // user IP

    $ip = getIPAddress(); 
    // select query

    $selectRp="SELECT * FROM user_table WHERE username='$user_username' OR user_email='$user_email'";
    $runselect=mysqli_query($con,$selectRp);
    $numROW=mysqli_num_rows($runselect);
    if($numROW>0){
        echo"<script>alert('username or email already exist');</script>"; 
    }elseif($user_password!==$c_password){
        echo"<script>alert('Passwords do not match');</script>";
    }
    else{
    // insert Query
    move_uploaded_file($user_image_tmp,"./users_images/$user_image");
    $insert_query ="INSERT INTO user_table (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) VALUES('$user_username','$user_email','$user_password','$user_image','$ip','$user_address','$user_contact')";
    $runsql=mysqli_query($con,$insert_query);
    if($runsql){
        echo"<script>alert('Data inserted into database');</script>";
    }else{
        echo"<script>alert('Error occured');</script>";
    }
    }


    // selecting cart items

    $select_cart_item="SELECT * FROM cart_details WHERE ip_address='$ip'";
    $SQrun=mysqli_query($con,$select_cart_item);
    $numR=mysqli_num_rows($SQrun);
    if($numR>0){
        $_SESSION['username']=$user_username;
        echo"<script>alert('You have items in your cart');</script>"; 
        echo"<script>window.open('checkout.php','_self')</script>";
    }else{
        echo"<script>window.open('../index.php','_self')</script>";
    }




    
    
}



?>