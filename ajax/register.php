<?php
	require('../config/classes.php');

	$class = new Mysql();

	$username = mysqli_real_escape_string($class->conexion(), $_GET['username']);
	$password = mysqli_real_escape_string($class->conexion(), $_GET['password']);
	$socialid = mysqli_real_escape_string($class->conexion(), $_GET['socialid']);
	$email = mysqli_real_escape_string($class->conexion(), $_GET['email']);
	$pais = mysqli_real_escape_string($class->conexion(), $_GET['pais']);
	$captcha = mysqli_real_escape_string($class->conexion(), $_GET['captcha']);

	if(isset($_GET['username'])) {

	$check = mysqli_query($class->conexion(), "SELECT id from account.account where login='".$username."'");
	$rows=mysqli_fetch_array($check,MYSQLI_ASSOC);

	if($rows['id']){
		echo "exist";
	}
	else {
		$sql = mysqli_query($class->conexion(), "INSERT INTO account.account (login,password,social_id,email,zipcode) VALUES ('".$username."',PASSWORD('".$password."'),'".$socialid."','".$email."','".$pais."')");
		echo "ok";
	}

 }
?>