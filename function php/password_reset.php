<?php 
session_start();
require 'conn.php';

require 'sendMail.php';

$email = $_POST['userEmailVal'];

$sqlEmail = ' SELECT id FROM tbl_user WHERE email = "'.$email.'" ';
$execEmail = $conn->query($sqlEmail);

if($execEmail->num_rows < 1){
	$_SESSION['toastr']['title'] = 'Error!';
	$_SESSION['toastr']['message'] = 'Email not found.';
	$_SESSION['toastr']['color'] = 'red';
	header('location: ../login.php');
}
else{
	$newPass = substr(sha1(mt_rand()),17,6);

	send_mail_admin($email, "PASSWORD RESET", "Hello User, <br><br>Your password has been reset successfully.<br> Your new password is: <b>".$newPass."</b><br><br>Best Regards,<br>R Maranan Builders");

	$sqlUpdate = ' UPDATE tbl_user SET password = "'.$newPass.'" WHERE email = "'.$email.'" ';
	
	$conn->query($sqlUpdate);

	$_SESSION['toastr']['title'] = 'Success!';
	$_SESSION['toastr']['message'] = 'Your new password has been successfully sent to your email.';
	$_SESSION['toastr']['color'] = 'green';
	header('location: ../login.php');
}
