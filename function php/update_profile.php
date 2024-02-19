<?php 
session_start();
require 'conn.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$contact_number = $_POST['contact_number'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$newpass = $_POST['newpass'];
$confpass = $_POST['confpass'];


if ($newpass != "") 
{
	
	if ($newpass != $confpass) 
	{
		$_SESSION['toastr']['title'] = 'Error!';
		$_SESSION['toastr']['message'] = 'Password do not match';
		$_SESSION['toastr']['color'] = 'red';
		header('location: ../profile.php');
	}
	else
	{
		$sql = ' UPDATE tbl_user SET firstname = "'.$firstname.'", lastname = "'.$lastname.'", contact_number = "'.$contact_number.'", gender = "'.$gender.'", birthdate = "'.$birthdate.'", password = "'.$newpass.'" WHERE id = '.$_SESSION['id'].' ';

		$conn->query($sql);


		$_SESSION['toastr']['title'] = 'Looking Good!';
		$_SESSION['toastr']['message'] = 'Profile Successfully Updated.';
		$_SESSION['toastr']['color'] = 'green';
		header('location: ../profile.php');
	}
}
else
{
	$sql = ' UPDATE tbl_user SET firstname = "'.$firstname.'", lastname = "'.$lastname.'", contact_number = "'.$contact_number.'", gender = "'.$gender.'", birthdate = "'.$birthdate.'" WHERE id = '.$_SESSION['id'].' ';

	$conn->query($sql);


	$_SESSION['toastr']['title'] = 'Looking Good!';
	$_SESSION['toastr']['message'] = 'Profile Successfully Updated.';
	$_SESSION['toastr']['color'] = 'green';
	header('location: ../profile.php');	
}





