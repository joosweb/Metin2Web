<?php
	session_start();
	// 
	require('../config/classes.php');

	$class = new Mysql();

	$username = mysqli_real_escape_string($class->conexion(), $_GET['username']);
	$password = mysqli_real_escape_string($class->conexion(), $_GET['password']);

	$login = mysqli_query($class->conexion(), "SELECT * FROM account.account where login='".$username."' and password=PASSWORD('".$password."')");
	$rows=mysqli_fetch_array($login,MYSQLI_ASSOC);

	if($rows['id']) {
		$_SESSION['web_admin'] = $rows['web_admin'];
		$_SESSION['id'] = $rows['id'];
		$_SESSION['login'] = $rows['login'];
		$_SESSION['email'] = $rows['email'];
		$_SESSION['social_id'] = $rows['social_id'];
		$_SESSION['country'] = $rows['zipcode'];
		$_SESSION['status'] = $rows['status'];
		$_SESSION['last_play'] = $rows['last_play'];
		$_SESSION['pic'] = $rows['pic'];
		echo "ok";
	}
	else {
		return false;
	}
?>