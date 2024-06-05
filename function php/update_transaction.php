<?php 
session_start();
require 'conn.php';

$id = $_GET['id'];
$order_status = $_POST['order_status'];

$sql = ' UPDATE `tbl_transaction` SET `status`= "'.$order_status.'" WHERE id = '.$id ;
$conn->query($sql);


$_SESSION['toastr']['title'] = 'Success';
$_SESSION['toastr']['message'] = 'Transaction Successfully Updated!';
$_SESSION['toastr']['color'] = 'green';
 
header('location: ../admin/view_order.php?id='.$id); 

