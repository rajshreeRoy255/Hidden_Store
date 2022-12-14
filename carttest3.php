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
   <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- custom css file -->
    <link rel="stylesheet" href="style.css">
    <style>
      .custom_cart{
        /* border: 2px solid green; */
        font-size: 20px;
      }
      .custom_red_span{
        /* border: 2px solid blue; */
        font-size: 8px;
        margin-left: 1px;
      }
      .customImg{
        width: 52px;
      }
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
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
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
          <a class="nav-link" href="cart2.php"><i class="fa fa-shopping-cart custom_cart" ></i><sup><span class="badge text-bg-danger custom_red_span"><?php cart_item_count() ?></sup></a>
        </li>

        <?php  
      
        ?>
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
    <table class="table table-hover table-responsive mt-2 table-bordered text-center ">
    <!-- <thead class="table-striped table-hover table-responsive mt-2 table-bordered text-center"> -->
      
                <?php


$ip = getIPAddress(); 
$sele="SELECT cart_details.quantity,cart_details.total_price,products.product_title,products.product_image1,products.product_price,products.product_id  FROM cart_details JOIN products ON cart_details.product_id=products.product_id WHERE ip_address='::1' ";
$excute=mysqli_query($con, $sele);
$row=mysqli_num_rows($excute);

$grand_total=0;
// onclick="return confirm ('Are you sure you want to delete?')"

if($row>0){

  echo"<thead >
  <tr>
                        <td colspan='6'>
                            <h4 class='text-center text-info m-0 '>Products in your cart</h4>
                            <h2 id='test'></h2>
                        </td>
                    </tr>
                    </thead>
                    <thead class='table-dark '>
                    
  <tr>
  <th>Product</th>
  <th>Product Images</th>
  <th>Prices</th>
  <th>Quantity</th>
  <th>Total Price</th>
  <th><a href='dlt_all_cart.php' class='badge text-bg-danger p-1 text-decoration-none' onclick='return confirm(`Are you sure want to clear your cart?`);'><i class='fa fa-trash'></i>&nbsp;Clear Cart</a></th>
</tr>
</thead>
<tbody>";


    while ($fetch = mysqli_fetch_array($excute)) { 
        $Quantity= $fetch['quantity'];
        $Pro_name= $fetch['product_title'];
        $product_image1= $fetch['product_image1'];
        $product_price= $fetch['product_price'];
        $product_id= $fetch['product_id'];
        $total_price= $fetch['total_price'];
  

    // 
  
    // 
    






                ?>


 

                <!--  -->
                <tr class="updateSelector">
    <input type="hidden" class="pid" value="<?php echo $product_id;?>">
    <input type="hidden" class="pprice" value="<?php echo $product_price;?>">
   

<td><?php echo $Pro_name?></td>
<td><img  class="customImg" src="admin_area/product_images/<?php echo $product_image1 ?>"></td>
<td><i class="fa fa-inr"></i>&nbsp;<?php echo number_format(($product_price),2);?></td>

         <!-- try -->
         <td><div class="input-group mb-3 focus cursor m-auto text-center " style="width:120px ; height: 6px;">
                 <button class="input-group-text updateQty" onclick="decree('inputtext<?php echo $product_id;?>')"><i class="fa fa-minus"></i></button>

                <input type="text" id="inputtext<?php echo $product_id;?>" class="form-control bg-white text-center itemQTY" value="<?php echo $Quantity; ?>" readonly >

                <button class="input-group-text updateQty" onclick="incree('inputtext<?php echo $product_id;?>')"><i class="fa fa-plus"></i></button>
                </div></td>
                                <!-- try -->
<td><i class="fa fa-inr"></i>&nbsp;<?php echo number_format(($total_price),2); ?></td>
<td><a onclick="return confirm ('Are you sure you want to delete?')"
                 href="deleteSingle_item.php?uniqueProID=<?php echo $product_id; ?>"class="text-danger text-decoration-none"><i class="fa fa-trash-o" style='font-size: 20px;'>

                 </i></a</td>
</tr>
<?php $grand_total+=$total_price;?>
                <!--  -->
            </tbody><?php }?>
          <tr>
          <td colspan="2">
          <a href="index.php" class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i> &nbsp; Continue Shopping</a>
          </td>

          <td colspan="2"><b>Grand Total</b></td>
          <td><i class="fa fa-inr">&nbsp;</i><b><?php echo number_format($grand_total,2); ?></b></td>
          <td><a href="./users_area/checkout.php" class="btn btn-primary text-white "><i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp; Checkout</a></td>

          </tr>
            
         <?php }else{
            // including empty cart bag
            include("./emptyCart.php");
            
              }
              ?>
        </table>

        <!-- subtotal -->
        <div class="d-flex mb-3">
    </div>
</div>
</div>
</form>

<!-- includes footer -->
<div class="footer_bottom">

</div>
 </div>


<!-- official jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- official jquery -->

  <!-- boostrap js link   -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 


  <script>

function decree(incdec){
  var itemval = document.getElementById(incdec);
 
    itemval.value=parseInt(itemval.value)-1;
  
}

function incree(incdec){
  var itemval = document.getElementById(incdec);
  if(itemval.value>=8){
    itemval.value=8;
    alert("We're sorry! Only 8 unit(s) allowed in each order");
    location.reload();
  }else{
    itemval.value=parseInt(itemval.value)+1;
    location.reload();
  }
  location.reload();
}
</script>
 
<script>
       $(document).ready(function(){
        $(".updateQty").on('click',function(){
            // alert("hell");
            var $el=$(this).closest(".updateSelector");
            var pid=$el.find(".pid").val();
            var pprice=$el.find(".pprice").val();
            var qty=$el.find(".itemQTY").val();
            if(qty<1){
                $.ajax({
                url:'minus_dlt.php',
                method:'post',
                cache:false,
                data:{pid:pid},
                success:function(response){
                    $("#test").html(response);
                }
            });
            }else{
                $.ajax({
                url:'qtyCalUpdate.php',
                method:'post',
                cache:false,
                data:{qty:qty,pid:pid,pprice:pprice},
                success:function(response){
                    // $("#test").html(response);
                }
            });
            }
            location.reload(true);
          
          
        });
     });
</script>
</body>
</html>