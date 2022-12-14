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
    <style>
      .footer_bottom{
        position: absolute;
        bottom: 0px;
        /* border: 2px solid red; */
        width: 100%;
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
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_count() ?></sup></a>
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

    </ul>
</nav>

<!-- third child -->
<!-- <div class="bg-light">
    <h3 class="text-center"> Hidden Store </h3>
    <p class="text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque, a architecto</p>
</div> -->
</div>
    
<!-- fourth child table -->
<div class="container">
    <div class="row">
      <form action="" method="POST">
        <table class="table table-bordered text-center">
            <!-- <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody> -->
                <!-- php code -->
                <?php


$ip = getIPAddress(); 
$total=0;
$cartTotalPrice="SELECT * FROM cart_details WHERE ip_address='$ip'";
$runtotal=mysqli_query($con,$cartTotalPrice);

// fetching if cart is empty
$r_count=mysqli_num_rows($runtotal);
if($r_count>0){

echo"<thead>
<tr>
    <th>Product Title</th>
    <th>Product Image</th>
    <th>Quantity</th>
    <th>Total Price</th>
    <th>Remove</th>
    <th colspan='2'>Operations</th>
</tr>
</thead>
<tbody>";

while( $row = mysqli_fetch_array($runtotal)){
  $product_id=$row['product_id'];
  $select_products="SELECT * FROM products WHERE product_id='$product_id' ";
  $result_product=mysqli_query($con,$select_products);
  while( $row_product_price= mysqli_fetch_array($result_product)){
  $product_price=array($row_product_price['product_price']);

  $price_table=$row_product_price['product_price'];
  $product_title=$row_product_price['product_title'];
  $product_image1=$row_product_price['product_image1'];

  $product_value=array_sum($product_price);
    $total+=$product_value;
  





                ?>
                <tr>
                    <td><?php echo $product_title;?></td>
                    <td><img src="admin_area/product_images/<?php echo $product_image1; ?>" width="100px"></td>
                    <td><input type="text" class="form-control w-50 m-auto" name="qty"></td>


                    <!-- php to update quantity -->
                      <?php                                   
                      $ip = getIPAddress(); 
                      if(isset($_POST['update_cart'])){
                        $quantities = $_POST['qty'];
                        // echo $quantities;

                        $update_cart = "UPDATE cart_details SET quantity='$quantities' WHERE ip_address='$ip' ";
                        $res=mysqli_query($con,$update_cart);
                        $total=$total*$quantities;
                      }
                      ?>

                    <td><?php echo $price_table;?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>"></td>
                        <td>
                          <!-- <button class="bg-info px-3 py-2 border-0 mx-3" >Update</button> -->
                          <input type="submit" value="Update cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                          <input type="submit" value="Removes cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                        <!-- <button  class="bg-info px-3 py-2 border-0 mx-3">Remove</button>  -->
                      </td>
                </tr>
            </tbody><?php }}
          
            
          }else{
            // including empty cart bag
            include("./emptyCart.php");
            
              }
              ?>
        </table>

        <!-- subtotal -->
        <div class="d-flex mb-3">

        <?php 
        $ip = getIPAddress();
        $cartTotalPrice="SELECT * FROM cart_details WHERE ip_address='$ip'";
        $runtotal=mysqli_query($con,$cartTotalPrice);
        
        // fetching if cart is empty
        $r_count=mysqli_num_rows($runtotal);
        if($r_count>0){
          echo"<h4 class='px-3'>
          Subtotal: <strong class='text-info'> $total/-</strong>
      </h4>
      <input type='submit' value='Continue Shopping' class='bg-info py-2 px-3 border-0 mx-3' name='continue_shopping'>
      <button class='bg-secondary text-light px-3 py-2 border-0 mx-3'><a href='./users_area/checkout.php' class='text-decoration-none text-light'>Checkout</a></button>";
        }

        //continue shopping button already includede in emptyCart.php file 

        // else{
        //   echo "<input type='submit' value='Continue Shopp' class='bg-info py-2 px-3 border-0 mx-3 text-center  m-auto customInputCenter' name='continue_shopping' style='text-align:center ;'>";
        // }

        if(isset($_POST['continue_shopping'])){
              echo"<script>window.open('index.php','_self')</script>";
        }
        
        
        ?>
        <!-- <h4 class="px-3">
            Subtotal: <strong class="text-info"><?php echo $total ?>/-</strong>
        </h4>
        <a href=""><button class="bg-info px-3 py-2 border-0 mx-3">Continue Shopping</button></a>
        <a href=""><button class="bg-secondary text-light px-3 py-2 border-0 mx-3">Checkout</button></a> -->
    </div>
</div>
</div>
</form>



<!-- function to remove items -->

<?php
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem']as $remove_id){
            echo $remove_id;
            $delete_query="DELETE FROM cart_details WHERE product_id='$remove_id'";
            $runQ=mysqli_query($con,$delete_query);
            if($runQ){
                echo"<script>window.open('cart.php','_self')</script>";
            }
        }

    }
}
echo $remove_items=remove_cart_item();
?>


<!-- last child -->

<!-- includes footer -->
<div class="footer_bottom">
<?php include("./includes/footer.php") ?>
</div>


    </div>






  <!-- boostrap js link   -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 
</body>
</html>