
<?php 
include 'config.php';
session_start();
if (!isset($_SESSION['name']))
  header("LOCATION: signin.php");

if(time()-$_SESSION["login_time_stamp"] > (60*60*5)) {
  session_unset();
  session_destroy();
  header("Location:signin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/FooterStyle.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2534293444.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/search.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>store</title>
    <style>
        .card{
            cursor: pointer;
        }
        .card:hover{
            background-color: #f3f3f3;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php';?>
    <div class="container my-5">
      <div class="row p-2   justify-content-center ">

      <div id="profile" class="card border col-lg-3 col-5 mx-auto mx-sm-2 mb-1" style="">
       <div class="col-3 mx-auto mt-3">
           <img class="img-fluid rounded" src="https://images-na.ssl-images-amazon.com/images/G/01/x-locale/cs/help/images/gateway/self-service/account._CB660668669_.png"/>
    </div>   
  <div class="card-body text-center d-flex justify-content-around flex-column align-items-center">
    <h5 class="card-title">Your Profile</h5>
    <p class="card-text">Manage your account.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>

<div class="card border col-lg-3 col-5 mx-auto mx-sm-2 my-1" style="">
<div class="col-3 mx-auto mt-3">
           <img class="img-fluid rounded" src="https://images-na.ssl-images-amazon.com/images/G/01/x-locale/cs/help/images/gateway/self-service/order._CB660668735_.png"/>
    </div>  
  <div class="card-body text-center d-flex justify-content-around flex-column align-items-center">
    <h5 class="card-title">Your Orders</h5>
    <p class="card-text">Track or return things again.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>

<div class="card border col-lg-3 col-5 mx-auto mx-sm-2 my-1" style="">
<div class="col-3 mx-auto mt-3">
           <img class="img-fluid rounded" src="https://images-na.ssl-images-amazon.com/images/G/01/x-locale/cs/help/images/gateway/self-service/payment._CB660668735_.png"/>
    </div>  
  <div class="card-body text-center d-flex justify-content-around flex-column align-items-center">
    <h5 class="card-title">Payment</h5>
    <p class="card-text">Manage payments method.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>






        </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script>
    let profile = document.querySelector("#profile");
    profile.addEventListener("click",()=>{
        location.href = "profile.php";
    })
    </script>
</body>
</html>