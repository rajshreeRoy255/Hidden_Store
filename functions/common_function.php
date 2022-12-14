<?php
// include("./includes/connect.php");

// getting products
function getproducts(){
    global $con;

    // condition to check isset or not
    if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){

   
    $select_query = "SELECT * FROM products ORDER BY RAND() LIMIT 0,6"; 
    $result = mysqli_query($con,$select_query);
    // $row = mysqli_fetch_assoc($res);
    // echo $row['product_title'];
    while( $row = mysqli_fetch_array($result)){
      $product_id=  $row['product_id'];
      $product_title=  $row['product_title'];
      $product_description = $row['product_decription'];
      $product_image1 = $row['product_image1'];
      $product_categories = $row['category_id'];
      $product_brands = $row['brand_id'];
      $product_price = $row['product_price'];
      // echo $product_title;
      echo "  <div class='col-md-4 mb-3   cardred'>
      <div class='card  card_bodyred'>
<img src='./admin_area/product_images/$product_image1' class='card-img-top img-fluid' alt='...' style='width: 18rem;'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text '>$product_description</p>
  <p class='card-text'>Price: $product_price/-</p>
  <a href='addCart2.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
  <a href='test2.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
</div>
</div>
</div>";
               }
           }    
        }  
    }




    // getting ALL products
    function get_All_products(){
        global $con;

    // condition to check isset or not
    if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){

   
    $select_query = "SELECT * FROM products ORDER BY RAND()"; 
    $result = mysqli_query($con,$select_query);
    // $row = mysqli_fetch_assoc($res);
    // echo $row['product_title'];
    while( $row = mysqli_fetch_array($result)){
      $product_id=  $row['product_id'];
      $product_title=  $row['product_title'];
      $product_description = $row['product_decription'];
      $product_image1 = $row['product_image1'];
      $product_categories = $row['category_id'];
      $product_brands = $row['brand_id'];
      $product_price = $row['product_price'];
      // echo $product_title;
      echo "  <div class='col-md-4 mb-3 cardred'>
      <div class='card  card_bodyred'>
<img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...' style='width: 18rem;'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>Price: $product_price/-</p>
  <a href='addCart2.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
  <a href='test2.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
</div>
</div>
</div>";
               }
           }    
        }  
    }


    // getting unique categories
    function get_unique_categories(){
        global $con;

        // condition to check isset or not
        if(isset($_GET['category'])){

        $category_id = $_GET['category'];
    
    
       
        $select_query = "SELECT * FROM products WHERE category_id = ' $category_id '"; 
        $result = mysqli_query($con,$select_query);

        // counting number of rows if available
        $row_unique_cat = mysqli_num_rows($result);
        if($row_unique_cat==0){
            echo"<h2 class ='text-center text-danger mx-5'>Sorry! No Stock for this category</h2>";
        }
        while( $row = mysqli_fetch_array($result)){
          $product_id=  $row['product_id'];
          $product_title=  $row['product_title'];
          $product_description = $row['product_decription'];
          $product_image1 = $row['product_image1'];
          $product_categories = $row['category_id'];
          $product_brands = $row['brand_id'];
          $product_price = $row['product_price'];
          // echo $product_title;
          echo "  <div class='col-md-4 mb-3 cardred'>
          <div class='card  card_bodyred'>
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...' style='width: 18rem;'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Price: $product_price/-</p>
      <a href='addCart2.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
      <a href='test2.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    </div>
    </div>
    </div>";
                   }
               }    
            }
        
    


            // // getting unique brand
    function get_unique_brand(){
        global $con;

        // condition to check isset or not
        if(isset($_GET['brand'])){

        $brand_id = $_GET['brand'];
    
    
       
        $select_query = "SELECT * FROM products WHERE brand_id = ' $brand_id '"; 
        $result_brand = mysqli_query($con,$select_query);

        // counting number of rows if available
        $row_unique_brand = mysqli_num_rows($result_brand);
        if($row_unique_brand==0){
            echo"<h2 class ='text-center text-danger mx-5'> Sorry! This brand is not available for service</h2>";
        }
        while( $row = mysqli_fetch_array($result_brand)){
          $product_id=  $row['product_id'];
          $product_title=  $row['product_title'];
          $product_description = $row['product_decription'];
          $product_image1 = $row['product_image1'];
          $product_categories = $row['category_id'];
          $product_brands = $row['brand_id'];
          $product_price = $row['product_price'];
          // echo $product_title;
          echo "  <div class='col-md-4 mb-3 cardred'>
          <div class='card  card_bodyred'>
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...' style='width: 18rem;'>
    <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Price: $product_price/-</p>
      <a href='addCart2.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
      <a href='test2.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    </div>
    </div>
    </div>";
                   }
               }    
            }


