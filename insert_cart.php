<?php 
include 'config.php';
// session_start();

// if(isset($_POST['id'])){  
//   echo 'yesss'; 
// $id = $_POST['id'];
// echo $id;
// $sql = "select * from product where id = $id";
// $result = mysqli_query($conn,$sql);
// while($row = mysqli_fetch_array($result))
// {
// echo ' <div class="card mb-3 border" >
// <div class="d-flex align-items-center g-0">
//   <div class="col-3 com-sm-4 container-img-cart ">
//     <img src="./imgs/products/IMG-622b4c3dc6e210.18353534.jpg" class="img-fluid img-cart rounded-start" alt="...">
//   </div>
//   <div class="col-md-8">
//     <div class="card-body">
//       <h5 class="card-title">Card title</h5>
//       <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
//       <h5 class="card-text">33</h5>
//       <button class="btn text-muted">remove</button>
//     </div>
//   </div>
// </div>
// </div>';

// }

// }

if(isset($_POST['id'])){  
  echo 'insert cart yes';
    $id = $_POST['id'];
    $email = $_POST['email'];
    // $select = "select pID from wishlist where email = '$email' AND pID = $id";
    // $result_select = mysqli_query($conn,$select);
    // if(mysqli_num_rows($result_select)!=0){
    //     $delete = "DELETE FROM wishlist where pID = $id";
    //     $result_select = mysqli_query($conn,$delete);
    // }
    
    $sql_insert= "INSERT INTO cart(pid,email) values('$id','$email')";
    $result = mysqli_query($conn, $sql_insert);


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