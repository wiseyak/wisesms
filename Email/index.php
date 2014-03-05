<?php 
	require_once("EmailSender.php");
	$result = $emailSender->sendEmail('sujana.tamang@wiseyak.com','Whats up sujana','Subject of email');
	//var_dump($result[0]['status']);
	if($result[0]['status']=='sent'){
		echo "Message sent successfully.";	
	}else{
		echo "There was an error sending the message.";
	}
?>