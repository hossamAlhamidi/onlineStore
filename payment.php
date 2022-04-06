

<?php
include 'config.php';
if(!isset($_SESSION)){
  session_start();
}
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_51KlIrDGzyYPgP3RCBZs6nELE5Xx2FHc8Chrik3VRD2ORTpcdW8rK90lqO9IcorzLS71jMTswMp7o77EaZfNqG8qL00xBTUR32g');

$session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'usd',
      'product_data' => [
        'name' => 'shirt',
       
      ],
      'unit_amount' => 2000,
    ],
    'quantity' => 3,
  ],[
    'price_data' => [
      'currency' => 'usd',
      'product_data' => [
        'name' => 'hossam',
       
      ],
      'unit_amount' => 1000,
    ],
    'quantity' => 3,
  ]],
  'mode' => 'payment',
  'success_url' => 'http://localhost/onlinestore/success.html',
  'cancel_url' => 'http://localhost/onlinestore/user.php',
]);

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
          sessionId: "<?php echo $session->id; ?>"
       
      });
    </script>
  </body>
</html>