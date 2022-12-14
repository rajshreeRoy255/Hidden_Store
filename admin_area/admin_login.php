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
    <title>Document</title>
        <!-- boostrap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
<div class="container-fluid my-3">
        <h2 class="text-center">Admin Login</h2>
            <div class="row d-flex align-item-center justify-content-center">
                <div class="col-lg-12 col-xl-6">
                    <form action="" method="POST">
                        <!-- user field -->
                        <div class="form-outline  mb-4">
                            <label for="user_username" class="form-label">Username</label>
                            <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="name">
                        </div>
                        <!-- password -->
                        <div class="form-outline mb-4">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="password">
                        </div>
                        <!-- button -->
                        <div class="mt-4 pt-2">
                            <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="admin_login">
                        </div>

                    </form>
                </div>
            </div>

    </div>

<?php 
if(isset($_POST['admin_login'])){
    $admin_username=$_POST['name'];
    $admin_password=$_POST['password'];

    $select="SELECT * FROM admin_table WHERE admin_name ='$admin_username' && admin_password='$admin_password'";
    $SQL=mysqli_query($con,$select);
    $nRow=mysqli_num_rows($SQL);
   
    if($nRow){
        $_SESSION['admin']=$admin_username;
        echo"<script>window.open('./index.php','_self')</script>";

        echo"<script>alert('/ad');</script>";
       
    }else{
        echo"<script>alert('Not present');</script>";
    }
}


?>



  <!-- boostrap js link   -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 
</body>
</body>
</html>
