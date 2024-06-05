<?php 
session_start();
require 'conn.php';

$id = $_GET['id'];
$product_id = $_GET['productId'];



$selectImg = ' SELECT image FROM tbl_product_image WHERE id = '.$id;
$execImg = $conn->query($selectImg);
$rowImg = $execImg->fetch_assoc();

unlink('../images/products/'.$rowImg['image']);

$sql1 = ' DELETE FROM `tbl_product_image` WHERE id = '.$id;
$exec1 = $conn->query($sql1);

// die();
$_SESSION['toastr']['title'] = 'Success';
$_SESSION['toastr']['message'] = 'Image Successfully Deleted!';
$_SESSION['toastr']['color'] = 'green';

header('location: ../admin/edit_product.php?id='.$product_id);