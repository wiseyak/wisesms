<?php	
	
	class smsSender
	{
		function sendsms($number,$message)
		{
				
				$client_id = 'apisignup';
				$username = 'wisesms';
				$password = '7BAiQp4Q';
				$from = '5455';
				$to = $number;
				$text = $message ;
				
					 
				
				$api_url = "http://api.sparrowsms.com/call_in.php?" .
							http_build_query(array(
							"client_id" => $client_id,
							"username" => $username,
							"password" => $password,
							"from" => $from,
							"to" => $to,
							"text" => $text
							));
				 
				
				$response = file_get_contents($api_url);
				
				return $response;
				//$this::record_info();
 
		}
		
	}
	
	$smsSender = new smsSender();

?>