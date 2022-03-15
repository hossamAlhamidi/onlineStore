<?php 
include 'config.php';
session_start();
$email = $_SESSION['email'];
$sql = "SELECT COUNT(pID) num , SUM(quantity) s
   FROM cart
   WHERE email = '$email';";
   
// $sql = "SELECT SUM(quantity) num
//    FROM cart
//    WHERE email = '$email';";


   $result = mysqli_query($conn,$sql);

     while($row = mysqli_fetch_array($result))

 {
   $cart_num = $row['num'];
   $cart_sum = $row['s'];
   if($cart_num == 0)
   echo $cart_num;
   else 
   echo $cart_sum;
   
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