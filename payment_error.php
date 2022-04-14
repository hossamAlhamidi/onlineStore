<?php 
include 'config.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
 
}
unset($_SESSION['payment']);
header("Location:user.php");
// if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
//   header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
//   die ("<h2>Access Denied!</h2> This file is protected and not available to public.");
//   }
// 




?>