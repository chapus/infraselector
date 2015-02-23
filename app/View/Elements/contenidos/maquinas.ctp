<?php 
$data = $this->requestAction('/maquinas/getlist');
//debug($data);
?>	
<div class="right_box">
<h3>Máquinas de Soldar</h3>
<ul class="list">
<?php foreach($data as $dat) { ?>
<?php if($dat['Maquina']['name'] != "N/A") { ?>
<li><?= $this->Html->link($dat['Maquina']['name'], '/maquinasdesoldar/'.$dat['Maquina']['id']); ?></li>
<?php } } ?>
</ul>
<div class="footer_all"><?= $this->Html->link('Ver todo el Catálogo', '/catalogo/maquinasdesoldar'); ?></div>
</div>