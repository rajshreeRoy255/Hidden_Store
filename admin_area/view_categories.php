<?php
include("../includes/connect.php");
@session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- boostrap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


            <!-- alertifyJS -->
            <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <!-- alertifyJS -->
</head>
<body>
<div class="container-fluid p-0">
    <h2>All Categories</h2>
<table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Category Title</th>
                <th colspan="2">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php 
            $select= "SELECT * FROM categories";
            $data = mysqli_query($con, $select);
            $result = mysqli_num_rows($data);
            if ($result) {
                while ($row = mysqli_fetch_array($data)) {

                    $category_title=$row['category_title'];
                    $category_id=$row['category_id'];
            ?>
            <tr>
                <td><?php echo $category_title; ?></td>
                <td><a href="update_category.php?id1=<?php echo $category_id ?>" class="btn btn-success btn-sm">Edit</a></td>
                
                <td><a onclick="return confirm ('Are you sure you want to delete?')"
                 href="category_delete.php?id1=<?php echo $category_id ?>"  class="btn btn-danger btn-sm">Remove</a></td>
            </tr>
            <?php  }}?>
        </tbody>
    </table>
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