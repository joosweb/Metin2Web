<style>
	.panel {
  box-shadow: none !important;
}
</style>
<div class="col-md-8">
      <div class="panel panel-default">
		<div class="panel-heading">
          <button type="button" style="width:400px;" class="btn btn-warning btn-xs spoiler-trigger" data-toggle="collapse">Obtener Coins por SMS(Mensajes de texto)</button>
        </div>
        <div class="panel-collapse collapse out">
          <div class="panel-body">
			<iframe src="http://iframe.contenidopago.com/index.php?cnt_serviceid=7147&tpv=0&llamada=0&banco=0&sms=1&var=<?=$_SESSION["userid"]?>" width="550px" height="400px" frameborder="0"> <p>Your browser does not support iframes.</p> </iframe>
			</div>
        </div>
        <div class="panel-heading">
          <button type="button" style="width:400px;" class="btn btn-success btn-xs spoiler-trigger" data-toggle="collapse">Ayudanos votando cada 12 horas</button>
        </div>
        <div class="panel-collapse collapse out">
          <div class="panel-body">
			<h4>Podras votar la comunidad de Metin2 Evolution haciendo tu aporte voluntario.</h4>
			<p>Para que tu voto sea valido debes hacer click en cada uno de los siguientes banners y completar todo el proceso de votacion poniendo el codigo de seguridad pedido en la siguiente pagina.</p>
			<p>Ten presente que solo podras votar cada 12 horas <strong>con cuantas cuentas quieras</strong> (que esperas, ayudanos haciendo tu voto).</p> 
			<ca><a target="_blank" href="http://www.gtop100.com/in.php?site=69364"><img src="images/banners/server-1.jpg" alt="Server 1"></a></ca>
			<ca><a target="_blank" href="http://topofgames.com/index.php?do=votes&id=48116"><img src="images/banners/server-2.jpg" alt="Server 2"></a></ca>
			<ca><a target="_blank" href="http://www.topliste.top-pserver.com/in/2265-evolution-co-ve.html"><img src="images/banners/server-3.jpg" alt="Server 3"></a></ca>
			<ca><a target="_blank" href="http://www.gamingtop100.net/in.php?site=12214"><img src="images/banners/server-4.jpg" alt="Server 4"></a></ca>
			<ca><a target="_blank" href="http://www.topmmorpglist.net/?v=shino4011"><img src="images/banners/server-5.gif" alt="Server 5"></a></ca>	
			</div>
        </div>
		<div class="panel-heading">
          <button type="button" style="width:400px;" class="btn btn-info btn-xs spoiler-trigger" data-toggle="collapse">Recarga de Coins por medio de LLAMADAS!</button>
        </div>
        <div class="panel-collapse collapse out">
          <div class="panel-body">
			<iframe src="http://iframe.contenidopago.com/index.php?cnt_serviceid=7147&tpv=0&llamada=1&banco=0&sms=0&var=<?=$_SESSION["login"]?>" width="550px" height="400px" frameborder="0"> <p>Your browser does not support iframes.</p> </iframe>
		</div>
        </div>
        <div class="panel-heading">
          <button type="button" style="width:400px;" class="btn btn-danger btn-xs spoiler-trigger" data-toggle="collapse">Obtener Coins por Tarjeta de Credito</button>
        </div>
        <div class="panel-collapse collapse out">
          <div class="panel-body">
			<iframe src="http://iframe.contenidopago.com/index.php?cnt_serviceid=7147&tpv=1&llamada=0&banco=0&sms=0&var=<?=$_SESSION["login"]?>" width="550px" height="400px" frameborder="0"> <p>Your browser does not support iframes.</p> </iframe>   
			</div>
        </div>
  </div>
</div>
</div>
