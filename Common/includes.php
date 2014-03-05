<?php
	define("BASE_URL", "http://192.168.200.102:81/WiseMessage/");
	define("SITE_NAME", "Wise Messaging");

function getCurrentFileName(){
	$query = $_SERVER['PHP_SELF'];
    $path = pathinfo( $query );
    $url = $path['basename'];

    return $url;
}