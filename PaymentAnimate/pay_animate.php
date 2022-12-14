<?php
include('../includes/connect.php'); 
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="wat2.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <title>continue page</title>
    <style>
        .head{
            color: #2980b9;
        }
        .center{
            border: 2px solid red;
            width: 40%;
            padding: 70px 0px;
            height: 11%;
            font-size: 25px;
            cursor: pointer;
            position: absolute;
            top: 62%;
            left: 29%;
            border-radius: 20px;
        }
        .firstParent{
            position: relative;
        }
        .t1{
            color: #2980b9;
            margin: auto;
            margin-bottom: 15px;
        }
        .information{
            margin-top: 50px;
        }
        /* .padding{
            border: 2px solid red;
            box-shadow: 2px 50px 288px 9px rgba(210,105,30,0.95) inset;
-webkit-box-shadow: 2px 50px 288px 9px rgba(210,105,30,0.95) inset;
-moz-box-shadow: 2px 50px 288px 9px rgba(210,105,30,0.95) inset;
        } */
    </style>
</head>
<body>
    <header>

        <!-- php code to access user id -->
        <?php
        $userIP=getIPAddress();
        $userUnique=$_SESSION['username'];
        $get_user="SELECT * FROM user_table WHERE user_ip='$userIP' && username='$userUnique'";
        $result=mysqli_query($con,$get_user);
        $run_query=mysqli_fetch_array($result);
        $user_id=$run_query['user_id'];


?><!-- code ended -->
        <!-- /* <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Second Container >>>>>>>>>>>>>>>>>>>>>>>> */ -->
        <div class="container">
            <div class="left animate__animated animate__jackInTheBox firstParent padding">
                <div class="information">
               <h2 class="t1 head">Price Details</h2>
               

                <h2 class="t1 "> Total Item :7</h2>
                <h2 class="t1">Delivery charset: Free Delivery</h2>
                <h2 class="t1">Total Amount : 50000/-</h2>
               <p class="t1">Press Continue to proceed</p>
               </div>
                <!-- <button class="center">CONTINUE</button> -->
                <a href="order.php?user_id=<?php echo $user_id; ?>"> <h2 class="text-center">CONTINUE</h2></a>
            </div>
            <div class="right animate__animated animate__lightSpeedInLeft animate__delay-1s">
                <img src="./images/edit.jpg" alt="">
            </div>
        </div>
        <!-- <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Socila Media Icons  >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>. -->
        <!-- <div class="s-icons animate__animated animate__lightSpeedInLeft animate__delay-2s">
            <img src="./images/icon1.png" alt="">
            <img src="./images/icon2.png" alt="">
            <img src="./images/icon3.png" alt="">
            <img src="./images/icon4.png" alt="">
        </div> -->
    </header>
</body>
</html>