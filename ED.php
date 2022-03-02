<?php 

session_start();




include 'config.php';
$sql = "select * from product where id ='".$_SESSION['id'] ."'";
$result = mysqli_query($conn, $sql);
if($row = mysqli_fetch_array($result)){
	$prodname = $row["name"];
	$price = $row["price"];
	$desc = $row["description"];
	$img = $row["photo"];
	$old_id = $row["id"];
}
?>
<?php if (isset($_POST['submit'])) {
    $prodname = $_POST["name"];
	$price = $_POST["price"];
	$desc = $_POST['description'];

    $img = "imgs/products/" . $_FILES['img']["name"];

    move_uploaded_file($_FILES['img']["tmp_name"], $img);

    $em = $_SESSION["email"];

    $sql = "INSERT INTO product (email, name, price, description, photo)
    VALUES ('$em', '$prodname', '$price', '$desc', ' $img')";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
    <title>Edit Product</title>
</head>
<body >
    
   <div class="container-css">
       <form  class="form" id="form" method="post" action="EditProduct.php" enctype="multipart/form-data">
           <div class="header">
               <h2>Edit Product</h2>
           </div>
    <div class="padding">
    <div class="form-control-css ">
     <label for="name">Name</label>
     <input type="text" placeholder="Enter the Name of the product" id="name" name="name" value="<?php echo $prodname; ?>" >
     <i class="fas fa-check-circle"></i>
     <i class="fas fa-exclamation-circle"></i>
     <small>error msg</small>
    </div>


       <div class="form-control-css ">
        <label for="price">Price</label>
        <input type="number" placeholder="Enter your price" id="price" name="price" value="<?php echo $price; ?>">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>

       <div class="form-control-css ">
        <label for="img">image</label>
        <input type="file" id="img" name="img" accept="image/*" value="<?php echo $img; ?>" >
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>

       <div class="form-control-css ">
        <label for="description">description</label>
        <input type="text" placeholder="Enter your description" id="description" name="description" value="<?php echo $desc; ?>">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>

  
       <div>
           <button id="submit" name="submit" type="submit" >Save</button>
           
       
       </div>
    </form>
</div>

   </div> 



<div id="modal" class="modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
  
        <button  id="close-btn"type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h2 class="text-success text-center">Successful</h2>
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
         } 
         
          
         
         
         ?>
   <script  src="./js/add_product.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>