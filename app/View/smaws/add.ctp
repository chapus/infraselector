<?php
	echo $this->Html->css(array('main/two_columns', 'forms/main'));
	
	echo $this->Html->script('jplugins/selectboxes/jquery.selectboxes', false);
	
	echo $this->Html->css('main/selectors');
?>
<script type="text/javascript">
<!--
$(document).ready(function() { 
	
	var path = "<?php echo $this->webroot; ?>";


/*
$('#SmawAddForm').submit(function(e) {
	e.preventDefault();
	
	$('#tests').html($('#SmawMaterials option:selected').val());
	
	
	$.ajax({
		url: path+'smaws/saveSelection',
		data: {'st1' : $('#SmawMaterials option:selected').val(),
		'st2' : $('#SmawCalibres option:selected').val(),
		'st3' : $('#SmawMaquinas option:selected').val(),
		'st4' : $('#SmawAportes option:selected').val()
		},
		type: 'POST',
		dataType: 'html',
		success: function (data) {
			
			$('#tests').html('<h4>'+data+'</h4>');
			
		}<!-- SUCCESS -->
	});	
	
});
*/

	
   $('#SmawMaterials').change(function() { 
 	if($('#SmawMaterials option:selected').val() != "") {
		console.log('enter ajax');
	   $('.s1load').fadeIn(200);
	   
			$.ajax({
				url: path+'smaws/s1_info',
				data: {'id' : $('#SmawMaterials option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
					$('.s1load').fadeOut(200, function () {
						
						
						$("#SmawCalibres").removeOption(/./);
						$("#SmawCalibres").attr('disabled', false);
						for(i = 0; i < data.length; i++) {
							$.each(data[i].SmawCalibre, function() {
								calibre = this.name.split("-");
								if(data[i].SmawCalibre.length != 1) {
									$("#SmawCalibres").addOption(this.id, calibre[0], false);
								} else {
									$("#SmawCalibres").addOption(this.id, calibre[0]);
									$("#SmawCalibres").fCalibres();
								}
							});
							
						}
						
					});
				}
			});
	}
   }); 
   

$("#SmawCalibres").change(function() {
	$("#SmawCalibres").fCalibres();
});
$.fn.fCalibres = function() {   
	   
			$.ajax({
				url: path+'smaws/s2_info',
				data: {'id' : $('#SmawCalibres option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
					$("#SmawMaquinas").removeOption(/./);
					$("#SmawMaquinas").attr('disabled', false);
					for(i = 0; i < data.length; i++) {
						$.each(data[i].SmawMaquina, function() {
							if(data[i].SmawMaquina.length != 1) {
								$("#SmawMaquinas").addOption(this.id, this.name+' cod.'+this.codigo, false);
							} else {
								$("#SmawMaquinas").addOption(this.id, this.name+' cod.'+this.codigo);
								$("#SmawMaquinas").fMaquinas();
							}
						});
						
					}
				}
			});		
}


$("#SmawMaquinas").change(function() {
	$("#SmawMaquinas").fMaquinas();
});   
$.fn.fMaquinas = function() {
	   
			$.ajax({
				url: path+'smaws/s3_info',
				data: {'id' : $('#SmawMaquinas option:selected').val()
					},
				type: 'POST',
				dataType: 'json',
				success: function (data) {

					$("#SmawAportes").removeOption(/./);
					$("#SmawAportes").attr('disabled', false);
					for(i = 0; i < data.length; i++) {
						$.each(data[i].SmawAporte, function() {
							if(data[i].SmawAporte.length != 1) {
								$("#SmawAportes").addOption(this.id, this.name+' cod.'+this.codigo, false);
							} else {
								$("#SmawAportes").addOption(this.id, this.name+' cod.'+this.codigo);
								//$("#SmawAportes").fAportes();
							}
						});
						
					}	
				}
			});		
}
   
   
 /*  
$("#SmawAportes").change(function() {
	$("#SmawAportes").fAportes();
});   
$.fn.fAportes = function() {
	   
			$.ajax({
				url: path+'smaws/s4_info',
				data: {'id' : $('#SmawAportes option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
						
						$("#SmawProtecciones").removeOption(/./);
						$("#SmawProtecciones").attr('disabled', false);
						for(i = 0; i < data.length; i++) {
							$.each(data[i].SmawProteccione, function() {
								
								$("#SmawProtecciones").addOption(this.id, this.name, false);
								
							});
							
						}
				}
			});		
} 
*/ 
 
   
});

</script>
<div class="box-content" style="display:inline-block; padding-top:20px;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Nueva Selección SMAW</h3>

<?php
//debug($materials);

echo $this->Form->create('Smaw', array('url' => '/smaws/addstep2') );


echo $this->Form->input('materials', array('empty' => true) );
echo $this->Html->tag('div', '', 's1load');

echo $this->Form->input('calibres', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('maquinas', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('aportes', array('type' => 'select', 'empty' => true, 'disabled' => true) );

//echo $this->Form->end('Submit');
echo '<hr />';
$i = 0;
foreach($materials as $item) {
	echo $item['Material']['name'].' '.$this->Form->input('smaterial', array('type' => 'checkbox', 'label' => '', 'value' => $item['Material']['id'], 'name' => 'data[material]['.$i.'][id]', 'div' => false) ).'<br />';
	$i++;
}
echo '<hr />';
$i = 0;
foreach($calibres as $item) {
	echo $item['Calibre']['name'].' '.$this->Form->input('scalibre', array('type' => 'checkbox', 'label' => '', 'value' => $item['Calibre']['id'], 'name' => 'data[calibre]['.$i.'][id]', 'div' => false) ).'<br />';
	$i++;
}
echo '<hr />';
$i = 0;
foreach($maquinas as $item) {
	echo $item['Maquina']['codigo'].' '.$item['Maquina']['name'].' '.$this->Form->input('smaquina', array('type' => 'checkbox', 'label' => '', 'value' => $item['Maquina']['id'], 'name' => 'data[maquina]['.$i.'][id]', 'div' => false) ).'<br />';
	$i++;
}

echo '<hr />';
$i = 0;
foreach($aportes as $item) {
	echo $item['Aporte']['codigo'].' '.$item['Aporte']['name'].' '.$this->Form->input('saporte', array('type' => 'checkbox', 'label' => '', 'value' => $item['Aporte']['id'], 'name' => 'data[aporte]['.$i.'][id]', 'div' => false) ).'<br />';
	$i++;
}



echo $this->Form->end('Submit');
?>

<div id="step2"></div>
<div id="step3"></div>
<div id="step4"></div>

<div id="tests"></div>

</div>

<div class="right_box">
<h3>ayuda</h3>
<ul class="bblist">
<li><p>&nbsp;</p></li>
</ul>
</div>

</div>