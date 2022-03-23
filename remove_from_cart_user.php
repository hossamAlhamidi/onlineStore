<?php 
include 'config.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

  $id = $_POST['id'];
  $email = $_SESSION['email'];
  $sql_remove = "delete from cart where pID = $id and email = '$email'"  ;
  mysqli_query($conn,$sql_remove);


//   $sql = "select * from cart where email = '$email'";
//  $result =  mysqli_query($conn,$sql);

//  while($row = mysqli_fetch_array($result)){


//  }
// include 'fetch_cart.php'


?>


<script>
$(document).ready(function(){
      var email = '<?= $_SESSION['email'] ?>';
      $("#cart").load("fetch_cart.php",{email:email})
    })
</script>

