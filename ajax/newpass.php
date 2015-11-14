<?php
session_start();
require("../config/classes.php");
$class = new user_panel();
$email=mysqli_real_escape_string($class->conexion(),$_POST['email']); 
if($_SESSION['login']){
$class->newpass($_SESSION['email']);
}
?>