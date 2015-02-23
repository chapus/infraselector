<?php
	echo $this->Html->css(array('main/login'));
?>
<script type="text/javascript">

$(document).ready(function() { 
	
	var path = "<?php echo $this->webroot; ?>";
	
   $('#form_login #submit').click(function(e) { 
       e.preventDefault();
	   
	   $('#login_loading').fadeIn(200);
	   $('.form_msg_left h3').html('Validando cuenta...');
	   
	   var msg = $('#login .new-message');
	   
			$.ajax({
				url: path+'users/enter',
				data: $('#form_login').serialize() + '&action=send',
				type: 'post',
				cache: false,
				dataType: 'html',
				success: function (data) {
					$('#login_loading').fadeOut(200, function () {
						$('#login .new-message').html(data);
						//confirmacion = data.split("&");
						if(data == "logged") {
							$('#login-container .login-title').html('Bienvendio al Sistema INFRA');
							msg.html('Por favor espera un segundo...<br />Redireccionando al sistema').fadeIn(200);
							$('#form_login').fadeOut(200);
							$('#login').animate({
							height: '122px'});
							setTimeout(function () {
									if($('#contact-ref-url').val() != "") {
										window.location.href = $('#contact-ref-url').val();
									} else {
										window.location.href = path;
									}
									
								},
							2000);
						} else {
							$('.form_msg_left h3').html("<img src='"+path+"img/infrasmall.png' /> Administración");
							//$('#login .new-message').html('Error al entrar, revisa de nuevo tus datos');
							$('#name').attr('value', '');
							$('#email').attr('value', '');
						}
						
					});
				}
			});
   }); 
   
   $("#name").focus();
   
   
});

</script>
<div class="box-content" style="display:inline-block; padding-top:20px;">

<div class="formas">

<div class="form_left">
    <div class="form_msg_left">
    <div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
        <h3><?= $this->Html->image('infrasmall.png'); ?> Administración</h3>
        
        <div class="cont" id="login">
        <form name="form_login" id="form_login" method="POST" action="#">
            <h4>Solo personal autorizado</h4>
            
            <ul class="input_form">
            
                <li>
                	Nombre de Usuario
                </li>
                <li>
                	<input type="text" name="name" id="name" value="" />
                </li>
                <li>
                    Contraseña
                </li>
                <li>
                	<input type="password" name="email" id="email" value="" />
                </li>
                <li>
                <input type='hidden' id='contact-ref-url' class='txt_input' name='ref_url' value="<?php 
                echo str_replace("__", "/", $ref_url); 
                ?>" />
                	<button class="rounded" id="submit">
                      <span>Entrar</span>
                    </button>
                </li>

            </ul>
        </form>
        <div class='new-message' align="center"></div>
        </div>
    </div>
</div>    
 
<div class="form_right">

<div class="form_msg_right">
    <h3>Selector de Procesos</h3>
    <div class="cont">
        <h4>Procesos existentes</h4>
    	<?= $this->Html->image('fotos/banner1.jpg', array('class' => 'admin_banner')); ?>	
    </div>
</div>
</div>

</div>

</div>