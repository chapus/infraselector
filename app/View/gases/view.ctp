<?php
	echo $this->Html->css(array('main/two_columns'));
?>
<div class="box-content" style="display:inline-block;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Gas de Protección</h3>

<h4><?php echo $gase['Gase']['name']; ?></h4>
<h5><?php echo $gase['Gase']['short']; ?></h5>
<div class="line"></div>
<div class="image"><?php if($gase['Gase']['image'] != "") { echo $this->Html->image('/'.$gase['Gase']['smallimage']); } ?></div>

<div class="info"><?php echo $gase['Gase']['description']; ?></div>

<div class="infralink"><?php if($gase['Gase']['infra_link'] != "") { echo $this->Html->link('Más información, click aquí', $gase['Gase']['infra_link'], array('target' => '_blank')); } ?></div>



</div>

<div class="right_col">
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

