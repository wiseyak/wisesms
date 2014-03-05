<?php
function Connection()
{
	$con = mysql_connect("localhost","root","");
	if (!$con){
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("WiseMessage",$con);
	return $con;
}

function Closeconnection($con)
{
	mysql_close($con);
}

function  Insertuser_info( $name,$address,$phone,$nickname,$username,$password,$role,$sex,$email){
	$conn=Connection();
	$query="INSERT INTO tbl_users VALUES ('','".$name."','".$address."' , '".$phone."','".$nickname."','".$username."','".$password."','".$role."','1','".$email."','".$sex."')";
	$response=mysql_query($query,$conn);
	$id = mysql_insert_id();
	Closeconnection($conn);
	return $response.','.$id;
}

function  deleteuser( $id){
	$conn=Connection();
	$query="update tbl_users set Active='0' where id=".$id;
	$response=mysql_query($query,$conn);
	Closeconnection($conn);
	return $response;
}

function  getActiveUsers( ){
	$conn=Connection();
	$query="select * from tbl_users where Active=1";
	$response=mysql_query($query,$conn);

	return $response;
}

function  getActiveUsersbygroupid($id ){
	$conn=Connection();
	$query="SELECT * FROM `tbl_users` WHERE id in (select userid from grp_members where groupid=".$id.") and Active=1";
	$response=mysql_query($query,$conn);

	return $response;
}

function  getgroups( ){
	$conn=Connection();
	$query="select * from groups";
	$response=mysql_query($query,$conn);

	return $response;
}

function  createGroup($grpname,$userid ){
	$conn=Connection();
	$query="INSERT INTO groups VALUES ('','".$grpname."')";
	$response=mysql_query($query,$conn);
	$grpid = mysql_insert_id();
	
	$members = explode(",", $userid);
	foreach ($members as $value) {
    $query1="INSERT INTO grp_members VALUES ('',".$grpid.",".$value.")";
	
	$response1=mysql_query($query1,$conn);
}
	
	return $response1;
}

function deletefromgrp($grpid,$userid){

$conn=Connection();
	$query="delete FROM `grp_members` WHERE groupid=".$grpid." and userid=".$userid;
	$response=mysql_query($query,$conn);

	return $response;
}


function Updateuser_info(){


}


?>


