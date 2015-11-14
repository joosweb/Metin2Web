<div class="col-md-8">
      <div class="panel panel-info">
		<div class="panel-heading">
		<h3 class="panel-title">Tienda<span style="float:right; font-size:12px; margin-top:3px;">DC: <span style="color:#00FF00;" id="coins"><?php echo $class->get_coins($_SESSION['id']); ?></span> <img src="img/icons/coins_24.png" width="15px;" title="Monedas de Dragón"> MD: <span style="color:#FFBF00;" id="jcoins"><?php echo $class->get_jcoins($_SESSION['id']); ?></span> <img src="img/icons/gold.png" width="15px;" title="Marcas de Dragón"></span></h3>
		</div>
		<div id="categorias">
		<?php if(isset($_SESSION['id'])) { ?>
			<div id="loading"></div>
		<?php } ?>
		</div>
	</div>
	</div>
</div>