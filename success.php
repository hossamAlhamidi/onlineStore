<?php 
include 'config.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
 
}

if(isset($_SESSION['email']) && isset($_SESSION['phone']) && isset($_GET['session_id']) &&  isset($_SESSION["payment"])){
 
}
else {
  header("Location:user.php");
}
// if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
//   header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
//   die ("<h2>Access Denied!</h2> This file is protected and not available to public.");
//   }
// 



unset($_SESSION['payment'])
?>



<!DOCTYPE html>
<html>
<head>
  <title>Thanks for your order!</title>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/FooterStyle.css">
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/2534293444.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
  <div class="modal" tabindex="-1" style="display:block">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="min-height:300px">
      <!-- <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
      <div class="modal-body d-flex justify-content-center align-items-center text-center">
        <h3 class="text-success">You have successfully submitted your order.</h3>
      </div>
      <div class="modal-footer">
        <a href="user.php" type="button" class="btn btn-primary mx-auto">Return Home</a>
      </div>
    </div>
  </div>
</div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>