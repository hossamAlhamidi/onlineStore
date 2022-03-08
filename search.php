<?php
session_start();
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
    <title>Search</title>
</head>
<body>
  <?php include('navbar.php'); ?>
  <div class="container">
        <div class="row p-2 ">

<?php
 

include 'config.php';
if (isset($_POST["submit"])) {
$search = $_POST['search'];
$sql = "SELECT * FROM product WHERE name like '%$search%'";
		$result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
			
                while($row = mysqli_fetch_array($result))
        {

    
          //   echo  '<div class="card mb-3 p-3 id=""" >
          //   <div class="row g-0">
          //     <div class="col-md-3 text-center">
          //       <img src="' .$row['photo'] . '"" class="img-fluid rounded-start" alt="...">
          //     </div>
          //     <div class="col-md-6">
          //       <div class="card-body">
          //         <h5 class="card-title">' . $row["name"]. '</h5>
          //         <p class="card-text">' . $row['description']. '</p>
          //         </p>
          //       </div>
          //     </div>
          //     <div class="col-md-3 text-center">
          //       <h5 class="price"> ' . $row['price']. '$</h5>
                
          //       <button type="button" class="btn btn-primary w-75 my-3 ">Add to cart</button>
          //     </div>
          //   </div>
          // </div>';
          echo '  <div class="card col-lg-3 col-sm-6 col-8 mx-auto mx-sm-0 my-5  style="""  >'.
      ' <div class="img-height"> <img class="card-img-top img-fluid" src="' . $row['photo'] . '"/></div> ' .
      ' <div class="card-body">
      <h5 class="card-title">'. $row["name"].'</h5>
      <p class="card-text description">'. $row["description"].'</p>
      <h5 class="card-text">'. $row["price"].'$</h5>
      <button class="btn btn-primary">Add to cart</button>
      </div>
      </div>';


    }           
		}
        else
        echo"no item";
}


?>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>