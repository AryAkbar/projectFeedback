<?php
	$host = "localhost"; //default: localhost
	$host_user = "root"; //default: root
	$host_pass = ""; //default: kosong
	$db_name = "feedback"; //nama database

	$mysqli = new mysqli($host, $host_user, $host_pass, $db_name);
	if($mysqli->connect_error){
		die('Connection error: '.$mysqli->connect_error);
	}
?>

