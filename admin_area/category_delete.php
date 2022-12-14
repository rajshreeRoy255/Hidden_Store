
<?php 
include("../includes/connect.php");
$id = $_GET['id1'];
$select = "DELETE FROM categories WHERE category_id = '$id'";
$data = mysqli_query($con,$select);
if ($data){
    echo"<script>window.open('index.php?view_categories','_self')</script>";

}else{
    echo "unable to delete";
}?> 