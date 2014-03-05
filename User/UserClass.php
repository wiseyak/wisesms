<?php
  class User
  {
  	private $currentUsername;
  	function __construct(){
  		require_once('db.php');
  	}

	function checkuser($username,$password)
	{
	  $con = Connection();
	  $query =("SELECT * FROM tbl_users WHERE username = '".$username."' and Password = '".$password."' and active=1") or die("could not connect");
	  
	 $result = mysql_query($query,$con);
			if(mysql_num_rows($result)>=1)
			{
				$rows = mysql_fetch_assoc($result); 

			  	$this->currentUsername = $rows['Username'];
			  	return true;
			}
			else
			{
				return false;
			} 
	}
	
	function getCurrentUsername() { 
        return $this->currentUsername; 
    }
	
	 function LoginUser($username,$password,$returnurl)
	 {
	 	if($this->checkuser($username,$password)){
			setcookie("wise_user", $username, time()+3600);
			header("Location:".$returnurl);
		}
		else{
			setcookie("Message","Invalid UserName and/or Password combination");
			header("Location:login.php");
		}
	 }	
	 
	 function LogOut($username)
	 {
		setcookie("wise_user", $username, time()-3600);
		header("Location:index.php");
		
	 }
	 
	function IsUserLoggedIn()
	{

		if (isset($_COOKIE["wise_user"]))
		{			
			return true;
		}
		else 
		{			
		    return false;
		}	 
	}
  }
  $user = new User;
?>