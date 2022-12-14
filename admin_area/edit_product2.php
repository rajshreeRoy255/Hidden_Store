<?php
include("../includes/connect.php");
session_start();
if(isset($_GET['edit_prod'])){
    $product_Id=$_GET['edit_prod'];
    $select = "SELECT * FROM products WHERE product_id = '$product_Id'";
$data = mysqli_query($con,$select);
$row = mysqli_fetch_array($data);

// update product code
if(isset($_POST['update_product'])){
    $product_title = $_POST['product_title'];
    $product_decription = $_POST['product_decription'];
    $product_keywords = $_POST['product_keywords'];
    $product_price = $_POST['product_price'];

    // update query
    $query= "UPDATE products SET product_title = '$product_title', product_decription = '$product_decription', product_keywords ='$product_keywords', product_price ='$product_price' WHERE product_id = '$product_Id' ";
    $data  =mysqli_query ($con,$query);
    if($data){
        // echo"<script>alert('data updated');</script>";
        $_SESSION['message']="Product Updated Successfully";
      echo"<script>window.open('index.php?view_product','_self')</script>";
    }else{
        $_SESSION['message']="Product was unable to update";
        echo"<script>window.open('index.php?view_product','_self')</script>";
    }

}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .custom_img_box{
            /* border: 2px solid red; */
            margin-left: 0px;
            margin-top: 25px;
        }
        .custum_lab_deg label{
            font-size: 18px;
            font-weight: 500;
            
        }
        
    </style>
</head>
<body class="bg-light">
<div class="container mt-4 custum_lab_deg">
    <div class="card">
        <div class="card-header"><h2>Product Update</h2></div>
        <div class="card-body">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="">Product Title</label>
                    <input type="text" class="form-control" value="<?php echo $row['product_title'];?>" name="product_title">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Description</label>
                    <input type="text" class="form-control" value="<?php echo $row['product_decription'];?>" name="product_decription">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Keywords</label>
                    <input type="text" class="form-control" value="<?php echo $row['product_keywords'];?>" name="product_keywords">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Price</label>
                    <input type="text" class="form-control" value="<?php echo $row['product_price'];?>" name="product_price">
                </div>
                <div class="col-md-12 mb-4 m-auto text-center">
                    <input type="submit" class="form-control btn btn-success" value="Update Product" name="update_product">
                </div>

            </div>
        </form>
        </div>
    </div>
</div>







     <!-- boostrap js link   -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>