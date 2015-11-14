<?php

/// Conexion a base de datos

	class Mysql {

		private $host = "serverip";
		private $user = "user";
		private $password = "password";
		private $db = "account";

		// acceso mysql 

		public function conexion() {

			$mysqli = new mysqli($this->host, $this->user, $this->password, $this->db);

			$mysqli->set_charset("utf8");

			if($mysqli) {
				return $mysqli;
			}
			else {
				return;
			}
		 }
	 }
		// class user_panel
	 class user_panel extends Mysql {


	 /// recuperar contraseÃ±a

	 public function lost_password($userid,$email){

	 	function random_string($length) {
		    $key = '';
		    $keys = array_merge(range(0, 9), range('a', 'z'));
		    for ($i = 0; $i < $length; $i++) {
		        $key .= $keys[array_rand($keys)];
		    }
		    return $key;
	    } 

	    $token2 = random_string(50);

	 	$sql = mysqli_query($this->conexion(),"SELECT id FROM account.account WHERE login = '".$userid."' AND email='".$email."' LIMIT 1");
	 	$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
	 	if($row['id']){
	 		include("../mailer/class.phpmailer.php"); 
			include("../mailer/class.smtp.php");
			include("../mailer/config_smpt.php");
			$mail = new PHPMailer(); 
			$mail->IsSMTP(); 
			$mail->SMTPAuth = true; 		 
			$mail->Host = $host_smtp; 
			$mail->Port = $smtp_port; 
			$mail->Username = $email_user; 
			$mail->Password = $email_pass;
			$mail->From = $email_user; 
			$mail->FromName = $email_user; 
			$mail->Subject = "Metin2Evolution Recuperar contraseña!"; 	
			$mail->AddAddress($email, "Destinatario"); ;
			$mail->Subject = "Recuperar contraseña";
			$mail->Body = '<!DOCTYPE html>
							<html>
								<head>
									<meta charset=UTF-8">
									<title>Metin2Evolution</title>
									<style type="text/css">
										body {
										  margin: 0;
										  mso-line-height-rule: exactly;
										  padding: 0;
										  min-width: 100%;
										}		
								   </style>
								<meta name="robots" content="noindex,nofollow">
								<meta property="og:title" content="Metin2Evolution Cambio de Email">
								 <table class="preheader" style="border-collapse: collapse;border-spacing: 0;width: 100%;background-color: #ece8df">
									<tbody><tr>
									  <td style="padding: 10px 0 12px 0;vertical-align: middle">
										<center>
										  <table class="full-width centered" style="border-collapse: collapse;border-spacing: 0;Margin-left: auto;Margin-right: auto;width: 600px;margin: 0 auto">
											<tbody>
											<tr>                    
											  </td>                  
											</tr>
										  </tbody></table>
										</center>
									  </td>
									</tr>
								   </tbody></table>
									  <table class="one-col-bg" style="border-collapse: collapse;border-spacing: 0;width: 100%;background-color: #f2efe9">
										<tbody><tr>
										  <td style="padding: 0;vertical-align: middle" align="center">
											<table class="one-col centered" style="border-collapse: collapse;border-spacing: 0;Margin-left: auto;Margin-right: auto;width: 600px">
											  <tbody><tr>
												<td class="column" style="padding: 0;vertical-align: middle;text-align: left">
												  <table class="contents" style="border-collapse: collapse;border-spacing: 0;width: 100%;background-color: #fff">
													<tbody><tr>
													  <td style="padding: 0;vertical-align: middle">                            
													  <div class="image" style="font-size: 0;Margin-bottom: 22px" align="center">
														<img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top" style="border: 0;-ms-interpolation-mode: bicubic;display: block;max-width: 900px" src="http://fotos.subefotos.com/a77a4132e326769ff1a51aa0aaea2f28o.jpg" alt="Banner-Metin2Evolution" height="135" width="600">
													  </div>            
														  <table style="border-collapse: collapse;border-spacing: 0" width="100%">
															<tbody><tr>
															  <td class="padded" style="padding: 0;vertical-align: middle;padding-left: 92px;padding-right: 92px">
															<h1 style="Margin-top: 0;font-weight: normal;color: #38434d;font-family: Georgia,serif;font-size: 22px;Margin-bottom: 18px;line-height: 30px">Ha solicitado recuperar contraseña!</h1>
															<p style="Margin-top: 0;font-weight: 400;font-size: 14px;line-height: 22px;color: #7c7e7f;font-family: sans-serif;Margin-bottom: 22px">Visite el siguiente link y siga las instrucciones para reestablecer su contraseña.</p><br>
															<div class="btn" style="text-align: center;Margin-bottom: 22px">
															  <!--[if !mso]--><a style="display: inline-block;font-size: 12px;line-height: 18px;font-weight: 500;text-align: center;text-decoration: none;padding: 10px;transition: background-color 0.2s, border-color 0.2s;color: #fff;background-color: #444;font-family: sans-serif;width: 396px" href="http:/evolution.co.ve/index.php?pid='.$token2.'">Confirmar cambio de contraseña</a></div>
															<p style="font-weight: 400; font-size: 14px; line-height: 22px; color: #7c7e7f; font-family: sans-serif; Margin-bottom: 22px">Si el siguiente boton no funciona, por favor visite el siguiente link</p>
															<p style="font-weight: 400; font-size: 14px; line-height: 22px; color: #7c7e7f; font-family: sans-serif; Margin-bottom: 22px"><a href="http:/evolution.co.ve/index.php?pid='.$token2.'">http:/evolution.co.ve/index.php?pid='.$token2.'</a></p>
															<p style="font-weight: 400; font-size: 14px; line-height: 22px; color: #7c7e7f; font-family: sans-serif; Margin-bottom: 22px">Gracias por preferirnos, recuerde que ningun GM , GA o miembro del equipo le solicitara datos confidenciales como su ID , contrase&ntilde;a, email, le recordamos tambien que para su seguridad no preste su cuenta a terceros, ya que si lo hace pierde todo derecho a soporte y si pierde items o personajes estos no podran ser reestablecidos..</p>
														   </td>
															</tr>
														  </tbody>
														  </table> 
														  </tbody>
													 </table>              
												</tbody></table>        
											  <div class="spacer" style="font-size: 1px;line-height: 60px;width: 100%;background-color: #f2efe9">&nbsp;</div>
											<table class="footer" style="border-collapse: collapse;border-spacing: 0;table-layout: fixed;width: 100%;background-color: #ece8df">
											<tbody><tr>
											<td style="padding: 0;vertical-align: top;text-align: left">&nbsp;</td>
											<td class="inner" style="padding: 0;vertical-align: top;text-align: left;padding-top: 40px;padding-bottom: 75px;width: 464px">
											<table style="border-collapse: collapse;border-spacing: 0;width: 100%">
											<tbody><tr>
											<td class="campaign" style="padding: 0;vertical-align: top;text-align: left;font-size: 12px;line-height: 20px;color: gray;font-family: sans-serif">
											  <div align="center">Copyright Â© Metin2Evolution 2015. Todos los derechos reservados.
							 Sitio programado por <a href="mailto:soporte@evolution.co.ve">soporte@evolution.co.ve</a></div>
											  <table class="divider" style="border-collapse: collapse;border-spacing: 0;font-size: 1px;line-height: 1px;background-color: #d0c5af;width: 13px">
											  <tbody><tr><td style="padding: 0;vertical-align: top;text-align: left">&nbsp;</td></tr></tbody></table>
											  <div>                    
											  </div>              
											</tbody>
											</table>          
									  <td></td>       
							  </body>
							</html>';
							$mail->IsHTML(true);
							if($mail->Send())
								{
								$insert=mysqli_query($this->conexion(), "INSERT INTO account.oldpass (token,user_id) VALUES ('".$token2."','".$userid."')");
		                		echo "success";				
							}
	 	}
	 	else{
	 		echo 'noexist';
	 	}

	 }

	////// checkear lostpass 

	public function check_old_pass($token) {

	 		$check = mysqli_query($this->conexion(),"SELECT id FROM account.oldpass WHERE token = '".$token."'");
	 		$fet = mysqli_fetch_array($check,MYSQLI_ASSOC);
	 		if($fet['id']) {
	 			return true;
	 		}
	 		else
	 		{
	 			return false;
	 		}

	 }	


	 /// cambiar Email

	  public function newmail($email,$new_email){

	  	function random_string($length) {
		    $key = '';
		    $keys = array_merge(range(0, 9), range('a', 'z'));
		    for ($i = 0; $i < $length; $i++) {
		        $key .= $keys[array_rand($keys)];
		    }
		    return $key;
	    } 

	    $tokenn = random_string(50);
	  	$sql = mysqli_query($this->conexion(),"SELECT id from account.new_email WHERE old_email='".$_SESSION['email']."' LIMIT 1");
	  	$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
	  	if($row['id']){
	  		echo 'pendiente';
	  	}
	  	else {
	  		$status = 'pendiente';
			include("../mailer/class.phpmailer.php"); 
			include("../mailer/class.smtp.php");
			include("../mailer/config_smpt.php");
			$mail = new PHPMailer(); 
			$mail->IsSMTP(); 
			$mail->SMTPAuth = true; 		 
			$mail->Host = $host_smtp; 
			$mail->Port = $smtp_port; 
			$mail->Username = $email_user; 
			$mail->Password = $email_pass;
			$mail->From = $email_user; 
			$mail->FromName = $email_user; 
			$mail->Subject = "Metin2Evolution Cambio de Email!"; 	
			$mail->AddAddress($email, "Destinatario"); ;
			$mail->Subject = "Cambio de Email";
			$mail->Body = '<!DOCTYPE html>
							<html>
								<head>
									<meta charset=UTF-8">
									<title>Metin2Evolution</title>
									<style type="text/css">
										body {
										  margin: 0;
										  mso-line-height-rule: exactly;
										  padding: 0;
										  min-width: 100%;
										}		
								   </style>
								<meta name="robots" content="noindex,nofollow">
								<meta property="og:title" content="Metin2Evolution Cambio de Email">
								 <table class="preheader" style="border-collapse: collapse;border-spacing: 0;width: 100%;background-color: #ece8df">
									<tbody><tr>
									  <td style="padding: 10px 0 12px 0;vertical-align: middle">
										<center>
										  <table class="full-width centered" style="border-collapse: collapse;border-spacing: 0;Margin-left: auto;Margin-right: auto;width: 600px;margin: 0 auto">
											<tbody>
											<tr>                    
											  </td>                  
											</tr>
										  </tbody></table>
										</center>
									  </td>
									</tr>
								   </tbody></table>
									  <table class="one-col-bg" style="border-collapse: collapse;border-spacing: 0;width: 100%;background-color: #f2efe9">
										<tbody><tr>
										  <td style="padding: 0;vertical-align: middle" align="center">
											<table class="one-col centered" style="border-collapse: collapse;border-spacing: 0;Margin-left: auto;Margin-right: auto;width: 600px">
											  <tbody><tr>
												<td class="column" style="padding: 0;vertical-align: middle;text-align: left">
												  <table class="contents" style="border-collapse: collapse;border-spacing: 0;width: 100%;background-color: #fff">
													<tbody><tr>
													  <td style="padding: 0;vertical-align: middle">                            
													  <div class="image" style="font-size: 0;Margin-bottom: 22px" align="center">
														<img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top" style="border: 0;-ms-interpolation-mode: bicubic;display: block;max-width: 900px" src="http://fotos.subefotos.com/a77a4132e326769ff1a51aa0aaea2f28o.jpg" alt="Banner-Metin2Evolution" height="135" width="600">
													  </div>            
														  <table style="border-collapse: collapse;border-spacing: 0" width="100%">
															<tbody><tr>
															  <td class="padded" style="padding: 0;vertical-align: middle;padding-left: 92px;padding-right: 92px">
															<h1 style="Margin-top: 0;font-weight: normal;color: #38434d;font-family: Georgia,serif;font-size: 22px;Margin-bottom: 18px;line-height: 30px">Ha solicitado Cambio de Email!</h1>
															<p style="Margin-top: 0;font-weight: 400;font-size: 14px;line-height: 22px;color: #7c7e7f;font-family: sans-serif;Margin-bottom: 22px">Una vez haga click en el siguiente link, automaticamente cambiara su nuevo email al que habia solicitado.</p><br>
															<div class="btn" style="text-align: center;Margin-bottom: 22px">
															  <!--[if !mso]--><a style="display: inline-block;font-size: 12px;line-height: 18px;font-weight: 500;text-align: center;text-decoration: none;padding: 10px;transition: background-color 0.2s, border-color 0.2s;color: #fff;background-color: #444;font-family: sans-serif;width: 396px" href="http:/evolution.co.ve/index.php?code='.$tokenn.'">Confirmar Cambio de email</a></div>
															<p style="font-weight: 400; font-size: 14px; line-height: 22px; color: #7c7e7f; font-family: sans-serif; Margin-bottom: 22px">si el boton Cambiar email no funciona, por favor visite el siguiente link</p>
															<p style="font-weight: 400; font-size: 14px; line-height: 22px; color: #7c7e7f; font-family: sans-serif; Margin-bottom: 22px"><a href="http:/evolution.co.ve/index.php?code='.$tokenn.'">http:/evolution.co.ve/index.php?code='.$tokenn.'</a></p>
															<p style="font-weight: 400; font-size: 14px; line-height: 22px; color: #7c7e7f; font-family: sans-serif; Margin-bottom: 22px">Gracias por preferirnos, recuerde que ningun GM , GA o miembro del equipo le solicitara datos confidenciales como su ID , contrase&ntilde;a, email, le recordamos tambien que para su seguridad no preste su cuenta a terceros, ya que si lo hace pierde todo derecho a soporte y si pierde items o personajes estos no podran ser reestablecidos..</p>
														   </td>
															</tr>
														  </tbody>
														  </table> 
														  </tbody>
													 </table>              
												</tbody></table>        
											  <div class="spacer" style="font-size: 1px;line-height: 60px;width: 100%;background-color: #f2efe9">&nbsp;</div>
											<table class="footer" style="border-collapse: collapse;border-spacing: 0;table-layout: fixed;width: 100%;background-color: #ece8df">
											<tbody><tr>
											<td style="padding: 0;vertical-align: top;text-align: left">&nbsp;</td>
											<td class="inner" style="padding: 0;vertical-align: top;text-align: left;padding-top: 40px;padding-bottom: 75px;width: 464px">
											<table style="border-collapse: collapse;border-spacing: 0;width: 100%">
											<tbody><tr>
											<td class="campaign" style="padding: 0;vertical-align: top;text-align: left;font-size: 12px;line-height: 20px;color: gray;font-family: sans-serif">
											  <div align="center">Copyright Â© Metin2Evolution 2015. Todos los derechos reservados.
							 Sitio programado por <a href="mailto:soporte@evolution.co.ve">soporte@evolution.co.ve</a></div>
											  <table class="divider" style="border-collapse: collapse;border-spacing: 0;font-size: 1px;line-height: 1px;background-color: #d0c5af;width: 13px">
											  <tbody><tr><td style="padding: 0;vertical-align: top;text-align: left">&nbsp;</td></tr></tbody></table>
											  <div>                    
											  </div>              
											</tbody>
											</table>          
									  <td></td>       
							  </body>
							</html>';
							$mail->IsHTML(true);
							if($mail->Send())
								{
								$insert=mysqli_query($this->conexion(), "INSERT INTO account.new_email (user_id,old_email,new_email,status,token) VALUES ('".$_SESSION['login']."','".$_SESSION['email']."','".$new_email."','".$status."','".$tokenn."')");
		                		echo "success";				
							}
	  				}
	  		}
	  //// CONFIRMAR NUEVO EMAIL //

	  public function confirm_new_mail($code,$userid){

	  		$sql = mysqli_query($this->conexion(),"SELECT user_id,new_email FROM account.new_email WHERE token='".$code."'");
	  		$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
	  		if($row['user_id'] == $userid){
	  			$update = mysqli_query($this->conexion(),"UPDATE account.account set email ='".$row['new_email']."' WHERE login='".$userid."' LIMIT 1");
	  			if($update){
	  				$delete = mysqli_query($this->conexion(),"DELETE FROM account.new_email WHERE token='".$code."' LIMIT 1");
	  				echo '<div class="alert alert-dismissible alert-success" style="width:90%; margin-left:20px; Margin-top:20px;"><button type="button" class="close" data-dismiss="alert">Ã—</button><strong>Correo Cambiado!<br></strong> Tu correo ha cambiado satisfactoriamente a <strong>'.$row['new_email'].'!</strong></div>';
	  			}
	  			else
	  			{
	  				echo '<div class="alert alert-dismissible alert-danger" style="width:90%; margin-left:20px; Margin-top:20px;"><button type="button" class="close" data-dismiss="alert">Ã—</button><strong>Error!<br></strong> Error por favor contacta con un administrador!</strong></div>';
	  			}

	  		}
	  		else {
	  			echo '<div class="alert alert-dismissible alert-danger" style="width:90%; margin-left:20px; Margin-top:20px;"><button type="button" class="close" data-dismiss="alert">Ã—</button><strong>Atencion!<br></strong> Para poder cambiar de email, solicitalo en tu panel de usuario!</strong></div>';
	  		}

	  }


	  ///// obtener jugadores de una cuenta ////
	  public function getplayers($id){
	  	$find = mysqli_query($this->conexion(),"SELECT name,id FROM player.player WHERE account_id='".$id."'");
		while($row=mysqli_fetch_array($find,MYSQLI_ASSOC)) {
		echo "<option value='".$row['id']."'>".$row['name']."</option>";
	    }
	  }

	  /// buscar avatar

	  public function getavatar($id){
	  	$find = mysqli_query($this->conexion(),"SELECT pic FROM account.account WHERE id='".$id."'");
		while($row=mysqli_fetch_array($find,MYSQLI_ASSOC)) {
		return $row['pic'];
	    }
	  }

	  // Obtener coins

	  public function get_coins($id){
	  	$sql=mysqli_query($this->conexion(),"SELECT coins FROM account.account where id='".$id."'");
	  	$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
	  	return $row['coins'];
	  }

	  // Obtener jcoins

	  public function get_jcoins($id){
	  	$sql=mysqli_query($this->conexion(),"SELECT jcoins FROM account.account where id='".$id."'");
	  	$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
	  	return $row['jcoins'];
	  }

	  // Obtener coins jcoins JSON
 
	  public function get_coins_joins_json($id){
	  	$sql=mysqli_query($this->conexion(),"SELECT coins,jcoins FROM account.account where id='".$id."'");
	  	$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
	  	$array = array();
	  	$array['coins'] = $row['coins'];
	  	$array['jcoins'] = $row['jcoins'];
	  	return json_encode($array);
	  }

	  // decrypt cats
	  public function DeCode($string,$operation,$key='')
		{
				$key=md5($key);
				$key_length=strlen($key);
				$string=$operation=='D'?base64_decode($string):substr(md5($string.$key),0,8).$string;
				$string_length=strlen($string);
				$rndkey=$box=array();
				$result='';
				for($i=0;$i<=255;$i++)
				{
				$rndkey[$i]=ord($key[$i%$key_length]);
				$box[$i]=$i;
				}
				for($j=$i=0;$i<256;$i++)
				{
				$j=($j+$box[$i]+$rndkey[$i])%256;
				$tmp=$box[$i];
				$box[$i]=$box[$j];
				$box[$j]=$tmp;
				}
				for($a=$j=$i=0;$i<$string_length;$i++)
				{
				$a=($a+1)%256;
				$j=($j+$box[$a])%256;
				$tmp=$box[$a];
				$box[$a]=$box[$j];
				$box[$j]=$tmp;
				$result.=chr(ord($string[$i])^($box[($box[$a]+$box[$j])%256]));
				}
				if($operation=='D')
				{
				if(substr($result,0,8)==substr(md5(substr($result,8).$key),0,8))
				{
				return substr($result,8);
				}
				else
				{
				return'';
				}
				}
				else
				{
			 return str_replace('=','',base64_encode($result));
			}
		}


				// MENSAJERIA

		// Listas mensajes
		public function get_messages(){
			$sql=mysqli_query($this->conexion(),"SELECT * FROM account.messages");
			while($rows = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
				echo '<tr>
	             <td></td>
	             <td><span class="label label-danger">'.$rows['type'].'</span></td>
	             <td><a href="#" onclick="read_msg('.$rows['id'].');" class="textmail">'.$rows['admin_name'].'</a></td>
	             <td><a href="#" onclick="read_msg('.$rows['id'].');" class="textmail">'.$rows['topic'].'</a></td>
	             <td>'.$rows['datef'].'</td>
	         	</tr>';
			}
		}

		public function update_msg($id){

			$sql = mysqli_query($this->conexion(),"SELECT COUNT(id) as count FROM account.messages");
			$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

			$sql2 = mysqli_query($this->conexion(),"SELECT msg_read FROM account.account WHERE id='".$id."'");
			$rows = mysqli_fetch_array($sql2,MYSQLI_ASSOC);

			if($row['count'] == $rows['msg_read']) {
				return false;
			}
			else if($row['count'] < $rows['msg_read']){
				return false;
			}
			else {
				$update=mysqli_query($this->conexion(),"UPDATE account.account set msg_read = (msg_read + 1) WHERE id='".$id."' LIMIT 1");
				return $update;
			}
			
		}

		public function msg_read($id){

			$sql = mysqli_query($this->conexion(),"SELECT COUNT(id) as count FROM account.messages");
			$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

			$sql2 = mysqli_query($this->conexion(),"SELECT msg_read FROM account.account WHERE id='".$id."'");
			$rows = mysqli_fetch_array($sql2,MYSQLI_ASSOC);

			$msg_sin_leer = ($row['count'] - $rows['msg_read']);

			if($row['count'] > $rows['msg_read']) {
				return $msg_sin_leer;
			}
			else {
				return false;
			}

		}

		// mail para nueva contraseÃ±a //
	  public function newpass($email){

	  	function random_string($length) {
		    $key = '';
		    $keys = array_merge(range(0, 9), range('a', 'z'));
		    for ($i = 0; $i < $length; $i++) {
		        $key .= $keys[array_rand($keys)];
		    }
		    return $key;
	    } 

	  	$check = mysqli_query($this->conexion(), "SELECT status from account.changepass where userid='".$_SESSION['login']."'");
	  	$row=mysqli_fetch_array($check ,MYSQLI_ASSOC);
		if($row['status'] == "EnProceso"){
		echo "pendiente";
		}
		else {
		$status = "EnProceso";
		$token = random_string(50);
	  	include("../mailer/class.phpmailer.php"); 
		include("../mailer/class.smtp.php");
		include("../mailer/config_smpt.php");
		$mail = new PHPMailer(); 
		$mail->IsSMTP(); 
		$mail->SMTPAuth = true; 		 
		$mail->Host = $host_smtp; 
		$mail->Port = $smtp_port; 
		$mail->Username = $email_user; 
		$mail->Password = $email_pass;
		$mail->From = $email_user; 
		$mail->FromName = $email_user; 
		$mail->Subject = "Metin2Evolution Nueva Password!"; 	
		$mail->AddAddress($email, "Destinatario"); ;
		$mail->Subject = "Nueva Password";
		$mail->Body = '<!DOCTYPE html>
						<html>
							<head>
								<meta charset=UTF-8">
								<title>Metin2Evolution</title>
								<style type="text/css">
									body {
									  margin: 0;
									  mso-line-height-rule: exactly;
									  padding: 0;
									  min-width: 100%;
									}		
							   </style>
							<meta name="robots" content="noindex,nofollow">
							<meta property="og:title" content="Metin2Evolution Cambiar contrase&ntilde;a">
							 <table class="preheader" style="border-collapse: collapse;border-spacing: 0;width: 100%;background-color: #ece8df">
								<tbody><tr>
								  <td style="padding: 10px 0 12px 0;vertical-align: middle">
									<center>
									  <table class="full-width centered" style="border-collapse: collapse;border-spacing: 0;Margin-left: auto;Margin-right: auto;width: 600px;margin: 0 auto">
										<tbody>
										<tr>                    
										  </td>                  
										</tr>
									  </tbody></table>
									</center>
								  </td>
								</tr>
							   </tbody></table>
								  <table class="one-col-bg" style="border-collapse: collapse;border-spacing: 0;width: 100%;background-color: #f2efe9">
									<tbody><tr>
									  <td style="padding: 0;vertical-align: middle" align="center">
										<table class="one-col centered" style="border-collapse: collapse;border-spacing: 0;Margin-left: auto;Margin-right: auto;width: 600px">
										  <tbody><tr>
											<td class="column" style="padding: 0;vertical-align: middle;text-align: left">
											  <table class="contents" style="border-collapse: collapse;border-spacing: 0;width: 100%;background-color: #fff">
												<tbody><tr>
												  <td style="padding: 0;vertical-align: middle">                            
												  <div class="image" style="font-size: 0;Margin-bottom: 22px" align="center">
													<img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top" style="border: 0;-ms-interpolation-mode: bicubic;display: block;max-width: 900px" src="http://fotos.subefotos.com/a77a4132e326769ff1a51aa0aaea2f28o.jpg" alt="Banner-Metin2Evolution" height="135" width="600">
												  </div>            
													  <table style="border-collapse: collapse;border-spacing: 0" width="100%">
														<tbody><tr>
														  <td class="padded" style="padding: 0;vertical-align: middle;padding-left: 92px;padding-right: 92px">
														<h1 style="Margin-top: 0;font-weight: normal;color: #38434d;font-family: Georgia,serif;font-size: 22px;Margin-bottom: 18px;line-height: 30px">Ha solicitado cambiar contrase&ntilde;a!</h1>
														<p style="Margin-top: 0;font-weight: 400;font-size: 14px;line-height: 22px;color: #7c7e7f;font-family: sans-serif;Margin-bottom: 22px">Para poder cambiar su contrase&ntilde;a debe pinchar en el boton cambiar contrase&ntilde;a y seguir las instrucciones.</p><br>
														<div class="btn" style="text-align: center;Margin-bottom: 22px">
														  <!--[if !mso]--><a style="display: inline-block;font-size: 12px;line-height: 18px;font-weight: 500;text-align: center;text-decoration: none;padding: 10px;transition: background-color 0.2s, border-color 0.2s;color: #fff;background-color: #444;font-family: sans-serif;width: 396px" href="http:/evolution.co.ve/index.php?token='.$token.'">Cambiar contrase&ntilde;a</a></div>
														<p style="font-weight: 400; font-size: 14px; line-height: 22px; color: #7c7e7f; font-family: sans-serif; Margin-bottom: 22px">si el boton Cambiar contrase&ntilde;a no funciona, por favor visite el siguiente link</p>
														<p style="font-weight: 400; font-size: 14px; line-height: 22px; color: #7c7e7f; font-family: sans-serif; Margin-bottom: 22px"><a href="http:/evolution.co.ve/index.php?token='.$token.'">http:/evolution.co.ve/index.php?token='.$token.'</a></p>
														<p style="font-weight: 400; font-size: 14px; line-height: 22px; color: #7c7e7f; font-family: sans-serif; Margin-bottom: 22px">Gracias por preferirnos, recuerde que ningun GM , GA o miembro del equipo le solicitara datos confidenciales como su ID , contrase&ntilde;a, email, le recordamos tambien que para su seguridad no preste su cuenta a terceros, ya que si lo hace pierde todo derecho a soporte y si pierde items o personajes estos no podran ser reestablecidos..</p>
													   </td>
														</tr>
													  </tbody>
													  </table> 
													  </tbody>
												 </table>              
											</tbody></table>        
										  <div class="spacer" style="font-size: 1px;line-height: 60px;width: 100%;background-color: #f2efe9">&nbsp;</div>
										<table class="footer" style="border-collapse: collapse;border-spacing: 0;table-layout: fixed;width: 100%;background-color: #ece8df">
										<tbody><tr>
										<td style="padding: 0;vertical-align: top;text-align: left">&nbsp;</td>
										<td class="inner" style="padding: 0;vertical-align: top;text-align: left;padding-top: 40px;padding-bottom: 75px;width: 464px">
										<table style="border-collapse: collapse;border-spacing: 0;width: 100%">
										<tbody><tr>
										<td class="campaign" style="padding: 0;vertical-align: top;text-align: left;font-size: 12px;line-height: 20px;color: gray;font-family: sans-serif">
										  <div align="center">Copyright Â© Metin2Evolution 2015. Todos los derechos reservados.
						 Sitio programado por <a href="mailto:soporte@evolution.co.ve">soporte@evolution.co.ve</a></div>
										  <table class="divider" style="border-collapse: collapse;border-spacing: 0;font-size: 1px;line-height: 1px;background-color: #d0c5af;width: 13px">
										  <tbody><tr><td style="padding: 0;vertical-align: top;text-align: left">&nbsp;</td></tr></tbody></table>
										  <div>                    
										  </div>              
										</tbody>
										</table>          
								  <td></td>       
						  </body>
						</html>';
					$mail->IsHTML(true);
					if($mail->Send())
						{
						$insert = mysqli_query($this->conexion(), "INSERT INTO account.changepass (userid,token,status,email) VALUES ('".$_SESSION['login']."','".$token."','".$status."','".$email."')");
                		echo "success";
				}
		  	}
		}

	  // revisar si el token corresponde al usuario //
	  public function checktoken($token) {
	       $token =mysqli_query($this->conexion(),"SELECT userid FROM account.changepass WHERE token='".$token."'");
	       $row=mysqli_fetch_array($token,MYSQLI_ASSOC);
	       if($row['userid'] == $_SESSION['login']){
	       return true;	
	       }
	       else {
	       	return false;
	       }
	  }	

	  public function updatepass($oldpass,$newpass,$token) {
	       $token =mysqli_query($this->conexion(),"SELECT userid FROM account.changepass WHERE token='".$token."'");
	       $row=mysqli_fetch_array($token,MYSQLI_ASSOC);
	       if($row['userid'] == $_SESSION['login']){
	       $login =mysqli_query($this->conexion(),"SELECT id FROM account.account WHERE login='".$row['userid']."' AND password = PASSWORD('".$oldpass."') LIMIT 1");
	       $rows=mysqli_fetch_array($login,MYSQLI_ASSOC);
	       if($rows["id"]){
	       		$query=mysqli_query($this->conexion(),"UPDATE account.account set password=PASSWORD('".$newpass."') WHERE login='".$row['userid']."' LIMIT 1");
	        	if($query){
	        		$delete=mysqli_query($this->conexion(),"DELETE FROM account.changepass WHERE userid='".$row['userid']."'");
	        		if($delete){
	        			echo "success";
	        			}
	        		}
	        	}
	        else
	        {
	        	echo "invalidpass";
	        }	
	       }
	       else
	       {
	       	echo "userinvalid";
	       }

	  }	
	///////////// FIN MENSAJERIA /////////
	 
	  

	 // obtener categorias

	  public function get_cats(){
	  	$sql=mysqli_query($this->conexion(),"SELECT * FROM player.shop_class");
	  	while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)) {
	  	echo '<option value="'.$row['classid'].'">'.$this->DeCode($row['classname'],'D','daichao').'</option>';
	   }
	  }

	  public function get_items($id){
	  	$sql=mysqli_query($this->conexion(),"SELECT * FROM player.item_proto_shop WHERE classid='".$id."'");
	  	while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)) {
	  	
	  	$descuento = $row['rebate'];

	  	/// CALCULAR PRECIO CON DESCUENTO
	  		$tot = $row['prices'] - ($row['prices']*$row['rebate']/100);
			$precio_final = number_format($tot,0);

			$ahorro = $row['prices'] - $precio_final;
	  	/////////////////////////////////

		if($row['rebate'] > 0) {
			if(!file_exists($row['img'])){
	  		echo '<tr>
		      <td colspan="2" rowspan="2"><img src="uploads/default.png" style="float:right;"><span id="descuento_'.$descuento.'"></span></td>
		      <td height="19"><span class="titulo">'.$row['name'].'</span><span style="float:right; font-size:11px;"> Ahorras <span style="color:#04B404;">'.$ahorro.'</span> DC</span></td>
		      </tr>
		      <tr>
		      <td height="43" class="description">'.$this->DeCode($row['content'],'D','daichao').' <span style="float:right"> Precio Antes: 
		      <span style="color:#DF0101;text-decoration: line-through;">'.$row['prices'].'</span> Ahora <span style="color:#04B404;">'.$precio_final.'</span> DC Acomulas <span style="color:#B40431;">'.$precio_final.'</span> 
		      MD <button class="btn btn-success btn-xs" id="buy_'.$row['vnum'].'" onclick="buy_item('.$row['vnum'].');" style="width:60px;">
		      <i class="fa fa-shopping-cart fa-lg"></i></button> <button class="btn btn-warning btn-xs" id="detail">Detalles</button>
		      <span id="comprar"></span></span></td>
		    </tr>';
	     }
	     else
	  	{
	  	echo '<tr>
		      <td colspan="2" rowspan="2"><img src="'.$row['img'].'" style="float:right;"></td>
		      <td height="19" class="titulo">'.$row['name'].'</td>
		      </tr>
		      <tr>
		      <td height="43" class="description">'.$this->DeCode($row['content'],'D','daichao').' <span style="float:right"> Precio: 
		      <span style="color:#04B404;">'.$row['prices'].'</span> DC Acomulas <span style="color:#B40431;">'.$row['prices'].'</span> 
		      MD <button class="btn btn-success btn-xs" id="buy_'.$row['vnum'].'" onclick="buy_item('.$row['vnum'].');" style="width:60px;">
		      <i class="fa fa-shopping-cart fa-lg"></i></button> <button class="btn btn-warning btn-xs" id="detail">Detalles</button>
		      <span id="comprar"></span></span></td>
		    </tr>';
	     }
		}
		else {
			if(!file_exists($row['img'])){
	  		echo '<tr>
		      <td colspan="2" rowspan="2"><img src="'.$row['img'].'" style="float:right;"></td>
		      <td height="19" class="titulo">'.$row['name'].'</td>
		      </tr>
		      <tr>
		      <td height="43" class="description">'.$this->DeCode($row['content'],'D','daichao').' <span style="float:right"> Precio:  
		      <span style="color:#DF0101;">'.$row['prices'].'</span> DC Acomulas <span style="color:#B40431;">'.$row['prices'].'</span> 
		      MD <button class="btn btn-success btn-xs" id="buy_'.$row['vnum'].'" onclick="buy_item('.$row['vnum'].');" style="width:60px;">
		      <i class="fa fa-shopping-cart fa-lg"></i></button> <button class="btn btn-warning btn-xs" id="detail">Detalles</button>
		      <span id="comprar"></span></span></td>
		    	</tr>';
		     }
		     else
		  	{
		  	echo '<tr>
			      <td colspan="2" rowspan="2"><img src="'.$row['img'].'" style="float:right;"></td>
			      <td height="19" class="titulo">'.$row['name'].'</td>
			      </tr>
			      <tr>
			      <td height="43" class="description">'.$this->DeCode($row['content'],'D','daichao').' <span style="float:right"> Precio: 
			      <span style="color:#04B404;">'.$row['prices'].'</span> DC Acomulas <span style="color:#B40431;">'.$row['prices'].'</span> 
			      MD <button class="btn btn-success btn-xs" id="buy_'.$row['vnum'].'" onclick="buy_item('.$row['vnum'].');" style="width:60px;">
			      <i class="fa fa-shopping-cart fa-lg"></i></button> <button class="btn btn-warning btn-xs" id="detail">Detalles</button>
			      <span id="comprar"></span></span></td>
			    </tr>';
		      }
		    }	  	
		  }
	}

	  ///// mover personaje  ////
	  public function desbloq($id) {
	  	$strSQL =mysqli_query($this->conexion(),"SELECT empire FROM player.player_index WHERE id = '".$_SESSION['id']."' ");
	  	$row=mysqli_fetch_array($strSQL,MYSQLI_ASSOC);
	  	if ($row['empire'] == 1)
			{
				$map = "1";
				$x = "469187";
				$y = "964351";
			}
	    if ($row['empire'] == 2)
			{
				$map = "21";
				$x = "55700";
				$y = "157900";
			}
	    if ($row['empire'] == 3)
			{
				$map = "41";
				$x = "969528";
				$y = "278857";
			}

	    $move = mysqli_query($this->conexion(),"UPDATE player.player SET x='".$x."', y='".$y."', map_index='".$map."', exit_x='".$x."', exit_y='".$y."', exit_map_index='".$map."'' WHERE id='".$id."'' LIMIT 1");
	    if($move){
	    	echo true;
	    	}
	    }	    
	}

	class user_admin extends Mysql {

	/// PANEL DE ADMINISTRACIÃ“N ////

	    private function get_ip($player_name){

	    	$sql = mysqli_query($this->conexion(), "SELECT ip FROM player.player WHERE name='".$player_name."'");
	    	$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
	    	if($row['ip']){
	    		echo $row['ip'];
	    	}
	    	else{
	    		return false;
	    	}
	 	}

	########################################################


	}



?>