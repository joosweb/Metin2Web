<?php
require("../config/classes.php");
$class = new user_panel();
$userid = mysqli_real_escape_string($class->conexion(),$_POST['userid']);
$email  = mysqli_real_escape_string($class->conexion(),$_POST['email']);
echo $class->lost_password($userid,$email);
?>