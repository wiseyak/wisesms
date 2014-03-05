<?php
require_once('db.php');
$grpid=$_POST['grpid'];
$userid=$_POST['userid'];
// $grpmembers = explode(" ", $pizza);
$response=deletefromgrp($grpid,$userid );
echo $response;


?>