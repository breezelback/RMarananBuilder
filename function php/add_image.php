<?php 
session_start();
require 'conn.php';

$product_id = $_POST['product_id'];


$target_dir = "../images/products/";

foreach ($_FILES['product_image']['tmp_name'] as $key => $val ) {

    $filename = $product_id.'-'.time().'-'.$_FILES['product_image']['name'][$key];
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

	   $sqlImage = ' INSERT INTO `tbl_product_image`(`product_id`, `image`) VALUES ('.$product_id.', "'.$filename.'") ';
	   $conn->query($sqlImage);
    }
}



$_SESSION['toastr']['title'] = 'Success';
$_SESSION['toastr']['message'] = 'Image Successfully Added';
$_SESSION['toastr']['color'] = 'green';
     
header('location: ../admin/edit_product.php?id='.$product_id);