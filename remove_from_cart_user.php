<?php 
include 'config.php';

function test_input($var) {
  $var = trim($var);
  $var = stripslashes($var);
  $var = htmlspecialchars($var);
  return $var;
}

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

  $id = test_input($_POST['id']);
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
  // to update the cart nmuber 
$(document).ready(function(){
      var email = '<?= $_SESSION['email'] ?>';
      $("#cart").load("fetch_cart.php",{email:email})
    })
</script>

