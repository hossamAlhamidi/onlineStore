<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/search.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2534293444.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php include 'navbar.php' ?>
   

    <?php
    include 'config.php';
    $id = $_GET['id'];
    $sql = "select * from product where id = '" . "$id '";
$result = mysqli_query($conn, $sql);

echo ' <div class="container px-5 my-5">



';
while($row = mysqli_fetch_array($result))
{

// echo '< class=" clickable card item  mx-1" id="'.$row['id'].'"'.'>'.
// '<div class="img-height"> <img class="card-img-top img-fluid" src="../' . $row['photo'] . '"/></div> ' .
// ' <div class="card-body">
// <h5 class="card-title">'. $row["name"].'</h5>
// </div>';

 echo ' 
 <div class="card mb-3" >
   <div class="row g-0 align-items-center ">
     <div class="col-sm-6 ">
       <img src="./' .$row['photo']. '" class="img-fluid rounded-start" alt="...">
     </div>
     <div class="col-sm-6">
       <div class="card-body d-flex flex-column">
         <h5 class="card-title">' .$row['name']. '</h5>
         <p class="card-text">'. $row['description']. '.</p>
         <h5 class="card-title">' .$row['price']. 'SR</h5>
         <div class="d-flex justify-content-center">
         
         <a href="#? id='.$row["id"].'" class="btn btn-outline-primary   my-3 mx-2"> ADD TO CART</a>
         <button  type="button" id='.$row["id"].'" class="btn text-danger btn-favorite  "> <i class=" far fa-light fa-heart display-6"></i></button>
         
         </div>
         
       </div>
     </div>
   </div>
 </div>
 ';

}

echo ' </div>

';


 mysqli_close($conn);
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script>
      btn_favorite = document.querySelector(".btn-favorite");
      btn_favorite.addEventListener("click",()=>{
        if(event.currentTarget.children[0].classList.contains("far"))
        event.currentTarget.children[0].className = "fa fa-light fa-heart display-6 "
        else{
          event.currentTarget.children[0].classList.remove("fa")
          event.currentTarget.children[0].classList.add("far")
        }
      })
    </script>
    
</body>
</html>