// displaying brand in sidenav
function getbrands(){
    global $con;
    $select_brands="SELECT * FROM brands";
    $result_brand =mysqli_query($con,$select_brands);

    while( $row_data= mysqli_fetch_assoc($result_brand)){
      $brand_title = $row_data['brand_title'];
      $brand_id = $row_data['brand_id'];
      echo "<li class='nav-item'>
      <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
  </li>";
      
    }

}


// displaying categories in sidenav
function getcategories(){
    global $con;
    $select_cat="SELECT * FROM categories";
    $result_cat =mysqli_query($con,$select_cat);

    while( $row= mysqli_fetch_assoc($result_cat)){
      $category_title = $row['category_title'];
      $category_id = $row['category_id'];
      echo "<li class='nav-item'>
      <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
  </li>";
      
    }
}




// searching products function
function search_product(){
    global $con;

   if (isset($_GET['search_button_product'])){
    $user_search_data_value = $_GET['search_input_data'];

   
   
    $search_query = "SELECT * FROM products WHERE product_keywords LIKE '%$user_search_data_value%'";
    $result = mysqli_query($con,$search_query);

    // counting number of rows if available
        $row_search_count = mysqli_num_rows($result);
        if($row_search_count==0){
            echo"<h2 class ='text-center text-danger mx-5'>No results match. No products found on this category </h2>";
        }
    // $row = mysqli_fetch_assoc($res);
    // echo $row['product_title'];
    while( $row = mysqli_fetch_array($result)){
      $product_id=  $row['product_id'];
      $product_title=  $row['product_title'];
      $product_description = $row['product_decription'];
      $product_image1 = $row['product_image1'];
      $product_categories = $row['category_id'];
      $product_brands = $row['brand_id'];
      $product_price = $row['product_price'];
      // echo $product_title;
      echo "  <div class='col-md-4 mb-3  cardred'>
      <div class='card  card_bodyred'>
<img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...' style='width: 18rem;'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>Price: $product_price/-</p>
  <a href='addCart2.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
  <a href='test2.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
</div>
</div>
</div>";
               
        } 
   }

}




// view details function
function view_details(){
  global $con;
    if (isset($_GET['product_id'])){

    
    // condition to check isset or not
    if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){

   $product_id = $_GET['product_id'];
    $select_query = "SELECT * FROM products WHERE product_id = '$product_id '" ; 
    $result = mysqli_query($con,$select_query);
    // $row = mysqli_fetch_assoc($res);
    // echo $row['product_title'];
    while( $row = mysqli_fetch_array($result)){
      $product_id=  $row['product_id'];
      $product_title=  $row['product_title'];
      $product_description = $row['product_decription'];
      $product_image1 = $row['product_image1'];
      $product_image2 = $row['product_image2'];
      $product_image3 = $row['product_image3'];
      $product_categories = $row['category_id'];
      $product_brands = $row['brand_id'];
      $product_price = $row['product_price'];
      // echo $product_title;
      echo "  <div class='col-md-4 mb-3 cardred'>
      <div class='card card_bodyred'>
<img src='./admin_area/product_images/$product_image1' class='card-img-top m-auto m-50' alt='...' style='width: 18rem;'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>Price: $product_price/-</p>
  <a href='addCart2.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
  <a href='index.php' class='btn btn-secondary'>Go HOME</a>
</div>
</div>
</div>

  
<div class='col-md-8'>
      <div class='row'>
        <div class='col-md-12'>
            <h4 class='text-center text-info mb-5'>Related Products</h4>
        </div>

        <div class='col-md-6'>
        <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...' style='width: 18rem;'>
        </div>

        <div class='col-md-6'>
        <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='...' style='width: 18rem;'>
        </div>
    </div>
</div>


";
               }
           }    
        } 
      } 
}


