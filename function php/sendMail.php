<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_mail_admin($email, $subject, $body)
{

	//Load Composer's autoloader
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	// $mail->SMTPDebug = 2;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com';					
	$mail->SMTPAuth = true;					
	// $mail->Username = 'ayosthetic@gmail.com';				
	// $mail->Password = 'wkrfscekmdndzuyg';					
	$mail->Username = 'rmarananbuilder@gmail.com';				
	$mail->Password = 'ghyw qysi quwj nggp';					
	// $mail->Username = 'rmarananb@gmail.com';				
	// $mail->Password = 'kijk itsi mghx ncnz';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;
	$mail->setFrom('rmarananbuilder@gmail.com', 'R Maranan Builders');		
	$mail->addAddress($email);
	// $mail->addAddress('breezelback@gmail.com', 'Name');

	$mail->isHTML(true);								
	$mail->Subject = $subject;
	$mail->Body = $body.'<br><br><br><br>----------<i>This is an auto generated email.</i>----------';
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
}

