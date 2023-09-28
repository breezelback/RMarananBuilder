<?php 
session_start();
require 'conn.php';

$name = $_POST['name'];
$details = $_POST['details'];
$quantity = $_POST['quantity'];


$target_dir = "../images/products/";

$sql = ' INSERT INTO `tbl_product`(`name`, `details`, `quantity`, `date_created`) VALUES ("'.$name.'", "'.$details.'", '.$quantity.', NOW()) ';
$exec = $conn->query($sql);

$last_id = mysqli_insert_id($conn);

foreach ($_FILES['product_image']['tmp_name'] as $key => $val ) {

    $filename = $last_id.'-'.time().'-'.$_FILES['product_image']['name'][$key];
    $filesize = $_FILES['product_image']['size'][$key];
    $filetempname = $_FILES['product_image']['tmp_name'][$key];

    $fileext = pathinfo($filename, PATHINFO_EXTENSION);
    $fileext = strtolower($fileext);

    $target_file = $target_dir . $filename;

    if ($fileext != "jpg" && $fileext != "png" && $fileext != "jpeg"&& $fileext != "gif") 
    {
    	// echo "invalid file type";
    }
    else
    {
	   move_uploaded_file($_FILES["product_image"]["tmp_name"][$key], $target_file);

	   $sqlImage = ' INSERT INTO `tbl_product_image`(`product_id`, `image`) VALUES ('.$last_id.', "'.$filename.'") ';
	   $conn->query($sqlImage);
    }
}


foreach ($_POST['item_option'] as $key => $val ) {

	$sqlOption = ' INSERT INTO `tbl_item_options`(`product_id`, `option_name`, `price`) VALUES ('.$last_id.', "'.$_POST['item_option'][$key].'", '.$_POST['price'][$key].') ';
	$conn->query($sqlOption);
	 
}