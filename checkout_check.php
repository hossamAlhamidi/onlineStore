<?php 
include 'config.php';
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['email'])){
    header("LOCATION: signin.php");
}
else if(!isset($_SESSION['phone'])){
    
    header("LOCATION: profile.php");
} 
else {
    // header("Location: checkout_page.php");
    header("Location: payment.php");

}


?>