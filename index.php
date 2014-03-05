<?php
require_once("Common/header.php");
if(isset($_COOKIE["Message"])){?>
	<p class="message"><?php echo $_COOKIE["Message"]; setcookie('Message',''); ?></p>
<?php }
require_once("messageinterface.php");
require_once("Common/footer.php");
?>