<?php

include 'config.php';

//session_start();

if (isset($_SESSION['name'])) {
    if ($_SESSION["type"] == 0)
        header("Location: user.php");
    else if ($_SESSION["type"] == 1)
        header("Location: seller.php");
}

function test_input($var) {
	$var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
}

$e = false;

if (isset($_POST["submit"])) {
	$email = test_input($_POST["email"]);
	$password = md5(test_input($_POST["password"]));

	$_SESSION["login_time_stamp"] = time(); 

	// $con = new PDO('mysql:host=localhost;dbname=onlineshoppingsystem', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	// $request = $con->query("SELECT * FROM user WHERE email = '".$email."' AND PWD = '".$password."'");

	$sql = "SELECT * FROM user WHERE email = '$email' AND PWD = '$password'";
	$request = mysqli_query($conn, $sql);

	//if ($request->rowCount() == 1) {
		//$info = $request->fetch();
	if ($request->num_rows == 1) { 
		$info = mysqli_fetch_assoc($request);

		$_SESSION["name"] = $info["name"];
		$_SESSION["email"] = $info["email"];
		$_SESSION["type"] = $info["type"];

		if(isset($info['phone'])){
			$_SESSION["phone"] = $info["phone"];
			$_SESSION["address_city"] = $info["address_city"];
			$_SESSION["address"] = $info["address"];
			$_SESSION["postcode"] = $info["postcode"];
		}

        if($_SESSION["type"] == 0)
		    header("location: user.php");
        if($_SESSION["type"] == 1)
            header("location: seller.php");
	}else {
		$e = true;  
	}
}
