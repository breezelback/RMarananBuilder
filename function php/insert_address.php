<?php 
session_start();
require 'conn.php';

$user_id = $_POST['user_id'];
$house_number = $_POST['house_number'];
$barangay = $_POST['barangay'];
$city = $_POST['city'];
$province = $_POST['province'];
$zip_code = $_POST['zip_code'];

 

$insertAddress = ' INSERT INTO `tbl_address`(`user_id`, `house_number`, `barangay`, `citymun`, `province`, `zip_code`, `status`, `date_created`) VALUES ('.$user_id.', "'.$house_number.'", "'.$barangay.'", "'.$city.'", "'.$province.'", "'.$zip_code.'", 0, NOW()) ';
$conn->query($insertAddress);



$_SESSION['toastr']['title'] = 'Looking Good!';
$_SESSION['toastr']['message'] = 'Address Successfully Added.';
$_SESSION['toastr']['color'] = 'green';
header('location: ../profile.php');

