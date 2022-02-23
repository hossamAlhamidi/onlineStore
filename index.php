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
    <title>store</title>
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
                <button class="btn">
                  <i class="fa fa-shopping-cart"></i>
                </button>
                <a href="signin.php" class="btn">
                  <i class="fas fa-user"></i>
                </a>
            </div>
          </div>
        </div>
      </nav>

      <header>
      <h1>Pay Less Earn More</h1>
      </header>

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

        <?php 

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "onlineshoppingsystem";

        $con = new mysqli($servername , $username , $password , $dbname);
        if(mysqli_connect_errno()){
        echo "failed to connect to mySQL". mysqli_connect_error();
        }

        $sql = "select * from product ";
        $rs = mysqli_query($con, $sql);
        echo ' <div class="container p-5">
        <h5 class="title">New in</h5>
        <div class="horizontal-scroll position-relative">
        <button  data="top" type="button" class="btn btn-scroll-left" ><i class="fas fa-chevron-left"></i></button>
        <button  data="top" type="button"  class=" btn btn-scroll-right"><i class="fas fa-chevron-right"></i></button>
        <div class="products top mb-5 story-container">

        ';
        while($row = mysqli_fetch_array($rs))
        {

    // echo   $row['IDProduct'] ;
    // echo  $row['ProductName'] ;
    // echo  $row['Description'] ;
    // echo  $row['photo'] ;
    echo '<div class=" item  p-3" id="' . $row['id']. '"' . '  > 

    <div class=" text-center item-img">' .
     ' <img class="rounded-start" src="data:image/jpeg;base64,'.base64_encode($row['photo']).'"/> ' .
    '  <h6 class="price mt-3">'. $row['price'] . '$</h6>
  </div>
</div>';
    // echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).'"/>';
    // echo  $row['price'] ;

    }

   echo ' </div>
   </div>
   </div>
   </div>';
    mysqli_close($con);




    ?>
      </section>

    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
 <script src="./js/products.js"></script>
</body>
</html>