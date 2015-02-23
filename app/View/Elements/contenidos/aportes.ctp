<?php 
$data = $this->requestAction('/aportes/getlist');
//debug($data);
?>	
<div class="right_box">
<h3>material de aporte</h3>
<ul class="list">
<?php foreach($data as $dat) { ?>
<?php if($dat['Aporte']['name'] != "N/A") { ?>
<li><?= $this->Html->link($dat['Aporte']['name'], '/materialesdeaporte/'.$dat['Aporte']['id']); ?></li>
<?php } } ?>
</ul>
<div class="footer_all"><?= $this->Html->link('Ver todo el Catálogo', '/catalogo/materialesdeaporte'); ?></div>
</div>