<?php
  	session_start();

    if (!isset($_SESSION['name']))
        header("LOCATION: signin.php");
    else if ($_SESSION["type"] == 0)
        header("LOCATION: user.php");

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
    <link rel="stylesheet" href="css/FooterStyle.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2534293444.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/sidebar.css">
    <title>store</title>
</head>
<body>

<?php include ('navbar.php') ?>
    <!-- <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Brand</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav nav nav-tabs mx-auto">
                <li class="nav-item">
                  <a class="nav-link text-white " aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">Hot Sale</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">Categories</a>
                </li>
              
              </ul>
              <div >
                <a href="manage_product.php" type="button" class="btn btn-outline-dark">Manage Product</a>
               
                <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                  <i class="fas fa-user"></i>
                </a>
            </div>
          </div>
        </div>
      </nav> -->

      <!-- sidebar -->

      <!-- <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title text-white" id="offcanvasExampleLabel">Brand</h5>
          <button type="button" class="btn-close text-reset bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body ">
            <div class="slideout-sidebar">
                <ul>
                  <li>Account</li>
                  <li>Payment</li>
                  <li>Wishlist</li>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
              </div>
         
        </div>
      </div>  -->

      <!-- <header>
      <h1>Pay Less Earn More</h1>
      </header> -->
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://i.ibb.co/tbh0st9/tamanna-rumee-lp-Gm415q9-JA-unsplash.jpg" class="d-block w-100" alt="..." style="height:70vh;">
    </div>
    <div class="carousel-item">
      <img src="https://i.ibb.co/fqyWT3d/freestocks-3-Q3ts-J01nc-unsplash.jpg" class="d-block w-100" alt="..." style="height:70vh;">
    </div>
    <div class="carousel-item">
      <img src="https://i.ibb.co/Ch8jqJw/sharan-pagadala-7-LXP4-Ba-Xvr-Y-unsplash.jpg" class="d-block w-100" alt="..." style="height:70vh;">
    </div>
  </div>
</div>

      <section class="shopping ">

        <div class="container p-5">
          <h5 class="title">New in</h5>
          <div class="horizontal-scroll position-relative">
            <button  data="new" type="button" class="btn btn-scroll-left" ><i class="fas fa-chevron-left"></i></button>
            <button  data="new" type="button"  class="btn btn-scroll-right"><i class="fas fa-chevron-right"></i></button>
            <div class="products new mb-5 story-container">

          </div>
        </div>

        <h5 class="title">Popular</h5>
        <div class="horizontal-scroll position-relative">
          <button  data="popular" type="button" class="btn btn-scroll-left" ><i class="fas fa-chevron-left"></i></button>
          <button  data="popular" type="button"  class=" btn btn-scroll-right"><i class="fas fa-chevron-right"></i></button>
          <div class="products popular mb-5 story-container">

        </div>
      </div>
      </div>


      </section>
      <?php 
   include 'Footer.php'
  ?>
    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
 <script src="./js/products.js"></script>
</body>
</html>