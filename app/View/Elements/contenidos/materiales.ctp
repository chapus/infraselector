<?php 
$data = $this->requestAction('/materials/getlist');
//debug($data);
?>	
<div class="right_box">
<h3>Gases de Protección</h3>
<ul class="list">
<?php foreach($data as $dat) { ?>
<li><?= $this->Html->link($dat['Gase']['name'], '/gasesdeproteccion/'.$dat['Gase']['id']); ?></li>
<?php } ?>
</ul>
<div class="footer_all"><?= $this->Html->link('Ver todo el Catálogo', '/catalogo/gasesdeproteccion'); ?></div>
</div>