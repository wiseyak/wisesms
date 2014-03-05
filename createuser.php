<?php 
include('db.php');

$name=$_POST['name'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$nickname=$_POST['nickname'];
$username=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];
$sex=$_POST['sex'];
$email=$_POST['email'];

//var_dump($_POST);die;
$response=Insertuser_info($name,$address,$phone,$nickname,$username,$password,$role,$sex,$email);
echo $response;
?>