<?php 
session_start();
require('conn.php');

$prov_id = $_GET['prov_id'];

$selectSection = 'SELECT `id`, `psgcCode`, `citymunDesc`, `regDesc`, `provCode`, `citymunCode` FROM `refcitymun` WHERE provCode = "'.$prov_id.'"';

$execSection = $conn->query($selectSection);
$array_section = array();
if ($execSection->num_rows > 0) 
{
	while ($section = $execSection->fetch_array())
	{
		$array_section[$section['citymunCode']] = $section['citymunDesc'];
	}
		
		echo json_encode($array_section);
}
else
{
	echo "";
}




