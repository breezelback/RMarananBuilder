<?php 
session_start();
require 'conn.php';

$id = $_GET['id'];
$product_id = $_GET['productId'];


$selectCart = ' SELECT `id`, `user_id`, `product_id`, `quantity`, `price`, `status`, `date_created`, `transaction_id` FROM `tbl_cart` WHERE price = '.$id.' AND status = "Pending" ';
$execCart = $conn->query($selectCart);

if ($execCart->num_rows>0) 
{
	$_SESSION['toastr']['title'] = 'Error';
	$_SESSION['toastr']['message'] = 'Cannot delete because this option is active in users cart!';
	$_SESSION['toastr']['color'] = 'red';

}
else
{
	$sql1 = ' DELETE FROM `tbl_item_options` WHERE id = '.$id;
	$exec1 = $conn->query($sql1);

	// die();
	$_SESSION['toastr']['title'] = 'Success';
	$_SESSION['toastr']['message'] = 'Option Successfully Deleted!';
	$_SESSION['toastr']['color'] = 'green';

}


header('location: ../admin/edit_product.php?id='.$product_id);