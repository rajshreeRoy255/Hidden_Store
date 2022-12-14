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
                <th>Product Name</th>
                <th>Image 1</th>
                <th>Image 2</th>
                <th>Image 3</th>
                <th>Image 4</th>
                <th>Product Description</th>
                <th>Keyword</th>
                <th>Price</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $select= "SELECT * FROM products";
            $data = mysqli_query($con, $select);
            $result = mysqli_num_rows($data);
            if ($result) {
                while ($row = mysqli_fetch_array($data)) {

                    $product_id=$row['product_id'];
                    $ProName=$row['product_title'];
                    $product_image1=$row['product_image1'];
                    $product_image2=$row['product_image2'];
                    $product_image3=$row['product_image3'];
                    $product_image4=$row['product_image4'];
                    $Pro_Des=$row['product_decription'];
                    $product_keywords=$row['product_keywords'];
                    $product_price=$row['product_price'];
               
            ?>
            <tr>
                <td><?php echo $ProName; ?></td>
                <td><img src="./product_images/<?php echo $product_image1;?>" alt="" width="30px"></td>
                <td><img src="./product_images/<?php echo $product_image2;?>" alt="" width="30px"></td>
                <td><img src="./product_images/<?php echo $product_image3;?>" alt="" width="30px"></td>
                <td><img src="./product_images/<?php echo $product_image4;?>" alt="" width="30px"></td>
                <td><?php echo $Pro_Des; ?></td>
                <td><?php echo $product_keywords; ?></td>
                <td><?php echo $product_price; ?></td>
                <td><a href="edit_product2.php?edit_prod=<?php echo $product_id;  ?>" class="btn btn-success btn-sm">Edit</a></td>
                <td><a onclick="return confirm ('Are you sure you want to delete?')"
                 href="delete_product.php?id1=<?php echo $product_id ?>"  class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
            <?php  }}?>
        </tbody>
    </table>
</div>
    <!-- boostrap Js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>