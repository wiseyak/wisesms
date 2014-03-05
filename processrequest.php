<?php	
	require_once("SmsSender/smssender.php");
	require_once("Email/EmailSender.php");
	require_once("db.php");

	

//var_dump($_POST['numbers']);
	
	$message = $_POST['message'];
	$user_name = $_COOKIE['wise_user'];
	$numbers = explode(",", $_POST['numbers']);
	$emails = explode(",", $_POST['emails']);

	//var_dump($numbers);
	//var_dump($emails);
	
	//$numbers = explode(",", "1321234,124124,1241656");
	//$emails = $_POST['emails'];
	//$emails = explode(",","asdf@asdf.com","asdfasdfasd@asdfasdf.com"); //array("asdf@asdf.com","asdfasdfasd@asdfasdf.com")
	//$is_scheduled = $_POST['is_scheduled'];

	// $scriptpath = $_POST['scriptpath'];
	// $job_name = $_POST['job_name'];
	// $fire_time = $_POST['fire_time'];


	// Write to the request table in any case
	$is_scheduled=0;
	$request_id=write_request($message,$is_scheduled,$user_name);

	// get the request_id to use in the requestlog table

	// if(isset($_POST['is_scheduled'])){
 

	// 	foreach ($numbers as $number) {
	// 		if(length($number)){
	// 			$smsSender->sendsms($number,$message);
			
	// 			//write to the requestlog
	// 			write_requestlog_sms($number,$request_id,0);
	// 		}
	// 	}


	// 	//simailar for email
	// 	// $emailSender->SendEmail('asdfasd@asdfasdf.com','the message','Wise Messaging Notification')
	// 	//request log
	// 	foreach ($emails as $email) {
	// 		try{
	// 			$emailSender->SendEmail($email,$message,'Wise Messaging Notification');

	// 			//write to the requestlog
	// 			write_requestlog_email($email,$request_id,0);
	// 		}catch(Exception $ex){}
	// 	}


	// }
	// else{
		foreach ($numbers as $number) {
			
			try {
				if(strlen($number)){
				$smsSender->sendsms($number,$message);

					//write to the requestlog
					write_requestlog_sms($number,$request_id,1);
				}
			} catch(Exception $ex) {
				
			}
			
		}


		//similar for email
		//request log
		foreach ($emails as $email) { 
			try{
				if(strlen($email)){
					
					$emailSender->SendEmail($email,$message,'Wise Messaging Notification');

					//write to the requestlog
					write_requestlog_email($email,$request_id,1);
				}
			}
			catch (Exception $ex){

			}
		}
		setcookie("Message","Message sent to selected numbers and email addresses.");
		header("Location:index.php");
		// write to the scheduler table
		
		//write_schedule($scriptpath,$job_name,$fire_time);
		

	//}

	//to write to schedule table
	// function write_schedule($scriptpath,$job_name,$fire_time)
	// {
		
	// 			$dbhost = 'localhost:3306';
	// 			$dbuser = 'root';
	// 			$dbpass = '';
	// 			$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	// 			if(! $conn )
	// 			{
	// 			  die('Could not connect: ' . mysql_error());
	// 			}
	// 			$sql = "insert into jobschedule (scriptpath,job_name,fire_time,completed) values ('{$scriptpath}','{$job_name}','{$fire_time}','0') ";     
	// 			mysql_select_db('wisemessage');
	// 		    $retval = mysql_query( $sql, $conn );
	// 			if(! $retval )
	// 			{
	// 			  die('Could not update data: ' . mysql_error());
	// 			}
	// 			mysql_close($conn); 
			

	// }

	// to write to request table
	function write_request($message,$is_scheduled,$user_name)
		{
			$date = date('Y-m-d H:i:s');
						
			$conn = Connection();	
				$sql = "insert into request (user_name,message,is_scheduled,msg_date) values ('{$user_name}','{$message}','{$is_scheduled}','{$date}') ";     

			    mysql_select_db('wisemessage');
			    $result = mysql_query( $sql, $conn );
			    $id = mysql_insert_id();
				if(! $result )
				{
				  die('Could not update request data: ' . mysql_error());
				}
				mysql_close($conn); 
				return $id;

		}

		

		//write to requestlog table
		function write_requestlog_sms($number,$request_id,$is_scheduled)
		{
			$date = date('Y-m-d H:i:s');

			$conn = Connection();
				
				
				// if ($is_scheduled == 0 )
				// {
				// 	$sql = "insert into requestlog (request_id,msg_to,type,complete) values ('{$request_id}','{$number}','{$is_scheduled}','sms','0') ";    
				// } 
				// else
				// {
					$sql = "insert into requestlog (request_id,msg_to,type,complete) values ('{$request_id}','{$number}','SMSMessage','1') ";    
				//}

			    mysql_select_db('wisemessage');
			    $result = mysql_query( $sql, $conn );
			    $id = mysql_insert_id();

				if(! $result )
					{
					  die('Could not update requestlog data: ' . mysql_error());
					}
				mysql_close($conn); 
				return $id;
		
		}


		//to write to requestlog table
		function write_requestlog_email($email,$request_id,$is_scheduled)
		{
			$date = date('Y-m-d H:i:s');
			$conn = Connection();
				
				
				if(! $conn )
				{
				  die('Could not connect: ' . mysql_error());
				}

				// if ($is_scheduled == 0 ){
				// 	$sql = "insert into requestlog (request_id,msg_to,type,complete) values ('{$request_id}','{$email}','EmailMessage','0') ";    
				// } 
				// else{
					$sql = "insert into requestlog (request_id,msg_to,type,complete) values ('{$request_id}','{$email}','EmailMessage','1') ";    
				//}

			    mysql_select_db('wisemessage');
			    $result = mysql_query( $sql, $conn );
			    $id = mysql_insert_id();

				if(! $result )
				{
				  die('Could not update data: ' . mysql_error());
				}
				mysql_close($conn); 
				return $id;

		}	
?>