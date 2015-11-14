<?php
session_start();
require("../config/classes.php");
$move = new user_panel();
$pid=mysqli_real_escape_string($move->conexion(),$_POST['pid']); 
if($_SESSION['login']){
$move->desbloq($pid);
}
?>