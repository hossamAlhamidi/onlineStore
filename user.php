<?php
  	session_start();

    if (!isset($_SESSION['name']))
        header("LOCATION: signin.php");
    else if ($_SESSION["type"] == 1)
        header("LOCATION: seller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2534293444.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/search.css">
    <title>store</title>
</head>
<body>
  <?php //include('navbar.php')  ?> 

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
    <div >
                <a href="become_seller.php" type="button" class="btn btn-outline-dark">Seller</a>
                <button class="btn">
                  <i class="fa fa-shopping-cart"></i>
                </button>
                <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                  <i class="fas fa-user"></i>
                </a>
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
                <a href="become_seller.php" type="button" class="btn btn-outline-dark">Seller</a>
                <button class="btn">
                  <i class="fa fa-shopping-cart"></i>
                </button>
                <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                  <i class="fas fa-user"></i>
                </a>
            </div>
          </div>
        </div>
      </nav> -->

      <!-- sidebar -->

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
         
        </div>
      </div>

      <header>
      <h1>Pay Less Earn More</h1>
      </header>

      <section class="shopping ">

        <div class="container p-5">
          <h5 class="title">Categories</h5>
          <div class="horizontal-scroll position-relative">
            <button  data="new" type="button" class="btn btn-scroll-left" ><i class="fas fa-chevron-left"></i></button>
            <button  data="new" type="button"  class="btn btn-scroll-right"><i class="fas fa-chevron-right"></i></button>
            <div class="products new mb-5 story-container">

          </div>
        </div>

        <!-- <h5 class="title">Popular</h5>
        <div class="horizontal-scroll position-relative">
          <button  data="popular" type="button" class="btn btn-scroll-left" ><i class="fas fa-chevron-left"></i></button>
          <button  data="popular" type="button"  class=" btn btn-scroll-right"><i class="fas fa-chevron-right"></i></button>
          <div class="products popular mb-5 story-container">

        </div>
      </div> -->
      </div>

      <?php 

include 'config.php';

$sql = "select * from product ";
$result = mysqli_query($conn, $sql);
echo ' <div class="container px-5">
<h5 class="title">New in</h5>
<div class="horizontal-scroll position-relative">
<button  data="top" type="button"-lg class="btn btn-scroll-left" ><i class="fas fa-chevron-left"></i></button>
<button  data="top" type="button"  class=" btn btn-scroll-right"><i class="fas fa-chevron-right"></i></button>
<div class="products top mb-5 story-container">

';
while($row = mysqli_fetch_array($result))
{

// echo '<div class=" item  p-3" id="' . $row['id']. '"' . '  > 

// <div class=" text-center item-img">'; 
// echo '<img class="rounded-start" src="'. $row['photo'] .'">';
// echo '<h6 class="price mt-3">'. $row['price'] . '$</h6>
// </div>
// </div>';

echo '  <div class=" card item  mx-1  style="""  >'.
'<div class="img-height"> <img class="card-img-top img-fluid" src="' . $row['photo'] . '"/></div> ' .
' <div class="card-body">
<h5 class="card-title">'. $row["name"].'</h5>

<p class="card-text description ">'. $row["description"].'</p>


</div>
<h5 class="price">'. $row["price"].'sr</h5>
<a href="#? id='.$row["id"].'" class="btn btn-outline-primary  w-50 mx-auto my-3"> ADD TO CART</a>
</div>';
}

echo ' </div>
</div>
</div>
</div>';


mysqli_close($conn);

?>
      </section>

    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
 <script src="./js/products.js"></script>
 <script src="./js/search.js"></script>
</body>
</html>