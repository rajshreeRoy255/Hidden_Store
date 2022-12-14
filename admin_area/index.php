<?php
include("../includes/connect.php");
// include('../functions/common_function.php');
session_start()
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



        <!-- alertifyJS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <!-- alertifyJS -->
    <style>

.new_container{
    /* border:2px solid green; */
    width: 920px;
    text-align: center;
    margin: auto;
    margin-right: 13px;
    
}
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0 custom_main">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info sticky-top">
            <div class="container-fluid">
                <img src="../images/logo6.png" alt="" class="logo"  width="4%" height="3%">
                    <nav class="navbar navbar-expand-lg">
                        <ul class="navbar-nav">
                        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">Welcome Admin</a>
                            </li>
                            
                        </ul>
                    </nav>
            </div>
        </nav>

        <!-- third child -->
        <div class="row p-0">
        <div class="col-md-2">
        <ul class="navbar-nav bg-secondary text-center"style="height:100vh;">
        <li class="nav-item bg-dark">
          <a class="nav-link text-light mt-0" aria-current="page" href="./index.php"><h4 class="mt-0 ">Admin Dashboard</h4></a>
        </li>

        <!-- fetching image from database -->
        
     
        <!-- php code ended here -->
        <!-- <li class="nav-item ">
          <img src="../images/ice2.jpg" alt="" class="imageTag" width="200px">
        </li> -->
        <li class="nav-item  mx-2">
        <a href="./index.php" class="nav-link text-light ">Dashboard</a>
        </li>
        <li class="nav-item   mx-">
        <a href="insert_products.php" class="nav-link text-light ">Insert Products</a>
        </li><li class="nav-item mb-">
        <a href="index.php?view_product" class="nav-link text-light ">View Products</a>
        </li><li class="nav-item  mx-3">
        <a href="index.php?insert_category" class="nav-link text-light">Insert Categories</a>
        </li>
        <li class="nav-item  mx-3">
        <a href="index.php?view_categories" class="nav-link text-light">View Categories</a>
        </li>
        <li class="nav-item   mx-3">
        <a href="index.php?insert_brands" class="nav-link text-light">Insert Brands</a>
        </li>
        <li class="nav-item mb-  mx-3">
        <a href="index.php?view_brands" class="nav-link text-light">View Brands</a>
        </li>
        <!-- <li class="nav-item ">
        <a href="" class="nav-link text-light">All orders</a>
        </li> -->
        <!-- <li class="nav-item ">
        <a href="" class="nav-link text-light">All payments</a>
        </li> -->
        <li class="nav-item  ">
        <a href="index.php?all_users" class="nav-link text-light">List users</a>
        </li>
        <li class="nav-item  ">
        <a href="index.php?delivery" class="nav-link text-light">Delivery Status</a>
        </li>
        <li class="nav-item  ">
        <a href="../users_area/logout.php" class="nav-link text-light">Logout</a>
        </li>
        </ul>
         
    </div>















  <!-- code -->
  <div class="col-md-10 text-center">
    <div class="conatiner my-3 px-5 m-5">
        <?php 
        if(isset($_GET["insert_category"])){
            include'insert_category.php';
        }
        if(isset($_GET["insert_brands"])){
            include'insert_brands.php';
        }
        if(isset($_GET["delivery"])){
            include'delivery.php';
        }
        if(isset($_GET["orderID"])){
            include'changeDEli.php';
        }
        if(isset($_GET["view_product"])){
            include'view_product.php';
        }
        if(isset($_GET["view_categories"])){
            include'view_categories.php';
        }
        if(isset($_GET["view_brands"])){
            include'view_brands.php';
        }
        if(isset($_GET["all_users"])){
            include'all_users.php';
        }
        if(isset($_GET["edit_product"])){
            include'edit_product.php';
        }
        if(isset($_GET["edit_prod"])){
            include'edit_product2.php';
        }

    //   function
    if(!isset($_GET['insert_category'])){
        if(!isset($_GET['insert_brands'])){
            if(!isset($_GET['delivery'])){
                if(!isset($_GET['orderID'])){
                    if(!isset($_GET['view_product'])){
                        if(!isset($_GET['view_categories'])){
                            if(!isset($_GET['view_brands'])){
                            if(!isset($_GET['all_users'])){
                            if(!isset($_GET['edit_product'])){

                                include('./dashboard_details.php');
                            }}
                            }
                        }
                    }
                }  
                
            }
        }
    }
    //   function
        ?>
        </div>
    </div>

<!-- last child -->
<div class="bg-info p-3 text-center footer">
    <p>All right reserved &#169- Designed by Rajshree Roy</p>
</div>

<!-- row ends -->
</div>

<!-- main container ends -->

</div>


<!-- boostrap Js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


<!-- alertifyJS -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script>
    <?php if(isset($_SESSION['message'])){?>
     alertify.set('notifier','position', 'top-center');
 alertify.success('<?= $_SESSION['message']; ?>');
  </script>
  <?php
unset($_SESSION['message']);
}
?>
  <!-- alertifyJS -->
</body>
</html>