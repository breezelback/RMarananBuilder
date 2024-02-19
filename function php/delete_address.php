<?php 
session_start();
require 'conn.php';

$address_id = $_GET['id'];

 
$setActive = ' DELETE FROM `tbl_address` WHERE id = '.$address_id.' ';
$conn->query($setActive);


$_SESSION['toastr']['title'] = 'Looking Good!';
$_SESSION['toastr']['message'] = 'Address Successfully Deleted.';
$_SESSION['toastr']['color'] = 'green';
header('location: ../profile.php');

