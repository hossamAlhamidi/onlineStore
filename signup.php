<?php

use PHPMailer\PHPMailer\PHPMailer;

include 'config.php';

// error_reporting(0);

session_start();

// if (isset($_SESSION['username'])) {
//     if ($_SESSION["type"] == 0)
//         header("Location: user.php");
    // if(isset($_SESSION['type']==0))
    //     header("Location: user.php");
    // if(isset($_SESSION['type']==1))
    //     header("Location: seller.php");
// }



if (isset($_POST["submit"])) {
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = md5($_POST["password"]);
	$cpassword = md5($_POST['cpassword']);
	$type = 0;
	

	if ($password == $cpassword) {
		$sql = "SELECT * FROM user WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO user (name, email, PWD, type, phone,  address_city, address, postcode)
					VALUES ('$username', '$email', '$password', '$type', null, null, null, null)";
			$result = mysqli_query($conn, $sql);
			if ($result) {
                // require_once("mail.php");
                // $mail->setFrom('blue10wave@gmail.com',"hossam");
                // $mail->addAddress('hossam@nrt.sa');
                // $mail->Subject = 'trial';
                // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                // $mail->send();
           
              echo "<script>alert('Wow! User Registration Completed.')</script>";
                header("Location: signin.php");
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}	
	} else {
        echo "<script>alert('Password Not Matched.')</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signup.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Sign up</title>
</head>
<body>
   <div class="container">
       <form  class="form" id="form" action="" method="POST">
           <div class="header">
               <h2>Create Account</h2>
           </div>
    <div class="padding">
    <div class="form-control ">
     <label for="userName">User Name</label>
     <input type="text" placeholder="Enter your User Name" id="userName" name="username" value="<?php echo $username; ?>" >
     <i class="fas fa-check-circle"></i>
     <i class="fas fa-exclamation-circle"></i>
     <small>error msg</small>
    </div>

    <div class="form-control  ">
        <label for="email"> Email</label>
        <input type="text" placeholder="Enter your email" id="email" name="email" value="<?php echo $email; ?>" >
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>

       <div class="form-control ">
        <label for="password">Password</label>
        <input type="password" placeholder="Enter your password" id="password" name="password" >
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>

       <div class="form-control ">
        <label for="confrim-password">Confirm Password</label>
        <input type="password" placeholder="Confirm your password" id="confirm-password" name="cpassword" >
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>

       <!-- <div class="form-control radio ">
           <p>Create as</p>
         <div>
             <input type="radio" name="role" id="customer" checked>
             <label for="customer" > customer</label>
            </div>  
             
            <div>

                <input type="radio" name="role" id="seller">
                <label for="seller"> seller</label>
            </div>
             
        
       </div> -->
       <div>
           <button id="submit" name="submit" type="submit">Create</button>

       </div>
    </form>
</div>

   </div> 
   <script  src="./js/signup.js"></script>
</body>
</html>