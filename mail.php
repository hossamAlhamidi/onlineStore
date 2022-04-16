<?php
// //Import PHPMailer classes into the global namespace
// //These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// //Load Composer's autoloader
// require 'mailer/autoload.php';

// //Create an instance; passing `true` enables exceptions
// $mail = new PHPMailer(true);

// // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
// $mail->isSMTP();                                            //Send using SMTP
// $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
// $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
// $mail->Username   = 'WebProject9091@gmail.com';                     //SMTP username
// $mail->Password   = '12qw90op12';                               //SMTP password
// $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
// $mail->Port       = 465;   
// $mail->isHTML(true);  

require 'vendor/autoload.php';
use Mailgun\Mailgun;
# Instantiate the client.
$mgClient = Mailgun::create('43adcbd7bc7d6f933829b0a15dbf763b-162d1f80-089c134a');
// $mgClient = new Mailgun('43adcbd7bc7d6f933829b0a15dbf763b-162d1f80-089c134a');
$domain = "sandbox9cc74cb140c84e2d9ca2392712ff3291.mailgun.org";
# Make the call to the client.
// $result = $mgClient->messages()->send($domain, array(
// 	'from'	=> 'Excited User <mailgun@sandbox9cc74cb140c84e2d9ca2392712ff3291.mailgun.org>',
// 	'to'	=> 'Baz <hossamAlhamidi@gmail.com>',
// 	'subject' => 'Hello',
// 	'text'	=> 'Testing some Mailgun !'
// ));

?>