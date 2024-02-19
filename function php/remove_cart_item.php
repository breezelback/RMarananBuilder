<?php 
session_start();
require('conn.php');

$id = $_GET['id'];

$selectSection = ' SELECT `id`, `user_id`, `product_id`, `quantity`, `price`, `status`, `date_created` FROM `tbl_cart` WHERE id = "'.$id.'"';

$execSection = $conn->query($selectSection);
$section = $execSection->fetch_assoc();

if ($section['quantity'] > 1) 
{
	$decreaseItem = ' UPDATE tbl_cart SET quantity = quantity - 1 WHERE id = "'.$id.'" ';
	$conn->query($decreaseItem);
}
else
{
	$removeItem = ' DELETE FROM tbl_cart WHERE id = "'.$id.'" ';
	$conn->query($removeItem);
}

echo "<script>javascript:history.go(-1)</script>";




