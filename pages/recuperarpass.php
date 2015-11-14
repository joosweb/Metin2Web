<div class="col-md-8">
      <div class="panel panel-info">
		<div class="panel-heading">
		<h3 class="panel-title">Nueva Contraseña</h3>
		</div>
		<?php
		if($class->check_old_pass($_GET['pid'])) {
		?>
		<div class="well">
		<?php
		if(isset($_POST['actualizar']))
		{	$select = mysqli_query($class->conexion(),"SELECT * from account.oldpass WHERE token='".$_GET['pid']."'");
			$row = mysqli_fetch_array($select,MYSQLI_ASSOC);
			if($row['id']){
			$newpass = mysqli_real_escape_string($class->conexion(),$_POST['password']);
			$sql = mysqli_query($class->conexion(),"UPDATE account.account set password=PASSWORD('".$newpass."') WHERE login='".$row['user_id']."' LIMIT 1");
			if($sql){
				$sql = mysqli_query($class->conexion(),"DELETE FROM account.oldpass WHERE token='".$_GET['pid']."'");
				echo '<div class="alert alert-dismissible alert-success">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>Felicidades!</strong> Su contraseña ha sido cambiada exitosamente!</strong>.
					</div>';
				}
			}			
		}
		?>
		<form method="POST">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nueva Contraseña</label>
		    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Contraseña" required>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Repetir Nueva Password</label>
		    <input type="password" name="npassword" class="form-control" id="exampleInputPassword1" placeholder="Repetir Contraseña" required>
		  </div>
		  <button type="submit" name="actualizar" class="btn btn-success">Actualizar</button>
		</form>
		<?php	
		}
		else
		{
		?>
		<div class="alert alert-dismissible alert-warning">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <h4>Atención!</h4>
		  <p>Debe solicitar un enlace que se enviara al email registrado con la cuenta, Solicitelo <a href="index.php?s=lostpass" class="alert-link">Aqui</a>.</p>
		</div>
		<?php
		}
		?>
		</div>
		</div>
	</div>
</div>