$(document).ready(function() {
	
	$('#btn-login').click(function(event) {

		var email = $('#loginEmail').val();
		var password = $('#loginPassword').val();

		if (email != "" && password != "") {
			$.ajax({
			   type: "POST",
			   url: "inc/login.php",
			   data: "email="+email+"&pwd="+password,
			   success: function(html){
			    if(html=='true') {
			    	window.location="album.php";
			    }
			    else {
			    	alert('ERRO: E-mail ou senha errado');
			    }
			   }
			});
		}
		return false;
	});


	$('#form-cadastro-usuario input').focus(function(event) {
		$(".help-block").html('');
	});



	$('#user_email').blur(function(event) {

		var email = $('#user_email').val();

		if (email != "") {
			$.ajax({
				url: 'inc/usuario_mail_check.php',
				type: 'POST',
				data: 'user_email='+email,
				success: function(formOk){
				    if(formOk=='false') {
				    	if( $('#form-group-email').hasClass('has-success') ) { //limpando...
				    		$('#form-group-email').removeClass('has-success');		
				    		$('#form-group-email .form-control-feedback').removeClass('glyphicon glyphicon-ok');		    		
				    	}
				    	$('#form-group-email').addClass('has-error');
				    	$('#form-group-email .form-control-feedback').addClass('glyphicon glyphicon-remove');
				    }
				    else {
				    	if( $('#form-group-email').hasClass('has-error') ) { //limpando...
				    		$('#form-group-email').removeClass('has-error');		
				    		$('#form-group-email .form-control-feedback').removeClass('glyphicon glyphicon-remove');		    		
				    	}
				    	$('#form-group-email').addClass('has-success');
				    	$('#form-group-email .form-control-feedback').addClass('glyphicon glyphicon-ok');
				    }
				}
			});						
		} 
		else { //no caso do campo ficar vazio, retorna erro
	    	if( $('#form-group-email').hasClass('has-success') ) { //limpando...
	    		$('#form-group-email').removeClass('has-success');		
	    		$('#form-group-email .form-control-feedback').removeClass('glyphicon glyphicon-ok');		    		
	    	}
	    	$('#form-group-email').addClass('has-error');
	    	$('#form-group-email .form-control-feedback').addClass('glyphicon glyphicon-remove');
		}

	});



	$('#btn_user_cadastro').click(function(event) {
		
		var nome 		= $('#user_nome').val();
		var sobrenome 	= $('#user_sobrenome').val();
		var email 		= $('#user_email').val();
		var idade 		= $('#user_idade').val();
		var sexo 		= $('#user_sexo').val();		
		var senha 		= $('#user_senha').val();

		if (nome != "" && sobrenome != "" && email != "" && senha != "") { //validacao simples

			$.ajax({
			   type: "POST",
			   url: "inc/cadastro_usuario.php",
			   data: "user_nome="+nome+"&user_sobrenome="+sobrenome+"&user_email="+email+"&user_idade="+idade+"&user_sexo="+sexo+"&user_senha="+senha,
			   success: function(formOk){
			    if(formOk=='true') {
			    	window.location="album.php";
			    }
			    else {
			    	alert('Infelizmente ocorreu um erro inesperado.');
			    }
			   }
			   /*beforeSend:function() {
			   	$("#add_err").html("Loading...")
			   }*/
			});
	 	} else {
	 		$(".help-block").append('Está faltando preencher alguma coisa...');
	 	}

		return false;
	});


});
