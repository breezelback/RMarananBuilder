<?php 
require 'conn.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$contact_number = $_POST['contact_number'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$password = $_POST['password'];
// $confirm_password = $_POST['confirm_password'];
// $address = $_POST['address'];

$sql = " INSERT INTO tbl_user(firstname, lastname, contact_number, email, gender, birthdate, status, date_created, user_type, password) VALUES ('".$firstname."', '".$lastname."', '".$contact_number."', '".$email."', '".$gender."', '".$birthdate."', 'active', NOW(), 'user', '".$password."') ";

$conn->query($sql);

header('location: ../login.php');