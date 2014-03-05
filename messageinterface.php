<?php require_once('Common/header.php'); ?>
<?php require_once('db.php'); ?>
<h2>Compose Message</h2>
  <form role="form" method="POST" class="form-horizontal" id="message_main" action = "processrequest.php">
  	<input type="hidden" name="emails" value="" />
  	<input type="hidden" name="numbers" value="" />
    <div class="form-group row">
      <label for="shortmessage" class="col-sm-2 control-label">Message:</label>
      <div class="col-sm-10">
      	<textarea name="message" id="shortmessage" placeholder="Enter Your Message Here" class="form-control" rows="3" required></textarea>
      	<p class="help-block">Max: 140 characters</p>
      </div>
      </div>

	<table class="table table-bordered">
		<thead>
			<tr><td>SN</td><td>Name</td><td>Email</td><td>Number</td></tr>
		</thead>
		<tbody>
		<?php $users = getActiveUsers(); 
	    $i=0;
	    while($user=mysql_fetch_assoc($users)){
	    ?>
			<tr>
				<td><?php echo "". (++$i);?></td>
				<td><?php echo $user['Name']; ?></td>
				<td><label><input type="checkbox" name= "emails" value="<?php echo $user['email']; ?>" /> <?php echo $user['email']; ?></label></td>		
				<td><label><input type="checkbox" name= "numbers" value="<?php echo $user['Mobile']; ?>" /> <?php echo $user['Mobile']; ?></label></td>		
			</tr>
	    <?php } ?>
		</tbody>
	</table> 

      <div class="row hide">   
      		<div class="checkbox">
				<div class="col-md-2"><label>
					<input type="checkbox" name="is_scheduled" id='schedule'>Schedule</label>
				</div>
				<div class="col-md-10">
					<input type="text" name = "scheduled_date"  id="datepicker" placeholder="Enter Date">
				</div>
		  	</div>
	</div>
  <div class="row">
     
      <div class="col-md-12">
        <button type="submit" class="btn btn-info">Send Message</button>
      </div>
    </div>
  
</form>
<?php require_once("Common/footer.php");


 