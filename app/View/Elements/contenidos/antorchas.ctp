<?php 
$data = $this->requestAction('/antorchas/getlist');
//debug($data);
?>	
<div class="right_box">
<h3>Antorchas</h3>
<ul class="list">
<?php foreach($data as $dat) { ?>
<?php if($dat['Antorcha']['name'] != "N/A") { ?>
<li><?= $this->Html->link($dat['Antorcha']['name'], '/lasantorchas/'.$dat['Antorcha']['id']); ?></li>
<?php } } ?>
</ul>
<div class="footer_all"><?= $this->Html->link('Ver todo el Catálogo', '/catalogo/lasantorchas'); ?></div>
</div>