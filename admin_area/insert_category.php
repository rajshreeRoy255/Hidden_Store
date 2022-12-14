<?php
include("../includes/connect.php");
@session_start();
if(isset($_POST["insert_cat"])){
  $category_title= $_POST['cat_title'];
  // select data to check duplicacy
  // $select_query = "select * from 'categories' where category_title = '$category_title'";
  $select_query = "SELECT * FROM categories WHERE category_title = '$category_title'";
  $data_select  =mysqli_query ($con,$select_query);
  $number= mysqli_num_rows($data_select);
  if ($number>0){
    // echo"<script>alert('This category is already present inside the database'); </script>";
    $_SESSION['message']="This category is already present inside the database";
    echo"<script>window.open('index.php?view_categories','_self')</script>";
  }else{

  $insert_query= "INSERT INTO categories (category_title) VALUES ('$category_title')";

  $data  =mysqli_query ($con,$insert_query);
  if($data)
  // echo"<script>alert('Category has been inserted successfully'); </script>";
  $_SESSION['message']="Category has been inserted successfully";
  echo"<script>window.open('index.php?view_categories','_self')</script>";
}
}

?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
<div class="input-group  w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" placeholder="Insert Categories" name="cat_title" aria-label="Categories" aria-describedby="basic-addon1">
</div>
<div class="input-group  w-10 mb-2 m-auto">
  
  <input type="submit" class="border-0 p-2 my-2 bg-info" value = "Insert categories"name="insert_cat">
  <!-- <button class="bg-info p-3 border-0 my-3">Insert Categories</button> -->
</div>
</form>