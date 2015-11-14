<div class="col-md-8">
      <div class="panel panel-info">
		<div class="panel-heading">
		<h3 class="panel-title">Nueva Password</h3>
		</div>
		<?php if(isset($_SESSION['login'])) {
		if($class->checktoken($_GET['token'])) {
		?>
		<div class="well " style="width:90%; margin-left:5%; margin-top:15px;">
		<div id="msgnewpassw"></div>
		<form action="" method="post" id="formnewpass">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Antigua Contraseña</label>
		    <input type="hidden" id="token" name="token" value="<?php echo $_GET['token']; ?>">
		    <input type="password" class="form-control" id="oldpass" placeholder="Antigua Contraseña">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nueva Contraseña</label>
		    <input type="password" class="form-control" id="newpass" placeholder="Nueva Contraseña">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Repetir Nueva Contraseña</label>
		    <input type="password" class="form-control" id="rnewpass" placeholder="Repetir Nueva Contraseña">
		  </div>
		  <button type="button" class="btn btn-success" id="savenewpass">Guardar</button><span id="loading"> </span>
		</form>
		<br>
		</div>
		<?php } else {			
		?>
		<div class="alert alert-dismissible alert-warning" style="width:90%; margin-left:5%; margin-top:15px">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <h4>Token no existe!</h4>
		  <p>Debes solicitar desde tu panel de usuario un link que se enviara a tu correo y sigue las instrucciones, <a href="index.php?s=usercp" class="alert-link">Ir al Panel de Usuario</a>.</p>
		</div>
		<?php
		}
		}
	    else {
	    ?>
		<div class="alert alert-dismissible alert-danger" style="width:90%; margin-left:5%; margin-top:15px">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <h4>Inicia Sesion!</h4>
		  <p>Para poder cambiar tu contraseña debes estar logueado en la pagina,<br> <a href="index.php" class="alert-link">Ir a la pagina principal</a>.</p>
		</div>
	   	<?php	  	
		}
		?>
		</div>
	</div>
</div>