<?php 
session_start();
if($_SESSION['id']){ 
include("ajax/simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
?> 
<div class="col-md-8">
<div class="panel panel-info">
		<div class="panel-heading">
		<h3 class="panel-title">Panel de control</h3>
		</div>
		  <div class="panel-group">
		  <div class="panel panel-default" style="width:90%; margin-left:5%; margin-top:5px; font-size:11px;">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <button class="btn btn-warning btn-xs" style="width:200px;" data-toggle="collapse" href="#collapse1">Mover Personaje</button>
		      </h4>
		    </div>
		    <div id="collapse1" class="panel-collapse collapse">
		    <div class="panel-body">
			 <div class="text">El personaje sera reinstaurado en el centro de la ciudad correspontiente a tu reino.</div>
				<form action="index.php?s=usercp" method="get" class="form-inline">
				<div class="form-group">
				<div class="text">Personajes</label>
				<select name="pid" id="pid" class="">
				<?php $pj = new user_panel(); echo $pj->getplayers($_SESSION['id']);?>
				</select>
				<input style="margin-top:-3px;" type="button" name="desbloquear" id="desbloquear" class="btn btn-success btn-xs" value="Mover"><span id="msgpid"> </span>
				</div>				   
				</form>
				</div>
		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default" style="width:90%; margin-left:5%; margin-top:5px;">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <button class="btn btn-success btn-xs" style="width:200px;" data-toggle="collapse" href="#collapse2">Cambiar Contraseña</button>
		      </h4>
		    </div>
		    <div id="collapse2" class="panel-collapse collapse">
		      <div class="panel-body">
				<div class="well" style="width:90%; margin-left:5%;">
				<span class="text">Se enviara un link de cambio de contraseña a su correo electronico.</span>
				<form class="form-inline">
				  <div class="form-group">
				    <?php	echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA" width="100px">'; ?>
				  </div>
				  <div class="form-group">
				    <input name="rcaptcha" size="7" id="rcaptcha" type="text" class="txtbar" />
				  	<input type="hidden" id="sessioncaptcha" value="<?php echo $_SESSION['captcha']['code'];?>">
				  </div>
				  <button class="btn btn-success btn-xs" id="newpass" type="button">Solicitar</button><span id="msgnewpass"></span>
				</form>
				</div>
		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default" style="width:90%; margin-left:5%; margin-top:5px;">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <button class="btn btn-info btn-xs" style="width:200px;" data-toggle="collapse" href="#collapse3">Cambiar Email</button>
		      </h4>
		    </div>
		    <div id="collapse3" class="panel-collapse collapse">
		     <div class="panel-body">
			 <form action="" method="POST" id="formemailch">
			  <div class="form-group">
			    <label for="exampleInputPassword1">Nuevo Email</label>
			    <input type="email" class="form-control input-sm" id="newemail" placeholder="example@yahoo.com" required>
			    </div>
			  	 <div class="form-group">
			    <?php	echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA" width="100px">'; ?>
				<input type="hidden" id="sessioncaptcha2" value="<?php echo $_SESSION['captcha']['code'];?>">
			 	<input name="rcaptcha" size="7" id="rcaptcha2" type="text" class="txtbar" />
			  	</div>
			  	<button type="submit" class="btn btn-success btn-sm">Enviar</button><span id="newmailmsg"></span>
				</form>
		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default" style="width:90%; margin-left:5%; margin-top:5px;">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <button class="btn btn-danger btn-xs" style="width:200px;" data-toggle="collapse" href="#collapse4">Contraseña de Almacen</button>
		      </h4>
		    </div>
		    <div id="collapse4" class="panel-collapse collapse">
		      <div class="panel-body">Panel Body</div>
		      <div class="panel-footer">Panel Footer</div>
		    </div>
		  </div>
		</div>
		</div>
	</div>
</div>
<?php } else {?>
	<div class="col-md-8">
      <div class="panel panel-info">
		<div class="panel-heading">
		<h3 class="panel-title">Panel de control</h3>
		</div>
		<div class="userpanel" style="text-align:center;">
		<div class="alert alert-dismissible alert-danger" style="width:90%; margin-left:20px; margin-top:5px;"><i class="fa fa-frown-o"> Para navegar en esta sección debe estar logueado!.</i>
		</div>
		</div>
	</div>
</div>
<?php } ?>