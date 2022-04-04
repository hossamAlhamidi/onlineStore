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
    <?php if(isset($_POST['submit'])){?>
      <div class="dropdown mt-5">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Sort by
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" id="desc" style="cursor:pointer" >Price high to low</a></li>
    <li><a class="dropdown-item" id="asc" style="cursor:pointer">Price low to high</a></li>
    <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
  </ul>
</div>
  <?php  }?>
        <div class="row p-2 search-items ">

<?php
 


if (isset($_POST["submit"])) {
$search = $_POST['search'];
$sql = "SELECT * FROM product WHERE name like '%$search%'";
		$result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
			
                while($row = mysqli_fetch_array($result))
        {

    
        
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
    <button id="' .$row['id'] . '" class="btn btn-primary btn-cart" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="showInfo()">Add to cart</button>
    </div>
    </div>';


    }           
		}
        else{
        echo"<h2 class = 'my-5 text-center text-muted'>no item<h2>";
        echo "<script> document.querySelector('.dropdown').style.display = 'none' </script>";
        }
}


?>
</div>
</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->

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
<?php if (isset($_POST["submit"])) {?>
<script>
    let dropdown = document.querySelectorAll(".dropdown-item");
    for(let e of dropdown){
      e.addEventListener("click",(event)=>{
        var search_keyword = '<?= $search ?>';
        console.log(search_keyword);
        $(".search-items").load("search_sort.php",{order:event.target.id,search_keyword:search_keyword},function(data,status){
          if(status == "success"){
          //  console.log(data)
          }
          if(status == "error"){
            alert("error in sorting")
          }
        })
      })
    }
</script>
<?php }?>

<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered container">
    <div class="modal-content  " style="max-width:500px;margin:auto">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
      <div class="modal-body text-center  " style = "min-height:200px;">

      <div class="modal-info">
        <!-- <h3 class="text-success">Added to cart</h3> -->
        
      </div>
      <div class="d-flex my-3 justify-content-center align-items-center">
       <h5 class="text-success me-2">Added to cart</h5>
       <i class="text-success fas fa-check-circle" style="font-size:1.5rem"></i>
    </div>
      <script>
       function showInfo(){
         let id = event.currentTarget.id;
         console.log(id);
        $(".modal-info").load("get_product_modal.php",{id:id})
       
       }
       </script>
       <div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Contiune Shopping</button>
        <a href="cart.php" type="button" class="btn btn-primary">Checkout</a>
      </div>
</div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Contiune Shopping</button>
        <button type="button" class="btn btn-primary">Checkout</button>
      </div> -->
    </div>
  </div>
</div>

    <script src="./js/favorite.js"></script>
    <?php include 'addToCartAjax.php'; 
     include 'addToCart_non_user.php' ;
    ?>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>