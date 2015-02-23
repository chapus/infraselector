<?php
	echo $this->Html->css(array('main/two_columns'));
?>
<div class="box-content" style="display:inline-block; padding-top:20px;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Calibre de lámina</h3>

<h4><?php echo $calibre['Calibre']['name']; ?></h4>
<h5><?php echo $calibre['Calibre']['short']; ?></h5>
<div class="line"></div>
<div class="image"><?php if($calibre['Calibre']['image'] != "") { echo $this->Html->image('/'.$calibre['Calibre']['smallimage']); } ?></div>

<div class="info"><?php echo $calibre['Calibre']['description']; ?></div>

<div class="infralink"><?php if($calibre['Calibre']['infra_link'] != "") { echo $this->Html->link('Más información, click aquí', $calibre['Calibre']['infra_link'], array('target' => '_blank')); } ?></div>



</div>

<div style="float:right; width:350px;">
<?php

	echo $this->element('contenidos/gases');
	
	echo $this->element('contenidos/aportes');
	
	echo $this->element('contenidos/maquinas');
	
	echo $this->element('contenidos/alimentadores');
	
	echo $this->element('contenidos/antorchas');
	
	echo $this->element('contenidos/reguladores');
	
	echo $this->element('contenidos/protecciones');
?>
</div>

</div>

