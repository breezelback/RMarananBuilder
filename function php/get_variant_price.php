<?php 
session_start();
require('conn.php');

$variant_id = $_GET['variant_id'];

$selectSection = 'SELECT `id`, `product_id`, `option_name`, `price` FROM `tbl_item_options` WHERE id = "'.$variant_id.'"';

$execSection = $conn->query($selectSection);
$section = $execSection->fetch_assoc();

echo $section['price'];




