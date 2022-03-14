<?php

include 'config.php';

session_start();

if (isset($_SESSION['name'])) {
    if ($_SESSION["type"] == 0)
        header("Location: user.php");
    else if ($_SESSION["type"] == 1)
        header("Location: seller.php");
}

$e = false;

if (isset($_POST["submit"])) {
	$email = $_POST["email"];
	$password = md5($_POST["password"]);

	$con = new PDO('mysql:host=localhost;dbname=onlineshoppingsystem', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$request = $con->query("SELECT * FROM user WHERE email = '".$email."' AND PWD = '".$password."'");


	if ($request->rowCount() == 1) {
		$info = $request->fetch();

		$_SESSION["name"] = $info["name"];
		$_SESSION["email"] = $info["email"];
		$_SESSION["type"] = $info["type"];

        if($_SESSION["type"] == 0)
		    header("location: user.php");
        if($_SESSION["type"] == 1)
            header("location: seller.php");
	}else {
		$e = true;  
	}
}
