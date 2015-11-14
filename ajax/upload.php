<?php
session_start();
include("conf/config.php");
include("functions/funks.php");
//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
 
	$path = md5(date("d.m.YH:i:s"));
	
    //obtenemos el archivo a subir
	$peso = $_FILES['archivo']['size'];    
	$file = $_FILES['archivo']['name']; 
	
	$filename = $_FILES['image']['tmp_name'];
	
    $imagen = getimagesize($filename);
	$ancho = $imagen[0];    //Ancho
    $alto = $imagen[1];    //Alto

	if(!get_avatar($mysqli,$_SESSION['login'])) {
	
    //comprobamos si el archivo ha subido
    if ($file && $peso <= 30720 && $ancho <= 150 && $alto <= 150)
    {
	   move_uploaded_file($_FILES['archivo']['tmp_name'],"img/avatars/".$path.".jpg");
       sleep(3);//retrasamos la petición 3 segundos
	   mysqli_query($mysqli, "UPDATE account.account set pic='".$path."' where id='".get_id($mysqli,$_SESSION['login'])."' LIMIT 1");
       echo "<font color='#2EFE2E'>La imagen se a subido correctamente!</font><img src='images/ui/Arrow up.png' width='20'> ";//devolvemos el nombre del archivo para pintar la imagen
		}
		else{
			echo "<font color='#FF0000'>La imagen es demasiado grande, las dimensiones deben ser 150x150 pixeles, peso maximo 30Kb.</font>"; 
		}
		}else {
		if($file && $peso <= 30720 && $ancho <= 150 && $alto <= 150)
		{
		   move_uploaded_file($_FILES['archivo']['tmp_name'],"images/avatars/".get_avatar($mysqli,$_SESSION['login']).".jpg");
		   sleep(3);//retrasamos la petición 3 segundos
		   mysqli_query($mysqli, "UPDATE account.account set pic='".get_avatar($mysqli,$_SESSION['login'])."' where id='".get_id($mysqli,$_SESSION['login'])."' LIMIT 1");
		   echo "<font color='#2EFE2E'>La imagen se a subido correctamente!</font><img src='images/ui/Arrow up.png' width='20'>";  
		}
		else{
			echo "<font color='#FF0000'>La imagen es demasiado grande, las dimensiones deben ser 150x150 pixeles, peso maximo 30Kb.</font>";
		}
	}
}
