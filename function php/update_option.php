<?php 
session_start();
require 'conn.php';

$id = $_GET['id'];
$option_name = $_GET['option_name'];
$quantity = $_GET['quantity'];
$price = $_GET['price'];
$parent_id = $_GET['parent_id'];
$type = $_GET['type'];

$sql = ' UPDATE `tbl_item_options` SET `option_name` = '.$option_name.',`price` = '.$price.',`quantity` = '.$quantity.' WHERE id = '.$id ;
$conn->query($sql);



$_SESSION['toastr']['title'] = 'Success';
$_SESSION['toastr']['message'] = 'User Successfully Updated!';
$_SESSION['toastr']['color'] = 'green';
if ($type == "product") 
{
	header('location: ../admin/edit_product.php?id='.$parent_id); 
}
else
{
	header('location: ../admin/edit_service.php?id='.$parent_id); 
}



