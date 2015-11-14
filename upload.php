<?php
session_start();
require('config/classes.php');

$conn = new Mysql();

if(!empty($_FILES)) {
	if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {

		$path = md5(date("d.m.YH:i:s"));

		//obtenemos el archivo a subir
		$peso = $_FILES['userImage']['size'];    
		$file = $_FILES['userImage']['name']; 

		$sourcePath = $_FILES['userImage']['tmp_name'];

		$imagen = getimagesize($sourcePath);
		$ancho = $imagen[0];    //Ancho
	    $alto = $imagen[1];    //Alto

	   	if ($file && $peso <= 70720 && $ancho <= 150 && $alto <= 150)
   		 {
			if(move_uploaded_file($_FILES['userImage']['tmp_name'],"img/avatars/".$path.".jpg")) {
			sleep(3);//retrasamos la petición 3 segundos
			mysqli_query($conn->conexion(), "UPDATE account.account set pic='".$path."' where id='".$_SESSION['id']."' LIMIT 1");
			?>
			<?php
		}
	  }
   }
}
?>