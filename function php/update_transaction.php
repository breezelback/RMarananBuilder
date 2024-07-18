<?php 
session_start();
require 'conn.php';
require 'sendMail.php';

$id = $_GET['id'];
$order_status = $_POST['order_status'];


$sqlOrder = 'SELECT `transaction_id`, `user_id`, `address_id`, `total` FROM tbl_transaction WHERE id = '.$id;
$execOrder = $conn->query($sqlOrder);
$order = $execOrder->fetch_assoc();


$sqlUser = 'SELECT firstname, lastname, email FROM tbl_user WHERE id = '.$order['user_id'];
$execUser = $conn->query($sqlUser);
$user = $execUser->fetch_assoc();
$name = $user['firstname'].' '.$user['lastname'];

send_mail_admin($user['email'], $order_status." - ".$order['transaction_id'], "Hello ".$name.", <br><br>Please be advised that your order is now <b>".$order_status."</b>.<br><br>Thank you and best Regards,<br>R Maranan Builders");

if ($order_status == "Completed") 
{
	$sql = ' UPDATE `tbl_transaction` SET `status`= "'.$order_status.'", date_finished = NOW(), updated_by = '.$_SESSION['id'].' WHERE id = '.$id ;

	$selectItems = 'SELECT quantity, item_id FROM transaction_item WHERE transaction_id = "'.$order['transaction_id'].'" ';
	$execItems = $conn->query($selectItems);
	while ($rowItems = $execItems->fetch_assoc()) 
	{
		$updateItems = ' UPDATE tbl_item_options SET quantity = quantity - '.$rowItems['quantity'].' WHERE id = '.$rowItems['item_id'];
		$conn->query($updateItems);
	}
}
else
{
	$sql = ' UPDATE `tbl_transaction` SET `status`= "'.$order_status.'", updated_by = '.$_SESSION['id'].' WHERE id = '.$id ;
}
$conn->query($sql);


$_SESSION['toastr']['title'] = 'Success';
$_SESSION['toastr']['message'] = 'Transaction Successfully Updated!';
$_SESSION['toastr']['color'] = 'green';
 
header('location: ../admin/view_order.php?id='.$id); 

