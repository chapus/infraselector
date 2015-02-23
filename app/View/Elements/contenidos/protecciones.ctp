<?php 
$data = $this->requestAction('/protecciones/getlist');
//debug($data);
?>	
<div class="right_box">
<h3>artículos de protección</h3>
<ul class="list">
<?php foreach($data as $dat) { ?>
<?php if($dat['Proteccione']['name'] != "N/A") { ?>
<li><?= $this->Html->link($dat['Proteccione']['name'], '/articulosdeproteccion/'.$dat['Proteccione']['id']); ?></li>
<?php } } ?>
</ul>
<div class="footer_all"><?= $this->Html->link('Ver todo el Catálogo', '/catalogo/articulosdeproteccion'); ?></div>
</div>