// view details 2nd
// view details function
function view_details_data(){
  global $con;
    if (isset($_GET['product_id'])){

    
    // condition to check isset or not
    if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){

   $product_id = $_GET['product_id'];
    $select_query = "SELECT * FROM products WHERE product_id = '$product_id '" ; 
    $result = mysqli_query($con,$select_query);
    // $row = mysqli_fetch_assoc($res);
    // echo $row['product_title'];
    while( $row = mysqli_fetch_array($result)){
      $product_id=  $row['product_id'];
      $product_title=  $row['product_title'];
      $product_description = $row['product_decription'];
      $product_image1 = $row['product_image1'];
      $product_image2 = $row['product_image2'];
      $product_image3 = $row['product_image3'];
      $product_categories = $row['category_id'];
      $product_brands = $row['brand_id'];
      $product_price = $row['product_price'];
      // echo $product_title;
      echo " <div class='container my-3'>
      <div class='row '>
          <div class='col-md-6 main_left '>
              <img src='./admin_area/product_images/$product_image1' alt='' width='400' id='product_img'>
              <div class='row my-2 child_left'>
                  <div class='col-md-4 c_child'> <img src='./admin_area/product_images/$product_image2' class='card-img-top cc small_img' alt='...' style='width: 18rem;'></div>
                  <div class='col-md-4 c_child'> <img src='./admin_area/product_images/$product_image2' class='card-img-top cc small_img' alt='...' style='width: 18rem;'></div>
                  <div class='col-md-4 c_child'> <img src='./admin_area/product_images/$product_image3' class='card-img-top cc small_img' alt='...' style='width: 18rem;'></div>
              </div>
          </div>
          <div class='col-md-6 main_right'>
              <p>Home/$product_title</p>
                  <h1>$product_title</h1>
                  <h4> Rupees $product_price/-</h4>
                  <h3>Product Details</h3>
                  <p>$product_description</p>
  
                  
                  <a href='addCart2.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                  <a href='index.php' class='btn btn-secondary'>Go HOME</a>
                 
          </div>
      </div>
     </div>

";
               }
           }    
        } 
      } 
}
// 

// get ip address function

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;



// cart function
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress(); 
    $get_product_id =$_GET['add_to_cart'];
    $default=1;

    // fetching product price through prouduct id

    $Sqlect="SELECT * FROM `products` WHERE product_id='$get_product_id'";
    $runQ=mysqli_query($con,$Sqlect);
    $fetch=mysqli_fetch_array($runQ);
    if($runQ){
       $p_price=$fetch['product_price'];
       $card_check="SELECT * FROM cart_details WHERE product_id='$get_product_id' and ip_address='$ip'";
       $run=mysqli_query($con,$card_check);

       $row = mysqli_num_rows($run);
       if($row>0){
        echo"<script>alert('This item is already present inside the cart');</script>";
        echo"<script>window.open('index.php','_self')</script>";
        }else{
            // echo"ok";
            $insertV="INSERT INTO cart_details (product_id,ip_address,quantity,product_price,total_price) VALUES('$get_product_id','$ip','$default','$p_price','$p_price')";
            $runQ=mysqli_query($con,$insertV);
            echo"<script>alert('item is added to cart');</script>";
            echo"<script>window.open('index.php','_self')</script>";
           
        }

       


    }

}
}

// function to get cart item NUMBER 12345

function cart_item_count(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress(); 
    
    $Sqlect="SELECT * FROM cart_details WHERE ip_address='$ip'";
    $runQ=mysqli_query($con,$Sqlect);
  
    // counting number of rows if available
    $count_cart_items = mysqli_num_rows($runQ);
   
    }else{
      global $con;
      $ip = getIPAddress(); 
      
      $Sqlect="SELECT * FROM cart_details WHERE ip_address='$ip'";
      $runQ=mysqli_query($con,$Sqlect);
    
      // counting number of rows if available
      $count_cart_items = mysqli_num_rows($runQ);
    }
  echo $count_cart_items;

}

