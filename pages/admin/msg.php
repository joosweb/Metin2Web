<div class="well" style="width:90%; margin-left:5%; margin-top:2px;">
<form class="form-horizontal" action="" method="post" id="msghtml">
  <fieldset>
<br>
<legend>Mensajes</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Admin-Name</label>
      <div class="col-lg-10">
        <input class="form-control" id="adminname" placeholder="Nombre" type="text">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Asunto</label>
      <div class="col-lg-10">
        <input class="form-control" id="topic" placeholder="Asunto" type="text">
        <div class="checkbox">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Mensaje HTML</label>
      <div class="col-lg-10">
        <textarea cols="80" id="editor1" name="editor1" rows="10">
			</textarea>
			<script type="text/javascript">
			CKEDITOR.replace("editor1");
			</script>
        <span class="help-block">Las imagenes o banner deben ser 88 alto X 530 ancho, para tener una mejor vista en moviles o tablets agregar el atributo <b>class="img-responsive"</b> a las imagenes.</span>
      </div>
    </div>    
     <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      <select name="type" id="type">
        <option value="Evento">Evento</option>
        <option value="Actualización">Actualización</option>
        <option value="Información">Información</option>
        <option value="ItemShop">ItemShop</option>
      </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" id="writemsg" class="btn btn-primary">Guardar</button> <span id="status"></span>
      </div>
    </div>
  </fieldset>
</form>
