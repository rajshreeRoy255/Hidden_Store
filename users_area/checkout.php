<?php
include("../includes/connect.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkOutPage</title>
    <!-- boostrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css file -->
    <link rel="stylesheet" href="style.css">
    <style>
      body{
        overflow-x: hidden;
      }
      .footer-bottom{
        width: 100%;
        position: absolute;
        bottom: 0%;
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
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


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
    <!-- <li class="nav-item">
          <a class="nav-link" href="./users_area/user_login.php">Login</a>
        </li>  -->
    </ul>
</nav>

<!-- third child -->
<div class="bg-light">
    <h3 class="text-center"> Hidden Store </h3>
    <p class="text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque, a architecto</p>
</div>
<!-- fourth child -->
<div class="row">
    <?php  
    if(!isset($_SESSION['username'])){
        include('user_login.php');
    }else{
        include('payment.php');
    }
    
    ?>
    <div class="col-md-10">
        <!-- all products -->
       <div class="row px-1">



       </div>
    </div>
    <div class="col-md-2 bg-secondary p-0">
     


    </div>
   
</div>

<!-- last child -->
<div class="footer-bottom">
<!-- includes footer -->

<?php include("../includes/footer.php") ?>

    </div>






  <!-- boostrap js link   -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 
</body>
</html>