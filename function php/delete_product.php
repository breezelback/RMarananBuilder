<?php 
session_start();
require 'conn.php';

$id = $_GET['id'];
$type = $_GET['type'];



$sql = ' DELETE FROM `tbl_product` WHERE id = '.$id;
$exec = $conn->query($sql);

$selectImgs = ' SELECT image FROM tbl_product_image WHERE product_id = '.$id;
$execImgs = $conn->query($selectImgs);
while ($rowImgs = $execImgs->fetch_assoc()) 
{
    unlink('../images/products/'.$rowImgs['image']);
}

$sql1 = ' DELETE FROM `tbl_product_image` WHERE product_id = '.$id;
$exec1 = $conn->query($sql1);

$sql2 = ' DELETE FROM `tbl_cart` WHERE product_id = '.$id;
$exec2 = $conn->query($sql2);

if ($type == "product") 
{
    $_SESSION['toastr']['title'] = 'Success';
    $_SESSION['toastr']['message'] = 'Product Successfully Deleted!';
    $_SESSION['toastr']['color'] = 'green';
     
    header('location: ../admin/products.php');
}
else
{
    $_SESSION['toastr']['title'] = 'Success';
    $_SESSION['toastr']['message'] = 'Service Successfully Deleted!';
    $_SESSION['toastr']['color'] = 'green';
     
    header('location: ../admin/services.php');
}