<?php 
session_start();
include 'config.php';

if(!isset($_SESSION['email'])){
    header("Location: signin.php");
}

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
    <title>profile</title>
    <style>

    </style>
</head>
<body id="body">
   <div class="container-css p-4 flex-column">
   <a href="index.php" class="my-3 text-bold ">Brand</a>
       <form  class="form" id="form" action="" method="POST">
          
    <div class="padding">
    <div class="form-control-css ">
     <label for="name"> Name</label>
     <input type="text" placeholder="Enter your Name" id="name" name="name" <?php  echo ' value = "'.$_SESSION['name'].'"'  ?> >
     <i class="fas fa-check-circle"></i>
     <i class="fas fa-exclamation-circle"></i>
     <small>error msg</small>
    </div>

    <div class="form-control-css  ">
        <label for="email"> Email</label>
        <input style="background-color: #f3f3f3;" type="text" disabled placeholder="Enter your email" id="email" name="email" <?php  echo ' value = "'.$_SESSION['email'].'"'  ?>  >
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small id="email-msg">error msg</small>
       </div>

       <div class="form-control-css ">
        <label for="phone-number">Phone Number</label>
        <input type="text" placeholder="Enter your phone number" id="phone-number" name="phone-number" <?php if(isset($_SESSION['phone'])) echo ' value = "'.$_SESSION['phone'].'"'  ?> >
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>

       <div class="form-control-css ">
        <label for="city">city</label>
        <input type="text" placeholder="Enter your city" id="city" name="city" <?php if(isset($_SESSION['city'])) echo ' value = "'.$_SESSION['city'].'"'  ?> >
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>

       <div class="form-control-css ">
        <label for="Address">Address</label>
        <input type="text" placeholder="Enter your home address" id="address" name="address" <?php if(isset($_SESSION['address'])) echo ' value = "'.$_SESSION['address'].'"'  ?> >
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>

       

       <!-- <div class="form-control-css radio ">
           <p>Create as</p>
         <div>
             <input type="radio" name="role" id="customer" checked>
             <label for="customer" > customer</label>
            </div>  
             
            <div>

                <input type="radio" name="role" id="seller">
                <label for="seller"> seller</label>
            </div>
             
        
       </div> -->
       <div>
           <button id="submit" class="my-5" name="submit" type="submit">Submit</button>

       </div>
    </form>
</div>

   </div> 
   <script  src="./js/profile.js"></script>
</body>
</html>

<?php 
if (isset($_POST["submit"])) {
    $email = test_input($_SESSION['email']);
    $name = test_input($_POST['name']);
    $phone = test_input($_POST['phone-number']);
    $city = test_input($_POST['city']);
    $address = test_input($_POST['address']);

    $sql = "UPDATE user 
    SET name = '$name' , phone = '$phone' , address_city = '$city' , address = '$address'
    where email = '$email' ";
   $result = mysqli_query($conn,$sql);
   if($result){
       $_SESSION['phone'] = $phone;
       $_SESSION['city'] = $city;
       $_SESSION['address'] = $address;

       header("Location: cart.php");
   }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>