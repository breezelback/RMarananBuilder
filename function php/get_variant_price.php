<?php 
session_start();
require('conn.php');

$variant_id = $_GET['variant_id'];

$selectSection = 'SELECT `id`, `product_id`, `option_name`, `price`, `quantity` FROM `tbl_item_options` WHERE id = "'.$variant_id.'"';

$execSection = $conn->query($selectSection);
$section = $execSection->fetch_assoc();

// print_r([1 => $section['price'], 2 =>  $section['quantity']]);
// echo $section['quantity'];


echo json_encode(array(
    "price" => $section['price'],
    "quantity" => $section['quantity'],
));


