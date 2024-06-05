<?php 
session_start();
require 'conn.php';

$name = $_POST['name'];
$quantity = $_POST['quantity'];
$details = $_POST['details'];
$category = $_POST['category'];
$type = $_GET['type'];
$id = $_GET['id'];

$sql = ' UPDATE `tbl_product` SET `name`= "'.$name.'" ,`details`= "'.$details.'" ,`quantity`= '.$quantity.' ,`category`= "'.$category.'"  WHERE id = '.$id ;
$conn->query($sql);

if ($type == "product") 
{
    $_SESSION['toastr']['title'] = 'Success';
    $_SESSION['toastr']['message'] = 'Product Successfully Updated!';
    $_SESSION['toastr']['color'] = 'green';
     
    header('location: ../admin/edit_product.php?id='.$id);
}
else
{
    $_SESSION['toastr']['title'] = 'Success';
    $_SESSION['toastr']['message'] = 'Service Successfully Updated';
    $_SESSION['toastr']['color'] = 'green';
     
    header('location: ../admin/edit_product.php?id='.$product_id);
}
