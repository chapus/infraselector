<?php 
$data = $this->requestAction('/reguladors/getlist');
//debug($data);
?>	
<div class="right_box">
<h3>reguladores de presión</h3>
<ul class="list">
<?php foreach($data as $dat) { ?>
<?php if($dat['Regulador']['name'] != "N/A") { ?>
<li><?= $this->Html->link($dat['Regulador']['name'], '/reguladoresdepresion/'.$dat['Regulador']['id']); ?></li>
<?php } } ?>
</ul>
<div class="footer_all"><?= $this->Html->link('Ver todo el Catálogo', '/catalogo/reguladoresdepresion'); ?></div>
</div>