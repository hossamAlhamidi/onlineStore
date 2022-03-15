<?php 
include 'config.php';

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


  $email = $_SESSION['email'];
  $sql = "select SUM(price) s from cart where email = '$email' ";
$result =  mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  echo $row['s'] . "SR";

?>