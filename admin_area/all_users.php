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
        <!-- boostrap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container-fluid p-0">
<table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Image</th>
                <th>Address</th>
                <th>Mobile Number</th>
               
            </tr>
        </thead>
        <tbody>
            <?php 
            $select= "SELECT * FROM user_table";
            $data = mysqli_query($con, $select);
            $result = mysqli_num_rows($data);
            if ($result) {
                while ($row = mysqli_fetch_array($data)) {

                    $username=$row['username'];
                    $user_password=$row['user_password'];
                    $user_email=$row['user_email'];
                    $user_image=$row['user_image'];
                    $user_address=$row['user_address'];
                    $user_mobile=$row['user_mobile'];
               
            ?>
            <tr>
                <td><?php echo $username; ?></td>
                <td><?php echo $user_email; ?></td>
                <td><?php echo $user_password; ?></td>
                <td><img src="../users_area/users_images/<?php echo $user_image;?>" alt="" width="30px"></td>
                <td><?php echo $user_address; ?></td>
                <td><?php echo $user_mobile; ?></td>
                
            </tr>
            <?php  }}?>
        </tbody>
    </table>
</div>
    <!-- boostrap Js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>