
   <h3 class="text-danger mb-4">Delete Account</h3> 
   <form action="" method="POST" class="mt-5">
    <div class="form-outline mb-4">
        <input type="submit" name="delete" value="Delete Account" class="form-control w-50 m-auto">
    </div>
    <div class="form-outline mb-4">
        <input type="submit" name="dont_delete" value="Don't Delete Account" class="form-control w-50 m-auto">
    </div>
   </form>

   <?php

    $username_session=$_SESSION['username'];
    $IP_address=getIPAddress();
    if(isset($_POST['delete'])){
        $delete_Query="DELETE FROM  user_table WHERE username='$username_session' && user_ip='$IP_address'";
        $runSQL=mysqli_query($con,$delete_Query);
        // $row_count=mysqli_num_rows($runSQL);

        if($runSQL){
            echo"<script>alert('Account deleted successfully');</script>";
            echo"<script>window.open('logout.php','_self')</script>";
        }else{
            echo"<script>alert('couldn't delete your account');</script>";
            echo"<script>window.open('../index.php','_self')</script>";
        }
        
    }

   ?>