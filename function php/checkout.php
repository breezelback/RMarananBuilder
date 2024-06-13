<?php 
session_start();
require 'conn.php';

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


$transaction_id = 'RMB'.date('Y').$last_id;
$user_id = $_SESSION['id'];
$address_id = $_POST['address_id'];
$total = $_POST['total'];
$mop = $_POST['mop'];


$getCart = ' SELECT `id`, `user_id`, `product_id`, `quantity`, `price`, `status`, `date_created`, `transaction_id` FROM `tbl_cart` WHERE user_id = '.$user_id;
$execGetCart = $conn->query($getCart);
while ($rowCart = $execGetCart->fetch_assoc()) 
{
	$sqlInsertTransaction = ' INSERT INTO `transaction_item`(`user_id`, `product_id`, `quantity`, `price`, `status`, `date_created`, `transaction_id`) VALUES ( '.$user_id.', '.$rowCart['product_id'].', '.$rowCart['quantity'].', '.$rowCart['price'].', "Pending", NOW(),"'.$transaction_id.'" ) ';
	$execSqlInsertTransaction = $conn->query($sqlInsertTransaction);
}

$sqlDel = ' DELETE FROM tbl_cart WHERE user_id = '.$user_id;
$conn->query($sqlDel);


if ($mop == "Cash on Delivery") {
	$insertTransaction = ' INSERT INTO `tbl_transaction`(`transaction_id`, `user_id`, `address_id`, `total`, `mode_of_payment`, `status`, `date_created`) VALUES ("'.$transaction_id.'", '.$user_id.', '.$address_id.', '.$total.', "'.$mop.'", "Pending", NOW()) ';
	$conn->query($insertTransaction);

	$_SESSION['toastr']['title'] = 'Looking Good!';
	$_SESSION['toastr']['message'] = 'Order Successfully Completed. You may track the status on your profile.';
	$_SESSION['toastr']['color'] = 'green';
	header('location: ../profile.php');
} 
else if ($mop == "Bank Transfer") {
 	// $insertTransaction = ' INSERT INTO `tbl_transaction`(`transaction_id`, `user_id`, `address_id`, `total`, `mode_of_payment`, `status`, `date_created`) VALUES ("'.$transaction_id.'", '.$user_id.', '.$address_id.', '.$total.', "'.$mop.'", "Pending", NOW()) ';
	header('location: ../checkout_bank.php');
} 
else if ($mop == "bank_confirm") {
	$target_dir = "../images/proof/";
	// $proof_of_payment = $_POST['proof_of_payment'];

    $filename = $last_id.'-'.time().'-'.$_FILES['proof_of_payment']['name'];
    $filesize = $_FILES['proof_of_payment']['size'];
    $filetempname = $_FILES['proof_of_payment']['tmp_name'];

    $fileext = pathinfo($filename, PATHINFO_EXTENSION);
    $fileext = strtolower($fileext);

    $target_file = $target_dir . $filename;

    if ($fileext != "jpg" && $fileext != "png" && $fileext != "jpeg"&& $fileext != "gif") 
    {
		$_SESSION['toastr']['title'] = 'Error!';
		$_SESSION['toastr']['message'] = 'Only PNG, JPG, JPEG, and GIF are accepted file type.';
		$_SESSION['toastr']['color'] = 'red';
		header('location: ../checkout_bank.php');
    }
    else
    {
		move_uploaded_file($_FILES["proof_of_payment"]["tmp_name"], $target_file);

		$insertTransaction = ' INSERT INTO `tbl_transaction`(`transaction_id`, `user_id`, `address_id`, `total`, `mode_of_payment`, `status`, `date_created`, `proof_of_payment`) VALUES ("'.$transaction_id.'", '.$user_id.', '.$address_id.', '.$total.', "Bank Transfer", "Pending", NOW(), "'.$filename.'") ';
		$conn->query($insertTransaction);

		$_SESSION['toastr']['title'] = 'Looking Good!';
		$_SESSION['toastr']['message'] = 'Order Successfully Completed. You may track the status on your profile.';
		$_SESSION['toastr']['color'] = 'green';

		// header('location: ../checkout_bank.php');
		header('location: ../profile.php');
    }

} 
else if($mop = "Paypal")
{
 	// header('location: https://www.sandbox.paypal.com/ncp/payment/YHXN87NRBFVP6');
	header('location: ../checkout_paypal.php');
}
else
{
 	$insertTransaction = ' INSERT INTO `tbl_transaction`(`transaction_id`, `user_id`, `address_id`, `total`, `mode_of_payment`, `status`, `date_created`) VALUES ("'.$transaction_id.'", '.$user_id.', '.$address_id.', '.$total.', "'.$mop.'", "Pending", NOW()) ';
}




die();
$insertTransaction = ' INSERT INTO `tbl_transaction`(`transaction_id`, `user_id`, `address_id`, `total`, `mode_of_payment`, `status`, `date_created`) VALUES ("'.$transaction_id.'", '.$user_id.', '.$address_id.', '.$total.', "'.$mop.'", "Pending", NOW()) ';
$conn->query($insertTransaction);



// $_SESSION['toastr']['title'] = 'Looking Good!';
// $_SESSION['toastr']['message'] = 'Address Successfully Added.';
// $_SESSION['toastr']['color'] = 'green';
// header('location: ../profile.php');

