<?php
include("../includes/connect.php");
include('../functions/common_function.php');
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username']; ?></title>
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
        .imageTag{
           width: 80px;
           height: 90px;
           object-fit: contain;
        }
        body{
            overflow-x: hidden;
        }
        .checkImage{
          object-fit: contain;
            /* display: block; */
            /* margin: auto; */
            padding: 10px 0px;
            /* border: 2px solid red; */
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="../images/logo6.png" alt=""  width="5%"
     height="3%" class="mx-3">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-5">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../carttest3.php"><i class="fa-solid fa-cart-shopping"></i><sup><span class="badge text-bg-danger custom_red_span"><?php cart_item_count() ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price()?>/-</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="../search_product.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_input_data" autocomplete="off">
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
    <!-- <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li> -->



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


         <!--chech if user is login or not  -->
        <?php  
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='user_login.php'>Login</a>
        </li> ";
        }else{
          echo"<li class='nav-item'>
          <a class='nav-link' href='logout.php'>logout</a>
        </li> ";
        }
        
        ?>
        <!-- php code end for login -->
    </ul>
</nav>

<!-- third child -->
<!-- <div class="bg-light">
    <h3 class="text-center"> Hidden Store </h3>
    <p class="text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque, a architecto</p>
</div> -->
<!-- fourth child -->

<div class="row">
    <div class="col-md-2">
        <ul class="navbar-nav bg-secondary text-center"style="height:100vh;">
        <li class="nav-item bg-info">
          <a class="nav-link text-light" aria-current="page" href="#"><h4>Your Profile</h4></a>
        </li>

        <!-- fetching image from database -->
        <?php  
        $userName=$_SESSION['username'];
        $user_image="SELECT * FROM user_table WHERE username='$userName'";
        $result_image=mysqli_query($con,$user_image);
        $row_image=mysqli_fetch_array($result_image);
        $user_IMG=$row_image['user_image'];
        echo"<li class='nav-item mt-2 checkImage'>
        <img src='users_images/$user_IMG' alt='' class='imageTag'>
      </li>";        
        ?>
        <!-- php code ended here -->
        <!-- <li class="nav-item ">
          <img src="../images/ice2.jpg" alt="" class="imageTag" width="200px">
        </li> -->
        <li class="nav-item ">
          <a class="nav-link text-light" aria-current="page" href="profile.php">Pending Orders</a>
        </li><li class="nav-item ">
          <a class="nav-link text-light" aria-current="page" href="profile.php?edit_account">Edit Accounts</a>
        </li><li class="nav-item ">
          <a class="nav-link text-light" aria-current="page" href="profile.php?my_orders">My Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" aria-current="page" href="profile.php?delete_account">Delete Accounts</a>
        </li><li class="nav-item ">
          <a class="nav-link text-light" aria-current="page" href="logout.php">LOGOUT</a>
        </li>
        </ul>
         
    </div>
    <div class="col-md-10 text-center">
    <?php 
    get_user_order_details2(); 

    // edit account check
    if(isset($_GET['edit_account'])){
      include('edit_account.php');
    }
    if(isset($_GET['my_orders'])){
      include('user_orders2.php');
    }
    if(isset($_GET['delete_account'])){
      include('delete_account.php');
    }
    if(isset($_GET['invoiceNum'])){
      include('view_orders_detail.php');
    }
  
    // code ends
    ?>
    </div>
</div>

<!-- last child -->

<!-- includes footer -->
<div>
<?php include("../includes/footer.php") ?>

    </div>






  <!-- boostrap js link   -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 

  </div>
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