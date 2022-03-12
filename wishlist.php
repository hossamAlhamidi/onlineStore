<?php 
session_start();
include 'config.php';

if(isset($_POST['id'])){
  echo 'yeeeeeeeeeees ';
    $id = $_POST['id'];
    $_SESSION['wishlist_pid'] = $id;
    $email = $_SESSION['email'];
    echo $id;
    echo $email;
    
    $select = "select pID from wishlist where email = '$email' AND pID = $id";
    $result_select = mysqli_query($conn,$select);
    if(mysqli_num_rows($result_select)!=0){
        $delete = "DELETE FROM wishlist where pID = $id";
        $result_select = mysqli_query($conn,$delete);
    }
    else{
    $sql= "INSERT INTO wishlist(pid,email) values('$id','$email')";
    $result = mysqli_query($conn, $sql);
    
}

}

if(isset($_GET['id'])){
    $IDPD = $_GET['id'];
    $request  = "DELETE FROM wishlist WHERE pID ='".$IDPD."'";
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
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2534293444.js" crossorigin="anonymous"></script>
    <title>store</title>
</head>
<body>
    <?php include 'navbar.php';?>
<div class="container">
      <div class="row p-2 ">
   
    <?php 
    
    $sql = "select * from wishlist where email ='".$_SESSION['email'] ."'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))

    {
      
        $sql2 = "select * from product where id ='".$row['pID'] ."'";
        $result2 = mysqli_query($conn, $sql2);
        while($row2 = mysqli_fetch_array($result2))

    {
      echo '  <div class="card text-center col-lg-3 col-sm-6 col-8 mx-auto mx-sm-0 my-5  style="""  >'.
      ' <div class="img-height"> <img class="card-img-top img-fluid" src="' . $row2['photo'] . '"/></div> ' .
      ' <div class="card-body">
      <h5 class="card-title">'. $row2["name"].'</h5>
      <p class="card-text description ">'. $row2["description"].'</p>
      </div>
      <div class="button">
      <a href="wishlist.php? id='.$row2["id"].'" class="btn btn-danger delete ">Delete</a>
      
      </div>
      </div>';
    }

    }

  ?>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script>
    
</script>
</body>
</html>