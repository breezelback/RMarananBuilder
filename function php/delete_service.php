<?php
session_start();
require 'conn.php';

$id = $_GET['id'];
$service_image = $_GET['service_image'];

$sql = ' DELETE FROM `tbl_services` WHERE id = '.$id;
$conn->query($sql);

$target_file = "../images/services/".$service_image;

unlink($target_file);


$_SESSION['notif_title'] = "Success";
$_SESSION['notif_style'] = "green";
$_SESSION['notif'] = "Service successfully deleted!";

header('location: ../admin/services.php');