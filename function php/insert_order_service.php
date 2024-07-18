<?php 
session_start();
require 'conn.php';

$user_id = $_GET['user_id'];
$product_id = $_GET['product_id'];
// $order_qty = $_GET['order_qty'];
$order_qty = 1;
$selectProductOption = $_GET['selectProductOption'];
$order_description = $_GET['order_description'];

$item_id = $_GET['variant_id'];


$sqlProductOption = ' SELECT `id`, `product_id`, `option_name`, `price`, `quantity` FROM `tbl_item_options` WHERE id = '.$selectProductOption;
$execProdOption = $conn->query($sqlProductOption);
$productOption = $execProdOption->fetch_assoc();

// $productOption['price'];

$getLast = ' SELECT id FROM tbl_transaction ORDER BY id DESC LIMIT 1 ';
$execLast = $conn->query($getLast);
if ($execLast->num_rows > 0) 
{
	$resLast = $execLast->fetch_assoc();

	$last_id = $resLast['id'] + 1;
}
else
{
	$last_id = 1;
}

$sqlAddress = ' SELECT `id`, `status` FROM `tbl_address` WHERE user_id = '.$user_id;
$execAddress = $conn->query($sqlAddress);

if ($execAddress->num_rows > 0) 
{
	$address = $execAddress->fetch_assoc();
	if ($address['status'] == 1) 
	{

		$address_id = $address['id'];
		$total = $productOption['price'];
		$mop = "Cash on Delivery";
		$transaction_id = 'RMB'.date('Y').$last_id;

		$insertTransaction = ' INSERT INTO `tbl_transaction`(`transaction_id`, `user_id`, `address_id`, `total`, `mode_of_payment`, `status`, `date_created`, `details`) VALUES ("'.$transaction_id.'", '.$user_id.', '.$address_id.', '.$total.', "'.$mop.'", "Pending", NOW(), "'.$order_description.'") ';
		$conn->query($insertTransaction);

		$sqlInsertTransaction = ' INSERT INTO `transaction_item`(`user_id`, `product_id`, `quantity`, `price`, `status`, `date_created`, `transaction_id`, `item_id`) VALUES ( '.$user_id.', '.$productOption['product_id'].', 1, '.$selectProductOption.', "Pending", NOW(),"'.$transaction_id.'", 0 ) ';
		$conn->query($sqlInsertTransaction);
		
		$_SESSION['toastr']['title'] = 'Looking Good!';
		$_SESSION['toastr']['message'] = 'Order Successfully Completed. You may track the status on your profile.';
		$_SESSION['toastr']['color'] = 'green';

		// header('location: ../profile.php');
		echo "success";
	}
	else
	{
		$_SESSION['toastr']['title'] = 'Error!';
		$_SESSION['toastr']['message'] = 'Please set delivery address on your profile.';
		$_SESSION['toastr']['color'] = 'red';
		// header('location: ../view_service.php?id='.$productOption['product_id']);
		echo "error";
	}
}
else
{
	$_SESSION['toastr']['title'] = 'Error!';
	$_SESSION['toastr']['message'] = 'Please set delivery address on your profile.';
	$_SESSION['toastr']['color'] = 'red';
	// header('location: ../view_service.php?id='.$productOption['product_id']);
	echo "error";
}







