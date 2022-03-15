<?php 
include 'config.php';
session_start();
$email = $_SESSION['email'];
$sql = "SELECT COUNT(pID) num
   FROM cart
   WHERE email = '$email';";
   $result = mysqli_query($conn,$sql);

     while($row = mysqli_fetch_array($result))

 {
   $cart_num = $row['num'];
   echo $cart_num;
 }


?>

<!-- <script>
$.post(`navbar.php`,{number:<?=$cart_num?>},function(data,status,xhr){
  console.log(data,"plus plus")
        if(status=='error'){
          alert('error navbar cart');
        }

})

</script> -->