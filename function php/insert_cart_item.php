<?php 
session_start();
require 'conn.php';

$user_id = $_GET['user_id'];
$product_id = $_GET['product_id'];
$order_qty = $_GET['order_qty'];
$selectProductOption = $_GET['selectProductOption'];
$item_id = $_GET['variant_id'];


$selectItem = ' SELECT `id`, `user_id`, `product_id`, `quantity`, `price`, `status`, `date_created` FROM `tbl_cart` WHERE user_id = '.$user_id.' AND product_id = '.$product_id.' AND price = '.$selectProductOption.' AND status = "Pending" ';
$exec = $conn->query($selectItem);

if ($exec->num_rows > 0) 
{
	$sqlUpdate = ' UPDATE tbl_cart SET quantity = quantity + '.$order_qty.' WHERE user_id = '.$user_id.' AND product_id = '.$product_id.' AND price = '.$selectProductOption.' AND status = "Pending" ';
	$conn->query($sqlUpdate);
}
else
{
	$sql = ' INSERT INTO `tbl_cart`(`user_id`, `product_id`, `quantity`, `price`, `status`, `date_created`,`item_id`) VALUES ( '.$user_id.', '.$product_id.', '.$order_qty.', '.$selectProductOption.', "Pending", NOW(), '.$item_id.' ) ';

	$conn->query($sql);
}


$_SESSION['toastr']['title'] = 'Looking Good!';
$_SESSION['toastr']['message'] = 'Item successfully added to cart.';
$_SESSION['toastr']['color'] = 'green';






