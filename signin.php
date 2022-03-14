<?php

 include 'config.php';

session_start();


if (isset($_SESSION['name'])) {
    //header("Location: user.php");
    if ($_SESSION["type"] == 0){
        //echo "if2";
        header("Location: user.php");}
    else if ($_SESSION["type"] == 1){
    //else{
        //echo "if3";
        header("Location: seller.php");}
}


// $e = false;
// if (isset($_POST["submit"])) {
// 	$email = $_POST["email"];
// 	$password = md5($_POST["password"]);
// 	$con = new PDO('mysql:host=localhost;dbname=onlineshoppingsystem', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// 	$request = $con->query("SELECT * FROM user WHERE email = '".$email."' AND PWD = '".$password."'");
// 	if ($request->rowCount() == 1) {
// 		$info = $request->fetch();
// 		//$_SESSION["id"] = $info["id"];
// 		$_SESSION["name"] = $info["name"];
// 		$_SESSION["email"] = $info["email"];
// 		$_SESSION["type"] = $info["type"];
//         if($_SESSION["type"] == 0)
// 		    header("location: user.php");
//         if($_SESSION["type"] == 1)
//             header("location: seller.php");
// 	}else {
// 		$e = true;    
// 	}
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Sign in</title>
</head>
<body id="body">
   <div class="container-css flex-column">
       <a href="index.php" class="my-3 text-bold ">Brand</a>
       <form  class="form" id="form" action="logging.php" method="POST"> 
           <div class="header">
               <h2>Sign in</h2>
           </div>
    <div class="padding">
    <?php if(isset($_POST["submit"])){
        if(!isset($_SESSION['name']))
          echo'<div class="alert alert-danger" role="alert">
           Sorry we could not find your account!
        </div>';
    } ?>
    <div class="form-control-css ">
     <!-- <label for="email">Email</label> -->
     <input type="text" placeholder="Enter your email" id="email" name="email">
     <i class="fas fa-check-circle"></i>
     <i class="fas fa-exclamation-circle"></i>
     <small>error msg</small>
    </div>

    

       <div class="form-control-css ">
        <!-- <label for="password">Password</label> -->
        <input type="password" placeholder="Enter your password" id="password" name="password">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>
       <div class="forgot  ">
           <a href="#"> Forgot Password? </a>
        </div>

        <div class="signup  ">
            <span> don't have an account?</span> <a href="signup.php">sign up</a>
         </div>


       <div>
           <button id="submit" type="submit" name="submit">Sign in</button>

       </div>
    </form>
</div>

   </div> 
   <!-- <script  src="./js/signin.js"></script> -->
</body>
</html>