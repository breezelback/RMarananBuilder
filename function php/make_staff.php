<?php 
session_start();
require 'conn.php';

$id = $_GET['id'];

$sql = ' UPDATE `tbl_user` SET `user_type`= "staff" WHERE id = '.$id ;
$conn->query($sql);


$_SESSION['toastr']['title'] = 'Success';
$_SESSION['toastr']['message'] = 'User Successfully Updated!';
$_SESSION['toastr']['color'] = 'green';
 
header('location: ../admin/users.php'); 

