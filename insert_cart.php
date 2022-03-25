<?php 
include 'config.php';
// session_start();



if(isset($_POST['id'])){  
  echo 'insert cart yes';
  $id = $_POST['id'];
  $email = $_POST['email'];
  $sql_price = "select price from product where id = $id";
  $result_price = mysqli_query($conn,$sql_price);
  $row_price = mysqli_fetch_array($result_price);
  $price = $row_price['price'];


    // $select = "select pID from wishlist where email = '$email' AND pID = $id";
    // $result_select = mysqli_query($conn,$select);
    // if(mysqli_num_rows($result_select)!=0){
    //     $delete = "DELETE FROM wishlist where pID = $id";
    //     $result_select = mysqli_query($conn,$delete);
    // }
    $sql_check = "SELECT COUNT(pID) num
   FROM cart
   WHERE email = '$email' AND pID = $id;";
   $result_check = mysqli_query($conn,$sql_check);
   $row = mysqli_fetch_array($result_check);
   if($row['num']==0){
    $sql_insert= "INSERT INTO cart(pid,email,price) values('$id','$email',$price)";
    $result = mysqli_query($conn, $sql_insert);

   }
   else {
     $sql_update = "UPDATE cart
     SET quantity = quantity + 1 ,price = price +$price
     WHERE pID = $id;";
     mysqli_query($conn,$sql_update);
   }
}


?>

<!-- <script>
$.post(`fetch_cart_number.php`,function(data,status,xhr){
  console.log(data,"plus plus")
        if(status=='error'){
          alert('error navbar cart');
        }

})

</script> -->