// A $( document ).ready() block.
$( document ).ready(function() {   
	
  $(".spoiler-trigger").click(function() {
    $(this).parent().next().collapse('toggle');
  });

	// login de usuarios

	$('#entrar').click(function(){

   		var user = $('#cuenta').val();
   		var password = $('#contrasena').val();

   		 $.ajax({
    		url: 'ajax/login.php?username='+user+'&password='+password,
   		 	beforeSend: function(){
   		 		$('#load').html('<img src="img/ajax-loader.gif">');
   		 	},
   		 	success: function(result){
   		 		if(result == 'ok'){
   		 			$("#correcto").css("display", "block");
   		 			setInterval(function() {
					     location.reload();
					}, 3000);
   		 		}
   		 		else {
   		 			$("#fail").css("display", "block").fadeOut(8000);
   		 			$('#load').html('');
   		 		}
     	  }});
	});	

	// fin de login 

	/// Logout

	$('#salir').click(function(){
		$.ajax({
    		url: 'ajax/logout.php',
   		 	success: function(result){
   		 		$("#logout").css("display", "block");
   		 		setInterval(function() {
					     window.location.href = 'index.php';
				}, 3000);
     	  }});

	});

	// fin logout

	// cambiar email 

	$('#formemailch').submit(function(e){

    e.preventDefault();

    var captcha = $("#sessioncaptcha2").val();
    var inputcaptcha = $("#rcaptcha2").val();
    var newemail = $("#newemail").val();

    var DataString = 'newemail='+newemail;

    if(captcha == inputcaptcha)
    {
		$.ajax({
        type: 'POST',
    		url: 'ajax/changemail.php',
        data: DataString,
   		 	beforeSend: function(){
   		 		$("#newmailmsg").html(" <img src='img/ajax-loader.gif'>");
   		 	},
   		 	success: function(result){
          if(result == 'success'){
            $("#newmailmsg").html(' <i class="fa fa-check fa-lg"></i>');
          }
          if(result == 'pendiente'){
            $("#newmailmsg").html(' <i class="fa fa-times"> Pendiente!</i>');
          }
          if(result == false) {
             $("#newmailmsg").html(result);
          }
   		 		
     	  }});
      }
      else {
      $("#newmailmsg").html(' <i class="fa fa-times"> Code error!</i>');
      return false; 
    }   
	});


	$('#changemailclose').click(function(){
	$('#changemailinfo').css('display','none');
	$('#changemailsuccess').css('display','none');

	});

	// fin de cambiar email

  // cambiar pass

  $("#newpass").click(function(){
    var captcha = $("#sessioncaptcha").val();
    var inputcaptcha = $("#rcaptcha").val();

    if(captcha == inputcaptcha)
    {
    var email = $("#email").val();
    var dataString = "email="+email;

    $.ajax({
        type:"POST",
        url: "ajax/newpass.php",
        data: dataString,
        beforeSend: function(){
        $("#msgnewpass").html(" <img src='img/ajax-loader.gif'>");
        },
        success: function(data){
        if(data == 'pendiente'){
        $("#msgnewpass").html(' <i class="fa fa-times"> Pendiente!</i>');
        }
        else if(data == "success"){
        $("#msgnewpass").html(' <i class="fa fa-check-circle"> Enviado!</i>');
        }
        else{
          $("#msgnewpass").html(data);
        }
        
      }
    });
    }
    else {
    $("#msgnewpass").html(' <i class="fa fa-times"> Code error!</i>');
    return false; 
  }   
});

/// actualizar contraseña
$("#savenewpass").click(function(){

    var oldpass = $("#oldpass").val();
    var newpass = $("#newpass").val();
    var rnewpass = $("#rnewpass").val();

    if(newpass < 1 || rnewpass < 1){
    $("#msgnewpassw").html('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><p>Por favor ingresa los datos solicitados.</p></div>'); 
    return false;
    }
    var token = $("#token").val();

    if(newpass == rnewpass){
      var dataString = "oldpass="+oldpass+"&newpass="+newpass+"&token="+token;
      $.ajax({
          type:"POST",
          url:"ajax/updatepass.php",
          data: dataString,
          beforeSend: function(){
          $("#loading").html(' <img src="img/ajax-loader.gif">');  
          },
          success: function(data){
            if(data == 'invalidpass')
            {
            $("#msgnewpassw").html(' <div class="alert alert-dismissible alert-danger">Tu antigua contraseña no coindice con la que has ingresado!</div>');  
            }
            else if(data == 'userinvalid')
            {
            $("#msgnewpassw").html('<div class="alert alert-dismissible alert-danger">El codigo usado no es correcto, intento de bugs puede ser penado con baneo permanente..(Guardando en logs..)</div>');  
            }
            else
            {
            $("#msgnewpassw").html('<div class="alert alert-dismissible alert-success">La contrase&ntilde;a ha sido cambiada con exito, estas siendo desconectado <img src="img/ajax-loader.gif">');  
            $.ajax({     
                url:'ajax/logout.php',     
                success:  function (response) {
                var delay = 5000; //Your delay in milliseconds
                setTimeout(function(){ window.location = 'index.php'; }, delay);            
               }  
             });            
             }
          }
        });
        }
      else
      {
      $("#msgnewpass").html("<img src='images/cautionMedium.png' width='20px' alt=''> Las nuevas contrase&ntilde;as no coinciden!");
      }
    });
  


	// registro de usuarios

	$('#cambiaremail').click(function(){
		$.ajax({
    		url: 'ajax/changemail.php',
   		 	beforeSend: function(){
   		 		$('#changemailinfo').css('display','block');
   		 	},
   		 	success: function(result){
   		 		$('#changemailinfo').css('display','none');
   		 		$("#changemailsuccess").css("display", "block");
     	  }});
	});


  // recuperar contraseña

  $("#oldpassword").submit(function(e){

    e.preventDefault();

    var userid = $('#userid').val();
    var email  = $('#oldemail').val();
    var captcha = $("#sessioncaptcha2").val();
    var inputcaptcha = $("#recaptcha2").val();

    dataString = 'userid='+userid+'&email='+email;

    if(captcha == inputcaptcha)
    {
    $.ajax({
        type:"POST",
        url: "ajax/oldpass.php",
        data: dataString,  
        beforeSend: function () {
          $("#msglost").html(' <img src="img/ajax-loader.gif">');
        },
        success: function(data){
          if(data == 'success')
          { 
          $("#msgerror").html('<div class="alert alert-success"><i class="fa fa-check fa-lg"></i> Se enviara un mensaje a su bandeja de entrada con las instrucciones para recuperar su contraseña.!</div>');
          $("#msglost").html(' <i class="fa fa-check fa-lg"></i>');
          }
          else if(data == 'noexist')
          {
          $("#msglost").html('');
          $("#msgerror").html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> El correo electronico no corresponde al usuario ingresado!</div>');
          }
          else{
             $("#msglost").html(' <img src="img/ajax-loader.gif">');
          }
        }
      });
       }
      else {
      $("#msglost").html(' <i class="fa fa-times"> Code error!</i>');
      return false; 
    }   
   });

  // desbloquear personaje 

  $("#desbloquear").click(function(){
    var player = $("#pid").val();
    var dataString = "pid="+player;
    $.ajax({
        type:"GET",
        url: "ajax/mover.php",
        data: dataString,  
        beforeSend: function () {
          $("#msgpid").html('<img src="img/ajax-loader.gif">');
        },
        success: function(data){
          if(data)
          {
          $("#msgpid").html(' <i class="fa fa-check fa-lg"></i>');
          }
          else
          {
          $("#msgpid").html(' <i class="fa fa-frown-o fa-lg"></i>');
          }
        }
      });
   });
    
  // Subir avatar

  //al enviar el formulario
     $('#uploadForm').submit(function(e) {  
        if($('#userImage').val()) {
            e.preventDefault();
            $('#loader-icon').show();
            $(this).ajaxSubmit({ 
                target:   '#targetLayer', 
                beforeSubmit: function() {
                    $("#progress-bar").width('0%');
                },
                uploadProgress: function (event, position, total, percentComplete){ 
                    $("#progress-bar").width(percentComplete + '%');
                    $("#progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>')
                },
                success:function (){
                    $('#loader-icon').hide();
                },
                resetForm: true 
            }); 
            return false; 
        }
    });


    // panel de administracion

    $('#bannoption').change(function() {
        var option = $('#bannoption').val();
        if(option == 'job'){
          $('#bannip').css('display','none');
          $('#bannjob').css('display','block').fadeIn(2000);
        }
        if(option == 'ip'){
          $('#bannjob').css('display','none');
          $('#bannip').css('display','block').fadeIn(2000);
        }
    });

    // Buscar ip de un usario
    $('#searchip').click(function(){

       var playername = $('#playername').val();

       $.ajax({
        type: 'GET',
        url: 'ajax/admin.php?action=searchip&playername='+playername,
        beforeSend: function(){
          $('#cargando').html(' <img src="ajax-loader.gif" width="20px;">');
        },
        success: function(result){
          if(result) {
             $('#cargando').html('  '+result);  
          }
          else {
            $('#cargando').html(' Este personaje no existe.');
          }
         
        }});


    });

  ///////////

  $('#msghtml').submit(function(e){

    e.preventDefault();

    var admin_name = $('#adminname').val();
    var topic = $('#topic').val();
    var type = $('#type').val();

    var msghtml = CKEDITOR.instances['editor1'].getData();

    var parametros = {
                "admin_name" : admin_name,
                "topic" : topic,
                "msghtml" : msghtml,
                "type" : type
        };

    $.ajax({
        data : parametros,
        type:"POST",
        url: "ajax/savemsghtml.php", 
        beforeSend: function () {
          $("#status").html(" <img src='img/ajax-loader.gif'>");
        },
        success: function(response){
          $('#status').html( '<i class="fa fa-check-circle fa-lg"></i>');
        }
      });



  });




	// fin de registro de usuarios

	$('#formregister').submit(function(e){
			
			e.preventDefault();
			
			var username = $('#username').val();
			var password = $('#password').val();
			var socialid = $('#socialid').val();
			var email = $('#email').val();
			var pais = $('#pais').val();
			var captcha = $('#captcha').val();

			$.ajax({
			type: 'GET',
    		url: 'ajax/register.php?username='+username+'&password='+password+'&socialid='+socialid+'&email='+email+'&pais='+pais+'&captcha='+captcha,
   		 	beforeSend: function(){
   		 		$('#registerinfo').css('display','block');
   		 	},
   		 	success: function(result){
   		 		if(result == 'ok') {
  				$('#registersuccess').css('display','block').fadeOut(5000);
           $('#registerexist').css('display','none');
          $('#registerinfo').css('display','none');
          }
          else if(result = 'exist'){
          $('#registerinfo').css('display','none');
          $('#registerexist').css('display','block').fadeOut(5000);
          }				
     	  }});
	   });
});

///// ITEMSHOP ////

  function MyFunction(value){
    $.ajax({
        type:"GET",
        url: "ajax/cats.php?idcat="+value, 
        beforeSend: function () {
          $("#loading").html("<br><center><img src='ajax-loader.gif'></center><br>");
        },
        success: function(doc){
          $('#loading').html(doc);
        }
      });
  }

    //// <i class="fa fa-frown-o"></i>
  function buy_item(value){
       $.ajax({
        type:"GET",
        url: "ajax/buy.php?id="+value, 
        beforeSend: function () {
          $("#buy_"+value).html('<i class="fa fa-refresh fa-spin"></i>');
        },
        success: function(response){   
          if(response){
            var data = JSON.parse(response);
            $("#buy_"+value).html('<i class="fa fa-check fa-lg"></i>');
            $('#coins').html(data.coins);
            $('#jcoins').html(data.jcoins);            
          }
          else {
            $("#buy_"+value).html('<i class="fa fa-frown-o fa-lg"></i>');
          }          
        }
      });
  }


  /// LEER MENSAJE

  function read_msg(id){
       $.ajax({
        beforeSend: function () {
          $("#mensajes").css('display','none').fadeOut(2000);
          $("#loading").html('<br><center><img src="ajax-loader.gif"></center><br>');
        },
        success: function(response){   
          $("#loading").css('display','none');
          $('#readmsg').load('ajax/getmsg.php?id='+id); 

        }
      });
  }
