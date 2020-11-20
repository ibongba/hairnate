<?php

	date_default_timezone_set('Asia/Bangkok');

	if($_POST['mail']){
		$mailto = $_POST['mail'];
		$mailSub = "ใกล้ได้เวลาตัดผลแล้วนะ";
		$mailMsg = "โปรดอย่าลืมวันเวลาตามนัด ขอบคุณครับ";
		 
		require 'PHPMailer/PHPMailerAutoload.php';
		$mail = new PHPMailer();
		$mail->IsSmtp();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587; // or 587
		$mail->IsHTML(true);
		$mail->CharSet="utf-8";
		$mail->ContentType="text/html";
		$mail->Username = "exhairnate@gmail.com"; //username gmail accound
		$mail->Password = "yokblrbxjwcqhhaz"; //password gmail accound
		$mail->SetFrom("no-reply@gmail.com", "Company name");
		// $mail->AddReplyTo("yourmail@gmail.com", "Company name");
		$mail->Subject = $mailSub;
		$mail ->Body = $mailMsg;
		$mail ->AddAddress($mailto);
		 
		if(!$mail->Send()){
		  echo "Mail Not Sent";
		}
		else{
		  echo "Mail Sent";
		}
	}
?>