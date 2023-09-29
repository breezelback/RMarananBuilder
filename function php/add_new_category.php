<?php 
session_start();
require 'conn.php';
$category = $_POST['category'];


$sql = ' INSERT INTO `tbl_category`(`category`, `date_created`) VALUES ("'.$category.'", NOW()) ';
$exec = $conn->query($sql);


$_SESSION['notif_title'] = "Success";
$_SESSION['notif_style'] = "green";
$_SESSION['notif'] = "Looking good ";


header('location: ../admin/categories.php');