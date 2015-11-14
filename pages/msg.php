<div class="col-md-8">
      <div class="panel panel-info">
		<div class="panel-heading">
		<h3 class="panel-title">Mensajes</h3>
		</div>
		<div id="mensajes">
		<table class="table">
         <tbody>
         <tr>
         	<th>#</th>
         	<th>Tipo</th>
         	<th>Nombre</th>
         	<th>Asunto</th>
         	<th>Fecha</th>
         </tr>
         <?php echo $class->get_messages(); ?>         
     	</tbody>
     	</table>
		</div>
        <div id="loading"></div>
		<div id="readmsg"></div>
	  </div>	  
	</div>
</div>