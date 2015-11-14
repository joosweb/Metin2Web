<?php

session_start();

require("../config/classes.php");

$class = new user_panel();

$new_email=mysqli_real_escape_string($class->conexion(),$_POST['newemail']); 

$email=$_SESSION['email']; 

if($_SESSION['login']){

$class->newmail($email,$new_email);

}

?>