<?php
	require("../config/classes.php");
	$class = new user_panel();
	$idcat = mysqli_real_escape_string($class->conexion(), $_GET['idcat']);
?>
<style type="text/css">
	table .titulo {
		padding: 5px;
		margin: 0px;
		color:#6E6E6E;
		text-decoration: underline;
		font-size:12px;
	}
	table .description {
		padding: 5px;
		font-size:11px;
	}
</style>
<div class="table-responsive" style="width:100%;">
<table width="100%" class="table table-condensed">
  <tbody>
    <?php $class->get_items($idcat); ?>
  </tbody>
</table>
</div>
