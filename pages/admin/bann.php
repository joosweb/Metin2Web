<?php if($_SESSION['web_admin'] >= 9){ ?>
<div class="well" style="width:90%; margin-left:5%; margin-top:2px;">
	<h6>Baneo y Desbaneo de Usuarios</h6>
	<select name="bannoption" id="bannoption">
		<option value="job">Banear Personaje</option>
		<option value="ip">Banear Por ip</option>
	</select>
	<br><br>
	<div id="bannjob" style="display:block;">
	<form action="" method="post" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre Personaje</label>
            <input type="text" name="username" class="form-control input-sm" id="username" placeholder="Nombre del personaje">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Razon del baneo o desbaneo</label>
            <input type="text" name="reason" id="reason" class="form-control input-sm" placeholder="Razón de baneo">
        </div>
         <!-- Date and time range -->
        <div class="form-group">
        <label>Tiempo:</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
            </div>
            <input type="text" name="time" value="2015-09-14 03:17:09" class="form-control pull-right input-sm" id="reservationtime"/>
        </div><!-- /.input group -->
        </div>
            <div class="form-group">
            <input type=radio name='radioban' value='bann'> Banear<br>
            <input type=radio name='radioban' value='desbann'> Desbanear<br><br> 
            </div>             
        <div class="form-group">
            <label for="exampleInputFile">Prueba</label>
            <input type="file" id="img" name="img">
            <p class="help-block">Seleccione una imagen desde su escritorio.</p>
        </div>       
    </div><!-- /.box-body -->
    <div class="box-footer">
        <input type="submit" id="bannuser" name="bannuser" value="Banear" class="btn btn-primary">
    </div>
</form>
</div>
	<div id="bannip" style="display:none;">
	<form  action="" method="post"> 
    <div class="box-body">
    	<div class="form-inline well">
            <input type="text" name="ip" id="playername" class="form-control input-sm" id="ip" placeholder="Buscar personaje" />
            <input type="button" id="searchip" value="Buscar" name="search" class="btn btn-success btn-sm"><span id="cargando"> </span>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">IP</label>
            <input type="text" class="form-control input-sm" name="ip" id="ip" placeholder="200.879.90.10">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Razon del baneo o desbaneo</label>
            <input type="text" class="form-control input-sm" id="reason" name="reason" placeholder="Razón de baneo">
        </div>
        <!-- Date and time range -->
    <div class="form-group">
        <label>Tiempo:</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
            </div>
            <input type="text" name="time" value="2015-09-14 03:17:09" class="form-control pull-right input-sm" id="reservationtime"/>
        </div><!-- /.input group -->
    </div><!-- /.form group -->
     <div class="form-group">
            <input type=radio name='radioban' value='bann'> Banear<br>
            <input type=radio name='radioban' value='desbann'> Desbanear<br><br> 
     </div>                             
        <div class="box-footer">
        <input type="submit" id="banip" name="banip" value="banip" class="btn btn-primary">
    </div>
</form>
</div>
</div>
<?php } else { ?>
<div class="alert alert-dismissible alert-danger" style="width:90%; margin-left:36px; margin-top:5px;"><i class="fa fa-frown-o"> No tienes suficientes permisos!.</i>
</div>
<?php } ?>