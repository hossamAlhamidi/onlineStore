<?php 
include 'config.php';
$email = $_POST['email'];
$sql = "select * from cart where email = '$email' ";
$result_select = mysqli_query($conn,$sql);
if(mysqli_num_rows($result_select)!=0){
while($row = mysqli_fetch_array($result_select))
{
$quantity = $row['quantity'];
$sql2 = "select * from product where id ='".$row['pID'] ."'";
$result2 = mysqli_query($conn, $sql2);
while($row2 = mysqli_fetch_array($result2))

{
  $id = $row2['id'];
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
      <select id="$id" value="$quantity" class=" select form-select-sm" aria-label=".form-select-sm example" onchange="selectValue(this.value)">
      <option selected value="$quantity" hidden>$quantity</option>
      <option value="1">1</option>
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

function updateQuantity($val,$id){
$sql = "UPDATE cart 
SET quantity = quantity + $val 
where pID = $id";
}

?>
<script>
  let select = document.querySelector("#selectQuantity");

  function selectValue(val){
    var email = '<?= $email ?>';
   let id = event.currentTarget.id;
   $.post("updateQuantity.php",{val:val,id:id,email:email},function(data,status){
     console.log(data)
    $("#cart-num").load("fetch_cart_number.php",function(responseTxt, statusTxt, xhr){
           if(statusTxt == "error")
     alert("Cart num cannot load!");
        })

        // var email = '<?= $email ?>';
        $("#price").load("calc_price.php",{email:email})
   })

  //  $.post("calc_price.php",function(data,status){
  //    $("#price").load("calc_price.php")
  //  })
  }
</script>