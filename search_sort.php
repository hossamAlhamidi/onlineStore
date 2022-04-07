<?php
if(isset($_SESSION))
session_start();
include 'config.php';

function test_input($var) {
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
}

if(isset($_POST['order'])){
    $order = test_input($_POST['order']);
    $search_keyword = test_input($_POST['search_keyword']);
    $sql = "SELECT * FROM product WHERE name like '%$search_keyword%'  ORDER BY price $order";
    $result = mysqli_query($conn , $sql);

    if ($result->num_rows > 0) {
			
        while($row = mysqli_fetch_array($result))
{



echo '  <div class=" clickable card col-lg-3 col-6  mx-sm-0 my-5"  id="' .$row['id'] .'"'.'>'.
' <div class="img-height"> 
<img class="card-img-top img-fluid" src="' . $row['photo'] . '"/>
<button  type="button" id="'.$row["id"].'" class="btn text-danger btn-favorite  ">';
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

// else if(!$isPrinted) {

// echo ' <i class=" far fa-light fa-heart display-6"></i>1';
// $isPrinted = true;
// // echo "<script>
// // console.log( document.querySelectorAll('.btn-favorite')  )
// // for(let element of document.querySelectorAll('.btn-favorite')){
// //   console.log(element.children.length,'length')
// //   if(element.children.length ==2){
// //     console.log(element.id,'element')
// //     var id = element.id
// //     document.querySelector('#'+id).remove()
// //   }
// // }

// // </script>";
// }
}

}
else {
echo ' <i class=" far fa-light fa-heart display-6"></i>';
}
}
else {
echo ' <i class=" far fa-light fa-heart display-6"></i>';
}

echo  '  </button>
</div> ' .
' <div class="card-body">
<h5 class="card-title">'. $row["name"].'</h5>
<p class="card-text description">'. $row["description"].'</p>
<h5 class="card-text">'. $row["price"].'SR</h5>
<button id="' .$row['id'] . '" class="btn btn-primary btn-cart">Add to cart</button>
</div>
</div>';


}           
}
else
echo"no item";
}

?>