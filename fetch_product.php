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
 
 
//  $isPrinted = false; 
echo '<div class=" clickable card item  mx-1" id="'.$row['id'].'"'.'>'.
'<div class="img-height position-relative mt-3"> <img class="card-img-top img-fluid" src="' . $row['photo'] . '"/>
<button  type="button" id="'.$row["id"].'" class="btn text-danger btn-favorite  ">' ;
if(isset($_SESSION['name'])){
  $email = $_SESSION['email'];
$sql1 = "select pID from wishlist where email ='$email' AND pID =". $row['id'];
 $result1 = mysqli_query($conn, $sql1);
if(mysqli_num_rows($result1) != 0){
while($row1 = mysqli_fetch_array($result1))
{
if($row['id']==$row1['pID']){
  echo ' <i class=" fa fa-light fa-heart display-6"></i>';
  // $isPrinted =true;
}


}

}
else {
  echo ' <i class=" far fa-light fa-heart display-6"></i>';
}
}
else {
  echo ' <i class=" far fa-light fa-heart display-6"></i>';
  // this is a new way to write strings without escaping "" , its calles heredoc
//   echo <<<END
//      <script>
//      var btn_favorite = document.querySelectorAll('.btn-favorite');
//      for(let btn of btn_favorite){
//        btn.addEventListener("click",()=>{
//          console.log('yes')
//        })
//      }
     
//      </script>
// END;
}
 echo '</button>
</div> ' .

' <div class="card-body">
<h5 class="card-title">'. $row["name"].'</h5>

<p class="card-text description ">'. $row["description"].'</p>


</div>
<h5 class="price">'. $row["price"].'sr</h5>
<a href="#? id='.$row["id"].'" class="btn btn-outline-primary  w-50 mx-auto my-3"> ADD TO CART</a>
</div>';
}  // big while

echo ' </div>
</div>
</div>
</div>';

  

?>

    

<script>
    let products_container = document.querySelectorAll(".clickable");
    for(let product of products_container){
        product.addEventListener("click",(event)=>{
            // console.log(event.currentTarget.id,event.target)
            if(event.target.tagName.toLowerCase()!= "a" && event.target.tagName.toLowerCase()!= "button")
            if(event.target.tagName.toLowerCase()!="i" )
            window.location.href = `product_details.php?id=${event.currentTarget.id}`
        })
    }
</script>
 

<?php 


mysqli_close($conn);
?>