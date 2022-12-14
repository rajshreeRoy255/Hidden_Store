<?php
include("./includes/connect.php");
include('./functions/common_function.php');
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hidden Shop</title>
    <!-- boostrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css file -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="image_move.css">

    

    <!-- alertifyJS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <!-- alertifyJS -->




    <style>
      .card-img-top{
        width: 80%;
        /* object-fit: contain; */
        height: 180px;
      }
.card_bodyred{
  /* border: 2px  solid blue; */
  box-shadow:  3px 5px 10px 7px #dfe6e9;
  width: 100%;
  padding: 0;
}
.card_bodyred img{
  /* border: 2px solid red; */
  width: 100%;
  padding-top: 19px;
  margin: 0px;
  text-align: center;
  margin-left: 34px;
  margin-right: 0px;
  
}

.custom_description{
  border: 2px solid red;
  font-size: 16px;
  margin-top: 0;
}
.custom_addCart{
  border: 2px solid green;
}
.custom_price{
  border: 2px solid orange;
}
.custom_viewCart{
  border: 2px solid blue;
}

/* .letsC{
  width: 100%;
} */

    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0  ">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg bg-info sticky-top ">
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
      <form class="d-flex" role="search" action="search_product.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search for products" aria-label="Search" name="search_input_data" autocomplete="off">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_button_product">
      </form>
      <!-- <li class="nav-item">
          <a class="nav-link" href="#">Admin Login-</a>
        </li> -->
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


         <!--chech if user is login or not  -->
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
        <!-- php code end for login -->
        </ul>

<!-- code to check whether admin is login or not -->
<?php  
        if(isset($_SESSION['admin'])){
          echo "<div class='dropdown' style='margin-right:43px;'>
          <button class='btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Admin Logout
          </button>
          <ul class='dropdown-menu'>
            <li><a class='dropdown-item' href='./admin_area/index.php' style='margin-right:23px; '>Dashboard</a></li>
            <li><a class='dropdown-item' href='./users_area/logout.php' style='margin-right:23px; '>Logout</a></li>
          </ul>
        </div>";
        }else{
          echo"<div class='dropdown' style='margin-right:43px;'>
          <button class='btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Admin Login
          </button>
          <ul class='dropdown-menu'>
            <li><a class='dropdown-item' href='./admin_area/admin_login.php' style='margin-right:23px; '>Login</a></li>
          </ul>
        </div>";
        }
        
        ?>    



</nav>

<!-- third child -->
<div class="bg-light">
    <h3 class="text-center"> Hidden Store </h3>
    <p class="text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque, a architecto</p>
</div>
<!-- fourth child -->
<div class="row">
    <div class="col-md-10">
        <!-- all products -->
       <div class="row px-1">

            <!-- fetching data from database -->
                                  <?php 
                            // calling function (product)
                            getproducts();
                            // calling uniquie categories (sidenav)
                            get_unique_categories();

                            // calling uniquie brand (sidenav)
                            get_unique_brand();
                            
                            // ip address call
                            // $ip = getIPAddress();  
                            // echo 'User Real IP Address - '.$ip; 
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
  <!-- boostrap js link   -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 
<!-- last child -->

<!-- includes footer -->

<?php include("./includes/footer.php") ?>











</body>
</html>