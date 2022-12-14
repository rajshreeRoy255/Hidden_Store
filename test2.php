<?php
include("./includes/connect.php");
include('./functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <!-- boostrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css file -->
    <link rel="stylesheet" href="style.css">
    


        <!-- alertifyJS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <!-- alertifyJS -->
    <style>
      .policy{
        /* border: 2px solid grey; */
        font-size: 14px;
        /* line-height: 17px; */
        margin-top: 12px;
      }
      .stock{
        font-weight: bold;
      }
        #product_img{
            width: 150px;
            height: 50vh;
            /* border: 2px solid red; */
        }
        .main{
            /* border: 2px solid purple; */
            /* margin-top: 25px; */
            text-align: center;
            /* justify-content: space-between; */
            width: 100%;
            height: 80vh;
            /* box-shadow: 2px 2px 33px 4px grey ; */
            /* padding: 0px 20px; */
        }
        .small_img_sm img{
            height: 100px;
        }

        .small_img_sm{
            /* object-fit: contain; */
          
            /* width: 100%; */
            height: 110px;
            /* height: 100%; */
            padding: 2px;
            cursor: pointer;
            /* margin: 1px; */
        }
        .smallImg{
            /* border: 2px solid black; */
            /* margin-top: 30px; */
            height: 100px;
            /* padding: 0px; */
            margin: 10px 2px;
            
            
        }
        .main_left{
            /* border: 2px solid brown; */
            margin-left: 100px;
           
            text-align: center;
            width: 49%;
            height: 500px;
            /* margin-top: 38px; */
             box-shadow: 2px 2px 33px 4px #ecf0f1 ;
           /* height: 200px; */
            
        }
        .main_left img{
            /* border: 2px solid blue; */
            /* box-shadow: 2px 6px 33px 6px #b2bec3 ; */
            width: 100%;

        }
        .small_img_sm img{
          box-shadow: 2px 6px 33px 6px #b2bec3 ;
        }
        .main_right{
            /* border: 2px solid red; */
            text-align: left;
            margin-left: 5px;
            padding: 48px 50px;
            width: 460px;
            padding: 2px;
            /* line-height: 33px; */
            
        }
        .main_right h3{
            font-size: 20px;
        }
        .main_right h5{
            font-size: 17px;
        }
      
      .footer_bottom{
        position: absolute;
        bottom: 0px;
        /* border: 2px solid red; */
        width: 100%;
      }
      .tax{
        color: grey;
        font-weight: 500;
      }
      .customInputCenter{
        border: 2px solid yellowgreen;
      }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="./images/logo6.png" alt=""  width="5%"
     height="3%" class="mx-3">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-5">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li> -->


        <!--My Account if login ,if not login then register -->
        <?php  
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
        </li> ";
        }else{
          echo"<li class='nav-item'>
          <a class='nav-link' href='./users_area/profile.php'>My Account</a>
        </li> ";
        }
        
        ?>
        <!-- php code end here-->


        
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="carttest3.php"><i class="fa-solid fa-cart-shopping"></i><sup><span class="badge text-bg-danger custom_red_span"><?php cart_item_count() ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price2()?>/-</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- calling cart function -->
<?php

cart();

?>



<!-- second child -->
<nav class="navbar navbar-dark navbar-expand-lg bg-secondary">
    <ul class="navbar-nav me-auto">
    

     <!--chech if user is login username exist -->
     <?php  
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link text-light' href='./users_area/user_login.php'>Welcome Guest</a>
        </li> ";
        }else{
          echo"<li class='nav-item'>
          <a class='nav-link text-light' href='./users_area/logout.php'>Welcome ".$_SESSION['username']."</a>
        </li> ";
        }
        
        ?>
        <!-- php code end for login username -->

    
        <!-- php code -->
<?php  
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link text-light' href='./users_area/user_login.php'>Login</a>
        </li> ";
        }else{
          echo"<li class='nav-item'>
          <a class='nav-link text-light' href='./users_area/logout.php'>logout</a>
        </li> ";
        }
        ?>

    </ul>
</nav>
<!-- fetching from database -->
<?php 

// view details function

      if (isset($_GET['product_id'])){
  
      
      // condition to check isset or not
      if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
  
     $product_id = $_GET['product_id'];
      $select_query = "SELECT * FROM products WHERE product_id = '$product_id '" ; 
      $result = mysqli_query($con,$select_query);
      // $row = mysqli_fetch_assoc($res);
      // echo $row['product_title'];
      while( $row = mysqli_fetch_array($result)){
        $product_id=  $row['product_id'];
        $product_title=  $row['product_title'];
        $product_description = $row['product_decription'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_image4 = $row['product_image4'];
        $product_categories = $row['category_id'];
        $product_brands = $row['brand_id'];
        $product_price = number_format(($row['product_price']),2);
        // echo $product_title;
                 }
             }    
          } 
        } ?>
<!-- fetching from database -->

<!-- third child -->
<!-- <div class="bg-light">
    <h3 class="text-center"> Hidden Store </h3>
    <p class="text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque, a architecto</p>
</div> -->

<div class="container main">
    <div class="row">
    <div class="col-md-8 main_left ">
    <img src='./admin_area/product_images/<?php echo $product_image1?>' class='card-img-top' alt='...' style='width: 18rem;' id="product_img">
            <div class="row smallImg">
                <div class="col-md-3  cc small_img_sm "><img  src="./admin_area/product_images/<?php echo $product_image1?>" alt="" class="small_img"></div>
                <div class="col-md-3  cc small_img_sm "><img  src="./admin_area/product_images/<?php echo $product_image2?>" class="small_img"></div>
                <div class="col-md-3  cc small_img_sm "><img  src="./admin_area/product_images/<?php echo $product_image3?>" class="small_img"></div>
                <div class="col-md-3  cc small_img_sm "><img  src="./admin_area/product_images/<?php echo $product_image4?>" class="small_img"></div>
            </div>
    </div>

    <div class="col-md-4 main_right">
        <h3><?php echo $product_title;?></h3>
        <h3>M.R.P: ₹ <?php echo $product_price;?>/-</h3>
        <p class="tax" > Inclusive of all taxes</p>
        <h5 style="color: green;" class="stock">In Stock</h5>
        <h5>Product Details</h5>
        <p><?php echo $product_description; ?></p>
        <a href='addCart2.php?add_to_cart=<?php echo $product_id;?>' class='btn btn-info mb-4'>Add to cart</a>
  <a href='index.php' class='btn btn-secondary mb-4'>Explore More</a>
<div class="policy">
<h5>Return Policy</h5>
<ul style="list-style-type: disc;">
<li>Items are eligible for return within 7 Days of Delivery <span style="color:blue ;">(T&C Apply*)</span</li>
<li>All accessories, product & packaging need to be returned in original condition</li>
</ul>
</div>
    </div>
</div>







<!-- main container ends -->
</div>


<!-- includes footer -->
<div class="footer_bottom">
<?php include("./includes/footer.php") ?>
</div>


    </div>






  <!-- boostrap js link   -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 
  <script>
    var product_img=document.getElementById("product_img");
    var small_img=document.getElementsByClassName("small_img");
    small_img[0].onclick = function(){
        product_img.src = small_img[0].src;
    }
    small_img[1].onclick = function(){
        product_img.src = small_img[1].src;
    }
    small_img[2].onclick = function(){
        product_img.src = small_img[2].src;
    }
    small_img[3].onclick = function(){
        product_img.src = small_img[3].src;
    }
  </script>
</body>
</html>