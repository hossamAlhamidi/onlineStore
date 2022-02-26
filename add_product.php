<?php 

session_start();

// error_reporting(0);


include 'config.php';

if (isset($_POST['submit'])) {

    $prodname = $_POST["name"];
	$price = $_POST["price"];
	$desc = $_POST['description'];

    $img_name = $_FILES['img']['name'];
    $img_temp = $_FILES['img']['tmp_name'];

    $img_ex = explode('.', $img_name);
	$img_ex_acc = strtolower(end($img_ex));

    $allowed_ex = array("jpg", "jpeg", "png"); 

	if (in_array($img_ex_acc, $allowed_ex)) {
		$new_img_name = uniqid("IMG-", true).'.'.$img_ex_acc;
		$img_destination = 'imgs/products/'. $new_img_name;
		move_uploaded_file($img_temp, $img_destination);
    }

    // $img_path = 'imgs/products/' . $img_name;
    // move_uploaded_file($img_temp, $img_path);

    $useremail = $_SESSION["email"];

    $sql = "INSERT INTO product (email, name, price, description, photo)
    VALUES ('$useremail', '$prodname', '$price', '$desc', '$img_destination')";
    $result = mysqli_query($conn, $sql);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Sign up</title>
</head>
<body>
   <div class="container">
       <form  class="form" id="form" method="post" action="add_product.php" enctype="multipart/form-data">
           <div class="header">
               <h2>Add Product</h2>
           </div>
    <div class="padding">
    <div class="form-control ">
     <label for="name">Name</label>
     <input type="text" placeholder="Enter the Name of the product" id="name" name="name" >
     <i class="fas fa-check-circle"></i>
     <i class="fas fa-exclamation-circle"></i>
     <small>error msg</small>
    </div>

    <!-- <div class="form-control  ">
        <label for="email"> Email</label>
        <input type="text" placeholder="Enter your email" id="email" >
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div> -->

       <div class="form-control ">
        <label for="price">Price</label>
        <input type="number" placeholder="Enter your price" id="price" name="price">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>

       <div class="form-control ">
        <label for="img">image</label>
        <input type="file" id="img" name="img">
        <!-- accept="image/*" -->
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>

       <div class="form-control ">
        <label for="description">description</label>
        <input type="text" placeholder="Enter your description" id="description" name="description">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>

       <!-- <div class="form-control ">
        <label for="confrim-password">Confirm Password</label>
        <input type="password" placeholder="Confirm your password" id="confirm-password">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div> -->

       <!-- <div class="form-control radio ">
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
           <button id="submit" name="submit" type="submit">Add</button>

       </div>
    </form>
</div>

   </div> 
   <script  src="./js/add_product.js"></script>
</body>
</html>