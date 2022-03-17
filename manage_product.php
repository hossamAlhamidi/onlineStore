<?php
  	session_start();

    if (!isset($_SESSION['name']))
        header("LOCATION: signin.php");
    else if ($_SESSION["type"] == 0)
        header("LOCATION: user.php");

  //   if (isset($_SESSION['username'])) {
  //     if(isset($_SESSION['type']==0))
  //         header("Location: user.php");
  //     if(isset($_SESSION['type']==1))
  //         header("Location: seller.php");
  // }

  if(isset($_GET['id'])){
    $IDPD = $_GET['id'];
    include 'config.php';
    $request  = "DELETE FROM product WHERE id ='".$IDPD."'";
    $result = mysqli_query($conn, $request);
      // header("location: manage_product.php");
    
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2534293444.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/sidebar.css">
    <title>store</title>
</head>
<body>
<?php include('navbar.php')  ?> 
    <!-- <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Brand</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav nav nav-tabs mx-auto">
                <li class="nav-item">
                  <a class="nav-link text-white " aria-current="page" href="seller.php">Home</a>
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
                  <li>Logout</li>
                </ul>
              </div>
        
        </div>
      </div> -->

      <div class="container">
      <div class="row p-2 ">
  <?php 
    include 'config.php';

    $sql = "select * from product where email ='".$_SESSION['email'] ."'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))

    {
      echo '  <div class="card text-center col-lg-3 col-6 mx-auto mx-sm-0 my-5  style="""  >'.
      ' <div class="img-height"> <img class="card-img-top img-fluid" src="' . $row['photo'] . '"/></div> ' .
      ' <div class="card-body">
      <h5 class="card-title">'. $row["name"].'</h5>
      <p class="card-text description ">'. $row["description"].'</p>
      </div>
      <div class="button">
      <a href="manage_product.php? id='.$row["id"].'" class="btn btn-danger delete ">Delete</a>
      <a href="ED.php? id='.$row["id"].'" class="btn btn-warning edit">Edit</a>
      </div>
      </div>';
 

    }

  ?>
 

</div>
<div class="d-flex">

  <a href="add_product.php" class="btn btn-outline-dark my-5 mx-auto" type="button">Add product</a>
</div>
      </div>

 

    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
 <script>
 
 </script>
</body>
</html>