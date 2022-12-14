<?php
include("../includes/connect.php");

?>




       <?php 
         $Total_product="SELECT * FROM `products`";
         $run_prod = mysqli_query($con, $Total_product);
         $t_prod = mysqli_num_rows($run_prod);
       
         $Total_categories="SELECT * FROM `categories`";
         $run_cat = mysqli_query($con, $Total_categories);
         $t_categories = mysqli_num_rows($run_cat);
       
         $Total_brands="SELECT * FROM `brands`";
         $run_brand = mysqli_query($con, $Total_brands);
         $t_brands = mysqli_num_rows($run_brand);
       
         $Total_users="SELECT * FROM `user_table`";
         $runusers = mysqli_query($con, $Total_users);
         $t_users = mysqli_num_rows($runusers);
       
       
       ?>

<div class="col-md-10 card custum_dash">
<h2 class="text-center card-header">Dasboard</h2>
<div class="container-fluid conta_Width p-0 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="container new_container card-body ">
        <div class="row ">

<div class="col-md-4 mt-4 mx-2 ">
            <div class="card border-0" style="width: 18rem;">
    <div class="card-body border border-warning rounded card-height">
    <h5 class="card-title pending">Total Product: <?php echo $t_prod;?></h5>
  </div>
</div>
</div> <div class="col-md-4 mt-4 mx-2 ">
            <div class="card border-0" style="width: 18rem;">
    <div class="card-body border border-success rounded card-height">
    <h5 class="card-title approved">Total Categories: <?php echo $t_categories;?></h5>
  </div>
</div>
</div> <div class="col-md-4 mt-4 mx-2 ">
            <div class="card border-0" style="width: 18rem;">
    <div class="card-body border border-danger rounded card-height">
    <h5 class="card-title rejected">Total Users: <?php echo $t_users;?></h5>
  </div>
</div>
</div>

<div class="col-md-4 mt-4 mx-2 ">
            <div class="card border-0" style="width: 18rem;">
    <div class="card-body border border-warning rounded card-height">
    <h5 class="card-title pending">Total Brands: <?php echo $t_brands;?></h5>
  </div>
</div>
</div> 



<!-- row end -->
        </div>
        </div>
    </div>
       </div>


