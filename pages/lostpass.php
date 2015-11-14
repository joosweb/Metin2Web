<?php  
include("ajax/simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
?> 
<div class="col-md-8">
      <div class="panel panel-info">
		<div class="panel-heading">
		<h3 class="panel-title">Recuperar Contraseña</h3>
		</div>
		<form action="" method="POST" id="oldpassword">
		<div class="well " style="width:90%; margin-left:5%; margin-top:15px;">
	   	 <div id="msgerror"></div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nombre de Usuario</label>
		    <input type="text" class="form-control input-sm" id="userid" placeholder="Nombre de Usuario">
		    </div>
		    <div class="form-group">
		    <label for="exampleInputPassword1">Correo Electronico</label>
		    <input type="email" class="form-control input-sm" id="oldemail" placeholder="example@example.cl">
		    </div>
		    <div class="form-group">
		    <?php	echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA" width="100px">'; ?><br>
		    <input type="text" class="form-control input-sm" id="recaptcha2" placeholder="Code">
		   	<input type="hidden" id="sessioncaptcha2" value="<?php echo $_SESSION['captcha']['code'];?>">
		    </div>
		    <button type="submit" class="btn btn-success btn-xs">Enviar</button>
		   <button type="reset" class="btn btn-warning btn-xs">Reset</button><span id="msglost"></span>
		  </form>
		 </div>		
		</div>
	</div>
</div>
