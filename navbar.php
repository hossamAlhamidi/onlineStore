<?php
//session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/search.css">
    <title>Document</title>
</head>
<body>
    <!-- <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Brand</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
          
              <div class=" search mx-auto mt-2">
    <div class="wrapper   ">
      <form method="post" action="search.php">
        <input type="search" name="search" id="search"  placeholder="What are you looking for">
        <button href="search.php" id="search-btn" name="submit" type = "submit" class="btn-custome btn "><i class="fas fa-search"></i></bu>
      </form>

     <div class = "results">
    

     </div>

    </div>
     
    <div class="output text-center">


    </div>
    </div>
              <div >
             
                <button class="btn">
                  <i style="font-size:1.5rem" class="fa fa-shopping-cart"></i>
                </button>
                <a href="signin.php" class="btn">
                  <i style="font-size:1.5rem" class="fas fa-user"></i>
                </a>
            
                <?php
            //    if(isset($_SESSION['email'])){
            //     echo " <script> console.log('email')</script>";
            //      if($_SESSION["type"] == "0"){
            //       echo " <script> console.log('type 1')</script>";
            //   echo '  <button class="btn">
            //       <i class="fa fa-shopping-cart"></i>
            //     </button>
            //     <a href="signin.php" class="btn">
            //       <i class="fas fa-user"></i>
            //     </a>
            // </div> ';}
            //    }
            //    else{
            //     echo " <script> console.log('else')</script>";
            //      echo ' <a href="become_seller.php" type="button" class="btn btn-outline-dark">Seller</a>
            //      <button class="btn">
            //        <i class="fa fa-shopping-cart"></i>
            //      </button>
            //      <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            //        <i class="fas fa-user"></i>
            //      </a>';
            //    }
            ?>
          </div>
        </div>
            </div>
          
      </nav>
      <nav>
      <ul class=" nav nav-tabs mx-auto justify-content-center">
                <li class="nav-item">
                  <a class="nav-link text-white " aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">Hot Sale</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">Categories</a>
                </li>
                
              
              </ul>
      </nav> -->




      <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Brand</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
          
              <div class=" search mx-auto mt-2">
    <div class="wrapper   ">
      <form method="post" action="search.php">
        <input type="search" name="search" id="search"  placeholder="What are you looking for">
        <button href="search.php" id="search-btn" name="submit" type = "submit" class="btn-custome btn "><i class="fas fa-search"></i></bu>
      </form>

     <div class = "results">
    

     </div>

    </div>
     
    <div class="output text-center">


    </div>
    </div>
              <div class="mt-2 d-flex align-items-center" >
             <?php
              if(isset($_SESSION['name'])){
                if($_SESSION['type']==0){
                echo' <a href="become_seller.php" type="button" class="btn btn-outline-dark">Seller</a>';
                }
              }
             ?>

             <?php 
             if(!isset($_SESSION['name']) || $_SESSION['type']==0){
              echo '  <a href="cart.php" class="btn">
                  <i style="font-size:1.5rem" class=" position-relative fa fa-shopping-cart"><span id="cart-num"></span>';

                  ?>
         <script>
                $(document).ready(function(){
        var email = '<?= $_SESSION['email'] ?>';
        $("#cart-num").load("fetch_cart_number.php",function(responseTxt, statusTxt, xhr){
          console.log(responseTxt , "from navbar")
          if(statusTxt == "error")
      alert("Cart num cannot load!");
        })
      })
     
    </script>
                  <?php
                
                    echo '</i> </a> ';
             }
             else if($_SESSION['type']==1){
               echo '<a href="manage_product.php" type="button" class="btn btn-outline-dark">Manage Product</a>';
             }

                ?>

                <?php 
                if(!isset($_SESSION['name'])){
            echo '  <a href="signin.php" class="btn">
                  <i style="font-size:1.5rem" class="fas fa-user"></i>
                </a>';}
                else if($_SESSION['type'] == 0 || $_SESSION['type'] == 1){
                  echo '  <a class="btn" style="font-size:1.5rem" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                  <i class="fas fa-user"></i>
                </a>';
                }
                ?>
            
          </div>
        </div>
            </div>
          
      </nav>
      <nav>
      <ul class=" nav nav-tabs mx-auto justify-content-center">
                <li class="nav-item">
                  <a class="nav-link text-white " aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">Hot Sale</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">Categories</a>
                </li>
                
              
              </ul>
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
                  <li><a href="wishlist.php">WishList</a></li>
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
      <script src="./js/search.js"></script>
</body>
</html>