// total price function
function total_cart_price(){
  global $con;
  $ip = getIPAddress(); 
  $total=0;
  $cartTotalPrice="SELECT * FROM cart_details WHERE ip_address='$ip'";
  $runtotal=mysqli_query($con,$cartTotalPrice);
  while( $row = mysqli_fetch_array($runtotal)){
    $product_id=$row['product_id'];
    $select_products="SELECT * FROM products WHERE product_id='$product_id' ";
    $result_product=mysqli_query($con,$select_products);
    while( $row_product_price= mysqli_fetch_array($result_product)){
    $product_price=array($row_product_price['product_price']);
    $product_value=array_sum($product_price);
      $total+=$product_value;
    }

  }
  echo $total;
}


function total_cart_price2(){
  global $con;
  $ip = getIPAddress(); 
  $output=0;
  $cartTotalPrice="SELECT SUM(total_price) AS totalALL FROM cart_details WHERE ip_address='$ip'";
  $resSUM=mysqli_query($con,$cartTotalPrice);
  while( $row_product_price= mysqli_fetch_array($resSUM)){
    $output=$row_product_price['totalALL'];
  }
  // echo $output;
  if($output>0){
    echo $output;
  }else{
    echo 0;
  }
}

function MRP(){
  global $con;
  $ip = getIPAddress(); 
  $output=0;
  $cartTotalPrice="SELECT SUM(total_price) AS totalALL FROM cart_details WHERE ip_address='$ip'";
  $resSUM=mysqli_query($con,$cartTotalPrice);
  while( $row_product_price= mysqli_fetch_array($resSUM)){
    $output=$row_product_price['totalALL'];
  }
  // echo $output;
  if($output>0){
    echo $output;
  }else{
    echo 0;
  }
}



// $Sum_query="SELECT SUM(total_price) AS totalALL FROM cart_details WHERE ip_address='$ip'";
// $resSUM=mysqli_query($con,$Sum_query);
// while( $row_product_price= mysqli_fetch_array($resSUM)){
  // $output="Total Score team"."".$row_product_price['totalALL'];
// }

















// 2
// user profile------get user order details

function get_user_order_details(){
  global $con;
  $username=$_SESSION['username'];
  // echo $username;
  $get_details="SELECT * FROM user_table WHERE username='$username'";
  $result_query=mysqli_query($con,$get_details);
  while($row=mysqli_fetch_array($result_query)){
    $user_id=$row['user_id'];
    // echo $user_id;
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
  
          $get_orders="SELECT * FROM user_orders WHERE user_id='$user_id' AND order_status='pending'";
          // $get_orders="SELECT * FROM user_orders WHERE user_id='$user_id'";
          $run=mysqli_query($con,$get_orders);
          $row_count=mysqli_num_rows($run);
          if($row_count>0){
            echo "<h3 class='text-center text-success my-5'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
            <center><a href='profile.php?my_orders'class='text-decoration-none text-dark'>Order Details</a></center>";
          }else{
            echo "<h3 class='text-center text-danger my-5'>You have zero pending orders</h3>
            <center><a href='../index.php'class='text-decoration-none text-dark'>Explore products</a></center>";
          }

        }
      }
    }
  }
}

// 

// 
function get_user_order_details2(){
  global $con;
  $username=$_SESSION['username'];
  // echo $username;
  $get_details="SELECT * FROM user_table WHERE username='$username'";
  $result_query=mysqli_query($con,$get_details);
  while($row=mysqli_fetch_array($result_query)){
    $user_id=$row['user_id'];
    // echo $user_id;
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
          if(!isset($_GET['invoiceNum'])){
  
          $get_orders="SELECT * FROM user_orders WHERE user_id='$user_id' AND order_status='pending'";
          // $get_orders="SELECT * FROM user_orders WHERE user_id='$user_id'";
          $run=mysqli_query($con,$get_orders);
          $row_count=mysqli_num_rows($run);
          if($row_count>0){
            echo "<h3 class='text-center text-danger my-5'>Click to proceed for the payment of <span class='text-danger'>$row_count</span> order
            </h3>
            <center><a href='profile.php?my_orders'class='text-decoration-none text-dark'>click here</a></center>";
          }else{
            echo "<h3 class='text-center text-danger my-5'> Pending Payment Status: ZERO</h3>
            <p>Check out our extensive range of products</p>
            
            <center><a href='../index.php'class='text-decoration-none text-dark btn btn-info btn-sm'>EXPLORE</a></center>";
          }

        }
      }
    }
  }
}
}

























?>
