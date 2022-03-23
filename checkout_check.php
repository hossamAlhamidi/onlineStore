<?php 

if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['phone'])){
    echo "yes";
    header("LOCATION: account.php");
} 
else {

}


?>