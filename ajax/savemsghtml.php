<?php
require('../config/classes.php');
$class = new user_panel();

$admin_name = mysqli_real_escape_string($class->conexion(),$_POST['admin_name']);
$topic = mysqli_real_escape_string($class->conexion(),$_POST['topic']);
$type = mysqli_real_escape_string($class->conexion(),$_POST['type']);

$msghtml = $_POST['msghtml'];

$patch = '../messages/msg_'.substr(sha1(rand(1,999)),0,-30).'.txt';
$date = date("Y-m-d H:i:s"); 

$sql = mysqli_query($class->conexion(), "INSERT INTO account.messages (text_src,type,admin_name,topic,datef) VALUES ('".$patch."','".$type."','".$admin_name."','".$topic."','".$date."')");

if($sql) {
	$file = fopen($patch, "w");
	fwrite($file, $msghtml);
	fclose($file);
	return true;
}
else {
	return false;
}
?>