<?php 

include 'config.php';

$sql = "select * from product ";
$result = mysqli_query($conn, $sql);
echo ' <div class="container px-5">
<h5 class="title">New in</h5>
<div class="horizontal-scroll position-relative">
<button  data="top" type="button"-lg class="btn btn-scroll-left" ><i class="fas fa-chevron-left"></i></button>
<button  data="top" type="button"  class=" btn btn-scroll-right"><i class="fas fa-chevron-right"></i></button>
<div class="products top mb-5 story-container">

';
while($row = mysqli_fetch_array($result))
{

// echo '<div class=" item  p-3" id="' . $row['id']. '"' . '  > 

// <div class=" text-center item-img">'; 
// echo '<img class="rounded-start" src="'. $row['photo'] .'">';
// echo '<h6 class="price mt-3">'. $row['price'] . '$</h6>
// </div>
// </div>';

echo '<div class=" clickable card item  mx-1" id="'.$row['id'].'"'.'>'.
'<div class="img-height"> <img class="card-img-top img-fluid" src="' . $row['photo'] . '"/></div> ' .
' <div class="card-body">
<h5 class="card-title">'. $row["name"].'</h5>

<p class="card-text description ">'. $row["description"].'</p>


</div>
<h5 class="price">'. $row["price"].'sr</h5>
<a href="#? id='.$row["id"].'" class="btn btn-outline-primary  w-50 mx-auto my-3"> ADD TO CART</a>
</div>';
}

echo ' </div>
</div>
</div>
</div>';


mysqli_close($conn);

?>

<script>
    let products_container = document.querySelectorAll(".clickable");
    for(let product of products_container){
        product.addEventListener("click",(event)=>{
            console.log(event.currentTarget.id,event.currentTarget)
            window.location.href = `product_details.php?id=${event.currentTarget.id}`
        })
    }
</script>