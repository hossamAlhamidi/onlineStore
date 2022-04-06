

<?php
include 'config.php';
if(!isset($_SESSION)){
  session_start();
}
$email = $_SESSION['email'];
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_51KlIrDGzyYPgP3RCBZs6nELE5Xx2FHc8Chrik3VRD2ORTpcdW8rK90lqO9IcorzLS71jMTswMp7o77EaZfNqG8qL00xBTUR32g');
$sql = "select * from cart where email = '$email'";
$result = mysqli_query($conn,$sql);
$products_inside_cart = [  ];
if(mysqli_num_rows($result)>0){
 while($row = mysqli_fetch_array($result)){
   $id = $row['pID'];
   $quantity = $row['quantity'];

   $sql_product = "select * from product where id = $id";
   $result_product = mysqli_query($conn,$sql_product);

   if(mysqli_num_rows($result_product)>0){
     while($row2 = mysqli_fetch_array($result_product)){
       $name = $row2['name'];
       $price = $row2['price'];
      
      
       $data = [
        'price_data' => [
          'currency' => 'aed',
          'product_data' => [
            'name' => $name,
           
          ],
          'unit_amount' => $price*100,
        ],
        'quantity' => $quantity,
      ];

      array_push($products_inside_cart,$data);
      
     }
   }
 }
}
else{
  header("Location:user.php");
}
// print_r($products_inside_cart);
// $products_inside_cart = [ [
//   'price_data' => [
//     'currency' => 'usd',
//     'product_data' => [
//       'name' => 'shirt',
     
//     ],
//     'unit_amount' => 2000,
//   ],
//   'quantity' => 3,
// ],
// [
//   'price_data' => [
//     'currency' => 'usd',
//     'product_data' => [
//       'name' => 'hossam',
     
//     ],
//     'unit_amount' => 1000,
//   ],
//   'quantity' => 1,
// ]];


$session_products_info = [
  'payment_method_types' => ['card'],
  'line_items' => $products_inside_cart
   ,
  'mode' => 'payment',
  'success_url' => 'http://localhost/onlinestore/success.html',
  'cancel_url' => 'http://localhost/onlinestore/user.php',
  ];
$session = \Stripe\Checkout\Session::create($session_products_info);

?>

<html>
  <head>
    <title>Buy cool new product</title>
    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <body>
    <!-- <button id="checkout-button">Checkout</button> -->
    <script>
      // var stripe = Stripe('pk_test_51KlIrDGzyYPgP3RCl9bkMaTUqZdNNkXNIpLVGN7lOswQWFMACdNSGzkkIgAiUjfv75XaoyRVGj18btfn82VaEN6C00JxUbgkBl');
      // const btn = document.getElementById("checkout-button")
      // btn.addEventListener('click', function(e) {
      //   e.preventDefault();
      //   stripe.redirectToCheckout({
      //     sessionId: "<?php // echo $session->id; ?>"
      //   });
      // });

      var stripe = Stripe('pk_test_51KlIrDGzyYPgP3RCl9bkMaTUqZdNNkXNIpLVGN7lOswQWFMACdNSGzkkIgAiUjfv75XaoyRVGj18btfn82VaEN6C00JxUbgkBl');
     
      
        stripe.redirectToCheckout({
          sessionId: "<?php  echo $session->id; ?>"
       
      });
    </script>
  </body>
</html>