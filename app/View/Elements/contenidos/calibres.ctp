<?php 
$data = $this->requestAction('/calibres/getlist');
//debug($data);
?>	
<div class="right_box">
<h3>Calibres de Lámina</h3>
<ul class="list">
<?php foreach($data as $dat) { ?>
<?php if($dat['Calibre']['name'] != "N/A") { ?>
<li><?= $this->Html->link($dat['Calibre']['name'], '/calibresdelamina/'.$dat['Calibre']['id']); ?></li>
<?php } } ?>
</ul>
<div class="footer_all"><?= $this->Html->link('Ver todo el Catálogo', '/catalogo/calibresdelamina'); ?></div>
</div>