<?php
class EmailSender
{
	function __construct(){
		require_once("Mandrill.php");
	}
	function sendEmail($to,$msg,$subject){
		try {
		$mandrill = new Mandrill('HPIVaMykBByohSvom6_Tnw');
		$message = array(
			'html' => '<p>'. $msg .'</p>',
			//'text' => $msg,
			'subject' => $subject,
			'from_email' => 'messages@wiseyak.com',
			'from_name' => 'Wiseyak messaging service',
			'to' => array(
				array(
					'email' => $to,
					//'name' => 'Recipient Name',
					'type' => 'to'
				)
			),
			'headers' => array('Reply-To' => 'support@wiseyak.com'),
			'important' => false,
			'track_opens' => null,
			'track_clicks' => null,
			'auto_text' => null,
			'auto_html' => null,
			'inline_css' => null,
			'url_strip_qs' => null,
			'preserve_recipients' => null,
			'view_content_link' => null,
			'bcc_address' => 'message.bcc_address@example.com',
			'tracking_domain' => null,
			'signing_domain' => null,
			'return_path_domain' => null			
		);
		$async = false;
		//$ip_pool = 'Main Pool';
		//$send_at = date("d-m-Y h:m:s");
		return $mandrill->messages->send($message, $async);
		
	} catch(Mandrill_Error $e) {
		// Mandrill errors are thrown as exceptions
		echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
		// A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
		throw $e;
	}	
	}
	
}
$emailSender = new EmailSender;
?>