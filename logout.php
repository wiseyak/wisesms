<?php
require_once("Common/declare.php");

$user->LogOut();
setcookie('Message','You are now logged out.');
header("Location:index.php");
exit;
?>