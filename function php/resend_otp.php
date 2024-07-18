<?php 
session_start();
require 'conn.php';
require 'sendMail.php';

// send_mail_admin($user['email'], $order_status." - ".$order['transaction_id'], "Hello ".$name.", <br><br>Please be advised that your order is now <b>".$order_status."</b>.<br><br>Thank you and best Regards,<br>R Maranan Builders");
$email = $_GET['email'];
$otp = mt_rand(100000,999999); 
// $otp = substr(sha1(mt_rand()),17,6);

$sql = " UPDATE tbl_user SET otp = '".$otp."' WHERE email = '".$email."' ";

$conn->query($sql);

send_mail_admin($email, "One Time Pin", "Hello User, <br><br>Your new one time pin is: <b>".$otp."</b>.<br><br>Thank you and best Regards,<br>R Maranan Builders");


$_SESSION['toastr']['title'] = 'Looking Good!';
$_SESSION['toastr']['message'] = 'OTP has been sent to your email.';
$_SESSION['toastr']['color'] = 'green';
// header('location: ../login.php');
header('location: ../verify-otp.php?email='.$email);