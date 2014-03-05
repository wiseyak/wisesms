<?php
require_once("Common/declare.php");
?>
      <form class="form-signin" role="form" method = "POST" action = "processlogin.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" placeholder="Username" name="username" required autofocus><br/>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me" name="remember-me"> Remember me
        </label>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <label class='message'><?php 
		if(isset($_COOKIE['Message'])){
		 	echo $_COOKIE['Message']; 
			setcookie('Message','');
		}
		?></label>
      </form>

<?php require_once("Common/footer.php"); ?>
