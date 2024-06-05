<?php 
session_start();
require 'conn.php';

$product_id = $_POST['product_id'];
$option_name = $_POST['option_name'];
$price = $_POST['price'];

$sql = ' INSERT INTO `tbl_item_options`(`product_id`, `option_name`, `price`) VALUES ( '.$product_id.', "'.$option_name.'", '.$price.' ) ';
$conn->query($sql);

// die();
$_SESSION['toastr']['title'] = 'Success';
$_SESSION['toastr']['message'] = 'Product Option Successfully Added!';
$_SESSION['toastr']['color'] = 'green';

header('location: ../admin/edit_product.php?id='.$product_id);