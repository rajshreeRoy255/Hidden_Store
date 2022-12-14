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
    <title>Ecommerce Website Using Php And Mysql.</title>
    <!-- boostrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css file -->
    <link rel="stylesheet" href="style.css">
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
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_count() ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price()?>/-</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_input_data">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_button_product">
      </form>
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
          <a class='nav-link' href='./users_area/user_login.php'>Welcome Guest</a>
        </li> ";
        }else{
          echo"<li class='nav-item'>
          <a class='nav-link' href='./users_area/logout.php'>Welcome ".$_SESSION['username']."</a>
        </li> ";
        }
        
        ?>
        <!-- php code end for login username -->

    
<!-- php code -->
<?php  
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_login.php'>Login</a>
        </li> ";
        }else{
          echo"<li class='nav-item'>
          <a class='nav-link' href='./users_area/logout.php'>logout</a>
        </li> ";
        }
        ?>
        <!-- php code -->

    </ul>
</nav>

<!-- third child -->
<!-- <div class="bg-light">
    <h3 class="text-center"> Hidden Store </h3>
    <p class="text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque, a architecto</p>
</div> -->
<!-- fourth child -->
<div class="row">
    <div class="col-md-10">
        <!-- all products -->
       <div class="row px-1">
       <!-- view more coding -->
            
                
            <!-- fetching data from database -->
                                  <?php 
                    // view details and reakted images
                    view_details_data();
               





                            // calling uniquie categories (sidenav)
                            get_unique_categories();

                            // calling uniquie brand (sidenav)
                            get_unique_brand()
                                  ?>
        
       </div>
    </div>
    <div class="col-md-2 bg-secondary p-0">
         <!-- sidenav -->

         <!-- brand to be displayed -->
         <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="" class="nav-link text-light"><h4>Delivery Brands</h4></a>
            </li>
          <?php
                // sidenav Brands function call
                getbrands()
            ?>
         </ul>
           <!-- Categories to be displayed -->
           <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="" class="nav-link text-light"><h4>categories</h4></a>
            </li>
            <?php

                // sidenav categories function call
                getcategories()

            ?>
         </ul>
    </div>
   
</div>

<!-- last child -->

<!-- includes footer -->

<?php include("./includes/footer.php") ?>

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