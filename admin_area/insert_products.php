<?php
include("../includes/connect.php");
session_start();
if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_categories = $_POST['product_categories'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status ="true";

    // accessing images
    // $product_image1= $_FILES['product_image1']['name'];
    // $product_image2= $_FILES['product_image2']['name'];
    // $product_image3= $_FILES['product_image3']['name'];

    // accesing images temp name
    // $temp_image1 = $_FILES['product_image1']['temp_name'];
    // $temp_image2  = $_FILES['product_image2']['temp_name'];
    // $$temp_image3  = $_FILES['product_image3']['temp_name'];




    // chech not to have empty
    if($product_title=="" OR $product_description=="" OR $product_keywords=="" OR $product_categories=="" OR $product_brands=="" ){
        echo "<script>alert('fill it');</script>";
    }
    else{
                        // my check for image 1
                        $Imagename1 =$_FILES['product_image1']['name'];
                        $tmpname1 =$_FILES['product_image1']['tmp_name'];
                        // $destination1 ="images/".$Imagename1;
                        // move_uploaded_file($tmpname1,$destination1);
                        move_uploaded_file($tmpname1,"./product_images/$Imagename1");

                        // my check for image 2
                        $Imagename2 =$_FILES['product_image2']['name'];
                        $tmpname2 =$_FILES['product_image2']['tmp_name'];
                        // $destination2 ="images/".$Imagename1;
                        // move_uploaded_file($tmpname1,$destination1);
                        move_uploaded_file($tmpname2,"./product_images/$Imagename2");
                        // my check for image 3
                        $Imagename3 =$_FILES['product_image3']['name'];
                        $tmpname3 =$_FILES['product_image3']['tmp_name'];
                        move_uploaded_file($tmpname3,"./product_images/$Imagename3");

                        $Imagename4 =$_FILES['product_image4']['name'];
                        $tmpname4 =$_FILES['product_image4']['tmp_name'];
                        move_uploaded_file($tmpname4,"./product_images/$Imagename4");

                        
                        // image done

                        // insert query
                        $insert_query="INSERT INTO products (product_title,product_decription,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_image4,product_price,date,status) VALUES ('$product_title','$product_description','$product_keywords','$product_categories','$product_brands','$Imagename1','$Imagename2','$Imagename3','$Imagename4','$product_price',NOW(),$product_status)";
                        $res = mysqli_query($con,$insert_query);
                        if($res){
                            $_SESSION['message']="Product Inserted Successfully";
                            echo"<script>window.open('./index.php?view_product','_self')</script>";
                            // echo "<script>alert('Data inserted successfully');</script>";
                        }else{
                            $_SESSION['message']="Failed to insert the data";
                            echo"<script>window.open('./index.php','_self')</script>";
                            // echo "<script>alert('Failed to insert the data');</script>";
                        }

                        
                       


    //     move_uploaded_file($temp_image1,"./product_images1/$product_image1");
    //     move_uploaded_file($temp_image2,"./product_images2/$product_image2");
    //     move_uploaded_file($temp_image3,"./product_images3/$product_image3");

    //     // insert query
    //     $insert  ="INSERT INTO ";
    }



}
        


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <!-- boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div class="container">
        <h1 class="text-center mt-3">Insert Products</h1>
            <!-- form -->
            <form action="" method="POST" enctype="multipart/form-data">
                <!-- title -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="Product_title" class="form-label">
                        Product Title</label>
                        <input type="text" name="product_title" id="Product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
                </div>
                <!-- description -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="description" class="form-label">
                        Product description</label>
                        <input type="text" name="product_description" id="description" class="form-control" placeholder="Enter Product description" autocomplete="off" required="required">
                </div>
                <!-- product Keywords -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keywords" class="form-label">
                        Product Keywords</label>
                        <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required="required">
                </div>
                <!-- categories -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_categories" class="form-select" id="">
                    <option value="">Select a category</option>
                        <?php
                        $select_query= "SELECT * FROM categories";
                        $result_query = mysqli_query($con,$select_query);
                        while($row = mysqli_fetch_array($result_query)){
                            $category_title= $row['category_title'];
                            $category_id= $row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-- brands -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_brands" class="form-select" id="">
                        <option value="">Select a brands</option>
                        <?php
                        $select_query_brand= "SELECT * FROM brands";
                        $result_query_brand = mysqli_query($con,$select_query_brand);
                        while($row_b = mysqli_fetch_array($result_query_brand)){
                            $brand_title= $row_b['brand_title'];
                            $brand_id= $row_b['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                        ?>
                        <!-- <option value="">Select a brands</option>
                        <option value="">Select a brands</option>
                        <option value="">Select a brands</option>
                        <option value="">Select a brands</option> -->
                    </select>
                </div>
                <!-- Image 1 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image1" class="form-label">
                        Product Image 1</label>
                        <input type="file" name="product_image1" id="product_image1" class="form-control"required="required">
                </div>
                <!-- Image 2 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2" class="form-label">
                        Product Image 2</label>
                        <input type="file" name="product_image2" id="product_image2" class="form-control"required="required">
                </div>
                <!-- Image 3 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image3" class="form-label">
                        Product Image 3</label>
                        <input type="file" name="product_image3" id="product_image3" class="form-control"required="required">
                </div>
                <!-- Image 4 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image3" class="form-label">
                        Product Image 4</label>
                        <input type="file" name="product_image4" id="product_image4" class="form-control"required="required">
                </div>

                <!-- product Price -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">
                        Product Price</label>
                        <input type="number" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
                </div>
                
                <!--  insert button -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
                </div>
            </form>
    </div>







     <!-- boostrap js link   -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>