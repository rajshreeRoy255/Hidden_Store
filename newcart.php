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
    <title>New Cart</title>
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

<div class="container">
<table class="table table-striped table-hover table-responsive mt-2 table-bordered text-center">
    <thead class="table-striped table-hover table-responsive mt-2 table-bordered text-center">
    <tr>
                        <td colspan="6">
                            <h4 class="text-center text-info m-0">Products in your cart</h4>
                            <h2 id="test"></h2>
                        </td>
                    </tr>
        <tr>
            <th>Product</th>
            <th>Product Images</th>
            <th>Prices</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th><a href="action.php?clear_all" class="badge text-bg-danger p-1 text-decoration-none" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fa fa-trash"></i>&nbsp;Clear Cart</a></th>
        </tr>
    </thead>
    <tbody>
<!-- code start -->
    <?php 
    $ip = getIPAddress(); 
// echo $ip;

$sele="SELECT cart_details.quantity,cart_details.total_price,products.product_title,products.product_image1,products.product_price,products.product_id  FROM cart_details JOIN products ON cart_details.product_id=products.product_id WHERE ip_address='::1' ";
$excute=mysqli_query($con, $sele);
$row=mysqli_num_rows($excute);
if($row>0){
while ($fetch = mysqli_fetch_array($excute)) { 
    $Quantity= $fetch['quantity'];
    $Pro_name= $fetch['product_title'];
    $product_image1= $fetch['product_image1'];
    $product_price= $fetch['product_price'];
    $product_id= $fetch['product_id'];
    $total_price= $fetch['total_price'];

    
    ?>
    <tr class="updateSelector">
    <input type="hidden" class="pid" value="<?php echo $product_id;?>">
    <input type="hidden" class="pprice" value="<?php echo $product_price;?>">
   

<td><?php echo $Pro_name?></td>
<td><img src="admin_area/product_images/<?php echo $product_image1 ?>" width="55"></td>
<td><?php echo $product_price?></td>

<td><input type="number" class="form-control itemQTY" value="<?php echo  $Quantity; ?>" style="width:75px;" min="1"></td>
<td><?php echo $total_price ?></td>
<td>delete</td>
</tr>
<?php 
 }}?>
</tbody>


</table>
    

    <!-- code ends -->

</div>
<!-- official jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- official jquery -->

      <!-- boostrap js link   -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 


  <script>
$(document).ready(function(){
    $(".itemQTY").on('change',function(){
        // alert('clicked');
        var $el=$(this).closest(".updateSelector");
            var pid=$el.find(".pid").val();
            var pprice=$el.find(".pprice").val();
            var qty=$el.find(".itemQTY").val();
            location.reload(true)
            // alert(qty);

            $.ajax({
                url:'qtyCalUpdate.php',
                method:'post',
                cache:false,
                data:{qty:qty,pid:pid,pprice:pprice},
                success:function(response){
                    // $("#test").html(response);
                }
            });
        
         
    });

});
  </script>




</body>
</html>