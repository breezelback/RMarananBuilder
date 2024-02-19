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

 

echo $insertTransaction = ' INSERT INTO `tbl_transaction`(`transaction_id`, `user_id`, `address_id`, `total`, `mode_of_payment`, `status`, `date_created`) VALUES ("'.$transaction_id.'", '.$user_id.', '.$address_id.', '.$total.', "'.$mop.'", "Pending", NOW()) ';
$conn->query($insertTransaction);



// $_SESSION['toastr']['title'] = 'Looking Good!';
// $_SESSION['toastr']['message'] = 'Address Successfully Added.';
// $_SESSION['toastr']['color'] = 'green';
// header('location: ../profile.php');

