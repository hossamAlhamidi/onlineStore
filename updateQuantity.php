<?php 
include 'config.php';

function test_input($var) {
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
}

$val = trim($_POST['val']);
$id = trim($_POST['id']);
$email= trim($_POST['email']);
$sql_quantity = "select quantity from cart where pID = $id and email = '$email'";
$sql_price = "select price from product where id = $id";
$result_quantity = mysqli_query($conn,$sql_quantity);
$row = mysqli_fetch_array($result_quantity);

$result_price = mysqli_query($conn,$sql_price);
$row2 = mysqli_fetch_array($result_price);


$quantity = $row['quantity'];
$price = $row2['price'];
echo $quantity;
echo $price;

if($val >= $quantity ){

$sql = "UPDATE cart 
SET quantity =  $val , price = $price * $val
where pID = $id  and email = '$email'";

mysqli_query($conn,$sql);
}
else {
    $sql = "UPDATE cart 
SET   price = price - ((quantity-$val) * $price),quantity =  $val
where pID = $id  and email = '$email'";

mysqli_query($conn,$sql);
}
?>