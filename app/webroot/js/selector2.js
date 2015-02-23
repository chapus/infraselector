// JavaScript Document
<!--
$(document).ready(function() { 
	$('a.sendto').click(function(e) {
		var jump = $(this).attr('href');
		var new_position = $('#'+jump).offset();
		window.scrollTo(new_position.left,new_position.top);

		return false;
	});
	
	
	function validateEmail(elementValue){
	   var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	   return emailPattern.test(elementValue);
 	}

	
	$('#step1').click(function(e) {
		e.preventDefault();
		email = validateEmail( $('#CustomerCorreo').val() );
		if(email == true && $('#CustomerName').val() != "" && $('#CustomerTelefono').val() != "" && $('#CustomerApeidos').val() != "") {
			$('div.loading').show();
			$('#CustomerAddForm').submit();
			return true;
		} else {
			if(email == false) { 
				$('#CustomerCorreo').focus(); 
				$.growlUI('Aviso', '<div class="flash_success">Su correo electrónico no es válido, favor de verificarlo.</div>', 3000, '', 1);
			}
			if($('#CustomerName').val() == "") { 
				$('#CustomerName').focus(); 
				$.growlUI('Aviso', '<div class="flash_success">Es necesario su nombre para poder contactarlo.</div>', 3000, '', 1);
			}
			if($('#CustomerApeidos').val() == "") { 
				$('#CustomerApeidos').focus(); 
				$.growlUI('Aviso', '<div class="flash_success">Es necesario ingresar su nombre completo.</div>', 3000, '', 1);
			}
			if($('#CustomerTelefono').val() == "") { 
				$('#CustomerTelefono').focus(); 
				$.growlUI('Aviso', '<div class="flash_success">Su teléfono nos ayudará a entrar en contacto con usted.</div>', 3000, '', 1);
			}
		}
	});
	
	$('#submit').click(function(e) {
		//e.preventDefault();
		email = validateEmail( $('#CustomerCorreo').val() );
		if(email == true && $('#CustomerName').val() != "" && $('#CustomerTelefono').val() != "" && $('#CustomerApeidos').val() != "" && $('#CustomerPrivacidad').is(":checked") == true) {
			$('div.loading').show();
			$('#CustomerAddForm').submit();
			return true;
		} else {
			if( !$('#CustomerPrivacidad').is(":checked") ) { 
				$('#CustomerPrivacidad').focus(); 
				$.growlUI('Aviso', '<div class="flash_success">Debe aceptar de leído el aviso de privacidad.</div>', 3000, '', 1);
			}
			if($('#CustomerTelefono').val() == "") { 
				$('#CustomerTelefono').focus(); 
				$.growlUI('Aviso', '<div class="flash_success">Su teléfono nos ayudará a entrar en contacto con usted.</div>', 3000, '', 1);
			}
			if($('#CustomerApeidos').val() == "") { 
				$('#CustomerApeidos').focus(); 
				$.growlUI('Aviso', '<div class="flash_success">Es necesario ingresar su nombre completo.</div>', 3000, '', 1);
			}
			if($('#CustomerName').val() == "") { 
				$('#CustomerName').focus(); 
				$.growlUI('Aviso', '<div class="flash_success">Es necesario su nombre para poder contactarlo.</div>', 3000, '', 1);
			}
			if(email == false) { 
				$('#CustomerCorreo').focus(); 
				$.growlUI('Aviso', '<div class="flash_success">Su correo electrónico no es válido, favor de verificarlo.</div>', 3000, '', 1);
			}

			return false;
		}
	});
	
});
-->