<?php
include 'config.php';
session_start();

if(time()-$_SESSION["login_time_stamp"] > (60*60*5)) {
  session_unset();
  session_destroy();
  header("Location:signin.php");
}

if (!isset($_SESSION['phone']) && !isset($_SESSION['email']))
        header("LOCATION: user.php");

if(!isset($_SESSION))

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
</head>
<body>
    <?php include 'navbar.php' ?>
   <div class="container-lg p-3 my-5">
   <div class="row">
   <div class="col-lg-6 border">
    <?php 
    $email = $_SESSION['email'];
    $sql = "select * from cart where email = '$email'";
    $result = mysqli_query($conn , $sql);

    if(mysqli_num_rows($result) >0){
        while($row = mysqli_fetch_array($result)){
            
            $quantity = $row['quantity'];
$sql2 = "select * from product where id ='".$row['pID'] ."'";
$result2 = mysqli_query($conn, $sql2);
while($row2 = mysqli_fetch_array($result2))

{
  $id = $row2['id'];
$photo = $row2['photo'];
$name = $row2['name'];
$description = $row2['description'];
$price = $row2['price'];
echo <<<END
<div class="card mb-3  me-2" >
<div class="d-flex align-items-center g-0">
  <div class="col-3 com-sm-4 container-img-cart ">
    <img src="$photo" class="img-fluid img-cart rounded-start" alt="...">
  </div>
  <div class="col-md-8">
    <div class="card-body">
      <p class="card-title mb-3">$name</p>
     
      <h6 class="card-text mb-5">$price SR</h6>
      
    </div>
  </div>
</div>
</div>
END;

}

}

        }
    
    
    ?>
    </div>
</div>
</div>
</body>
</html>
