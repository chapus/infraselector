<?php
	echo $this->Html->css(array('main/two_columns', 'forms/main'));
	
	echo $this->Html->script('jplugins/selectboxes/jquery.selectboxes', false);
	
	echo $this->Html->css('main/selectors');
?>
<script type="text/javascript">
<!--
$(document).ready(function() { 
	
	var path = "<?php echo $this->webroot; ?>";


$('#MigAddForm').submit(function(e) {
	e.preventDefault();
	
	$('#tests').html($('#MigMaterials option:selected').val());
	
	$.ajax({
		url: path+'migs/saveSelection',
		data: {'st1' : $('#MigMaterials option:selected').val(),
		'st2' : $('#MigCalibres option:selected').val(),
		'st3' : $('#MigGases option:selected').val(),
		'st4' : $('#MigMaquinas option:selected').val(),
		'st5' : $('#MigMicroalambres option:selected').val(),
		'st6' : $('#MigAntorchas option:selected').val(),
		'st7' : $('#MigAportes option:selected').val(),
		'st8' : $('#MigReguladores option:selected').val(),
		'st9' : $('#MigProtecciones option:selected').val()
		},
		type: 'POST',
		dataType: 'html',
		success: function (data) {
			
			$('#tests').html('<h2>'+data+'</h2>');
			
		}<!-- SUCCESS -->
	});	
	
});


	
   $('#MigMaterials').change(function() { 
 	if($('#MigMaterials option:selected').val() != "") {
		console.log('enter ajax');
	   $('.s1load').fadeIn(200);
	   
			$.ajax({
				url: path+'migs/s1_info',
				data: {'id' : $('#MigMaterials option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
					console.log("success ajax");
					$('.s1load').fadeOut(200, function () {
						
						console.log("success ajax");
						$("#MigCalibres").removeOption(/./);
						$("#MigCalibres").attr('disabled', false);
						for(i = 0; i < data.length; i++) {
							$.each(data[i].MigCalibre, function() {
								calibre = this.name.split("-");
								if(data[i].MigCalibre.length != 1) {
									$("#MigCalibres").addOption(this.id, calibre[0], false);
								} else {
									$("#MigCalibres").addOption(this.id, calibre[0]);
									$("#MigCalibres").fCalibres();
								}
							});
							
						}
						
					});
				}
			});
	}
   }); 
   

$("#MigCalibres").change(function() {
	$("#MigCalibres").fCalibres();
});
$.fn.fCalibres = function() {   
	   
			$.ajax({
				url: path+'migs/s2_info',
				data: {'id' : $('#MigCalibres option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
					$("#MigGases").removeOption(/./);
					$("#MigGases").attr('disabled', false);
					for(i = 0; i < data.length; i++) {
						$.each(data[i].MigGase, function() {
							if(data[i].MigGase.length != 1) {
								$("#MigGases").addOption(this.id, this.name+' cod.'+this.codigo, false);
							} else {
								$("#MigGases").addOption(this.id, this.name+' cod.'+this.codigo);
								$("#MigGases").fGases();
							}
						});
						
					}
				}
			});		
}


$("#MigGases").change(function() {
	$("#MigGases").fGases();
});   
$.fn.fGases = function() {
	   
			$.ajax({
				url: path+'migs/s3_info',
				data: {'id' : $('#MigGases option:selected').val(),
						'calibreid' : $('#MigCalibres option:selected').val()
					},
				type: 'POST',
				dataType: 'json',
				success: function (data) {

					$("#MigMaquinas").removeOption(/./);
					$("#MigMaquinas").attr('disabled', false);
					for(i = 0; i < data.length; i++) {
						$.each(data[i].MigMaquina, function() {
							if(data[i].MigMaquina.length != 1) {
								$("#MigMaquinas").addOption(this.id, this.name+' cod.'+this.codigo, false);
							} else {
								$("#MigMaquinas").addOption(this.id, this.name+' cod.'+this.codigo);
								$("#MigMaquinas").fMaquinas();
							}
						});
						
					}	
				}
			});		
}
   
   
   
$("#MigMaquinas").change(function() {
	$("#MigMaquinas").fMaquinas();
});   
$.fn.fMaquinas = function() {
	   
			$.ajax({
				url: path+'migs/s5_info',
				data: {'id' : $('#MigMaquinas option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
						
						$("#MigMicroalambres").removeOption(/./);
						$("#MigMicroalambres").attr('disabled', false);
						for(i = 0; i < data.length; i++) {
							$.each(data[i].MigMicroalambre, function() {
								if(data[i].MigMicroalambre.length != 1) {
									$("#MigMicroalambres").addOption(this.id, this.name+' cod.'+this.codigo, false);
								} else {
									$("#MigMicroalambres").addOption(this.id, this.name+' cod.'+this.codigo);
									$("#MigMicroalambres").fMicroalambres();
								}
							});
							
						}
				}
			});		
} 
 
 

$("#MigMicroalambres").change(function() {
	$("#MigMicroalambres").fMicroalambres();
});   
$.fn.fMicroalambres = function() {
	   
			$.ajax({
				url: path+'migs/s6_info',
				data: {'id' : $('#MigMicroalambres option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
						$("#MigAntorchas").removeOption(/./);
						$("#MigAntorchas").attr('disabled', false);
						for(i = 0; i < data.length; i++) {
							$.each(data[i].MigAntorcha, function() {
								if(data[i].MigAntorcha.length != 1) {
									$("#MigAntorchas").addOption(this.id, this.name+' cod.'+this.codigo, false);
								} else {
									$("#MigAntorchas").addOption(this.id, this.name+' cod.'+this.codigo);
									$("#MigAntorchas").fAntorchas();
								}
							});
							
						}
				}
			});		
}
   
   
$("#MigAntorchas").change(function() {
	$("#MigAntorchas").fAntorchas();
});   
$.fn.fAntorchas = function() {
	   
			$.ajax({
				url: path+'migs/s7_info',
				data: {'id' : $('#MigAntorchas option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
						$("#MigAportes").removeOption(/./);
						$("#MigAportes").attr('disabled', false);
						for(i = 0; i < data.length; i++) {
							$.each(data[i].MigAporte, function() {
								if(data[i].MigAporte.length != 1) {
									$("#MigAportes").addOption(this.id, this.name+' cod.'+this.codigo, false);
								} else {
									$("#MigAportes").addOption(this.id, this.name+' cod.'+this.codigo);
									$("#MigAportes").fAportes();
								}
							});
							
						}
				}
			});		
}
   



$("#MigAportes").change(function() {
	$("#MigAportes").fAportes();
});   
$.fn.fAportes = function() {
	   
			$.ajax({
				url: path+'migs/s4_info',
				data: {'id' : $('#MigAportes option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
						$("#MigReguladores").removeOption(/./);
						$("#MigReguladores").attr('disabled', false);
						for(i = 0; i < data.length; i++) {
							$.each(data[i].MigRegulador, function() {
								if(data[i].MigRegulador.length != 1) {
									$("#MigReguladores").addOption(this.id, this.name+' cod.'+this.codigo, false);
								} else {
									$("#MigReguladores").addOption(this.id, this.name+' cod.'+this.codigo);
									$("#MigReguladores").fReguladores();
								}
							});
							
						}
				}
			});		
}
    
      
   
$("#MigReguladores").change(function() {
	$("#MigReguladores").fReguladores();
});   
$.fn.fReguladores = function() {
	
}
      
   
});

</script>
<div class="box-content" style="display:inline-block; padding-top:20px;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Nueva Selección MIG</h3>

<div id="tests"></div>
<?php
//debug($materials);

echo $this->Form->create('Mig');


echo $this->Form->input('materials', array('empty' => true) );
echo $this->Html->tag('div', '', array('class' => 's1load') );

echo $this->Form->input('calibres', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('gases', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('maquinas', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('microalambres', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('antorchas', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('aportes', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('reguladores', array('type' => 'select', 'empty' => true, 'disabled' => true) );


echo $this->Form->end('Submit');
?>

</div>

<div class="right_box">
<h3>ayuda</h3>
<ul class="bblist">
<li><p>&nbsp;</p></li>
</ul>
</div>

</div>