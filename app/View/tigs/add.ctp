<?php
	echo $this->Html->css(array('main/two_columns', 'forms/main'));
	
	echo $this->Html->script('jplugins/selectboxes/jquery.selectboxes', false);
	
	echo $this->Html->css('main/selectors');
?>
<script type="text/javascript">
<!--
$(document).ready(function() { 
	
	var path = "<?php echo $this->webroot; ?>";


$('#TigAddForm').submit(function(e) {
	e.preventDefault();
	
	$('#tests').html($('#TigMaterials option:selected').val());
	
	
	$.ajax({
		url: path+'tigs/saveSelection',
		data: {'st1' : $('#TigMaterials option:selected').val(),
		'st2' : $('#TigCalibres option:selected').val(),
		'st31' : $('#TigCcalidades option:selected').val(),
		'st3' : $('#TigGases option:selected').val(),
		'st4' : $('#TigMaquinas option:selected').val(),
		'st5' : $('#TigAntorchas option:selected').val(),
		'st6' : $('#TigAportes option:selected').val(),
		'st61' : $('#TigTungstenos option:selected').val(),
		'st7' : $('#TigReguladores option:selected').val(),
		'st8' : $('#TigAlternativos option:selected').val()
		},
		type: 'POST',
		dataType: 'html',
		success: function (data) {
			
			$('#tests').html('<h4>'+data+'</h4>');
			
		}<!-- SUCCESS -->
	});	
	
});


	
   $('#TigMaterials').change(function() { 
 	if($('#TigMaterials option:selected').val() != "") {
		console.log('enter ajax');
	   $('.s1load').fadeIn(200);
	   
			$.ajax({
				url: path+'tigs/s1_info',
				data: {'id' : $('#TigMaterials option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
					$('.s1load').fadeOut(200, function () {
						$("#TigCalibres").removeOption(/./);
						$("#TigCalibres").attr('disabled', false);
						for(i = 0; i < data.length; i++) {
							$.each(data[i].TigCalibre, function() {
								calibre = this.name.split("-");
								if(data[i].TigCalibre.length != 1) {
									$("#TigCalibres").addOption(this.id, calibre[0], false);
								} else {
									$("#TigCalibres").addOption(this.id, calibre[0]);
									$("#TigCalibres").fCalibres();
								}
							});
							
						}
						
					});
				}
			});
	}
   }); 
   

$("#TigCalibres").change(function() {
	$("#TigCalibres").fCalibres();
});
$.fn.fCalibres = function() {   
	   
			$.ajax({
				url: path+'tigs/s2_info',
				data: {'id' : $('#TigCalibres option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
					$("#TigCcalidades").removeOption(/./);
					$("#TigCcalidades").attr('disabled', false);
					for(i = 0; i < data.length; i++) {
						$.each(data[i].TigCcalidade, function() {
							if(data[i].TigCcalidade.length != 1) {
								$("#TigCcalidades").addOption(this.id, this.name, false);
							} else {
								$("#TigCcalidades").addOption(this.id, this.name);
								$("#TigCcalidades").fCcalidades();
							}
						});
						
					}
				}
			});		
}


$("#TigCcalidades").change(function() {
	$("#TigCcalidades").fCcalidades();
});
$.fn.fCcalidades = function() {   
	   
			$.ajax({
				url: path+'tigs/s31_info',
				data: {'id' : $('#TigCcalidades option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
					$("#TigGases").removeOption(/./);
					$("#TigGases").attr('disabled', false);
					for(i = 0; i < data.length; i++) {
						$.each(data[i].TigGase, function() {
							if(data[i].TigGase.length != 1) {
								$("#TigGases").addOption(this.id, this.name, false);
							} else {
								$("#TigGases").addOption(this.id, this.name);
								$("#TigGases").fGases();
							}
						});
						
					}
				}
			});		
}


$("#TigGases").change(function() {
	$("#TigGases").fGases();
});   
$.fn.fGases = function() {
	   
			$.ajax({
				url: path+'tigs/s3_info',
				data: {'id' : $('#TigGases option:selected').val()
					},
				type: 'POST',
				dataType: 'json',
				success: function (data) {

					$("#TigMaquinas").removeOption(/./);
					$("#TigMaquinas").attr('disabled', false);
					for(i = 0; i < data.length; i++) {
						$.each(data[i].TigMaquina, function() {
							if(data[i].TigMaquina.length != 1) {
								$("#TigMaquinas").addOption(this.id, this.name, false);
							} else {
								$("#TigMaquinas").addOption(this.id, this.name);
								$("#TigMaquinas").fMaquinas();
							}
						});
						
					}	
				}
			});		
}
   
   
   
$("#TigMaquinas").change(function() {
	$("#TigMaquinas").fMaquinas();
});   
$.fn.fMaquinas = function() {
	   
			$.ajax({
				url: path+'tigs/s5_info',
				data: {'id' : $('#TigMaquinas option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
						
						$("#TigAntorchas").removeOption(/./);
						$("#TigAntorchas").attr('disabled', false);
						for(i = 0; i < data.length; i++) {
							$.each(data[i].TigAntorcha, function() {
								if(data[i].TigAntorcha.length != 1) {
									$("#TigAntorchas").addOption(this.id, this.name, false);
								} else {
									$("#TigAntorchas").addOption(this.id, this.name);
									$("#TigAntorchas").fAntorchas();
								}
							});
							
						}
				}
			});		
} 
 
 

$("#TigAntorchas").change(function() {
	$("#TigAntorchas").fAntorchas();
});   
$.fn.fAntorchas = function() {
	   
			$.ajax({
				url: path+'tigs/s6_info',
				data: {'id' : $('#TigAntorchas option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
						$("#TigTungstenos").removeOption(/./);
						$("#TigTungstenos").attr('disabled', false);
						for(i = 0; i < data.length; i++) {
							$.each(data[i].TigTungsteno, function() {
								if(data[i].TigTungsteno.length != 1) {
									$("#TigTungstenos").addOption(this.id, this.name, false);
								} else {
									$("#TigTungstenos").addOption(this.id, this.name);
									$("#TigTungstenos").fTungstenos();
								}
							});
							
						}
				}
			});		
}



$("#TigTungstenos").change(function() {
	$("#TigTungstenos").fTungstenos();
});   
$.fn.fTungstenos = function() {
	   
			$.ajax({
				url: path+'tigs/s61_info',
				data: {'id' : $('#TigTungstenos option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
						$("#TigAportes").removeOption(/./);
						$("#TigAportes").attr('disabled', false);
						for(i = 0; i < data.length; i++) {
							$.each(data[i].TigAporte, function() {
								if(data[i].TigAporte.length != 1) {
									$("#TigAportes").addOption(this.id, this.name, false);
								} else {
									$("#TigAportes").addOption(this.id, this.name);
									$("#TigAportes").fAportes();
								}
							});
							
						}
				}
			});		
}
   
   
$("#TigAportes").change(function() {
	$("#TigAportes").fAportes();
});   
$.fn.fAportes = function() {
	   
			$.ajax({
				url: path+'tigs/s7_info',
				data: {'id' : $('#TigAportes option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
						$("#TigReguladores").removeOption(/./);
						$("#TigReguladores").attr('disabled', false);
						for(i = 0; i < data.length; i++) {
							$.each(data[i].TigRegulador, function() {
								if(data[i].TigRegulador.length != 1) {
									$("#TigReguladores").addOption(this.id, this.name, false);
								} else {
									$("#TigReguladores").addOption(this.id, this.name);
									$("#TigReguladores").fReguladores();
								}
							});
							
						}
				}
			});		
}
    
      
   
$("#TigReguladores").change(function() {
	$("#TigReguladores").fReguladores();
});   
$.fn.fReguladores = function() {
	$.ajax({
		url: path+'tigs/s8_info',
		data: {'id' : $('#TigReguladores option:selected').val()},
		type: 'POST',
		dataType: 'json',
		success: function (data) {
				$("#TigAlternativos").removeOption(/./);
				$("#TigAlternativos").attr('disabled', false);
				for(i = 0; i < data.length; i++) {
					$.each(data[i].TigAlternativo, function() {
						if(data[i].TigAlternativo.length != 1) {
							$("#TigAlternativos").addOption(this.id, this.name, false);
						} else {
							$("#TigAlternativos").addOption(this.id, this.name);
						}
					});
				}
		}
	});		
}


   
   
});

</script>
<div class="box-content" style="display:inline-block; padding-top:20px;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Nueva Selección TIG</h3>

<?php
//debug($materials);

echo $this->Form->create('Tig');


echo $this->Form->input('materials', array('empty' => true) );
echo $this->Html->tag('div', '', array('class' => 's1load') );

echo $this->Form->input('calibres', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('ccalidades', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('gases', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('maquinas', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('antorchas', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('tungstenos', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('aportes', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('reguladores', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('alternativos', array('type' => 'select', 'empty' => true, 'disabled' => true) );


echo $this->Form->end('Submit');
?>


<div id="tests"></div>


</div>

<div class="right_box">
<h3>ayuda</h3>
<ul class="bblist">
<li><p>&nbsp;</p></li>
</ul>
</div>

</div>