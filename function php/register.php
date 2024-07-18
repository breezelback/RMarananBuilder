<?php 
session_start();
require 'conn.php';
require 'sendMail.php';

// send_mail_admin($user['email'], $order_status." - ".$order['transaction_id'], "Hello ".$name.", <br><br>Please be advised that your order is now <b>".$order_status."</b>.<br><br>Thank you and best Regards,<br>R Maranan Builders");

$otp = mt_rand(100000,999999); 
// $otp = substr(sha1(mt_rand()),17,6);


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$contact_number = $_POST['contact_number'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
// $address = $_POST['address'];
$house_number = $_POST['house_number'];
$barangay = $_POST['barangay'];
$city = $_POST['city'];
$province = $_POST['province'];
$zip_code = $_POST['zip_code'];

 

if ($password != $confirm_password) 
{
	$_SESSION['toastr']['title'] = 'Error!';
	$_SESSION['toastr']['message'] = 'Password do not match';
	$_SESSION['toastr']['color'] = 'red';
	header('location: ../register.php');
}
else
{
	$sqlEmail = ' SELECT id FROM tbl_user WHERE email = "'.$email.'" ';
	$execEmail = $conn->query($sqlEmail);

	if($execEmail->num_rows > 0){
		$_SESSION['toastr']['title'] = 'Error!';
		$_SESSION['toastr']['message'] = 'Email already exist.';
		$_SESSION['toastr']['color'] = 'red';
		header('location: ../register.php');
	}
	else{
		$sql = " INSERT INTO tbl_user(firstname, lastname, contact_number, email, gender, birthdate, status, date_created, user_type, password, otp) VALUES ('".$firstname."', '".$lastname."', '".$contact_number."', '".$email."', '".$gender."', '".$birthdate."', 'inactive', NOW(), 'user', '".$password."', '".$otp."') ";

		$conn->query($sql);
		$last_id = $conn->insert_id;

		$insertAddress = ' INSERT INTO `tbl_address`(`user_id`, `house_number`, `barangay`, `citymun`, `province`, `zip_code`, `status`, `date_created`) VALUES ('.$last_id.', "'.$house_number.'", "'.$barangay.'", "'.$city.'", "'.$province.'", "'.$zip_code.'", 1, NOW()) ';
		$conn->query($insertAddress);

		// $_SESSION['id'] = $row['last_id'];


		send_mail_admin($email, "One Time Pin", "Hello ".$lastname.", <br><br>Your one time pin is: <b>".$otp."</b>.<br><br>Thank you and best Regards,<br>R Maranan Builders");


		$_SESSION['toastr']['title'] = 'Looking Good!';
		$_SESSION['toastr']['message'] = 'User Successfully Registered.';
		$_SESSION['toastr']['color'] = 'green';
		// header('location: ../login.php');
		header('location: ../verify-otp.php?email='.$email);
	}
}
