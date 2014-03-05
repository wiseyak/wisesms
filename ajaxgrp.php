
<?php 
require_once('db.php');
$grpname=$_POST['name'];
$members=$_POST['members'];
// $grpmembers = explode(" ", $pizza);
$response=createGroup($grpname,$members );
echo $response;
?>

