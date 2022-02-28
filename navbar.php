<?php
// session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light">
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
                <?php
               if(! isset($_SESSION['type'])){
              echo '  <button class="btn">
                  <i class="fa fa-shopping-cart"></i>
                </button>
                <a href="signin.php" class="btn">
                  <i class="fas fa-user"></i>
                </a>
            </div> ';
               }
               else{
                 echo ' <a href="become_seller.php" type="button" class="btn btn-outline-dark">Seller</a>
                 <button class="btn">
                   <i class="fa fa-shopping-cart"></i>
                 </button>
                 <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                   <i class="fas fa-user"></i>
                 </a>';
               }
            ?>
          </div>
        </div>
      </nav>

      <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
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
          <!-- <div>
            Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
          </div> -->
          <!-- <div class="dropdown mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
              Dropdown button
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div> -->
        </div>
      </div>
</body>
</html>