<?php 
include 'config.php';
$email = $_POST['email'];
$sql = "select * from cart where email = '$email' ";
$result_select = mysqli_query($conn,$sql);
if(mysqli_num_rows($result_select)!=0){
while($row = mysqli_fetch_array($result_select))
{
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
$sql2 = "select * from product where id ='".$row['pID'] ."'";
$result2 = mysqli_query($conn, $sql2);
while($row2 = mysqli_fetch_array($result2))

{
$photo = $row2['photo'];
$name = $row2['name'];
$description = $row2['description'];
$price = $row2['price'];
echo <<<END
<div class="card mb-3 border me-2" >
<div class="d-flex align-items-center g-0">
  <div class="col-3 com-sm-4 container-img-cart ">
    <img src="$photo" class="img-fluid img-cart rounded-start" alt="...">
  </div>
  <div class="col-md-8">
    <div class="card-body">
      <h3 class="card-title mb-3">$name</h3>
     
      <h3 class="card-text mb-5">$price SR</h3>
      <div class = "cart-btns">
      <button class="btn cart-remove text-muted "><i class="mx-2 fa fa-solid fa-trash"></i>remove</button>
      <form class="">
      <select class=" form-select-sm" aria-label=".form-select-sm example">
      <option selected value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      </select>
      </form>
      </div>
    </div>
  </div>
</div>
</div>
END;

}

}

}
else{
  echo 'your cart is empty';
}



?>