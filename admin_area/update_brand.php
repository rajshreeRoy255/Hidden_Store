<?php
include("../includes/connect.php");


$id = $_GET['id1'];
$select = "SELECT * FROM brands WHERE brand_id = '$id'";
$data = mysqli_query($con,$select);
$row = mysqli_fetch_array($data);





?>

<?php 

// update category code
if(isset($_POST['update_brand'])){

    
    $brand_title = $_POST['brand_title'];


    // update query
    $query= "UPDATE brands SET brand_title = '$brand_title' WHERE brand_id = '$id' ";
    $data  =mysqli_query ($con,$query);
    if($data){
        // echo"<script>alert('Brand updated');</script>";
      echo"<script>window.open('index.php?view_brands','_self')</script>";
    }else{
        // echo"<script>alert('unable to update brand');</script>";
    }

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- boostrap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      .custom_align{
        /* border: 2px solid red; */
        /* margin-left: 305px; */
        width: 500px;
        margin: auto;
      }
    </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-5 mt-5 text-center custom_align shadow-lg p-3 mb-5 bg-body rounded">
<h2 class="text-center mb-5">Update Brand</h2>
<form action="" method="post" class="mb-2">
<div class="input-group mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" value="<?php echo $row['brand_title']; ?>" name="brand_title" aria-label="Categories" aria-describedby="basic-addon1">
</div>
<div class="input-group  w-10 mb-2 m-auto">
  
  <input type="submit" class="border-0 p-2 my-2 bg-info" value = "Update Brand"name="update_brand">
  <!-- <button class="bg-info p-3 border-0 my-3">Insert Categories</button> -->
</div>
</form>
</div>
</div>
</div></body>


  <!-- boostrap js link   -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 
</body>
</html>
