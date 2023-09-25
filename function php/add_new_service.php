<?php 
session_start();
require 'conn.php';
$service_image = $_POST['service_image'];
$title = $_POST['title'];
$details = $_POST['details'];
$service_price = $_POST['service_price'];


$target_dir = "../images/services/";
$path = $_FILES['service_image']['name']; 
$ext = pathinfo($path, PATHINFO_EXTENSION);
$filename = time().'.'.$ext;

$target_file = $target_dir . $filename;

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check file size
if ($_FILES["service_image"]["size"] > 5000000) {
	$_SESSION['notif'] = "Sorry, your file is too large. Maximum of 5MB filesize.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	$_SESSION['notif'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  // echo "Sorry, your file was not uploaded.";
	$_SESSION['notif_title'] = "Error";
	$_SESSION['notif_style'] = "red";
	// $_SESSION['notif'] = "There was an error ";


} 
else 
{

 	move_uploaded_file($_FILES["service_image"]["tmp_name"], $target_file);

 	$sql = ' INSERT INTO `tbl_services`(`service_image`, `title`, `details`, `service_price`, `date_created`) VALUES ("'.$filename.'", "'.$title.'", "'.$details.'", "'.$service_price.'", NOW()) ';
 	$exec = $conn->query($sql);


	$_SESSION['notif_title'] = "Success";
	$_SESSION['notif_style'] = "green";
	$_SESSION['notif'] = "Looking good ";

}

header('location: ../admin/services.php');