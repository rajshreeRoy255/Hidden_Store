<?php
 if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select="SELECT * FROM user_table WHERE username='$user_session_name'";
    $run=mysqli_query($con,$select);
    $row_fetch=mysqli_fetch_array($run);
    $user_id=$row_fetch['user_id'];
    $username=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];

    $user_image=$row_fetch['user_image'];
 }
    // updating data
    if(isset($_POST['user_update'])){
        $update_id=$user_id;

    $userNAME=$_POST['user_username'];
    $user_EMAIL=$_POST['user_email'];
    $user_ADDRESS=$_POST['user_address'];
    $user_MOBILE=$_POST['user_mobile'];

    $user_IMAGE=$_FILES['user_image']['name'];
    $destination ="users_images/".$user_IMAGE;
    $user_IMAGE_Temp=$_FILES['user_image']['tmp_name'];

    move_uploaded_file($user_IMAGE_Temp,$destination);

    // move_uploaded_file($user_IMAGE_Temp,"./users_images/$user_IMAGE");

    // update_query
    if($user_IMAGE){
        $update="UPDATE user_table SET username='$userNAME',user_email='$user_EMAIL',user_image='$user_IMAGE',user_address='$user_ADDRESS',user_mobile='$user_MOBILE' WHERE user_id='$update_id'";
        $run_query_update=mysqli_query($con,$update);  
    }else{
      $update="UPDATE user_table SET username='$userNAME',user_email='$user_EMAIL',user_address='$user_ADDRESS',user_mobile='$user_MOBILE' WHERE user_id='$update_id'";  
      $run_query_update=mysqli_query($con,$update);
    }
    $_SESSION['username']=$userNAME;

    // $update="UPDATE user_table SET username='$userNAME',user_email='$user_EMAIL',user_image='$user_IMAGE',user_address='$user_ADDRESS',user_mobile='$user_MOBILE' WHERE user_id='$update_id'";

    // $run_query_update=mysqli_query($con,$update);

    if($run_query_update){
        echo"<script>alert('data updated');</script>";
        echo"<script>window.open('profile.php?edit_account','_self')</script>";
    }else{
        echo"<script>alert('not updated');</script>";
     echo"<script>window.open('logout.php')</script>";
    }
        
    }
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>



    
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_username" value="<?php echo $username; ?>" >
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" name="user_email"  value="<?php  echo $user_email; ?>">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user_image">
            <img src="./users_images/<?php echo $user_IMG; ?>" alt="" class='imageTag'>
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_address"  value="<?php  echo $user_address; ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="number" class="form-control w-50 m-auto" name="user_mobile"  value="<?php echo $user_mobile;  ?>">
        </div>
        <input type="submit" class="btn bg-info" name="user_update"  value="Update">
    </form>
</body>
</html>