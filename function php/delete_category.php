<?php
session_start();
require 'conn.php';

$id = $_GET['id'];

$sql = ' DELETE FROM `tbl_category` WHERE id = '.$id;
$conn->query($sql);



$_SESSION['notif_title'] = "Success";
$_SESSION['notif_style'] = "green";
$_SESSION['notif'] = "Category successfully deleted!";

header('location: ../admin/categories.php');