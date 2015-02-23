<?php
	echo $this->Html->css(array('main/two_columns', 'forms/main'));
	
	echo $this->Html->script('jplugins/selectboxes/jquery.selectboxes', false);
	
	echo $this->Html->css('main/selectors');
?>
<script type="text/javascript">
<!--
$(document).ready(function() { 
	
	var path = "<?php echo $this->webroot; ?>";


$('#PacAddForm').submit(function(e) {
	e.preventDefault();
	
	$('#tests').html($('#PacMaterials option:selected').val());
	
	$.ajax({
		url: path+'pacs/saveSelection',
		data: {'st1' : $('#PacMaterials option:selected').val(),
		'st2' : $('#PacCalibres option:selected').val(),
		'st3' : $('#PacMaquinas option:selected').val(),
		'st4' : $('#PacGases option:selected').val(),
		'st5' : $('#PacReguladores option:selected').val()
		},
		type: 'POST',
		dataType: 'html',
		success: function (data) {
			
			$('#tests').html('<h4>'+data+'</h4>');
			
		}<!-- SUCCESS -->
	});	
	
});


	
   $('#PacMaterials').change(function() { 
 	if($('#PacMaterials option:selected').val() != "") {
		console.log('enter ajax');
	   $('.s1load').fadeIn(200);
	   
			$.ajax({
				url: path+'pacs/s1_info',
				data: {'id' : $('#PacMaterials option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
					$('.s1load').fadeOut(200, function () {
						$("#PacCalibres").removeOption(/./);
						$("#PacCalibres").attr('disabled', false);
						for(i = 0; i < data.length; i++) {
							$.each(data[i].PacCalibre, function() {
								calibre = this.name.split("-");
								if(data[i].PacCalibre.length != 1) {
									$("#PacCalibres").addOption(this.id, calibre[0], false);
								} else {
									$("#PacCalibres").addOption(this.id, calibre[0]);
									$("#PacCalibres").fCalibres();
								}
							});
							
						}
						
					});
				}
			});
	}
   }); 
   

$("#PacCalibres").change(function() {
	$("#PacCalibres").fCalibres();
});
$.fn.fCalibres = function() {   
	   
			$.ajax({
				url: path+'pacs/s2_info',
				data: {'id' : $('#PacCalibres option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
					$("#PacMaquinas").removeOption(/./);
					$("#PacMaquinas").attr('disabled', false);
					for(i = 0; i < data.length; i++) {
						$.each(data[i].PacMaquina, function() {
							if(data[i].PacMaquina.length != 1) {
								$("#PacMaquinas").addOption(this.id, this.name, false);
							} else {
								$("#PacMaquinas").addOption(this.id, this.name);
								$("#PacMaquinas").fMaquinas();
							}
						});
						
					}
				}
			});		
}

   
   
$("#PacMaquinas").change(function() {
	$("#PacMaquinas").fMaquinas();
});   
$.fn.fMaquinas = function() {
	   
			$.ajax({
				url: path+'pacs/s3_info',
				data: {'id' : $('#PacMaquinas option:selected').val()},
				type: 'POST',
				dataType: 'json',
				success: function (data) {
						
						$("#PacGases").removeOption(/./);
						$("#PacGases").attr('disabled', false);
						for(i = 0; i < data.length; i++) {
							$.each(data[i].PacGase, function() {
								if(data[i].PacGase.length != 1) {
									$("#PacGases").addOption(this.id, this.name, false);
								} else {
									$("#PacGases").addOption(this.id, this.name);
									$("#PacGases").fGases();
								}
							});
							
						}
				}
			});		
} 
 
 
$("#PacGases").change(function() {
	$("#PacGases").fGases();
});   
$.fn.fGases = function() {
	   
			$.ajax({
				url: path+'pacs/s4_info',
				data: {'id' : $('#PacGases option:selected').val()
					},
				type: 'POST',
				dataType: 'json',
				success: function (data) {

					$("#PacReguladores").removeOption(/./);
					$("#PacReguladores").attr('disabled', false);
					for(i = 0; i < data.length; i++) {
						$.each(data[i].PacRegulador, function() {
							if(data[i].PacRegulador.length != 1) {
								$("#PacReguladores").addOption(this.id, this.name, false);
							} else {
								$("#PacReguladores").addOption(this.id, this.name);
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
<h3><?= $this->Html->image('infrasmall.png'); ?> Nueva Selección PAC</h3>

<?php
//debug($materials);

echo $this->Form->create('Pac');


echo $this->Form->input('materials', array('empty' => true) );
echo $this->Html->tag('div', '', 's1load');

echo $this->Form->input('calibres', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('maquinas', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('gases', array('type' => 'select', 'empty' => true, 'disabled' => true) );
echo $this->Form->input('reguladores', array('type' => 'select', 'empty' => true, 'disabled' => true) );

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