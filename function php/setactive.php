<?php 
session_start();
require 'conn.php';

$address_id = $_GET['id'];

 

$updateAddress = ' UPDATE `tbl_address` SET status = 0 WHERE user_id = '.$_SESSION['id'].' ';
$conn->query($updateAddress);


$setActive = ' UPDATE `tbl_address` SET status = 1 WHERE id = '.$address_id.' ';
$conn->query($setActive);


$_SESSION['toastr']['title'] = 'Looking Good!';
$_SESSION['toastr']['message'] = 'Address Successfully Set.';
$_SESSION['toastr']['color'] = 'green';
header('location: ../profile.php');

