<?php
session_start();
include 'config.php';
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/sidebar.css">
    <title>Search</title>
</head>
<body>
  <?php include('navbar.php'); ?>
  <div class="container">
        <div class="row p-2 ">

<?php
 


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
    //       echo '  <div class=" clickable card col-lg-3 col-sm-6 col-8 mx-auto mx-sm-0 my-5"  id="' .$row['id'] .'"'.'>'.
    //   ' <div class="img-height"> 
    //   <img class="card-img-top img-fluid" src="' . $row['photo'] . '"/>
    //   <button  type="button" id="'.$row["id"].'" class="btn text-danger btn-favorite  ">'. 
    //   <i class=" far fa-light fa-heart display-6"></i>
      
    // '  </button>
    //   </div> ' .
    //   ' <div class="card-body">
    //   <h5 class="card-title">'. $row["name"].'</h5>
    //   <p class="card-text description">'. $row["description"].'</p>
    //   <h5 class="card-text">'. $row["price"].'SR</h5>
    //   <button class="btn btn-primary">Add to cart</button>
    //   </div>
    //   </div>';
    echo '  <div class=" clickable card col-lg-3 col-6  mx-sm-0 my-5"  id="' .$row['id'] .'"'.'>'.
    ' <div class="img-height"> 
    <img class="card-img-top img-fluid" src="' . $row['photo'] . '"/>
    <button  type="button" id="'.$row["id"].'" class="btn text-danger btn-favorite  ">';
    if(isset($_SESSION['name'])){
      $email = $_SESSION['email'];
    $sql1 = "select pID from wishlist where email ='$email' AND pID =". $row['id'];
     $result1 = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($result1) != 0){
    while($row1 = mysqli_fetch_array($result1))
    {
    if($row['id']==$row1['pID']){
      echo ' <i class=" fa fa-light fa-heart display-6"></i>';
      // $isPrinted =true;
    }
    
    // else if(!$isPrinted) {
    
    // echo ' <i class=" far fa-light fa-heart display-6"></i>1';
    // $isPrinted = true;
    // // echo "<script>
    // // console.log( document.querySelectorAll('.btn-favorite')  )
    // // for(let element of document.querySelectorAll('.btn-favorite')){
    // //   console.log(element.children.length,'length')
    // //   if(element.children.length ==2){
    // //     console.log(element.id,'element')
    // //     var id = element.id
    // //     document.querySelector('#'+id).remove()
    // //   }
    // // }
    
    // // </script>";
    // }
    }
    
    }
    else {
      echo ' <i class=" far fa-light fa-heart display-6"></i>';
    }
    }
    else {
      echo ' <i class=" far fa-light fa-heart display-6"></i>';
    }
    
echo  '  </button>
    </div> ' .
    ' <div class="card-body">
    <h5 class="card-title">'. $row["name"].'</h5>
    <p class="card-text description">'. $row["description"].'</p>
    <h5 class="card-text">'. $row["price"].'SR</h5>
    <button id="' .$row['id'] . '" class="btn btn-primary btn-cart">Add to cart</button>
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

<script>
    let products_container = document.querySelectorAll(".clickable");
    for(let product of products_container){
        product.addEventListener("click",(event)=>{
            // console.log(event.currentTarget.id,event.target)
            if(event.target.tagName.toLowerCase()!= "a" && event.target.tagName.toLowerCase()!= "button")
            if(event.target.tagName.toLowerCase()!="i" )
            window.location.href = `product_details.php?id=${event.currentTarget.id}`
        })
    }
</script>


    <script src="./js/favorite.js"></script>
    <?php include 'addToCartAjax.php'; 
     include 'addToCart_non_user.php' ;
    ?>
</body>
</html>