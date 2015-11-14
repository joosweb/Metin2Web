<?php 
session_start();

require('../config/classes.php');

$new = new user_admin();

if($_SESSION['web_admin'] >= 9) { 

	$action = mysqli_real_escape_string($new->conexion(), $_GET['action']);

	switch ($action) {
		case 'searchip':
			$playername = mysqli_real_escape_string($new->conexion(), $_GET['playername']);
			$new->get_ip($playername);
			break;
		
		default:
			# code...
			break;
	}


}
?>