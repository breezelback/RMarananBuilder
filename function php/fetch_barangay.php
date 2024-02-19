<?php 
session_start();
require('conn.php');

$city_id = $_GET['city_id'];

$selectSection = 'SELECT `id`, `brgyCode`, `brgyDesc`, `regCode`, `provCode`, `citymunCode` FROM `refbrgy` WHERE citymunCode = "'.$city_id.'"';

$execSection = $conn->query($selectSection);
$array_section = array();
if ($execSection->num_rows > 0) 
{
	while ($section = $execSection->fetch_array())
	{
		$array_section[$section['brgyCode']] = $section['brgyDesc'];
	}
		
		echo json_encode($array_section);
}
else
{
	echo "";
}




