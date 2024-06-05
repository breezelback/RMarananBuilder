<?php 
session_start();
require 'conn.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$contact_number = $_POST['contact_number'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$newpass = $_POST['password'];
$confpass = $_POST['confirm_password'];



if ($newpass != $confpass) 
{
	$_SESSION['toastr']['title'] = 'Error!';
	$_SESSION['toastr']['message'] = 'Password did not match';
	$_SESSION['toastr']['color'] = 'red';
	// header('location: ../profile.php');
	echo "<script>javascript:history.go(-1)</script>";
}
else
{
	$sql = ' UPDATE tbl_user SET firstname = "'.$firstname.'", lastname = "'.$lastname.'", contact_number = "'.$contact_number.'", email = "'.$email.'", gender = "'.$gender.'", birthdate = "'.$birthdate.'", password = "'.$newpass.'" WHERE id = '.$_SESSION['id'].' ';

	$conn->query($sql);


	$_SESSION['toastr']['title'] = 'Looking Good!';
	$_SESSION['toastr']['message'] = 'Profile Successfully Updated.';
	$_SESSION['toastr']['color'] = 'green';
	// header('location: ../profile.php');
	echo "<script>javascript:history.go(-1)</script>";
}





