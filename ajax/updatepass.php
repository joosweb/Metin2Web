<?php
session_start();
require("../config/classes.php");
$mysql = new user_panel();
$oldpass=mysqli_real_escape_string($mysql->conexion(),$_POST['oldpass']); 
$newpass=mysqli_real_escape_string($mysql->conexion(),$_POST['newpass']); 
$token=mysqli_real_escape_string($mysql->conexion(),$_POST['token']); 
$mysql->updatepass($oldpass,$newpass,$token);
?>