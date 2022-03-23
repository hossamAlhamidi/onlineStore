<?php 
session_start();
include 'config.php';
// error_reporting(0);
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
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" href="css/FooterStyle.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2534293444.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>store</title>
    <style>
      .card{
        max-width: 700px;
      }
      .hide{
        display:none;
      }
      /* #checkout{
        position: sticky;
        top: 100px;
      }
       */
      

      @media screen and (max-width:900px){
       .direction{
         flex-direction: column;
         align-items: center;
       }
      
      }
    </style>
</head>
<body>
<?php
//   $email = $_SESSION['email'];
//   $sql = "SELECT COUNT(pID) num
//   FROM cart
//   WHERE email = '$email';";
//   $result = mysqli_query($conn,$sql);
//   while($row = mysqli_fetch_array($result))

// {
//   $cart_num = $row['num'];
  
// }
  ?>

  <!-- <script>
  var cart_num = '<?= $cart_num ?>';
  console.log(cart_num,"number");
  $.post(`navbar.php`,{number:cart_num},function(data,status,xhr){
        console.log(data,"cart");
       

}) -->

  </script>
    <?php include 'navbar.php'?>
    <div class='container-lg my-5'>
      <div class="d-flex g-2 justify-content-between direction ">
   <div id="cart" >
   <?php if(isset($_SESSION['email'])){ ?>
   <script> 
    $(document).ready(function(){
      var email = '<?= $_SESSION['email'] ?>';
      $("#cart").load("fetch_cart.php",{email:email},function(){

      let cards =   document.querySelectorAll(".card");
        for(let card of cards){
         card.addEventListener("click",()=>{
           console.log("yes yes")
         })
        }

        
      })



    })  //ready

    
  </script>

<?php } 
 else {
   ?>
    <script> 
  //   let cookie_object = document.cookie.split(";").map(cookie=> cookie.split("="))
  // .reduce((accumlator,[key,value])=>({...accumlator, [key.trim()]: decodeURIComponent(value)}),{});
  
  let storage = localStorage.getItem("productid")
  
if(storage !=null){
console.log(storage,"str")
let arr_storage = storage.split(",");
console.log(arr_storage)

 
    // $.post("fetch_cart_index.php",{id:cookie_object.productid},function(data,status){
      $(document).ready(function(){
     
     $("#cart").load("fetch_cart_index.php",{arr_id:arr_storage},function(data,status){
       if(status == "success"){
        let sum = 0;
         let total = document.querySelectorAll(".price");
         for(let price of total){
           let quantity = document.querySelector(`#sel${price.id}`).value
           
            sum += parseInt(price.textContent) * quantity
         }
         document.querySelector("#price").textContent = sum;
         document.querySelector(".order-summery").classList.remove("hide");
       }
     })
   })
   



    // })
  }
  else {
    document.querySelector("#cart").innerHTML = "<h2 class='my-5'>your cart is empty</h2>"
  }
 
   
  </script>
 <?php }?>
    <!-- <div class="card mb-3 border" >
  <div class="d-flex align-items-center g-0">
    <div class="col-3 com-sm-4 container-img-cart ">
      <img src="./imgs/products/IMG-622b4c3dc6e210.18353534.jpg" class="img-fluid img-cart rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <h5 class="card-text">33</h5>
        <button class="btn text-muted">remove</button>
      </div>
    </div>
  </div>
</div>

</div> -->

</div>

<div  class="bg-light hide order-summery" style="width: 25rem;">
  <div id="checkout" class="card-body border text-center">
    <h2 class="card-title mb-5">Order Summery</h2>
    <div class="d-flex justify-content-between">
    <h3 class="card-subtitle mb-2 text-muted">Total</h3>
    <h3 id="price" class="card-subtitle mb-2 text-muted"><?php
    include 'calc_price.php'
    ?></h3>
    </div>
    <div class="d-flex">
  <a id="checkout" class="btn btn-lg btn-primary my-3 w-100" type="button">Checkout</a>
</div> 
  </div>
</div>

</div>

</div>
<?php 
function check(){
  header("LOCATION: signin.php");
}
   include 'Footer.php'
  ?>

<script>
  // console.log(document.cookie.split(`; productid=`));
//  let cookie_object = document.cookie.split(";").map(cookie=> cookie.split("="))
//   .reduce((accumlator,[key,value])=>({...accumlator, [key.trim()]: decodeURIComponent(value)}),{});
//   if(typeof cookie_object.productid !="undefined"){
//     $.post("fetch_cart_index.php",{id:cookie_object.productid},function(data,status){
//       console.log(data)
//     })
//   }
//   else {
//     console.log("no")
//   }
// let remove_btn = document.querySelectorAll(".cart-remove");
// for(let btn of remove_btn){
//   btn.addEventListener("click",(event)=>{
//     let id = event.currentTarget.id ; 
//     console.log("yes")
//     // $(document).ready(function(){
//     //   $("#cart").load("remove_from_cart_user.php",{id:id})
//     // })
    
//   })
// }
// let removebtn = document.querySelector(".cart-remove");
// removebtn.addEventListener("click",(event)=>{
//   console.log("yes")
// })

let checkout_btn = document.querySelector("#checkout");
checkout_btn.addEventListener("click",(event)=>{
  console.log("yes")
  // $.post("checkout_check.php");
  window.location.href = "checkout_check.php"
})
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>