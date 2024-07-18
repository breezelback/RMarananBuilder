<?php 
session_start();
require 'conn.php';

$email = $_POST['email'];
$otp = $_POST['otp'];

$sql = ' SELECT `id`, `firstname`, `lastname`, `contact_number`, `email`, `gender`, `birthdate`, `status`, `date_created`, `user_type`, `password` FROM `tbl_user` WHERE email = "'.$email.'" AND otp = "'.$otp.'" ';

$exec = $conn->query($sql);
if ($exec->num_rows > 0) 
{
	$sql = " UPDATE tbl_user SET status = 'active' WHERE email = '".$email."' ";
	$exec = $conn->query($sql);

	$_SESSION['toastr']['title'] = 'Looking Good!';
	$_SESSION['toastr']['message'] = 'Account has been successfully verified.';
	$_SESSION['toastr']['color'] = 'green';
	// header('location: ../login.php');
	header('location: ../login.php');
}
else
{
	$_SESSION['toastr']['title'] = 'Error!';
	$_SESSION['toastr']['message'] = 'Incorrect OTP';
	$_SESSION['toastr']['color'] = 'red';
	// header('location: ../login.php');
	header('location: ../verify-otp.php?email='.$email);
}

