<?php 
require_once('db.php');
$id=$_POST['userid'];
$response=deleteuser($id);
echo $response;
?>