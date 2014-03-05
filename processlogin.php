<?php 
   require_once("User/UserClass.php");

   $username = $_POST['username'];
   $password = $_POST['password'];
   $returnUrl =  isset($_GET['returnurl']) ? $_GET['returnurl'] : "index.php";

   $user->LoginUser($username,$password,$returnUrl);
?>