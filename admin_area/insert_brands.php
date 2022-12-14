<?php
include("../includes/connect.php");

if(isset($_POST["insert_brand"])){
  $brand_title= $_POST['brand_title'];
  // select data to check duplicacy
  // $select_query = "select * from 'categories' where category_title = '$category_title'";
  $select_query = "SELECT * FROM brands WHERE brand_title = '$brand_title'";
  $data_select  =mysqli_query ($con,$select_query);
  $number= mysqli_num_rows($data_select);
  if ($number>0){
    echo"<script>alert('This brand is already present inside the database'); </script>";
  }else{

  $insert_query= "INSERT INTO brands (brand_title) VALUES ('$brand_title')";

  $data  =mysqli_query ($con,$insert_query);
  if($data)
  $_SESSION['message']="Brand has been inserted successfully";
  echo"<script>window.open('index.php?view_brands','_self')</script>";
  // echo"<script>alert('Brand has been inserted successfully'); </script>";
}
}

?>
<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
<div class="input-group  w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" placeholder="Insert brands" name="brand_title" aria-label="brands" aria-describedby="basic-addon1">
</div>
<div class="input-group  w-10 mb-2 m-auto">
  
  <input type="submit" class="border-0 p-2 my-2 bg-info" value = "Insert brands"name="insert_brand">
  <!-- <button class="bg-info p-3 border-0 my-3">Insert Brands</button> -->
</div>
</form>