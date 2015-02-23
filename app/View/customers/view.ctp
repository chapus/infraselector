<?php
	echo $this->Html->css(array('main/two_columns'));
?>
<div class="box-content" style="display:inline-block; padding-top:20px;">

<div class="left_box">
<div id='login_loading' style='display:none; float:right; width:45px; margin-top:8px; margin-right:25px;'></div>
<h3><?= $this->Html->image('infrasmall.png'); ?> Cliente</h3>

<h4><?php echo $customer['Customer']['name'].' '.$customer['Customer']['apeidos']; ?></h4>
<h4><?php echo 'Fecha de la petición: '.date("F j, Y", strtotime($customer['Customer']['created'])); ?></h4>
<div class="line"></div>

<table>
<tr>
	<td>Proceso:</td>
    <td><?php
	  if($customer['Customer']['selector'] == '1') {
		 echo 'MIG'; 
	  }
	  if($customer['Customer']['selector'] == '2') {
		 echo 'TIG'; 
	  }
	  if($customer['Customer']['selector'] == '3') {
		 echo 'SMAW'; 
	  }
	  if($customer['Customer']['selector'] == '4') {
		 echo 'PAC'; 
	  }
	 ?></td>
</tr>
<tr>
	<td>Teléfono:</td>
    <td><?= $customer['Customer']['telefono']; ?></td>
</tr>
<tr>
	<td>Correo electrónico:</td>
    <td><?= $customer['Customer']['correo']; ?></td>
</tr>
<tr>
	<td>Empresa:</td>
    <td><?= $customer['Customer']['empresa']; ?></td>
</tr>
<tr>
	<td>Ciudad:</td>
    <td><?= $customer['Ciudade']['name']; ?></td>
</tr>
<tr>
	<td>Comentarios:</td>
    <td><?= $customer['Customer']['comments']; ?></td>
</tr>
</table>

<div class="infralink"><?php echo $this->Html->link('Ver Selección solicitada', $customer['Customer']['page'], array('target' => 'blank') ); ?></div>


</div>

<div style="float:right; width:350px;">
	
</div>

</div>