<?php 
session_start();
require 'conn.php';

$transaction_id = $_POST['transaction_id'];
$item_id = $_POST['item_id'];
$userReview = $_POST['userReview'];
$reviewStar = $_POST['reviewStar'];

$sql = ' INSERT INTO `tbl_review`(`user_id`, `transaction_id`, `item_id`, `review`, `date_created`, `reviewStar`) VALUES ( '.$_SESSION['id'].', '.$transaction_id.', '.$item_id.', "'.$userReview.'", NOW(), '.$reviewStar.' ) ';
$conn->query($sql);

$_SESSION['toastr']['title'] = 'Success';
$_SESSION['toastr']['message'] = 'Review Successfully Added!';
$_SESSION['toastr']['color'] = 'green';

header('location: ../view_order.php?id='.$transaction_id);