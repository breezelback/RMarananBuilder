<?php 
session_start();
require('conn.php');


$email = $_POST['email'];
$password = $_POST['password'];

$sql = ' SELECT `id`, `firstname`, `lastname`, `contact_number`, `email`, `gender`, `birthdate`, `status`, `date_created`, `user_type`, `password` FROM `tbl_user` WHERE email = "'.$email.'" AND password = "'.$password.'" ';
$exec = $conn->query($sql);


if ($exec->num_rows > 0) 
{
	$row = $exec->fetch_assoc();

	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$contact_number = $row['contact_number'];
	$email = $row['email'];
	$gender = $row['gender'];
	$birthdate = $row['birthdate'];
	$user_type = $row['user_type'];

	$_SESSION['id'] = $row['id'];
	$_SESSION['firstname'] = $firstname;
	$_SESSION['lastname'] = $lastname;
	$_SESSION['contact_number'] = $contact_number;
	$_SESSION['email'] = $email;
	$_SESSION['gender'] = $gender;
	$_SESSION['birthdate'] = $birthdate;
	$_SESSION['user_type'] = $user_type;

	if ($user_type == 'user') {
		$_SESSION['toastr']['title'] = 'Looks Good!';
		$_SESSION['toastr']['message'] = 'Successfully Login';
		$_SESSION['toastr']['color'] = 'green';
		header('location: ../index.php');
	}
	else if($user_type == 'staff')
	{
		header('location: ../admin/transactions.php');	
	}
	else
	{
		header('location: ../admin/');	
	}

	// $_SESSION['toastr']['title'] = 'Looks Good!';
	// $_SESSION['toastr']['message'] = 'Successfully Login';
	// $_SESSION['toastr']['color'] = 'green';
}
else
{
	header('location: ../login.php');

	$_SESSION['toastr']['title'] = 'Error';
	$_SESSION['toastr']['message'] = 'User not found!';
	$_SESSION['toastr']['color'] = 'red';
}


 