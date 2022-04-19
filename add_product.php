<?php 
  include 'config.php';

  session_start();
  //error_reporting(0);
  

  if(isset($_SESSION['name']))
    if(time()-$_SESSION["login_time_stamp"] > (60*60*5)) {
      session_unset();
      session_destroy();
      header("Location:signin.php");
    }

  if (!isset($_SESSION['name']))
      header("LOCATION: signin.php");
  else if ($_SESSION["type"] == 0)
      header("LOCATION: user.php");


  function test_input($var) {
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
  }

  // require 'vendor/autoload.php';

	// use Aws\S3\S3Client;
	// use Aws\S3\Exception\S3Exception;
      
  if (isset($_POST['submit'])) {

    $prodname = test_input($_POST["name"]);
	  $price = test_input($_POST["price"]);
	  $desc = test_input($_POST['description']);


    $img_name = $_FILES['img']['name'];
    $img_temp = $_FILES['img']['tmp_name'];

    $img_ex = explode('.', $img_name);
	  $img_ex_acc = strtolower(end($img_ex));
    

    $allowed_ex = array("jpg", "jpeg", "png"); 

	  if (in_array($img_ex_acc, $allowed_ex)) {
		  $new_img_name = uniqid("IMG-", true).'.'.$img_ex_acc;

      // Adding to local sever
		  $img_destination = 'imgs/products/'. $new_img_name;
		  move_uploaded_file($img_temp, $img_destination);


      // Adding to online service(AWS S3)

      // require 'vendor/autoload.php';

	    // use Aws\S3\S3Client;
	    // use Aws\S3\Exception\S3Exception;


	    // // AWS Info
	    // $bucketName = 'onlinestore-ss-ksu';
	    // $IAM_KEY = '';
	    // $IAM_SECRET = '';

	    // // Connect to AWS
	    // // try {
		  //   // You may need to change the region. It will say in the URL when the bucket is open
		  //   // and on creation.
		  //   $s3 = S3Client::factory(
			//     array(
			// 	    'credentials' => array(
			// 	  	'key' => $IAM_KEY,
			// 	  	'secret' => $IAM_SECRET
      //       ),
			// 	    'version' => 'latest',
			// 	    'region'  => 'eu-central-1'
			//     )
		  //   );
	    // // } catch (Exception $e) {
		  // //     // We use a die, so if this fails. It stops here. Typically this is a REST call so this would
		  // //     // return a json object.
		  // //     die("Error: " . $e->getMessage());
	    // // }

	
	    // // For this, I would generate a unqiue random string for the key name. But you can do whatever.
	    // $keyName = 'imgs/products/' . $new_img_name;
	    // $pathInS3 = 'https://s3.us-east-2.amazonaws.com/' . $bucketName . '/' . $keyName;

	    // // Add it to S3
	    // try {
		  //   // Uploaded:
		  //   $file = $_FILES["fileToUpload"]['tmp_name'];

		  //   $s3->putObject(
			//     array(
			// 	    'Bucket'=>$bucketName,
			// 	    'Key' =>  $keyName,
			// 	    'SourceFile' => $file,
			// 	    'StorageClass' => 'REDUCED_REDUNDANCY'
			//     )
		  //   );

	    // } catch (S3Exception $e) {
		  //   die('Error:' . $e->getMessage());
	    // } catch (Exception $e) {
		  //   die('Error:' . $e->getMessage());
	    // }
    }

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
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
    <title>Add Product</title>
</head>
<body id="add-product" >
    
   <div class="container-css flex-column mt-0">
   <a href="index.php" class="my-3 text-bold ">Brand</a>
       <form  class="form" id="form" method="post" action="<?php echo htmlspecialchars("add_product.php");?>" enctype="multipart/form-data" autocomplete="off">
           <div class="header">
               <h2>Add Product</h2>
           </div>
    <div class="padding">
    <div class="form-control-css ">
     <label for="name">Name</label>
     <input type="text" placeholder="Enter the Name of the product" id="name" name="name" >
     <i class="fas fa-check-circle"></i>
     <i class="fas fa-exclamation-circle"></i>
     <small>error msg</small>
    </div>

    <!-- <div class="form-control-css  ">
        <label for="email"> Email</label>
        <input type="text" placeholder="Enter your email" id="email" >
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div> -->

       <div class="form-control-css ">
        <label for="price">Price</label>
        <input type="number" placeholder="Enter your price" id="price" name="price">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>

       <div class="form-control-css ">
        <label for="img">image</label>
        <input type="file" accept="image/*" id="img" name="img" required>
        <!-- accept="image/*" -->
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>

       <div class="form-control-css ">
        <label for="description">description</label>
        <!-- <input type="text" placeholder="Enter your description" id="description" name="description"> -->
        <textarea type="text" placeholder="Enter your description" id="description" name="description"></textarea>
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>

       <!-- <div class="form-control-css ">
        <label for="confrim-password">Confirm Password</label>
        <input type="password" placeholder="Confirm your password" id="confirm-password">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div> -->

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
           <button id="submit" class="my-5" name="submit" type="submit" >Add</button>
           
       
       </div>
    </form>
</div>

   </div> 

  <!-- Button trigger modal -->
<!-- <button id="modal" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->



<div id="modal" class="modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <button  id="close-btn"type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h2 class="text-success text-center">Product Added</h2>
      </div>
      <div class="modal-footer">
        <button id="close"type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php if($_SERVER['REQUEST_METHOD'] == 'POST'){
           echo"<script>
           document.querySelector('#modal').style.display = 'block';
           document.querySelector('#close').addEventListener('click',()=>{
            document.querySelector('#modal').style.display = 'none';
           });
           document.querySelector('#close-btn').addEventListener('click',()=>{
            document.querySelector('#modal').style.display = 'none';
           });
           </script>";
          //  header("LOCATION: manage_product.php");
         } 
         
          
         
         
         ?>
   <script  src="./js/add_product.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>